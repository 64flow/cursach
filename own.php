<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	
    <title>Информация о зале</title>
    <style>
        #map {
            height: 400px;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
<?php require "blocks/header3.php" ?>
<div class="container mt-5">
	<h3 class="mb-5'">Владельцы</h3>
<?php
require_once('/home/p/p98554f1/p98554f1.beget.tech/public_html/MySQL.php');
session_start();
$proverka = $_SESSION['user_id'];
if ($proverka!=-1){
    echo '<script type="text/javascript"> alert("У вас нет доступа к этой странице");</script>';
    echo '<script>window.location.href = "./admin.php";</script>';
}
$db = new MySQL();
$db->Connect(
    'localhost',
    'p98554f1_conchal',
    'Kursach28!',
    'p98554f1_conchal'
);

$id = $_GET['id'];

$sql = "SELECT *
FROM владелец";
$owners = $db->Select($sql);


echo"<a href='crown.php?id=".$owner['ID_владельца']."'><button type='button' class='btn btn-lg btn-block btn-outline-primary'>Добавить владельца</button></a>";
foreach ($owners as $owner) {
   
    echo "
        <div class='card mb-4 shadow-sm'>
            <div class='card-header'>
                <h4 class='my-0 font-weight-normal'>" . $owner['Название владельца'] . "</h4>
            </div>
            <div class='card-body'>
                <h1 class='card-title pricing-card-title'>ИНН/КПП: <small class='text-muted'>" . $owner['ИНН/КПП'] . "</small></h1>
                <h2 class='card-title pricing-card-title'>email: <small class='text-muted'>" . $owner['email'] . "</small></h2>
                <h3 class='card-title pricing-card-title'>Номер телефона: <small class='text-muted'>" . $owner['Номер телефона'] . "</small></h3>
                <h3 class='card-title pricing-card-title'>Банковские реквизиты: <small class='text-muted'>" . $owner['Банковские реквизиты владельца'] . "</small></h3>
                <h3 class='card-title pricing-card-title'>Адрес: <small class='text-muted'>" . $owner['Адрес'] . "</small></h3>
                <a href='upown.php?id=".$owner['ID_владельца']."'><button type='button' class='btn btn-lg btn-block btn-outline-primary'>Изменить</button></a>
				<a href='delown.php?id=".$owner['ID_владельца']."'><button type='button' class='btn btn-lg btn-block btn-outline-primary'>Удалить</button></a>
            </div>
        </div>
    ";
}

