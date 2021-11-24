<?php
    namespace PHPExcel\models;

    class Workbooks {
//START fields
        private static $_path = null;
        private static $cellxfsarr = array();

        private static $_valuesSharedStrings = null;
        private static $_cellXfs = null;
        private static $_formulas = null;

        private static $_ContentTypes = null;
        private static $_docProps_App = null;
        private static $_xl_sharedStrings = null;
        private static $_xl_styles = null;
        private static $_xl_workbook = null;
        private static $_xl__rels_workbook = null;
        private static $_xl_calcChain = null;
        private static $_xl_worksheets_sheets = null;
//END fields

//START primary methods
        public static function setPath($_dst) {
            self::$_path = $_dst;
        }

        public static function preparingVariables($values, $styles, $alignments, $globalStyles) {
            self::$_valuesSharedStrings = array();
            self::$_formulas = array();
            foreach ($values as $sheet => $valuesSheets)
                foreach($valuesSheets as $cell => $value)
                    if(!in_array($value, self::$_valuesSharedStrings))
                        if(strpos($value,'=') === 0)
                            self::$_formulas[] = $cell;
                        else
                            self::$_valuesSharedStrings[] = $value;

            self::$_cellXfs = array();
            foreach ($styles as $sheet => $stylesSheets)
                foreach($stylesSheets as $cell => $style) {
                    $str = '<xf';
                    if(isset($style['format']))
                        $str .= ' numFmtId="' . $style['format'] . '"';
                    else
                        $str .= ' numFmtId="0"';
                    if(isset($style['borders'])) {
                        $str .= ' borderId="' . $style['borders'] . '"';
                    }
                    else
                        $str .= ' borderId="0"';
                    if(isset($style['fill']))
                        $str .= ' fillId="' . ($style['fill'] + 2) . '"';
                    else
                        $str .= ' fillId="0"';
                    if(isset($style['font']))
                        $str .= ' fontId="' . $style['font'] . '"';
                    else
                        $str .= ' fontId="0"';
                    $str .= ' xfId="0" applyAlignment="1" applyNumberFormat="1" applyFill="1" applyFont="1" applyBorder="1"><alignment';
                    if(isset($style['alignments'])) {
                        if ($alignments[$style['alignments']]['horizontal'] !== 'none')
                            $str .= ' horizontal="' . $alignments[$style['alignments']]['horizontal'] . '"';
                        if ($alignments[$style['alignments']]['vertical'] !== 'none')
                            $str .= ' vertical="' . $alignments[$style['alignments']]['vertical'] . '"';
                    }
                    if(isset($style['wrapText']) || isset($globalStyles['wrapText']))
                        $str .= ' wrapText="1"';
                    if(isset($style['textRotation']))
                        $str .= ' textRotation="' . $style['textRotation'] . '"';
                    $str .= '/></xf>';

                    if(!array_search($str, self::$cellxfsarr))
                        self::$cellxfsarr[] = $str;
                    self::$_cellXfs[array_search($str, self::$cellxfsarr)][] = $sheet.$cell;
                }
        }

        public static function checkAll() {
            if(is_null(self::$_ContentTypes))
                return false;
            if(is_null(self::$_docProps_App))
                return false;
            if(is_null(self::$_xl_sharedStrings))
                return false;
            if(is_null(self::$_xl_styles))
                return false;
            if(is_null(self::$_xl_workbook))
                return false;
            if(is_null(self::$_xl__rels_workbook))
                return false;
            if(is_null(self::$_xl_calcChain))
                return false;
            if(is_null(self::$_xl_worksheets_sheets))
                return false;
            return true;
        }

        public static function putContentToFiles() {
            if(!self::putContent('/[Content_Types].xml', self::$_ContentTypes))
                return false;
            if(!self::putContent('/docProps/app.xml', self::$_docProps_App))
                return false;
            if(!self::putContent('/xl/sharedStrings.xml', self::$_xl_sharedStrings))
                return false;
            if(!self::putContent('/xl/styles.xml', self::$_xl_styles))
                return false;
            if(!self::putContent('/xl/workbook.xml', self::$_xl_workbook))
                return false;
            if(!self::putContent('/xl/_rels/workbook.xml.rels', self::$_xl__rels_workbook))
                return false;
            if(!self::putContent('/xl/calcChain.xml', self::$_xl_calcChain))
                return false;
            foreach (self::$_xl_worksheets_sheets as $id => $content)
                if(!self::putContent('/xl/worksheets/sheet' . ($id + 1) . '.xml', $content))
                    return false;
            return true;
        }
//END primary methods

//START content preparation
    //START Preparing the content of the [Content_Types].xml file
        public static function prepareContentTypesFile(array $sheets) {
            $contentReplace = '';
            foreach ($sheets as $num => $sheet)
                $contentReplace .= '    <Override PartName="/xl/worksheets/sheet' . ($num + 1) .
                    '.xml" ContentType="application/vnd.openxmlformats-officedocument.spreadsheetml.worksheet+xml"/>' .
                    "\r\n";
            $content = self::makeContent('/[Content_Types].xml', '{{sheets}}', $contentReplace);
            if($content) {
                self::$_ContentTypes = $content;
                return true;
            }
            return false;
        }
    //END Preparing the content of the "[Content_Types].xml" file

    //START Preparing the content of the "docProps/app.xml" file
        public static function prepareDocProps_AppFile(array $sheets) {
            $contentReplace = '<vt:vector size="' . count($sheets) . '" baseType="lpstr">'."\r\n";
            $contentReplace2 = '<vt:i4>' . count($sheets) . '</vt:i4>';
            foreach ($sheets as $num => $sheet)
                $contentReplace .= '            <vt:lpstr>' . $sheet . '</vt:lpstr>' . "\r\n";
            $contentReplace .= '        </vt:vector>';
            $content = self::makeContent('docProps/app.xml', '{{sheets}}', $contentReplace);
            if($content) {
                $content = str_replace('{{countSheets}}', $contentReplace2, $content);
                self::$_docProps_App = $content;
                return true;
            }
            return false;
        }
    //END Preparing the content of the "docProps/app.xml" file

    //START Preparing the content of the "xl/calcChain.xml" file
        public static function prepareXl_calcChainFile() {
            $contentReplace = '';
            foreach (self::$_formulas as $cell)
                $contentReplace .= '<c r="' . $cell . '" i="2" l="1"/>' . "\r\n    ";
            $content = self::makeContent('/xl/calcChain.xml', '{{calculations}}', $contentReplace);
            if($content) {
                self::$_xl_calcChain = $content;
                return true;
            }
            return false;
        }
    //END Preparing the content of the "xl/calcChain.xml" file

    //START Preparing the content of the "xl/sharedStrings.xml" file
        public static function prepareXl_sharedStringsFile(array $values) {
            $countValuesSheets = 0;
            foreach ($values as $sheet)
                $countValuesSheets += count($sheet);
            $countValuesSharedStrings = count(self::$_valuesSharedStrings);

            $contentReplace = '<sst xmlns="http://schemas.openxmlformats.org/spreadsheetml/2006/main" count="' .
                $countValuesSheets . '" uniqueCount="' . $countValuesSharedStrings . '">';

            foreach (self::$_valuesSharedStrings as $value)
                $contentReplace .= '<si><t>' . $value . '</t></si>' . "\r\n";
            $content = self::makeContent('xl/sharedStrings.xml', '{{values}}', $contentReplace);
            if($content) {
                self::$_xl_sharedStrings = $content;
                return true;
            }
            return false;
        }
    //END Preparing the content of the "xl/sharedStrings.xml" file

    //START Preparing the content of "the xl/styles.xml" file
        public static function prepareXl_stylesFile(
            array $formats,
            array $fonts,
            array $fills,
            array $borders,
            array $alignments,
            array $globalStyles
        ) {
            $formatsContent = '<numFmts count="' . count($formats) . '">';
            foreach ($formats as $id => $format) {
                if ($format != '0@')
                    $formatsContent .= '<numFmt formatCode="' . $format . '" numFmtId="' . ($id+1) . '"/>';
            }
            $formatsContent .= '    </numFmts>';

            $fontsContent = '<fonts count="' . count($fonts) . '" x14ac:knownFonts="1">';
            foreach ($fonts as $font)
                $fontsContent .= "\r\n        " . $font;
            $fontsContent .= "\r\n" . '    </fonts>';

            $fillsContent = '<fills count="' . (count($fills) + 2) . '">' . "\r\n";
            $fillsContent .= '        <fill>
            <patternFill patternType="none"/>
        </fill>' . "\r\n";
            $fillsContent .= '        <fill>
            <patternFill patternType="gray125"/>
        </fill>' . "\r\n";
            foreach ($fills as $fill)
                $fillsContent .= '        <fill>
            <patternFill patternType="solid">
                <fgColor rgb="' . $fill . '"/>
                <bgColor indexed="64"/>
            </patternFill>
        </fill>' . "\r\n";
            $fillsContent .= '    </fills>';

            $bordersContent = '<borders count="' . count($borders) . '">' . "\r\n";
            foreach ($borders as $border) {
                $bordersContent .= '        <border';
                if($border['diagonalUp'][0] != 'none')
                    $bordersContent .= ' diagonalUp="1"';
                if($border['diagonalDown'][0] != 'none')
                    $bordersContent .= ' diagonalDown="1"';
                $bordersContent .= '>' . "\r\n";

                if($border['left'][0] != 'none')
                    $bordersContent .= '            <left style="' . $border['left'][0] .
                        '"><color rgb="' . $border['left'][1] . '"/></left>' . "\r\n";
                else
                    $bordersContent .= '            <left/>' . "\r\n";
                if($border['right'][0] != 'none')
                    $bordersContent .= '            <right style="' . $border['right'][0] .
                        '"><color rgb="' . $border['right'][1] . '"/></right>' . "\r\n";
                else
                    $bordersContent .= '            <right/>' . "\r\n";
                if($border['top'][0] != 'none')
                    $bordersContent .= '            <top style="' . $border['top'][0] .
                        '"><color rgb="' . $border['top'][1] . '"/></top>' . "\r\n";
                else
                    $bordersContent .= '            <top/>' . "\r\n";
                if($border['bottom'][0] != 'none')
                    $bordersContent .= '            <bottom style="' . $border['bottom'][0] .
                        '"><color rgb="' . $border['bottom'][1] . '"/></bottom>' . "\r\n";
                else
                    $bordersContent .= '            <bottom/>' . "\r\n";
                if($border['diagonalUp'][0] != 'none')
                    $bordersContent .= '            <diagonal style="' . $border['diagonalUp'][0] .
                        '"><color rgb="' . $border['diagonalUp'][1] . '"/></diagonal>' . "\r\n";
                else if ($border['diagonalDown'][0] != 'none')
                    $bordersContent .= '            <diagonal style="' . $border['diagonalDown'][0] .
                        '"><color rgb="' . $border['diagonalDown'][1] . '"/></diagonal>' . "\r\n";
                else
                    $bordersContent .= '            <diagonal/>' . "\r\n";
                $bordersContent .= '        </border>' . "\r\n";
            }
            $bordersContent .= '    </borders>';

            $contentCellStyleXfs = '<xf numFmtId="0" fontId="0" fillId="';
            $contentCellXfsFirst = '<xf numFmtId="0" fontId="0" fillId="';
            if($fills[0] == 'nnoonnee') {
                $contentCellStyleXfs .= '0';
                $contentCellXfsFirst .= '0';
            } else {
                $contentCellStyleXfs .= '2';
                $contentCellXfsFirst .= '2';
            }
            $contentCellStyleXfs .= '" borderId="0" applyAlignment="1" applyNumberFormat="1" applyFill="1" applyFont="1" applyBorder="1"><alignment';
            $contentCellXfsFirst .= '" borderId="0" xfsId="0" applyAlignment="1" applyNumberFormat="1" applyFill="1" applyFont="1" applyBorder="1"><alignment';

            if($alignments[0]['horizontal'] != 'none') {
                $contentCellStyleXfs .= ' horizontal="' . $alignments[0]['horizontal'] . '"';
                $contentCellXfsFirst .= ' horizontal="' . $alignments[0]['horizontal'] . '"';
            }
            if($alignments[0]['vertical'] != 'none') {
                $contentCellStyleXfs .= ' vertical="' . $alignments[0]['vertical'] . '"';
                $contentCellXfsFirst .= ' vertical="' . $alignments[0]['vertical'] . '"';
            }
            if(isset($globalStyles['wrapText'])) {
                $contentCellStyleXfs .= ' wrapText="1"';
                $contentCellXfsFirst .= ' wrapText="1"';
            }
            if(isset($globalStyles['textRotation'])) {
                $contentCellStyleXfs .= ' textRotation="' . $globalStyles['textRotation'] . '"';
                $contentCellXfsFirst .= ' textRotation="' . $globalStyles['textRotation'] . '"';
            }
            $contentCellStyleXfs .= '/></xf>';
            $contentCellXfsFirst .= '/></xf>';

            $contentCellXfs = '<cellXfs count="' . count(self::$_cellXfs) . '">' . "\r\n" . $contentCellXfsFirst . "\r\n";
            foreach (self::$cellxfsarr as $item)
                $contentCellXfs .= '        ' . $item . "\r\n";
            $contentCellXfs .= '    </cellXfs>';

            $content = self::makeContent('/xl/styles.xml', '{{formats}}', $formatsContent);
            if($content) {
                $content = str_replace('{{fonts}}', $fontsContent, $content);
                $content = str_replace('{{fills}}', $fillsContent, $content);
                $content = str_replace('{{borders}}', $bordersContent, $content);
                $content = str_replace('{{CellStyleXfs}}', $contentCellStyleXfs, $content);
                $content = str_replace('{{cellXfs}}', $contentCellXfs, $content);
                self::$_xl_styles = $content;
                return true;
            }
            return false;
        }
    //END Preparing the content of "the xl/styles.xml" file

    //START Preparing the content of the "xl/workbook.xml" file
        public static function prepareXl_workbookFile(array $sheets) {
            $contentReplace = '<sheets>';
            foreach ($sheets as $id => $sheet)
                $contentReplace .= '<sheet r:id="rId' . ($id + 1) . '" sheetId="' . ($id + 1) . '" name="' . $sheet . '"/>';
            $contentReplace .= '</sheets>';

            $content = self::makeContent('xl/workbook.xml', '{{sheets}}', $contentReplace);
            if($content) {
                self::$_xl_workbook = $content;
                return true;
            }
            return false;
        }
    //END Preparing the content of the "xl/workbook.xml" file

    //START Preparing the content of the "xl/_rels/workbook.xml.rels" file
        public static function prepareXl__rels_workbookFile(array $sheets) {
            $contentReplace = '';
            $ids = 0;
            foreach ($sheets as $id => $sheet) {
                $ids = $id + 1;
                $contentReplace .= '    <Relationship Id="rId' . $ids .
                    '" Type="http://schemas.openxmlformats.org/officeDocument/2006/relationships/worksheet" Target="worksheets/sheet' . $ids .
                    '.xml"/>' . "\r\n";
            }
            $ids++;
            $contentReplace .= '    <Relationship Id="rId' . $ids++ .
                '" Type="http://schemas.openxmlformats.org/officeDocument/2006/relationships/styles" Target="styles.xml"/>' . "\r\n";
            $contentReplace .= '    <Relationship Id="rId' . $ids++ .
                '" Type="http://schemas.openxmlformats.org/officeDocument/2006/relationships/theme" Target="theme/theme1.xml"/>' . "\r\n";
            $contentReplace .= '    <Relationship Id="rId' . $ids++ .
                '" Type="http://schemas.openxmlformats.org/officeDocument/2006/relationships/sharedStrings" Target="sharedStrings.xml"/>' . "\r\n";
            $contentReplace .= '    <Relationship Id="rId' . $ids++ .
                '" Type="http://schemas.openxmlformats.org/officeDocument/2006/relationships/calcChain" Target="calcChain.xml"/>';

            $content = self::makeContent('xl/_rels/workbook.xml.rels', '{{Relationships}}', $contentReplace);
            if($content) {
                self::$_xl__rels_workbook = $content;
                return true;
            }
            return false;

        }
    //END Preparing the content of the "xl/_rels/workbook.xml.rels" file

    //START Preparing the content of the "xl/worksheets/sheet[].xml" file
        public static function prepareXl_worksheets_sheetFile($values, $merges) {
            foreach ($values as $sheet => $valuesSheet) {
                $content = '<?xml version="1.0" encoding="UTF-8" standalone="yes"?>
<worksheet xmlns="http://schemas.openxmlformats.org/spreadsheetml/2006/main" xmlns:r="http://schemas.openxmlformats.org/officeDocument/2006/relationships" xmlns:mc="http://schemas.openxmlformats.org/markup-compatibility/2006" mc:Ignorable="x14ac" xmlns:x14ac="http://schemas.microsoft.com/office/spreadsheetml/2009/9/ac">
    <dimension ref="A1"/>
    <sheetViews>
        <sheetView tabSelected="1" workbookViewId="0"/>
    </sheetViews>
    <sheetFormatPr defaultRowHeight="15"/>
        <sheetData>';

                $contentSheetData = array();
                foreach ($valuesSheet as $cell => $value) {

                    $numberStr = (int) preg_replace('/\D/', '', $cell);
                    if(!is_array($contentSheetData[$numberStr]))
                        $contentSheetData[$numberStr] = [];
                    $s = 's="0"';
                    foreach(self::$_cellXfs as $i => $xf)
                        if (in_array($sheet.$cell, $xf))
                            $s = 's="' . ($i+1) . '"';
                    if(is_numeric($value))
                            $contentSheetData[$numberStr][] = ('       <c r="'.$cell.'" '.$s.'>'."\r\n".
                            '            <v>'.$value.'</v>'."\r\n".
                            '        </c>'."\r\n");
                    else if(strpos($value, '=') === 0)
                        $contentSheetData[$numberStr][] = ('       <c r="'.$cell.'" t="s" '.$s.'>'."\r\n".
                            '            <f>'.$value.'</f>'."\r\n".
                            '            <v></v>'."\r\n".
                            '        </c>'."\r\n");
                    else if($value === '')
                        $contentSheetData[$numberStr][] = ('       <c r="'.$cell.'" '.$s.'/>'."\r\n");
                    else
                            $contentSheetData[$numberStr][] = ('        <c r="'.$cell.'" t="s" '.$s.'>'."\r\n".
                            '            <v>' . (array_search($value, self::$_valuesSharedStrings)) .'</v>'."\r\n".
                            '        </c>'."\r\n");
                }
                ksort($contentSheetData);
                foreach ($contentSheetData as $row => $cols) {
                    foreach ($cols as $col) {
                        $content .= '    <row r="' . $row .
                            '" spans="1:1" x14ac:dyDescent="0.25" ht="18.75" >'."\r\n".
                            $col.
                            '    </row>'."\r\n";
                    }
                }
                $content .= '    </sheetData>';
                if(isset($merges[$sheet])) {
                    $content .= '    <mergeCells count="' . count($merges[$sheet]) . '">' . "\r\n";
                    foreach ($merges[$sheet] as $cells)
                        $content .= '        <mergeCell ref="' . $cells . '"/>' . "\r\n";
                    $content .= "    </mergeCells>\r\n";
                }

                $content .= '    <pageMargins left="0.7" right="0.7" top="0.75" bottom="0.75" header="0.3" footer="0.3"/>
</worksheet>';
                if(!is_array(self::$_xl_worksheets_sheets))
                    self::$_xl_worksheets_sheets = array();
                self::$_xl_worksheets_sheets[] = $content;
            }
        }
    //END Preparing the content of the "xl/worksheets/sheet[].xml" file
//END content preparation

//private secondary methods
        private static function makeContent($path, $contentSearch, $contentReplace) {
            $file = fopen(self::$_path.'/'.$path, 'rb');
            $content = fread($file, filesize(self::$_path.'/'.$path));
            fclose($file);
            if ($content)
                return str_replace($contentSearch, $contentReplace, $content);
            return false;
        }

        private static function putContent($path, $str) {
            $file = fopen(self::$_path.$path, 'w+b');
            if(fwrite($file, $str)) {
                fclose($file);
                return true;
            }
            fclose($file);
            return false;
        }
    }