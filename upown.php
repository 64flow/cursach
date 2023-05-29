<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <title>Изменение владельца</title>
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

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $inn = $_POST['inn'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $bank = $_POST['bank'];
    $address = $_POST['address'];

    // Обновляем данные владельца
    $sql = "UPDATE владелец SET
            `Название владельца` = '$name',
            `ИНН/КПП` = '$inn',
            `email` = '$email',
            `Номер телефона` = '$phone',
            `Банковские реквизиты владельца` = '$bank',
            `Адрес` = '$address'
            WHERE `ID_владельца` = $id";
    $db->Execute($sql);

    // Перенаправление на страницу со списком владельцев после изменения
    echo '<script>window.location.href = "./own.php";</script>';
    exit();
}

// Получаем данные владельца по указанному ID
$sql = "SELECT * FROM владелец WHERE `ID_владельца` = $id";
$result = $db->Select($sql);
$owner = $result[0];
?>

    <div class="row justify-content-center">
        <div class="col-md-6">
            <h2 class="mt-5 mb-3">Изменение владельца</h2>
            <form action="" method="POST">
                <div class="form-group">
                    <label for="name">Название владельца</label>
                    <input type="text" class="form-control" id="name" name="name" value="<?php echo $owner['Название владельца']; ?>" required>
                </div>
                <div class="form-group">
                    <label for="inn">ИНН/КПП</label>
                    <input type="text" class="form-control" id="inn" name="inn" value="<?php echo $owner['ИНН/КПП']; ?>" required>
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email" name="email" value="<?php echo $owner['email']; ?>" required>
                </div>
                <div class="form-group">
                    <label for="phone">Номер телефона</label>
                    <input type="text" class="form-control" id="phone" name="phone" value="<?php echo $owner['Номер телефона']; ?>" required>
                </div>
                <div class="form-group">
                    <label for="bank">Банковские реквизиты</label>
                    <input type="text" class="form-control" id="bank" name="bank" value="<?php echo $owner['Банковские реквизиты владельца']; ?>" required>
                </div>
                <div class="form-group">
                    <label for="address">Адрес</label>
                    <input type="text" class="form-control" id="address" name="address" value="<?php echo $owner['Адрес']; ?>" required>
                </div>
                <button type="submit" class="btn btn-primary">Сохранить</button>
            </form>
        </div>
    </div>

</body>
</html>
