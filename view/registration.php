<!DOCTYPE html>
<html>
<head>
	<?php require("../src/head.php"); ?>
	<link rel=stylesheet type="text/css" href="../src/css/loginPage.css">
	<title>Registration</title>
</head>
<body>
	<?php require("../model/navbar.php"); ?>
	<div class="container">
		<div class="row">
			<div class="col-8">
				<img src = "../src/images/logo.png" style="width:300px;">
				<h2>地方的媽媽需要購物</h2>
			</div>
			<div class="col-4" id="login">
				<h1 align="center" valign="center">Registration</h1>
				<div class="register">
					<form id="form" name="form" action="../model/registration_check.php">
						<input id="email" type="email" name="email" placeholder="請輸入E-mail" /><br>
						<input id="c_num" type="tel" name="c_num" placeholder="請輸入手機號碼" pattern="09[0-9]{8}" required /><br>
						<input id="b_date" type="date" placeholder="請輸入生日(yyyy/mm/dd)" name="b_date"/><br>
						<input id="name" type="text" name="name" placeholder="請輸入姓名" /><br>
						<input id="account" type="text" name="account" placeholder="請輸入帳號" /><br>
						<input id="password" type="password" name="password" placeholder="請輸入密碼" /><br>
						<input id="password2" type="password" name="password2" placeholder="請再輸入一次密碼" /><br>
						<button type="submit" name="submit" value="register"/>註冊</button>
					</form>
				</div>
			</div>
		</div>
	</div>
	<?php require('footer.php');?>
</body>



<script>
$("#form").submit(function(e) {
  if ($("#password").val() !== $("#password2").val()) {
    Swal.fire({
      icon: 'warning',
      title: 'Oops...',
      text: '請再確認一次密碼',
    });
    return;
  }
  else {

    var params = {
      email: $('#email').val(),
      c_num: $('#c_num').val(),
      b_date: $('#b_date').val(),
      name: $('#name').val(),
      account: $('#account').val(),
      password: md5($('#password').val()),
    };

    var query = jQuery.param(params);
    var url = "../model/registration_check.php";

    $.ajax({
      type: "POST",
      url: url + '?' + query,
      success: function(data) {
        if (data.includes('已註冊過')) {
          Swal.fire({
            icon: 'warning',
            title: 'Oops...',
            html:data,
          });
        }
        if (data.includes('註冊成功')) {
          Swal.fire({
            icon: 'success',
            title: 'OK',
            text: '註冊成功',
            allowOutsideClick: false,
            showCancelButton: false,
          }).then((result) => {
            if (result.value) {
              window.location = '../model/logout.php'
            }
          })
        }
      }
    });
    e.preventDefault(); // avoid to execute the actual submit of the form.
  }
});
</script>

</html>
