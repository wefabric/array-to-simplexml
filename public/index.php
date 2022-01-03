<?php

use Wefabric\ArrayToSimplexml\ArrayToSimplexml;

require __DIR__.'/../vendor/autoload.php';

$data = [
    'this' => 'is a string',
    'child' => [
        'here'=> 'is a child',
    ],
    'one' => 1
];

echo '<h2>Input</h2>';
dump($data);

echo '<h2>Output</h2>';
$xml = new SimpleXMLElement('<Object xmlns:xs="http://www.w3.org/2001/XMLSchema" />');
ArrayToSimplexml::convert($xml, $data);
dump($xml);


