<?php

class Bird {
  public $commonName;
  public $latinName;

  public function __construct($args=[]) {
    $this->commonName = $args['commonName'] ?? NULL;
    $this->latinName = $args['latinName'] ?? NULL;
  }

  public function description() {
    return 'Common name: ' . $this->commonName . '<br>' . 
           'Latin name: ' . $this->latinName . '<br>';
  }
}

$flycatcher = new Bird(['commonName'=>'Acadian Flycatcher', 'latinName'=>'Empidonax virescens']);
$wren = new Bird(['commonName'=>'Carolina Wren', 'latinName'=>'Thryothorus ludovicianus']);

echo $flycatcher->description();
echo '<hr>';
echo $wren->description();
