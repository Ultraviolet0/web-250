<?php

class Bird
{

  // ----- START OF ACTIVE RECORD CODE -----
  static protected $database;

  static public function setDatabase($database) {
    self::$database = $database;
  }

  static public function find_by_sql($sql) {
    $result = self::$database->query($sql);
    if(!$result) {
      exit("Database query failed.");
    }

    // results into objects
    $object_array = [];
    while($record = $result->fetch_assoc()) {
      $object_array[] = self::instantiate($record);
    }

    $result->free();

    return $object_array;
  }

  static public function find_all() {
    $sql = "SELECT * FROM birds";
    return self::find_by_sql($sql);
  }

  static public function find_by_id($id) {
    $sql = "SELECT * FROM birds ";
    $sql .= "WHERE id='" . self::$database->escape_string($id) . "'";
    $object_array = self::find_by_sql($sql);
    if(!empty($object_array)) {
      return array_shift($object_array);
    } else {
      return false;
    }
  }

  static protected function instantiate($record) {
    $object = new self;

    foreach($record as $property => $value) {
      if(property_exists($object, $property)) {
        $object->$property = $value;
      }
    }
    
    return $object;
  }
  // ----- END OF ACTIVE RECORD CODE -----

  public $id;
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
}
