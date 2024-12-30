<?php
$title = "Edit password : ";


ob_start();
?>

<div class="container-fluid">
  <h2> Edit Password </h2>
  <form method="post" action="/edit.php">
    <label for="password">Current password:</label>
    <input type="password" name="password" id="password" placeholder="Current password" required><br><br>
    <label for="new_password">New password:</label>
    <input type="password" name="new_password" id="new_password" placeholder="Enter your new password" required><br><br>
    <input type="submit" value="Submit">
  </form>

  <?php
    function display_message($message)
      {
        echo '<div class="container-fluid">
              <p> ' . $message . ' </p>
              </div>
            ';
      }
  ?>
</div>

<?php
$body = ob_get_clean();
require_once __DIR__ . '/base.php';
?>
