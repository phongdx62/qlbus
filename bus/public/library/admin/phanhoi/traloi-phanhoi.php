<?php
    session_start();
    include("../../../../models/m-admin.php");
    include("../../js_sendmail.php");

    if(isset($_SESSION["tk"]) && $_SESSION["cb"] == '0')
    {
        if(isset($_POST["maph"]))
        {
            $maph = addslashes(stripslashes($_POST["maph"]));

            $ph = new m_admin();
            $row = $ph->m_get_phanhoi($maph);
        }

        if(isset($_POST["title"]) && !empty($_POST["title"]) && isset($_POST["content"]) && !empty($_POST["content"]))
        {
            $title = addslashes(stripslashes($_POST["title"]));
            $content = addslashes(stripslashes($_POST["content"]));
            $image = addslashes(stripslashes($_POST["image"]));

            include('../public/library/send_mail.php');
            include('../public/library/class.phpmailer.php');
            include('../public/library/class.smtp.php');
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
    else
    {
        header("Location: ../../../../index.php");
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
                    <button class="button-primary" type="submit" name="<?php echo $maph; ?>" onclick="ajax_traloi_phanhoi()">Gửi</button>
                </form>
            </div>
        </div>


<script type="text/javascript">
    function ajax_traloi_phanhoi(){
        $.ajax({
            url : "public/library/admin/phanhoi/traloi-phanhoi.php",
            type : "post",
            dataType:"text",
            data : {
                maph : $(this).attr('name'),
                title : $('#title').val(),
                content : $('#content').val(),
                image : $('#image').val()
            },
            success : function (result){
                $('#admin').html(result);
            }
        });
    }
</script>