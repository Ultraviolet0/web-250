<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title>Asgn03 Static</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
  <h1>Inheritance Examples</h1>

  <?php
  include 'bird.php';

  echo 'Bird Instance Count: ' . Bird::$instanceCount;
  $genericBird = Bird::create('Generic');
  echo '<p>The generic song of any bird is "' . $genericBird->song . '".</p>';
  echo 'Bird Instance Count: ' . Bird::$instanceCount;

  $flycatcher = YellowBelliedFlyCatcher::create('Yellow-bellied Flycatcher');
  echo '<p>The song of the ' . $flycatcher->commonName . ' on breeding grounds is "' . $flycatcher->song . '".</p>';
  echo 'Yellow-bellied Flycatcher Instance Count: ' . YellowBelliedFlyCatcher::$instanceCount;

  $kiwi = Kiwi::create('Kiwi');
  echo "<p>The " . $flycatcher->commonName . " " . $flycatcher->canFly() . ".</p>";
  echo "<p>The " . $kiwi->commonName . " " . $kiwi->canFly() . ".</p>";
  echo 'Kiwi Instance Count: ' . Kiwi::$instanceCount; // Instance count is shared as a static property

  ?>
</body>

</html>
