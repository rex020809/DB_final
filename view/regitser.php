<?php

    $DBNAME = "user_account";
    $DBUSER = "root";
    $DBPASSWD = "";
    $DBHOST = "localhost";

    $conn = mysqli_connect($DBHOST,$DBUSER,$DBPASSWD, $DBNAME) or die("fail to connect");

    if(isset($_POST['submit']))
    {
        $name = stripcslashes($_POST['name']);
        $account = stripcslashes($_POST['account']);
        $passwd = stripcslashes($_POST['passwd']);
        $cfm_passwd = stripcslashes($_POST['cfm_passwd']);


        if(strlen($name) == 0 || strlen($account) == 0 || strlen($passwd) == 0 || strlen($cfm_passwd) == 0)
        {
            echo "欄位不得為空";
        }
        else if($passwd != $cfm_passwd)//密碼驗證錯誤
        {
            echo "密碼不相同";
        }
        else    //尋找有沒有相同帳號
        {
            $result = mysqli_query($conn, "SELECT * FROM accounts WHERE acc = '$account'");
            $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

            if(isset($row['acc']))//已經註冊過了
            {
                echo "此帳號已被註冊";
            }
            else
            {
                $update = "INSERT INTO accounts(n, acc, passwd) VALUES('$name', '$account', '$passwd')" ;
                mysqli_query($conn, $update);
                echo "名稱： $name ,註冊帳號： $account , 密碼： $passwd, ";
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

    <link rel="stylesheet" href="../src/css/loginPage.css">
    <title>註冊頁面</title>

</head>
<body>

    <div class="card">

        <div class="card-head">
        <h3>Register a New Account</h3>
        </div>
        <div class="card-body">
            <form method = "post" action="register.php">
                <div class="form-group">
                    <label for="name">Name:</label>
                    <input type="name" class="form-control" placeholder="Your Name" name="name">
                </div>
                <div class="form-group">
                    <label for="account">Account:</label>
                    <input type="account" class="form-control" placeholder="Your Account" name="account">
                </div>
                <div class="form-group">
                    <label for="passwd">Password:</label>
                    <input type="password" class="form-control" placeholder="Password" name="passwd">
                </div>

                <div class="form-group">
                    <label for="cfm_passwd">Confirm Your Password:</label>
                    <input type="password" class="form-control" placeholder="Password" name="cfm_passwd">
                </div>


                <button type="submit" class="btn-block btn-primary" name="submit">註冊</button>
            </form>
            
            <button type="button" class="btn-block btn-primary" style="margin-top:3px" onclick="location.href = 'index.php'">返回</button>
        </div>   
    </div>
</body>

</html>