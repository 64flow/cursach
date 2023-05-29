
<!DOCTYPE html>
<html lang="ru">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<link rel="stylesheet" href="css/style.css">
<?php
require_once('/home/p/p98554f1/p98554f1.beget.tech/public_html/MySQL.php');

$name = filter_var(trim($_POST['name']), FILTER_SANITIZE_STRING);
$inn = filter_var(trim($_POST['inn']), FILTER_SANITIZE_STRING);
$bank = filter_var(trim($_POST['bank']), FILTER_SANITIZE_STRING);
$adr = filter_var(trim($_POST['adr']), FILTER_SANITIZE_STRING);
$email = filter_var(trim($_POST['email']), FILTER_SANITIZE_STRING);
$contlic = filter_var(trim($_POST['contlic']), FILTER_SANITIZE_STRING);
$pass = filter_var(trim($_POST['pass']), FILTER_SANITIZE_STRING);

if (mb_strlen($pass) < 2 || mb_strlen($pass) > 6) {
    echo '<script type="text/javascript">alert("Недопустимая длина пароля (от 2 до 6 символов)");</script>';
    echo '<script type="text/javascript">window.location.href = "./reloc6.php";</script>';
    exit();
}

$db = new MySQL(); // Создаем экземпляр класса MySQL

$db->Connect(
    'localhost',
    'p98554f1_conchal',
    'Kursach28!',
    'p98554f1_conchal'
);

$sql3 = "SELECT * FROM `arendfiz` WHERE `email` = '$email'";
$info1 = $db->Select($sql3);
$sql2 = "SELECT * FROM `арендатор юрлицо` WHERE `email` = '$email'";
$info = $db->Select($sql2);

if ($info == null && $info1 == null) {
    $db->Execute("INSERT INTO `арендатор юрлицо`(`Название юр лица`, `ИНН/КПП`, `Банковские реквизиты`, `Адрес`, `email`, `Контактное лицо`, `Пароль`) 
VALUES ('$name','$inn','$bank','$adr','$email','$contlic','$pass')");

    echo '<script type="text/javascript">window.location.href = "./reloc5.php";</script>';
} else {
    echo '<script type="text/javascript">alert("Пользователь с такой почтой уже существует");</script>';
    echo '<script type="text/javascript">window.location.href = "./reloc6.php";</script>';
}
?>
