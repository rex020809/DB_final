<?php
if(isset($_SESSION['isLogin'])){
	header("Location: plist.php");
}
?>

<!DOCTYPE html>
<html>
<head>
	<?php require("../src/head.php"); ?>
	<link rel=stylesheet type="text/css" href="../src/css/loginPage.css">
	<title>Login</title>
</head>
<body>
	<?php require("../model/navbar.php"); ?>
	<div class="container" style="height:75vh;">
		<div class="row">
			<div class="col-8">
				<img src = "../src/images/logo.png" style="width:300px;">
				<h2>地方的媽媽需要購物</h2>
			</div>
			<div class="col-4" id="login">
				<h1 align="center" valign="center">Login</h1>
				<div class="login">
					<form name="form" method="post" action="../model/login_check.php">
						<input id="account" type="text" name="account" placeholder="帳號" /><br>
						<input id="password" type="password" name="password" placeholder="密碼" /><br>
						<button type="submit" name="submit" value="login"/>登入</button>
						<input type="button" value="註冊" onclick="location.href='../view/registration.php'">
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
