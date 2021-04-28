<?php
    include "conn.php";
    if (!isset($_SESSION['user']))
    {
        header ('location: index.php');
    }
    if ($_SESSION['loai'] != 1)
    {
        die();
    }
    if (isset($_POST['puser']))
        {
            $Puser = $_POST['puser'];

            if ($Puser == "")
            {
                echo "Vui lòng nhập đủ thông tin !";
                return;
            }
            if (check($Puser))
            {
                echo "Không nhập ký tự đặc biệt !";
                return;
            }

            $noidung = "SELECT Loai FROM account WHERE User = '$Puser'";
            $result = mysqli_query($conn, $noidung);
            $k = mysqli_fetch_row($result);
            if ($k != 0)
            {
                if ($k[0] == 2)
                {
                    $noidung = "UPDATE account SET Loai = '3' WHERE User = '$Puser'";
                    $result = mysqli_query($conn, $noidung);
                    if ($result)
                    {
                        echo "Đã khóa !";
                        return;
                    }
                    echo "Có lỗi xảy ra !";
                    return;
                }
                if ($k[0] == 3)
                {
                    $noidung = "UPDATE account SET Loai = '2' WHERE User = '$Puser'";
                    $result = mysqli_query($conn, $noidung);
                    if ($result)
                    {
                        echo "Đã mở !";
                        return;
                    }
                    echo "Có lỗi xảy ra !";
                    return;
                }
                echo "Có lỗi xảy ra !";
                return;
            }
            echo "Không tìm thấy User !";
        }
    else echo "Có lỗi xảy ra !";
    function check($str)
    {
        return preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $str);
    } 
?>