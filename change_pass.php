<?php
    include "conn.php";
    if (!isset($_SESSION['user']))
    {
        header ('location: index.php');
    }
    if (isset($_POST['pass']) && isset($_POST['newpass']) && isset($_POST['renewpass']))
        {
            $pass = md5($_POST['pass']);
            $newpass = md5($_POST['newpass']);
            $renewpass = md5($_POST['renewpass']);
            if ( $pass == "" || $newpass == "" || $renewpass == "")
            {
                echo "Vui lòng nhập đủ thông tin !";
                return;
            }

            if (strlen($newpass) > 500)
            {
                echo "Mật khẩu quá dài. Vui lòng chọn lại mật khẩu khác !";
                return;
            }
            
            if ($newpass != $renewpass)
            {
                echo "Nhập lại mật khẩu không chính xác !";
                return;
            }

            $user = $_SESSION['user'];
            $noidung = "SELECT * FROM account WHERE User = '$user' AND Pass = '$pass'";
            $result = mysqli_query($conn, $noidung);
            $k = mysqli_fetch_row($result);
            if (!($k != 0))
            {
                echo "Mật khẩu cũ không chính xác !";
                return;
            }
            
            $noidung = "UPDATE account SET Pass = '$newpass' WHERE User = '$user'";
            $result = mysqli_query($conn, $noidung);
            if ($result)
            {
                echo "Đổi mật khẩu thành công !";
            }
            else echo "Có lỗi xảy ra !";
        }
    else echo "Có lỗi xảy ra !";
    
?>