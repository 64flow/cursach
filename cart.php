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
<?php
require "blocks/header2.php";
session_start();
require_once('./MySQL.php');
$db = new MySQL();
$db->Connect(
    'localhost',
    'p98554f1_conchal',
    'Kursach28!',
    'p98554f1_conchal'
);

$id = $_GET['id'];
$hall = $_SESSION['cart1']['hall']['ID_зала'];

echo json_encode($id);
echo json_encode($hall);
$keys = array_keys($_SESSION['cart']);
$sql = "SELECT `оборудование`.`Назначение`, `оборудование`.`Название`, `оборудование`.`Состояние`, `оборудование`.`ID_оборудования`, `оборудование`.`ID_зала`, `оборудование`.`Стоимость`,`залы`.`ID_зала`
        FROM `оборудование`,`залы` 
        WHERE `ID_оборудования` = $id and `залы`.`ID_зала`=`оборудование`.`ID_зала`";

$cart = $db->Select($sql);
if (in_array($id, array_keys($_SESSION['cart']))) {
    echo '<script type="text/javascript"> alert("Оборудование уже добавлено");</script>';
    echo '<script type="text/javascript">window.location.href = "./user.php" </script>';
} else {
    // Проверяем, есть ли уже арендованное оборудование в корзине
    if ($_SESSION['cart1']['hall']['ID_зала'] != $hall) {
        echo '<script type="text/javascript"> alert("Нельзя арендовать оборудование из другого зала");</script>';
        echo "<script type='text/javascript'>window.location.href = './user.php' </script>";
        exit;
    }
    
    foreach ($keys as $key) {
        $sql = "SELECT * FROM `оборудование` WHERE `ID_зала`= $hall and `ID_оборудования`= $key";
        $equip = $db->Select($sql);
        if ($equip[0]['ID_зала'] != $hall) {
            echo '<script type="text/javascript"> alert("Нельзя арендовать оборудование из разных залов");</script>';
            echo "<script type='text/javascript'>window.location.href = './user.php' </script>";
            exit;
        }
    }
    
    $_SESSION['cart'][$id] = $cart[0]['ID_зала'];
    echo '<script type="text/javascript"> alert("Оборудование успешно добавлено");</script>';
    echo "<script type='text/javascript'>window.location.href = './reloc3.php' </script>";
}

/*


foreach ($keys as $key) {
        $sql = "SELECT * FROM `оборудование` WHERE `ID_зала`= $hall and `ID_оборудования`= $key";
        $equip = $db->Select($sql);
        if ($equip[0]['ID_зала'] != $hall) {
            echo '<script type="text/javascript"> alert("Нельзя арендовать оборудование из разных залов");</script>';
            echo "<script type='text/javascript'>window.location.href = './user.php' </script>";
            exit;
        }
    }













foreach ($_SESSION['cart'] as $cart){
    
   // echo "$id_i";
     $sql2="SELECT `Назначение`, `Название`, `Состояние`, `ID_оборудования`, `ID_зала`, `Стоимость дня аренды` FROM `оборудование` WHERE $cart=ID_оборудования";
     $eq=$db->Select($sql2);
   echo "
	
		<div class='card mb-4 shadow-sm'>
			<div class='card-header'>
				<h4 class='my-0 font-weight-normal'>".$eq[0]['Назначение']."</h4>
			</div>
			<div class='card-body'>
				<h1 class='card-title pricing-card-title'>Стоимость дня аренды: <small class='text-muted'>".$eq[0]['Стоимость дня аренды']."</small></h1>
				<h2 class='card-title pricing-card-title'>Название: <small class='text-muted'>".$eq[0]['Название']."</small></</h2>

				<h3 class='card-title pricing-card-title'>Состояние: <small class='text-muted'>".$eq[0]['Состояние']."</small></h3>
                <h3 class='card-title pricing-card-title'>ID: <small class='text-muted'>".$eq[0]['ID_оборудования']."</small></h3>

                </div>	
		</div>
	";
    foreach ($_SESSION['cart1'] as $cart => $amount){
       
        $sql1="SELECT `ID_зала`, `ID_владельца`, `Адрес`, `Вместимость`, `Количество ВИП-мест`, `Стоимость аренды` FROM `залы` WHERE`ID_зала`=$cart";

    }
    //echo "id $product";
    //$id_i = $_SESSION['cart'][$ids];
   
}
    
        

//echo '<script>window.location.href = "./equipment2.php?id='.$_SESSION['user_id'].'";</script>';
//echo json_encode($_SESSION);
if (empty($result)) {
    echo "Зал не найден";
    exit;
}
$hall = $result[0];

// Проверяем, есть ли уже арендованный зал в корзине
if (isset($_SESSION['cart']['hall'])) {
    echo "Вы уже арендовали зал";
    exit;
}
$_SESSION['cart']['hall'] = $hall;

echo "Зал успешно добавлен в корзину!";*/

/*
foreach ($_SESSION['cart'] as $hallId => $hall) {
    // Отображение информации о зале...

    echo "<h2>Зал: $hall </h2>";
    // Отображение информации о зале...

    // Перебираем каждое оборудование внутри зала
    foreach ($hall as $equipmentId => $equipment) {
        // Отображение информации об оборудовании...

        echo "<p>Оборудование: " . $equipment['Название'] . "</p>";
        echo "<p>Оборудование: " . $equipment['Назначение'] . "</p>";
        // Отображение остальной информации об оборудовании...
    }
}*/
/*
// Добавляем оборудование в корзину
$_SESSION['cart'][$id] = $cart[0]['ID_зала'];

echo "Оборудование успешно добавлено в корзину!";
foreach ($_SESSION['cart'] as $id => $equipment) {
    $equipmentId = $equipment['ID_Оборудования'];
    $equipmentName = $equipment['Название'];
    // Дополнительная информация об оборудовании...

    echo "<p>Оборудование: $equipmentName</p>";
    // Отображение остальной информации об оборудовании...
}

$sql = "SELECT `Адрес`, `Стоимость аренды`, `Вместимость`, `Количество ВИП-мест`, `ID_зала`, `ID_владельца` FROM `залы` WHERE `ID_зала` = $id";
$result = $db->Select($sql);

if (empty($result)) {
    echo "Зал не найден";
    exit;
}

$hall = $result[0];

// Проверяем, есть ли уже арендованный зал в корзине
if (isset($_SESSION['cart']['hall'])) {
    echo "Вы уже арендовали зал";
    exit;
}

// Добавляем зал в корзину
$_SESSION['cart']['hall'] = $hall;

echo "Зал успешно добавлен в корзину!";

$sql = "SELECT `залы`.`ID_зала`, `залы`.`Название`, `залы`.`Описание`, `оборудование`.`ID_зала`
        FROM `залы`,`оборудование`
        WHERE `ID_зала`=`оборудование`.`ID_зала`";

$hall = $db->Select($sql);

// Проверяем, есть ли уже арендованное оборудование в корзине
$equipmentHalls = array_column($_SESSION['cart'], 'ID_зала');
if (in_array($id, $equipmentHalls)) {
    $_SESSION['cart_hall'] = $hall[0]['ID_зала'];
    echo "Зал арендован";
} else {
    echo "Для аренды зала необходимо арендовать оборудование из этого зала";
}*/


//echo '<script>window.location.href = "./equipment2.php?id='.$_SESSION['user_id'].'";</script>';
//echo json_encode($_SESSION);