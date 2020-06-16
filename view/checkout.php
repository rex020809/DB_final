<!DOCTYPE html>
<html>
<head>
	<?php require("../src/head.php"); ?>
	<link rel=stylesheet type="text/css" href="../src/css/check.css">
	<title>Checkout</title>
</head>
<body>
	<?php require("../model/navbar.php"); ?>
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
        <div class="col-3"><input type="number" class="quantity" value="1" min="0" max="100"></div>
        <div class="col-3">$300</div>
        <div class="col-3"><span id="total">$300</span></div>
      </div>
<!-- 付款資訊 -->
      <div class="row">
        <div class="col-12"><h1 align="center" valign="center">付款資訊</h1></div>
        <!-- 付款方式選項 -->
        <form id="pay">
          <input id="creditcard" type="radio" name="way" value="creditcard">信用卡<br>
          <input id="cash" type="radio" name="way" value="cash">貨到付款<br>
        </form>
      </div>
<!-- 寄送資訊 -->
      <div class="row">
        <div class="col-12"><h1 align="center" valign="center">寄送資訊</h1></div>
        <form id="address" name="address" method="POST" action="#">
          <label for="frmAddressS">地址</label>
          <div id="twzipcode">
            <input type="text" name="ship-address" required id="frmAddressS" placeholder="街／路、樓層" autocomplete="shipping street-address">
          </div>
        </form>
      </div>
<!-- 訂單資訊 -->
      <div class="row">
        <div class="col-12"><h1 align="center" valign="center">訂單資訊</h1></div>
        <div class="col-8"></div>
        <div class="col-4">
          <div class="row">5555</div>
          <div class="row">1000</div>
          <div class="row">6555</div>
          <div class="row"><button type="submit">下訂單</button></div>
        </div>
      </div>
	</div>


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

}

</script>

</html>
