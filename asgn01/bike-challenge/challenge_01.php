<?php

class Bicycle {

  var $brand;
  var $model;
  var $year;
  var $description;
  var $weight_kg;

  function name() {
    return $this->brand . " " . $this->model . " (" . $this->year . ")";
  }

  function weight_lbs() {
    return floatval($this->weight_kg) * 2.2046226218;
  }

  function set_weight_lbs($weight_lbs) {
    $this->weight_kg = floatval($weight_lbs) / 2.2046226218;
  }

}

$bicycle1 = new Bicycle;
$bicycle1->brand = 'Trek';
$bicycle1->model = 'Domane SL 6 Gen 4';
$bicycle1->year = '2023';
$bicycle1->description = 'A carbon endurance road bike designed for comfort and speed. Features IsoSpeed decoupler for vibration damping, Shimano 105 Di2 12-speed electronic shifting, and hydraulic disc brakes. Suited for long distance rides on varied road conditions.';
$bicycle1->weight_kg = 8.9;

$bicycle2 = new Bicycle;
$bicycle2->brand = 'Giant';
$bicycle2->model = 'Talon 1';
$bicycle2->year = '2022';
$bicycle2->description = 'A lightweight aluminum hardtail mountain bike with a 100mm suspension fork, Shimano Deore 1x10 drivetrain, and hydraulic disc brakes. Built for trail riding, cross-country, and general off-road adventures, offering stability and reliability for new and intermediate riders.';
$bicycle2->weight_kg = 13.2;

echo $bicycle1->name() . " Weight in KG: " . $bicycle1->weight_kg . "<br>Description: " . $bicycle1->description . "<br>";

echo $bicycle2->name() . " Weight in KG: " . $bicycle2->weight_kg . "<br>Description: " . $bicycle2->description . "<br>";

echo "Bicycle 1 Weight in LBs: " . $bicycle1->weight_lbs() . "<br>";
echo "Bicycle 2 Weight in LBs: " . $bicycle2->weight_lbs() . "<br>";

$bicycle1->set_weight_lbs(10);
$bicycle2->set_weight_lbs(15);

echo "Just set bicycle 1 and bicycle 2 weight in lbs with function...<br>";

echo $bicycle1->name() . " Weight in KG: " . $bicycle1->weight_kg . "<br>";
echo $bicycle2->name() . " Weight in KG: " . $bicycle2->weight_kg .  "<br>";
echo "Bicycle 1 Weight in LBs: " . $bicycle1->weight_lbs() . "<br>";
echo "Bicycle 2 Weight in LBs: " . $bicycle2->weight_lbs() . "<br>";

$object_vars = get_object_vars($bicycle1);
echo "Object vars:<br>";
echo "<pre>";
print_r($object_vars);
echo "</pre>";

$object_vars = get_object_vars($bicycle2);
echo "Object vars:<br>";
echo "<pre>";
print_r($object_vars);
echo "</pre>";
