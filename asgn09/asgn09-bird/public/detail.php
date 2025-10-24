<?php require_once('../private/initialize.php'); ?>

<?php

// Get requested ID
$id = $_GET['id'] ?? false;

if (!$id) {
  redirect_to('birds.php');
}

// Find bird using ID
$bird = Bird::find_by_id($id);

?>

<?php $page_title = 'Detail: ' . $bird->commonName; ?>
<?php include(SHARED_PATH . '/public_header.php'); ?>

<main>

  <a href="birds.php">← Back to All Birds</a>

  <div class="detail">
    <dl>
      <dt>Common Name</dt>
      <dd><?php echo h($bird->commonName); ?></dd>
    </dl>
    <dl>
      <dt>Habitat</dt>
      <dd><?php echo h($bird->habitat); ?></dd>
    </dl>
    <dl>
      <dt>Diet</dt>
      <dd><?php echo h($bird->food); ?></dd>
    </dl>
    <dl>
      <dt>Conservation Status</dt>
      <dd><?php echo h($bird->getConservation()); ?></dd>
    </dl>
    <dl>
      <dt>Backyard Tips</dt>
      <dd><?php echo h($bird->backyardTips); ?></dd>
    </dl>
  </div>

</main>

<?php include(SHARED_PATH . '/public_footer.php'); ?>
