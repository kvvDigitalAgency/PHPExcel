<?php

    namespace PHPExcel\core;

    use PHPExcel\models\Workbooks;

    require_once './models/Workbooks.php';
    require_once './lib/formats.php';
    require_once './lib/fonts.php';

    class PHPExcel {
//START fields
        private $_src = './srcFolder';
        private $_dst;
        private $_path = null;
        private $_sheets = array();
        private $_currentSheet = '';
        private $_values = array();
        private $_globalStyles = array();
        private $_styles = array();
        private $_fonts = array();
        private $_fills = array();
        private $_merges = array();
        private $_formats = array('0@');
        private $_borders = array();
        private $_alignments = array();
//END fields

//START constructor
        public function __construct(
            $nameSheet,
            $globalFont = 'Calibri',
            $globalFontSize = 11,
            $globalTextColor = '000',
            $globalFontTextStyle = '',
            $globalFillColor = 'none',
            $globalFormat = 'general',
            array $globalAlignment = [],
            $globalWrapText = false,
            $globalTextRotation = 0,
            $globalTextVertical = false
        ) {
            $this->setGlobalFont($globalFont, $globalFontTextStyle, $globalFontSize, $globalTextColor);
            $this->setGlobalFill($globalFillColor);
            $this->setGlobalFormat($globalFormat);
            $this->setGlobalBorders([]);
            $this->setGlobalAlignment($globalAlignment);
            if($globalWrapText)
                $this->setGlobalWrapText();
            if($globalTextRotation)
                $this->setGlobalTextRotation($globalTextRotation);
            if($globalTextVertical)
                $this->setGlobalTextVertical();
            $this->_dst = './dstFolders/id' . time();
            $this->copyFolder($this->_src, $this->_dst);
            $this->createSheet($nameSheet);
        }
//END constructor

//START sheet setting
    //START setters
        public function createSheet($nameSheet) {
            if(in_array($nameSheet, $this->_sheets))
                return false;
            $this->_sheets[] = $nameSheet;
            $this->setCurrentSheet($nameSheet);
            $this->_values[$this->_currentSheet] = array();
            return true;
        }

        public function setCurrentSheet($nameSheet) {
            if(!in_array($nameSheet, $this->_sheets))
                return false;
            $this->_currentSheet = array_search($nameSheet, $this->_sheets);
            return true;
        }
    //END setters

    //START getters
        public function getAllSheets() {
            return $this->_sheets;
        }

        public function getCurrentSheet() {
            if($this->_sheets[$this->_currentSheet])
                return $this->_sheets[$this->_currentSheet];
            return '';
        }
    //END getters
//END sheet setting

//START styles
    //START global style
        //START font settings
        public function setGlobalFont($font, $textStyle, $size, $color) {
            $font = $this->setFont($font, $textStyle, $size, $color);
            if(!$font)
                return false;
            $this->_fonts[0] = $font;
            $this->_globalStyles['font'] = 0;
            $color = $this->colorValid($color);
            $this->_globalStyles['color'] = $color;
            return true;
        }

        public function getGlobalFont() {
            return $this->_fonts[0];
        }
        //END font settings

        //START fill settings
        public function setGlobalFill($color) {
            $color = $this->colorValid($color);
            $this->_fills[0] = $color;
            $this->_globalStyles['fill'] = 0;
            return true;
        }

        public function getGlobalFill() {
            return $this->_fills[0];
        }
        //END fill settings

        //START format settings
        public function setGlobalFormat($format) {
            $format = explode('/', $format);
            $formats = _FORMATS_LIBRARY;
            foreach ($format as $i) {
                if(!isset($formats[$i]))
                    return false;
                $formats = $formats[$i];
            }
            $this->_formats[0] = $formats;
            $this->_globalStyles['format'] = 0;
            return true;
        }

        public function getGlobalFormat() {
            return array_search($this->_formats[0],_FORMATS_LIBRARY);
        }
        //END format settings

        //START borders settings
        private function setGlobalBorders(array $borders) {
            $this->_borders[0] = $this->makeBordersArray($borders);
            $this->_globalStyles['borders'] = 0;
            return true;
        }
        //END borders settings

        //START alignment settings
        public function setGlobalAlignment(array $alignment) {
            $this->_alignments[0] = $this->makeAlignmentArray($alignment);;
            $this->_globalStyles['alignments'] = 0;
            return true;
        }

        public function getGlobalAlignment() {
            return $this->_alignments[0];
        }
        //END alignment settings

        //START wrap text setting
        public function setGlobalWrapText() {
            $this->_globalStyles['wrapText'] = '1';
        }

        public function isGlobalWrapText() {
            if($this->_globalStyles['wrapText'])
                return true;
            return false;
        }
        //END wrap text setting

        //START text rotation settings
        public function setGlobalTextRotation($degree) {
            $this->_globalStyles['textRotation'] = $degree;
            return true;
        }

        public function setGlobalTextVertical() {
            return $this->setGlobalTextRotation('255');
        }

        public function getGlobalTextRotation() {
            if($this->_globalStyles['textRotation'])
                if($this->_globalStyles['textRotation'] == 255)
                    return 'Vertical text';
                else
                    return $this->_globalStyles['textRotation'];
            return 0;
        }

        public function isGlobalTextVertical() {
            if($this->_globalStyles['textRotation'] == 255)
                return true;
            return false;
        }
        //END text rotation settings

        //START text color settings

        public function getGlobalTextColor() {
            if($this->_globalStyles['color'])
                return $this->_globalStyles['color'];
            return '000000';
        }
        //END text color settings
    //END global style

    //START cells style
        //START font settings
        public function setFontToCells($cells, $font, $textStyle = '', $size = 11, $color = '') {
            $font = $this->setFont($font, $textStyle, $size, $color);
            if(!$font)
                return false;
            if(!array_search($font, $this->_fonts))
                array_push($this->_fonts, $font);

            $cells = $this->cellDelimiter($cells);
            $color = $this->colorValid($color);

            $this->setterStyle($cells, 'textColor', [$color => $color], $color);
            $this->setterStyle($cells, 'font', $this->_fonts, $font);
            return true;
        }

        public function getCellFont($cell) {
            $cell = strtoupper($cell);
            if($this->_styles[$this->_currentSheet][$cell]['font'])
                return($this->_fonts[$this->_styles[$this->_currentSheet][$cell]['font']]);
            else
                return $this->getGlobalFont();
        }
        //END font settings

        //START fill settings
        public function setFillToCells($cells, $color) {
            $cells = $this->cellDelimiter($cells);
            $color = $this->colorValid($color);
            if(!array_search($color, $this->_fills))
                $this->_fills[] = $color;

            $this->setterStyle($cells, 'fill', $this->_fills, $color);
            return true;
        }

        public function getCellFill($cell) {
            $cell = strtoupper($cell);
            if($this->_styles[$this->_currentSheet][$cell]['fill'])
                return($this->_fills[$this->_styles[$this->_currentSheet][$cell]['fill']]);
            else
                return $this->getGlobalFill();
        }
        //END fill settings

        //START format settings
        public function setFormatToCells($cells, $format) {
            $cells = $this->cellDelimiter($cells);
            $formats = _FORMATS_LIBRARY;
            $format = explode('/', $format);
            foreach ($format as $i) {
                if(!isset($formats[$i]))
                    return false;
                $formats = $formats[$i];
            }

            if(!array_search($formats, $this->_formats))
                $this->_formats[] = $formats;

            $this->setterStyle($cells, 'format', $this->_formats, $formats);

            return true;
        }

        public function getCellFormat($cell) {
            $cell = strtoupper($cell);
            if($this->_styles[$this->_currentSheet][$cell]['format'])
                return(array_search($this->_formats[$this->_styles[$this->_currentSheet][$cell]['format']], _FORMATS_LIBRARY));
            else
                return $this->getGlobalFormat();
        }
        //END format settings

        //START borders settings
        public function setBordersToCells($cells, array $borders) {
            $cells = $this->cellDelimiter($cells);

            $borders = $this->makeBordersArray($borders);
            if(!array_search($borders, $this->_borders))
                $this->_borders[] = $borders;

            $this->setterStyle($cells, 'borders', $this->_borders, $borders);
            return true;
        }

        public function getCellBorders($cell) {
            $cell = strtoupper($cell);
            if($this->_styles[$this->_currentSheet][$cell]['borders'])
                return($this->_borders[$this->_styles[$this->_currentSheet][$cell]['borders']]);
            else
                return($this->_borders[0]);
        }
        //END borders settings

        //START alignment settings
        public function setAlignmentToCells($cells, array $alignment) {
            $cells = $this->cellDelimiter($cells);
            $GAlignment = $this->makeAlignmentArray($alignment);
            if(!array_search($GAlignment, $this->_alignments))
                $this->_alignments[] = $GAlignment;

            $this->setterStyle($cells, 'alignments', $this->_alignments, $GAlignment);
            return true;
        }

        public function getCellAlignment($cell) {
            $cell = strtoupper($cell);
            if($this->_styles[$this->_currentSheet][$cell]['alignments'])
                return($this->_alignments[$this->_styles[$this->_currentSheet][$cell]['alignments']]);
            else
                return $this->getGlobalAlignment();
        }
        //END alignment settings

        //START wrap text settings
        public function setWrapTextToCells($cells) {
            $cells = $this->cellDelimiter($cells);

            $this->setterStyle($cells, 'wrapText', [1 =>1], 1);
            return true;
        }

        public function isCellWrapText($cell) {
            $cell = strtoupper($cell);
            if($this->_styles[$this->_currentSheet][$cell]['wrapText'])
                return true;
            return $this->isGlobalWrapText();
        }
        //END wrap text settings

        //START text rotation settings
            //START setters
        public function setTextRotationToCells($cells, $degree) {
            $cells = $this->cellDelimiter($cells);

            $this->setterStyle($cells, 'textRotation', [$degree => $degree], $degree);
            return true;
        }

        public function setTextVerticalToCells($cells) {
            return $this->setTextRotationToCells($cells,255);
        }
            //END setters

            //START getters
        public function getCellTextRotation($cell) {
            $cell = strtoupper($cell);
            if($this->_styles[$this->_currentSheet][$cell]['textRotation'])
                return $this->_styles[$this->_currentSheet][$cell]['textRotation'];
            return $this->getGlobalTextRotation();
        }

        public function isCellTextVertical($cell) {
            $cell = strtoupper($cell);
            if($this->_styles[$this->_currentSheet][$cell]['textRotation'] == 255)
                return true;
            return $this->isGlobalTextVertical();
        }
            //END getters
        //END text rotation settings

        //START cell merge settings
        public function mergeCells($cells) {
            $cells = strtoupper($cells);
            $this->_merges[$this->_currentSheet][] = $cells;
            return true;
        }

        public function getMergedCells() {
            return $this->_merges;
        }
        //END cell merge settings

        //START text color settings
        public function getCellTextColor($cell) {
            $cell = strtoupper($cell);
            if(isset($this->_styles[$this->_currentSheet][$cell]['textColor']))
                return $this->_styles[$this->_currentSheet][$cell]['textColor'];
            return $this->getGlobalTextColor();
        }
        //END text color settings
    //END cells style
//END styles

//START work with file
        public function getPathToExcel() {
            if($this->_path)
                return $this->_path;
            else
            return false;
        }

        public function createExcelFile($name) {
            Workbooks::setPath($this->_dst);
            Workbooks::preparingVariables($this->_values,$this->_styles, $this->_alignments, $this->_globalStyles);
            Workbooks::prepareContentTypesFile($this->_sheets);
            Workbooks::prepareDocProps_AppFile($this->_sheets);
            Workbooks::prepareXl_calcChainFile();
            Workbooks::prepareXl_sharedStringsFile($this->_values);
            Workbooks::prepareXl_stylesFile(
                $this->_formats,
                $this->_fonts,
                $this->_fills,
                $this->_borders,
                $this->_alignments,
                $this->_globalStyles
            );
            Workbooks::prepareXl_workbookFile($this->_sheets);
            Workbooks::prepareXl__rels_workbookFile($this->_sheets);
            Workbooks::prepareXl_worksheets_sheetFile($this->_values, $this->_merges);
            if(Workbooks::checkAll())
                if(Workbooks::putContentToFiles()) {
                    $this->makeZip($this->_dst, $name);
                    $this->_path = $this->_dst."/$name.xlsx";
                    return true;
                }
            return false;
        }
//END work with file

//START work with values
        public function setValuesToCells($cells, array $values) {
            $cells = $this->cellDelimiter($cells);
            if(count($values) != 1)
                if(count($cells) != count($values))
                    return false;
                else
                    foreach ($cells as $i => $cell)
                        $this->_values[$this->_currentSheet][$cell] = $values[$i];
            else if(count($cells) != count($values))
                return false;
            else
                foreach ($cells as $cell)
                    $this->_values[$this->_currentSheet][$cell] = $values[0];
            return true;
        }

        public function getValuesCells($cells) {
            $cells = $this->cellDelimiter($cells);

            $values = [];
            foreach ($cells as $cell) {
                if($this->_values[$cell])
                    $values[$cell] = $this->_values[$cell];
                else
                    $values[$cell] = '';
            }
            return[$values];
        }

        public function getAllValues() {
            return $this->_values[$this->_currentSheet];
        }
//END work with values

//private secondary methods
    //START create folder with excel
        private function copyFolder($src, $dst) {
            $dir = opendir($src);
            @mkdir($dst);
            while (false !== ($file = readdir($dir))) {
                if ($file != '.' && $file != '..') {
                    if (is_dir($src . '/' . $file)) {
                        $this->copyFolder($src . '/' . $file, $dst . '/' . $file);
                    } else {
                        copy($src . '/' . $file, $dst . '/' . $file);
                    }
                }
            }
            closedir($dir);
        }
    //END create folder with excel

    //START make archive
        private function makeZip($src, $name) {
            $dir = opendir($src);
            if (is_dir($src)) {
                if ($dir = opendir($src)) {
                    while (($file = readdir($dir)) !== false)
                        if ($file != '.' && $file != '..') {
                            $dist = trim(str_replace($this->_dst, '', $src), '/');
                            if ($dist != '')
                                $dist .= '/';
                            $z = new \ZipArchive();
                            $z->open($this->_dst . '/' . $name . '.xlsx', \ZipArchive::CREATE);
                            if (is_dir($src . '/' . $file)) {
                                $z->addEmptyDir($dist . $file);
                                $z->close();
                                $this->makeZip($src . '/' . $file, $name);
                            } else {
                                $z->addFile($src . '/' . $file, $dist . $file);
                                $z->close();
                            }
                        }
                    closedir($dir);
                }
            }
        }
    //END make archive

    //START color valid
        private function colorValid($color) {
            $color = str_replace('#', '', $color);
            if ($color == '')
                $color = '000000';
            if(strlen($color) < 6) {
                $subColor = '';
                for ($i = 0; $i < 4; $i++)
                    $subColor .= str_repeat(substr($color, $i, 1), 2);
                $color = $subColor;
            }
            return $color;
        }
    //END color valid

    //START make font
        private function setFont($font, $textStyle, $size, $color) {
            if(isset(_FONTS_LIBRARY[$font])){
                switch ($textStyle) {
                    case 'b':
                        $textStyle = '<b/>';
                        break;
                    case 'i':
                        $textStyle = '<i/>';
                        break;
                    case 'u':
                        $textStyle = '<u/>';
                        break;
                    default:
                        $textStyle = '';
                        break;
                }
                $font = str_replace(
                    '{{textStyle}}',
                    "            " . $textStyle . "\r\n",
                    _FONTS_LIBRARY[$font]
                );
                if(!$size)
                    $size = 11;
                $font = str_replace(
                    '{{size}}',
                    $size,
                    $font
                );
                if(!$color)
                    $color = '000000';
                $color = $this->colorValid($color);
                $font = str_replace(
                    '{{color}}',
                    $color,
                    $font
                );
                return $font;
            } else
                return false;
        }
    //END make font

    //START cells delimiter
        private function cellDelimiter($cells) {
            $cells = explode(':', strtoupper($cells));
            if(count($cells) > 1) {
                $cellsColumns = [
                    preg_replace('/[0-9]+/', '', $cells[0]),
                    preg_replace('/[0-9]+/', '', $cells[1]),
                ];
                $cellsStrings = [
                    preg_replace('/[^0-9]+/', '', $cells[0]),
                    preg_replace('/[^0-9]+/', '', $cells[1]),
                ];

                sort($cellsStrings);
                $cellsStrings = range($cellsStrings[0], $cellsStrings[1]);

                while ($cellsColumns[0] !== $cellsColumns[1]) {
                    $letters[] = $cellsColumns[0]++;
                }
                $letters[] = $cellsColumns[0]++;
                $cellsColumns = $letters;
                unset($letters);

                $cells = [];
                foreach ($cellsStrings as $strNum)
                    foreach ($cellsColumns as $colLet)
                        $cells[] = $colLet . $strNum;
            }
            return $cells;
        }
    //END cells delimiter

    //START setter styles
        private function setterStyle($cells, $style, $searchArray, $search) {
            foreach ($cells as $cell) {
                if(!is_array($this->_styles[$this->_currentSheet][$cell]))
                    $this->_styles[$this->_currentSheet][$cell] = array();
                $this->_styles[$this->_currentSheet][$cell][$style] = array_search($search, $searchArray);
                if(!isset($this->_values[$this->_currentSheet][$cell]))
                    $this->_values[$this->_currentSheet][$cell] = '';
            }
        }
    //END setter styles

    //START make borders array
        private function makeBordersArray($borders) {
            $GBorders = [
                'top' => [
                    'none',
                    'none',
                ],
                'bottom' => [
                    'none',
                    'none',
                ],
                'left' => [
                    'none',
                    'none',
                ],
                'right' => [
                    'none',
                    'none',
                ],
                'diagonalDown' => [
                    'none',
                    'none',
                ],
                'diagonalUp' => [
                    'none',
                    'none',
                ],
            ];
            if(isset($borders['top']))
                $GBorders['top'] = [
                    $borders['top'][0],
                    $this->colorValid($borders['top'][1]),
                ];
            if(isset($borders['bottom']))
                $GBorders['bottom'] = [
                    $borders['bottom'][0],
                    $this->colorValid($borders['bottom'][1]),
                ];
            if(isset($borders['left']))
                $GBorders['left'] = [
                    $borders['left'][0],
                    $this->colorValid($borders['left'][1]),
                ];
            if(isset($borders['right']))
                $GBorders['right'] = [
                    $borders['right'][0],
                    $this->colorValid($borders['right'][1]),
                ];
            if(isset($borders['diagonalDown']))
                $GBorders['diagonalDown'] = [
                    $borders['diagonalDown'][0],
                    $this->colorValid($borders['diagonalDown'][1]),
                ];
            if(isset($borders['diagonalUp']))
                $GBorders['diagonalUp'] = [
                    $borders['diagonalUp'][0],
                    $this->colorValid($borders['diagonalUp'][1]),
                ];
            return $GBorders;
        }
    //END make borders array

    //START make alignment array
        private function makeAlignmentArray($alignment) {
            $GAlignment = [
                'horizontal' => 'none',
                'vertical' => 'none',
            ];
            if(isset($alignment['h']))
                $GAlignment['horizontal'] = $alignment['h'];
            if(isset($alignment['v']))
                $GAlignment['vertical'] = $alignment['v'];
            return $GAlignment;
        }
    //END make alignment array
    }

    $e = new PHPExcel('Лист 1');

