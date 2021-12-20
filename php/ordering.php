<?php
if (session_status() != PHP_SESSION_ACTIVE){ session_start(); }
if (isset($_SESSION['login'])){
    header('Location: /DZ_PHP_015/php/home.php'); exit();
}
?>
<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Оформление заказа</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="/DZ_PHP_015/CSS/style.css" rel="stylesheet"/>
</head>
<body>
<?php require "blocks/header.php" ?>

<div class="container">
    <h1>Тут должно быть оформление заказа, но пока тут только эта надпись.</h1>
</div>

<?php require "blocks/footer.php" ?>
</body>
</html>

