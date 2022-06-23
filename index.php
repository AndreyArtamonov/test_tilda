<?php

require_once ('GeneratorLadder.php');
require_once ('GeneratorArray.php');
require_once ('DetectorIp.php');

echo '<h2>Задача 1: Лесенка из цифр</h2>';
$generatorLadder = new GeneratorLadder();
$generatorLadder->min(1)->max(100)->generate();

echo '<h2>Задача 2: Сформировать двумерный массив</h2>';
$generatorArray = new GeneratorArray();
$generatorArray->min(1)->max(1000)->generate(7, 5);

var_dump($generatorArray->getResult());


/**
 * 95.220.18.20 - Москва
 * 195.70.196.197 - Питер
 * 213.87.224.239 - Кемерово
 * 176.64.30.239 - Алматы (нет в базе, выводить дефолтный общий номер)
 */

echo '<h2>Задача 3: Безотвественный маркетолог</h2>';

$detectorCityMoscow = new DetectorIp('95.220.18.20');
$detectorCityPiter = new DetectorIp('195.70.196.197');
$detectorCityKemerovo = new DetectorIp('213.87.224.239');
$detectorCityAlmaty = new DetectorIp('176.64.30.239');

echo $detectorCityMoscow->getPhone() . "</br>";
echo $detectorCityPiter->getPhone() . "</br>";
echo $detectorCityKemerovo->getPhone() . "</br>";
echo $detectorCityAlmaty->getPhone() . "</br>";