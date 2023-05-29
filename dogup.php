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
// Получить ID договора из параметра запроса
$iddog = $_GET['id'];

// Получить информацию о договоре из базы данных
$sql = "SELECT `iddog`, `idhall`, `idarend`, `datedog`, `datear`, `srok` FROM `arenddog` WHERE `iddog`='$iddog'";
$info = $db->Select($sql);

?>

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

<?php require "blocks/header3.php" ?>

<body>
<div class="row justify-content-center">
        <div class="col-md-6">
    <h1>Редактирование договора</h1>
    <form method="POST" action="dogup2.php">
        <input type="hidden" name="iddog" value="<?php echo $info[0]['iddog']; ?>">
        <div class="form-group">
            <label for="idhall">Зал №</label>
            <input type="text" class="form-control" id="idhall" name="idhall" value="<?php echo $info[0]['idhall']; ?>">
        </div>
        <div class="form-group">
            <label for="idarend">ID арендатора</label>
            <input type="text" class="form-control" id="idarend" name="idarend" value="<?php echo $info[0]['idarend']; ?>">
        </div>
        <div class="form-group">
            <label for="datedog">Дата подписания договора</label>
            <input type="text" class="form-control" id="datedog" name="datedog" value="<?php echo $info[0]['datedog']; ?>">
        </div>
        <div class="form-group">
            <label for="datear">Дата начала аренды</label>
            <input type="text" class="form-control" id="datear" name="datear" value="<?php echo $info[0]['datear']; ?>">
        </div>
        <div class="form-group">
            <label for="srok">Количество дней аренды</label>
            <input type="text" class="form-control" id="srok" name="srok" value="<?php echo $info[0]['srok']; ?>">
        </div>
        <button type="submit" class="btn btn-primary">Сохранить изменения</button>
    </form>
</div> 
</div>
</body>
</html>
