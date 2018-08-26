<!DOCTYPE html>
<?php session_start();
      if ($_SESSION['username']==null) {
        header("Location:home.php");
      }
      $servername = "localhost";
      $username = "root";
      $password = "";
      $dbname = "php_test";

      $conn = new mysqli($servername, $username, $password, $dbname);
      // Check connection
      if ($conn->connect_error) {
          die("connect fails: " . $conn->connect_error);
      }
      $email=$_SESSION['username'];
      $sql="select * from board where email='$email' order by id";
      $res=$conn->query($sql);

      $data_num=mysqli_num_rows($res);
      $per=5;
      $pages=ceil($data_num/$per);
      if (!isset($_GET["page"])) {
        $page=1;
      }else {
        $page=intval($_GET["page"]);
      }

      $start=($page-1)*$per;
      $sql="select * from board where email='$email' order by time DESC limit $start,$per";
      $res=$conn->query($sql);

 ?>
<html lang="en" dir="ltr">
  <head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="fix_article.js"></script>
    <script type="text/javascript">

    </script>

    <meta charset="utf-8">
    <title></title>


  </head>
  <body>
    <nav class="navbar navbar-default" role="navigation">
      <div class="container-fluid">
      <div class="navbar-header">
          <a class="navbar-brand" href="home.php">test/index</a>
      </div>
      <div>
          <ul class="nav navbar-nav">
              <li class="active"><a href="">會員中心</a></li>
              <li><a href="index.php">布告欄</a></li>
              <li><a href="logout.php">登出</a></li>
          </ul>
      </div>
      </div>
  </nav>
  <div class="row">
    <div class="col-md-offset-4 col-md-7">
      <h1>歡迎登入:<?php echo $_SESSION['username'] ;?></h1>

    </div>
  </div>
  <div class="row">
      <div class="col-md-offset-1 col-md-9">
        <div class="">
          <table class="table table-sm">
            <thead>
              <tr>
                <th scope="col"> 最近更新時間</th>
                <th scope="col"> 標題</th>
                <th scope="col"> 內容</th>
              </tr>
            </thead>
            <?php
              while ($row=mysqli_fetch_array($res)) {
                $time=$row['time'];
                $title=$row['title'];
                $article=$row['article'];
                $id=$row['id'];
            ?>
                <thead>
                  <tr >
                    <td scope="col"> <?php echo $time; ?></td>
                    <td scope="col"> <?php echo $title; ?></td>
                    <td scope="col"> <?php echo $article; ?></td>
                    <td scope="col"> <button class="btn btn-primary pull-right" type="button" data-toggle="modal" onclick="show(<?php echo $id;?>,'<?php echo $title;?>','<?php echo $time;?>')"data-target="#myModal">修改</button></td>
                    <td scope="col"> <button class="btn btn-primary pull-right" type="button" onclick="deletes(<?php echo $id;?>)">刪除</button></td>
                    <!--modal info-->
                    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                          <div class="modal-content">
                              <div class="modal-header">
                                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                  <h4 class="modal-title" id="myModalLabel">修改文章</h4>
                              </div>
                                    <div class="modal-body">
                                      <form role="form" id="poinf" name="poinf" method="post" action="">
                                        <div class="form-group">
                                          <label for="name" num="" id="id_num">標題</label>

                                          <textarea class="form-control" rows="5" id="article" name="article" placeholder=""></textarea>
                                        </div>
                                      </form>
                                    </div>
                              <div class="modal-footer">
                                  <button type="button" class="btn btn-default" data-dismiss="modal">關閉</button>
                                  <button type="button" class="btn btn-primary" id="fix" name="fix" onclick="fix()">發布</button>
                              </div>
                          </div><!-- /.modal-content -->
                        </div><!-- /.modal -->
                    </div>
                  </tr>
                </thead>
          <?php  }?>
          </table>

        </div>
        <?php
            echo "共".$data_num."筆留言"."-在".$page."頁"."-共".$pages."頁.";
            echo "</br> <a herf=?page=1>首頁 </a>";
            echo "第";
            for ($i=1; $i <=$pages ; $i++) {
            //  if ( $page-3 < $i && $i < $page+3 ) {
                echo "<a href=?page=".$i.">".$i."</a> ";
            //  }
            }
            echo " 頁 <a href=?page=".$pages.">末頁</a><br /><br />";
         ?>
      </div>
  </div>

  </body>
</html>
