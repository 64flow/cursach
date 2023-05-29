
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


<?php
require_once('/home/p/p98554f1/p98554f1.beget.tech/public_html/MySQL.php');
session_start();
//echo json_encode($_SESSION);
$db = new MySQL();
$db->Connect(
    'localhost',
    'p98554f1_conchal',
    'Kursach28!',
    'p98554f1_conchal'
);
$id=$_GET['id'];
/*
if ($id=''){
	$id = $_SESSION['cart']['hall'];
}
if ($id=''){
	
	echo "Ошибка";
}*/
$sql="SELECT оборудование.Название, оборудование.Назначение, оборудование.Состояние, оборудование.`Стоимость дня аренды`, оборудование.ID_оборудования  FROM оборудование JOIN залы ON залы.ID_зала=оборудование.ID_зала WHERE залы.ID_зала=$id";
$equip = $db->Select($sql);

$sql = "SELECT `ID_зала` FROM `залы` WHERE `ID_зала` = $id";
$result = $db->Select($sql);

if (empty($result)) {
	$id = $_SESSION['cart1']['hall'];
    echo '<script type="text/javascript"> alert("Зал не найден");</script>';
    echo '<script>window.location.href = "./user.php";</script>';
    
	
	exit;
}

$hall = $result[0];

// Проверяем, есть ли уже арендованный зал в корзине
if (isset($_SESSION['cart1']['hall'])) {
    echo '<script type="text/javascript"> alert("Вы уже арендовали зал");</script>';
    echo '<script>window.location.href = "./reloc2.php";</script>';
    exit;
}

// Добавляем зал в корзину
$_SESSION['cart1']['hall'] = $hall;

echo '<script type="text/javascript"> alert("Зал успешно добавлен в корзину");</script>';
    
echo '<script>window.location.href = "./reloc2.php";</script>';