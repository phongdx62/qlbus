<?php
    session_start();
    include("../../../../models/m-admin.php");
    $ten = "<h7 style='color: #D02090;'>$_SESSION[ten]</h7>";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="icon" href="http://xe-buyt.com/favicon.ico" />
    <title>Trang quản lý</title>
    <link rel="stylesheet" href="../../../core/css/all.min.css">
    <link rel="stylesheet" href="../../../core/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../../../core/css/style-admin.css">
    <link rel="stylesheet" href="../../../core/css/bootstrap.css">
</head>
<body class="container">
    <div id="top">
        <h3>Xin chào <?php echo $ten; ?>, <a href="../../../../logout.php">Đăng xuất</a></h3>
    </div>
    <div id="menu" class="mt-3">
        <ul>
            <li style="width: 277px;"><a id="nd" name="qlnd" href="../../../../admin.php" onclick="change_color_tx()">Quản lý người dùng</a></li>
            <li style="width: 277px;"><a id="ph" name="qlph" href="../../../../admin.php" onclick="change_color_px()">Phản hồi</a></li>
            <li style="width: 277px;"><a id="dv" name="qlnvbvt" href="../../../../admin.php" onclick="change_color_nvbvt()">Quản lý đặt vé</a></li>
            <li style="width: 277px;"><a id="dmk" name="dmk" href="../../../../admin.php" onclick="change_color_dmk()">Đổi mật khẩu</a></li>
        </ul>
    </div>
    <div style="clear: left;"></div>
<?php
    if($_SESSION["cb"] == '0')
    {
        include("../../js-sendmail.php");
        $maph = addslashes(stripslashes($_GET["maph"]));
        $ph = new m_admin();
        $row = $ph->m_get_phanhoi($maph);

        if(isset($_POST["ok"]))
        {
            $title = addslashes(stripslashes($_POST["title"]));
            $content = addslashes(stripslashes($_POST["content"]));

            if(isset($title) && isset($content))
            {
                if($ph->num_rows()<1)
                {
                     echo "<p style='color:red;'>Không tìm thấy email nào!</p>";
                }
                else
                {
                    include('../../send-mail.php');
                    include('../../class.phpmailer.php');
                    include('../../class.smtp.php');
                    //Hàm htmlentities() sẽ chuyển các kí tự thích hợp thành các kí tự HTML entiies.
                    //Kí thự HTML entiies là các kí tự dùng để hiển thị các biểu tượng, kí tự trong HTML. Ví dụ muốn hiển thị 5 dấu cách, nếu bạn chỉ sử dụng dấu cách bình thường trình duyệt sẽ loại bỏ 4 dấu và chỉ dữ lại 1 dấu cách, muốn hiển thị tất cả bạn sẽ phải sử dụng HTML entiies.
                    //Hàm trim() sẽ loại bỏ khoẳng trắng( hoặc bất kì kí tự nào được cung cấp) dư thừa ở đầu và cuối chuỗi.
                    //Hàm stripslashes() sẽ loại bỏ các dấu backslashes ( \ ) có trong chuỗi. ( \ ' sẽ trở thành ' , \\ sẽ trở thành \).
                    //Hàm trả về chuỗi với các kí tự backslashes đã bị loại bỏ.
                    $email = htmlentities(trim(stripcslashes($row["email"])));
                    $taikhoan = htmlentities(trim(stripcslashes($row["taikhoan"])));
                    $new_tiltel = htmlentities(trim($title));
                    $new_content = "Xin chào {$taikhoan} ! \n\n" .htmlentities(trim($content));

                    $send = send_mail($new_tiltel, $new_content, $taikhoan, $email);
                }
                if( $send == true )
                {
                    echo "<p style='color:blue;'>Gửi email thành công ... </p>";
                }
                else
                {
                    echo "<p style='color:red;'>Không thể gửi email ...</p>";
                }
            }
        }
    }
    else
    {
        header('Location: ../../../../index.php');
    }

?>
        <div class="container">
            <div class="form-container">
                <form method="post">
                    <label for="email" style="color: #C71585;">Địa chỉ email:</label>
                    <input id="email" type="email" name="email" value="<?php echo $row['email']; ?>" required>
                    <label for="name" style="color: #C71585;">Tiêu đề:</label>
                    <input id="name" type="text" name="title" required maxlength="50">
                    <label for="message" style="color: #C71585;">Nội dung:</label>
                    <textarea id="message" name="content" rows="10" maxlength="6000" required></textarea>
                    <label for="name" style="color: #C71585;"> File đính kèm:</label>
                    <input type="file" class="form-control" id="image" name="image" style="color: #9400D3;">
                    <button class="button-primary" type="submit" name="ok">Gửi</button>
                </form>
            </div>
        </div>

        <div id="bottom" >Copyright By Công Nghệ Web TLU</div>
    </body>
<script src="public/core/js/jquery-3.2.1.min.js"></script>
</html>