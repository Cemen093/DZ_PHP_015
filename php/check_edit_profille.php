<?php
if (session_status() != PHP_SESSION_ACTIVE){ session_start(); }

if (empty($_SESSION['id'])){
    header('Location: /DZ_PHP_015/php/home.php'); exit();
}

if (empty($_POST['submit'])){
    header('Location: /DZ_PHP_015/php/home.php'); exit();
}

$link=mysqli_connect('127.0.0.1:3306', 'Sem', 'qwerty123', 'bd_online_store');
$err = [];

// проверям логин
if ($_POST['login'] != '') {
    if (!preg_match('/^[a-zA-Z0-9]+$/', $_POST['login'])) {
        $err[] = 'Логин может состоять только из букв английского алфавита и цифр';
    }
    if (strlen($_POST['login']) < 2 or strlen($_POST['login']) > 30) {
        $err[] = 'Логин должен быть не меньше 2-х символов и не больше 30';
    }
}

// проверям пароль
if ($_POST['password'] != '') {
    if (!preg_match('/^[a-zA-Z0-9]+$/', $_POST['password'])) {
        $err[] = 'Пароль может состоять только из букв английского алфавита и цифр';
    }
    if (strlen($_POST['password']) < 7 or strlen($_POST['password']) > 30) {
        $err[] = 'Пароль должен быть не меньше 7-х символов и не больше 30';
    }
    if ($_POST['password'] != $_POST['password_repeat']) {
        $err[] = 'Пароль не совпадает';
    }
}

// проверяем email
if ($_POST['email'] != '') {
    if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        $err[] = 'Email введен не корректно';
    }
}

// проверяем имя
if ($_POST['name'] != '') {
    if (strlen($_POST['name']) < 2 or strlen($_POST['name']) > 30) {
        $err[] = 'Имя должено быть не меньше 2-х символов и не больше 30';
    }
}

// проверяем фамилию
if ($_POST['surname'] != '') {
    if (strlen($_POST['surname']) < 2 or strlen($_POST['surname']) > 30) {
        $err[] = 'Имя должено быть не меньше 2-х символов и не больше 30';
    }
}

// проверяем телефон
if ($_POST['phone'] != '') {
    if (!preg_match('/^[0-9]{3}-[0-9]{3}-[0-9]{2}-[0-9]{2}$/', $_POST['phone'])) {
        $err[] = 'Телефон введен не корректно';
    }
}

if(count($err) > 0){
    echo '<b>При заполнении формы произошли следующие ошибки:</b><br>';
    foreach($err AS $error)
    {
        print $error.'<br>';
    }
    echo '<a href="/DZ_PHP_015/php/account.php">account</a>';
    exit();
}

if ($_POST['login'] != '')
    mysqli_query($link,'UPDATE users SET login="'.$_POST['login'].'" WHERE id="'.$_SESSION['id'].'";');
if ($_POST['email'] != '')
    mysqli_query($link,'UPDATE users SET email="'.$_POST['email'].'" WHERE id="'.$_SESSION['id'].'";');
if ($_POST['password'] != '')
    mysqli_query($link,'UPDATE users SET password="'.md5(md5(trim($_POST['password']))).'" WHERE id="'.$_SESSION['id'].'";');
if ($_POST['name'] != '')
    mysqli_query($link,'UPDATE users SET name="'.$_POST['name'].'" WHERE id="'.$_SESSION['id'].'";');
if ($_POST['surname'] != '')
    mysqli_query($link,'UPDATE users SET surname="'.$_POST['surname'].'" WHERE id="'.$_SESSION['id'].'";');
if ($_POST['phone'] != '')
    mysqli_query($link,'UPDATE users SET phone="'.$_POST['phone'].'" WHERE id="'.$_SESSION['id'].'";');

$query = mysqli_query($link,'SELECT * FROM users WHERE id="'.mysqli_real_escape_string($link,$_SESSION['id']).'" LIMIT 1');
$data = mysqli_fetch_assoc($query);
$_SESSION['login'] = $data['login'];
$_SESSION['email'] = $data['email'];
$_SESSION['name'] = $data['name'];
$_SESSION['surname'] = $data['surname'];
$_SESSION['phone'] = $data['phone'];

header('Location: /DZ_PHP_015/php/account.php'); exit();