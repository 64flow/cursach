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
require_once('/home/p/p98554f1/p98554f1.beget.tech/public_html/MySQL.php');
//session_start();
$db = new MySQL();
$db->Connect(
    'localhost',
    'p98554f1_conchal',
    'Kursach28!',
    'p98554f1_conchal'
);
if (isset($_POST['submit'])) {
    $table_name = $_POST['table_name'];
    $column_name = $_POST['column_name'];
    $column_type = $_POST['column_type'];

    // SQL-запрос на изменение таблицы
    $query = "ALTER TABLE $table_name ADD $column_name $column_type";
    $result = mysqli_query($conn, $query);

    if ($result) {
        echo "Таблица успешно изменена.";
    } else {
        echo "Ошибка изменения таблицы: " . mysqli_error($conn);
    }
}

// Форма для изменения таблицы
?>
<!DOCTYPE html>
<html>
<head>
    <title>Панель администратора</title>
</head>
<body>
    <h2>Изменение таблицы</h2>
    <form method="post" action="">
        <label for="table_name">Имя таблицы:</label>
        <input type="text" name="table_name" id="table_name" required><br><br>
        <label for="column_name">Имя столбца:</label>
        <input type="text" name="column_name" id="column_name" required><br><br>
        <label for="column_type">Тип столбца:</label>
        <input type="text" name="column_type" id="column_type" required><br><br>
        <input type="submit" name="submit" value="Изменить таблицу">
    </form>
</body>
</html>







