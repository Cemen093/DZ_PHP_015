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

// Вытаскиваем из БД запись, у которой логин равняеться введенному
$query = mysqli_query($link,'SELECT * FROM users WHERE login="'.mysqli_real_escape_string($link,$_POST['login']).'" LIMIT 1');
$data = mysqli_fetch_assoc($query);

// Сравниваем пароли
if($data['password'] === md5(md5($_POST['password']))){
    $_SESSION['id'] = $data['id'];
    $_SESSION['login'] = $data['login'];
    $_SESSION['email'] = $data['email'];
    $_SESSION['name'] = $data['name'];
    $_SESSION['surname'] = $data['surname'];
    $_SESSION['phone'] = $data['phone'];
}else {
    echo '<b>При заполнении формы произошли следующие ошибки:</b><br>';
    echo 'Вы ввели неправильный логин/пароль';
    echo '<a href="/DZ_PHP_015/php/login.php">login</a>';
    exit();
}


header('Location: /DZ_PHP_015/php/account.php'); exit();
