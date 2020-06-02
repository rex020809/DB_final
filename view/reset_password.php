<!DOCTYPE html>
<html>
<head>
	<?php require("../src/head.php"); ?>
	<link rel=stylesheet type="text/css" href="../src/css/loginPage.css">
	<title>Reset Password</title>
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
				<h1 align="center" valign="center">Reset Password</h1>
				<div class="reset">
					<form id="form" name="form" method="post" action="../model/reset_password_check.php">
						<input id="oldpassword" type="password" name="oldpassword" placeholder="請輸入舊密碼" /><br>
						<input id="newpassword" type="password" name="newpassword" placeholder="請輸入新密碼" /><br>
						<input id="newpassword2" type="password" name="newpassword2" placeholder="請再輸入一次新密碼" /><br>
						<button type="submit" name="submit" value="reset"/>修改</button>
					</form>
				</div>
			</div>
		</div>
	</div>
	<?php require('footer.php');?>
</body>


<script>
if(getUrlVars()['error']) {
	Swal.fire({
		icon: 'warning',
		title: 'Oops...',
		text: decodeURIComponent(getUrlVars()['error']),
	});
}
function getUrlVars()
{
	var vars = [], hash;
	var hashes = window.location.href.slice(window.location.href.indexOf('?') + 1).split('&');
	for(var i = 0; i < hashes.length; i++)
	{
		hash = hashes[i].split('=');
		vars.push(hash[0]);
		vars[hash[0]] = hash[1];
	}
	return vars;
}
</script>

</html>
