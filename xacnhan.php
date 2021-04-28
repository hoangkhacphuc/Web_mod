<?php include 'header.php'; ?>
<html>
	<head>
		<title>Mod cùng Ken Play girl</title>
        <link rel="stylesheet" type="text/css" href="xacnhan.css">
	</head>	
	<body>
		<div class="xn-content">
            <div class="title">KÍCH HOẠT MẬT KHẨU</div>
            <div class="xn-con">
                <center>
                    <table>
                        <tr>
                            <td class="item">Email</td>
                            <td><input type="email" id="xn-email" placeholder="Email ..."></td>
                        </tr>
                        <tr>
                            <td class="item">Mã Kích Hoạt</td>
                            <td><input type="text" id="xn-ma" placeholder="Mã kích hoạt ..."></td>
                        </tr>
                        <tr>
                            <td class="item">Mật khẩu mới</td>
                            <td><input type="password" id="xn-pa" placeholder="Mật khẩu mới ..."></td>
                        </tr>
                        <tr class="item">
                            <td>Nhập lại mật khẩu mới</td>
                            <td><input type="password" id="xn-rpa" placeholder="Nhập lại mật khẩu mới ..."></td>
                        </tr>
                    </table>
                    <button onclick="xn()"><i class="fa fa-check"></i>&nbsp;Xác Nhận</button>
                </center>
            </div>
        </div>
	</body>
</html>
<?php
	include "footer.php";
?>