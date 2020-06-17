<!DOCTYPE html>
<html>
<head>
	<?php require("../src/head.php"); ?>
	<?php require('../model/db_check.php');?>
	<link rel=stylesheet type="text/css" href="../src/css/check.css?v=<?=time()?>">
	<title>Checkout</title>
</head>
<body>
	<?php require("../model/navbar.php"); ?>
  	<form action="../model/checkout_check.php" method="get">
	<div class="container-fluid">
	<div class="row">
<!-- 商品資訊 -->
	<div class="col-12"><h1 align="center" valign="center">商品資訊</h1></div>
    </div>
      <!-- 欄位名稱 -->
      <div class="row">
        <div class="col-3">品名</div>
        <div class="col-3">數量</div>
        <div class="col-3">單價</div>
        <div class="col-3">總價</div>
      </div>
      <!-- 資訊 -->
            <?php
                // session_start();
                $conn = db_check();
                for($i=0;$i<sizeof($_SESSION['chart_id']);$i++){
                    $nav_id=$_SESSION['chart_id'][$i];
                    $nav_var="SELECT p_name , pic_src, price FROM product AS p1, product_browse AS p2 WHERE p1.p_id='$nav_id' AND p2.p_id=p1.p_id";
                    $nav_result=mysqli_query($conn,$nav_var);
                    $nav_row=mysqli_fetch_assoc($nav_result);
                    $nav_pname=$nav_row['p_name'];
					$nav_price=$nav_row['price'];
                    $nav_img=$nav_row['pic_src'];
            ?>
			<div class="row cart" id="price" data-price="300">
				<div class="col-3">
					<input type="checkbox" name="id[]" value="<?=$nav_id?>">
					<img src="<?=$nav_img?>" alt="fuck" >
					<p class="cart_pname">
					   <?php echo $nav_pname?>
				   </p>
			 	</div>
		        <div class="col-3">
					<p class="cart_num">
						<!--  -->
						<input type="button" onclick="pm(<?=$nav_id?>, -1)" value="-">
						<input type="number" id="txt<?=$nav_id?>" name="shopcount<?=$nav_id?>" value=<?= $_SESSION['chart_num'][$i];?> >
						<input type="button" onclick="pm(<?=$nav_id?>, 1)" value="+">
	                </p>
		        </div>
		        <div class="col-3">
					<p class="cart_pname" id="price<?=$nav_id?>">
					   <?php echo $nav_price?>
				   	</p>
		        </div>
		        <div class="col-3" id="total<?=$nav_id?>"> <?= $_SESSION['chart_num'][$i]*$nav_price ?>
				</div>
	            <hr>
			</div>
            <?php
                }
            ?>

<!-- 付款資訊 -->
      <div class="row">
        <div class="col-12"><h1 align="center" valign="center">付款資訊</h1></div>
        <!-- 付款方式選項 -->
		<div class="col-12">
      <input id="creditcard" type="radio" name="way" value="creditcard">信用卡<br>
      <input disabled type="text" id="owner">持卡者姓名<br>
      <input disabled id="cardnum" type="tel" inputmode="numeric" pattern="[0-9\s]{13,19}" autocomplete="cc-number" maxlength="19" placeholder="xxxx xxxx xxxx xxxx">卡號<br>
      <input disabled id="date" type="tel" inputmode="numeric" placeholder="MMYY">到期日<br>
      <input disabled id="cvv" type="tel" inputmode="numeric" pattern="[0-9]{3}" placeholder="xxx">CVV<br>
	   <input id="cash" type="radio" name="way" value="cash">貨到付款<br>

		</div>
    </div>
<!-- 寄送資訊 -->
      <div class="row">
        <div class="col-12"><h1 align="center" valign="center">寄送資訊</h1></div>
		<div class="col-12">
      <label for="frmAddressS">地址</label>
      <div id="twzipcode">
        <input type="text" name="ship-address" required id="frmAddressS" placeholder="街／路、樓層" autocomplete="shipping street-address">
      </div>
		</div>
      </div>
<!-- 訂單資訊 -->
      <div class="row">
        <div class="col-12"><h1 align="center" valign="center">訂單資訊</h1></div>
        <div class="col-8"></div>
        <div class="col-4">
          <div class="row">5555</div>
          <div class="row">1000</div>
          <div class="row">6555</div>
          <div class=row><input type="submit" value="下訂單"></div>
        </div>
      </div>
  </div>
</div>
</form>

	<?php require('footer.php');?>
</body>

<script>
$("#twzipcode").twzipcode({
  zipcodeIntoDistrict: true
});

function pm(id, num)  //增加商品數量
{
	if (num>0)
	{
		document.getElementById("txt"+id).value++;
	} else if(document.getElementById("txt"+id).value == 1) {
		return false;
	} else {
		document.getElementById("txt"+id).value--;
	}
	var tprice=document.getElementById("price"+id).innerHTML*document.getElementById("txt"+id).value
	document.getElementById("total"+id).innerHTML = tprice;
	return false;
}

$('#price').on( 'keyup','.quantity',function(){
  var price = +$(this).closest('#price').data('price');
  var quantity = +$(this).val();
  $(this).closest('#price').find('#total').text('$'+price*quantity);
});

$('#price').on( 'click','.quantity',function(){
  var price = +$(this).closest('#price').data('price');
  var quantity = +$(this).val();
  $(this).closest('#price').find('#total').text('$'+price*quantity);
});

$('#creditcard').on('click',function(){
  $("#owner").removeAttr("disabled");
  $("#cardnum").removeAttr("disabled");
  $("#date").removeAttr("disabled");
  $("#cvv").removeAttr("disabled");
})

$('#cash').on('click',function(){
  var owner = document.getElementById("owner");
  var cardnum = document.getElementById("cardnum");
  var date = document.getElementById("date");
  var cvv = document.getElementById("cvv");
  owner.setAttribute("disabled","");
  cardnum.setAttribute("disabled","");
  date.setAttribute("disabled","");
  cvv.setAttribute("disabled","");
})

</script>

</html>
