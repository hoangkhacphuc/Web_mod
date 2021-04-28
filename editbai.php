<?php 
    include 'header.php';
    if ($cloai != 1)
    {
       die();
    }
?>
<html>
	<head>
        <link rel="stylesheet" type="text/css" href="user.css">
        <link rel="stylesheet" type="text/css" href="dangbai.css">
        <script src='min.js'></script>
		<title><?php if (isset($_SESSION['user'])) echo $cname; ?> - Mod cùng Ken Play girl</title>
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
                        <li><a href="qlkey.php"><i class="fa fa-key"></i>&nbsp;&nbsp;Quản lý Key</a></li>
                    </ul>
                </div>
                <?php
                    if (isset($_SESSION['loai']) && $_SESSION['loai'] == 1)
                    {
                        echo '<div class="title">ADMIN</div>
                                <div class="content">
                                    <ul>
                                        <li><a href="dangbai.php""><i class="fa fa-file-code-o"></i>&nbsp;&nbsp;Bài viết mới</a></li>
                                        <li><a href="editbai.php" style="color: #65b1ff;"><i class="fa fa-pencil-square-o"></i>&nbsp;&nbsp;Sửa bài viết</a></li>
                                        <li><a href="xoamem.php"><i class="fa fa-user-times"></i>&nbsp;&nbsp;Xóa member</a></li>
                                    </ul>
                                </div>';
                    }
                ?>
            </div>
            <div class="conn_user">
                <div class="title">SỬA BÀI VIẾT</div>
                <div class="line"></div>
                <div class="list">
                    <table>
                        <tr>
                            <td class='title_con'>ID : </td>
                            <td class="item">
                                <input type="text" placeholder="ID bài viết ..." id="p0" class="getid">
                                <button onclick="getedit()" class="btn-getid"><i class="fa fa-download"></i>&nbsp;Get</button>
                            </td>
                        </tr>
                        <tr>
                            <td class='title_con'>Pass : </td>
                            <td class="item"><input type="password" placeholder="Password ..." id="ppass"></td>
                        </tr>
                        <tr>
                            <td class='title_con'>Title : </td>
                            <td class="item"><input type="text" placeholder="Title ..." id="p1"></td>
                        </tr>
                        <tr>
                            <td class='title_con'>Logo : </td>
                            <td class="item"><input type="text" placeholder="Logo ..." id="plogo"></td>
                        </tr>
                        <tr>
                            <td class='title_con'>Game : </td>
                            <td class="item">
                                <select name="pgame" id="pgame">
                                    <?php
                                        $noidung = "SELECT * FROM loai";
                                        $result = mysqli_query($conn, $noidung);
                                        $k = mysqli_fetch_row($result);
                                        while($k != "")
                                        {
                                            echo "<option value='$k[0]'>$k[1]</option>";
                                            $k = mysqli_fetch_row($result);
                                        }
                                    ?>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td class='title_con'>Giá : </td>
                            <td class="item"><input type="text" placeholder="Giá ..." id="p2"></td>
                        </tr>
                        <tr>
                            <td class='title_con'>Thời Hạn : </td>
                            <td class="item"><input type="text" placeholder="Thời hạn ..." id="p3"></td>
                        </tr>
                        <tr>
                            <td class='title_con'>Lệnh Mod : </td>
                            <td class="item"><textarea placeholder="Lệnh Mod ..." id="p4"></textarea></td>
                        </tr>
                        <tr>
                            <td class='title_con'>Image : </td>
                            <td class="item"><input type="text" placeholder="Image [img1],[img2] ..." id="p5"></td>
                        </tr>
                        <tr>
                            <td class='title_con'>Link Download : </td>
                            <td class="item"><input type="text" placeholder="Link Download ..." id="p6"></td>
                        </tr>
                        <tr>
                            <td class='title_con'>Pass Giải Nén : </td>
                            <td class="item"><input type="text" placeholder="Pass giải nén ..." id="p7"></td>
                        </tr>
                        <tr>
                            <td class='title_con'>Link Youtube : </td>
                            <td class="item"><input type="text" placeholder="Link Youtube ..." id="p8"></td>
                        </tr>
                    </table>
                    <button onclick="editbai()"><i class="fa fa-paper-plane-o"></i>&nbsp;Cập Nhật</button>
                </div>
            </div>
        </div>
    </body>
</html>
<?php
	include "footer.php";
?>