<?php
function send_mail($title, $content, $nTo, $mTo)
{
    $nFrom = 'Xe-Bus.tlu.vn';
    $mFrom = 'ddnhell169@gmail.com';
    $mPass = 'haiau201';
    $mail             = new PHPMailer();
    $body             = $content;
    $mail->IsSMTP();
    $mail->CharSet   = "utf-8";
    $mail->SMTPDebug  = 0;
    $mail->SMTPAuth   = true;
    $mail->SMTPSecure = "ssl";
    $mail->Host       = "smtp.gmail.com";
    $mail->Port       = 465;
    $mail->Username   = $mFrom;               // GMAIL username
    $mail->Password   = $mPass;               // GMAIL password
    $mail->SetFrom($mFrom, $nFrom);
    $mail->Subject    = $title;
    $mail->MsgHTML($body);
    $address = $mTo;
    $mail->AddAddress($address, $nTo);
    $mail->AddReplyTo('info@homantrang.net', 'homangtrang.net');
    if(!$mail->Send())
    {
        return 0;
    }
    else
    {
        return 1;
    }
}