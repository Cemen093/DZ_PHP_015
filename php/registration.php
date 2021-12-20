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
    <title>Регистрация</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="/DZ_PHP_015/CSS/style.css" rel="stylesheet"/>

</head>
<body>
<?php require "blocks/header.php" ?>

<div class="container form-signin text-center">
    <form action="/DZ_PHP_015/php/check_registration_form.php" method="post">
        <h1 class="h3 mb-3 fw-normal">Форма регистрации</h1>

        <div class="form-floating">
            <input type="email" class="form-control" id="floatingEmail" name="email" placeholder="name@example.com">
            <label for="floatingEmail">Email address</label>
        </div>
        <div class="form-floating">
            <input type="text" class="form-control" id="floatingLogin" name="login" placeholder="Login">
            <label for="floatingLogin">Login</label>
        </div>
        <div class="form-floating">
            <input type="password" class="form-control" id="floatingPassword" name="password" placeholder="Password">
            <label for="floatingPassword">Password</label>
        </div>
        <div class="form-floating">
            <input type="password" class="form-control" id="floatingPassword" name="password_repeat" placeholder="Password">
            <label for="floatingPassword">Password repeat</label>
        </div>
        <input class="w-100 btn btn-lg btn-primary" type="submit" name="submit">Отправить</input>
    </form>
</div>

<?php require "blocks/footer.php" ?>
</body>
</html>



