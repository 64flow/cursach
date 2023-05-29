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
<?php require "blocks/header3.php" ?>




<div class="container mt-5">
	<h3 class="mb-5'">Персонал</h3>

 
<?php

require_once('/home/p/p98554f1/p98554f1.beget.tech/public_html/MySQL.php');
session_start();
$proverka = $_SESSION['user_id'];
if ($proverka!=-1){
    echo '<script type="text/javascript"> alert("У вас нет доступа к этой странице");</script>';
    echo '<script>window.location.href = "./admin.php";</script>';
}
$db = new MySQL();
$db->Connect(
    'localhost',
    'p98554f1_conchal',
    'Kursach28!',
    'p98554f1_conchal'
);
$id = $_GET['id'];
echo"<a href='perscteate.php'><button type='button' class='btn btn-lg btn-block btn-outline-primary'>Добавить сотрудника</button></a>";
$sql = "SELECT `персонал`.`ID_зала`,  `персонал`.`Пол`, `персонал`.`Должность`, `персонал`.`Фамилия`, `персонал`.`Имя`, `персонал`.`Отчество`, `персонал`.`Год рождения`, `персонал`.`Номер телефона`, `персонал`.`ID_работника`
 FROM  `персонал`";
$workers = $db->Select($sql);?>

    <?php
for ($i = 0; $i < count($workers); $i++)
{
	echo "
		<div class='card1 mb-4 shadow-sm'>
       
			<div class='card-header'>
           
				<h4 class='my-0 font-weight-normal'>".$workers[$i]['Фамилия'].' '.$workers[$i]['Имя'].' '.$workers[$i]['Отчество']. "</h4>
			</div><div class='d-flex flex-warp'>
			<div class='card-body'>
            
				<h5 class='card-title pricing-card-title'>Должность: <small class='text-muted'>".$workers[$i]['Должность']."</small></h1>
				<h5 class='card-title pricing-card-title'>Дата рождения: <small class='text-muted'>".$workers[$i]['Год рождения']."</small></</h2>
				<h5 class='card-title pricing-card-title'>Номер телефона: <small class='text-muted'>".$workers[$i]['Номер телефона']."</small></h3>
                <h5 class='card-title pricing-card-title'>Пол: <small class='text-muted'>".$workers[$i]['Пол']."</small></h3>
                <h5 class='card-title pricing-card-title'>ID работника: <small class='text-muted'>".$workers[$i]['ID_работника']."</small></h3>
                <h5 class='card-title pricing-card-title'>Зал: <small class='text-muted'>".$workers[$i]['ID_зала']."</small></h1>
                <a href='persupdate2.php?id=".$workers[$i]['ID_работника']."'><button type='button' class='btn btn-lg btn-block btn-outline-primary'>Изменить</button></a>
                <a href='delete.php?id=".$workers[$i]['ID_работника']."'><button type='button' class='btn btn-lg btn-block btn-outline-primary'>Удалить</button></a>
            </div>	
            
		</div>
       
	";
}
