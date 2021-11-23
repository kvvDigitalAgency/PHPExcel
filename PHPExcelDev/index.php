<?php

use PHPExcel\models\Workbooks;
use PHPExcel\core\PHPExcel;

require_once 'models/Workbooks.php';
require_once 'core/PHPExcel.php';

$managers = [
    'Григорий' => [
        0 => [
            'date_start' => '10.12.2020',
            'date_end' => '20.12.2020',
            'product_type' => 'HoReCa',
            'description' => 'yes',
            'price' => '1000',
            'expenses' => '10',
            'client' => 'RKN',
            'order_type' => 'Завершен'
        ],
        1 => [
            'date_start' => '10.12.2020',
            'date_end' => '20.12.2020',
            'product_type' => 'HoReCa',
            'description' => 'yes',
            'price' => '1000',
            'expenses' => '10',
            'client' => 'RKN',
            'order_type' => 'Завершен'
        ],
        2 => [
            'date_start' => '10.12.2020',
            'date_end' => '20.12.2020',
            'product_type' => 'HoReCa',
            'description' => 'yes',
            'price' => '1000',
            'expenses' => '10',
            'client' => 'RKN',
            'order_type' => 'Завершен'
        ],
        3 => [
            'date_start' => '10.12.2020',
            'date_end' => '20.12.2020',
            'product_type' => 'HoReCa',
            'description' => 'yes',
            'price' => '1000',
            'expenses' => '10',
            'client' => 'RKN',
            'order_type' => 'Завершен'
        ],
    ],
    'Олег' => [
        0 => [
            'date_start' => '10.12.2020',
            'date_end' => '20.12.2020',
            'product_type' => 'HoReCa',
            'description' => 'yes',
            'price' => '1000',
            'expenses' => '10',
            'client' => 'RKN',
            'order_type' => 'Завершен'
        ],
        1 => [
            'date_start' => '10.12.2020',
            'date_end' => '20.12.2020',
            'product_type' => 'HoReCa',
            'description' => 'yes',
            'price' => '1000',
            'expenses' => '10',
            'client' => 'RKN',
            'order_type' => 'Завершен'
        ],
        2 => [
            'date_start' => '10.12.2020',
            'date_end' => '20.12.2020',
            'product_type' => 'HoReCa',
            'description' => 'yes',
            'price' => '1000',
            'expenses' => '10',
            'client' => 'RKN',
            'order_type' => 'Завершен'
        ],
    ],
];

$name = 'Отчет';
$e = new PHPExcel($name, 'Times New Roman', 14);
$e->setValuesToCells('a1', ['Отчет за период с ' . date('d.m.Y', time() - 1000000) . ' г. по ' . date('d.m.Y') . ' г..']);
$e->setFontToCells('a1:n3', 'Times New Roman', '<b/>', 14);
$e->setValuesToCells('h1', ['Дата построения отчета: ' . date('d.m.Y')]);
$e->setAlignmentToCells('h1', ['h'=>'right']);
$e->setValuesToCells('a3',['Отчет отсортирован по менеджерам.']);
$e->setAlignmentToCells('a3:n3', ['h'=>'center']);
$e->mergeCells('A3:N3');
$e->mergeCells('A1:g1');
$e->mergeCells('h1:N1');
$e->setGlobalWrapText();

$i = 5;

foreach($managers as $manager => $orders) {
    $i+=2;
    $e->setValuesToCells('a'.$i, [
        'Менеджер: '.$manager,
    ]);
    $e->mergeCells("a$i:n$i");
    $i+=2;
    $e->setValuesToCells('a'.$i.':D'.$i, [
        'Дата начала',
        'Дата сдачи',
        'Направление',
        'Описание'
    ]);
    $e->mergeCells("D$i:G$i");
    $e->setValuesToCells('h'.$i.':j'.$i, [
        'Сумма',
        'Все расходы',
        'Клиент'
    ]);
    $e->mergeCells("J$i:M$i");
    $e->setValuesToCells('n'.$i,['Тип заказа']);
    $e->setFillToCells("a$i:n$i", '4f81bd');
    $e->setAlignmentToCells("a$i:n$i", ['v'=>'center']);
    $e->setFontToCells("a$i:n$i", 'Times New Roman', '', '10.5', 'fff');
    $e->setBordersToCells('a'.$i.':n'.$i, [
        'top' => ['thin', '000'],
        'bottom' => ['thin', '000'],
        'left' => ['thin', '000'],
        'right' => ['thin', '000'],
    ]);
    foreach($orders as $order) {
        $i++;
        $e->setValuesToCells('a'.$i.':d'.$i, [
            $order['date_start'],
            $order['date_end'],
            $order['product_type'],
            $order['description']
        ]);
        $e->setBordersToCells('a'.$i.':n'.$i, [
            'top' => ['thin', '000'],
            'bottom' => ['thin', '000'],
            'left' => ['thin', '000'],
            'right' => ['thin', '000'],
        ]);
        $e->mergeCells("D$i:G$i");
        $e->setValuesToCells('h'.$i.':j'.$i, [
            $order['price'],
            $order['expenses'],
            $order['client']
        ]);
        $e->mergeCells("J$i:M$i");
        $e->setValuesToCells('h'.$i, [$order['order_type']]);
        if($i%2)
            $e->setFillToCells("a$i:n$i", 'dbe5f1');
    }
    $i+=2;
    $e->setValuesToCells('a'.$i.':a'.($i+2), [
        'Итого доход:',
        'Итого расходы:',
        'Итого прибыль:'
    ]);

    $e->mergeCells("A".$i.":B".$i);
    $e->mergeCells("A".($i + 1).":B".($i + 1));
    $e->mergeCells("A".($i + 2).":B".($i + 2));
    $a = rand(0,100000);
    $b = rand(0,100000);
    $c = $c = $a - $b;
    $e->setValuesToCells('c'.$i.':c'.($i+2), [$a,$b,$c]);
    $e->setFormatToCells('c'.$i.':c'.($i+2), 'integer');
    $e->setBordersToCells('a'.$i.':c'.($i+2), [
        'top' => ['thin', '000'],
        'bottom' => ['thin', '000'],
        'left' => ['thin', '000'],
        'right' => ['thin', '000'],
    ]);

    $i+=2;

}

$i+=2;

$e->setValuesToCells('a'.$i, ['Полный рассчет:']);
$e->setValuesToCells('a'.($i + 1).':a'.($i+3), [
    'Итого доход:',
    'Итого расходы:',
    'Итого прибыль:'
]);

$e->mergeCells("A".$i.":c".$i);
$e->mergeCells("A".($i + 1).":B".($i + 1));
$e->mergeCells("A".($i + 2).":B".($i + 2));
$e->mergeCells("A".($i + 3).":B".($i + 3));
$a = rand(0,100000);
$b = rand(0,100000);
$c = $c = $a - $b;
$e->setValuesToCells('c'.($i + 1).':c'.($i+3), [$a,$b,$c]);
$e->setFormatToCells('c'.($i + 1).':c'.($i+3), 'integer');
$e->setBordersToCells('a'.$i.':c'.($i+3), [
    'top' => ['thin', '000'],
    'bottom' => ['thin', '000'],
    'left' => ['thin', '000'],
    'right' => ['thin', '000'],
]);
$e->setFillToCells('a'.$i.':c'.($i + 3), 'dfd');

$e->createExcelFile('table');
