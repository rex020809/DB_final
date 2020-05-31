<?php
session_start();
//session_destroy();
unset($_SESSION['isLogin']);
unset($_SESSION['name']);
unset($_SESSION['account']);
//print_r($_SESSION);
header("Location: ../view/plist.php");
?>
