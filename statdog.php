<?php
require_once('/home/p/p98554f1/p98554f1.beget.tech/public_html/MySQL.php');
require_once('/home/p/p98554f1/p98554f1.beget.tech/public_html/lib/tfpdf/tfpdf.php');

session_start();
$db = new MySQL();

$db->Connect(
    'localhost',
    'p98554f1_conchal',
    'Kursach28!',
    'p98554f1_conchal'
);

$start = $_SESSION['start'];
$end = $_SESSION['end'];

$sql = "SELECT `iddog`, `idhall`, `idarend`,`email`, `datedog`, `datear`, `srok` FROM `arenddog` WHERE `datear` BETWEEN '$start' AND '$end'";
$stat = $db->Select($sql);

$pdf = new tFPDF('L', 'mm', 'A3');
$pdf->AddPage();
$pdf->AddFont('Times New Roman', '', 'timesnewromanpsmt.ttf', true);
$pdf->SetFont('Times New Roman', '', 12);

$pdf->SetTitle('Статистика по аренде');
$pdf->Write(15, 'Статистика по аренде');
$imagePath = 'img/logo.png'; // Укажите путь к вашему изображению
$pdf->Image($imagePath, 340, 10, $width, $height);
$pdf->Ln(10);

$hallCount = array(); // Массив для подсчета количества аренд залов
$maxDuration = 0; // Максимальный срок аренды в одном договоре
$renterCount = array(); // Массив для подсчета количества аренд арендаторов
$renterCount2 = array();
$maxRenterEmail = ''; // Почта арендатора с максимальным количеством аренд
$maxRenterCount = 0; // Максимальное количество аренд у арендатора
$maxRentId = ''; // ID арендатора с наибольшим количеством аренд

// Цикл для вывода каждой строки
foreach ($stat as $row) {
    $iddog = $row['iddog'];
    $idhall = $row['idhall'];
    $idarend = $row['idarend'];
    $email = $row['email'];
    $datedog = $row['datedog'];
    $datear = $row['datear'];
    $srok = $row['srok'];

    // Добавляем данные строки в PDF
    $pdf->Cell(40, 10, "№ договора: $iddog", 1);
    $pdf->Cell(20, 10, "№ зала: $idhall", 1);
    $pdf->Cell(35, 10, "ID арендатора: $idarend", 1);
    $pdf->Cell(50, 10, "Почта: $email", 1);
    $pdf->Cell(75, 10, "Дата подписания договора: $datedog", 1);
    $pdf->Cell(60, 10, "Дата начала аренды: $datear", 1);
    $pdf->Cell(30, 10, "Срок: $srok", 1);
    $pdf->Ln();

    // Подсчет количества аренд залов
    if (isset($hallCount[$idhall])) {
        $hallCount[$idhall]++;
    } else {
        $hallCount[$idhall] = 1;
    }

    // Поиск максимального срока аренды
    if ($srok > $maxDuration) {
        $maxDuration = $srok;
    }
    if (isset($renterCount[$email])) {
        $renterCount[$email]++;
    } else {
        $renterCount[$email] = 1;
    }

    // Поиск арендатора с максимальным количеством аренд
    if ($renterCount[$email] > $maxRenterCount) {
        $maxRenterCount = $renterCount[$email];
        $maxRenterEmail = $email;
        $maxRentId=$idarend;
    }
    /*if ($renterCount2[$idarend] > $maxRenterCount) {
        $maxRenterCount = $renterCount2[$idarend];
        $maxRentId = $idarend;
    }*/
    
}
//echo json_encode($idarend);
// Если нет результатов, выводим сообщение
if (count($stat) == 0) {
    $pdf->Cell(0, 10, "Нет данных, попадающих в указанный диапазон.", 1);
} else {
    // Поиск зала с наибольшим количеством аренд
    $mostRentedHall = array_search(max($hallCount), $hallCount);
    
    // Вывод результатов подсчета
    $pdf->Ln(10);
    $pdf->Cell(0, 10, "Количество аренд зала с наибольшим количеством аренд: " . max($hallCount), 0, 1);
    $pdf->Cell(0, 10, "Зал с наибольшим количеством аренд: $mostRentedHall", 0, 1);
    $pdf->Cell(0, 10, "Максимальный срок аренды в одном договоре: $maxDuration", 0, 1);
    $pdf->Ln(10);
    $pdf->Cell(0, 10, "Количество аренд арендатора с наибольшим количеством аренд: $maxRenterCount", 0, 1);
    $pdf->Cell(0, 10, "ID арендатора с наибольшим количеством аренд: $maxRentId", 0, 1);
    
    $pdf->Cell(0, 10, "Почта арендатора с наибольшим количеством аренд: $maxRenterEmail", 0, 1);

}

$pdf->Output("stat_report.pdf", "I");
echo '<script>window.location.href = "./stat.php";</script>';
?>
