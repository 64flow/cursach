<html>
    <head>
        <meta charset="UTF-8">
    </head>
</html>

<?php
require_once('/home/p/p98554f1/p98554f1.beget.tech/public_html/MySQL.php');

$db = new MySQL();
$db->Connect(
    'localhost',
    'p98554f1_conchal',
    'Kursach28!',
    'p98554f1_conchal'
);

$sql = "SELECT * FROM владелец";

$result = $db->Select($sql);

echo json_encode($result, JSON_UNESCAPED_UNICODE);

?>