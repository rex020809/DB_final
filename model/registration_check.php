<?php
require("db_check.php");

$email = htmlspecialchars($_GET['email']);
$c_num = htmlspecialchars($_GET['c_num']);
$b_date = htmlspecialchars($_GET['b_date']);
$name = htmlspecialchars($_GET['name']);
$account = htmlspecialchars($_GET['account']);
$password = md5(htmlspecialchars($_GET['password']));


$email_sql = "SELECT account FROM member WHERE email = '$email';";
$phone_sql = "SELECT account FROM member WHERE c_num = '$c_num';";
$account_sql = "SELECT account FROM member WHERE account = '$account';";

$conn=db_check();

$email_result = mysqli_query($conn, $email_sql);
$phone_result = mysqli_query($conn, $phone_sql);
$account_result = mysqli_query($conn, $account_sql);

if(mysqli_num_rows($email_result) > 0) {
    echo "該email已註冊過";
    echo '<br>';
}

if(mysqli_num_rows($phone_result) > 0) {
	echo "該手機號碼已註冊過" ;
	echo '<br>';
}

if(mysqli_num_rows($account_result) > 0) {
    echo "該帳號已註冊過";
    echo '<br>';
}

if(mysqli_num_rows($email_result) === 0 && mysqli_num_rows($phone_result) === 0 && mysqli_num_rows($account_result) === 0) {
	$sql = "INSERT INTO member (account, password, name, c_num, email, b_date)
    VALUES ('$account', '$password', '$name', '$c_num', '$email', '$b_date');";
    if (mysqli_query($conn, $sql)) {
      echo "註冊成功";
      header("Location:../view/plist.php");
    } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

mysqli_close($conn);
?>
