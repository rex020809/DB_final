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
$id=$_GET['p_id'];
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

$count=1
?>

<script language="javascript">

function pm(num)
{
	if (num>0)
	{
	var t=document.getElementById("txt");
	<?php $count=$count+1;
	?>
	t.value="<?php echo $count;?>";
	return false;
	}
	else
	var t =document.getElementById("txt");
	{
	if (t>1)
	{
	<?php $count=$count-1; ?>
	}
	t.value="<?php echo $count;?>";
	return false;
	}
}
</script>



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
<input type="button" onclick="pm(-1)" value="-">
<input type="number" id="txt" name="shopcount" value="<?php echo $count; ?>" >
<input type="button" onclick="pm(1)" value="+">
</form>

</div>
<div >
<form class="plus">
<input type="submit" value="加入購物車">
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

</body>

</html>
