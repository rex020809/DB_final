<!DOCTYPE html>
<html>
<head>
	<?php require("../src/head.php"); ?>
	<link rel=stylesheet type="text/css" href="../src/css/check.css?v=<?=time()?>">
	<title>Checkout</title>
</head>
<body>
	<?php require("../model/navbar.php"); ?>
  <form action="../model/checkout_check.php">
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
      <div class="row" id="price" data-price="300">
        <div class="col-3">1234</div>
        <div class="col-3"><input id="quantity" type="number" class="quantity" value="1" min="0" max="100"></div>
        <div class="col-3">$300</div>
        <div class="col-3"><span id="total">$300</span></div>
      </div>
<!-- 付款資訊 -->
      <div class="row">
        <div class="col-12"><h1 align="center" valign="center">付款資訊</h1></div>
        <!-- 付款方式選項 -->
		<div class="col-12">
      <input id="creditcard" type="radio" name="way" value="creditcard">信用卡<br>
      <input disabled type="text" id="owner">持卡者姓名<br>
      <input disabled id="cardnum" type="tel" inputmode="numeric" pattern="[0-9\s]{13,19}" autocomplete="cc-number" maxlength="19" placeholder="xxxx xxxx xxxx xxxx">卡號<br>
      <input disabled id="date" type="tel" pattern="[0-1][0-12]/[0-9]{2}" placeholder="MM/YY">到期日<br>
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
