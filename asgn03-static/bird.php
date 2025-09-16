<?php

class Bird {

  public $commonName;
  public $food = 'bugs';
  public $nestPlacement = 'tree';
  public $conservationLevel;
  protected $songs = [
    'Eastern Towhee' => 'drink-your-tea!',
    'Indigo Bunting' => 'whatwhat!!',
    'Sparrow' => 'cheep-chirrup'
  ];

  public static $instanceCount;
  public static $eggNum = 0;

  public static function create(string $name): static {
    static::$instanceCount++;
    $bird = new static();
    $bird->commonName = $name;
    return $bird;
  }

  public function song() {
    return $this->songs[$this->commonName] ?? 'No known song.';
  }

  protected $flyers = [
    'Eastern Towhee' => true,
    'Indigo Bunting' => true,
    'Sparrow' => true
  ];

  public function canFly() {
    return ($this->flyers[$this->commonName] ?? false)
    ? 'This bird can fly'
    : 'This bird cannot fly';
  }

  public function description() {
    return "This bird is the " . $this->commonName . ". It eats " . $this->food . ". Its nests are placed on the " . $this->nestPlacement . ". Its conservation level is " . $this->conservationLevel . ". It's song goes " . $this->song() . ". " . $this->canFly() . ".<br>";
  }
}

class Flycatcher extends Bird {
  public static $eggNum = '3-4, sometimes 5.';
}


$sparrow = Bird::create('Sparrow');
$sparrow->conservationLevel = 'low';

echo $sparrow->description();
