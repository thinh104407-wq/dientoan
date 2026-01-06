<?php
session_start();
include('conn.php');

$cart = $_SESSION['cart'] ?? [];
?>
<!DOCTYPE html>
<html lang="vi">
<head>
<meta charset="UTF-8">
<title>Giỏ hàng</title>
</head>
<body>

<h2>🛒 Giỏ hàng</h2>
<a href="index.php">← Tiếp tục mua</a>

<?php if (!$cart): ?>
    <p>Giỏ hàng trống.</p>
<?php else: ?>
    <ul>
        <?php 
        $total = 0;
        foreach ($cart as $id => $qty):
            $p = $products[$id];
            $money = $p['price'] * $qty;
            $total += $money;
        ?>
        <li>
            <?= $p['name'] ?> — <?= $qty ?> x <?= number_format($p['price']) ?> đ
            = <strong><?= number_format($money) ?> đ</strong>
        </li>
        <?php endforeach; ?>
    </ul>

    <h3>Tổng: <?= number_format($total) ?> đ</h3>
<?php endif; ?>

</body>
</html>
