<?php
session_start();

require("db_check.php");

$account = htmlspecialchars($_POST['account']);
$password = md5(htmlspecialchars($_POST['password']));
$sql = "SELECT name FROM member WHERE account = '$account' AND password = '$password';";
$result = mysqli_query($conn, $sql);

if(mysqli_num_rows($result) == 0) {
	echo '帳號密碼錯誤';
	header("Location: ../view/login.php?error=帳號密碼錯誤");  
}
else{
	$row = mysqli_fetch_assoc($result);
	echo '登入成功';
	$_SESSION['isLogin'] = 1;
    $_SESSION['name'] = $row["name"];
    $_SESSION['account'] = $row["account"];
    header("Location: ../view/plist.php"); 
}
mysqli_close($conn);

?>