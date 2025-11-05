<!doctype html>

<html lang="en">
  <head>
    <title>WNC Birds <?php if(isset($page_title)) { echo '- ' . h($page_title); } ?></title>
    <meta charset="utf-8">
    <link href="<?php echo url_for('/css/styles.css'); ?>" rel="stylesheet">
  </head>

  <body>

    <header>
      <h1>
        <a href="<?php echo url_for('/index.php'); ?>">
          WNC Birds
        </a>
      </h1>
    </header>

    <nav>
      <ul>
        <?php if($session->is_logged_in()) { ?>
          <li>User: <?php echo $session->username; ?></li>
          <li><a href="<?php echo url_for('/index.php'); ?>">Menu</a></li>
          <li><a href="<?php echo url_for('/logout.php'); ?>">Logout</a></li>
        <?php } ?>
      </ul>
    </nav>

    <?php echo display_session_message(); ?>
