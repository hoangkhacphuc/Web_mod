<?php
    if (isset($_GET['ID']))
        $ID = $_GET['ID'];
    else {
        echo "Chưa có ID bài viết";
        die();
    }
    include "header.php";
    $noidung = "SELECT * FROM baiviet WHERE ID = '$ID'";
    $result = mysqli_query($conn, $noidung);
    $k = mysqli_fetch_row($result);
    $moder = $k[9];
    $hsd = $k[3];
    $gia = $k[2];
    $dayup = "";
    $ytblink = "";
    if ($k[10] != "")
        $dayup = explode("-",$k[10])[2]."/".explode("-",$k[10])[1]."/".explode("-",$k[10])[0];
    $ytblink = explode("watch?v=",$k[8])[0]."embed/".explode("watch?v=",$k[8])[1];
    $img = "";
    if ($k[5] != "")
        $img = explode("|",$k[5]);
    
    $lmod = $k[4];
    $passgn = $k[7];
    $linkdown = $k[6];
    $title = $k[1];

    $noidung = "SELECT * FROM luottai WHERE ID = '$ID'";
    $result = mysqli_query($conn, $noidung);
    $q = mysqli_fetch_row($result);
    $numdown = $q[1];
?>
<head>
    <title>#<?php echo $ID;?> - Mod cùng Ken Play girl</title>
    <link rel="stylesheet" type="text/css" href="post.css">
</head>
<body>
    <div class="p-content">
        <center>
            <div class="p-top">
                <?php echo $title; ?>
            </div>
        </center>
        <div class="p-info">
            <div class="line"><i class="fa fa-group"></i></div>
            <table>
                <tr>
                    <td><i class="fa fa-server"></i>&nbsp;ID : <span><?php echo "#".$ID;?></span></td>
                    <td><i class="fa fa-recycle"></i>&nbsp;Hạn Sử Dụng : <span><?php echo $hsd; ?></span></td>
                    <td><i class="fa fa-money"></i>&nbsp;Giá : <span><?php echo $gia; ?></span></td>
                </tr>
                <tr>
                    <td><i class="fa fa-id-card-o"></i>&nbsp;MODER : <span><?php echo $moder; ?></span></td>
                    <td><i class="fa fa-download"></i>&nbsp;Lượt tải : <span><?php echo $numdown; ?></span></td>
                    <td><i class="fa fa-calendar-plus-o"></i>&nbsp;Ngày Đăng : <span><?php echo $dayup; ?></span></td>
                </tr>
            </table>
            <div class="line"><i class="fa fa-group"></i></div>
        </div>
        <div class="p-con">
        <?php
            if ($ytblink != "")
                echo '<iframe width="560" height="315" src="'.$ytblink.'" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>';
            if ($img != "")
                for ($i=0;$i<count($img);$i++)
                    echo "<div class='img'><img src='$img[$i]'></div>";
            if ($lmod != "")
            {
                echo '<div class="lenhmod">'.$lmod.'</div>';
            }
        
            if ($passgn != "")
                echo '<div class="p-pgn"><span style="font-weight: 600;">Pass Giải Nén : </span><span style="color: #00c4ff;"><i id="pgnen">'.$passgn.'</i></span></div>';
            if ($linkdown != "")
                echo '<div class="download"><a href="getlink.php?ID='.$ID.'"><i class="fa fa-cloud-download"></i>&nbsp;&nbsp;Tải xuống</a></div>';
        ?>
        </div>
    </div>
</body>

<?php
    include "footer.php";
?>