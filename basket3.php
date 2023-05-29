


<html lang="ru"></html>
<head>
<meta charset="UTF-8">

<meta name="viewport" content="width=device-width, initial-
scale=1.0">

<meta http-equiv="X-UA-Compatible" content="ie=edge">
<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" href=" https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>

<body><?php require "blocks/header2.php" ?></body>
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
  


// Функция для добавления товара в корзину
function addToCart($productId, $quantity) {
    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = array();
    }
    
    if (isset($_SESSION['cart'][$productId])) {
        // Если товар уже есть в корзине, обновляем количество
        $_SESSION['cart'][$productId] += $quantity;
    } else {
        // Если товара нет в корзине, добавляем новую запись
        $_SESSION['cart'][$productId] = $quantity;
    }
}

// Функция для удаления товара из корзины
function removeFromCart($productId) {
    if (isset($_SESSION['cart'][$productId])) {
        // Удаляем товар из корзины
        unset($_SESSION['cart'][$productId]);
    }
}

// Функция для получения содержимого корзины
function getCartItems() {
    if (isset($_SESSION['cart'])) {
        return $_SESSION['cart'];
    } else {
        return array();
    }
}

// Пример использования функций

$productId = 1; // Идентификатор товара
$quantity = 3; // Количество товара

// Добавление товара в корзину
addToCart($productId, $quantity);

// Удаление товара из корзины
removeFromCart($productId);

// Получение содержимого корзины
$cartItems = getCartItems();

// Вывод содержимого корзины
foreach ($cartItems as $productId => $quantity) {
    echo "Товар ID: " . $productId . ", Количество: " . $quantity . "<br>";
}
?>
