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
<?php require "blocks/header3.php";
session_start();
$proverka = $_SESSION['user_id'];
if ($proverka!=-1){
    echo '<script type="text/javascript"> alert("У вас нет доступа к этой странице");</script>';
    echo '<script>window.location.href = "./admin.php";</script>';
}?>
<div class="container mt-5">
    
    <div class="container mt-4" style="width: 500px; items-aligne: center">
    <h1 style="text-align: center">Добавление зала</h1>
    <form action="createhall2.php" method="post">
    <input type="int" class="form-control" name="idvlad"
    id="idvlad" placeholder="ID владельца"><br>  
    <input type="text" class="form-control" name="adr"
    id="adr" placeholder="Адрес"><br>
    <input type="int" class="form-control" name="vmest"
    id="vmest" placeholder="Вместимость"><br>
    <input type="int" class="form-control" name="vip"
    id="vip" placeholder="Количество ВИП-мест"><br>
    
    <input type="text" class="form-control" name="cost"
    id="cost" placeholder="Стоимость аренды"><br>
    <button class="btn btn-success" type="submit">Добавить</button>
    </form>
    </div>
</div>