<?php
// Mot mang cac ten Sinh Vien
$a[] = "An";
$a[] = "Bao";
$a[] = "Chinh";
$a[] = "Doanh";
$a[] = "Em";
$a[] = "Gam";
$a[] = "Hoang";
$a[] = "Kim";
$a[] = "Linh";
$a[] = "Ngoc";
$a[] = "Oanh";
$a[] = "Phuc";
$a[] = "Anh";
$a[] = "Nam";
$a[] = "Sen";
$a[] = "Dong";
$a[] = "Sinh";
$a[] = "Torres";
$a[] = "Ronaldo";
$a[] = "Messi";
$a[] = "Suares";
$a[] = "Morinho";
$a[] = "Van Gan";
$a[] = "Hải bê đê đúng ko :))))";

// Lay tham so q tu dia chi URL
$q = $_REQUEST["content"];

$hint = "";

// Tim tat ca cac hint co trong Array neu tham so $q khac "" 
if ($q !== "") {
    $q = strtolower($q);
    $len=strlen($q);
    foreach($a as $name) {
        if (stristr($q, substr($name, 0, $len))) {
            if ($hint === "") {
                $hint = $name;
            } else {
                $hint .= ", $name";
            }
        }
    }
}

// Ket qua "Khong co suggestion nao" neu khong tim thay bat ky hint nao trong Array
echo $hint === "" ? "Khong co suggestion nao" : $hint;
?>