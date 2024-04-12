<?php
session_start();

// Thiết lập kết nối cơ sở dữ liệu
$connect = mysqli_connect('localhost', 'root', '', 'website_music');
if (!$connect) {
    die("Kết nối thất bại: " . mysqli_connect_error());
}

// Kiểm tra xem người dùng đã đăng nhập chưa, nếu chưa thì chuyển hướng đến trang đăng nhập
if (!isset($_SESSION['user_id'])) {
    header("Location: cart.php");
    exit;
}

// Lấy song_id từ yêu cầu POST
if (isset($_POST['song_id'])) {
    $song_id = $_POST['song_id'];
} else {
    echo "Lỗi: Không có ID bài hát được cung cấp.";
    exit;
}

// Thêm vào bảng Cart
$date_added = date('Y-m-d');
$user_id = $_SESSION['user_id'];
$sql_insert_cart = "INSERT INTO Cart (user_id, song_id, dateAdded) VALUES ('$user_id', '$song_id', '$date_added')";
if (mysqli_query($connect, $sql_insert_cart)) {
    echo "<script>alert('Bài hát đã được thêm vào giỏ hàng thành công!')</script>";
    echo "<script>window.open('cart.php','_self')</script>"; // Chuyển hướng đến trang giỏ hàng sau khi thêm mục
    exit;
} else {
    echo "Lỗi: " . $sql_insert_cart . "<br>" . mysqli_error($connect);
    exit;
}

mysqli_close($connect);
?>
