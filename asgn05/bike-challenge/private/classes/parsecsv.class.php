<?php

class ParseCSV
{

  // Having the delimiter in a variable allows us to easily change it later if we are working with a file with a different delimiter than the standard comma
  public static $delimiter = ',';

  private $filename;
  private $header;
  private $data = [];
  private $rowCount = 0;

  public function __construct($filename = '')
  {
    if ($filename != '') {
      $this->file($filename);
    }
  }

  // Checks to see if the file exists and is readable. If not, it echos an error and returns false, if so it returns the filename and true
  public function file($filename) {
    if(!file_exists($filename)) {
      echo "File does not exist.";
      return false;
    } elseif(!is_readable($filename)) {
      echo "File is not readable.";
      return false;
    }
    $this->filename = $filename;
    return true;
  }

  public function parse()
  {
    if(!isset($this->filename)) {
      echo "File not set.";
      return false;
    }

    // clear any previous results
    $this->reset();

    $file = fopen($this->filename, 'r');
    while (!feof($file)) {
      $row = fgetcsv($file, 0, self::$delimiter);
      if ($row == [NULL] || $row === FALSE) {
        continue;
      }
      if (!$this->header) {
        $this->header = $row;
      } else {
        $this->data[] = array_combine($this->header, $row);
        $this->rowCount++;
      }
    }
    fclose($file);

    return $this->data;
  }

  // Reads back the data from the last time parse() was run
  public function lastResults() {
    return $this->data;
  }

  // This function allows us to read the row count while still maintaining it as a private, unmodifiable property so only the parse function can actually change the row count
  public function getRowCount() {
    return $this->rowCount;
  }

  // This function resets data first if parse() is called more than once rather than just writing all the information again which would result in data duplication
  private function reset() {
    $this->header = NULL;
    $this->data = [];
    $this->rowCount = 0;
  }
}
