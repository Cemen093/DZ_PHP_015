<?php

if (!isset($_POST['email']) || !isset($_POST['message'])){
    echo !isset($_POST['email']);
    echo !isset($_POST['message']);
    header("Location: /DZ_PHP_015/php/about.php"); exit();
}

$email = trim($_POST['email']);
$message = trim($_POST['message']);

$errors = [];

if ($email == ''){
    $errors[] = "email пустой";
}
if ($message == ''){
    $errors[] = 'Сообщение пустое';
}
if (strlen($message) < 10){
    $errors[] = 'Сообщение должно бодержать больше 10 символов';
}

if (count($errors) > 0){
    echo "<b>При заполнении формы произошли следующие ошибки:</b><br>";
    foreach($errors AS $error)
    {
        echo $error."<br>";
    }
    echo '<a href="/DZ_PHP_015/php/home.php"/>';
    exit();
}

$subject = "=?utf-8?B?".base64_encode("Сообщение с сайта 'Мой интернет магазин'");
$headers = "Form: $email\r\nReply-to: $email\r\nContent-type: text/html;charset=utf-8\r\n";
mail('Semyonp93@gmail.com', $subject, $message, $headers);

header("Location: /DZ_PHP_015/php/about.php"); exit();
