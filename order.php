<!DOCTYPE html>
<html lang="ru">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-
scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" href=" https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<?php require "blocks/header2.php";
 require_once('/home/p/p98554f1/p98554f1.beget.tech/public_html/MySQL.php');
 session_start();
 $id=$_GET['id'];
?>;
<div class="container mt-4">
<h1>Договор на аренду</h1>
<form action="ordercheck.php" method="post">
<label for='position'>Дата подписания договора:</label>
<input type="date" class="form-control" name="datedog"
id="datedog" placeholder="Дата заключения договора"><br>
<label for='position'>Дата начала аренды:</label>
<input type="date" class="form-control" name="datear"
id="datear" placeholder="Дата начала аренды"><br>
<label for='position'>Количество дней аренды:</label>
<input type="int" class="form-control" name="days"
id="days" placeholder="Количество дней аренды"><br>
<button class="btn btn-success" type="submit">Заключить</button>