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
	<h3 class="mb-5'">Залы</h3>
	
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
echo"<a href='createhall.php'><button type='button' class='btn btn-lg btn-block btn-outline-primary'>Добавить зал</button></a>";
//$sql = "SELECT * FROM залы, владелец";
$sql = "SELECT залы.Адрес, залы.`Стоимость аренды`, залы.Вместимость, залы.`Количество ВИП-мест`, залы.ID_зала, владелец.`Название владельца`  FROM залы JOIN владелец ON владелец.ID_владельца = залы.ID_владельца";
$halls = $db->Select($sql);

for ($i = 0; $i < count($halls); $i++)
{
	echo "
		<div class='card mb-4 shadow-sm'>
			<div class='card-header'>
				<h4 class='my-0 font-weight-normal'>".$halls[$i]['Адрес']."</h4>
			</div>
			<div class='card-body'>
				<h1 class='card-title pricing-card-title'>".$halls[$i]['Стоимость аренды']." <small class='text-muted'>р/ день</small></h1>
				<h2 class='card-title pricing-card-title'>".$halls[$i]['Вместимость']." <small class='text-muted'>Вместимость</small></h2>
				<h3 class='card-title pricing-card-title'>".$halls[$i]['Количество ВИП-мест']." <small class='text-muted'>Количество ВИП-мест</small></h3>
				<h3 class='card-title pricing-card-title'>".$halls[$i]['ID_зала']." <small class='text-muted'>ID</small></h3>
				<h3 class='card-title pricing-card-title'>".$halls[$i]['Название владельца']." <small class='text-muted'>Владелец</small></h3>
				<a href='updatehall.php?id=".$halls[$i]['ID_зала']."'><button type='button' class='btn btn-lg btn-block btn-outline-primary'>Изменить</button></a>
				<a href='deletehall.php?id=".$halls[$i]['ID_зала']."'><button type='button' class='btn btn-lg btn-block btn-outline-primary'>Удалить</button></a>
				
			</div>
		</div>
	";
}




?>

<?php require "blocks/footer.php" ?>
</body>
</html>