<?php 

class Pet {
  protected $age;
  protected $classification = 'mammal';
  protected $color;
  protected $name;
  protected $species;
  protected $weight;

  public function setAge($age) {
    $this->age = $age;
  }

  public function setClassification($class) {
    $this->classification = $class;
  }

  public function setColor($color) {
    $this->color = $color;
  }

  public function setName($name) {
    $this->name = $name;
  }

  public function setSpecies($species) {
    $this->species = $species;
  }

  public function setWeight($weight) {
    $this->weight = $weight;
  }

  public function info() {
    return $this->name . " is a " . $this->age . " year old " . $this->color . " " . $this->species . " weighing " . $this->weight . " lbs.";
  }
}

class Cat extends Pet {
  protected $isIndoor = true;
  protected $livesLeft = 9;
  protected $species = 'cat';

  public function setIsIndoor($status) {
    $this->isIndoor = $status;
  }

  public function setLivesLeft($lives) {
    $this->livesLeft = $lives;
  }

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
  protected $breed;
  protected $pottyTrained = true;
  protected $species = 'dog';

  public function setBreed($breed) {
    $this->breed = $breed;
  }

  public function setPottyTrained($status) {
    $this->pottyTrained = $status;
  }

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
  protected $classification = 'fish';
  protected $daysSinceTankCleaned = 0;
  protected $species = 'fish';
  protected $tankSize;
  protected $waterType;

  public function setDaysSinceTankCleaned($days) {
    $this->daysSinceTankCleaned = $days;
  }

  public function setTankSize($size) {
    $this->tankSize = $size;
  }

  public function setWaterType($type) {
    $this->waterType = $type;
  }

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
$bob->setName('Bob');
$bob->setAge(2);
$bob->setSpecies('gerbil');
$bob->setWeight(.1875);
$bob->setColor('tan');

echo $bob->info();
echo "<br>";

$arthur = new Cat;
$arthur->setName('Arthur');
$arthur->setAge(9);
$arthur->setWeight(12);
$arthur->setColor('grey tabby');
$arthur->setLivesLeft(7);

echo $arthur->info();
echo "<br>";
echo $arthur->isHungry();
echo "<br>";
echo $arthur->soundMade();
echo "<br>";

$opal = new Dog;
$opal->setName('Opal');
$opal->setAge(2);
$opal->setWeight(25);
$opal->setColor('black and white');
$opal->setBreed('Texas Heeler');

echo $opal->info();
echo "<br>";
echo $opal->soundMade();
echo "<br>";

$betty = new Fish;
$betty->setName('Betty');
$betty->setAge(1.5);
$betty->setSpecies('platy');
$betty->setWeight(.0469);
$betty->setColor('black');
$betty->setTankSize(20);
$betty->setWaterType('freshwater');
$betty->setDaysSinceTankCleaned(6);

echo $betty->info();
echo "<br>";
echo $betty->soundMade();
echo "<br>";
echo $betty->cleanTank();
