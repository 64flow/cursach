<?php
require_once('/home/p/p98554f1/p98554f1.beget.tech/public_html/MySQL.php');
require_once('/home/p/p98554f1/p98554f1.beget.tech//public_html/lib/tfpdf/tfpdf.php');

session_start();
$db = new MySQL();

$db->Connect(
    'localhost',
    'p98554f1_conchal',
    'Kursach28!',
    'p98554f1_conchal'
);
$id=$_GET['id'];
//foreach ($_SESSION['cart'] as $cart=>$amount){
    
    // echo "$id_i";
      //$sql2="SELECT `Назначение`, `Название`, `Состояние`, `ID_оборудования`, `ID_зала`, `Стоимость` FROM `оборудование` WHERE $cart=`ID_оборудования`";
      //$eq=$db->Select($sql2);
      //echo json_encode($_SESSION['cart']);}
    //echo '';}
//$user_id = intval($_SESSION['user_id']);
$hall=$_SESSION['cart1']['hall']['ID_зала'];
//echo $hall."<br>";
$keys = array_keys($_SESSION['cart']);
$sql1 = "SELECT `владелец`.`Название владельца`, `владелец`.`ИНН/КПП`, `владелец`.`Банковские реквизиты владельца`, `владелец`.`Адрес`, `владелец`.`email`,
`владелец`.`Контактное лицо`, `владелец`.`Номер телефона`, `владелец`.`ID_владельца`, `залы`.`ID_зала`,`залы`.`ID_владельца`, `залы`.`Стоимость аренды`,
`arenddog`.`srok`,	`arenddog`.`datedog`, `arenddog`.`datear`, `arenddog`.`srok`
FROM `владелец`, `залы`, `arenddog`
WHERE `залы`.`ID_зала` = $hall
AND `залы`.`ID_владельца` = `владелец`.`ID_владельца`
ORDER BY `arenddog`.`iddog` DESC
LIMIT 1;";

//$equip = $db->Select($sql);
$owner = $db->Select($sql1);
$cost = $owner[0]['Стоимость аренды'];
$costeq = $equip[0]['Стоимость'];
$srok = $owner[0]['srok'];
$sum = $cost*$srok;

$sum1 = $costeq*$srok;
//echo json_encode($sum);
//echo json_encode($owner);

$pdf = new tFPDF('P', 'mm', 'A4');
$pdf->AddPage();

$pdf->AddFont('Times New Roman', '', 'timesnewromanpsmt.ttf', true);
$pdf->SetFont('Times New Roman', '', 20);


$pdf->SetTitle('ДОГОВОР НА АРЕНДУ');
$pdf->Write(15, 'ДОГОВОР НА АРЕНДУ'); // Вывод текста в ячейку
$pdf->Ln(10);
$imagePath = 'img/logo.png'; // Укажите путь к вашему изображению
$pdf->Image($imagePath, 140, 2, $width, $height);


$pdf->SetLineWidth(0.5); // Установка толщины линии границы
$pdf->SetFillColor(255, 255, 255); // Установка цвета заливки ячейки (белый)








$pdf->SetFont('Times New Roman', '', 14);

foreach ($keys as $key) {
    //echo $key . "<br>";
    $sql = "SELECT * FROM `оборудование` WHERE `ID_зала`= $hall and `ID_оборудования`= $key";
    $equip = $db->Select($sql);
  
$costeq = $equip[0]['Стоимость'];
$sum1 = $costeq*$srok;
$counter=$counter+$sum1;




    
}

$em = $_SESSION['email'];
$sql2 = "SELECT * FROM `арендатор юрлицо` WHERE `email` = '$em'";
$info = $db->Select($sql2);

 $ff=$owner[0]['datear'];
 
  
  
  $curdate = new DateTime($owner[0]['datear']);
  $curdate1 = $curdate->format('Y-m-d');
$daysToAdd = $owner[0]['srok'];
$curdate->add(new DateInterval("P{$daysToAdd}D"));

$endDate = $curdate->format('Y-m-d');
  
  $pdf->SetFont('Times New Roman', '', 14);



$sum3=$sum+$counter;/*
$pdf->SetFont('Times New Roman', '', 14);
$pdf->Write(5, 'Стоимость: ' . $sum3. ' рублей');
$pdf->Ln(7);*/
;/*
$pdf->Write(5, 'Дата подписания договора: ' . $curdate1.'                   Подпись арендатора:____________ ');
$pdf->Ln(10);
$pdf->Write(5, '                                                                                 Подпись арендодателя:____________ ' );
$pdf->Ln(10);*/
// Текст договора
$content = "

