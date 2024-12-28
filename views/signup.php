<?php
    $title = "Sign Up : "; 
    ob_start();
?>

<div class="container-fluid">
  <h2>Sign Up</h2>
  <form action="/signup.php" method="POST"  >
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
    
  <?php 
  
  function display_message( $message){
    echo '<div class="container-fluid">
          <p> '.$message. ' </p>
          </div> 
        ';
  }

  ?>  
</div>

<?php
$body = ob_get_clean();
require_once __DIR__ . '/base.php';
?>







