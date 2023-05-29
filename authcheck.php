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



  require_once('/home/p/p98554f1/p98554f1.beget.tech/public_html/MySQL.php');
  session_start();
  $db = new MySQL();
  $db->Connect(
      'localhost',
      'p98554f1_conchal',
      'Kursach28!',
      'p98554f1_conchal'
  );

  
  $sql = "SELECT Пароль, email, ID_Арендатора  FROM `арендатор юрлицо` WHERE email= '".$_POST['auth_email']."'";
  $auth_info = $db->Select($sql);

  if ($auth_info == null)
  {
      $sql = "SELECT  email, Пароль, ID_Арендатора FROM `arendfiz` WHERE email= '".$_POST['auth_email']."'"; 
      $auth_info = $db->Select($sql);
  }

  if ($auth_info[0]['Пароль'] != $_POST['auth_pass']) {
    echo '<script type="text/javascript"> alert("Неверный email либо пароль. Пожалуйста, попробуйте снова.");</script>';
    echo '<script type="text/javascript">window.location.href = "./autorization.php" </script>';
 }

  if ($auth_info[0]['Пароль'] == $_POST['auth_pass'])
  {
    $_SESSION['user_id'] = $auth_info[0]['ID_Арендатора'];
    $_SESSION['email'] = $auth_info[0]['email'];

    if ($_SESSION['user_id'] != '') {
        echo '<script>window.location.href = "./user.php?id=' . $_SESSION['user_id'] . '";</script>';
    }
  }
  
 

?>