Настоящий Договор аренды (далее именуемый 'Договор') заключен между:
";
$pdf->MultiCell(0, 5, $content);
$pdf->Ln(7);
$em = $_SESSION['email'];
$sql2 = "SELECT * FROM `арендатор юрлицо` WHERE `email` = '$em'";
$info = $db->Select($sql2);
if ($info != null){
$pdf->Write(5, 'Название: ' . $info[0]['Название юр лица']);
$pdf->Ln(7);
$pdf->Write(5, 'ИНН/КПП: ' . $info[0]['ИНН/КПП']);
$pdf->Ln(7);
$pdf->Write(5, 'Банковские реквизиты: ' . $info[0]['Банковские реквизиты']);
$pdf->Ln(7);
$pdf->Write(5, 'Адрес: ' . $info[0]['Адрес']);
$pdf->Ln(7);
$pdf->Write(5, 'Email: ' . $info[0]['email']);
$pdf->Ln(7);
$pdf->Write(5, 'Контактное лицо: ' . $info[0]['Контактное лицо']);
$pdf->Ln(7);
}
  if ($info == null)
  {
    $sql3 = "SELECT * FROM `arendfiz` WHERE `email` = '$em'";
    $info1 = $db->Select($sql3);
    $pdf->Write(5, 'Фамилия: ' . $info1[0]['fam']);
    $pdf->Ln(7);
    $pdf->Write(5, 'Имя: ' . $info1[0]['name']);
    $pdf->Ln(7);
    $pdf->Write(5, 'Отчество: ' . $info1[0]['otch']);
    $pdf->Ln(7);
    $pdf->Write(5, 'Телефон: ' . $info1[0]['tel']);
    $pdf->Ln(7);
    $pdf->Write(5, 'Email: ' . $info1[0]['email']);
    $pdf->Ln(7);
  }
$content1 ="
Арендодатель:
Название: ARENDA.RU
Адрес: г. Москва
Почта арендодателя sm1rnoffnikolay@yandex.ru
Телефон арендодателя: +7(985)-549-23-38


1. Объект аренды
Арендодатель сдает в аренду зал и оборудование(если арендовано) Арендатору:
";
$pdf->MultiCell(0, 5, $content1);
$pdf->Ln(7);
$sq="SELECT * FROM `залы` WHERE `ID_зала`=$hall";
$hh=$db->Select($sq);
$pdf->SetFont('Times New Roman', '', 14);
$pdf->Write(5, 'Данные о зале');
$pdf->Ln(7);
$pdf->SetFont('Times New Roman', '', 14);
$pdf->Write(5, 'Название владельца: ' . $owner[0]['Название владельца']);
$pdf->Ln(7);
$pdf->Write(5, 'ИНН/КПП: ' . $owner[0]['ИНН/КПП']);
$pdf->Ln(7);
$pdf->Write(5, 'Банковские реквизиты: ' . $owner[0]['Банковские реквизиты']);
$pdf->Ln(7);
$pdf->Write(5, 'Адрес: ' . $hh[0]['Адрес']);
$pdf->Ln(7);
$pdf->Write(5, 'Вместимость: ' . $hh[0]['Вместимость']);
$pdf->Ln(7);
$pdf->Write(5, 'Количество ВИП-мест: ' . $hh[0]['Количество ВИП-мест']);
$pdf->Ln(7);
$pdf->Write(5, 'Email: ' . $owner[0]['email']);
$pdf->Ln(7);
$pdf->Write(5, 'Номер телефона: ' . $owner[0]['Номер телефона']);
$pdf->Ln(7);
$pdf->Write(5, 'Стоимость аренды: ' . $sum. ' рублей');
$pdf->Ln(5);


foreach ($keys as $key) {
  //echo $key . "<br>";
  $sql = "SELECT * FROM `оборудование` WHERE `ID_зала`= $hall and `ID_оборудования`= $key";
  $equip = $db->Select($sql);
  $pdf->Write(5, '_____________________');
$pdf->Ln(7);
  $pdf->Write(5, 'Назначение: ' . $equip[0]['Назначение']);
$pdf->Ln(7);
$pdf->Write(5, 'Название: ' . $equip[0]['Название']);
$pdf->Ln(7);
$pdf->Write(5, 'Состояние: ' . $equip[0]['Состояние']);
$pdf->Ln(7);
$costeq = $equip[0]['Стоимость'];
$sum1 = $costeq*$srok;
$counter=$counter+$sum1;
$pdf->Write(5, 'Стоимость: ' . $sum1. ' рублей');
$pdf->Ln(7);}
$content2 ="


2. Срок аренды
Срок аренды составляет $srok дня, начиная с $ff и заканчивая $endDate.

3. Арендная плата
Арендатор обязуется уплатить Арендодателю арендную плату в размере $sum3 рублей.

4. Обслуживание и ремонт
Арендатор несет ответственность за обслуживание и ремонт оборудования, за исключением повреждений, вызванных нормальным износом.

5. Расторжение
Любая из сторон вправе расторгнуть настоящий Договор, предоставив письменное уведомление за 5 дней до желаемой даты расторжения.

6. Применимое право
Настоящий Договор регулируется и толкуется в соответствии с законами Российской Федерации.

7. Полное соглашение
Настоящий Договор является полным соглашением между Арендодателем и Арендатором и отменяет все предыдущие устные и письменные соглашения.



Подписи:

Арендодатель: _________________________   Дата: $curdate1
Арендатор:   _________________________   Дата: $curdate1

";

// Добавление содержимого в PDF документ
$pdf->MultiCell(0, 5, $content2);
$pdf->Output("report.pdf", "I");


echo '<script>window.location.href = "./user.php";</script>';
?>