<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>登录</title>
    <link rel="stylesheet"  href="../bootstrap.min.css">
    <script src="../jquery-3.4.1.min.js"></script>
    <script src="../bootstrap.min.js"></script>
</head>
<body>
    <?php
        include "../conner.php";
        session_start();
        $name='';
        if(isset($_POST['name'])) {
            $name = $_POST['name'];
            $pwd = md5($_POST['pwd']);

            $str=$sql->query("select * from user where name='$name' and pwd='$pwd'");
            if($str->num_rows>0){
                echo "<script>alert('登录成功！')</script>";
                $user=$str->fetch_assoc();
                $_SESSION['name']=$user['name'];
                setcookie('name',$user['name'],time()+100000);
                header('location: index.php');
            }else{
                echo "<script>alert('用户名或密码错误！')</script>";
            }
        }
    ?>
    <div class="container mt-5">
        <div class="card">
            <div class="card-body">
                <div class="card-title">
                    登录账户
                </div>
                <div class="card-text">
                    <form action="" method="post">
                        <div class="form-group">
                            <label>用户名</label>
                            <input type="text" name="name" id="" class="form-control" required value="qgt">
                        </div>
                        <div class="form-group">
                            <label>密码</label>
                            <input type="password" name="pwd" id="" class="form-control" required value="123456">
                        </div>
                        <div class="form-group">
                            <button class="btn-success" type="submit">登录</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>