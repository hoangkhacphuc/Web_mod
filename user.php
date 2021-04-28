<?php include 'header.php'; 
    if (!isset($_SESSION['user']))
        {
            header ('location: index.php');
            die();
        }
?>
<html>
	<head>
        <link rel="stylesheet" type="text/css" href="user.css">
		<title><?php if (isset($_SESSION['user'])) echo $_SESSION['user']; ?> - Mod cùng Ken Play girl</title>
	</head>	
	<body>
        <div class="modal" id="modalrename">
            <div class="modal_header">
                <h3>ĐỔI TÊN</h3>
            </div>
            <div class="modal_content">
                <form method="POST" class="form-login">
                    <div class="info">
                        <div class="item">
                            <span>Tên mới</span>
                            <input type="text" id="newname" size="30" placeholder="Tên mới ..." pattern="[a-zA-Z0-9]{1,30}" required="">
                        </div>
                    </div>
                    <input type="button" value="Xác Nhận" onclick="rename()">
                </form>
            </div>
            <div class="modal_footer">
                <button type="button" onclick="closeModal()">CLOSE</button>
            </div>
        </div>
        <div class="modal" id="modalreemail">
            <div class="modal_header">
                <h3>ĐỔI EMAIL</h3>
            </div>
            <div class="modal_content">
                <form method="POST" class="form-login">
                    <div class="info">
                        <div class="item">
                            <span>Email mới</span>
                            <input type="text" id="newemail" size="100" placeholder="Email mới ..." pattern="[a-zA-Z0-9]{1,100}" required="">
                        </div>
                        <div class="item">
                            <span>Mật khẩu</span>
                            <input type="password" id="rempass" size="30" placeholder="Mật khẩu ..." pattern="[a-zA-Z0-9]{1,30}" required="">
                        </div>
                    </div>
                    <input type="button" value="Xác Nhận" onclick="reemail()">
                </form>
            </div>
            <div class="modal_footer">
                <button type="button" onclick="closeModal()">CLOSE</button>
            </div>
        </div>

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
                        <li><a href="user.php" style="color: #65b1ff;"><i class="fa fa-address-card-o"></i>&nbsp;&nbsp;Thông Tin Tài Khoản</a></li>
                        <li><a href="changepass.php"><i class="fa fa-key"></i>&nbsp;&nbsp;Đổi Mật Khẩu</a></li>
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
                <div class="title">THÔNG TIN TÀI KHOẢN</div>
                <div class="line"></div>
                <div class="list">
                    <table>
                        <tr>
                            <td class='title_con'>Tên đăng nhập : </td>
                            <td class="item"><?php if (isset($_SESSION['user'])) echo $_SESSION['user']; ?></td>
                        </tr>
                        <tr>
                            <td class='title_con'>Tên : </td>
                            <td class="item">
                                <?php if (isset($_SESSION['name'])) echo $_SESSION['name']; ?>
                                <button onclick="openModalReName()"><i class="fa fa-edit"></i>&nbsp;&nbsp;Đổi Tên</button>
                            </td>
                        </tr>
                        <tr>
                            <td class='title_con'>Email : </td>
                            <td class="item">
                                <?php if (isset($_SESSION['email'])) echo $_SESSION['email']; ?>
                                <button onclick="openModalReEmail()"><i class="fa fa-edit"></i>&nbsp;&nbsp;Sửa Email</button>
                            </td>
                        </tr>
                        <tr>
                            <td class='title_con'>Nhóm tài khoản : </td>
                            <td class="item">
                                <?php if (isset($_SESSION['loai'])) echo $_SESSION['loai']==1?"Admin":"Thành Viên"; ?>
                            </td>
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