<?php
require_once __DIR__ . '/controllers/comment_controller.php';
require_once __DIR__ . '/controllers/user_controller.php';

session_start();

if (!isset($_SESSION['ID'])) {
    header('Location: /login.php'); 
    exit(); 
}  
if (isset($_POST['submit_comment']) ){
    
    $user_id = $_SESSION['ID']; 
    $institute_id = $_POST['institute_id']; 
    $comment = $_POST['comment'];

    $commentController = new CommentController();
    $result = $commentController->add_comment($user_id, $institute_id, $comment);

    if ($result) {
        echo "Comment submitted successfully!";
        header('Location: /');
    } else {
        echo "Error submitting comment.";
    }
}else{
    echo "Not logged in!";
    //header('Location: /');
}
?>