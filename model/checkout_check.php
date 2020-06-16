<?php
session_strat();
require("db_check.php");

$quantity = htmlspecialchars($_GET['quantity']);
