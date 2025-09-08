<?php

class Bicycle {

  public $brand;
  public $model;
  public $year;
  public $description = 'Used bicycle';
  private $weightKg = 0.0;
  protected $wheels = 2;

  public function name() {
    return $this->brand . " " . $this->model . " (" . $this->year . ")";
  }

  public function getWeightKg() {
    return $this->weightKg . "kg";
  }

  public function setWeightKg($weightKg) {
    $this->weightKg = $weightKg;
  }

  public function getWeightLbs() {
    return floatval($this->weightKg) * 2.2046226218 . "lbs";
  }

  public function setWeightLbs($weightLbs) {
    $this->weightKg = floatval($weightLbs) / 2.2046226218;
  }

  public function wheelDetails() {
    $wheelString = $this->wheels == 1 ? '1 wheel' : $this->wheels . ' wheels';
    return 'It has ' . $wheelString . ".";
  }

}

class Unicycle extends Bicycle {
  protected $wheels = 1;
}

$bicycle1 = new Bicycle;
$bicycle1->brand = 'Trek';
$bicycle1->model = 'Domane SL 6 Gen 4';
$bicycle1->year = '2023';
$bicycle1->description = 'A carbon endurance road bike designed for comfort and speed. Features IsoSpeed decoupler for vibration damping, Shimano 105 Di2 12-speed electronic shifting, and hydraulic disc brakes. Suited for long distance rides on varied road conditions.';
$bicycle1->setWeightKg(8.9);

$bicycle2 = new Bicycle;
$bicycle2->brand = 'Giant';
$bicycle2->model = 'Talon 1';
$bicycle2->year = '2022';
$bicycle2->description = 'A lightweight aluminum hardtail mountain bike with a 100mm suspension fork, Shimano Deore 1x10 drivetrain, and hydraulic disc brakes. Built for trail riding, cross-country, and general off-road adventures, offering stability and reliability for new and intermediate riders.';
$bicycle2->setWeightKg(13.2);

echo $bicycle1->name() . " Weight in KG: " . $bicycle1->getWeightKg() . "<br>Description: " . $bicycle1->description . "<br>";
echo $bicycle2->name() . " Weight in KG: " . $bicycle2->getWeightKg() . "<br>Description: " . $bicycle2->description . "<br>";

echo "Bicycle 1 Weight in LBs: " . $bicycle1->getWeightLbs() . "<br>";
echo "Bicycle 2 Weight in LBs: " . $bicycle2->getWeightLbs() . "<br>";
echo $bicycle2->wheelDetails() . "<br>";

$bicycle1->setWeightLbs(10);
$bicycle2->setWeightLbs(15);

echo "Just set bicycle 1 and bicycle 2 weight in lbs with function...<br>";

echo $bicycle1->name() . " Weight in KG: " . $bicycle1->getWeightKg() . "<br>";
echo $bicycle2->name() . " Weight in KG: " . $bicycle2->getWeightKg() .  "<br>";
echo "Bicycle 1 Weight in LBs: " . $bicycle1->getweightLbs() . "<br>";
echo "Bicycle 2 Weight in LBs: " . $bicycle2->getweightLbs() . "<br>";

$unicycle1 = new Unicycle;
$unicycle1->brand = 'Nimbus';
$unicycle1->model = 'Oracle 24';
$unicycle1->year = 2023;
$unicycle1->description = 'A high-performance mountain unicycle with an aluminum frame, disc brake mounts, and a durable 24-inch wheel, designed for off-road trails.';
$unicycle1->setWeightKg(6.2);

// Making weightKg a private variable made it inaccessible to methods within the Unicycle child class. Protected would be a better option as an intermediary between public and private.
echo $unicycle1->name() . " Weight in KG: " . $unicycle1->getWeightKg() . "<br>Description: " . $unicycle1->description . "<br>";
echo $unicycle1->wheelDetails() . "<br>";
