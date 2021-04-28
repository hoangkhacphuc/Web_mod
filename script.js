
function isSearch(str)
{
	var xhttp;
	if (str.length == 0)
	{ 
		document.getElementById("kq_search").innerHTML = "";
		return;
	}
	xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function ()
	{
		if (xhttp.readyState == 4 && xhttp.status == 200)
		{
			document.getElementById("kq_search").innerHTML = xhttp.responseText;
		}
	};
	xhttp.open("GET", "search.php?content="+str, true);
	xhttp.send();   
}

function login()
{
	var user = document.getElementById("fuser").value;
	var pass = document.getElementById("fpass").value;

	var http = new XMLHttpRequest();
		http.onreadystatechange = function() {
			if (this.readyState == 4 && this.status == 200) {
				alert(http.responseText);
				if (http.responseText == "Đăng nhập thành công !")
					window.location = "index.php";
				
				}
			};
	http.open("POST", "login.php");
	http.setRequestHeader("Content-Type", "application/x-www-form-urlencoded; charset=UTF-8");
	http.send("user="+user+"&pass="+pass);
}

function regist()
{
	var user = document.getElementById("ruser").value;
	var pass = document.getElementById("rpass").value;
	var repass = document.getElementById("rrepass").value;
	var email = document.getElementById("remail").value;
	var http = new XMLHttpRequest();
		http.onreadystatechange = function() {
			if (this.readyState == 4 && this.status == 200) {
				alert(http.responseText);
				if (http.responseText == "Đăng ký thành công !")
					window.location = "index.php";
				}
			};
	http.open("POST", "regist.php");
	http.setRequestHeader("Content-Type", "application/x-www-form-urlencoded; charset=UTF-8");
	http.send("user="+user+"&pass="+pass+"&repass="+repass+"&email="+email);
}

function rename()
{
	var name = document.getElementById("newname").value;
	var http = new XMLHttpRequest();
		http.onreadystatechange = function() {
			if (this.readyState == 4 && this.status == 200) {
				alert(http.responseText);
				if (http.responseText == "Đổi tên thành công !")
					window.location = "user.php";
				}
			};
	http.open("POST", "rename.php");
	http.setRequestHeader("Content-Type", "application/x-www-form-urlencoded; charset=UTF-8");
	http.send("name="+name);
}

function reemail()
{
	var email = document.getElementById("newemail").value;
	var pass = document.getElementById("rempass").value;

	var http = new XMLHttpRequest();
		http.onreadystatechange = function() {
			if (this.readyState == 4 && this.status == 200) {
				alert(http.responseText);
				if (http.responseText == "Đổi Email thành công !")
					window.location = "user.php";
				}
			};
	http.open("POST", "reemail.php");
	http.setRequestHeader("Content-Type", "application/x-www-form-urlencoded; charset=UTF-8");
	http.send("email="+email+"&pass="+pass);
}

function changepass()
{
	var pass = document.getElementById("rppass").value;
	var newpass = document.getElementById("rpnewpass").value;
	var renewpass = document.getElementById("rprenewpass").value;

	var http = new XMLHttpRequest();
		http.onreadystatechange = function() {
			if (this.readyState == 4 && this.status == 200) {
				alert(http.responseText);
				if (http.responseText == "Đổi mật khẩu thành công !")
					window.location = "changepass.php";
				}
			};
	http.open("POST", "change_pass.php");
	http.setRequestHeader("Content-Type", "application/x-www-form-urlencoded; charset=UTF-8");
	http.send("pass="+pass+"&newpass="+newpass+"&renewpass="+renewpass);
}

function quenmatkhau()
{
	var pemail = document.getElementById("qemail").value;
	document.getElementById("btn-xn").style.display = "none";
	var http = new XMLHttpRequest();
		http.onreadystatechange = function() {
			if (this.readyState == 4 && this.status == 200) {
				alert(http.responseText);
				if (http.responseText == "Vui lòng kiểm tra hộp thư của Email !")
					window.location = "index.php";
				}
			};
	http.open("POST", "quenpass.php");
	http.setRequestHeader("Content-Type", "application/x-www-form-urlencoded; charset=UTF-8");
	http.send("email="+pemail);
}

function xn()
{
	var xnemail = document.getElementById("xn-email").value;
	var ma = document.getElementById("xn-ma").value;
	var pa = document.getElementById("xn-pa").value;
	var rpa = document.getElementById("xn-rpa").value;

	document.getElementById("btn-xn").style.display = "none";
	var http = new XMLHttpRequest();
		http.onreadystatechange = function() {
			if (this.readyState == 4 && this.status == 200) {
				alert(http.responseText);
				if (http.responseText == "Kích hoạt mật khẩu mới thành công !")
					window.location = "index.php";
				}
			};
	http.open("POST", "xn.php");
	http.setRequestHeader("Content-Type", "application/x-www-form-urlencoded; charset=UTF-8");
	http.send("email="+xnemail+"&ma="+ma+"&pa="+pa+"&rpa="+rpa);
}

var status = 1;
var status_user =1;

function onMenu() {
	if (status == 1)
	{
		document.getElementById("top-menu").style.display = "block";
		document.getElementById("btn_onMenu").className = "fa fa-close";
		status = 0;
	}
	else
	{
		document.getElementById("top-menu").style.display = "none";
		document.getElementById("btn_onMenu").className = "fa fa-bars";
		status = 1;
	}
}

function onMenuUser() {
	if (status_user == 1)
	{
		document.getElementById("menu-user").style.display = "block";
		document.getElementById("btn_onMenuUser").className = "fa fa-close";
		status_user = 0;
	}
	else
	{
		document.getElementById("menu-user").style.display = "none";
		document.getElementById("btn_onMenuUser").className = "fa fa-bars";
		status_user = 1;
	}
}

function closeModal() {
	document.getElementById("modal").style.display = "none";
	document.getElementById("btn-xn").style.display = "";
	document.getElementById("modalregist").style.display = "none";
	document.getElementById("modalrename").style.display = "none";
	document.getElementById("modalreemail").style.display = "none";
}

function openModalLogin() {
	document.getElementById("modal").style.display = "block";
}

function openModalRegist() {
	document.getElementById("modalregist").style.display = "block";
}

function openModalReName() {
	document.getElementById("modalrename").style.display = "block";
}

function openModalReEmail() {
	document.getElementById("modalreemail").style.display = "block";
}

function openModalQuenPass()
{
	document.getElementById("modalqpass").style.display = "block";
	document.getElementById("btn-modalqpass").style.display = "block";
}


function myFunction() {
	document.getElementById("myDropdown").classList.toggle("show");
}

function myFunction2() {
	document.getElementById("myDropdown2").classList.toggle("show");
}

window.onclick = function(event)
{
	if (!event.target.matches('.dropbtn')) {
		var dropdowns = document.getElementsByClassName("dropdown-content");
		var i;
		for (i = 0; i < dropdowns.length; i++) {
		var openDropdown = dropdowns[i];
		if (openDropdown.classList.contains('show')) {
			openDropdown.classList.remove('show');
		}
		}
	}
}

function toIndex()
{
	window.location = "index.php";
}

function online()
{
	alert("Đã kết nối lại mạng !");
}

function offline()
{
	alert("Mạng kết nối không ổn định !");
}