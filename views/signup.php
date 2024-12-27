<?php
    $title = "Sign Up : "; 
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo $title . 'University Ranking System' ?></title>
  <link
    rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.min.css"
  >
  <script src="https://cdn.tailwindcss.com"></script>
  <script>
    tailwind.config = { corePlugins: { preflight: false } };
  </script>
</head>
<body class="container">
  <header class="flex justify-between">
    <h1>Welcome to University Ranking System</h1>
  </header>

  <div class="container">
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
        if(!empty($e)){ 
            print(
                "
                <div class=\"flash-messages\">
                    <ul>
                        
                            <li class=\"error_message\"> $e </li>
                    
                    </ul>
                </div>
                "
            );
        }
        if(!empty($message)){ 
            print(
                "
                <div class=\"flash-messages\">
                    <ul>
                        
                            <li class=\"error_message\"> $message </li>
                    
                    </ul>
                </div>
                "
            );
        }
    ?>        
</div>
</body>
</html>






