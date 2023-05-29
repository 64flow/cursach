<!DOCTYPE html>
<html lang="ru">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<title>Аренда залов</title>
</head>
<body>
<?php require "blocks/header3.php" ?>

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
//echo json_encode($_GET['id']);
$sql = "SELECT `Назначение`, `Название`, `Состояние`, `ID_оборудования`, `ID_зала`, `Стоимость` FROM `оборудование` WHERE `ID_зала`=$id";

$equip = $db->Select($sql);
//echo json_encode($equip);
?>
<div class="container mt-5">
    <h3 class="mb-5">Изменение оборудования</h3>

    <form method="post" action="updateeq2.php">
        <input type="hidden" name="id" value="<?php echo $equip[0]['ID_оборудования']; ?>">
        <div class="form-group">
            <label for="purpose">Назначение</label>
            <input type="text" class="form-control" id="purpose" name="purpose" value="<?php echo $equip[0]['Назначение']; ?>" required>
        </div>
        <div class="form-group">
            <label for="name">Название</label>
            <input type="text" class="form-control" id="name" name="name" value="<?php echo $equip[0]['Название']; ?>" required>
        </div>
        <div class="form-group">
            <label for="condition">Состояние</label>
            <input type="text" class="form-control" id="condition" name="condition" value="<?php echo $equip[0]['Состояние']; ?>" required>
        </div>
        <div class="form-group">
            <label for="cost">Стоимость</label>
            <input type="text" class="form-control" id="cost" name="cost" value="<?php echo $equip[0]['Стоимость']; ?>" required>
        </div>
        <div class="form-group">
            <label for="hallID">ID зала</label>
            <input type="text" class="form-control" id="hallID" name="hallID" value="<?php echo $equip[0]['ID_зала']; ?>" required>
        </div>
        <button type="submit" class="btn btn-primary">Сохранить</button>
    </form>
</div>

</body>
</html>
