<?php

class Bird {

  public $habitat;
  public $commonName;
  public $food = 'bugs';
  public $nestPlacement = 'tree';
  public $conservationLevel = 'low';
  public $song = 'chirp';
  public $flyer = true;

  public static $instanceCount = 0;
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

  public function canFly() {
    return ($this->flyer == true) ? 'can fly' : 'is stuck on the ground';
  }

  public function description() {
    return "This bird is the " . $this->commonName . ". It eats " . $this->food . ". Its nests are placed on the " . $this->nestPlacement . ". Its conservation level is " . $this->conservationLevel . ". It's song goes " . $this->song() . ". " . $this->canFly() . ".<br>";
  }
}

class YellowBelliedFlyCatcher extends Bird {

  public $commonName = 'yellow-bellied flycatcher';
  public $food = 'mostly insects';
  public $song = 'flat chilk';

  public static $eggNum = '3-4, sometimes 5.';
}

class Kiwi extends Bird {
    public $commonName = 'kiwi';
    public $food = 'omnivorous';
    public $flyer = false;
}
