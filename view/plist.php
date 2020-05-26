<html>
	<head>
		<?php require('../src/head.php'); ?>
		<link rel=stylesheet type="text/css" href="../src/css/product.css">
	</head>
	<body>

	<div class="container-fluid" style="border:3px solid red; padding:0px 5vw 0px 5vw;">
		<div class="row" style="border:2px solid blue;">
			<div class="col-a col-md-3" style="border:1px solid green;">Column 1
			</div>
			<div class="col-b col-md-9" style="border:1px solid yellow;">

				<!--  篩選選項欄位 -->
				<FORM class="form-horizontal" METHOD="GET" id="filter" style="text-align:center">

					<!-- 篩選商品種類 -->
					<label>Category:</label>
					<select name="category" >
						<option value="none">all</option>
						<option value="iphone">iPhone</option>
						<option value="ipad">iPad</option>
						<option value="mac">Mac</option>
					</select>

					<!-- 價格排序:分成由低至高:ascend 由高至低:descend,label是為了使各項form有所區隔，margin:上 右 下 左 -->
					<label> pricing sort:</label>
					<select name="pricing_sort">
						<option value="none">Plz select</option>
						<option value="ascend">ascend</option>
						<option value="descend">descend</option>
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
					<input type="submit" name="search" value="search" style="cursor:pointer; border-radius:5px;">

				</FORM>


				<!-- 商品瀏覽部分 -->
				<div id="product_display">
					<?php
						$minprice = $_GET['minprice'];
						$maxprice = $_GET['maxprice'];
						$category = $_GET['category'];
						$p_sort = $_GET['pricing_sort'];
						$pnumber = $_GET['pnumber'];
						if (!isset($_GET['minprice'])) {
							$minprice=0;
							$maxprice=999999;
						}
						require('../model/db_check.php');
						$conn = db_check();
						$sql="SELECT * FROM product WHERE price < $maxprice AND price > $minprice ";
						$c_filter = " category = '$category' ";
						$sort_filter = "ORDER BY";
						$result = mysqli_query($conn, $sql);
						$result_num=mysqli_num_rows($result);
						$rnum=$result_num/4+1;
						for ($i=0; $i < $rnum; $i++) {
					?>
					<div class="product_row">
						<?php
							if (($result_num-4*$i)<4) $cnum=$result_num-4*$i;
							else $cnum=4;
							// echo $i;
							// echo "\n";
							// echo "result_num=".$result_num."\n";
							// echo "rnum=".$rnum."\n";
							// echo "cnum=".$cnum."\n";
							for ($j=0; $j < $cnum; $j++) {
								$row = mysqli_fetch_assoc($result);
						?>
						<a href="..model/infopage.php?p_id= <?php echo $row['p_id']; ?> " >
						<div class="product_sum">
							<img src="../src/images/default.png" alt="not found!">
							<div class="product_title">
								<ul>
									<li><?= $row['p_name'] ?></li>
									<li><?= '價格$'.$row['price'] ?></li>
									<li><?= $row['stock'].' left' ?></li>
								</ul>
							</div>
						</div>
						</a>
					<?php }?>
					</div>
					<?php }?>
				</div>





			</div>

  </div>
 </div>


</html>
