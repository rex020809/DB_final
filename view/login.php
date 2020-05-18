<?php

require("../model/db_check.php"); //引入 db_check() 函數

$conn = db_check();

if(isset($_POST['submit']))
{
    $account = stripcslashes($_POST['account']);
    $passwd = stripcslashes($_POST['passwd']);

    if(strlen($account) == 0 || strlen($passwd) == 0)
    {
        echo "欄位不得為空";
    }
    else{

        $result = mysqli_query($conn, "SELECT * FROM accounts WHERE acc = '$account' AND passwd ='$passwd'");
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

    
        if(!isset($row['acc']))//沒找到帳號密碼都符合的
        {
            echo "帳號或密碼錯誤, 請重新輸入";
        }
        else
        {
            echo "登入成功 名稱：" . $row['n'];
            setcookie("username", $row['n'], time()+3600);
            header("location: index.php");
        }
    }
}

?>


<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>

    <link rel="stylesheet" type = "text/css" href="../src/css/loginPage.css"></style>
    <title>登入頁面</title>

</head>
<body>

    <div class="card">

        <div class="card-head">
        <h3>Login Your Account</h3>
        </div>
        <div class="card-body">
            <form method = "post" action="login.php">
                
                <div class="form-group">
                    <label for="account">Account:</label>
                    <input type="account" class="form-control" placeholder="Your Account" name="account">
                </div>
                <div class="form-group">
                    <label for="passwd">Password:</label>
                    <input type="password" class="form-control" placeholder="Password" name="passwd">
                </div>
                <a href='register.php' >還沒有帳號嗎?</a>
                <button type="submit" class="btn-block btn-primary" name="submit">登入</button>
            </form>
            
            <button type="button" class="btn-block btn-primary" style="margin-top:3px" onclick="location.href = 'index.php'">返回</button>
        </div>   
    </div>
</body>


</html>