<?php if (session_status() != PHP_SESSION_ACTIVE){ session_start(); } ?>
<div class="container">
    <header class="p-3 bg-dark text-white">
        <div class="container">
            <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
                <a href="/DZ_PHP_015/php/home.php" class="d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none">
                    <img width="32" height="32" src="/DZ_PHP_015/image/icon.png"></img>
                </a>

                <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                    <li><a href="/DZ_PHP_015/php/home.php" class="nav-link px-2 text-secondary">Home</a></li>
<!--                    <li><a href="#" class="nav-link px-2 text-white">Features</a></li>-->
<!--                    <li><a href="#" class="nav-link px-2 text-white">Pricing</a></li>-->
<!--                    <li><a href="#" class="nav-link px-2 text-white">FAQs</a></li>-->
                    <li><a href="/DZ_PHP_015/php/about.php" class="nav-link px-2 text-white">About</a></li>
                </ul>

                <form class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3">
                    <input type="search" class="form-control form-control-dark" placeholder="Search..." aria-label="Search">
                </form>

                <div class="text-end">
                    <?php if(empty($_SESSION['id'])): ?>
                    <a type="button" class="btn btn-outline-light me-2" href="/DZ_PHP_015/php/login.php">Login</a>
                    <a type="button" class="btn btn-warning" href="/DZ_PHP_015/php/registration.php">Sign-up</a>
                    <?php else: ?>
                    <a type="button" class="px-2 text-white" href="/DZ_PHP_015/php/account.php"><?php print($_SESSION['login']) ?></a>
                    <a type="button" class="btn btn-outline-light me-2" href="/DZ_PHP_015/php/logout.php">Logout</a>

                    <a type="button" class="text-light" href="/DZ_PHP_015/php/baskets.php">
                        <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="currentColor" class="bi bi-basket" viewBox="0 0 16 16">
                            <path d="M5.757 1.071a.5.5 0 0 1 .172.686L3.383 6h9.234L10.07 1.757a.5.5 0 1 1 .858-.514L13.783 6H15a1 1 0 0 1 1 1v1a1 1 0 0 1-1 1v4.5a2.5 2.5 0 0 1-2.5 2.5h-9A2.5 2.5 0 0 1 1 13.5V9a1 1 0 0 1-1-1V7a1 1 0 0 1 1-1h1.217L5.07 1.243a.5.5 0 0 1 .686-.172zM2 9v4.5A1.5 1.5 0 0 0 3.5 15h9a1.5 1.5 0 0 0 1.5-1.5V9H2zM1 7v1h14V7H1zm3 3a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-1 0v-3A.5.5 0 0 1 4 10zm2 0a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-1 0v-3A.5.5 0 0 1 6 10zm2 0a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-1 0v-3A.5.5 0 0 1 8 10zm2 0a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-1 0v-3a.5.5 0 0 1 .5-.5zm2 0a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-1 0v-3a.5.5 0 0 1 .5-.5z"/>
                        </svg>
                    </a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </header>
</div>
