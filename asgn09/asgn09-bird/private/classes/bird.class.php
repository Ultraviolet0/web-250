<?php

class Bird extends DatabaseObject
{
  static protected $table_name = 'birds';
  static protected $db_columns = ['id', 'commonName', 'habitat', 'food', 'nestPlacement', 'behavior', 'conservationID', 'backyardTips'];

  public $id;
  public $commonName;
  public $habitat;
  public $food;
  public $nestPlacement;
  public $behavior;
  public $conservationID;
  public $backyardTips;

  public const CONSERVATION_OPTIONS = [
    0 => 'Unknown',
    1 => 'Low concern',
    2 => 'Moderate concern',
    3 => 'Extreme concern',
    4 => 'Extinct'
  ];

  public function __construct($args = []) {
    $this->id = $args['id'] ?? NULL;
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

  protected function validate() {
    $this->errors = [];

    if(is_blank($this->commonName)) {
      $this->errors[] = "Common name cannot be blank.";
    }
    if(is_blank($this->habitat)) {
      $this->errors[] = "Habitat cannot be blank.";
    }
    if(is_blank($this->food)) {
      $this->errors[] = "Food cannot be blank.";
    }
    if(is_blank($this->nestPlacement)) {
      $this->errors[] = "Nest placement cannot be blank.";
    }
    if(is_blank($this->behavior)) {
      $this->errors[] = "Behavior cannot be blank.";
    }
    if(is_blank($this->conservationID)) {
      $this->errors[] = "Conservation status cannot be blank.";
    }

    return $this->errors;
  }
}
