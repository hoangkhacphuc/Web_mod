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
                        <li><a href="changepass.php" style="color: #65b1ff;"><i class="fa fa-key"></i>&nbsp;&nbsp;Đổi Mật Khẩu</a></li>
                        <li><a href="logout.php"><i class="fa fa-sign-out"></i>&nbsp;&nbsp;Đăng Xuất</a></li>
                    </ul>
                </div>
                <div class="title">QUẢN LÝ</div>
                <div class="content">
                    <ul>
                        <li><a href="qlkey.php"><i class="fa fa-key"></i>&nbsp;&nbsp;Quản lý Key</a></li>
                    </ul>
                </div>
                <?php
                    if (isset($_SESSION['loai']) && $_SESSION['loai'] == 1)
                    {
                        echo '<div class="title">ADMIN</div>
                                <div class="content">
                                    <ul>
                                        <li><a href="dangbai.php"><i class="fa fa-file-code-o"></i>&nbsp;&nbsp;Bài viết mới</a></li>
                                        <li><a href="editbai.php"><i class="fa fa-pencil-square-o"></i>&nbsp;&nbsp;Sửa bài viết</a></li>
                                        <li><a href="xoamem.php"><i class="fa fa-user-times"></i>&nbsp;&nbsp;Xóa member</a></li>
                                    </ul>
                                </div>';
                    }
                ?>
            </div>
            <div class="conn_user">
                <div class="title">ĐỔI MẬT KHẨU</div>
                <div class="line"></div>
                <div class="list">
                    <form method="POST">
                        <table>
                            <tr>
                                <td class='title_con'>Mật khẩu cũ : </td>
                                <td class="item"><input type="password" id="rppass" placeholder="Mật khẩu cũ ..." pattern="[a-zA-Z0-9]" required=""></td>
                            </tr>
                            <tr>
                                <td class='title_con'>Mật khẩu mới : </td>
                                <td class="item">
                                <input type="password" id="rpnewpass" placeholder="Mật khẩu mới ..." pattern="[a-zA-Z0-9]" required="">
                                </td>
                            </tr>
                            <tr>
                                <td class='title_con'>Nhập lại mật khẩu mới : </td>
                                <td class="item">
                                <input type="password" id="rprenewpass" placeholder="Nhập lại mật khẩu mới ..." pattern="[a-zA-Z0-9]" required="">
                                </td>
                            </tr>
                        </table>
                        <button class="btn-changepass" onclick="changepass()"><i class="fa fa-check"></i>&nbsp;Xác Nhận</button>
                    </form>    
                </div>
            </div>
        </div>
    </body>
</html>
<?php
	include "footer.php";
?>