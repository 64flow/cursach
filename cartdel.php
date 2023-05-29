<?php
session_start();
$_SESSION['cart'] = array();
$_SESSION['cart1'] = array();
header('Location: ./user.php');
?>