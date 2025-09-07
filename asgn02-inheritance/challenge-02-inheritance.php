<?php 

class Pet {
  public $age;
  public $classification = 'mammal';
  public $color;
  public $name;
  public $species;
  public $weight;

  public function info() {
    return $this->name . " is a " . $this->age . " year old " . $this->color . " " . $this->species . " weighing " . $this->weight . " lbs.";
  }
}

class Cat extends Pet {
  public $isIndoor = true;
  public $livesLeft = 9;
  public $species = 'cat';

  public function info() {
    return parent::info() . " They have " . $this->livesLeft . " lives remaining.";
  }

  public function isHungry() {
    return $this->name . " is hungry and meowing! Time to feed them.";
  }

  public function soundMade() {
    return "Meow";
  }
}

class Dog extends Pet {
  public $breed;
  public $pottyTrained = true;
  public $species = 'dog';

  public function info() {
    if ($this->age < 1) {
      return $this->name . " is a " . $this->age . " year old " . $this->color . " puppy weighing " . $this->weight . " lbs. They are a " . $this->breed . ".";
    } else {
      return parent::info() . " They are a " . $this->breed . ".";
    }
  }

  public function soundMade() {
    return "Woof";
  }
}

class Fish extends Pet {
  public $classification = 'fish';
  public $daysSinceTankCleaned = 0;
  public $species = 'fish';
  public $tankSize;
  public $waterType;

  public function cleanTank() {
    $string = "It has been " . $this->daysSinceTankCleaned . " days since the tank has been cleaned.";
    if ($this->daysSinceTankCleaned < 7) {
      $string .= " It does not need to be cleaned again yet.";
    } else {
      $string .= " It is time to clean the tank!";
    }
    return $string;
  }

  public function info() {
    return parent::info() . " They live in a " . $this->tankSize . "-gallon " . $this->waterType . " tank.";
  }

  public function soundMade() {
    return "*bubbles*";
  }
}

$bob = new Pet;
$bob->name = 'Bob';
$bob->age = 2;
$bob->species = 'gerbil';
$bob->weight = .1875;
$bob->color = 'tan';

echo $bob->info();
echo "<br>";

$arthur = new Cat;
$arthur->name = 'Arthur';
$arthur->age = 9;
$arthur->weight = 12;
$arthur->color = 'grey tabby';
$arthur->livesLeft = 7;

echo $arthur->info();
echo "<br>";
echo $arthur->isHungry();
echo "<br>";
echo $arthur->soundMade();
echo "<br>";

$opal = new Dog;
$opal->name = 'Opal';
$opal->age = .9;
$opal->weight = 25;
$opal->color = 'black and white';
$opal->breed = 'Texas Heeler';

echo $opal->info();
echo "<br>";
echo $opal->soundMade();
echo "<br>";

$betty = new Fish;
$betty->name = 'Betty';
$betty->age = 1.5;
$betty->species = 'platy';
$betty->weight = .0469;
$betty->color = 'black';
$betty->tankSize = 20;
$betty->waterType = 'freshwater';
$betty->daysSinceTankCleaned = 8;

echo $betty->info();
echo "<br>";
echo $betty->soundMade();
echo "<br>";
echo $betty->cleanTank();
