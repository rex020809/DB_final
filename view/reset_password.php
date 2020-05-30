<!DOCTYPE html>
<html>
<head>
	<?php require("../src/head.php"); ?>
	<title>Reset Password</title>
</head>
<body>
	<?php require("../model/navbar.php"); ?>
	<div class="container">
		<div class="row">
			<div class="col-8"><h1>地方的媽媽需要陪伴。</h1></div>
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

</body>

<style>
	label{
		color:linen;
	}
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
		padding: 5px 15px; 
		background: #F19833; 
		color:linen;
		border: 0 none;
		cursor: pointer;
		-webkit-border-radius: 5px;
		border-radius: 5px;
		margin-top: 10px; 
		margin-bottom: 20px;
	}
    
    input{
		padding: 10px 30px; 
		border: 1px solid linen;
		background: #0000;
		color: linen;
		cursor: pointer;
		-webkit-border-radius: 5px;
		border-radius: 5px; 
		margin-bottom: 20px;
	}

 
	.reset{
	    padding-top: 50px;
	    text-align: center
	}
	.col-4{
		border: 2px solid #F19833;
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