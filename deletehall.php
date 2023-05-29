<!DOCTYPE html>
<html lang="ru">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-
scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" href=" https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<title>Аренда залов</title>
</head>
<body>
<?php require "blocks/header2.php" ?>
<div class="container mt-5">
	<h3 class="mb-5'">Панель администратора</h3>
	
<?php
require_once('/home/p/p98554f1/p98554f1.beget.tech/public_html/MySQL.php');
session_start();
$db = new MySQL();
$db->Connect(
    'localhost',
    'p98554f1_conchal',
    'Kursach28!',
    'p98554f1_conchal'
);
$id = $_GET['id'];
echo json_encode($_GET);
$db->Execute("DELETE FROM `залы` WHERE `ID_зала`=$id");
echo '<script type="text/javascript"> alert("Зал успешно удалён");</script>';
echo '<script>window.location.href = "./adminmain.php?id=' . $_SESSION['user_id'] . '";</script>';