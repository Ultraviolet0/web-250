<?php

class Bicycle
{

  public static $instanceCount = 0;

  public $brand;
  public $model;
  public $year;
  public $category;
  public $color;
  public $description;
  public $gender;
  public $price;
  protected $weightKg;
  protected $conditionID;

  public const CATEGORIES = ['Road', 'Mountain', 'Hybrid', 'Cruiser', 'City', 'BMX'];
  public const GENDERS = ['Men', 'Women', 'Unisex'];
  // Adding a constant conditions array allows us to easily change the name of various condition levels later if we desire
  public const CONDITIONS = [
    0 => 'Unlisted',
    1 => 'Beat up',
    2 => 'Decent',
    3 => 'Good',
    4 => 'Great',
    5 => 'Like New'
  ];

  public function __construct($args = [])
  {
    $this->brand = $args['brand'] ?? NULL;
    $this->model = $args['model'] ?? NULL;
    $this->year = $args['year'] ?? NULL;
    $this->category = $args['category'] ?? NULL;
    $this->color = $args['color'] ?? NULL;
    $this->description = $args['description'] ?? 'Used bicycle';
    $this->gender = $args['gender'] ?? NULL;
    $this->price = $args['price'] ?? NULL;
    $this->weightKg = $args['weightKg'] ?? 0.0;
    $this->conditionID = $args['conditionID'] ?? 0;
  }

  public function name()
  {
    return $this->brand . " " . $this->model . " (" . $this->year . ")";
  }

  public function getWeightKg()
  {
    return number_format($this->weightKg, 2) . ' kg';
  }

  public function setWeightKg($value)
  {
    $this->weightKg = floatval($value);
  }

  public function getWeightLbs()
  {
    $weightLbs = floatval($this->weightKg) * 2.2046226218;
    return number_format($weightLbs, 2) . ' lbs';
  }

  public function setWeightLbs($value)
  {
    $this->weightKg = floatval($value) / 2.2046226218;
  }

  // This function acts as a translator, turning a condition ID into a readable named condition format
  public function getCondition()
  {
    return self::CONDITIONS[$this->conditionID];
  }
}
