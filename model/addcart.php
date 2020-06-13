<?php
    session_start();
    $id=$_GET['id'];
    $num=$_GET['num'];
    if (isset($_SESSION['chart_id'])){
        $_SESSION['chart_id'][sizeof($_SESSION['chart_id'])]=$id;
        $_SESSION['chart_num'][sizeof($_SESSION['chart_num'])]=$num;
        //$_SESSION['chart_num'][sizeof($_SESSION['chart_id'])]=$num;
    } else {
        $_SESSION['chart_id'][0]=$id;
        $_SESSION['chart_num'][0]=$num;
    }
