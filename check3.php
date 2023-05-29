<?php header('Location: ./personal.php');?>
<!DOCTYPE html>
<html lang="ru">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-
scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<link rel="stylesheet" href="css/style.css">
<?php 
require_once('/home/p/p98554f1/p98554f1.beget.tech/public_html/MySQL.php');
$id = filter_var(trim($_POST['id']),
FILTER_SANITIZE_STRING);
$fam = filter_var(trim($_POST['fam']),
FILTER_SANITIZE_STRING);
$name = filter_var(trim($_POST['name']),
FILTER_SANITIZE_STRING);
$otch = filter_var(trim($_POST['otch']),
FILTER_SANITIZE_STRING) ;
$dol = intval(filter_var(trim($_POST['dol']),
FILTER_SANITIZE_STRING));
$idhall = filter_var(trim($_POST['idhall']),
FILTER_SANITIZE_STRING) ;
$year = filter_var(trim($_POST['year']),
FILTER_SANITIZE_STRING) ;
$tel = filter_var(trim($_POST['tel']),
FILTER_SANITIZE_STRING) ;
$pol = filter_var(trim($_POST['pol']),
FILTER_SANITIZE_STRING) ;

 if(mb_strlen($tel) < 8 || mb_strlen($tel) > 15 ) {
  echo "Недоспутимая длина номера телефона";
  exit();
 }



echo json_encode($_POST);

$db = new MySQL();

$db->Connect(
    'localhost',
    'p98554f1_conchal',
    'Kursach28!',
    'p98554f1_conchal'
);
//INSERT INTO `персонал`(`ID_Работника`, `Фамилия`, `Имя`, `Отчество`, `Должность`, `ID_зала`, `Год рождения`, `Номер телефона`, `Пол`)
// VALUES (null,'lox','lox','lox','lox',3,2002-11-05,8888888,'ve;cjq')
$db->Execute("UPDATE `персонал` SET `ID_Работника`='$id',`Фамилия`='$fam',`Имя`='$name',`Отчество`='$otch',`Должность`='$dol',`ID_зала`='$idhall',`Год рождения`='$year',`Номер телефона`='$tel',`Пол`='$pol'WHERE ");


echo "<script>window.location.reload();</script>";