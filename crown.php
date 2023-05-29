<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <title>Добавление владельца</title>
</head>
<body>
    <?php require "blocks/header3.php";
    session_start();
    $proverka = $_SESSION['user_id'];
    if ($proverka!=-1){
        echo '<script type="text/javascript"> alert("У вас нет доступа к этой странице");</script>';
        echo '<script>window.location.href = "./admin.php";</script>';
    } ?>
    <div class="container mt-5">
        <h3 class="mb-5">Добавление владельца</h3>
        <form method="post" action="saveowner.php">
            <div class="form-group">
                <label for="name">Название владельца</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <div class="form-group">
                <label for="inn">ИНН/КПП</label>
                <input type="text" class="form-control" id="inn" name="inn" required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="phone">Номер телефона</label>
                <input type="text" class="form-control" id="phone" name="phone" required>
            </div>
            <div class="form-group">
                <label for="bank">Банковские реквизиты</label>
                <input type="text" class="form-control" id="bank" name="bank" required>
            </div>
            <div class="form-group">
                <label for="address">Адрес</label>
                <input type="text" class="form-control" id="address" name="address" required>
            </div>
            <button type="submit" class="btn btn-primary">Добавить</button>
        </form>
    </div>
</body>
</html>
