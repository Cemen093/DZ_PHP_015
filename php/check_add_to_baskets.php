<?php
if (session_status() != PHP_SESSION_ACTIVE){ session_start(); }

if (isset($_POST['product_id']) and isset($_POST['url'])){
    $mysqli = mysqli_connect('127.0.0.1:3306', 'Sem', 'qwerty123', 'bd_online_store');
    mysqli_query($mysqli,'INSERT INTO baskets SET users_id="'.$_SESSION['id'].'", products_id="'.$_POST['product_id'].'"');

    header("Location: ".$_POST['url']);
}

header("Location: /DZ_PHP_015/php/home.php");