<?php
include("../../models/m-register.php");
$msg='';
if(!empty($_GET['code']) && isset($_GET['code']))
{
   $code=addslashes(stripslashes($_GET['code']));

   $sql = "SELECT id FROM nguoidung WHERE activation='$code'";
   $nguoidung = new m_dangky();
   $nguoidung->query($sql);
   $num = $nguoidung->num_rows();
   if($num > 0)
   {
      $sql = "SELECT id FROM nguoidung WHERE activation='$code' and status='0'";
      $nguoidung->query($sql);

      if($nguoidung->num_rows() == 1)
      {
         $sql = "UPDATE nguoidung SET status='1', activation = NULL WHERE activation='$code'" or die ("câu truy vấn sai");
         $nguoidung->query($sql);
         $msg = "<p style='color: blue;'>* Đăng kí thành công, <a href='../../login.php' style='color: #FF00FF'>Đăng nhập</a> để vào website<br /></p>"; 
      }
      else
      {
         $msg ="Tài khoản của bạn đã hoạt động, không cần kích hoạt lại";
      }
      $nguoidung->disconnect();
   }
   else
   {
      $msg ="Mã kích hoạt sai.";
   }
}
?>
<!doctype html>
<html lang="en">
<head>
<meta charset="UTF-8" />
<title>PHP Email Verification Script</title>
<link rel="stylesheet" href="<?php echo $base_url; ?>style.css"/>
</head>
<body>
   <div id="main">
   <h2><?php echo $msg; ?></h2>
   </div>
</body>
</html>
