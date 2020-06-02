<html>
	<head>
		<?php require('../src/head.php'); ?>
		<link rel=stylesheet type="text/css" href="../src/css/product.css">
		<!-- <meta http-equiv="refresh" content="2" /> -->
	</head>
	<body>
	<?php require('../model/navbar.php'); ?>
	<div class="container-fluid" id="product_main" >
		<div class="row">
			<div class="col-a col-md-2">
				<div id="sidebar">
					Column 1
				</div>
			</div>
			<div class="col-b col-md-10">

				<!--  篩選選項欄位 -->
				<FORM class="form-horizontal" METHOD="GET" id="filter" style="text-align:center">

					<!-- 篩選商品種類 -->
					<label>Category:</label>
					<select name="category" >
						<option value="all">all</option>
						<option value="iphone">iPhone</option>
						<option value="ipad">iPad</option>
						<option value="mac">Mac</option>
					</select>

					<!-- 價格排序:分成由低至高:ascend 由高至低:descend,label是為了使各項form有所區隔，margin:上 右 下 左 -->
					<label> pricing sort:</label>
					<select name="pricing_sort">
						<option value="none">none</option>
						<option value="ASC">ascend</option>
						<option value="DESC">descend</option>
					</select>

					<!-- 價格區間:interval，兩個格子的最小值都是0,label是為了使各項form有所區隔，margin:上 右 下 左-->
					<label>interval:</label>
					<input type="number" class="p_interval" value=0 min="0" name="minprice"> ~
					<input type="number" class="p_interval" value=999999 min="0" name="maxprice">

					<!-- 一頁顯示的商品數量:product per page 只開放一次顯示四個或是八個,label是為了使各項form有所區隔，margin:上 右 下 左 -->
					<label></label>
					<select name="pnumber">
						<option value="8">8</option>
						<option value="12">12</option>
						<option value="16">16</option>
					</select>
					<label id="product_per_page">product per page</label>
					<label></label>

					<!--送出按鈕,label是為了使各項form有所區隔，margin:上 右 下 左-->
					<input id="search" type="submit" name="search" value="search">

				</FORM>


				<!-- 商品瀏覽部分 -->
				<div id="product_display">
					<?php
						//-------抓篩選的資料(初始化)-----------
						if (!isset($_GET['minprice'])) {
							$minprice=0;
							$maxprice=999999;
						} else {
							$minprice = @$_GET['minprice'];
							$maxprice = @$_GET['maxprice'];
						}

						if (!isset($_GET['category'])) {
							$category = "all";
						} else {
							$category = @$_GET['category'];
						}

						if (!isset($_GET['pricing_sort'])) {
							$p_sort = "none";
						} else {
							$p_sort = @$_GET['pricing_sort'];
						}

						if (!isset($_GET['pnumber'])) {
							$pnumber = 8;
						} else {
							$pnumber = @$_GET['pnumber'];
						}

						if (!isset($_GET['page'])) {
							$page = 0;
						} else {
							$page = @$_GET['page'];
						}


						//---------連資料庫，開始抓資料------------
						require('../model/db_check.php');
						$conn = db_check();
						$sql="SELECT * FROM product WHERE price < $maxprice AND price > $minprice ";


						//類別篩選
						$c_filter = "AND category = '$category' ";

						if( $category != 'all'){
							$sql=$sql.$c_filter;
						}

						//排序篩選
						$sort_filter = "ORDER BY price $p_sort";
						if ($p_sort!='none'){
							$sql = $sql.$sort_filter;
						}

						$result = mysqli_query($conn, $sql);
						$result_num = mysqli_num_rows($result);

						//設定總共顯示的頁數
						$page_num = $result_num/$pnumber;

						//----------抓資料完畢，以下開始秀資料
						for ($i=0; $i < $page*$pnumber ; $i++) { //根據頁數把前面不要的篩掉
							$row = mysqli_fetch_assoc($result);
						}

						if (($page_num-$page)<1) {  //設定這個頁面要顯示多少個商品
							$pnumber_this=$result_num%$pnumber;
						} else {
							$pnumber_this=$pnumber;
						}
						for ($i=0; $i < $pnumber_this; $i++) { //抓資料，印出商品
							$row = mysqli_fetch_assoc($result);

							//抓商品快照資料
							$p_id=$row['p_id'];
							$sql = "SELECT * FROM product_browse WHERE p_id='$p_id';";
							$photo_result = mysqli_query($conn, $sql);
							$photo_link = mysqli_fetch_assoc($photo_result);
					?>

						<!-- 每個商品的html -->
						<div class="product_sum">
							<img src="<?=$photo_link['pic_src']?>" alt="not found!">
							<a href="../model/infopage.php?p_id=<?php echo $row['p_id']; ?> " >
							<div class="product_title">
								<?= $row['p_name'] ?><br><br>
								<?= '價格$'.$row['price']."/ ".$row['stock'].' left' ?><br><br>
							</div>
							</a>
						</div>
					<?php }?>
				</div>

				<!-- 顯示頁數的欄位 -->
				<div id="page_index">
					<?php
						$query="category=$category&pricing_sort=$p_sort&minprice=$minprice&maxprice=$maxprice&pnumber=$pnumber";
						if ($page!=0) {
							$tmp = $page-1;
					?>
						<a href="plist.php?<?="$query"."&page=$tmp"?>"> 上一頁 </a>
					<?php }?>
					<?php for ($i=0; $i < $page_num; $i++) { ?>
						<a href="plist.php?<?="$query"."&page=$i"?>"> <?= $i+1 ?></a>
					<?php } ?>
					<?php if(($page_num-$page)>1){
						$tmp = $page+1;
					?>
					    <a href="plist.php?<?="$query"."&page=$tmp"?>"> 下一頁 </a>
					<?php } ?>
				</div>

			</div>
  		</div>
 </div>
 <?php require('footer.php');?>


</html>
