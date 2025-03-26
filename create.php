<?php
include 'includes/header.php';
include 'config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $MaSV = $_POST['MaSV'];
    $HoTen = $_POST['HoTen'];
    $GioiTinh = $_POST['GioiTinh'];
    $NgaySinh = $_POST['NgaySinh'];
    $MaNganh = $_POST['MaNganh'];
    $Hinh = $_FILES['Hinh']['name'];
    $target = "uploads/" . basename($Hinh);

    $sql = "INSERT INTO sinhvien (MaSV, HoTen, GioiTinh, NgaySinh, Hinh, MaNganh) VALUES ('$MaSV', '$HoTen', '$GioiTinh', '$NgaySinh', '$Hinh', '$MaNganh')";

    if ($conn->query($sql) === TRUE) {
        move_uploaded_file($_FILES['Hinh']['tmp_name'], $target);
        echo "<p class='success-message'>Thêm sinh viên thành công!</p>";
    } else {
        echo "<p class='error-message'>Lỗi: " . $conn->error . "</p>";
    }
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm Sinh Viên</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
        }
        .container {
            max-width: 500px;
            background: white;
            padding: 20px;
            margin: 0 auto;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h2 {
            text-align: center;
            color: #333;
        }
        label {
            font-weight: bold;
            display: block;
            margin-top: 10px;
        }
        input, select {
            width: 100%;
            padding: 8px;
            margin-top: 5px;
            border-radius: 4px;
            border: 1px solid #ccc;
        }
        .btn-submit {
            background-color: #007bff;
            color: white;
            border: none;
            padding: 10px;
            margin-top: 15px;
            cursor: pointer;
            width: 100%;
        }
        .btn-submit:hover {
            background-color: #0056b3;
        }
        .btn-back {
            display: block;
            text-align: center;
            margin-top: 10px;
            color: #007bff;
            text-decoration: none;
        }
        .success-message {
            color: green;
            text-align: center;
        }
        .error-message {
            color: red;
            text-align: center;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Thêm Sinh Viên</h2>
    <form method="post" enctype="multipart/form-data">
        <label for="MaSV">Mã Sinh Viên:</label>
        <input type="text" id="MaSV" name="MaSV" required>

        <label for="HoTen">Họ và Tên:</label>
        <input type="text" id="HoTen" name="HoTen" required>

        <label for="GioiTinh">Giới Tính:</label>
        <select id="GioiTinh" name="GioiTinh" required>
            <option value="Nam">Nam</option>
            <option value="Nữ">Nữ</option>
        </select>

        <label for="NgaySinh">Ngày Sinh:</label>
        <input type="date" id="NgaySinh" name="NgaySinh" required>

        <label for="Hinh">Hình Ảnh:</label>
        <input type="file" id="Hinh" name="Hinh" required>

        <label for="MaNganh">Mã Ngành:</label>
        <input type="text" id="MaNganh" name="MaNganh" required>

        <input type="submit" value="Thêm Sinh Viên" class="btn-submit">
    </form>
    <a href="index.php" class="btn-back">Quay về Trang Chủ</a>
</div>

</body>
</html>

<?php
include 'includes/footer.php';
?>
