<?php 
require_once APP_ROOT . '/view/partials/header.php' 
?>
<title> Cart | <?= SITE_TITLE ?></title>

<body>
<?php
require_once APP_ROOT . '/view/partials/nav.php';

// Retrieve the cart data from the cookie
$cart = isset($_COOKIE['cart']) ? unserialize($_COOKIE['cart']) : [];

if (!empty($cart)) {
    $total = 0;

    foreach ($cart as $productId => $product) {
        $subTotal = $product['price'] * $product['quantity'];
        $total += $subTotal;

        echo '<div class="cart-item">';
        echo '<img src="'.$product['coverpage'].'" alt="'.$product['coverpage'].'" width="50" height="50">';
        echo 'Item: ' . $productId . '<br>';
        echo 'Subject: ' . $product['subject'] . '<br>';
        echo 'Exam Body: ' . $product['exam_body'] . '<br>';
        echo 'Year: ' . $product['year'] . '<br>';
        echo 'Price: ' . $product['price'] . '<br>';
        echo 'Quantity: ' . $product['quantity'] . '<br>';
        echo 'Sub-Total: ' . $subTotal . '<br>';
        echo '<form action="cart" method="POST">';
        echo '<input type="hidden" name="sku" value="' . $productId . '">';
        echo '<button type="submit" name="action" value="increase">Increase</button>';
        echo '<button type="submit" name="action" value="decrease">Decrease</button>';
        echo '<button type="submit" name="action" value="delete">Delete</button>';
        echo '</form>';
        echo '<hr>';
        echo '</div>';
    }

    echo 'Total: ' . $total . '<br>';
    echo '<form action="cart" method="POST">';
    echo '<button type="submit" name="action" value="clear">Clear Cart</button>';
    echo '</form>';
} else {
    echo 'Cart is empty.';
}
?>
</body>
