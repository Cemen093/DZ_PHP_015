<?php
if (session_status() != PHP_SESSION_ACTIVE){ session_start(); }
if (empty($_SESSION['login'])){
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
    <title>Акаунт пользователя</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="/DZ_PHP_015/CSS/style.css" rel="stylesheet"/>

</head>
<body>
<?php require "blocks/header.php" ?>

<div class="container mt-5">
    <h3>Информация о пользователе</h3>
    <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
        <div class="col-auto d-none d-lg-block">
            <img class="bd-placeholder-img" width="200" height="250" src="/DZ_PHP_015/image/avatar.jpg">
        </div>
        <div class="col p-4 d-flex flex-column position-static">
            <h3 class="mb-0">Информация о пользователе</h3>
            <p class="card-text mb-auto">Логин: <?php print$_SESSION['login'] ?></p>
            <p class="card-text mb-auto">Email: <?php print $_SESSION['email'] ?></p>
            <p class="card-text mb-auto">Имя: <?php print $_SESSION['name'] ?></p>
            <p class="card-text mb-auto">Фамилия: <?php print $_SESSION['surname'] ?></p>
            <p class="card-text mb-auto">Телефон: <?php print $_SESSION['phone'] ?></p>

            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalSignin">Редактировать профиль</button>
        </div>
    </div>

    <div>
        <div class="modal fade" id="modalSignin" tabindex="-1" aria-labelledby="modalSignin" style="display: none;" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content rounded-5 shadow">
                    <div class="modal-header p-5 pb-4 border-bottom-0">
                        <!-- <h5 class="modal-title">Modal title</h5> -->
                        <h2 class="fw-bold mb-0"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Введите новые данные</font></font></h2>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Закрывать"></button>
                    </div>

                    <div class="modal-body p-5 pt-0">
                        <form action="/DZ_PHP_015/php/check_edit_profille.php" method="post">

                            <div class="form-floating mb-3">
                                <input type="text" class="form-control rounded-4" id="floatingLogin" name="login" placeholder="Login">
                                <label for="floatingLogin"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Логин</font></font></label>
                            </div>

                            <div class="form-floating mb-3">
                                <input type="text" class="form-control rounded-4" id="floatingEmail" name="email" placeholder="name@example.com">
                                <label for="floatingEmail"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Почта</font></font></label>
                            </div>

                            <div class="form-floating mb-3">
                                <input type="password" class="form-control rounded-4" id="floatingPassword" name="password" placeholder="Пароль">
                                <label for="floatingPassword"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Пароль</font></font></label>
                            </div>

                            <div class="form-floating mb-3">
                                <input type="password" class="form-control rounded-4" id="floatingPasswordRepeat" name="password_repeat" placeholder="PasswordRepeat">
                                <label for="floatingPasswordRepeat"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Повторите пароль</font></font></label>
                            </div>

                            <div class="form-floating mb-3">
                                <input type="text" class="form-control rounded-4" id="floatingName" name="name" placeholder="Name">
                                <label for="floatingName"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Имя</font></font></label>
                            </div>

                            <div class="form-floating mb-3">
                                <input type="text" class="form-control rounded-4" id="floatingSurname" name="surname" placeholder="Surname">
                                <label for="floatingSurname"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Фамилия</font></font></label>
                            </div>

                            <div class="form-floating mb-3">
                                <input type="text" class="form-control rounded-4" id="floatingPhone" name="phone" placeholder="Phone">
                                <label for="floatingPhone"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Номер телефона</font></font></label>
                            </div>

                            <small class="text-muted"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
                                        Пустые поля обновлятся не будут.
                                    </font></font></small>
                            <input class="w-100 mb-2 btn btn-lg rounded-4 btn-primary" type="submit" name="submit" value="Редактировать">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php require "blocks/footer.php" ?>
</body>
</html>