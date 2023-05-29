<?php session_start();
echo json_encode($_SESSION);
echo '<script>window.location.href = "./basketmenu.php?id=' . $_SESSION['user_id'] . '";</script>';?>