//    $e->createSheet('Лист 2');
//
//    $e->setValuesToCells('b2', ['hello']);
//
//    $e->setCurrentSheet('Лист 1');
//
//    $e->setValuesToCells('b2', ['world']);
//
//    $e->setGlobalAlignment(['h'=>'center']);
//    $e->setGlobalFill('F00');
//    $e->setGlobalFont('Calibri', '', '14', '135');
//    $e->setGlobalFormat('integer');
//    $e->setGlobalTextRotation('17');
//    $e->setGlobalTextVertical();
//    $e->setGlobalWrapText();

//    echo 'all sheets: ';
//    print_r($e->getAllSheets());
//    echo 'all values: ';
//    print_r($e->getAllValues());
//    echo 'current sheet: ';
//    echo $e->getCurrentSheet();
//    echo "\r\nglobal alignment: ";
//    print_r($e->getGlobalAlignment());
//    echo 'global fill: ';
//    echo $e->getGlobalFill();
//    echo "\r\nglobal font: ";
//    echo $e->getGlobalFont();
//    echo "\r\nglobal format: ";
//    echo $e->getGlobalFormat();
//    echo "\r\nglobal text color: ";
//    echo $e->getGlobalTextColor();
//    echo "\r\nglobal text rotation: ";
//    echo $e->getGlobalTextRotation();
//    echo "\r\nglobal text vertical: ";
//    echo $e->isGlobalTextVertical();
//    echo "\r\nglobal wrap text: ";
//    echo $e->isGlobalWrapText();

