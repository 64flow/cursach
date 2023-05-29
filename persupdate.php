<!DOCTYPE html>
<html lang="ru">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-
scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<link rel="stylesheet" href="css/style.css">
</head>

<?php 
require_once('/home/p/p98554f1/p98554f1.beget.tech/public_html/MySQL.php');
session_start();
$worker_id=$_POST['worker_id'];
$fam=$_POST['fam'];
$name = $_POST['name'];
$otch = $_POST['otch'];
$position = $_POST['position'];
$hallid = $_POST['hallid'];
$birthdate = $_POST['birthdate'];
$phone = $_POST['phone'];
$gender = $_POST['gender'];
$db = new MySQL();

$db->Connect(
    'localhost',
    'p98554f1_conchal',
    'Kursach28!',
    'p98554f1_conchal'
);
$id = $_GET['id']; 
$db->Execute("UPDATE `персонал` SET `ID_Работника`='$worker_id',
`Фамилия`='$fam',
`Имя`='$name',
`Отчество`='$otch',
`Должность`='$position',
`ID_зала`='$hallid',
`Год рождения`='$birthdate',
`Номер телефона`='$phone',
`Пол`='$gender'
where `ID_Работника`=$id");
echo '<script type="text/javascript"> alert("Данные работника успешно обновлены");</script>';
echo '<script>window.location.href = "./personal.php";</script>';
?>