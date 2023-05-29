


<html lang="ru">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-
scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" href=" https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<title>Авторизация</title>
</head>

<body>
    
<div class="d-flex flex-column flex-md-row align-items-center p-3
px-md-4 mb-3 bg-white border-bottom shadow-sm">
<h5 class="my-0 mr-md-auto font-weight-normal">ARENDA.RU</h5>
<nav class="'my-2 my-md-0 mr-md-3">
<a class="p-2 text-dark" href="index.php">Главная</a>
<a class="p-2 text-dark" href="#">Контакты</a>
</nav>

</div>

<div class="form_auth_block">
  <div class="form_auth_block_content">
    
    
    <p class="form_auth_block_head_text">Авторизация</p>
    <form class="form_auth_style" action="admincheck.php" method="post">
      
      <input type="email" name="auth_email" placeholder="Введите email" required >
     
      <input type="password" name="auth_pass" placeholder="Введите пароль" required >
      <a href='index.php'><button class="form_auth_button" button type="submit" name="form_auth_submit">Войти</button>
      
    </form>
  </div>
  