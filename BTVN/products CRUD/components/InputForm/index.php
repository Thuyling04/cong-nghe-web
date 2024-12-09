<?php
$config = include("../../config/config.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style.css">
  <title>Quản lý</title>
</head>

<body>
  <h1>Thêm sản phẩm</h1>
  <form method="POST" action="<?= $config['actions_add']; ?>">
    <label for="product">Tên sản phẩm:</label>
    <input type="text" name="product" id="product" required><br><br>

    <label for="price">Giá:</label>
    <input type="text" name="price" id="price" required><br><br>

    <button type="submit">Thêm vào danh sách</button>
  </form>

</body>

</html>