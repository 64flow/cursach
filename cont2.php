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
<body>
<?php require "blocks/header.php";
session_start();?>
<div class='card mb-4 shadow-sm'>
      <div class='card-header'>
      <h1 class='card-title pricing-card-title'>Контакты</h1>
      </div>
      <div class='card-body'>
          <h1 class='card-title pricing-card-title'>Как с нами связаться</h1>
          <h1 class="card-title pricing-card-title">
    1. По электронной почте: <a href="mailto:sm1rnoffnikolay@yandex.ru" onclick="copyText('sm1rnoffnikolay@yandex.ru')">sm1rnoffnikolay@yandex.ru</a>
  </h1>
  <h1 class="card-title pricing-card-title">
    2. Позвоните нам: <span onclick="copyText('+79855492338')">+7(985)-549-23-38</span>
  </h1>
          
          
          
          
    </div>
</div>


<script>
  function copyText(text) {
    const tempInput = document.createElement('input');
    tempInput.value = text;
    document.body.appendChild(tempInput);
    tempInput.select();
    document.execCommand('copy');
    document.body.removeChild(tempInput);
    alert('Текст скопирован в буфер обмена: ' + text);
  }
</script>
<?php require "blocks/footer.php";