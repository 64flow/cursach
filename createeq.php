
<!DOCTYPE html>
<html lang="ru">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-
scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<title>Аренда залов</title>
</head>
<body>
<?php require "blocks/header3.php";
session_start(); 
$proverka = $_SESSION['user_id'];
if ($proverka!=-1){
    echo '<script type="text/javascript"> alert("У вас нет доступа к этой странице");</script>';
    echo '<script>window.location.href = "./admin.php";</script>';
}?>

<div class="container mt-5">
    <h3 class="mb-5">Добавление оборудования</h3>

    <form method="post" action="createeq2.php" >
        <div class="form-group">
            <label for="purpose">Назначение</label>
            <input type="text" class="form-control" id="purpose" name="purpose" required>
        </div>
        <div class="form-group">
            <label for="name">Название</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <div class="form-group">
            <label for="condition">Состояние</label>
            <input type="text" class="form-control" id="condition" name="condition" required>
        </div>
        <div class="form-group">
            <label for="cost">Стоимость</label>
            <input type="text" class="form-control" id="cost" name="cost" required>
        </div>
        <div class="form-group">
            <label for="hallID">ID зала</label>
            <input type="text" class="form-control" id="hallID" name="hallID" required>
        </div>
        <button type="submit" class="btn btn-primary">Добавить</button>
    </form>
</div>


</body>
</html>
