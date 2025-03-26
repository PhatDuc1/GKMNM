<?php
include 'includes/header.php';
include 'config.php';

// Lấy danh sách học phần
$sql_hocphan = "SELECT * FROM hocphan";
$result_hocphan = $conn->query($sql_hocphan);

// Xử lý đăng ký học phần
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $MaSV = $_POST['MaSV'];
    $MaHPs = $_POST['MaHP']; // Mảng các học phần sinh viên chọn

    // Kiểm tra sinh viên có tồn tại không
    $check_sv = "SELECT * FROM sinhvien WHERE MaSV = '$MaSV'";
    $result_sv = $conn->query($check_sv);
    
    if ($result_sv->num_rows > 0) {
        // Thêm vào bảng Đăng Ký
        $sql_dangky = "INSERT INTO dangky (NgayDK, MaSV) VALUES (NOW(), '$MaSV')";
        if ($conn->query($sql_dangky) === TRUE) {
            $MaDK = $conn->insert_id; // Lấy ID đăng ký mới nhất

            // Thêm vào bảng Chi Tiết Đăng Ký
            foreach ($MaHPs as $MaHP) {
                $sql_ctdk = "INSERT INTO chitietdangky (MaDK, MaHP) VALUES ('$MaDK', '$MaHP')";
                $conn->query($sql_ctdk);
            }

            echo "<p class='success-message'>Đăng ký học phần thành công!</p>";
        } else {
            echo "<p class='error-message'>Lỗi khi đăng ký: " . $conn->error . "</p>";
        }
    } else {
        echo "<p class='error-message'>Mã sinh viên không tồn tại!</p>";
    }
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng Ký Học Phần</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
        }
        .container {
            max-width: 600px;
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
        input[type="text"], select {
            width: 100%;
            padding: 8px;
            margin-top: 5px;
            border-radius: 4px;
            border: 1px solid #ccc;
        }
        .checkbox-group {
            background: #eef;
            padding: 10px;
            border-radius: 5px;
            margin-top: 10px;
        }
        .checkbox-group input {
            margin-right: 5px;
        }
        .btn-submit {
            background-color: #007bff;
            color: white;
            border: none;
            padding: 10px;
            margin-top: 15px;
            cursor: pointer;
            width: 100%;
            border-radius: 4px;
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
    <h2>Đăng Ký Học Phần</h2>
    <form method="POST">
        <label for="MaSV">Mã Sinh Viên:</label>
        <input type="text" id="MaSV" name="MaSV" required>

        <label>Chọn Học Phần:</label>
        <div class="checkbox-group">
            <?php while ($row = $result_hocphan->fetch_assoc()) { ?>
                <label>
                    <input type="checkbox" name="MaHP[]" value="<?php echo $row['MaHP']; ?>">
                    <?php echo $row['TenHP']; ?> (<?php echo $row['SoTinChi']; ?> tín chỉ)
                </label><br>
            <?php } ?>
        </div>

        <input type="submit" value="Đăng Ký" class="btn-submit">
    </form>
    <a href="index.php" class="btn-back">Quay về Trang Chủ</a>
</div>

</body>
</html>

<?php
include 'includes/footer.php';
?>
