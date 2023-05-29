<!DOCTYPE html>
<html lang="ru">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-
scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<link rel="stylesheet" href="css/style.css">
<?php
// Подключение к базе данных
$servername = "localhost";
$username = "p98554f1_conchal";
$password = "Kursach28!";
$dbname = "p98554f1_conchal";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Ошибка подключения: " . $conn->connect_error);
}

if (isset($_POST['query'])) {
    // Получаем запрос из текстового поля
    $query = $_POST['query'];
    
    // Выполняем запрос
    $result = mysqli_query($conn, $query);
    
    if ($result) {
        // Обработка успешного выполнения запроса
        echo "Запрос успешно выполнен.";
        
        // Вывод результатов запроса
        if (mysqli_num_rows($result) > 0) {
            echo "<table>";
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                foreach ($row as $value) {
                    echo "<td>" . $value . "</td>";
                }
                echo "</tr>";
            }
            echo "</table>";
        } else {
            echo "Нет результатов.";
        }
    } else {
        // Обработка ошибки выполнения запроса
        echo "Ошибка выполнения запроса: " . mysqli_error($conn);
    }
}
?>