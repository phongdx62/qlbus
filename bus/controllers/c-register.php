<?php 
	class C_dangky 
	{
    	public function c_register()
    	{
    		//model
	        include("models/m-register.php");
	        $m_register = new m_dangky();
			if(isset($_POST["ok"]))
			{
				$ten = addslashes(stripslashes($_POST["ten"]));
				$diachi = addslashes(stripslashes($_POST["diachi"]));
				$email = addslashes(stripslashes($_POST["email"]));
				$cmnd = addslashes(stripslashes($_POST["cmnd"]));
				$sdt = addslashes(stripslashes($_POST["sdt"]));
				$taikhoan = addslashes(stripslashes($_POST["taikhoan"]));
				$matkhau = md5(addslashes(stripslashes($_POST["matkhau"])));
				$pattern = '/^.{6,15}$/';
			}

			if(isset($ten) && isset($diachi) && isset($email) && isset($cmnd) && isset($sdt) && isset($taikhoan) && isset($matkhau))
			{	
				if(preg_match($pattern, $_POST["matkhau"]))
				{
				  	if($matkhau != md5($_POST["kt_mk"]))
					{
						$msg = "<p style='color: red;'>* Bạn nhập lại mật khẩu không đúng</p>";
					}
					else
					{
	         			$activation=md5($email.time());
						$check = $m_register->m_register($ten,$diachi,$email,$cmnd,$sdt,$taikhoan,$matkhau,$activation);

						if($check == 'fail')
						{
							$msg = "<p style='color: red;'>* Tài khoản đã tồn tại</p>";
						}
						else
						{
							//Soạn mail
			         		include('./public/library/send-mail.php');
			         		include('./public/library/class.phpmailer.php');
			         		include('./public/library/class.smtp.php');

			         		$base_url='localhost/bus/public/library/';
			         		$title = 'Thư xác nhận';
						    $content = 'Hi, <br/> <br/> Chúng tôi cần đảm bảo bạn là con người. Vui lòng bấm vào đường dẫn dưới đây để hoàn tất việc đăng ký thành viên:
				. <br/> <br/> <a href="'.$base_url.'activation.php'.'?code='.$activation.'">'.$base_url.'activation.php'.'?code='.$activation.'</a>';
						    $nTo = $ten;
						    $mTo = $email;

					        //Gửi mail
						    $mail = send_mail($title, $content, $nTo, $mTo);
						    if($mail==1)
						    	$msg = "<p style='color: #C71585;'>Một email đã được gửi đến hòm thư $email của bạn.Hãy vào mail và làm theo hướng dẫn để kích hoạt tài khoản.</p>";
						    else
					    		$msg = "<p style='color: red;'>* Có lỗi</p>";
						}
					}
				}
				else
				{
					$msg = "<p style='color: red;'>* Mật khẩu phải có độ dài từ 6 đến 15 kí tự !</p>";
				}
			}
	  		//view
	        include("views/v-register.php");
	  	}
	}
?>
