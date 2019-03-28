<?php
  session_start();
  if(isset($_SESSION["tk"]))
  {
    $tk = $_SESSION["tk"];

    if(isset($_POST["mkc"]) && !empty($_POST["mkc"]) && isset($_POST["mkm"]) && !empty($_POST["mkm"]) && isset($_POST["kt_mk"]) && !empty($_POST["kt_mk"]))
    {
      $mkc = md5(addslashes(stripslashes($_POST["mkc"])));
      $mkm = md5(addslashes(stripslashes($_POST["mkm"])));
      $kt_mk = md5(addslashes(stripslashes($_POST["kt_mk"])));
      include("../../models/m-admin.php");
      $nd = new m_admin();
      $sql = "SELECT taikhoan, matkhau FROM nguoidung WHERE taikhoan = '$tk' ";
      $nd->query($sql);
      $data = $nd->fetch_assoc();

      if($mkc != $data["matkhau"])
      {
        $msg = "<p style='color: red;'>* Bạn nhập sai mật khẩu !</p>";
      }
      else
      {
        if($mkm != $kt_mk)
        {
          $msg = "<p style='color: red;'>* Mật khẩu nhập lại không đúng !</p>";
        }
        else
        {
          $sql = "UPDATE nguoidung SET matkhau = '$mkm' WHERE taikhoan = '$tk'";
          $nd->query($sql);
          $msg = "<p style='color: #CC00FF;'>Đổi mật khẩu thành công.</p> ";
        }
      }
      $nd->disconnect();
    }
  }

?>
<div id="change-data">
  <div id="add-data" style="margin-left: 300px; width: 500px;">
    <br>
    <form action="#" method="post">
    <h2 style="color: #FF9999; margin-left: 165px;">Đổi mật khẩu</h2>
    <br>
      <div class="mb-3">
        <label for="inputPassword" class="sr-only"></label>
        <input type="password"  id="mkc" class="form-control is-valid" placeholder="Mật khẩu cũ" required >
      </div>
      <div class="mb-3">
        <label for="inputPassword" class="sr-only"></label>
        <input type="password"  id="mkm" class="form-control is-valid" placeholder="Mật khẩu mới" required >
      </div>
      <div class="mb-3">
        <label for="inputPassword" class="sr-only"></label>
        <input type="password"  id="kt_mk" class="form-control is-valid" placeholder="Nhập lại mật khẩu" required >
      </div>
      <br>
      <center><button type="button" class="btn btn-warning" onclick="ajax_doi_mk()"><span class="glyphicon glyphicon-edit"></span>Đổi mật khẩu</button></center>
      <br>
      <div>
        <?php
          if(isset($msg))
          {
            echo $msg;
          }
        ?>
      </div>
    </form>
  </div>
</div>

<script type="text/javascript">
    function ajax_doi_mk(){
        $.ajax({
            url : "public/library/ajax-dmk.php",
            type : "post",
            dataType:"text",
            data : {
                mkc : $('#mkc').val(),
                mkm : $('#mkm').val(),
                kt_mk : $('#kt_mk').val()
            },
            success : function (result){
                $('#change-data').html(result);
            }
        });
    }
</script>