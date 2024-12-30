<?php
$title = "Notifications : ";
ob_start();
?>

<h2>Notifications</h2>
<ol>
  <?php foreach($notifications as $notification): ?>
    <li>
      <a href="/?uni1=<?php echo $notification['institute_id'] ?>">
        <?php echo $notification['username'] ?> commented on <?php echo $notification['institute_name'] ?>: "<?php echo $notification['comment'] ?>"
      </a>
    </li>
  <?php endforeach ?>
</ol>

<?php
$body = ob_get_clean();
require_once __DIR__ . '/base.php';
?>
