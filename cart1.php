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
	<h3 class="mb-5'">Залы</h3>
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
$ideq = $_GET['ideq'];

// Проверяем, есть ли уже установленная корзина в сессии
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = array(
        'hall' => array(
            'hallId' => $id,
            'devices' => array()
        )
    );
}

$hallId = $_SESSION['cart']['hall']['hallId'];

// Проверяем, есть ли уже выбранный зал в корзине
if (isset($_SESSION['cart']['hall'])) {
    echo '<script type="text/javascript"> alert("Вы уже выбрали зал");</script>';
    echo '<script>window.location.href = "./user.php";</script>';
    exit;
}

// Добавляем выбранный зал в корзину
$_SESSION['cart']['hall'] = array(
    'hallId' => $id,
    'devices' => array()
);

// Проверяем, есть ли уже такое оборудование в корзине для выбранного зала
if (in_array($ideq, array_column($_SESSION['cart']['hall']['devices'], 'ID_оборудования'))) {
    echo '<script type="text/javascript"> alert("Оборудование уже добавлено");</script>';
    echo '<script type="text/javascript"> window.location.href = "./user.php"; </script>';
    exit;
}

// Получаем информацию о добавляемом оборудовании из базы данных
$sql = "SELECT * FROM `оборудование` WHERE `ID_оборудования` = $ideq AND `ID_зала` = $hallId";
$equipment = $db->Select($sql);

// Добавляем информацию об оборудовании в корзину
$_SESSION['cart']['hall']['devices'][] = array(
    'ID_оборудования' => $equipment[0]['ID_оборудования'],
    //'Название' => $equipment[0]['Название'],
    //'Стоимость' => $equipment[0]['Стоимость']
);

echo '<script type="text/javascript"> alert("Оборудование успешно добавлено");</script>';
//echo '<script type="text/javascript"> window.location.href = "./user.php"; </script>';
//echo json_encode($_SESSION['cart']);
echo json_encode($equipment);
echo json_encode($id);
echo json_encode($ideq);
?>
