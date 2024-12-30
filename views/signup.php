<?php
$title = "Sign Up : ";
ob_start();
?>

<div class="container-fluid">
  <h2>Sign Up</h2>
  <form action="/signup.php" method="POST">
    <div>
      <label for="username">Username:</label>
      <input type="text" id="username" name="username" placeholder="Enter a username" required>
    </div>
    <div>
      <label for="password">Password:</label>
      <input type="password" id="password" name="password" placeholder="Enter a password" required>
    </div>
    <button type="submit" class="signup-btn">Sign Up</button>
  </form>

  <div class="back-to-login">
    <p>Already have an account? <a href="login.php">Back to Login</a></p>
  </div>
  <?php if (isset($success)): ?>
    <output class="text-green-600 p-4 bg-green-300"><?php echo $success ?></output>
    <script>
      setTimeout(() => location.pathname = '/login.php', 3000);
    </script>
  <?php endif ?>
  <?php if (isset($error)): ?>
    <output class="text-red-600 p-4 bg-red-300"><?php echo $error ?></output>
  <?php endif ?>
</div>

<?php
$body = ob_get_clean();
require_once __DIR__ . '/base.php';
?>
