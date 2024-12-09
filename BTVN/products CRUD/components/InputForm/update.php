<?php
$config = include("../../config/config.php");

session_start();

// Xử lý khi dữ liệu được gửi từ Fetch API
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $data = file_get_contents("php://input");
  $dataProduct = json_decode($data, true);

  // Kiểm tra dữ liệu hợp lệ
  if ($dataProduct && isset($dataProduct['product'], $dataProduct['price'])) {
    $_SESSION['dataProduct'] = $dataProduct; // Lưu dữ liệu vào session tránh th load lại trang sẽ mất data gửi lên
    echo json_encode(['status' => 200, 'message' => 'Dữ liệu đã được lưu vào session.']);
    exit;
  }

  echo json_encode(['status' => 400, 'message' => 'Dữ liệu không hợp lệ.']);
  exit;
}

// Lấy dữ liệu từ session để hiển thị trên form
$dataProduct = $_SESSION['dataProduct'] ?? null;

// Kiểm tra xem có dữ liệu người dùng hay không
if (!$dataProduct) {
  echo "Không tìm thấy thông tin người dùng.";
  exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style.css">
  <title>Chỉnh sửa sản phẩm</title>
</head>

<body>
  <h1>Chỉnh sửa người dùng</h1>
  <form method="POST" action="<?= $config['actions_update']; ?>">
    <input class="hidden" type="text" name='id' value="<?= htmlspecialchars($dataProduct['id']); ?>" />

    <label for="product">Họ và tên:</label>
    <input type="text" name="product" id="product" value="<?= htmlspecialchars($dataProduct['product']); ?>" required><br><br>

    <label for="price">Giá:</label>
    <input type="text" name="price" id="price" value="<?= htmlspecialchars($dataProduct['price']); ?>" required><br><br>

    <button type="submit">Chỉnh sửa</button>
    <a href="/btnv/index.php">Hủy</a>
  </form>
</body>

</html>