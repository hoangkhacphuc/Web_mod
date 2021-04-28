<?php
    include "conn.php";
    include "sent-mail.php";
    if (isset($_SESSION['user']))
    {
        echo "Vui lòng đăng xuất và thao tác lại !";
        return;
    }
    if (isset($_POST['email']))
        {
            $qemail = strtolower($_POST['email']);
            $day =  date("Y/m/d");
            if ( $qemail == "")
            {
                echo "Vui lòng nhập đủ thông tin !";
                return;
            }
            if (!checkEmail($qemail))
            {
                echo "Vui lòng nhập lại Email !";
                return;
            }
            else {
                $noidung = "SELECT * FROM account WHERE Email = '$qemail'";
                $result = mysqli_query($conn, $noidung);
                $k = mysqli_fetch_row($result);
                if ($k != 0)
                {
                    $noidung = "SELECT * FROM quenpass WHERE Email = '$qemail'";
                    $result = mysqli_query($conn, $noidung);
                    $q = mysqli_fetch_row($result);
                    $pas = RandomString(10); // tạo 1 chuỗi 10 kí tự random
                    $mdpas = md5($pas);
                    if ($q != 0)
                        $noidung = "UPDATE quenpass SET PassReset = '$mdpas' WHERE Email = '$qemail'";
                    else
                        $noidung = "INSERT INTO quenpass VALUES ('$k[0]','$qemail','$mdpas','$day')";
                    $result = mysqli_query($conn, $noidung);
                    $nd = "Mã kích hoạt mật khẩu mới của bạn là : <b style='color: red;'><i>$pas</i></b><br><br>
                    Vui lòng nhấn <a href='http://localhost/Web_mod/xacnhan.php' style='text-decoration: none;padding: 5px 10px; color: white; border: 1px solid green; background-color: green;'>Vào đây</a> để tới trang kích hoạt.<br><br>
                    Yêu cầu không chia sẻ mã kích hoạt này cho người khác tránh việc mất tài khoản.<br><br>
                    Thân ADMIN !";

                    if ($result)
                    {
                        sendTo($k[2],$qemail, $nd, 'Quên Mật Khẩu');
                        echo "Vui lòng kiểm tra hộp thư của Email !";
                    }
                    else echo "Có lỗi xảy ra !";
                    return;
                }
                echo "Email không chính xác !";
                return;
            }
        }
    else echo "Có lỗi xảy ra !";

    function checkEmail($str)
    {
        return preg_match("/([a-z0-9_]+|[a-z0-9_]+\.[a-z0-9_]+)@(([a-z0-9]|[a-z0-9]+\.[a-z0-9]+)+\.([a-z]{2,4}))/i", $str);
    }

    function RandomString($length)
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $randstring = '';
        for ($i = 0; $i < $length; $i++) {
            $randstring .= $characters[rand(0, strlen($characters))];
        }
        return $randstring;
    }
?>