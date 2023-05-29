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

// Удаляем владельца по указанному ID
$sql = "DELETE FROM владелец WHERE ID_владельца = $id";
$db->Execute($sql);

// Перенаправление на страницу со списком владельцев после удаления
header("Location: own.php");
exit();
?>
