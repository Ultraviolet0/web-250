<?php

require_once('../private/initialize.php');

if($session->is_logged_in()) {
  redirect_to(url_for('index.php'));
}

if(is_post_request()) {

  // Create record using post parameters
  $args = $_POST['member'];
  $member = new Member($args);
  $result = $member->save();

  if($result === true) {
    $new_id = $member->id;
    // Mark member as logged in
    $session->login($member);
    redirect_to(url_for('index.php'));
    $session->message('You signed up successfully.');
  } else { 
    // show errors
  }

} else {
  // display the form
  $member = new Member;
}

?>

<?php $page_title = 'New Member Signup'; ?>
<?php include(SHARED_PATH . '/public_header.php'); ?>

<main id="content">

  <a class="back-link" href="<?php echo url_for('/index.php'); ?>">&laquo; Back to Menu</a>

  <div class="member new">
    <h1>New Member Signup</h1>

    <?php echo display_errors($member->errors); ?>

    <form action="<?php echo url_for('signup.php'); ?>" method="post">

      <?php include('members/form_fields.php'); ?>

      <div id="operations">
        <input type="submit" value="Sign Up" />
      </div>
    </form>

  </div>

</main>

<?php include(SHARED_PATH . '/public_footer.php'); ?>
