<?php
if (isset($_GET['id'])){
    $id = $_GET['id'];
    include "../../conner.php";
    $rel = $sql->query("delete from news where id='$id'");
    header("location: index.php");
}else die("非法请求");