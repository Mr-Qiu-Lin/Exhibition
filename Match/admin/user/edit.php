<?php
if (isset($_GET['id'])){
    $id = $_GET['id'];
    include "../../conner.php";
    
    //获取要删除的账号是否为管理员
    $rel = $sql->query("select * from user where id='$id'");
    $data = $rel->fetch_assoc();
    $is_admin = $data['is_admin'];
    if($is_admin == 1){
         $name = $_COOKIE['name'];
         $rel = $sql->query("select * from user where name='$name'");
         if($rel->fetch_assoc()['id'] != $id)
            die("该账号为管理员账号,需修改请联系维护人员");
    }
    if(isset($_POST['pwd'])){
        $pwd = md5($_POST['pwd']);
        $update_rel = $sql->query("update  user set pwd='$pwd' where id=".$id );
        if($update_rel){
            echo "<script>alert('修改成功！');location.href='index.php';</script>";
        }
    }
    
    
}else die("非法请求");

?>

<script src="../../jquery-3.4.1.min.js"></script>
<script src="../../bootstrap.min.js"></script>
<link rel="stylesheet" href="../../bootstrap.min.css">
<div class="container pt-3">
    <div class="card">
        <div class="card-header">修改用户</div>
        <div class="card-body">
            <form action="" method="post">
                <div class="form-group">
                    <label for="exampleInputEmail1">用户名:</label>
                    <b><?=$data['name']?></p>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">新密码</label>
                    <input required type="text" name="pwd" class="form-control mt-3 mb-3">
                </div>
                <button type="submit" class="btn btn-success">提交</button>
                <a href="index.php" class="btn btn-primary">返回列表</a>
            </form>
        </div>
    </div>
</div>