<!DOCTYPE html>
<html lang="ru">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-
scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<link rel="stylesheet" href="css/style.css">
</head>
<?php 
require_once('/home/p/p98554f1/p98554f1.beget.tech/public_html/MySQL.php');
session_start();

$datedog = $_POST['datedog'];
$datear = $_POST['datear'];
$days = $_POST['days'];

$db = new MySQL();

$db->Connect(
    'localhost',
    'p98554f1_conchal',
    'Kursach28!',
    'p98554f1_conchal'
);

$datearr = new DateTime($datedog);
$curdate = new DateTime($datear);
$today = new DateTime(); // Создаем объект DateTime для текущей даты
if($_SESSION['cart1']==null){
    echo '<script type="text/javascript"> alert("Выберете зал");</script>';
    echo '<script>window.location.href = "./user.php";</script>';
    exit;
}
if ($today > $datearr) {
    echo '<script type="text/javascript"> alert("Дата подписания договора не может быть раньше сегодняшней даты");</script>';
    echo '<script>window.location.href = "./order.php";</script>';
    exit;
}
if ($datearr > $curdate) {
    echo '<script type="text/javascript"> alert("Дата подписания договора не может быть позже даты начала аренды");</script>';
    echo '<script>window.location.href = "./order.php";</script>';
    exit;
}

$hall = $_SESSION['cart1']['hall']['ID_зала'];

$sql2 = "SELECT `iddog`, `idhall`, `idarend`, `datedog`, `datear`, `srok` FROM `arenddog` WHERE `idhall` = $hall";
$dog = $db->Select($sql2);

$daysToAdd = $days;
$curdate->add(new DateInterval("P{$daysToAdd}D"));
$endDate = $curdate->format('Y-m-d');

$isHallOccupied = false;

foreach ($dog as $row) {
    $rowDateAr = new DateTime($row['datear']);
    $rowSrok = new DateInterval("P{$row['srok']}D");
    $rowEndDate = $rowDateAr->add($rowSrok);
    
    if (($rowDateAr <= $curdate && $rowEndDate >= $curdate) || ($rowDateAr <= $endDate && $rowEndDate >= $endDate)) {
        $isHallOccupied = true;
        break;
    }
}

if ($isHallOccupied) {
    echo '<script type="text/javascript"> alert("Выбранный зал занят в указанном интервале");</script>';
    echo '<script>window.location.href = "./order.php";</script>';
    exit;
}

$id = $_GET['id']; 

$user = $_SESSION['user_id'];
$em = $_SESSION['email'];

$db->Execute("INSERT INTO `arenddog`(`iddog`, `idhall`, `idarend`,`email`, `datedog`, `datear`, `srok`) 
VALUES (null, $hall, '$user', '$em','$datedog', '$datear', '$days')");

echo '<script type="text/javascript"> alert("Договор на аренду заключён");</script>';
echo "<a href='dogovdemo.php?id=".$eq[$i]['ID_оборудования']."'>";
echo '<script>window.location.href = "./dogovdemo.php";</script>';

