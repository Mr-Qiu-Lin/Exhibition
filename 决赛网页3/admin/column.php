<?php
    include "../conner.php";
    if(isset($_POST['title'])){
        $title=$_POST['title'];
        $img=time().".jpg";
        $text=$_POST['text'];

        $file=$_FILES['img'];

        move_uploaded_file($file['tmp_name'],"../uploaded/".$img);
        $time=time();
        $str=$sql->query("insert into news (title,img,text,time) values ('$title','$img','$text','$time')" );
        if($str){
            echo "<script>alert('添加成功！')</script>";
        }
    }

?>

<?php
    $datas=$sql->query('select * from news order by time desc');
?>


<script src="../jquery-3.4.1.min.js"></script>
<script src="../bootstrap.min.js"></script>
<link rel="stylesheet" href="../bootstrap.min.css">



<div class="container">
    <h1 class="text-center mt-5">栏目管理</h1>
    <button class="btn btn-primary" data-toggle="modal" data-target="#mod">
         添加数据
    </button>
    <table class="w-100 text-center mt-5">
        <tr>
            <td>标题</td>
            <td>图片</td>
            <td>文本信息</td>
            <td>操作</td>
        </tr>

        <?php
            while ($data=$datas->fetch_assoc()){
        ?>
        <tr>
            <td><?=$data['title'];?></td>
            <td><img width="300px" src="../uploaded/<?=$data['img'];?>"></td>
            <td><?=$data['text'];?></td>
            <td>
                <button>aa</button>
            </td>
        </tr>
        <?php } ?>
    </table>

    <div class="modal fade" id="mod">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">添加栏目</h5>
                </div>
                <div class="modal-body">

                    <form method="post" action="column.php">
                        <div class="form-group">
                            <label for="exampleInputEmail1">栏目标题</label>
                            <input type="text" name="title" class="form-control mb-3" required>
                        </div>
                        <div class="form-group">
                            <br>
                            <input type="file" name="img"  id="up_file_input" hidden>
                            <div class="btn btn-sm btn-outline-success" id="up_file_btn">添加图片</div>
                            <br> <br>
                            <img src="" class="w-50" alt="" id="up_img">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">文本信息</label>
                            <textarea name="text" class="form-control mt-3 mb-3" required></textarea>
                        </div>
                        <button type="submit" id="form_submit" class="btn btn-primary">提交</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>
<script>
    $("#up_img").hide();
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
    $("#form_submit").click(function () {
        if (false){//

        }
        return false;
    });
</script>

