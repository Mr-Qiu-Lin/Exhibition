<?php
    include "conner.php";

    if(isset($_POST['name'])){
        $name=$_POST['name'];
        $pwd=md5($_POST['pwd']);
        $pwd2=md5($_POST['pwd1']);


        if($pwd==$pwd2){
            $str=$sql->query("select * from user where name='$name'");
            if($str->num_rows>0){
                echo "<script>alert('已存在这个用户名！')</script>";
            }else{
                $info=$sql->query("insert into user (name,pwd) values ('$name','$pwd')");
                if($info){
                    echo "<script>alert('用户名创建成功！');window.location.href='index.php';</script>";
                }
            }
        }else{
            echo "<script>alert('两次密码不一致！')</script>";
        }

    }


?>

<script src="jquery-3.4.1.min.js"></script>
<script src="bootstrap.min.js"></script>
<link rel="stylesheet" href="bootstrap.min.css">

<div class="container pt-3">
    <div class="card">
        <div class="card-header">注册账号</div>
        <div class="card-body">
            <form action="" method="post">
                <div class="form-group">
                    <label for="exampleInputEmail1">用户名</label>
                    <input required type="text" name="name" class="form-control">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">密码</label>
                    <input required type="password" name="pwd" class="form-control mt-3 mb-3">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">确认密码</label>
                    <input required type="password" name="pwd1" class="form-control mt-3 mb-3">
                </div>
                <button type="submit" class="btn btn-primary">提交</button>
            </form>
        </div>
    </div>
</div>