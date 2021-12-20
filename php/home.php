<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Мой интернет магазин</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="/DZ_PHP_015/CSS/style.css" rel="stylesheet"/>

</head>
<body>
    <?php require "blocks/header.php" ?>

    <div class="container d-flex flex-row">
        <div class="d-flex flex-column flex-shrink-0 p-3 text-white bg-dark" style="width: 280px;">
            <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
                <svg class="bi me-2" width="40" height="32"><use xlink:href="#bootstrap"></use></svg>
                <span class="fs-4">Категории</span>
            </a>
            <hr>
            <ul class="nav nav-pills flex-column mb-auto">
                <?php
                $mysqli = mysqli_connect('127.0.0.1:3306', 'Sem', 'qwerty123', 'bd_online_store');
                $query = 'SELECT * FROM categories';
                $categories = $mysqli->query($query);
                foreach ($categories as $category):
                    ?>
                <li class="nav-item">
                    <a href="home.php?category=<?php print $category['name'] ?>" class="nav-link text-white" aria-current="page">
<!--                    <svg class="bi me-2" width="16" height="16"><use xlink:href="#home"></use></svg>-->
                        <?php print $category['name'] ?>
                    </a>
                </li>
                <?php endforeach; ?>
            </ul>
        </div>

        <div class="d-flex flex-column">
            <h3 class="md-5 align-self-center">Контент</h3>
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                <?php
                    $mysqli = mysqli_connect('127.0.0.1:3306', 'Sem', 'qwerty123', 'bd_online_store');
                    $query = 'SELECT * FROM products';
                    $products = $mysqli->query($query);
                    foreach ($products as $product):
                        if (isset($_GET['category']) and $product['categories_id'] !=
                            mysqli_fetch_assoc(mysqli_query($mysqli, 'SELECT id FROM categories WHERE name="'.$_GET['category'].'" LIMIT 1'))['id'])
                            continue;
                ?>
                <div class="col">
                    <div class="card shadow-sm">
                        <img class="img-fluid" src="<?php print $product['link_to_photo']?>">

                        <div class="card-body">
                            <p class="h5 card-title"><?php print $product['title']?></p>
                            <p class="h4">Цена: <?php print $product['price']?></p>
                            <p class="card-text"><?php print $product['description']?></p>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="btn-group">
                                    <form action="/DZ_PHP_015/php/ordering.php" method="post">
                                        <input style="display: none;" type="text" name="product_id" value="<?php print $product['id']?>">
                                        <input class="btn btn-sm btn-outline-secondary" type="submit"value="Купить">
                                    </form>
                                    <form action="/DZ_PHP_015/php/check_add_to_baskets.php" method="post">
                                        <input style="display: none;" type="text" name="product_id" value="<?php print $product['id']?>">
                                        <input style="display: none;" type="text" name="url" value="<?php print $_SERVER['REQUEST_URI']?>">
                                        <input class="btn btn-sm btn-outline-secondary" type="submit" name="submit" value="В корзину">
                                    </form>
                                </div>
                                <small class="text-muted">Осталось: <?php print $product['number']?></small>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>



    <?php require "blocks/footer.php" ?>
</body>
</html>