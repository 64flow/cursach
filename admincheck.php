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
</html>
<?php
  
define('email', 'admin@admin'); // определяем имя для входа админа
define('Pass', 'neugadat'); // пароль администратора в хэш виде

  require_once('/home/p/p98554f1/p98554f1.beget.tech/public_html/MySQL.php');
  session_start();
  $db = new MySQL();
  $db->Connect(
      'localhost',
      'p98554f1_conchal',
      'Kursach28!',
      'p98554f1_conchal'
  );
  $id=$_GET['user_id'];
  $email=$_POST[auth_email];
  $pass=$_POST[auth_pass];
  if ($email == email) // если введенное пользователем мыло - это имя администратора (admin@admin)
  {
      if ($pass == Pass) // если пароли совпадают
      {
          $_SESSION['user_id'] = -1; 
          //echo json_encode($_SESSION);
         echo '<script>window.location.href = "./adminmenu.php?id=' . $_SESSION['user_id'] . '";</script>';
      }
      else{
        echo '<script type="text/javascript"> alert("Неверный пароль. Пожалуйста, попробуйте снова.");</script>';
        echo '<script>window.location.href = "./admin.php";</script>';
      }
    }
  else {
    echo '<script type="text/javascript"> alert("Неверный email. Пожалуйста, попробуйте снова.");</script>';
        echo '<script>window.location.href = "./admin.php";</script>';
      }
  
  ?>