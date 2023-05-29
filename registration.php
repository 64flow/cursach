<!DOCTYPE html>
<html lang="ru">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-
scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" href=" https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<title>Авторизация</title>
<link rel="stylesheet" href="css/style.css">
</head>

<body>
    
<div class="d-flex flex-column flex-md-row align-items-center p-3
px-md-4 mb-3 bg-white border-bottom shadow-sm">
<h5 class="my-0 mr-md-auto font-weight-normal">ARENDA.RU</h5>
<nav class="'my-2 my-md-0 mr-md-3">
<a class="p-2 text-dark" href="index.php">Главная</a>
<a class="p-2 text-dark" href="#">Контакты</a>

</div>
<div class="container mt-4">
<h1>Регистрация</h1>
<form action="check.php" method="post">
<input type="text" class="form-control" name="fam"
id="fam" placeholder="Фамилия"><br>
<input type="text" class="form-control" name="name"
id="name" placeholder="Имя"><br>
<input type="text" class="form-control" name="otch"
id="otch" placeholder="Отчество"><br>
<input type="text" class="form-control" name="pasp"
id="pasp" placeholder="Паспортные данные"><br>
<input type="text" class="form-control" name="tel"
id="tel" placeholder="Номер телефона"><br>
<input type="email" class="form-control" name="email"
id="email" placeholder="email"><br>
<input type="password" class="form-control" name="pass"
id="pass" placeholder="Пароль"><br>
<button class="btn btn-success" type="submit">Зарегистрировать</button>
</form>
</div>