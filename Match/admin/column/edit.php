<?php
if (!isset($_GET['id']))
    die("非法请求");
$id = $_GET['id'];
$sql = new mysqli();
include "../../conner.php";
$data = $sql->query("select * from news where id=".$id)->fetch_assoc();
?>

<?php
    if(isset($_POST['title'])){
        //修改数据
        $title = $_POST['title'];
        $img = $data['img'];//获取旧图片数据
        $text = $_POST['text'];
        $time=time();
        if ($_FILES['img']['tmp_name']){
            //如果有上传图片
            $time=time();
            $img=$time.".jpg";
            $file=$_FILES['img'];
            move_uploaded_file($file['tmp_name'],"../../uploaded/".$img);
        }

        $str=$sql->query("update  news set title='$title',img='$img',text='$text',time='$time' where id=".$id );
        if($str){
            echo "<script>alert('修改成功！');location.href='index.php';</script>";
        }
    }

?>


<script src="../../jquery-3.4.1.min.js"></script>
<script src="../../bootstrap.min.js"></script>
<link rel="stylesheet" href="../../bootstrap.min.css">


<div class="container mt-5">
    <div class="card">
        <div class="card-body">
            <h2 class="card-title">修改栏目</h2>
            <form id="form" method="post" action="" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="exampleInputEmail1">栏目标题</label>
                    <input type="text" name="title" class="form-control mb-3" value="<?=$data['title']?>" required>
                </div>
                <div class="form-group">
                    <br>
                    <input type="file" name="img"  id="up_file_input" hidden>
                    <div class="btn btn-sm btn-outline-success" id="up_file_btn">重新上传</div>
                    <br> <br>
                    <img src="../../uploaded/<?=$data['img']?>" class="w-25" alt="" id="up_img">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">文本信息</label>
                    <textarea name="text" class="form-control mt-3 mb-3" required><?=$data['text']?></textarea>
                </div>
                <button type="submit" id="form_submit" class="btn btn-primary">提交</button>
                <a href="index.php" class="btn btn-success">返回列表</a>
            </form>
        </div>
    </div>
</div>


<script>
    $("#up_file_input").change(function () {
        let file = new FileReader();
        file.readAsDataURL(this.files[0]);
        file.onload = function () {
            $("#up_file_btn").html("重新上传");
            $("#up_img").attr('src',file.result);
            $("#up_img").show();
        }
    });
    $("#up_file_btn").click(function () {
        $("#up_file_input").click();
    })
</script>