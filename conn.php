<?php
    $host = "localhost";
    $user = "root";
    $pass = "";
    $databaseName = "web_mod";
    session_start();
    $conn = mysqli_connect($host, $user, $pass, $databaseName);
    if($conn == false)
    {
        echo '<script language="javascript">';
        echo 'alert("Không thể kết nối tới server !")';
        echo '</script>';
    }
?>