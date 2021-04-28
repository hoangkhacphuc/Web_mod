<?php
    include "conn.php";
    if (!isset($_SESSION['user']))
    {
        header ('location: index.php');
    }
    if (isset($_POST['name']))
        {
            $name = $_POST['name'];
            if ( $name == "")
            {
                echo "Vui lòng nhập đủ thông tin !";
                return;
            }
            if (check($name))
            {
                echo "Không nhập ký tự đặc biệt !";
                return;
            }
            if (strlen($name) > 15)
            {
                echo "Tên quá dài. Vui lòng chọn lại tên khác !";
                return;
            }
            $user = $_SESSION['user'];
            $noidung = "UPDATE account SET Name = '$name' WHERE User = '$user'";
            $result = mysqli_query($conn, $noidung);
            if ($result)
            {
                $_SESSION['name'] = $name;
                echo "Đổi tên thành công !";
            }
            else echo "Có lỗi xảy ra !";
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