<?php

$errors = [];

$training = [
    'date' => '',
    'trainingEvent' => '',
    'firstWeight' => '',
    'firstRep' => '',
    'secondWeight' => '',
    'secondRep' => '',
    'thirdWeight' => '',
    'thirdRep' => ''
];

$title = '登録画面';
$content = __DIR__ . '/lib/view/new.php';

include __DIR__ . '/lib/view/layout.php';
