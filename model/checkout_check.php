<?php
session_start();
require("db_check.php");

print_r($_GET['id']);
$p_id = htmlspecialchars($_GET['id']);

$p_num = array();
foreach ($p_id as $key => $value) {
	array_push($p_num, $_GET[${"shopcount".$key+1}]); 
}

print_r($p_num);

$pay_info = htmlspecialchars($_GET['way']);
$county = htmlspecialchars($_GET['county']);
$district = htmlspecialchars($_GET['district']);
$address = htmlspecialchars($_GET['ship-address']);

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

//$o_time =
