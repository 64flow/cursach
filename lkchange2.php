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
<?php require "blocks/header2.php"?>
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

$id = $_GET['id']; 
$em = $_SESSION['email'];
$sql2 = "SELECT * FROM `арендатор юрлицо` WHERE `email` = '$em'";
$info = $db->Select($sql2);
if ($info != null){
$newНазвание = $_POST['название'];
  $newИННКПП = $_POST['иннкпп'];
  $newРеквизиты = $_POST['реквизиты'];
  $newАдрес = $_POST['адрес'];
  $newEmail = $_POST['email'];
  $newКонтактное_лицо = $_POST['контактное_лицо'];

  // Выполняем обновление записи в базе данных
  $updateSql = "UPDATE `арендатор юрлицо` SET `Название юр лица` = '$newНазвание', `ИНН/КПП` = '$newИННКПП', `Банковские реквизиты` = '$newРеквизиты', `Адрес` = '$newАдрес', `email` = '$newEmail', `Контактное лицо` = '$newКонтактное_лицо' WHERE `email` = '$em'";
  $db->Execute($updateSql);
}
if ($info == null){
  $sql3 = "SELECT * FROM `arendfiz` WHERE `email` = '$em'";
  $info1 = $db->Select($sql3);

  $newFam = $_POST['fam'];
  $newName = $_POST['name'];
  $newOtch = $_POST['otch'];
  $newTel = $_POST['tel'];
  $newEmail = $_POST['email'];

  // Выполняем обновление записи в базе данных
  $updateSql = "UPDATE `arendfiz` SET `fam` = '$newFam', `name` = '$newName', `otch` = '$newOtch', `tel` = '$newTel', `email` = '$newEmail' WHERE `email` = '$em'";
  $db->Execute($updateSql);
}






  // Перенаправляем пользователя на страницу с обновленными данными
  echo '<script>window.location.href = "./lk.php";</script>';
  exit();