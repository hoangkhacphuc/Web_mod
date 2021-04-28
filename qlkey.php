<?php include 'header.php'; 
if (!isset($_SESSION['user']))
    {
        header ('location: index.php');
    }
?>
<html>
	<head>
        <link rel="stylesheet" type="text/css" href="user.css">
        <link rel="stylesheet" type="text/css" href="changepass.css">
        <link rel="stylesheet" type="text/css" href="qlkey.css">
        <script src='script.js'></script>
		<title><?php if (isset($_SESSION['user'])) echo $_SESSION['user']; ?> - Mod cùng Ken Play girl</title>
	</head>	
	<body>
        <div class="menu_p">
            <div class="title">MENU</div>
            <button type="button" onclick="onMenuUser()">
				<i class="fa fa-bars" id="btn_onMenuUser"></i>
			</button>
        </div>
        <div class="user_content">
            <div class="menu_user" id="menu-user">
                <div class="title">TÀI KHOẢN</div>
                <div class="content">
                    <ul>
                        <li><a href="user.php"><i class="fa fa-address-card-o"></i>&nbsp;&nbsp;Thông Tin Tài Khoản</a></li>
                        <li><a href="changepass.php"><i class="fa fa-key"></i>&nbsp;&nbsp;Đổi Mật Khẩu</a></li>
                        <li><a href="logout.php"><i class="fa fa-sign-out"></i>&nbsp;&nbsp;Đăng Xuất</a></li>
                    </ul>
                </div>
                <div class="title">QUẢN LÝ</div>
                <div class="content">
                    <ul>
                        <li><a href="qlkey.php" style="color: #65b1ff;"><i class="fa fa-key"></i>&nbsp;&nbsp;Quản lý Key</a></li>
                    </ul>
                </div>
            </div>
            <div class="conn_user">
                <div class="title">QUẢN LÝ KEY</div>
                <div class="line"></div>
                <div class="list">
                    <table>
                        <tr>
                            <td>STT</td>
                            <td>Tên MOD</td>
                            <td>Key</td>
                            <td>Bắt Đầu</td>
                            <td>Hết Hạn</td>
                            <td>Trạng Thái</td>
                            <td>Tùy Chỉnh</td>
                        </tr>
                    </table>  
                </div>
            </div>
        </div>
    </body>
</html>
<?php
	include "footer.php";
?>