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
    if (isset($_POST['p1']) && isset($_POST['p2']) && isset($_POST['p3']) && isset($_POST['p4']) && isset($_POST['p5']) && isset($_POST['p6']) && isset($_POST['p7']) && isset($_POST['p8']) && isset($_POST['p9']) && isset($_POST['p10']))
        {
            $name = $_POST['p1'];
            $gia = $_POST['p2'];
            $han = $_POST['p3'];
            $mod = $_POST['p4'];
            $image = $_POST['p5'];
            $down = $_POST['p6'];
            $giainen = $_POST['p7'];
            $ytb = $_POST['p8'];
            $day =  date("Y/m/d");
            $plogo = $_POST['p9'];
            $type = $_POST['p10'];
            $poster = $_SESSION['name'];
            $ID = 0;
            $noidung = "SELECT ID FROM baiviet ORDER BY ID DESC LIMIT 1";
            $result = mysqli_query($conn, $noidung);
            $k = mysqli_fetch_row($result);
            if ($k != 0)
                $ID = $k[0] + 1;

            if ($plogo == "" || $type == "" || $name == "" || $gia == "" || $han == "" || $mod == "" || $image == "" || $down == "" || $giainen == "" || $ytb == "")
            {
                echo "Vui lòng nhập đủ thông tin !";
                return;
            }
            if (strlen($plogo) > 100)
            {
                echo "Logo quá dài. Vui lòng chọn lại logo khác !";
                return;
            }
            if (strlen($name) > 200)
            {
                echo "Title quá dài. Vui lòng chọn lại title khác !";
                return;
            }
            if (strlen($gia) > 50)
            {
                echo "Giá quá dài. Vui lòng nhập lại giá !";
                return;
            }
            if (strlen($han) > 20)
            {
                echo "Hạn quá dài. Vui lòng nhập lại thời hạn !";
                return;
            }
            if (strlen($image) > 300)
            {
                echo "Image quá dài. Vui lòng nhập lại Image !";
                return;
            }
            if (strlen($mod) > 500)
            {
                echo "Lệnh Mod quá dài. Vui lòng nhập lại lệnh mod !";
                return;
            }
            if (strlen($down) > 50)
            {
                echo "Link Download quá dài. Vui lòng nhập lại Link Download khác !";
                return;
            }
            if (strlen($giainen) > 20)
            {
                echo "Pass giải nén quá dài. Vui lòng nhập lại Pass giải nén !";
                return;
            }
            if (strlen($ytb) > 50)
            {
                echo "Link Youtube quá dài. Vui lòng nhập lại Link Youtube !";
                return;
            }

            $user = $_SESSION['user'];
            $noidung = "INSERT INTO luottai VALUES ('$ID','0')";
            $result = mysqli_query($conn, $noidung);
            $noidung = "INSERT INTO baiviet VALUES ('$ID','$name','$gia','$han','$mod','$image','$down','$giainen','$ytb','$poster','$day','','','$plogo','$type')";
            $result = mysqli_query($conn, $noidung);
            if ($result)
            {
                echo "Đăng bài thành công !";
                return;
            }
            echo "Có lỗi xảy ra !";
        }
    else echo "Có lỗi xảy ra !";
    
?>