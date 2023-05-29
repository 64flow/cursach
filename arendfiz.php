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
	<h3 class="mb-5'">Арендаторы физлица</h3>

<div class="container mt-5">
	
    <?php
require_once('/home/p/p98554f1/p98554f1.beget.tech/public_html/MySQL.php');
session_start();
$proverka = $_SESSION['user_id'];
if ($proverka!=-1){
    echo '<script type="text/javascript"> alert("У вас нет доступа к этой странице");</script>';
    echo '<script>window.location.href = "./admin.php";</script>';
}
//echo json_encode($_SESSION);
$db = new MySQL();
$db->Connect(
    'localhost',
    'p98554f1_conchal',
    'Kursach28!',
    'p98554f1_conchal'
);

    $sql3 = "SELECT * FROM `arendfiz`";
    $info1 = $db->Select($sql3);

    for ($i = 0; $i < count($info1); $i++){
    echo "<div class='card mb-4 shadow-sm'>
    <div class='card-header'>
    <a href='lkadmupd.php?id=".$info1[$i]['email']."'><button type='button' class='btn btn-lg btn-block btn-outline-primary'>Изменить</button></a>
    <a href='lkdeladm.php?id=".$info1[$i]['email']."'><button type='button' class='btn btn-lg btn-block btn-outline-primary'>Удалить учетную запись</button></a>
    </div>
    <div class='card-body'>
        <h1 class='card-title pricing-card-title'><small class='text-muted'>Фамилия: </small>".$info1[$i]['fam']." </h1>
        <h2 class='card-title pricing-card-title'><small class='text-muted'>Имя: </small>".$info1[$i]['name']." </h2>
        <h3 class='card-title pricing-card-title'><small class='text-muted'>Отчество: </small>".$info1[$i]['otch']." </h3>
        <h3 class='card-title pricing-card-title'><small class='text-muted'>Телефон: </small>". $info1[$i]['tel']." </h3>
      
        <h3 class='card-title pricing-card-title'><small class='text-muted'>Email: </small>".$info1[$i]['email']." </h3>
        
        
        
        
    </div>
</div>";
    }
