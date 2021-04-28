<?php include 'header.php'; ?>
<html>
	<head>
		<title>Mod cùng Ken Play girl</title>
	</head>	
	<body>
		<div class="content-box">
			<div class="newStatus">
				<div class="title">
					<h3>BÀI ĐĂNG MỚI</h3>
					<div class="line"></div>
				</div>
				<div class="content">
					<?php
						$noidung = "SELECT ID,Name,Logo,Gia,Day1  FROM baiviet ORDER BY ID DESC LIMIT 8";
						$result = mysqli_query($conn, $noidung);
						$k = mysqli_fetch_row($result);
						
						$noidung = "SELECT LuotTai  FROM luottai ORDER BY ID DESC LIMIT 8";
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
				<div class="xemthem"><a href="all.php">XEM TẤT CẢ</a></div>
			</div>
			<div class="newStatus listGame">
				<div class="title">
					<h3>DANH MỤC GAME</h3>
					<div class="line"></div>
				</div>
				<div class="content">
					<div class="item">
						<a href="danhmuc.php?ID=1">
							<img src="./Image/nro.jpg">
							<div class="item-title">
								NGỌC RỒNG ONLINE
							</div>
							<div class="item-content">
								<p>Số bài đăng : 
									<?php
										$noidung = "SELECT COUNT(ID) FROM baiviet WHERE Type = '1'";
										$result = mysqli_query($conn, $noidung);
										$k = mysqli_fetch_row($result);
										echo $k[0];
									?>
								</p>
							</div>
							<div class="view">Xem thêm</div>
						</a>
					</div>
					<div class="item">
						<a href="danhmuc.php?ID=2">
							<img src="./Image/hiepsi.jpg">
							<div class="item-title">
								HIỆP SĨ ONLINE
							</div>
							<div class="item-content">
								<p>Số bài đăng : 
									<?php
										$noidung = "SELECT COUNT(ID) FROM baiviet WHERE Type = '2'";
										$result = mysqli_query($conn, $noidung);
										$k = mysqli_fetch_row($result);
										echo $k[0];
									?>
								</p>
							</div>
							<div class="view">Xem thêm</div>
						</a>
					</div>
					<div class="item">
						<a href="danhmuc.php?ID=3">
							<img src="./Image/gro.jpg">
							<div class="item-title">
								GỌI RỒNG ONLINE
							</div>
							<div class="item-content">
								<p>Số bài đăng : 
									<?php
										$noidung = "SELECT COUNT(ID) FROM baiviet WHERE Type = '3'";
										$result = mysqli_query($conn, $noidung);
										$k = mysqli_fetch_row($result);
										echo $k[0];
									?>
								</p>
							</div>
							<div class="view">Xem thêm</div>
						</a>
					</div>
				</div>
			</div>
			<div class="newStatus listGame listOther">
				<div class="title">
					<h3>DỊCH VỤ KHÁC</h3>
					<div class="line"></div>
				</div>
				<div class="content">
					<div class="item">
						<a href="./">
							<img src="./Image/codetheoyeucau.jpg">
							<div class="item-title">
								MOD THEO YÊU CẦU
							</div>
							<div class="view">Xem thêm</div>
						</a>
					</div>
					<div class="item">
						<a href="./">
							<img src="./Image/key.jpg">
							<div class="item-title">
								QUẢN LÝ KEY
							</div>
							<div class="view">Coming soon</div>
						</a>
					</div>
					<div class="item">
						<a href="./">
							<img src="./Image/quanlytuxa.jpg">
							<div class="item-title">
								CHẠY NRO TỪ XA
							</div>
							<div class="view">Coming soon</div>
						</a>
					</div>
					<div class="item">
						<a href="./">
							<img src="./Image/quanlytuxa.jpg">
							<div class="item-title">
								CHẠY HSO TỪ XA
							</div>
							<div class="view">Coming soon</div>
						</a>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>
<?php
	include "footer.php";
?>