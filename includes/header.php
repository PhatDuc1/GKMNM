<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản Lý Sinh Viên</title>
    <link rel="stylesheet" href="assets/css/styles.css">
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
        }
        header {
            background-color: #007bff;
            color: white;
            padding: 15px 0;
            text-align: center;
        }
        nav {
            display: flex;
            justify-content: center;
            background: #0056b3;
            padding: 10px 0;
        }
        nav a {
            color: white;
            text-decoration: none;
            padding: 12px 20px;
            margin: 0 10px;
            font-weight: bold;
            border-radius: 5px;
            transition: background 0.3s;
        }
        nav a:hover {
            background: #003d80;
        }
        .container {
            width: 80%;
            margin: auto;
            padding: 20px;
            background: white;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            border-radius: 5px;q
            margin-top: 20px;
        }
    </style>
</head>
<body>

<header>
    <h1>Hệ Thống Quản Lý Sinh Viên</h1>
</header>

<nav>
    <a href="index.php">🏠 Trang chủ</a>
    <a href="create.php">➕ Thêm Sinh Viên</a>
    <a href="dangki_hocphan.php">📚 Đăng Ký Học Phần</a>
    <a href="hocphan_dadangki.php">📖 Học Phần Đã Đăng Ký</a>
    <a href="login.php">🔑 Đăng Nhập</a>
</nav>

<div class="container">
