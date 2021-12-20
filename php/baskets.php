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
    <title>Оформление заказа</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="/DZ_PHP_015/CSS/style.css" rel="stylesheet"/>
</head>
<body>
<?php require "blocks/header.php" ?>

<div class="container">
    <div class="bd-example">
        <table class="table table-dark table-borderless">
            <p class="h2 bg-dark fw-bold mb-0 text-white text-center">Список товаров</p>
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Название</th>
                <th scope="col">Цена</th>
            </tr>
            </thead>
            <tbody>
            <?php
            $mysqli = mysqli_connect('127.0.0.1:3306', 'Sem', 'qwerty123', 'bd_online_store');
            $query = 'SELECT products_id FROM baskets WHERE users_id="'.$_SESSION['id'].'"';
            $product_ids = $mysqli->query($query)->fetch_all();
            foreach ($product_ids as $key => $product_id){
                $product_ids[$key] = $product_id[0];
            }
            $product = $mysqli->query('SELECT * FROM products WHERE id IN ('.implode(",", $product_ids).')');

            $total = 0;
            foreach ($product as $key => $product):
                $total += $product['price'];
            ?>
            <tr>
                <th scope="row"><?php print $key + 1 ?></th>
                <td><?php print $product['title'] ?></td>
                <td><?php print $product['price'] ?></td>
            </tr>
            <?php endforeach; ?>
            <tr>
                <th scope="row">#</th>
                <td>Total</td>
                <td><?php print $total ?></td>
            </tr>
            <tr>
                <th scope="row"></th>
                <td></td>
                <td>
                    <a type="button" class="btn btn-outline-light" href="/DZ_PHP_015/php/ordering.php">Купить</a>
                </td>
            </tr>
            </tbody>
        </table>
    </div>
</div>

<?php require "blocks/footer.php" ?>
</body>
</html>