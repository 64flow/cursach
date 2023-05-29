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

$db = new MySQL();
$db->Connect(
    'localhost',
    'p98554f1_conchal',
    'Kursach28!',
    'p98554f1_conchal'
);

$em = $_GET['id'];




// Удаление информации о физическом лице
$sqlDeleteFiz = "DELETE FROM `арендатор юрлицо` WHERE `email` = '$em'";
$db->Execute($sqlDeleteFiz);

echo '<script type="text/javascript"> alert("Учётная запись удалена");</script>';
echo '<script>window.location.href = "./arendur.php";</script>';