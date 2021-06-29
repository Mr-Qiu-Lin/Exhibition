<?php
    session_start();
    unset($_SESSION['name']);
    setcookie('name',null,time()-3600);
    header('location:index.php');
?>
