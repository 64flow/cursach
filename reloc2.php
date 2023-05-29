<?php session_start();
//echo json_encode($_SESSION);
$id=$_SESSION['cart1']['hall']['ID_зала'];
header("Location: ./equipment2.php?id=" . $id);
exit;
