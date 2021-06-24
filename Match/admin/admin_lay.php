<?php
//后台验证是否登录  以及是否为管理员
if(isset($_COOKIE['name'])){
    $name = $_COOKIE['name'];
    //一定要先引入conner.php文件
    if (!isset($sql))die("请引入conner文件");
    $rel = $sql->query("select * from user where name='$name'");
    if ($rel->num_rows < 1){
        echo "<script>alert('账户已过期,请重新登录');location.href='../login.php';</script>";
        die();
    }else 
    {
        $data = $rel->fetch_assoc();
        if ($data['is_admin'] == 0){
            echo "<script>alert('该账户不是管理员,请重新登录');location.href='../login.php';</script>";
            die();
        }
    }
}
else echo "<script>alert('请登录账户');location.href='../login.php';</script>";
?>
<nav class="navbar navbar-expand-sm navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="../../index.php">网站首页</a>
        <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#collapsibleNavId"
                aria-controls="collapsibleNavId"
                aria-expanded="false" aria-label="Toggle navigation"></button>
        <div class="collapse navbar-collapse" id="collapsibleNavId">
            <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                <li class="nav-item">
                    <a class="nav-link" href="../index.php">栏目管理</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../user">用户管理</a>
                </li>
            </ul>
            <div class="float-right">
                <a class="text-white" href="../out.php">退出登录</a>
            </div>
        </div>
    </div>
</nav>
