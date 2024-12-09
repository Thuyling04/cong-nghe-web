<?php
$config = include('../config/config.php');
$home = $config['home'];
session_start();

//- lay du lieu tu body bằng $_PORT thì dữ liệu sẽ dc Dữ liệu này 
//- sẽ được tự động phân tích và chuyển thành mảng

// Lấy dữ liệu từ form khi POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // Lấy ID người dùng từ form
  $id = $_POST['id'];

  // Lấy thông tin chỉnh sửa từ form
  $product = $_POST['product'];
  $price = $_POST['price'];

  // Tìm người dùng trong session theo ID
  foreach ($_SESSION['products'] as &$item) {
    if ($item['id'] == $id) {
      // Cập nhật thông tin người dùng
      $item['product'] = $product;
      $item['price'] = $price;
      break; // Thoát khỏi vòng lặp sau khi cập nhật
    }
  }

  // Điều hướng đến trang chính hoặc trang xem danh sách
  header('Location: ' . $home);
  exit();
}
