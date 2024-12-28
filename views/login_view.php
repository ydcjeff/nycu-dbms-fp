<?php
$title = "Login : ";
ob_start();
?>

<div class="container-fluid">
  <h2>Login</h2>
  <form action="/login.php" method="POST">
    <div>
      <label for="username">Username:</label>
      <input type="text" id="username" name="username" placeholder="Enter a username" required>
    </div>
    <div>
      <label for="password">Password:</label>
      <input type="password" id="password" name="password" placeholder="Enter a password" required>
    </div>
    <button type="submit" class="login-btn">Login</button>
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
