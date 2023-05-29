<?php header('Location: ./adminmain.php');?>
<!DOCTYPE html>
<html lang="ru">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-
scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<link rel="stylesheet" href="css/style.css">
<?php 
require_once('/home/p/p98554f1/p98554f1.beget.tech/public_html/MySQL.php');

$idvlad = filter_var(trim($_POST['idvlad']),
FILTER_SANITIZE_STRING);
$adr = filter_var(trim($_POST['adr']),
FILTER_SANITIZE_STRING);
$vmest = filter_var(trim($_POST['vmest']),
FILTER_SANITIZE_STRING) ;
$vip =filter_var(trim($_POST['vip']),
FILTER_SANITIZE_STRING);
$cost = filter_var(trim($_POST['cost']),
FILTER_SANITIZE_STRING) ;

$db = new MySQL();

$db->Connect(
    'localhost',
    'p98554f1_conchal',
    'Kursach28!',
    'p98554f1_conchal'
);
//INSERT INTO `персонал`(`ID_Работника`, `Фамилия`, `Имя`, `Отчество`, `Должность`, `ID_зала`, `Год рождения`, `Номер телефона`, `Пол`)
// VALUES (null,'lox','lox','lox','lox',3,2002-11-05,8888888,'ve;cjq')
$db->Execute("INSERT INTO `залы`(`ID_зала`, `ID_владельца`, `Адрес`, `Вместимость`, `Количество ВИП-мест`, `Стоимость аренды`) 
VALUES (null,
'$idvlad',
'$adr',
'$vmest',
'$vip',
'$cost')");


echo "<script>window.location.reload();</script>";