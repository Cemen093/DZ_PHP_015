<?php
session_start();
session_destroy();

header('Location: /DZ_PHP_015/php/home.php'); exit();