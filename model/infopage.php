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


	
function m()
{
	if ($count>1)
	{
	$count=$count-1;
	$_GET['shopcount']=$_GET['shopcount']-1;
}
}
function p()
{
	$count=$count+1;
	$_GET['shopcount']=$_GET['shopcount']+1;
}
?>
<div class="mainb">
<?php if ($name!=''){
	$namee=mysqli_fetch_row($name);
	?>

<div class="flex">
<div class="flexA">
<img src="<?php echo $pict[0] ;?>" class="mainpic">


</div>
<div class="flexB">
<p class="title"><?php echo $namee[1];?></p>
<p class="price"><?php echo "價格 $ ".$namee[5];?></p>
<br>
<div class="button">
<form action="infopage.php" method="GET">
<input type="submit" onclick="m()" value="-">
<input type="number" name="shopcount" value="<?php echo $count; ?>" min="1" >
<input type="submit" onclick="p()" value="+">
</form>

</div>
<div >	
<form class="plus">
<input  type="submit" value="加入購物車">
</form>
</div>

</div>
<div class="flexC">
<p><?php echo $namee[7];?></p>



</div>


</div>

<?php 
}
?>

</div>
<?php
$count=$_GET['shopcount'];
?>
</body>

</html>
