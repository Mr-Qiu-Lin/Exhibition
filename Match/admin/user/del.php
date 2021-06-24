<?php
if (isset($_GET['id'])){
    $id = $_GET['id'];
    include "../../conner.php";
    
    //获取要删除的账号是否为管理员
    $rel = $sql->query("select is_admin from user where id='$id'");
    $is_admin = $rel->fetch_assoc()['is_admin'];
    if($is_admin == 0){
        //不是管理员
        $rel = $sql->query("delete from user where id='$id'");
        header("location: index.php");
    }else{
        die("该账号为管理员账号,需删除请联系维护人员");
    }
}else die("非法请求");