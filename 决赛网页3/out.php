<?php
    session_start();
    unset($_SESSION['name']);
    setcookie('name','',time()-1);
    header('location:index.php');
?>
