<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>О нас</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="/DZ_PHP_015/CSS/style.css" rel="stylesheet"/>

</head>
<body>
<?php require "blocks/header.php" ?>

<div class="container mt-5">
    <h3>Контактная форма</h3>
    <form action="/DZ_PHP_015/php/check_contact_form.php" method="post">
        <input type="email" name="email" placeholder="Введите email" class="form-control">
        <br>
        <textarea name="message" placeholder="Введите сообщение" class="form-control"></textarea>
        <br>
        <button type="submit" name="send" class="btn btn-success">Отправить</button>
    </form>
</div>

<?php require "blocks/footer.php" ?>
</body>
</html>