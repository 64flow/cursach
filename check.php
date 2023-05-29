
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

$fam = filter_var(trim($_POST['fam']),
FILTER_SANITIZE_STRING);
$name = filter_var(trim($_POST['name']),
FILTER_SANITIZE_STRING);
$otch = filter_var(trim($_POST['otch']),
FILTER_SANITIZE_STRING) ;
$pasp = intval(filter_var(trim($_POST['pasp']),
FILTER_SANITIZE_STRING));
$tel = filter_var(trim($_POST['tel']),
FILTER_SANITIZE_STRING) ;
$email = filter_var(trim($_POST['email']),
FILTER_SANITIZE_STRING) ;
$pass = filter_var(trim($_POST['pass']),
FILTER_SANITIZE_STRING) ;

if(mb_strlen($pasp)!=10) {
  echo '<script type="text/javascript"> alert("Недопустимая длина паспортных данных");</script>';
  echo '<script type="text/javascript">window.location.href = "./reloc4.php" </script>';
  exit();
} else if(mb_strlen($tel) < 8 || mb_strlen($tel) > 15 ) {
  echo '<script type="text/javascript"> alert("Недопустимая длина номера телефона");</script>';
  echo '<script type="text/javascript">window.location.href = "./reloc4.php" </script>';
  exit();
} else if(mb_strlen($pass) < 2 || mb_strlen($pass) > 6) {
  echo '<script type="text/javascript"> alert("Недопустимая длина пароля(от 2 до 6 символов)");</script>';
  echo '<script type="text/javascript">window.location.href = "./reloc4.php" </script>';
  exit();
}


// echo json_encode($name, JSON_UNESCAPED_UNICODE);
// echo json_encode($fam, JSON_UNESCAPED_UNICODE);
// echo json_encode($otch, JSON_UNESCAPED_UNICODE);
// echo json_encode($pasp, JSON_UNESCAPED_UNICODE);
// echo json_encode($tel, JSON_UNESCAPED_UNICODE);
// echo json_encode($email, JSON_UNESCAPED_UNICODE);
// echo json_encode($pass, JSON_UNESCAPED_UNICODE);
// echo json_encode($name, JSON_UNESCAPED_UNICODE);

//echo json_encode($_POST);

$db = new MySQL();

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
  $db->Execute("INSERT INTO `arendfiz` (`fam`, `name`, `otch`, `pass`, `tel`, `email`, `Пароль`) VALUES ('$fam', '$name', '$otch', $pasp, '$tel', '$email', '$pass')");
  echo '<script type="text/javascript">window.location.href = "./reloc5.php" </script>';
} else {
  echo '<script type="text/javascript"> alert("Пользователь с такой почтой уже существует");</script>';
  echo '<script type="text/javascript">window.location.href = "./reloc4.php" </script>';
}


?>