<?php
session_start();
require("db_check.php");

$buyer = $_SESSION['account'];
$p_id = $_GET['id'];
print_r($p_id);
$p_num = array();
foreach ($p_id as $value) {
	array_push($p_num, $_GET["shopcount".$value]);
}

print_r($p_num);

$pay_info = htmlspecialchars($_GET['way']);
$county = htmlspecialchars($_GET['county']);
$district = htmlspecialchars($_GET['district']);
$road = htmlspecialchars($_GET['ship-address']);
$zipcode = htmlspecialchars($_GET['zipcode']);
$addr = $zipcode.$county.$district.$road;
print_r($addr);

$conn = db_check();

$oid_sql = "SELECT MAX(o_id) FROM order_info;";
$oid_check = mysqli_query($conn, $oid_sql);
$row = mysqli_fetch_assoc($oid_check);

if(mysqli_num_rows($oid_check) === 0){
	$o_id = 1;
}
else{
	$o_id = $row['MAX(o_id)'] + 1;
}
print_r($o_id);

$o_prog = '未完成';
date_default_timezone_set("Asia/Shanghai");
$o_time = date("Y-m-d H:i:s");
print_r($o_prog);

for ($i=0; $i<sizeof($p_id); $i++){
	$id=$p_id[$i];
	$num=$p_num[$i];
	for ($j=0; $j<sizeof($_SESSION['chart_num']); $j++){
		if ($_SESSION['chart_id'][$j]==$id) {
			$_SESSION['chart_num'][$j]=0;
			break;
		}
	}
	$update_sql = "UPDATE product SET stock=stock-$num WHERE p_id =$id; ";
	$insert_sql = "INSERT INTO order_info (o_id, p_id, p_style, p_num, buyer, o_prog, pay_info, addr, o_time) VALUES ('$o_id', '$id', '$p_style', '$num', '$buyer', '$o_prog', '$pay_info', '$addr', '$o_time')";
	if(mysqli_query($conn, $insert_sql)){
		mysqli_query($conn, $update_sql);
		header("Location:../view/buy_list.php");
	}
	else{
		echo "Error";
	}
}
require('sortcart.php');
sortcart();
mysqli_close($conn);
?>
