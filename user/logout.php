<?php 
    session_start();
    unset($_SESSION['user_username']);
    unset($_SESSION['cart']);
    echo "<script>window.open('index.php', '_self');</script>";
?>