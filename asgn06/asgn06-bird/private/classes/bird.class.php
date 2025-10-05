<?php

class Bird
{

  public static $instanceCount = 0;

  public $commonName;
  public $habitat;
  public $food;
  public $nestPlacement;
  public $behavior;
  public $conservationID;
  public $backyardTips;

  protected const CONSERVATION_OPTIONS = [
    0 => 'Unknown',
    1 => 'Low concern',
    2 => 'Moderate concern',
    3 => 'Extreme concern',
    4 => 'Extinct'
  ];

  public function __construct($args = []) {
    $this->commonName = $args['commonName'] ?? NULL;
    $this->habitat = $args['habitat'] ?? NULL;
    $this->food = $args['food'] ?? NULL;
    $this->nestPlacement = $args['nestPlacement'] ?? NULL;
    $this->behavior = $args['behavior'] ?? NULL;
    $this->conservationID = $args['conservationID'] ?? 1;
    $this->backyardTips = $args['backyardTips'] ?? NULL;
  }

  public function getConservation() {
    return self::CONSERVATION_OPTIONS[$this->conservationID];
  }
}
