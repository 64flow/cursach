<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	
    <title>Информация о зале</title>
    <style>
        #map {
            height: 400px;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
<?php require "blocks/header.php" ?>
<?php
require_once('/home/p/p98554f1/p98554f1.beget.tech/public_html/MySQL.php');
session_start();
$db = new MySQL();
$db->Connect(
    'localhost',
    'p98554f1_conchal',
    'Kursach28!',
    'p98554f1_conchal'
);

$id = $_GET['id'];

$sql1 = "SELECT владелец.`Название владельца`, владелец.`ИНН/КПП`, владелец.email, владелец.`Номер телефона`, владелец.`Банковские реквизиты владельца`, владелец.Адрес, владелец.ID_владельца FROM владелец JOIN залы ON залы.ID_владельца=владелец.ID_владельца WHERE залы.ID_зала = $id";
$owner = $db->Select($sql1);
$sql2="SELECT * FROM `залы` WHERE ID_зала = $id";
$hall=$db->Select($sql2);
$sql="SELECT* FROM `персонал` WHERE ID_зала=$id";
$workers = $db->Select($sql);

echo "<div class='owner-title'>Владелец</div>";
echo "
    <div class='card mb-4 shadow-sm'>
        <div class='card-header'>
            <h4 class='my-0 font-weight-normal'>" . $owner[0]['Название владельца'] . "</h4>
        </div>
        <div class='card-body'>
            <h1 class='card-title pricing-card-title'>ИНН/КПП: <small class='text-muted'>" . $owner[0]['ИНН/КПП'] . "</small></h1>
            <h2 class='card-title pricing-card-title'>email: <small class='text-muted'>" . $owner[0]['email'] . "</small></</h2>
            <h3 class='card-title pricing-card-title'>Номер телефона: <small class='text-muted'>" . $owner[0]['Номер телефона'] . "</small></h3>
            <h3 class='card-title pricing-card-title'>Банковские реквизиты: <small class='text-muted'>" . $owner[0]['Банковские реквизиты владельца'] . "</small></h3>
            <h3 class='card-title pricing-card-title'>Адрес: <small class='text-muted'>" . $owner[0]['Адрес'] . "</small></h3>
        </div>
    </div>
";


?>

<div id="map"></div>

<script src="https://api-maps.yandex.ru/2.1/?apikey=463ede38-34f1-4b30-b609-6ee1d3a8f592&lang=ru_RU"></script>
</script>
<script>
	
    ymaps.ready(init);

    function init() {
        var address = "<?php echo $hall[0]['Адрес']; ?>";
        ymaps.geocode(address, {
            results: 1
        }).then(function (res) {
            var coordinates = res.geoObjects.get(0).geometry.getCoordinates();
            var map = new ymaps.Map("map", {
                center: coordinates,
                zoom: 16
            });
            var placemark = new ymaps.Placemark(coordinates, {}, {
                preset: 'islands#redDotIcon'
            });
            map.geoObjects.add(placemark);
        });
    }
</script>
<?php
echo "<div class='workers-title'>Персонал</div>";

for ($i = 0; $i < count($workers); $i++) {
    echo "
        <div class='card mb-4 shadow-sm'>
            <div class='card-header'>
                <h4 class='my-0 font-weight-normal'>" . $workers[$i]['Фамилия'] . ' ' . $workers[$i]['Имя'] . ' ' . $workers[$i]['Отчество'] . "</h4>
            </div>
            <div class='card-body'>
                <h1 class='card-title pricing-card-title'>Должность: <small class='text-muted'>" . $workers[$i]['Должность'] . "</small></h1>
                <h2 class='card-title pricing-card-title'>Дата рождения: <small class='text-muted'>" . $workers[$i]['Год рождения'] . "</small></</h2>
                <h3 class='card-title pricing-card-title'>Номер телефона: <small class='text-muted'>" . $workers[$i]['Номер телефона'] . "</small></h3>
                <h3 class='card-title pricing-card-title'>Пол: <small class='text-muted'>" . $workers[$i]['Пол'] . "</small></h3>
            </div>
        </div>
    ";
}

require "blocks/footer.php" ?>
</body>
</html>
