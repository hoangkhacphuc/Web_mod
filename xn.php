<?php
    include "conn.php";
    if (isset($_SESSION['user']))
    {
        echo "Vui lòng đăng xuất và thao tác lại !";
        return;
    }
    if (isset($_POST['email']) && isset($_POST['ma']) && isset($_POST['pa']) && isset($_POST['rpa']))
        {
            $xnemail = strtolower($_POST['email']);
            $ma = md5($_POST['ma']);
            $pa = md5($_POST['pa']);
            $rpa = md5($_POST['rpa']);

            if ( $xnemail == "" || $ma == "" || $pa == "" || $rpa == "")
            {
                echo "Vui lòng nhập đủ thông tin !";
                return;
            }
            if (!checkEmail($xnemail))
            {
                echo "Vui lòng nhập lại Email !";
                return;
            }
            if ($pa != $rpa)
            {
                echo "Nhập lại mật khẩu không chính xác !";
                return;
            }
            else {
                $noidung = "SELECT * FROM quenpass WHERE Email = '$xnemail'";
                $result = mysqli_query($conn, $noidung);
                $k = mysqli_fetch_row($result);
                if ($k != 0)
                {
                   if ($k[2] == $ma)
                   {
                        $noidung = "DELETE FROM quenpass WHERE Email = '$xnemail'";
                        $result = mysqli_query($conn, $noidung);
                        $noidung = "UPDATE account SET Pass = '$pa' WHERE Email = '$xnemail'";
                        $result = mysqli_query($conn, $noidung);
                        echo "Kích hoạt mật khẩu mới thành công !";
                        return;
                   }
                   echo "Mã kích hoạt sai !";
                   return;
                }
                echo "Vui lòng vào Đăng Nhập > Quên Mật Khẩu và nhập Email để nhận mã kích hoạt !";
                return;
            }
        }
    else echo "Có lỗi xảy ra !";

    function checkEmail($str)
    {
        return preg_match("/([a-z0-9_]+|[a-z0-9_]+\.[a-z0-9_]+)@(([a-z0-9]|[a-z0-9]+\.[a-z0-9]+)+\.([a-z]{2,4}))/i", $str);
    }

?>