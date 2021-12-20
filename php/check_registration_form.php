<?php
if (session_status() != PHP_SESSION_ACTIVE){ session_start(); }

if (isset($_SESSION['id'])){
    header('Location: /DZ_PHP_015/php/home.php'); exit();
}

if (empty($_POST['submit'])){
    header('Location: /DZ_PHP_015/php/home.php'); exit();
}

// Соединямся с БД
$link=mysqli_connect('127.0.0.1:3306', 'Sem', 'qwerty123', 'bd_online_store');
$err = [];

// проверям логин
if (!preg_match('/^[a-zA-Z0-9]+$/',$_POST['login'])){
    $err[] = 'Логин может состоять только из букв английского алфавита и цифр';
}
if (strlen($_POST['login']) < 2 or strlen($_POST['login']) > 30){
    $err[] = 'Логин должен быть не меньше 2-х символов и не больше 30';
}

// проверям пароль
if (!preg_match('/^[a-zA-Z0-9]+$/',$_POST['password'])){
    $err[] = 'Пароль может состоять только из букв английского алфавита и цифр';
}
if (strlen($_POST['password']) < 7 or strlen($_POST['password']) > 30){
    $err[] = 'Пароль должен быть не меньше 7-х символов и не больше 30';
}
if ($_POST['password'] != $_POST['password_repeat']){
    $err[] = 'Пароль не совпадает';
}

// проверяем, не сущестует ли пользователя с таким именем
$query = mysqli_query($link, 'SELECT id FROM users WHERE login="'.mysqli_real_escape_string($link, $_POST['login']).'"');
if(mysqli_num_rows($query) > 0){
    $err[] = 'Пользователь с таким логином уже существует в базе данных';
}

// проверяем, не сущестует ли пользователя с таким email
$query = mysqli_query($link, 'SELECT id FROM users WHERE email="'.mysqli_real_escape_string($link, $_POST['email']).'"');
if(mysqli_num_rows($query) > 0){
    $err[] = 'Пользователь с таким email уже существует в базе данных';
}

if(count($err) > 0){
    echo '<b>При заполнении формы произошли следующие ошибки:</b><br>';
    foreach($err AS $error)
    {
        print $error.'<br>';
    }
    echo '<a href="/DZ_PHP_015/php/home.php"/>';
    exit();
}

$email = $_POST['email'];
$login = $_POST['login'];
$password = md5(md5(trim($_POST['password'])));

mysqli_query($link,'INSERT INTO users SET login="'.$login.'", password="'.$password.'", email="'.$email.'"');
header('Location: /DZ_PHP_015/php/login.php'); exit();
