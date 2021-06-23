<?php
    include "conner.php";
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
            header('location:index.php');
        }else{
            echo "<script>alert('用户名火密码错误！')</script>";
            $name=$_POST['name'];
        }
    }
$log_name='';
    if(isset($_COOKIE['name'])){
        $log_name=$_COOKIE['name'];
    }
?>


    <script src="jquery-3.4.1.min.js"></script>
    <script src="bootstrap.min.js"></script>
    <link rel="stylesheet" href="bootstrap.min.css">


        <style>
            li{
                border-bottom:1px solid white ;
                margin-right:5px ;
            }
            li>a{
                color: white;
            }
            li>a:hover{
                color: white;
            }

            a.ex1{color: coral;}
            a.ex1:hover{color: coral;}

            .ipt{
                width: 100px;

            }
            .bor{
                border-radius: 0 0 10px 10px;
            }
        </style>
    
    <div class="w-100" style="background: black;height: 550px">
            <div class="container">
                <div class="row m-0">
                    <div class="col-3 text-center" style="background: #ffffe7;border-radius: 0 0 10px 10px">
                        <img  src="images/logo.png">
                    </div>
                    <div class="col-9">
                        <div class="float-right pl-2 pt-2 pr-2 bg-white bor">
                                <?php if($log_name==''){ ?>
                                    <form action="" method="post" style="border-radius: 0 0 10px 10px">
                                        <span>用户名：</span>
                                        <input required type="text" name="name" class="ipt" value="<?=$name?>">
                                        <span>密码：</span>
                                        <input required type="password" name="pwd" class="ipt">
                                        <button class="btn btn-sm text-white" style="background:blue;border-radius: 30px">登录</button>
                                        <button class="btn btn-sm text-white" style="background:blue;border-radius: 30px"><a class="text-white text-decoration-none" href="rest.php">注册</a></button>
                                    </form>

                                <?php } else { ?>
                                    <div class="p-2">
                                        欢迎您，<?=$log_name?> <a href="out.php">退出登录</a>
                                    </div>

                                <?php } ?>


                        </div>
                        <div class=" float-right w-100 mt-4">
                            <ul class="nav float-right">
                                <li class="nav-item">
                                    <a href="" class="nav-link ex1 li_1">网站首页</a>
                                </li>
                                <li class="nav-item">
                                    <a href="" class="nav-link">世赛概览</a>
                                </li>
                                <li class="nav-item">
                                    <a href="" class="nav-link">世赛中国</a>
                                </li>
                                <li class="nav-item">
                                    <a href="" class="nav-link">赛事资讯</a>
                                </li>
                                <li class="nav-item">
                                    <a href="" class="nav-link">世赛项目</a>
                                </li>
                                <li class="nav-item">
                                    <a href="" class="nav-link">风彩展示</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                
                <div class="bg-white p-3 mt-3">
                    <img class="w-100" src="images/banner1.jpg">
                </div>
            </div>
    </div>

    <div class="" style="background: #cacaca;height:820px"    >
        <div class="container">
            <div class="row pt-4">
                <?php
                    $datas=$sql->query('select * from news order by time desc');
                ?>

                <?php
                for ($i=1;$i<=4;$i++){
                    $data=$datas->fetch_assoc();
                    if($data){
                ?>
                <div class="col-3">
                      <div class="text-danger"><h6><?=$data['title'];?></h6></div>
                    <div class="p-2 rounded w-100 bg-white ">
                        <img  class="w-100" src="uploaded/<?=$data['img'];?>">
                    </div>
                <div class=" mt-2"><h6><?=$data['text']?></h6></div>
                <div  style="background: white;width: 100px" class="text-center">
                   <h6 class="p-1 text-danger"> 详细内容</h6>
                </div>
                </div>
                <?php
                        }
                    }
                ?>


            </div>
        </div>
        <div class="container mt-5 mb-5 ">
            <img class="w-100" src="images/top.png">
        </div>
        <div class="container">
         <div class="">
             <h5 class="text-danger">关于世界技能大赛</h5>
         </div>
            <div class="row">
                <div class="col-4">
                    <img class="w-100" src="images/04.jpg">
                </div>
                <div class="col-8">
                    <p class="" style="text-indent: 2em;">
                        世界技能大赛（WorldSkills Competition，WSC）是迄今全球地位最高、规模最大、影响力最大的职业技能竞赛，被誉为“世界技能奥林匹克”，其竞技水平代表了职业技能发展的世界先进水平，是世界技能组织成员展示和交流职业技能的重要平台。世界技能大赛由世界技能组织（WorldSkillsInternational，WSI）举办，每两年一届，截至目前已成功举办 44 届。
                    </p>
                    <p class="" style="text-indent: 2em;">
                        一个国家或地区在世界技能大赛中取得的成绩在一定程度上代表了这个国家或地区的技能发展水平，反映了这个国家或地区的经济技术实力。发达国家特别是制造业强国都高度重视世界技能大赛，参赛得到国家的大力支持和国民的高度关注。
                    </p>
                </div>
            </div>
        </div>
    </div>

  <div class="" style="background: url(images/footer1.png);height: 300px">
   <div class="container">
       <div class="d-flex" style="height: 150px">
           <div class="flex-grow-1 pt-3">
              <div class="float-left">
                  <p class="m-0 text-white font-weight-bold">赞助商</p>
                  <p class="text-white">技术网<br>
                      Web服务中心
                  </p>
              </div>
               <div class="float-left ml-5">
                   <p class="m-0 text-white font-weight-bold">友情链接</p>
                   <p class="text-white"> 个人博客<br>
                       技术网<br>
                       web 服务中心
                   </p>
               </div>
               <div class="float-left ml-5">
                   <p class="m-0 text-white font-weight-bold">我一直在努力着</p>
                   <p class="text-white"> 05月31日 网站首页模板改版 asp转php<br>
                                       05月30日 网站首页模板改版 div+css阶段布局<br>
                                       04月01日 增加文章评论功能<br>

                   </p>
               </div>
           </div>
           <div class="" style="width: 300px">
               <img src="images/cat_paw_prints.png" class="w-100" style="transform: translateY(-30%);" >
           </div>
       </div>
       <div style="height: 150px" class="d-flex justify-content-between align-items-end">
           <p class="text-white">Design by YourName</p>
           <p class="text-white">contact 2017-2018 </p>
       </div>
   </div>
  </div>