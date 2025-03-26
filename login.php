<?php
session_start();
include 'config.php';

// Xử lý khi form đăng nhập được submit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $MaSV = $_POST['MaSV'];

    // Kiểm tra xem MaSV có tồn tại không
    $sql = "SELECT * FROM SinhVien WHERE MaSV = '$MaSV'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $_SESSION['MaSV'] = $MaSV; // Lưu session
        header("Location: index.php"); // Chuyển hướng sau khi đăng nhập thành công
        exit();
    } else {
        $error = "Mã sinh viên không tồn tại!";
    }
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng Nhập</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .login-container {
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center;
            width: 300px;
        }
        h2 {
            color: #333;
        }
        input[type="text"], input[type="submit"] {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        input[type="submit"] {
            background-color: #007bff;
            color: white;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #0056b3;
        }
        .btn-back {
            display: block;
            text-decoration: none;
            background-color: #6c757d;
            color: white;
            padding: 10px;
            border-radius: 5px;
            margin-top: 10px;
        }
        .btn-back:hover {
            background-color: #5a6268;
        }
        .error-message {
            color: red;
            margin-top: 10px;
        }
    </style>
</head>
<body>

<div class="login-container">
    <h2>Đăng Nhập</h2>
    <form method="POST">
        <label for="MaSV">Mã Sinh Viên:</label>
        <input type="text" id="MaSV" name="MaSV" required>
        <input type="submit" value="Đăng Nhập">
    </form>
    <a href="index.php" class="btn-back">Quay về Trang Chủ</a>
    <?php if (isset($error)) { echo "<p class='error-message'>$error</p>"; } ?>
</div>

</body>
</html>
