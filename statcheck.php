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

$start=$_POST['start'];
$end=$_POST['end'];

$_SESSION['start'] = $start;
$_SESSION['end'] = $end;

$start= new DateTime($start);
$end = new DateTime($end);
echo json_encode($_SESSION);
if ($end < $start) {
    echo '<script type="text/javascript"> alert("Дата начала периода не может быть позже даты конца");</script>';
    echo '<script>window.location.href = "./stat.php";</script>';
    exit;
}
echo '<script>window.location.href = "./statdog.php";</script>';