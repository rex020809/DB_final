<html>
	<head>
		<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet"></link>
		

	</head>
	<body>
		
	<div class="container-fluid" style="border:3px solid red; padding:0px 10vw 0px 10vw;">
		<div class="row" style="border:2px solid blue;">
			<div class="col-a col-md-3" style="border:1px solid green;">Column 1
			</div>
			<div class="col-b col-md-9" style="border:1px solid yellow;">Column 2
				
				<FORM class="form-horizontal" METHOD="GET" id="Product_category" style="text-align:center">
				
				Category:<select name="category" >
							<option value="iphone">iPhone</option>
							<option value="ipad">iPad</option>
							<option value="mac">Mac</option>
							
							
						</select>
						
				<!-- 價格排序:分成由低至高:ascend 由高至低:descend,label是為了使各項form有所區隔，margin:上 右 下 左 -->
				<label style="margin: 0px 0px 0px 15px;"> pricing sort</label><label style="margin: 0px 3px 0px 0px;">: </label><select name="pricing_sort">
							<option value="ascend">ascend</option>
							<option value="descend">descend</option>
							</select>
				<!-- 價格區間:interval，兩個格子的最小值都是0,label是為了使各項form有所區隔，margin:上 右 下 左-->
				<label style="margin: 0px 0px 0px 10px;">interval</label><label style="margin: 0px 3px 0px 0px;">:</label><input type="number" min="0" name="minprice">	
				~<input type="number" min="0" name="maxprice">
				<!--一頁顯示的商品數量:product per page 只開放一次顯示四個或是八個,label是為了使各項form有所區隔，margin:上 右 下 左 -->
				<label style="margin: 0px 0px 0px 10px;">
				<select name="product numbers shown in a page">
							<option value="4">4</option>
							<option value="8">8</option>
							</select>
							product per page
				<label style="margin: 0px 10px 0px 0px;">
				<!--送出按鈕,label是為了使各項form有所區隔，margin:上 右 下 左-->
				<label style="margin: 0px 0px 0px 15px;">	
				<input type="submit" name="search" value="search" style="cursor:pointer;-webkit-border-radius: 5px;border-radius: 5px; }">
				<label style="margin: 0px 0px 0px 0px;">
				</FORM>
				
				
				
				

			</div>

  </div>
 </div>


</html>