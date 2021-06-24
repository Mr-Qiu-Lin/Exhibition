<?php
include "../../conner.php";
include "../admin_lay.php";
?>
<?php
    $datas = $sql->query("select * from user");
    
    $name = $_COOKIE['name'];
    $rel = $sql->query("select * from user where name='$name'");
    $id = $rel->fetch_assoc()['id'];
?>


<script src="../../jquery-3.4.1.min.js"></script>
<script src="../../bootstrap.min.js"></script>
<link rel="stylesheet" href="../../bootstrap.min.css">

<meta charset="UTF-8">
<meta name="viewport"
      content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">

<div class="container">
    <h1 class="text-center mt-5">用户管理</h1>
    <table class="w-100 table mt-5">
        <tr>
            <td>用户编号</td>
            <td>用户名</td>
            <td>是否为管理员</td>
            <td>操作</td>
        </tr>

        <?php
            while ($data=$datas->fetch_assoc()){
        ?>
        <tr class="mb-2">
            <td>#<?=$data['id']?></td>
            <td><?=$data['name']?></td>
            <td><?=$data['is_admin']?'是':'否'?></td>
            <td>
                <?php if(!$data['is_admin']):?>
                    <a href="edit.php?id=<?=$data['id']?>" class="btn btn-outline-info btn-sm">修改</a>
                    <a href="del.php?id=<?=$data['id']?>" class="btn btn-outline-danger btn-sm">删除</a>
                <?php else: ?>
                    <?php if($id == $data['id']): ?>
                        <a href="edit.php?id=<?=$data['id']?>" class="btn btn-outline-info btn-sm">修改</a>
                    <?php else: ?>
                        <p>无权修改其他管理账号</p>
                    <?php endif; ?>
                <?php endif; ?>
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

                    <form id="form" method="post" action="" enctype="multipart/form-data">
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