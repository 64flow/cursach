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
    <title>Покупательская корзина</title>
    <style>
        .product {
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <?php require_once('/home/p/p98554f1/p98554f1.beget.tech/public_html/MySQL.php');
session_start();
$db = new MySQL();
$db->Connect(
    'localhost',
    'p98554f1_conchal',
    'Kursach28!',
    'p98554f1_conchal'
);
$id = $_GET['id'];

?>
    <h2>Покупательская корзина</h2>

    <div id="cart">
        <h3>Корзина</h3>
        <ul id="cart-items"></ul>
        <p>Итого: $<span id="cart-total">0</span></p>
        <button onclick="checkout()">Оформить заказ</button>
    </div>

    <h3>Оборудование</h3>
    <div class="product">
        <span>Товар 1 - $10</span>
        <button onclick="addToCart('$equip', 10)">Арендовать</button>
        <button onclick="delfromCart('$equip', 10)">Отменить</button>
    </div>
    <div class="product">
        <span>Товар 2 - $20</span>
        <button onclick="addToCart('Товар 2', 20)">Арендовать</button>
        <button onclick="delfromCart('Товар 2', 10)">Отменить</button>
    </div>
    <div class="product">
        <span>Товар 3 - $30</span>
        <button onclick="addToCart('Товар 3', 30)">Арендовать</button>
        <button onclick="delfromCart('Товар 3', 10)">Отменить</button>
    </div>

    <script>
        var cartItems = [];
        var cartTotal = 0;

        function addToCart(itemName, itemPrice) {
            cartItems.push({ name: itemName, price: itemPrice });
            cartTotal += itemPrice;
            updateCart();
        }
        function delfromCart(itemName, itemPrice) {
            cartItems.push({ name: itemName, price: itemPrice });
            while(cartTotal!=0){
            cartTotal = cartTotal-itemPrice;
            updateCart();
            }
        }

        function updateCart() {
            var cartItemsElement = document.getElementById("cart-items");
            cartItemsElement.innerHTML = "";

            cartItems.forEach(function(item) {
                var li = document.createElement("li");
                li.textContent = item.name + " - $" + item.price;
                cartItemsElement.appendChild(li);
            });

            document.getElementById("cart-total").textContent = cartTotal;
        }

        function checkout() {
            // Здесь можно добавить логику для обработки оформления заказа
            alert("Заказ оформлен! Итого: р " + cartTotal);
            cartItems = [];
            cartTotal = 0;
            updateCart();
        }
    </script>
</body>
</html>