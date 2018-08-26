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

      $sql="select * from board order by id";
      $res=$conn->query($sql);

      $data_num=mysqli_num_rows($res);
      //echo $data_num;
      $per=5;
      $pages=ceil($data_num/$per);
      if (!isset($_GET["page"])) {
        $page=1;
      }else {
        $page=intval($_GET["page"]);
      }

      $start=($page-1)*$per;
      $sql="select * from board order by time DESC limit $start,$per";
      $res=$conn->query($sql);

 ?>
<html lang="en" dir="ltr">
  <head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.0/jquery.min.js"></script>
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script type="text/javascript" src="article.js"></script>
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
              <li class="active"><a href="user.php">會員中心</a></li>
              <li><a href="#">布告欄</a></li>
              <li><a href="logout.php">登出</a></li>
          </ul>
      </div>
      </div>
  </nav>
  <div class="row">
    <div class="col-md-offset-4 col-md-7">
      <h1>歡迎登入:<?php echo $_SESSION['username'] ;?></h1>
      <button class="btn btn-primary pull-right" type="button" data-toggle="modal" data-target="#myModal">發布文章</button>
      <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel">發布文章</h4>
                </div>
                      <div class="modal-body">
                        <form role="form" id="poinf" name="poinf" method="post" action="">
                          <div class="form-group">
                            <label for="name">標題</label>
                            <input type="text" id="title" name="title" class="form-control" placeholder="標題输入">
                            <label for="name">內文</label>
                            <textarea class="form-control" rows="5" id="article" name="article" placeholder="內文200字內"></textarea>
                          </div>
                        </form>
                      </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">關閉</button>
                    <button type="button" class="btn btn-primary" id="po" name="po">發布</button>
                </div>
            </div><!-- /.modal-content -->
          </div><!-- /.modal -->
      </div>
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
                $user=$row['email'];
            ?>
                <thead>
                  <tr>
                    <th scope="col"> <?php echo $time; ?></th>
                    <th scope="col"> <?php echo $title; ?></th>
                    <th scope="col"> <?php echo $article; ?></th>
                    <th scope="col"> <?php echo $user; ?></th>
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
