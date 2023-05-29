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
<?php require "blocks/header3.php"?>
<?php
require_once('/home/p/p98554f1/p98554f1.beget.tech/public_html/MySQL.php');
session_start();
$proverka = $_SESSION['user_id'];
if ($proverka!=-1){
    echo '<script type="text/javascript"> alert("У вас нет доступа к этой странице");</script>';
    echo '<script>window.location.href = "./admin.php";</script>';
}
//echo json_encode($_SESSION);
$db = new MySQL();
$db->Connect(
    'localhost',
    'p98554f1_conchal',
    'Kursach28!',
    'p98554f1_conchal'
);
$id = $_GET['id']; 
    $sql= "SELECT `персонал`.`ID_работника`, `персонал`.`Фамилия`, `персонал`.`Имя`, `персонал`.`Отчество`, `персонал`.`Должность`, `персонал`.`ID_зала`, `персонал`.`Год рождения`, `персонал`.`Номер телефона`, `персонал`.`Пол` 
    FROM `персонал` WHERE `персонал`.`ID_работника`=$id";
    $workers = $db->Select($sql);
   
    if (!empty($workers)) {
        $worker = $workers[0];
        
        echo "
        <div class='card1 mb-4 shadow-sm'>
            <div class='card-header'>
               
            </div>
            <div class='d-flex flex-warp'>
                <div class='card-body'>
                    <form action='persupdate.php?id=".$worker['ID_работника']."' method='post'>
                        <input type='hidden' name='worker_id' value='" . $worker['ID_работника'] . "'>
                        <label for='position'>Фамилия:</label>
                        <input type='text' name='fam' id='fam' value='" . $worker['Фамилия'] . "'>
                        <br>
                        <label for='position'>Имя:</label>
                        <input type='text' name='name' id='name' value='" . $worker['Имя'] . "'>
                        <br>
                        <label for='position'>Отчество:</label>
                        <input type='text' name='otch' id='otch' value='" . $worker['Отчество'] . "'>
                        <br>
                        <label for='position'>Должность:</label>
                        <input type='text' name='position' id='position' value='" . $worker['Должность'] . "'>
                        <br>
                        <label for='position'>ID зала:</label>
                        <input type='text' name='hallid' id='hallid' value='" . $worker['ID_зала'] . "'>
                        <br>
                        <label for='birthdate'>Дата рождения:</label>
                        <input type='text' name='birthdate' id='birthdate' value='" . $worker['Год рождения'] . "'>
                        <br>
                        <label for='phone'>Номер телефона:</label>
                        <input type='text' name='phone' id='phone' value='" . $worker['Номер телефона'] . "'>
                        <br>
                        <label for='gender'>Пол:</label>
                        <input type='text' name='gender' id='gender' value='" . $worker['Пол'] . "'>
                        <br>
                        <input type='submit' value='Сохранить изменения'>
                    </form>
                </div>
            </div>
        </div>";
    } else {
        echo "Сотрудник не найден.";
    }
    ?>
