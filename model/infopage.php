<?php
session_start();
session_destroy();
?>
<html>
<head>
<link rel="stylesheet" type = "text/css" href="../src/css/infopage.css">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>商品頁</title>
<?php require('../src/head.php')?>
</head>
<?php require('navbar.php')?>

<body>
<?php
//$id=$_SESSION['id'];
$id="A0001"
?>
<?php

require('db_check.php');
$conn = db_check();
mysqli_query( $conn, "SET NAMES 'utf8'");

$pic = mysqli_query( $conn, "SELECT pic_src FROM product_browse WHERE p_id ='$id'");
$name = mysqli_query( $conn, "SELECT * FROM product WHERE p_id ='$id'");
if ($pic!='')
{
	$pict=mysqli_fetch_row($pic);
}


?>
<div class="mainb">
<?php if ($name!=''){
	$namee=mysqli_fetch_row($name);

	?>

<div class="flex">
<div class="flexA">
<img src="<?php echo $pict[0] ;?>" class="mainpic">
<br></br>
<p><?php echo $namee[1];?></p>
</div>
<div class="flexA">
<p><?php echo $namee[5];?></p>

	
	
	
	
	

</div>
</div>

<?php 
}
?>

</div>
</body>

</html>
