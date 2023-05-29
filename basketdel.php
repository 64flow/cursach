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
  
  $db->Execute();
  ?>