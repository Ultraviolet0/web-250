<?php

class Bicycle extends DatabaseObject
{
  static protected $table_name = 'bicycles';
  static protected $db_columns = ['id', 'brand', 'model', 'year', 'category', 'color', 'gender', 'price', 'weight_kg', 'condition_id', 'description'];

  public $id;
  public $brand;
  public $model;
  public $year;
  public $category;
  public $color;
  public $description;
  public $gender;
  public $price;
  public $weight_kg;
  public $condition_id;

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
    $this->weight_kg = $args['weight_kg'] ?? 0.0;
    $this->condition_id = $args['condition_id'] ?? 0;
  }

  public function name()
  {
    return "{$this->brand} {$this->model} {$this->year}";
  }

  public function get_weight_kg()
  {
    return number_format($this->weight_kg, 2) . ' kg';
  }

  public function set_weight_kg($value)
  {
    $this->weight_kg = floatval($value);
  }

  public function get_weight_lbs()
  {
    $weight_lbs = floatval($this->weight_kg) * 2.2046226218;
    return number_format($weight_lbs, 2) . ' lbs';
  }

  public function set_weight_lbs($value)
  {
    $this->weight_kg = floatval($value) / 2.2046226218;
  }

  // This function acts as a translator, turning a condition ID into a readable named condition format
  public function get_condition()
  {
    return self::CONDITIONS[$this->condition_id];
  }

  protected function validate()
  {
    $this->errors = [];

    if (is_blank($this->brand)) {
      $this->errors[] = "Brand cannot be blank.";
    }
    if (is_blank($this->model)) {
      $this->errors[] = "Model cannot be blank.";
    }

    return $this->errors;
  }
}
