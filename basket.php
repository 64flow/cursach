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
  session_start();
  echo json_encode($_SESSION);
  $db = new MySQL();
  $db->Connect(
      'localhost',
      'p98554f1_conchal',
      'Kursach28!',
      'p98554f1_conchal'
  );
  $id = $_GET['id'];
  $sql = "SELECT `productid` FROM `cart` WHERE `productid`=$id";
  $b1 = $db->Select($sql);
  $sql1 = "SELECT  `оборудование`.`ID_Оборудования` FROM  `оборудование`WHERE `оборудование`.`ID_оборудования`=$id";
  $b2 = $db->Select($sql1);
  if ($b1!=$b2){
  $db->Execute("INSERT INTO `cart`(`userid`, `hallid`, `productid`, ) 
  SELECT 1,`залы`.`ID_зала`, `оборудование`.`ID_Оборудования`
  FROM `залы`,`оборудование`
  WHERE `оборудование`.`ID_зала`=`залы`.`ID_зала` and `оборудование`.`ID_оборудования`=$id");
   echo '<script type="text/javascript"> alert("Оборудование успешно добавлено в корзину.");</script>';
   echo '<script type="text/javascript">window.location.href = "./equipment2.php?id=' . $_SESSION['user_id'] . '" </script>';
  }
  else{
    echo '<script type="text/javascript"> alert("Оборудование уже есть в корзине.");</script>';
   echo '<script type="text/javascript">window.location.href = "./equipment2.php?id=' . $_SESSION['user_id'] . '" </script>';
  }
  ?>