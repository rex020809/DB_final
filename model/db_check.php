<?php
function db_check() {
    $servername = "localhost";
    $username = "db_final";
    $password = "a12345678";
    $dbname = "db_final";
    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("連接失敗: " . $conn->connect_error);
    }
    echo " ";
    return  $conn;
}
?>
