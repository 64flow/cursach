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
<?php require "blocks/header3.php"?>
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
$id = $_GET['id']; 
    $sql= "SELECT * FROM `залы` WHERE `ID_зала`=$id";
    $hall = $db->Select($sql);
   
    if (!empty($hall)) {
        $hall = $hall[0];
        
        echo "
        <div class='card1 mb-4 shadow-sm'>
            <div class='card-header'>
               
            </div>
            <div class='d-flex flex-warp'>
                <div class='card-body'>
                    <form action='updatehall2.php?id=".$hall['ID_зала']."' method='post'>
                        <input type='hidden' name='hall_id' value='" . $hall['ID_зала'] . "'>
                        <label for='position'>ID владельца:</label>
                        <input type='text' name='idvlad' id='idvlad' value='" . $hall['ID_владельца'] . "'>
                        <br>
                        <label for='position'>Адрес:</label>
                        <input type='text' name='adr' id='adr' value='" . $hall['Адрес'] . "'>
                        <br>
                        <label for='position'>Вместимость:</label>
                        <input type='text' name='vmest' id='vmest' value='" . $hall['Вместимость'] . "'>
                        <br>
                        <label for='position'>Количество ВИП-мест:</label>
                        <input type='text' name='vip' id='vip' value='" . $hall['Количество ВИП-мест'] . "'>
                        <br>
                        <label for='position'>	Стоимость аренды:</label>
                        <input type='text' name='cost' id='cost' value='" . $hall['Стоимость аренды'] . "'>
                        <br>
                        <input type='submit' value='Сохранить изменения'>
                    </form>
                </div>
            </div>
        </div>";
    } else {
        echo "Зал не найден.";
    }
    ?>
