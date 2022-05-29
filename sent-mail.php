<?php
    function sendTo($name, $mailTo,$noidung, $tieude)
    {
        include('class.smtp.php');
        include "class.phpmailer.php"; 
        $nFrom = "Admin Ken Play girl";    //mail duoc gui tu dau, thuong de ten cong ty ban
        $mFrom = 'email@gmail.com';  //dia chi email cua ban 
        $mPass = 'passs nè';       //mat khau email cua ban
        $nTo = $name; //Ten nguoi nhan
        $mTo = $mailTo;   //dia chi nhan mail
        $mail             = new PHPMailer();
        $body             = $noidung;   // Noi dung email
        $title = $tieude;   //Tieu de gui mail
        $mail->IsSMTP();             
        $mail->CharSet  = "utf-8";
        $mail->SMTPDebug  = 0;   // enables SMTP debug information (for testing)
        $mail->SMTPAuth   = true;    // enable SMTP authentication
        $mail->SMTPSecure = "ssl";   // sets the prefix to the servier
        $mail->Host       = "smtp.gmail.com";    // sever gui mail.
        $mail->Port       = 465;         // cong gui mail de nguyen
        // xong phan cau hinh bat dau phan gui mail
        $mail->Username   = $mFrom;  // khai bao dia chi email
        $mail->Password   = $mPass;              // khai bao mat khau
        $mail->SetFrom($mFrom, $nFrom);
        $mail->AddReplyTo('email@gmail.com', 'Admin Ken Play girl'); //khi nguoi dung phan hoi se duoc gui den email nay
        $mail->Subject    = $title;// tieu de email 
        $mail->MsgHTML($body);// noi dung chinh cua mail se nam o day.
        $mail->AddAddress($mTo, $nTo);
        // thuc thi lenh gui mail 
        if(!$mail->Send()) {
            return 0;
        } else {
            return 1;
        }
    }
?>