//    $e->setFontToCells('b2', 'Calibri', '', '15', '235');

//    $e->setCurrentSheet('Лист 2');
//    $e->setFontToCells('b2', 'Calibri', '', '18', '235');

//    echo $e->getCellFont('a1');
//    $e->setFillToCells('A3', 'f00');
//    $e->setCurrentSheet('Лист 1');
//    $e->setFillToCells('A1', '000');
//    print_r($e->getCellFill('a1'));
//    $e->setFormatToCells('A1', 'text');
//    echo $e->getCellFormat('a2');
//    $e->setBordersToCells('A1', ['bottom' => ['thin', 'f00']]);
//    print_r($e->getCellBorders('a1'));
//    $e->setAlignmentToCells('A1', ['v'=>'top']);
//    print_r($e->getCellAlignment('a1'));
//    $e->setWrapTextToCells('A1');
//    var_dump($e->isCellWrapText('a2'));
//    $e->setTextRotationToCells('A1', '17');
//    var_dump($e->getCellTextRotation('a1'));
//    $e->setTextVerticalToCells('A1');
//    var_dump($e->isCellTextVertical('a2'));
//    $e->mergeCells('a3:B6');
//    $e->setBordersToCells('A3:b6', ['bottom' => ['thin', 'f00']]);
//    var_dump($e->getMergedCells());
//    echo $e->getCellTextColor('a2');
//    var_dump($e->getPathToExcel());


//    $e->createExcelFile('vasia');
//    echo $e->getPathToExcel();
