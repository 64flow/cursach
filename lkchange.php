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
   //echo json_encode($id);
   if ($info != null){
    if (!empty($info)) {
        $info = $info[0];
        
        echo "<div class='card mb-4 shadow-sm'>
        <div class='card-header'>
          
        </div>
        <div class='card-body'>
        <form action='lkchange2.php?id=".$info['email']."' method='post'>
        <h1 class='card-title pricing-card-title'><small class='text-muted'>Название: </small><input type='text' name='название' value='".$info['Название юр лица']."' required></h1>
        <h2 class='card-title pricing-card-title'><small class='text-muted'>ИНН/КПП: </small><input type='text' name='иннкпп' value='".$info['ИНН/КПП']."' required></h2>
        <h3 class='card-title pricing-card-title'><small class='text-muted'>Банковсие реквизиты: </small><input type='text' name='реквизиты' value='".$info['Банковские реквизиты']."' required></h3>
        <h3 class='card-title pricing-card-title'><small class='text-muted'>Адрес: </small><input type='text' name='адрес' value='".$info['Адрес']."' required></h3>
        <h3 class='card-title pricing-card-title'><small class='text-muted'>Email: </small><input type='email' name='email' value='".$info['email']."' required></h3>
        <h3 class='card-title pricing-card-title'><small class='text-muted'>Контактное лицо: </small><input type='text' name='контактное_лицо' value='".$info['Контактное лицо']."' required></h3>
        <h3 class='card-title pricing-card-title'><small class='text-muted'>Пароль: </small><input type='password' name='пароль' value='".$info['Пароль']."' required></h3>
        <button type='submit' class='btn btn-primary'>Сохранить изменения</button>
      </form>
        </div>
      </div>";
    } }
    if ($info == null){$sql3 = "SELECT * FROM `arendfiz` WHERE `email` = '$em'";
        $info1 = $db->Select($sql3);
    if (!empty($info1)) {
        $info1 = $info1[0];
    
        echo "<div class='card mb-4 shadow-sm'>
        <div class='card-header'>
        </div>
        <div class='card-body'>
        <form action='lkchange2.php?id=".$info1['email']."' method='post'>
            <h1 class='card-title pricing-card-title'><small class='text-muted'>Фамилия: </small><input type='text' name='fam' value='".$info1['fam']."' required></h1>
            <h2 class='card-title pricing-card-title'><small class='text-muted'>Имя: </small><input type='text' name='name' value='".$info1['name']."' required></h2>
            <h3 class='card-title pricing-card-title'><small class='text-muted'>Отчество: </small><input type='text' name='otch' value='".$info1['otch']."' required></h3>
            <h3 class='card-title pricing-card-title'><small class='text-muted'>Телефон: </small><input type='text' name='tel' value='".$info1['tel']."' required></h3>
            <h3 class='card-title pricing-card-title'><small class='text-muted'>Email: </small><input type='email' name='email' value='".$info1['email']."' required></h3>
            <h3 class='card-title pricing-card-title'><small class='text-muted'>Пароль: </small><input type='password' name='пароль' value='".$info1['Пароль']."' required></h3>
            <button type='submit' class='btn btn-primary'>Сохранить изменения</button>
          </form>
        </div>
      </div>";
    }}
    ?>
    
