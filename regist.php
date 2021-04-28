<?php
    include "conn.php";
    if (isset($_SESSION['user']))
    {
        echo "Vui lòng đăng xuất và thao tác lại !";
        return;
    }
    if (isset($_POST['user']) && isset($_POST['pass']) && isset($_POST['repass']) && isset($_POST['email']))
        {
            $type =true;
            $user = strtolower($_POST['user']);
            $pass = md5($_POST['pass']);
            $repass = md5($_POST['repass']);
            $email = strtolower($_POST['email']);
            $day =  date("Y/m/d");
            if ( $user == "" || $pass == "" || $repass == "" || $email == "")
            {
                echo "Vui lòng nhập đủ thông tin !";
                return;
            }
            if (check($user))
            {
                echo "Không nhập ký tự đặc biệt !";
                $type = false;
                return;
            }
            if (!checkEmail($email))
            {
                echo "Vui lòng nhập lại Email !";
                $type = false;
                return;
            }
            if (strlen($email) > 100)
            {
                echo "Email quá dài. Vui lòng chọn lại Email khác !";
                return;
            }
            if (strlen($user) > 20)
            {
                echo "Tên đăng nhập quá dài. Vui lòng chọn tên đăng nhập khác !";
                return;
            }
            if ($pass != $repass)
            {
                echo "Nhập lại mật khẩu không chính xác !";
                $type = false;
                return;
            }
            if (strlen($pass) > 500)
            {
                echo "Mật khẩu quá dài. Vui lòng chọn mật khẩu khác !";
                return;
            }
            
            $noidung = "SELECT * FROM account WHERE User = '$user'";
            $result = mysqli_query($conn, $noidung);
            $k = mysqli_fetch_row($result);
            if ($k != 0)
            {
                echo "Tài khoản đã tồn tại !";
                $type = false;
                return;
            }

            $noidung = "SELECT * FROM account WHERE Email = '$email'";
            $result = mysqli_query($conn, $noidung);
            $k = mysqli_fetch_row($result);
            if ($k != 0)
            {
                echo "Email đã tồn tại !";
                $type = false;
                return;
            }

            if ($type)
            {
                $noidung = "INSERT INTO account VALUES ('$user','$pass', '$user','$email','$day','2')";
                $result = mysqli_query($conn, $noidung);
                if ($result)
                {
                    echo "Đăng ký thành công !";
                }
                else echo "Có lỗi xảy ra !";
            }
        }
    else echo "Có lỗi xảy ra !";
    
    function check($str)
    {
        return preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $str);
    }

    function checkEmail($str)
    {
        return preg_match("/([a-z0-9_]+|[a-z0-9_]+\.[a-z0-9_]+)@(([a-z0-9]|[a-z0-9]+\.[a-z0-9]+)+\.([a-z]{2,4}))/i", $str);
    }
?>