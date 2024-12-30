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
