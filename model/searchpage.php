


<html>
<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>資料搜尋</title>
<<<<<<< HEAD
        <?php require('../src/head.php') 
=======
        <?php require('../src/head.php')
>>>>>>> b0bdc9f5b2f14e12631d87f3506721e330db3dcf
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
<<<<<<< HEAD
require('config.php');
$conn = @mysqli_connect($db_host, $db_user, $db_pass, $db_name);
=======
require('db_check.php');
$conn = db_check();
>>>>>>> b0bdc9f5b2f14e12631d87f3506721e330db3dcf
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
<<<<<<< HEAD



=======
>>>>>>> b0bdc9f5b2f14e12631d87f3506721e330db3dcf
