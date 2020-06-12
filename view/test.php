<?php
    session_start();
    $_SESSION["id"]=array(1, 3, 5);
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title></title>
    </head>
    <body>
        <?php
            print_r($_SESSION["id"]);
            $_SESSION["id"][sizeof($_SESSION['id'])]=11;
            print_r($_SESSION["id"]);
            echo $_SESSION["id"][3];
        ?>
    </body>
</html>
