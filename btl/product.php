<?php
session_start();
include('conn.php');

$id = $_GET['id'] ?? 0;
$product = $products[$id] ?? null;

if (!$product) die("Không tìm thấy sản phẩm!");

if (!isset($_SESSION['cart'])) $_SESSION['cart'] = [];

if (isset($_POST['add'])) {
    $_SESSION['cart'][$id] = ($_SESSION['cart'][$id] ?? 0) + 1;
    header("Location: cart.php");
}
?>
<!DOCTYPE html>
<html lang="vi">
<head>
<meta charset="UTF-8">
<title><?= $product['name'] ?></title>
</head>
<body>

<a href="index.php">← Quay lại</a>

<h2><?= $product['name'] ?></h2>
<img src="<?= $product['image'] ?>" width="250">
<p><?= $product['desc'] ?></p>
<p><strong><?= number_format($product['price']) ?> đ</strong></p>

<form method="post">
    <button name="add">Thêm vào giỏ</button>
</form>

</body>
</html>
