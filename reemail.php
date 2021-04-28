<?php
    include "conn.php";
    if (!isset($_SESSION['user']))
    {
        header ('location: index.php');
    }
    if (isset($_POST['email']))
        {
            $email = strtolower($_POST['email']);
            $pass = $_POST['pass'];

            if ($email == "" || $pass == "")
            {
                echo "Vui lòng nhập đủ thông tin !";
                return;
            }

            $pass = md5($_POST['pass']);
            if (!checkEmail($email))
            {
                echo "Vui lòng nhập lại Email !";
                return;
            }
            if (strlen($email) > 100)
            {
                echo "Email quá dài. Vui lòng nhập lại Email khác !";
                return;
            }
            $user = $_SESSION['user'];

            $noidung = "SELECT * FROM account WHERE Email = '$email'";
            $result = mysqli_query($conn, $noidung);
            $k = mysqli_fetch_row($result);
            if ($k != 0)
            {
                echo "Email đã tồn tại !";
                return;
            }

            $noidung = "SELECT * FROM account WHERE User = '$user' AND Pass = '$pass'";
            $result = mysqli_query($conn, $noidung);
            $k = mysqli_fetch_row($result);
            if (!($k != 0))
            {
                echo "Mật khẩu không chính xác !";
                return;
            }

            $noidung = "UPDATE account SET Email = '$email' WHERE User = '$user'";
            $result = mysqli_query($conn, $noidung);
            if ($result)
            {
                $_SESSION['email'] = $email;
                echo "Đổi Email thành công !";
            }
            else echo "Có lỗi xảy ra !";
        }
    else echo "Có lỗi xảy ra !";

    function checkEmail($str)
    {
        return preg_match("/([a-z0-9_]+|[a-z0-9_]+\.[a-z0-9_]+)@(([a-z0-9]|[a-z0-9]+\.[a-z0-9]+)+\.([a-z]{2,4}))/i", $str);
    }
?>