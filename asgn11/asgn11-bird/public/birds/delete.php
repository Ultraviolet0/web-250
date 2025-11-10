<?php

require_once('../../private/initialize.php');

require_login();

if(!isset($_GET['id'])) {
  redirect_to(url_for('birds/birds.php'));
}
$id = $_GET['id'];
$bird = Bird::find_by_id($id);
if ($bird == false) {
  redirect_to(url_for('birds/birds.php'));
}

if(is_post_request()) {

  // Delete bird
  $result = $bird->delete();
  $session->message('The bird was deleted successfully.');
  redirect_to(url_for('birds/birds.php'));

} else {
  // Display form
}

?>

<?php $page_title = 'Delete Bird'; ?>
<?php include(SHARED_PATH . '/public_header.php'); ?>

<main id="content">

  <a class="back-link" href="<?php echo url_for('birds/birds.php'); ?>">&laquo; Back to List</a>

  <div class="bird delete">
    <h1>Delete Bird</h1>
    <p>Are you sure you want to delete this bird?</p>
    <p class="item"><?php echo h($bird->commonName); ?></p>

    <form action="<?php echo url_for('birds/delete.php?id=' . h(u($id))); ?>" method="post">
      <div id="operations">
        <input type="submit" name="commit" value="Delete Bird" />
      </div>
    </form>
  </div>

</main>

<?php include(SHARED_PATH . '/public_footer.php'); ?>
