<?php

class Bird {

  var $commonName;
  var $food = 'bugs';
  var $nestPlacement = 'tree';
  var $conservationLevel;

  var $songs = [
    'Eastern Towhee' => 'drink-your-tea!',
    'Indigo Bunting' => 'whatwhat!!'
  ];

  function song() {
    return $this->songs[$this->commonName] ?? 'No known song.';
  }

  var $flyers = [
    'Eastern Towhee' => true,
    'Indigo Bunting' => true
  ];

  function canFly() {
    return ($this->flyers[$this->commonName] ?? false)
    ? 'This bird can fly'
    : 'This bird cannot fly';
  }

  function description() {
    return "This bird is the " . $this->commonName . ". It eats " . $this->food . ". Its nests are placed on the " . $this->nestPlacement . ". Its conservation level is " . $this->conservationLevel . ". It's song goes " . $this->song() . ". " . $this->canFly() . ".<br>";
  }
}

$bird1 = new Bird;
$bird1->commonName = 'Eastern Towhee';
$bird1->food = 'seeds, fruits, insects, spiders';
$bird1->nestPlacement = 'ground';
$bird1->conservationLevel = 'Low';

$bird2 = new Bird;
$bird2->commonName = 'Indigo Bunting';
$bird2->food = 'small seeds, berries, buds, and insects';
$bird2->nestPlacement = 'roadsides, railroads, and on the edges of woods';
$bird2->conservationLevel = 'Low';

echo "Bird 1: " . $bird1->description();
echo "Bird 2: " . $bird2->description();
