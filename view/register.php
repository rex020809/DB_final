

<?php

    //引入 db_check() 函數
    require("../model/db_check.php"); 

    $conn = db_check();

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
            $result = mysqli_query($conn, "SELECT * FROM member WHERE acc = '$account'");
            $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

            if(isset($row['acc']))//已經註冊過了
            {
                echo "此帳號已被註冊";
            }
            else
            {
                $update = "INSERT INTO member(n, acc, passwd) VALUES('$name', '$account', '$passwd')" ;
                mysqli_query($conn, $update);
                //echo "名稱： $name ,註冊帳號： $account , 密碼： $passwd, ";
                header("location: index.php");
            }
        }
    }
    
?>

<!DOCTYPE html>
<html>

<head>

    <?php require("../src/head.php") ?>
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
            
            <button type="button" class="btn-block btn-primary" style="margin-top:3px" onclick="location.href = '../index.php'">返回</button>
        </div>   
    </div>
</body>

</html>