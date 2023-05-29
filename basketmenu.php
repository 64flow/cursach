<!DOCTYPE html>
<html lang="ru">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-
scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" href=" https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<?php require "blocks/header2.php";
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
//echo json_encode($_SESSION);
echo"<a href='cartdel.php'><button type='button' class='btn btn-lg btn-block btn-outline-primary'>Очистить корзину</button></a>";
echo"
<div class='container mt-5'>
	<h3 class='mb-5'>Корзина</h3>";
foreach ($_SESSION['cart'] as $cart=>$amount){
    
    // echo "$id_i";
      $sql2="SELECT `Назначение`, `Название`, `Состояние`, `ID_оборудования`, `ID_зала`, `Стоимость` FROM `оборудование` WHERE $cart=`ID_оборудования`";
      $eq=$db->Select($sql2);
      //echo json_encode($eq);
    echo "
     
         <div class='card mb-4 shadow-sm'>
             <div class='card-header'>
                 <h4 class='my-0 font-weight-normal'>".$eq[0]['Назначение']."</h4>
             </div>
             <div class='card-body'>
                 <h1 class='card-title pricing-card-title'>Стоимость дня аренды: <small class='text-muted'>".$eq[0]['Стоимость']."</small></h1>
                 <h2 class='card-title pricing-card-title'>Название: <small class='text-muted'>".$eq[0]['Название']."</small></</h2>
 
                 <h3 class='card-title pricing-card-title'>Состояние: <small class='text-muted'>".$eq[0]['Состояние']."</small></h3>
                 <h3 class='card-title pricing-card-title'>ID: <small class='text-muted'>".$eq[0]['ID_оборудования']."</small></h3>
 
                 </div>	
         </div>
     ";
}
     foreach ($_SESSION['cart1']['hall'] as $cart1){
        
         $sql1="SELECT `залы`.`Адрес`, `залы`.`Стоимость аренды`, `залы`.`Вместимость`, `залы`.`Количество ВИП-мест`, `залы`.`ID_зала`, `владелец`.`Название владельца`  FROM `залы` JOIN `владелец` ON `владелец`.`ID_владельца` = `залы`.`ID_владельца` WHERE `ID_зала`=$cart1";
         $halls=$db->Select($sql1);
         echo "
		<div class='card mb-4 shadow-sm'>
			<div class='card-header'>
				<h4 class='my-0 font-weight-normal'>".$halls[0]['Адрес']."</h4>
			</div>
			<div class='card-body'>
				<h1 class='card-title pricing-card-title'>".$halls[0]['Стоимость аренды']." <small class='text-muted'>р/ день</small></h1>
				<h2 class='card-title pricing-card-title'>".$halls[0]['Вместимость']." <small class='text-muted'>Вместимость</small></h2>
				<h3 class='card-title pricing-card-title'>".$halls[0]['Количество ВИП-мест']." <small class='text-muted'>Количество ВИП-мест</small></h3>
				
				<h3 class='card-title pricing-card-title'>".$halls[0]['Название владельца']." <small class='text-muted'>Владелец</small></h3>
			
			</div>
		</div>
	";
 
     }
     echo"<a href='order.php?id=".$eq[$i]['ID_оборудования']."'><button type='button' class='btn btn-lg btn-block btn-outline-primary'>Оформить заказ</button></a>";
?>

<?php require "blocks/footer2.php";