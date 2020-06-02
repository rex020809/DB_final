<script src="http://cdn.bootcss.com/blueimp-md5/1.1.0/js/md5.js"></script>
<?php
session_start();
require("db_check.php");

$conn = db_check();

//if($_POST['submit']){
	$oldpassword = md5($_POST['oldpassword']);
	$newpassword = md5($_POST['newpassword']);
	$newpassword2 = md5($_POST['newpassword2']);
	$account = $_SESSION['account'];
//}
if($newpassword == $newpassword2){
	$password_sql = "SELECT * FROM member WHERE account = '$account';";
	$password_result = mysqli_query($conn, $password_sql);
	$row = mysqli_fetch_assoc($password_result);

	if($oldpassword == $row["password"]){
		$reset_sql = "UPDATE member SET password = '$newpassword' WHERE account = '$account';";
		$reset_result = mysqli_query($conn, $reset_sql);
		echo '修改成功';
		header("Location: logout.php");
	}

	else{
		echo '密碼錯誤';
		header("Location: ../view/reset_password.php?error=密碼錯誤"); 
	}	
}
else{
	echo '請再確認一次密碼';
	header("Location: ../view/reset_password.php?error=請再確認一次密碼");
}
?>