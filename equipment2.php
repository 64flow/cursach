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
$id=$_GET['id'];
/*
if ($id=''){
	$id = $_SESSION['cart']['hall'];
}
if ($id=''){
	
	echo "Ошибка";
}*/
$sql = "SELECT `Назначение`, `Название`, `Состояние`, `ID_оборудования`, `ID_зала`, `Стоимость` FROM `оборудование` WHERE`ID_зала`=$id";
$equip = $db->Select($sql);

for ($i = 0; $i < count($equip); $i++){
if ($equip[$i]['Состояние']=='исправно'){
{
	echo "
	
		<div class='card mb-4 shadow-sm'>
			<div class='card-header'>
				<h4 class='my-0 font-weight-normal'>".$equip[$i]['Назначение']."</h4>
			</div>
			<div class='card-body'>
				<h1 class='card-title pricing-card-title'>Стоимость дня аренды: <small class='text-muted'>".$equip[$i]['Стоимость']."</small></h1>
				<h2 class='card-title pricing-card-title'>Название: <small class='text-muted'>".$equip[$i]['Название']."</small></</h2>

				<h3 class='card-title pricing-card-title'>Состояние: <small class='text-muted'>".$equip[$i]['Состояние']."</small></h3>
                
				
				<a href='cart.php?id=".$equip[$i]['ID_оборудования']."'><button type='button' class='btn btn-lg btn-block btn-outline-primary'>Арендовать</button></a>


                </div>	
		</div>
	";
}
}
else{
	echo "
	
		<div class='card mb-4 shadow-sm'>
			<div class='card-header'>
				<h4 class='my-0 font-weight-normal'>".$equip[$i]['Назначение']."</h4>
			</div>
			<div class='card-body'>
				<h1 class='card-title pricing-card-title'>Стоимость дня аренды: <small class='text-muted'>".$equip[$i]['Стоимость дня аренды']."</small></h1>
				<h2 class='card-title pricing-card-title'>Название: <small class='text-muted'>".$equip[$i]['Название']."</small></</h2>

				<h3 class='card-title pricing-card-title'>Состояние: <small class='text-muted'>".$equip[$i]['Состояние']."</small></h3>
                
				<h3 class='card-title pricing-card-title'><small class='text-muted'>Извините, в данный момент нельзя арендовать это оборудование, по причине неисправности</small></h3>
					 

                </div>	
		</div>
	";

}
}
require "blocks/footer2.php";