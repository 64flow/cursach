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
<?php require "blocks/header3.php" ?>




<div class="container mt-5">
	<h3 class="mb-5'">Панель администратора</h3>
	
<?php
require_once('/home/p/p98554f1/p98554f1.beget.tech/public_html/MySQL.php');
session_start();
$proverka = $_SESSION['user_id'];
if ($proverka!=-1){
    echo '<script type="text/javascript"> alert("У вас нет доступа к этой странице");</script>';
    echo '<script>window.location.href = "./admin.php";</script>';
}
else{
//echo json_encode($_SESSION);
$db = new MySQL();
$db->Connect(
    'localhost',
    'p98554f1_conchal',
    'Kursach28!',
    'p98554f1_conchal'
);
$id=$_GET['id'];
//echo json_encode($_SESSION['user_id']);
echo"
<div class='card mb-4 shadow-sm'>
			<div class='card-header'>
				
			</div>
			<div class='card-body'>
				<a href='personal.php'><button type='button' class='btn btn-lg btn-block btn-outline-primary'>Персонал</button></a>
				<a href='adminmain.php'><button type='button' class='btn btn-lg btn-block btn-outline-primary'>Залы</button></a>
				<a href='equipment3.php'><button type='button' class='btn btn-lg btn-block btn-outline-primary'>Оборудование</button></a>
                <a href='arendfiz.php'><button type='button' class='btn btn-lg btn-block btn-outline-primary'>Арендаторы физлица</button></a>
                <a href='arendur.php'><button type='button' class='btn btn-lg btn-block btn-outline-primary'>Арендаторы юрлица</button></a>
                
                <a href='own.php'><button type='button' class='btn btn-lg btn-block btn-outline-primary'>Владельцы</button></a>
                <a href='dog.php'><button type='button' class='btn btn-lg btn-block btn-outline-primary'>Договоры</button></a>
                <a href='stat.php'><button type='button' class='btn btn-lg btn-block btn-outline-primary'>Статистика по аренде</button></a>
			</div>
		</div>";}