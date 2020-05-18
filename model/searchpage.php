


<html>
<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>資料搜尋</title>
        <?php require('../src/head.php')
		?>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>資料搜尋</title>

</head>

<body>
    <form action="" method="POST">
    search:<br/>
    <input type="text" name="search"/><br/>
	<input type="submit" name="button" value="搜尋">
    </form>
<?php
require('db_check.php');
$conn = db_check();
mysqli_query( $conn, "SET NAMES 'utf8'");
$search = $_POST['search'];
$query = "SELECT * FROM product WHERE p_name LIKE '%$search%' ";
$data=mysqli_query($conn,$query);

?>

<table width="700" border="0">

<?php
if($search!=''){
for($i=1;$i<=mysqli_num_rows($data);$i++){
$rs=mysqli_fetch_row($data);
?>
  <tr>
    <td><?php echo $rs[1]?></td>
    <td><?php echo $rs[2]?></td>
    <td><?php echo $rs[6]?></td>
  </tr>
    <?php
	}
}
?>
  </table>
 </body>

</html>
