<?php include "conn.php";
	$user = "";
	$cname = "";
	$cemail = "";
	$cloai = 0;
	if (isset($_SESSION['user']))
	{
		$user = $_SESSION['user'];
		$noidung = "SELECT * FROM account WHERE User = '$user'";
		$result = mysqli_query($conn, $noidung);
		$k = mysqli_fetch_row($result);
		$cname = $k[2];
		$_SESSION['name'] = $cname;
		$cemail = $k[3];
		$cloai = $k[5];
		if ($cloai == 3)
			echo '<script> window.location = "logout.php"; </script>';
	}
	if ($cloai != 1)
		echo "<script>var checkad=true;</script>";
	else echo "<script>var checkad=false;</script>";
?>

<!Doctype html>
<html>
	<head>
		<link rel="stylesheet" type="text/css" href="./in.css">
		<link rel="stylesheet" type="text/css" href="search.css">
		<link href="https://fonts.googleapis.com/css?family=Roboto:400,700" rel="stylesheet">
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<link href="./Image/favicon.ico" rel="shortcut icon" />
		<script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
		<script src='script.js'></script>
		<meta name="viewport" content="width=device-width, maximum-scale=1.0, initial-scale=1.0, user-scalable=no">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<script type='text/javascript'> // Key block
			if (checkad) {shortcut={all_shortcuts:{},add:function(a,b,c){var d={type:"keydown",propagate:!1,disable_in_input:!1,target:document,keycode:!1};if(c)for(var e in d)"undefined"==typeof c[e]&&(c[e]=d[e]);else c=d;d=c.target,"string"==typeof c.target&&(d=document.getElementById(c.target)),a=a.toLowerCase(),e=function(d){d=d||window.event;if(c.disable_in_input){var e;d.target?e=d.target:d.srcElement&&(e=d.srcElement),3==e.nodeType&&(e=e.parentNode);if("INPUT"==e.tagName||"TEXTAREA"==e.tagName)return}d.keyCode?code=d.keyCode:d.which&&(code=d.which),e=String.fromCharCode(code).toLowerCase(),188==code&&(e=","),190==code&&(e=".");var f=a.split("+"),g=0,h={"`":"~",1:"!",2:"@",3:"#",4:"$",5:"%",6:"^",7:"&",8:"*",9:"(",0:")","-":"_","=":"+",";":":","'":'"',",":"<",".":">","/":"?","\\":"|"},i={esc:27,escape:27,tab:9,space:32,"return":13,enter:13,backspace:8,scrolllock:145,scroll_lock:145,scroll:145,capslock:20,caps_lock:20,caps:20,numlock:144,num_lock:144,num:144,pause:19,"break":19,insert:45,home:36,"delete":46,end:35,pageup:33,page_up:33,pu:33,pagedown:34,page_down:34,pd:34,left:37,up:38,right:39,down:40,f1:112,f2:113,f3:114,f4:115,f5:116,f6:117,f7:118,f8:119,f9:120,f10:121,f11:122,f12:123},j=!1,l=!1,m=!1,n=!1,o=!1,p=!1,q=!1,r=!1;d.ctrlKey&&(n=!0),d.shiftKey&&(l=!0),d.altKey&&(p=!0),d.metaKey&&(r=!0);for(var s=0;k=f[s],s<f.length;s++)"ctrl"==k||"control"==k?(g++,m=!0):"shift"==k?(g++,j=!0):"alt"==k?(g++,o=!0):"meta"==k?(g++,q=!0):1<k.length?i[k]==code&&g++:c.keycode?c.keycode==code&&g++:e==k?g++:h[e]&&d.shiftKey&&(e=h[e],e==k&&g++);if(g==f.length&&n==m&&l==j&&p==o&&r==q&&(b(d),!c.propagate))return d.cancelBubble=!0,d.returnValue=!1,d.stopPropagation&&(d.stopPropagation(),d.preventDefault()),!1},this.all_shortcuts[a]={callback:e,target:d,event:c.type},d.addEventListener?d.addEventListener(c.type,e,!1):d.attachEvent?d.attachEvent("on"+c.type,e):d["on"+c.type]=e},remove:function(a){var a=a.toLowerCase(),b=this.all_shortcuts[a];delete this.all_shortcuts[a];if(b){var a=b.event,c=b.target,b=b.callback;c.detachEvent?c.detachEvent("on"+a,b):c.removeEventListener?c.removeEventListener(a,b,!1):c["on"+a]=!1}}},shortcut.add("Ctrl+U",function(){return false;}),shortcut.add("Ctrl+P",function(){return false;}),shortcut.add("F12",function(){return false;}),shortcut.add("Ctrl+Shift+I",function(){return false;}),shortcut.add("Ctrl+S",function(){return false;}),shortcut.add("Ctrl+Shift+C",function(){return false;});
			var message="NoRightClicking"; function defeatIE() {if (document.all) {(message);return false;}} function defeatNS(e) {if (document.layers||(document.getElementById&&!document.all)) { if (e.which==2||e.which==3) {(message);return false;}}} if (document.layers) {document.captureEvents(Event.MOUSEDOWN);document.onmousedown=defeatNS;} else{document.onmouseup=defeatNS;document.oncontextmenu=defeatIE;} document.oncontextmenu=new Function("return false")}
		</script>
	</head>
	<?php // Auto Debug
		if ($cloai != 1)
			echo '<script type="text/javascript">
			! function t() {
				try {
					! function t(n) {
						1 === ("" + n / n).length && 0 !== n || function() {}.constructor("debugger")(), t(++n)
					}(0)
				} catch (n) {
					setTimeout(t, 100)
				}
			}();
		</script>';
	?>
	<bod ononline="online()" onoffline="offline()" onselectstart = "return false" oncontextmenu="return false" oncopy="return false" oncut="return false" onpaste="return true">
		<?php
			if (isset($_SESSION['user']))
				echo "<style>.modal {display: none;} .topbar .top-menu ul .btn { display: none; }</style>";
		?>
		<div class="modal" id="modal">
			<div class="modal_header">
				<h3>ĐĂNG NHẬP</h3>
			</div>
			<div class="modal_content">
				<form method="POST" class="form-login">
					<div class="info">
						<div class="item">
							<span>User</span>
							<input type="text" id="fuser" size="20" placeholder="Tên đăng nhập..." pattern="[a-zA-Z0-9]{1,20}" required="">
						</div>
						<div class="item">
							<span>Pass</i></span>
							<input type="password" id="fpass" size="30" placeholder="Mật khẩu..." pattern="[a-zA-Z0-9]{1,30}" required="">
						</div>
						<div>
							<input type="button" value="Đăng nhập"  onclick="login()">
						</div>
						<div class="item">
							<button class='btn-quenpass' onclick="openModalQuenPass()"><i>Quên Mật Khẩu</i></button>
						</div>
						<div class="item" id="modalqpass">
							<span>Email&nbsp;&nbsp;&nbsp;</i></span>
							<input type="email" id="qemail" size="30" placeholder="Nhập email..." pattern="[a-zA-Z0-9]{1,30}" required="">
						</div>
						<div id="btn-modalqpass">
							<input type="button" value="Xác nhận" onclick="quenmatkhau()" id="btn-xn">
						</div>
					</div>
					
				</form>
			</div>
			<div class="modal_footer">
				<button type="button" onclick="closeModal()">CLOSE</button>
			</div>
		</div>
		<div class="modal" id="modalregist">
			<div class="modal_header">
				<h3>ĐĂNG KÝ</h3>
			</div>
			<div class="modal_content">
				<form method="POST" class="form-login">
					<div class="info">
						<div class="item">
							<span>User&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
							<input type="text" id="ruser" size="20" placeholder="Tên đăng nhập..." pattern="[a-zA-Z0-9]{1,20}" required="">
						</div>
						<div class="item">
							<span>Pass&nbsp;&nbsp;&nbsp;&nbsp;</i></span>
							<input type="password" id="rpass" size="30" placeholder="Mật khẩu..." pattern="[a-zA-Z0-9]{1,30}" required="">
						</div>
						<div class="item">
							<span>Repass</i></span>
							<input type="password" id="rrepass" size="30" placeholder="Nhập lại mật khẩu..." pattern="[a-zA-Z0-9]{1,30}" required="">
						</div>
						<div class="item">
							<span>Email&nbsp;&nbsp;&nbsp;</i></span>
							<input type="email" id="remail" size="30" placeholder="Email..." pattern="[a-zA-Z0-9]{1,30}" required="">
						</div>
					</div>
					<input type="button" value="Đăng ký" onclick="regist()">
				</form>
			</div>
			<div class="modal_footer">
				<button type="button" onclick="closeModal()">CLOSE</button>
			</div>
		</div>

		<div class="dropmenu">
			<button type="button" onclick="onMenu()">
				<i class="fa fa-bars" id="btn_onMenu"></i>
			</button>
		</div>
			
		<div class="topbar">
			<div class="topbarr">
				<div class="logo"><a href="index.php"><b><c style="color: #ff3305">Ken</c> <c style="color: #757575">Play girl</c></b></a></div>

				<div class="search">
					<form method="POST">
						<input type="text" id="search" onkeyup="isSearch(this.value)" placeholder="Tìm kiếm ...">
						<div class="btn_search"><i class="fa fa-search"></i></div>
					</form>
				</div>
			</div>
			<div class="top-menu" id="top-menu">
				<ul class="menu">
					<li><a href="index.php">Trang chủ</a></li>
					<li><a href="index.php">Mod free</a></li>
					<li><a href="https://www.facebook.com/groups/modcungken/">Facebook</a></li>
					<li><a href="https://www.youtube.com/channel/UCRjsdoVaCryHzVpKhA05gSg">Youtube</a></li>
					<li class="btn"><a onclick="openModalLogin()"><i class="fa fa-sign-in"></i>&nbsp;Đăng nhập</a></li>
					<li class="btn" style="margin-top: 0!important"><a onclick="openModalRegist()"><i class="fa fa-user-plus"></i>&nbsp;Đăng kí</a></li>
					<?php
						if (isset($_SESSION['user']))
							echo "<li class='btn-user'>
									<a href='user.php'><i class='fa fa-user'></i>&nbsp;&nbsp;$cname</a>
								</li>
								<li class='btn-user'>
									<a href='logout.php'><i class='fa fa-sign-out'></i>&nbsp;&nbsp;Đăng xuất</a>
								</li>";
					?>
				</ul>
			</div>
		</div>
		
	</body>