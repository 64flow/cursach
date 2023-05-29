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
<?php require "blocks/header.php" ?>


<?php
require_once('/home/p/p98554f1/p98554f1.beget.tech/public_html/MySQL.php');

$db = new MySQL();
$db->Connect(
    'localhost',
    'p98554f1_conchal',
    'Kursach28!',
    'p98554f1_conchal'
);

$id = $_GET['id'];
$sql="SELECT `оборудование`.`Назначение`, `оборудование`.`Название`, `оборудование`.`Состояние`, `оборудование`.`ID_оборудования`, `оборудование`.`ID_зала`,
`оборудование`.`Стоимость`,`залы`.`ID_зала` 
FROM `оборудование`, `залы`
 WHERE`залы`.`ID_зала`=`оборудование`.`ID_зала`and `залы`.`ID_зала`=$id";;
$equip = $db->Select($sql);
//echo json_encode($equip);
for ($i = 0; $i < count($equip); $i++)
{
	echo "
		<div class='card mb-4 shadow-sm'>
			<div class='card-header'>
				<h4 class='my-0 font-weight-normal'>".$equip[$i]['Назначение']."</h4>
			</div>
			<div class='card-body'>
				<h1 class='card-title pricing-card-title'>Стоимость дня аренды: <small class='text-muted'>".$equip[$i]['Стоимость дня аренды']."</small></h1>
				<h2 class='card-title pricing-card-title'>Название: <small class='text-muted'>".$equip[$i]['Название']."</small></</h2>
				<h3 class='card-title pricing-card-title'>Состояние: <small class='text-muted'>".$equip[$i]['Состояние']."</small></h3>
                
                </div>	
		</div>
	";
}
require "blocks/footer.php";