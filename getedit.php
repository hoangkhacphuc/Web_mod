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
    if (isset($_POST['p0']) && isset($_POST['ppass']))
        {
            $ID = $_POST['p0'];
            $Pass = md5($_POST['ppass']);

            if ( $ID == "" || $Pass == "")
            {
                echo json_encode(array("Vui lòng nhập đủ thông tin !"));
                return;
            }
            if (check($ID))
            {
                echo json_encode(array("Không nhập ký tự đặc biệt !"));
                return;
            }
            if (!ctype_digit($ID))
            {
                echo json_encode(array("ID chỉ nhập số !"));
                return;
            }
            $user = $_SESSION['user'];
            $noidung = "SELECT Loai FROM account WHERE User = '$user' AND Pass = '$Pass'";
            $result = mysqli_query($conn, $noidung);
            $k = mysqli_fetch_row($result);
            if ($k != 0)
            {
                if ($k[0] == 1)
                {
                    $noidung = "SELECT * FROM baiviet WHERE ID = '$ID'";
                    $result = mysqli_query($conn, $noidung);
                    $k = mysqli_fetch_row($result);
                    if ($k != 0)
                    {
                        $arr = array("Lấy thông tin thành công !","$k[1]","$k[2]","$k[3]","$k[4]","$k[5]","$k[6]","$k[7]","$k[8]","$k[13]","$k[14]");
                        echo json_encode($arr);
                        return;
                    }
                    else echo json_encode(array("Không tìm thấy bài viết ID = ".$ID));
                    return;
                }
                else
                {
                    json_encode(array("Nhập mật khẩu sai !"));
                    return;
                }
            }
            echo json_encode(array("Có lỗi xảy ra !"));
        }
    else echo json_encode(array("Có lỗi xảy ra !"));

    function check($str)
    {
        return preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $str);
    }
?>