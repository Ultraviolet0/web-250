<?php
require_once('../../private/initialize.php');
$page_title = 'Sightings';
include(SHARED_PATH . '/public_header.php');
?>

<main>
  <h2>Bird inventory</h2>
  <p>This is a short list -- start your birding!</p>

  <?php if ($session->is_logged_in()) { ?>
    <div class="actions">
      <a class="action" href="<?php echo url_for('birds/new.php'); ?>">Add Bird</a>
    </div>
  <?php } ?>

  <table>
    <tr>
      <th>ID</th>
      <th>Common Name</th>
      <th>Habitat</th>
      <th>Food</th>
      <th>Conservation Status</th>
      <th>&nbsp;</th>
      <?php if ($session->is_logged_in()) { ?>
        <th>&nbsp;</th>
        <th>&nbsp;</th>
      <?php } ?>
    </tr>


    <?php
    $birds = Bird::find_all();
    ?>

    <?php foreach ($birds as $bird) { ?>
      <tr>
        <td><?php echo h($bird->id); ?></td>
        <td><?php echo h($bird->commonName); ?></td>
        <td><?php echo h($bird->habitat); ?></td>
        <td><?php echo h($bird->food); ?></td>
        <td><?php echo h($bird->getConservation()); ?></td>
        <td><a class="action" href="<?php echo url_for('birds/show.php?id=' . h(u($bird->id))); ?>">View</a></td>
        <?php if ($session->is_logged_in()) { ?>
          <td><a class="action" href="<?php echo url_for('birds/edit.php?id=' . h(u($bird->id))); ?>">Edit</a></td>
          <td><a class="action" href="<?php echo url_for('birds/delete.php?id=' . h(u($bird->id))); ?>">Delete</a></td>
        <?php } ?>
      </tr>

    <?php } ?>

  </table>
</main>

<?php include(SHARED_PATH . '/public_footer.php'); ?>
