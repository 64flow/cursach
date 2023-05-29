<!DOCTYPE html>
<html lang="ru">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-
scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" href=" https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<style>
        textarea {
            width: 100%;
            height: 400px;
        }
    </style>
</head>
<body>
<?php require "blocks/header3.php"; 
session_start();
$proverka = $_SESSION['user_id'];
if ($proverka!=-1){
    echo '<script type="text/javascript"> alert("У вас нет доступа к этой странице");</script>';
    echo '<script>window.location.href = "./admin.php";</script>';
}
?>
<div class="container mt-4">
    <h1>Введите SQL запрос</h1>
    
    <form action="manage-database.php" method="post">
        <textarea name="query" rows="5" cols="40" required></textarea>
        <br>
        <input type="submit" class="btn-success" value="Выполнить запрос">
    </form>
</div>
</body>
</html>
