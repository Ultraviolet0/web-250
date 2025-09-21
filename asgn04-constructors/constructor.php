<?php

class Bird {
  public $commonName;
  public $latinName;

  public function __construct($commonName, $latinName) {
    $this->commonName = $commonName;
    $this->latinName = $latinName;
  }

  public function description() {
    return 'Common name: ' . $this->commonName . '<br>' . 
           'Latin name: ' . $this->latinName . '<br>';
  }
}

$robin = new Bird('American Robin', 'Turdus migratorius');
$towhee = new Bird('Eastern Towhee', 'Pipilo erythrophthalmus');

echo $robin->description();
echo '<hr>';
echo $towhee->description();
