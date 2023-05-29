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
	<h3 class="mb-5'">Оборудование</h3>
	
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
echo"<a href='createeq.php'><button type='button' class='btn btn-lg btn-block btn-outline-primary'>Добавить оборудование</button></a>";
//$sql = "SELECT * FROM залы, владелец";

$sql = "SELECT `Назначение`, `Название`, `Состояние`, `ID_оборудования`, `ID_зала`, `Стоимость` FROM `оборудование`";
$equip = $db->Select($sql);

for ($i = 0; $i < count($equip); $i++){

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
                <h2 class='card-title pricing-card-title'>ID оборудования: <small class='text-muted'>".$equip[$i]['ID_оборудования']."</small></</h2>

				<h3 class='card-title pricing-card-title'>ID зала: <small class='text-muted'>".$equip[$i]['ID_зала']."</small></h3>
				
				<a href='updateeq.php?id=".$equip[$i]['ID_зала']."'><button type='button' class='btn btn-lg btn-block btn-outline-primary'>Изменить</button></a>
				<a href='deleteeq.php?id=".$equip[$i]['ID_оборудования']."'><button type='button' class='btn btn-lg btn-block btn-outline-primary'>Удалить</button></a>
				
			</div>
		</div>
	";
}
}




?>

<?php require "blocks/footer.php" ?>
</body>
</html>