<?php

use Wefabric\ArrayToSimplexml\ArrayToSimplexml;

require __DIR__.'/../vendor/autoload.php';

$data = [
    'breakfast_menu' => [
        'days' => [
            'Monday',
            'Tuesday',
            'Wednesday'
        ],
        'food' => [
            // 0 =>
            [
                'name' => 'Belgian Waffles',
                'price' => '€5.95',
                'description' => 'Two of our famous Belgian Waffles with plenty of real maple syrup',
                'calories' => 650
            ],
            // 1 =>
            [
                'name' => 'Strawberry Belgian Waffles',
                'price' => '€7.95',
                'description' => 'Light Belgian waffles covered with strawberries and whipped cream',
                'calories' => 900
            ],
            // 2 =>
            [
                'name' => 'Homestyle Breakfast',
                'price' => '€6.95',
                'description' => 'Two eggs, bacon or sausage, toast, and our ever-popular hash browns',
                'calories' => 950
            ]

        ]
    ]
];
//Copied from: https://www.w3schools.com/xml/xml_examples.asp > View an XML food menu

echo '<h2>Input</h2>';
dump($data);

echo '<h2>Output (default)</h2>';
$xml = new SimpleXMLElement('<Object xmlns:xs="http://www.w3.org/2001/XMLSchema" />');
ArrayToSimplexml::convert($xml, $data, stripNumericKeys: false);
dump($xml);
dump($xml->asXML());

echo '<h2>Output without numeric keys</h2>';
$xml = new SimpleXMLElement('<Object xmlns:xs="http://www.w3.org/2001/XMLSchema" />');
ArrayToSimplexml::convert($xml, $data, stripNumericKeys: true);
dump($xml);
dump($xml->asXML());

