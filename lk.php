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




<div class="container mt-5">
	<h3 class="mb-5'">Личный кабинет</h3>
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
$em = $_SESSION['email'];
$sql2 = "SELECT * FROM `арендатор юрлицо` WHERE `email` = '$em'";
$info = $db->Select($sql2);
if ($info != null){
    echo "<div class='card mb-4 shadow-sm'>
      <div class='card-header'>
      <a href='lkchange.php?id=".$info[0]['email']."'><button type='button' class='btn btn-lg btn-block btn-outline-primary'>Изменить</button></a>
      <a href='lkdel.php?id=".$info[0]['email']."'><button type='button' class='btn btn-lg btn-block btn-outline-primary'>Удалить учетную запись</button></a>
      </div>
      <div class='card-body'>
          <h1 class='card-title pricing-card-title'><small class='text-muted'>Название: </small>".$info[0]['Название юр лица']." </h1>
          <h2 class='card-title pricing-card-title'><small class='text-muted'>ИНН/КПП: </small>".$info[0]['ИНН/КПП']." </h2>
          <h3 class='card-title pricing-card-title'><small class='text-muted'>Банковсие реквизиты: </small>".$info[0]['Банковские реквизиты']." </h3>
          
          <h3 class='card-title pricing-card-title'><small class='text-muted'>Адрес: </small>".$info[0]['Адрес']." </h3>
          <h3 class='card-title pricing-card-title'><small class='text-muted'>Email: </small>".$info[0]['email']." </h3>
          
          <h3 class='card-title pricing-card-title'><small class='text-muted'>Контактное лицо: </small>". $info[0]['Контактное лицо']." </h3>
          
          
          
      </div>
  </div>";
}
  if ($info == null)
  {
    $sql3 = "SELECT * FROM `arendfiz` WHERE `email` = '$em'";
    $info1 = $db->Select($sql3);
    echo "<div class='card mb-4 shadow-sm'>
    <div class='card-header'>
    <a href='lkchange.php?id=".$info1[0]['email']."'><button type='button' class='btn btn-lg btn-block btn-outline-primary'>Изменить</button></a>
    <a href='lkdel.php?id=".$info1[0]['email']."'><button type='button' class='btn btn-lg btn-block btn-outline-primary'>Удалить учетную запись</button></a>
    </div>
    <div class='card-body'>
        <h1 class='card-title pricing-card-title'><small class='text-muted'>Фамилия: </small>".$info1[0]['fam']." </h1>
        <h2 class='card-title pricing-card-title'><small class='text-muted'>Имя: </small>".$info1[0]['name']." </h2>
        <h3 class='card-title pricing-card-title'><small class='text-muted'>Отчество: </small>".$info1[0]['otch']." </h3>
        <h3 class='card-title pricing-card-title'><small class='text-muted'>Телефон: </small>". $info1[0]['tel']." </h3>
      
        <h3 class='card-title pricing-card-title'><small class='text-muted'>Email: </small>".$info1[0]['email']." </h3>
        
        
        
        
    </div>
</div>";
  } require "blocks/footer2.php";
/*

    $pdf->Write(5, 'Фамилия: ' . $info1[0]['fam']);
    $pdf->Ln(7);
    $pdf->Write(5, 'Имя: ' . $info1[0]['name']);
    $pdf->Ln(7);
    $pdf->Write(5, 'Отчество: ' . $info1[0]['otch']);
    $pdf->Ln(7);
    $pdf->Write(5, 'Телефон: ' . $info1[0]['tel']);
    $pdf->Ln(7);
    $pdf->Write(5, 'Email: ' . $info1[0]['email']);
    $pdf->Ln(7);
  }
