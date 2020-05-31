<?php
if(isset($_SESSION['isLogin'])){
	header("Location: plist.php");
}
?>

<!DOCTYPE html>
<html>
<head>
	<?php require("../src/head.php"); ?>
	<title>Login</title>
</head>
<body>
	<?php require("../model/navbar.php"); ?>
	<div class="container">
		<div class="row">
			<div class="col-8"><h1>地方的媽媽需要陪伴。</h1></div>
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

</body>

<style>

	body{
	background-color: black;
	margin: 0;
	font-family: Arial, Helvetica, sans-serif;
	}

	h1{
		margin-top: 10px;
		color:linen;
		font-size:4vw;
	}

	button{
		color: #FFFF;
		padding:5px 15px;
		background:#F19833;
		border:0 none;
		cursor:pointer;
		-webkit-border-radius: 5px;
		border-radius: 5px;
		margin-bottom: 20px;
	}

	input[type="button"]{
		color: #FFFF;
		padding:5px 15px;
		background:#F19833;
		border:0 none;
		cursor:pointer;
		-webkit-border-radius: 5px;
		border-radius: 5px;
		margin-bottom: 20px;
	}

	input{
	    color: linen;
	    padding:10px 30px;
	   	border:1px solid linen;
	   	background: #0000;
	   	cursor: pointer;
		-webkit-border-radius: 5px;
		border-radius: 5px;
		margin-bottom: 20px;
	}


	.login{
		padding-top: 50px;
		text-align: center
	}

	.col-4{
		border: 2px solid #F19833;
	}

	.reg{
		color: #FFFF;
		padding:5px 15px;
		background:#F19833;
		border:0 none;
		cursor:pointer;
		-webkit-border-radius: 5px;
		border-radius: 5px;
		margin-bottom: 20px;
	}
</style>

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
