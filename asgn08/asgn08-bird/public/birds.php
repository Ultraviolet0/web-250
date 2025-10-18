<?php
require_once('../private/initialize.php');
$page_title = 'Sightings';
include(SHARED_PATH . '/public_header.php');
?>

<main>
  <h2>Bird inventory</h2>
  <p>This is a short list -- start your birding!</p>

  <div class="actions">
      <a class="action" href="<?php echo url_for('new.php'); ?>">Add Bird</a>
    </div>

  <table>
    <tr>
      <th>ID</th>
      <th>Common Name</th>
      <th>Habitat</th>
      <th>Food</th>
      <th>Conservation Status</th>
      <th>&nbsp;</th>
      <th>&nbsp;</th>
      <th>&nbsp;</th>
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
        <td><a class="action" href="<?php echo url_for('show.php?id=' . h(u($bird->id))); ?>">View</a></td>
        <td><a class="action" href="<?php echo url_for('edit.php?id=' . h(u($bird->id))); ?>">Edit</a></td>
        <td><a class="action" href="<?php echo url_for('delete.php?id=' . h(u($bird->id))); ?>">Delete</a></td>
      </tr>

    <?php } ?>

  </table>
</main>

<?php include(SHARED_PATH . '/public_footer.php'); ?>
