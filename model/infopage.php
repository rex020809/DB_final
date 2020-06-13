
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
$id=$_GET['p_id'];  //存當前頁面的商品id

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

<div class="flex"> <!-- 包全部 -->

	<div class="flexA"> <!-- 圖片部分 -->
		<img src="<?php echo $pict[0] ;?>" class="mainpic">
	</div>

	<div class="flexB">  <!-- title部分 -->
		<p class="title"><?php echo $namee[1];?></p>
		<p class="price"><?php echo "價格 $ ".$namee[5];?></p>
		<br>
		<div class="button"> <!-- 商品數量調整部分 -->
			<input type="button" onclick="pm(-1)" value="-">
			<input type="number" id="txt" name="shopcount" value=1 >
			<input type="button" onclick="pm(1)" value="+">
		</div>
		<div >
			<form class="plus" id="form" method="post" action="infopage.php?p_id=<?php echo $id; ?>">
				<button type="button" name="button" onclick="add(<?= $id ?>)">fuck</button>
			</form>
		</div>
	</div>

	<div class="flexC"> <!-- 描述部份 -->
		<p><?php echo $namee[7];?></p>
		<p><?php echo $_SESSION['chart_id'][1];?></p>
	</div>
</div>



<?php
}
?>

</div>

</body>
<script language="javascript">
function add(id){
	var url="addcart.php";
	var num=document.getElementById("txt").value;
	var query="id="+id+"&num="+num;
	$.ajax({
        type: "POST",
        url: url + '?' + query,
        success: function(data) {
			Swal.fire({
                    icon: 'success',
                    title: 'Success!',
                    text: 'fuck success',
                    allowOutsideClick: false,
                    showCancelButton: false,
                }).then((result) => {
                    if (result.value) {
                        window.location = 'infopage.php?p_id='+id;
                    }
                })
        }
    });
}

function pm(num)  //增加商品數量
{
	if (num>0)
	{
		document.getElementById("txt").value++;
	} else if(document.getElementById("txt").value == 1) {
		return false;
	} else {
		document.getElementById("txt").value--;
	}
	return false;
}

// function pl(){  //將商品寫入SESSION
// 	var num=document.getElementById('txt').value;
// 	<?php //$num = <script> print(document.write(num)) </script> ?>
// 	<?php
// 		if (isset($_SESSION['chart_id'])){
// 			$_SESSION['chart_id'][sizeof($_SESSION['chart_id'])]=$id;
// 			//$_SESSION['chart_num'][sizeof($_SESSION['chart_id'])]=$num;
// 		} else {
// 			$_SESSION['chart_id'][0]=$id;
// 		}
// 	?>
// }
$("#form").submit(function(e){
    Swal.fire({
      icon: 'warning',
      title: 'Oops...',
      text: '已加入購物車',
	  });
	  e.preventDefault();
    return;
});
</script>


</html>
