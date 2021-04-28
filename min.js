function dangbai()
{
	var p1 = document.getElementById("p1").value;
	var p2 = document.getElementById("p2").value;
	var p3 = document.getElementById("p3").value;
    var p4 = document.getElementById("p4").value;
    var p5 = document.getElementById("p5").value;
    var p6 = document.getElementById("p6").value;
    var p7 = document.getElementById("p7").value;
    var p8 = document.getElementById("p8").value;
    var p9 = document.getElementById("plogo").value;
    var p10 = document.getElementById("pgame").value;

    document.getElementById("p1").value = "";
    document.getElementById("p2").value = "";
    document.getElementById("p3").value = "";
    document.getElementById("p4").value = "";
    document.getElementById("p5").value = "";
    document.getElementById("p6").value = "";
    document.getElementById("p7").value = "";
    document.getElementById("p8").value = "";
    document.getElementById("plogo").value = "";
    
	var http = new XMLHttpRequest();
		http.onreadystatechange = function() {
			if (this.readyState == 4 && this.status == 200) {
				alert(http.responseText);
				if (http.responseText == "Đăng bài thành công !")
					window.location = "dangbai.php";
				}
			};
	http.open("POST", "postbai.php");
	http.setRequestHeader("Content-Type", "application/x-www-form-urlencoded; charset=UTF-8");
	http.send("p1="+p1+"&p2="+p2+"&p3="+p3+"&p4="+p4+"&p5="+p5+"&p6="+p6+"&p7="+p7+"&p8="+p8+"&p9="+p9+"&p10="+p10);
}

function getedit()
{
	var p0 = document.getElementById("p0").value;
	var ppass = document.getElementById("ppass").value;
    
	var http = new XMLHttpRequest();
		http.onreadystatechange = function() {
			if (this.readyState == 4 && this.status == 200) {
                    obj = JSON.parse(http.responseText);
                    if (obj[0] != "Lấy thông tin thành công !")
                        alert(obj[0]);
                    else {
                        alert(obj[0]);
                        document.getElementById("p1").value = obj[1];
                        document.getElementById("p2").value = obj[2];
                        document.getElementById("p3").value = obj[3];
                        document.getElementById("p4").value = obj[4];
                        document.getElementById("p5").value = obj[5];
                        document.getElementById("p6").value = obj[6];
                        document.getElementById("p7").value = obj[7];
                        document.getElementById("p8").value = obj[8];
                        document.getElementById("plogo").value = obj[9];
                        document.getElementById("pgame").value = obj[10];
                    }
				}
			};
	http.open("POST", "getedit.php");
	http.setRequestHeader("Content-Type", "application/x-www-form-urlencoded; charset=UTF-8");
	http.send("p0="+p0+"&ppass="+ppass);
}

function editbai()
{
    var pp = document.getElementById("ppass").value;
    var p0 = document.getElementById("p0").value;
	var p1 = document.getElementById("p1").value;
	var p2 = document.getElementById("p2").value;
	var p3 = document.getElementById("p3").value;
    var p4 = document.getElementById("p4").value;
    var p5 = document.getElementById("p5").value;
    var p6 = document.getElementById("p6").value;
    var p7 = document.getElementById("p7").value;
    var p8 = document.getElementById("p8").value;
    var p9 = document.getElementById("plogo").value;
    var p10 = document.getElementById("pgame").value;

    document.getElementById("p0").value = "";
    document.getElementById("ppass").value = "";
    document.getElementById("p1").value = "";
    document.getElementById("p2").value = "";
    document.getElementById("p3").value = "";
    document.getElementById("p4").value = "";
    document.getElementById("p5").value = "";
    document.getElementById("p6").value = "";
    document.getElementById("p7").value = "";
    document.getElementById("p8").value = "";
    document.getElementById("plogo").value = "";
    
	var http = new XMLHttpRequest();
		http.onreadystatechange = function() {
			if (this.readyState == 4 && this.status == 200) {
				alert(http.responseText);
				if (http.responseText == "Sửa bài thành công !")
					window.location = "editbai.php";
				}
			};
	http.open("POST", "edit_bai.php");
	http.setRequestHeader("Content-Type", "application/x-www-form-urlencoded; charset=UTF-8");
	http.send("ppass="+pp+"&p0="+p0+"&p1="+p1+"&p2="+p2+"&p3="+p3+"&p4="+p4+"&p5="+p5+"&p6="+p6+"&p7="+p7+"&p8="+p8+"&p9="+p9+"&p10="+p10);
}

function getuser()
{
	var p0 = document.getElementById("puser").value;
    
	var http = new XMLHttpRequest();
		http.onreadystatechange = function() {
			if (this.readyState == 4 && this.status == 200) {
                    if (http.responseText[0] != "<")
                        alert(http.responseText);
                    else {
                        alert("Đã tìm thấy User !");
                        document.getElementById("searchmem").innerHTML = http.responseText;
                    }
				}
			};
	http.open("POST", "locmem.php");
	http.setRequestHeader("Content-Type", "application/x-www-form-urlencoded; charset=UTF-8");
	http.send("puser="+p0);
}

function khoa()
{
    var p0 = document.getElementById("puser").value;
    
	var http = new XMLHttpRequest();
		http.onreadystatechange = function() {
			if (this.readyState == 4 && this.status == 200) {
                    alert(http.responseText);
                    if (http.responseText == "Đã khóa !")
                        document.getElementById("ndloc").innerHTML = "Mở Khóa";
                    if (http.responseText == "Đã mở !")
                        document.getElementById("ndloc").innerHTML = "Khóa TK";
				}
			};
	http.open("POST", "delete.php");
	http.setRequestHeader("Content-Type", "application/x-www-form-urlencoded; charset=UTF-8");
	http.send("puser="+p0);
}