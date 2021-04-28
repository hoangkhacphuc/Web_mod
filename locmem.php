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
            $Puser = strtolower($_POST['puser']);

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

            $user = $_SESSION['user'];

            $noidung = "SELECT * FROM account WHERE User = '$Puser'";
            $result = mysqli_query($conn, $noidung);
            $k = mysqli_fetch_row($result);
            if ($k != 0)
            {
                if ($k[5] == 2)
                {
                    echo "<td class='title_con'>$k[0]</td>
                        <td class='item'><button onclick='khoa()' id='ndloc'>Khóa TK</button></td>";
                }
                if ($k[5] == 3)
                {
                    echo "<td class='title_con'>$k[0]</td>
                        <td class='item'><button onclick='khoa()' id='ndloc'>Mở khóa</button></td>";
                }
                return;
            }
            echo "Không tìm thấy User !";
            return;
        }
    else echo "Có lỗi xảy ra !";
    function check($str)
    {
        return preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $str);
    } 
?>