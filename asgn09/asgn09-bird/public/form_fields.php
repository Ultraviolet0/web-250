<?php
// prevents this code from being loaded directly in the browser
// or without first setting the necessary object
if (!isset($bird)) {
  redirect_to(url_for('birds.php'));
}
?>

<dl>
  <dt>Common Name</dt>
  <dd><input type="text" name="bird[commonName]" value="<?php echo h($bird->commonName); ?>" /></dd>
</dl>

<dl>
  <dt>Habitat</dt>
  <dd><input type="text" name="bird[habitat]" value="<?php echo h($bird->habitat); ?>" /></dd>
</dl>

<dl>
  <dt>Food</dt>
  <dd><input type="text" name="bird[food]" value="<?php echo h($bird->food); ?>" /></dd>
</dl>

<dl>
  <dt>Nest Placement</dt>
  <dd><input type="text" name="bird[nestPlacement]" value="<?php echo h($bird->nestPlacement); ?>" /></dd>
</dl>

<dl>
  <dt>Behavior</dt>
  <dd><input type="text" name="bird[behavior]" value="<?php echo h($bird->behavior); ?>" /></dd>
</dl>

<dl>
  <dt>Conservation Status</dt>
  <dd>
    <select name="bird[conservationID]">
      <option value=""></option>
      <?php foreach (Bird::CONSERVATION_OPTIONS as $consID => $consName) { ?>
        <option value="<?php echo $consID; ?>" <?php if ($bird->conservationID == $consID) echo 'selected'; ?>><?php echo $consName; ?></option>
      <?php } ?>
    </select>
  </dd>
</dl>

<dl>
  <dt>Backyard Tips</dt>
  <dd><textarea name="bird[backyardTips]" rows="5" cols="50"><?php echo h($bird->backyardTips); ?></textarea></dd>
</dl>
