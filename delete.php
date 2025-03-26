<?php
include 'config.php';

// Kiểm tra ID hợp lệ
if (!isset($_GET['id']) || empty($_GET['id'])) {
    die("Lỗi: Không tìm thấy Mã Sinh Viên");
}

$MaSV = $_GET['id'];

// Xóa dữ liệu liên quan trước
$conn->query("DELETE FROM ChiTietDangKy WHERE MaDK IN (SELECT MaDK FROM DangKy WHERE MaSV='$MaSV')");
$conn->query("DELETE FROM DangKy WHERE MaSV='$MaSV'");

// Xóa sinh viên
$sql = "DELETE FROM sinhvien WHERE MaSV='$MaSV'";
if ($conn->query($sql) === TRUE) {
    echo "Xóa thành công";
} else {
    echo "Lỗi: " . $conn->error;
}

// Điều hướng về trang chủ
header("Location: index.php");
exit();
?>
