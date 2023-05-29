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
<?php require "blocks/header3.php";
 require_once('/home/p/p98554f1/p98554f1.beget.tech/public_html/MySQL.php');
 session_start();
 $proverka = $_SESSION['user_id'];
if ($proverka!=-1){
    echo '<script type="text/javascript"> alert("У вас нет доступа к этой странице");</script>';
    echo '<script>window.location.href = "./admin.php";</script>';
}
 $id=$_GET['id'];
?>
<div class="container mt-4">
<h1>Статистика по аренде</h1>
<form action="statcheck.php" method="post">
<label for='position'>Дата начала периода:</label>
<input type="date" class="form-control" name="start"
id="start" placeholder="Дата заключения договора"><br>
<label for='position'>Дата конца периода:</label>
<input type="date" class="form-control" name="end"
id="end" placeholder="Дата начала аренды"><br>
<button class="btn btn-success" type="submit">Смотреть</button>