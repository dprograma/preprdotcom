<?php
$cart_count = 0;
if (isset($_COOKIE['cart'])) {
    // Unserialize the cart data from the cookie
    $carts = unserialize($_COOKIE['cart']);
    foreach ($carts as $key => $cart) {
        $cart_count = $cart_count + $cart['quantity'];
    }
}
$currentUser = toJson($pdo->select("SELECT * FROM users WHERE id=?", [Session::get('loggedin')])->fetch(PDO::FETCH_ASSOC));

$dashboard = 'dashboard';
if (!empty($currentUser)) {
    if ($currentUser->access == 'admin') {
        $dashboard = 'admin-dashboard';
    } elseif ($currentUser->access == 'secured' && $currentUser->is_agent) {
        $dashboard = 'agent-dashboard';
    }
}

?>
<nav class="navbar navbar-expand-lg navbar-dark bg-nav px-0 py-3">
    <div class="container-xl max-w-screen-xl">
        <!-- Logo -->
        <a class="navbar-brand" href="home">
            <img src="<?= LOGO ?>" class="h-8" alt="logo">
        </a>
        <!-- Mobile Navbar toggle -->
        <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#mobileNavbarRight"
            aria-controls="mobileNavbarRight" aria-expanded="false" aria-label="Toggle navigation"
            style="background-color: transparent;">
            <span class="navbar-toggler-icon"></span>
        </button>
        <!-- Collapse for Desktop -->
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <!-- Nav -->
            <ul class="navbar-nav mx-lg-auto">
                <li class="nav-item">
                    <a class="nav-link" href="home">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#contact">Contact</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#about">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="news">News</a>
                </li>
                <li class="nav-item py-2">
                    <form action="agent" method="post">
                        <input type="hidden" name="new-agent" value="yes" />
                        <button class="nav-link bg-danger px-2 py-2">Become an Agent</button>
                    </form>
                </li>

            </ul>





            <!-- Right navigation -->
            <div class="navbar-nav ms-lg-4">
                <a class="nav-item nav-link" href="cart"><img src="<?= CART ?>" class="h-8" /></a>
                <?php if ($cart_count > 0): ?>
                    <span class="text-center"
                        style="color:brown; font-size: 14px; line-height: 18px; background-color: yellow; width: 18px; height: 18px; border-radius: 4px; transform: translate(-10px, 10px);"><?= $cart_count ?></span>
                <?php endif; ?>
            </div>
            <?php if (empty($currentUser)): ?>
                <div class="navbar-nav ms-lg-4">
                    <a class="nav-item nav-link" href="auth-login">Sign in</a>
                </div>
                <!-- Action -->
                <div class="d-flex align-items-lg-center mt-3 mt-lg-0">
                    <a href="auth-register" class="btn btn-sm btn-white w-full w-lg-auto">
                        Register
                    </a>
                </div>
            <?php else: ?>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-white" href="#" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        Hi <?= $currentUser->fullname ?>
                    </a>
                    <ul class="dropdown-menu"
                        style="360px; border-radius: 2px; transform: translate(-60px, 0px); padding-left: 10px; padding-right: 10px;">
                        <li><a class="dropdown-item" href="<?= $dashboard ?>">Dashboard</a></li>
                        <li>
                            <hr class="dropdown-divider" />
                        </li>
                        <li><a class="dropdown-item" href="logout">Logout</a></li>
                    </ul>
                </li>
            <?php endif; ?>
        </div>
    </div>
</nav>

<!-- Off-canvas for Mobile (Right) -->
<div class="offcanvas offcanvas-end" tabindex="-1" id="mobileNavbarRight" aria-labelledby="mobileNavbarRightLabel">
    <div class="offcanvas-header">
        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
        <ul class="navbar-nav position-relative">
            <li class="nav-item">
                <a class="nav-link text-white" href="home">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white" href="#contact">Contact</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white" href="#about">About</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white" href="news">News</a>
            </li>
            <li class="nav-item py-2">
                <form action="agent" method="post">
                    <input type="hidden" name="new-agent" value="yes" />
                    <button class="nav-link text-white">Become an Agent</button>
                </form>
            </li>
            <div class="navbar-nav ms-lg-4">
                <a class="nav-item nav-link" href="cart"><img src="<?= CART ?>" class="h-8" /></a>
                <?php if ($cart_count > 0): ?>
                    <span class="text-center"
                        style="color:brown; font-size: 14px; line-height: 18px; background-color: yellow; width: 18px; height: 18px; border-radius: 4px; transform: translate(45px, -40px);"><?= $cart_count ?></span>
                <?php endif; ?>
            </div>
            <?php if (empty($currentUser)): ?>
                <button type="button" class="rounded mt-3 border-nav w-100" style="margin-right:30px">
                    <a class="nav-link text-nav" href="auth-login">LOGIN</a>
                </button>
            <?php else: ?>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-white" href="#" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        Hi <?= $currentUser->fullname ?>
                    </a>
                    <ul class="dropdown-menu"
                        style="360px; border-radius: 2px; transform: translate(-60px, 0px); padding-left: 10px; padding-right: 10px;">
                        <li><a class="dropdown-item" href="<?= $dashboard ?>">Dashboard</a></li>
                        <li>
                            <hr class="dropdown-divider" />
                        </li>
                        <li><a class="dropdown-item" href="logout">Logout</a></li>
                    </ul>
                </li>
            <?php endif; ?>
        </ul>
        <img src="public/img/past-question.png" alt="" class="position-absolute bottom-20 top-70">
    </div>
</div>