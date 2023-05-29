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
<?php require "blocks/header3.php";
require_once('/home/p/p98554f1/p98554f1.beget.tech/public_html/MySQL.php');
$db = new MySQL();

$db->Connect(
    'localhost',
    'p98554f1_conchal',
    'Kursach28!',
    'p98554f1_conchal'
);
$id = $_GET['id'];
$sql = "SELECT `персонал`.`ID_зала`,  `персонал`.`Пол`, `персонал`.`Должность`, `персонал`.`Фамилия`, `персонал`.`Имя`, `персонал`.`Отчество`, `персонал`.`Год рождения`, `персонал`.`Номер телефона`, `персонал`.`ID_работника`
 FROM  `персонал`WHERE `персонал`.`ID_Работника` = $id";
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
                <a href='update.php'><button type='button' class='btn btn-lg btn-block btn-outline-primary'>Изменить</button></a>
                <a href='delete.php'><button type='button' class='btn btn-lg btn-block btn-outline-primary'>Удалить</button></a>
            </div>	
            
		</div>
       
	";
}
?>
<div class="container mt-5">
    </div>
    <div class="container mt-4">
    <h1>Изменить данные сотрудника</h1>
    <form action="check3.php" method="post">
    <input type="int" class="form-control" name="id"
    id="id" placeholder="ID Работника"><br>
    <input type="text" class="form-control" name="fam"
    id="fam" placeholder="Фамилия"><br>
    <input type="text" class="form-control" name="name"
    id="name" placeholder="Имя"><br>
    <input type="text" class="form-control" name="otch"
    id="otch" placeholder="Отчество"><br>
    
    <input type="case" class="form-control" name="dol"
    id="dol" placeholder="Должность"><br>
    <input type="int" class="form-control" name="idhall"
    id="idhall" placeholder="ID зала"><br>
    <input type="date" class="form-control" name="year"
    id="year" placeholder="Год рождения"><br>
    <input type="text" class="form-control" name="tel"
    id="tel" placeholder="Номер телефона"><br>
    
    <input type="text" class="form-control" name="pol"
    id="pol" placeholder="Пол"><br>
    <button class="btn btn-success" type="submit">Добавить</button>
    </form>
    </div>