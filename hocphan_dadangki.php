<?php
include 'includes/header.php';
include 'config.php';

// Truy vấn danh sách học phần đã đăng ký
$sql = "SELECT SV.MaSV, SV.HoTen, HP.MaHP, HP.TenHP, HP.SoTinChi 
        FROM ChiTietDangKy CTDK
        JOIN HocPhan HP ON CTDK.MaHP = HP.MaHP
        JOIN DangKy DK ON CTDK.MaDK = DK.MaDK
        JOIN SinhVien SV ON DK.MaSV = SV.MaSV
        ORDER BY SV.MaSV";

$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Học Phần Đã Đăng Ký</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
        }
        .container {
            max-width: 800px;
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
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            padding: 10px;
            border: 1px solid black;
            text-align: left;
        }
        th {
            background-color: #007bff;
            color: white;
        }
        .btn-delete {
            background-color: red;
            color: white;
            padding: 5px 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        .btn-delete:hover {
            background-color: darkred;
        }
        .btn-back {
            display: block;
            text-align: center;
            margin-top: 20px;
            background-color: #007bff;
            color: white;
            padding: 10px;
            border-radius: 5px;
            text-decoration: none;
        }
        .btn-back:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Danh sách học phần đã đăng ký</h2>
    <table>
        <tr>
            <th>Mã Sinh Viên</th>
            <th>Họ Tên</th>
            <th>Mã Học Phần</th>
            <th>Tên Học Phần</th>
            <th>Số Tín Chỉ</th>
            <th>Hành động</th>
        </tr>
        <?php if ($result->num_rows > 0) { ?>
            <?php while ($row = $result->fetch_assoc()) { ?>
            <tr>
                <td><?php echo $row['MaSV']; ?></td>
                <td><?php echo $row['HoTen']; ?></td>
                <td><?php echo $row['MaHP']; ?></td>
                <td><?php echo $row['TenHP']; ?></td>
                <td><?php echo $row['SoTinChi']; ?></td>
                <td>
                    <a href="hocphan_dadangky.php?delete=<?php echo $row['MaHP']; ?>&MaSV=<?php echo $row['MaSV']; ?>" 
                       onclick="return confirm('Bạn có chắc muốn xóa học phần này?');" 
                       class="btn-delete">Xóa</a>
                </td>
            </tr>
            <?php } ?>
        <?php } else { ?>
            <tr>
                <td colspan="6" style="text-align: center;">Chưa có sinh viên đăng ký học phần nào.</td>
            </tr>
        <?php } ?>
    </table>
    
    <a href="index.php" class="btn-back">Quay về Trang Chủ</a>
</div>

</body>
</html>

<?php
include 'includes/footer.php';
?>
