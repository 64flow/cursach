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
	<h3 class="mb-5'">Договоры</h3>

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

$sql = "SELECT `iddog`, `idhall`, `idarend`, `datedog`, `datear`, `srok` FROM `arenddog`";
$info1 = $db->Select($sql);

echo "<div class='row'>";
for ($i = 0; $i < count($info1); $i++) {
    if ($i % 3 == 0 && $i != 0) {
        echo "</div><div class='row'>";
    }

    echo "<div class='card mb-4 shadow-sm'>
    <div class='card-header'>
    <a href='dogup.php?id=".$info1[$i]['iddog']."'><button type='button' class='btn btn-lg btn-block btn-outline-primary'>Изменить</button></a>
    </div>
    <div class='card-body'>
        <h1 class='card-title pricing-card-title'><small class='text-muted'>Договор № </small>".$info1[$i]['iddog']." </h1>
        <h2 class='card-title pricing-card-title'><small class='text-muted'>Зал № </small>".$info1[$i]['idhall']." </h2>
        <h3 class='card-title pricing-card-title'><small class='text-muted'>ID арендатора </small>".$info1[$i]['idarend']." </h3>
        <h3 class='card-title pricing-card-title'><small class='text-muted'>Дата подписания договора: </small>". $info1[$i]['datedog']." </h3>
      
        <h3 class='card-title pricing-card-title'><small class='text-muted'>Дата начала аренды: </small>".$info1[$i]['datear']." </h3>
        <h3 class='card-title pricing-card-title'><small class='text-muted'>Количество дней аренды: </small>".$info1[$i]['srok']." </h3>
        
    </div>
</div>";
}
echo "</div>";

