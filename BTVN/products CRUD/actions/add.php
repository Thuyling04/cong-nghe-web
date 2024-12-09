<?php
  $config = include('../config/config.php');
  $home = $config['home'];
  session_start();

  // Kiểm tra nếu chưa có session 'users' thì khởi tạo nó như mảng rỗng
  if (!isset($_SESSION['products'])) {
    $_SESSION['products'] = [];
  }

  // Lấy dữ liệu từ form
  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Tạo id tự động tăng, lấy id lớn nhất hiện tại trong session + 1
    $id = count($_SESSION['products']) > 0 ? max(array_column($_SESSION['products'], 'id')) + 1 : 1;

    // Lấy thông tin từ form
    $product = $_POST['product'];
    $price = $_POST['price'];

    // Tạo một mảng người dùng
    $user = [
      'id' => $id,
      'product' => $product,
      'price' => $price,
    ];

    // Thêm người dùng vào session thêm vào cuối mảng
    $_SESSION['products'][] = $user;

    // print_r($_SESSION['users']);

  // Điều hướng đến trang xem danh sách
    header('Location: ' . $home); 
    exit();

  //-  xóa tất cả dữ liệu trong session
  // session_destroy();
  }
?>

