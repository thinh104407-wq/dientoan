<?php 
include('conn.php'); 
?>
<!DOCTYPE html>
<html lang="vi">
<head>
<meta charset="UTF-8">
<title>Shop quần áo</title>
<style>
body { font-family: Arial; background:#f5f5f5; }
.container { width: 1000px; margin: 0 auto; }
.header { display:flex; justify-content:space-between; padding:15px 0; }
.products { display:grid; grid-template-columns:repeat(3, 1fr); gap:20px; }
.card { background:white; padding:10px; border-radius:12px; text-align:center; box-shadow:0 5px 20px rgba(0,0,0,.05); }
img { width:100%; border-radius:12px; }
.btn { padding:8px 12px; background:#2563eb; color:white; text-decoration:none; border-radius:8px; display:inline-block; }
.price { color:#e11d48; font-weight:bold; }
</style>
</head>
<body>

<div class="container">
    <div class="header">
        <h2>👕 Shop quần áo</h2>
        <a class="btn" href="cart.php">🛒 Giỏ hàng</a>
    </div>

    <div class="products">
        <?php
            // lấy dữ liệu từ bảng quan_ao
            $sql = "SELECT * FROM quanao";
            $stmt = $con->query($sql);

            while ($p = $stmt->fetch(PDO::FETCH_ASSOC)):
        ?>
            <div class="card">
                <img src="<?= $p['image'] ?>">
                <h3><?= $p['name'] ?></h3>
                <p class="price"><?= number_format($p['price']) ?> đ</p>
                <a class="btn" href="product.php?id=<?= $p['id'] ?>">Xem chi tiết</a>
            </div>
        <?php endwhile; ?>
    </div>
</div>

</body>
</html>
