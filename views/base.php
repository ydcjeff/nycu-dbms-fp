<!doctype html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo ($title ?? '') . 'University Ranking System' ?></title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.min.css">
  <script src="https://cdn.tailwindcss.com"></script>
  <script>
    tailwind.config = { corePlugins: { preflight: false } };
  </script>
  <style>
    /* https://picocss.com/docs/css-variables */
    :root {
      --pico-font-size: 1rem;
    }
  </style>
</head>

<body class="container">
  <header class="flex justify-between h-[90px] sticky top-0">
    <h1><a href="/">Welcome to University Ranking System</a></h1>
    <nav class="items-center gap-x-2">
      <?php if (isset($_SESSION['username'])): ?>
        <?php echo $_SESSION['username'] ?>
        <a href="/notifications.php">Notifications</a>
        <a href="/logout.php">Logout</a>
        <a href="/edit.php">Edit password</a>
      <?php else: ?>
        <a href="/login.php">Login</a>
        <a href="/signup.php">Sign up</a>
      <?php endif ?>
    </nav>
  </header>
  <?php echo $body ?>
</body>

</html>
