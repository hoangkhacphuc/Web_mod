<?php include 'header.php'; ?>
<html>
	<head>
		<title>Mod cùng Ken Play girl</title>
	</head>	
	<body>
		<div class="content-box">
			<div class="newStatus">
				<div class="title">
					<h3>NGỌC RỒNG ONLINE</h3>
					<div class="line"></div>
				</div>
				<div class="content">
					<?php
						$noidung = "SELECT ID,Name,Logo,Gia,Day1  FROM baiviet WHERE Type = '1' ORDER BY ID DESC";
						$result = mysqli_query($conn, $noidung);
						$k = mysqli_fetch_row($result);
						
						$noidung = "SELECT LT.LuotTai  FROM luottai AS LT, baiviet AS BV WHERE LT.ID = BV.ID AND BV.Type = '1' ORDER BY LT.ID DESC";
						$result2 = mysqli_query($conn, $noidung);
						$q = mysqli_fetch_row($result2);
						while ($k != 0)
						{
							if (!isset($k[1]))
								break;
							$dayup = explode("-",$k[4])[2]."/".explode("-",$k[4])[1]."/".explode("-",$k[4])[0];
							echo '<div class="item"><a href="post.php?ID='.$k[0].'"><img src="'.$k[2].'"><div class="item-title">'.$k[1].'</div><div class="item-content"><p>Giá : '.$k[3].'</p><p>Lượt tải : '.$q[0].'</p><p>Ngày đăng : '.$dayup.'</p></div><div class="view">Xem thêm</div></a></div>';
							$k = mysqli_fetch_row($result);
							$q = mysqli_fetch_row($result2);
						}
					?>
				</div>
			</div>
			<div class="newStatus listGame">
                <div class="title">
					<h3>HIỆP SĨ ONLINE</h3>
					<div class="line"></div>
				</div>
				<div class="content">
					<?php
						$noidung = "SELECT ID,Name,Logo,Gia,Day1  FROM baiviet WHERE Type = '2' ORDER BY ID DESC";
						$result = mysqli_query($conn, $noidung);
						$k = mysqli_fetch_row($result);
						
						$noidung = "SELECT LT.LuotTai  FROM luottai AS LT, baiviet AS BV WHERE LT.ID = BV.ID AND BV.Type = '2' ORDER BY LT.ID DESC";
						$result2 = mysqli_query($conn, $noidung);
						$q = mysqli_fetch_row($result2);
						while ($k != 0)
						{
							if (!isset($k[1]))
								break;
							$dayup = explode("-",$k[4])[2]."/".explode("-",$k[4])[1]."/".explode("-",$k[4])[0];
							echo '<div class="item"><a href="post.php?ID='.$k[0].'"><img src="'.$k[2].'"><div class="item-title">'.$k[1].'</div><div class="item-content"><p>Giá : '.$k[3].'</p><p>Lượt tải : '.$q[0].'</p><p>Ngày đăng : '.$dayup.'</p></div><div class="view">Xem thêm</div></a></div>';
							$k = mysqli_fetch_row($result);
							$q = mysqli_fetch_row($result2);
						}
					?>
				</div>
			</div>
			<div class="newStatus listGame listOther">
                <div class="title">
					<h3>GỌI RỒNG ONLINE</h3>
					<div class="line"></div>
				</div>
				<div class="content">
					<?php
						$noidung = "SELECT ID,Name,Logo,Gia,Day1  FROM baiviet WHERE Type = '3' ORDER BY ID DESC";
						$result = mysqli_query($conn, $noidung);
						$k = mysqli_fetch_row($result);
						
						$noidung = "SELECT LT.LuotTai  FROM luottai AS LT, baiviet AS BV WHERE LT.ID = BV.ID AND BV.Type = '3' ORDER BY LT.ID DESC";
						$result2 = mysqli_query($conn, $noidung);
						$q = mysqli_fetch_row($result2);
						while ($k != 0)
						{
							if (!isset($k[1]))
								break;
							$dayup = explode("-",$k[4])[2]."/".explode("-",$k[4])[1]."/".explode("-",$k[4])[0];
							echo '<div class="item"><a href="post.php?ID='.$k[0].'"><img src="'.$k[2].'"><div class="item-title">'.$k[1].'</div><div class="item-content"><p>Giá : '.$k[3].'</p><p>Lượt tải : '.$q[0].'</p><p>Ngày đăng : '.$dayup.'</p></div><div class="view">Xem thêm</div></a></div>';
							$k = mysqli_fetch_row($result);
							$q = mysqli_fetch_row($result2);
						}
					?>
				</div>
			</div>
		</div>
	</body>
</html>
<?php
	include "footer.php";
?>