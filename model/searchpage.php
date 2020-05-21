
<html>

<head>
<link rel="stylesheet" type = "text/css" href="../src/css/infopage.css">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>資料搜尋</title>
    <?php require('../src/head.php')?>
</head>
	<?php require('navbar.php')?>
<body>
    
<?php

require('db_check.php');
$conn = db_check();
mysqli_query( $conn, "SET NAMES 'utf8'");
$search = $_POST['search'];
$query = "SELECT * FROM product WHERE p_name LIKE '%$search%' ";
$data=mysqli_query($conn,$query);

?>

	<div class = "mainb">
	<table class="flex">
	<tr class="tab">
    <td class="flex1">商品</td>
    <td class="flex1">款式</td>
    <td class="flex1">價格</td>
	</tr>
<?php
if($search!=''){
for($i=1;$i<=mysqli_num_rows($data);$i++){
$rs=mysqli_fetch_row($data);
?>
	<tr class="tab">
    <td  class="flex1"><?php echo $rs[1]?></td>
    <td class="flex1"><?php echo $rs[2]?></td>
    <td class="flex1"><?php echo $rs[6]?></td>
	</tr>
    <?php
	}
}
?>
	</table>
	</div>
 </body>

</html>
