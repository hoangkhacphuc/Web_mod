<?php
    include "conn.php";
    if (isset($_GET['ID']))
    {
        $ID = $_GET['ID'];
        if ($ID == "" || !ctype_digit($ID))
        {
            echo "<script>window.location = 'index.php';</script>";
            return;
        }
            
        $noidung = "SELECT LuotTai FROM luottai WHERE ID='$ID'";
        $result = mysqli_query($conn, $noidung);

        $k = mysqli_fetch_row($result)[0] + 1;
        $noidung = "UPDATE luottai SET LuotTai ='$k' WHERE ID='$ID'";
        $result = mysqli_query($conn, $noidung);

        $noidung = "SELECT LinkDown FROM baiviet WHERE ID='$ID'";
        $result = mysqli_query($conn, $noidung);
        $k = mysqli_fetch_row($result)[0];
        echo "<script>window.location = '$k';</script>";
    }
    echo "<script>window.location = 'index.php';</script>";
    return;
?>