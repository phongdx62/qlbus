<!doctype html>
<html lang="en">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="icon" href="http://xe-buyt.com/favicon.ico" />
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="./public/core/css/all.min.css">
  <link rel="stylesheet" href="./public/core/css/bootstrap.min.css">
  <link rel="stylesheet" href="./public/core/css/style-index.css">

  <title>Dịch vụ tìm bus</title>
</head>
<body>
  <div class="container shadow full-page">
  <section class="header container">
      <div class="logo"><img src="public/core/image/logo.png" alt="Logo"><span>XE BUÝT TP HÀ NỘI</span></div>

      <nav class="navbar navbar-expand-lg navbar-light bg-dark">

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
              <a class="nav-link" href="index.php">Trang Chủ</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Giới Thiệu</a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="#">Tuyến Xe Buýt</a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="#">Tìm đường</a>
            </li>
          </ul>
      <?php
        if(isset($_SESSION["tk"]))
        {
      ?>

          <div class='info-user'>
            <div class='dropdown' style='background-color: #181412;'>
              <button class= 'bwtn btn-secondary dropdown-toggle abc' type='button' id='dropdownMenuButton' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
             <?php echo $_SESSION["tk"]." "; ?>
              </button>
              <div class='dropdown-menu' aria-labelledby='dropdownMenuButton'>
                <a id="ttcn" style="color: #000 !important;" class='dropdown-item' href="#">Thông tin cá nhân</a>
                <a id="dvt" style="color: #000 !important;" class='dropdown-item' href='#'>Đặt vé tháng</a>
                <a id="gph" style="color: #000 !important;" class='dropdown-item' href='#'>Gửi phản hồi</a>
                <a style="color: #000 !important;" class='dropdown-item' href='logout.php'>Đăng xuất</a>
              </div>
            <div>
          </div>
      <?php
        }
        else
        {
      ?>
          <a class="nav-link" href="login.php">Đăng nhập</a>
      <?php
        }
      ?>
        </div>
    </nav>
    <hr>
  </section> <!-- end header -->

  <section class="list-bus container" id="dulieu">
    <h4>Danh sách tuyến bus Hà Nội</h4>
    <div class="search col-sm-12">
    <form class="form-inline" method="post">
      <input id="key" class="form-control mr-sm-2" type="search" placeholder="Nhập mã hoặc tên tuyến" aria-label="Search">
      <a class="btn btn-outline-success my-2 my-sm-0" type="submit" onclick="timkiem()"><i class="fas fa-search"></i> Tìm kiếm</a>
    </form>
    </div> <!--  hết phần tìm kiếm -->


    <div class="row content-list my-4">
      <?php
        while ($row = $index->fetch_assoc())
        {
          if($row["matuyen"]<10)
          {
            $matuyen = "0".$row["matuyen"];
          }
          else
          {
            $matuyen = $row["matuyen"];
          }
          echo
            "
              <div class='col-sm-4' style='cursor: pointer;'>
                <a class='btn-route' id='tt' name='$row[matuyen]'>
                  <div class='item-route'>
                    <span class='icon'>$matuyen</span>
                    <div class='route-trip'>$row[tentuyen]</div>
                  </div>
                </a>
              </div>
            ";
        }
      ?>
    </div>
  </section> <!--  het danh sách các tuyến bus -->

  <script language="javascript" src="http://code.jquery.com/jquery-2.0.0.min.js"></script>
  <script type="text/javascript">
    $(document).on('click', '#tt', function(){
        var matuyen = $(this).attr('name');

        $.ajax({
            url: 'public/library/ajax-thongtin.php',
            type: 'POST',
            data: {
                matuyen: matuyen
            },
            success: function(result){
                $('#dulieu').html(result);
            }
        })
    });

    function timkiem(){
        $.ajax({
            url : "public/library/ajax-timkiem.php",
            type : "post",
            dataType:"text",
            data : {
                key : $('#key').val()
            },
            success : function (result){
                $('#dulieu').html(result);
            }
        });
    }
  </script>

  <script type="text/javascript">
      $(document).ready(function() {
          $('#dvt').click(function(e) {
              e.preventDefault();
              $('#dulieu').load('public/library/ajax-datve.php');
          });
      });
  </script>

  <script type="text/javascript">
      $(document).ready(function() {
          $('#gph').click(function(e) {
              e.preventDefault();
              $('#dulieu').load('public/library/ajax-phanhoi.php');
          });
      });
  </script>

  <script type="text/javascript">
      $(document).ready(function() {
          $('#ttcn').click(function(e) {
              e.preventDefault();
              $('#dulieu').load('public/library/ajax-profile.php');
          });
      });
  </script>

    <footer class="footer">
      <p>Xe-Bus.tlu.vn - Tìm kiếm xe buýt, danh sách, lộ trình các tuyến, trạm dừng, bản đồ đường đi xe bus tại Hà Nội</p>
    </footer>
    <br>
</div>

  <script type="text/javascript" src="./public/core/js/jquery-1.7.2.min.js"></script>
  <script type="text/javascript" src="./public/core/js/jquery-ui-1.8.21.custom.min.js"></script>
  <script src="./public/core/js/popper.min.js"></script>
  <script src="./public/core/js/bootstrap.min.js"></script>
  <script src="./public/core/js/main.js"></script>
  <script src="./public/core/js/content.js"></script>
</body>
</html>