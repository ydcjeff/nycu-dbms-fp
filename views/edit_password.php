<?php
$title = "Edit password : ";
ob_start();
?>

<div class="container-fluid">
  <h2> Edit Password </h2>
  <form method="post" action="/edit.php">
    <div>
      <label for="password">Current password:</label>
      <input type="password" name="password" id="password" placeholder="Current password" required>
    </div>
    <div>
      <label for="new_password">New password:</label>
      <input type="password" name="new_password" id="new_password" placeholder="Enter your new password" required>
    </div>
    <input type="submit" value="Submit">
  </form>
  <?php if (isset($success)): ?>
    <output class="text-green-600 p-4 bg-green-300"><?php echo $success ?></output>
  <?php endif ?>
  <?php if (isset($error)): ?>
    <output class="text-red-600 p-4 bg-red-300"><?php echo $error ?></output>
  <?php endif ?>
</div>

<?php
$body = ob_get_clean();
require_once __DIR__ . '/base.php';
?>
