<?php
    include "conn.php";
    if (isset($_SESSION['user']))
    {
        echo "Vui lòng đăng xuất và thao tác lại !";
        return;
    }
    if (isset($_POST['user']) && isset($_POST['pass']))
        {
            $type =true;
            $user = strtolower($_POST['user']);
            $pass = md5($_POST['pass']);
            if ( $user == "" || $pass == "")
            {
                echo "Vui lòng nhập đủ thông tin !";
                return;
            }
            if (check($user))
                echo "Không nhập kí tự đặc biệt !";
            else {
                $noidung = "SELECT * FROM account WHERE User = '$user' AND Pass = '$pass'";
                $result = mysqli_query($conn, $noidung);
                $k = mysqli_fetch_row($result);
                if ($k != 0)
                {
                    if ($k[5] == 3)
                    {
                        echo "Tài khoản đã bị khóa. Liên hệ Admin để mở khóa !";
                        return;
                    }
                    if ($k[5] == 4)
                    {
                        echo "Tài khoản đã bị xóa. Liên hệ Admin để khôi phục !";
                        return;
                    }
                    $_SESSION['user'] = $user;
                    $_SESSION['name'] = $k[2];
                    $_SESSION['email'] = $k[3];
                    $_SESSION['loai'] = $k[5];
                    echo "Đăng nhập thành công !";
                }
                else echo "Tài khoản hoặc mật khẩu không chính xác !";
            }
        }
    else echo "Có lỗi xảy ra !";

    function check($str)
    {
        return preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $str);
    }
?>