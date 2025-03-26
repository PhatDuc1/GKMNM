<?php
include 'includes/header.php';
include 'config.php';

$sql = "SELECT * FROM sinhvien";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh Sách Sinh Viên</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
        }
        h2 {
            text-align: center;
            color: #333;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            background: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        th, td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #007bff;
            color: white;
        }
        tr:hover {
            background-color: #f1f1f1;
        }
        img {
            border-radius: 5px;
        }
        .action-links a {
            text-decoration: none;
            padding: 5px 10px;
            margin-right: 5px;
            border-radius: 4px;
        }
        .edit {
            background-color: #28a745;
            color: white;
        }
        .detail {
            background-color: #ffc107;
            color: white;
        }
        .delete {
            background-color: #dc3545;
            color: white;
        }
    </style>
</head>
<body>

<h2>Danh Sách Sinh Viên</h2>
<table>
    <tr>
        <th>MaSV</th>
        <th>HoTen</th>
        <th>GioiTinh</th>
        <th>NgaySinh</th>
        <th>Hinh</th>
        <th>MaNganh</th>
        <th>Actions</th>
    </tr>
    <?php while($row = $result->fetch_assoc()): ?>
    <tr>
        <td><?php echo $row['MaSV']; ?></td>
        <td><?php echo $row['HoTen']; ?></td>
        <td><?php echo $row['GioiTinh']; ?></td>
        <td><?php echo $row['NgaySinh']; ?></td>
        <td><img src="uploads/<?php echo $row['Hinh']; ?>" alt="Student Image" width="100"></td>
        <td><?php echo $row['MaNganh']; ?></td>
        <td class="action-links">
            <a href="edit.php?id=<?php echo $row['MaSV']; ?>" class="edit">Edit</a>
            <a href="detail.php?id=<?php echo $row['MaSV']; ?>" class="detail">Details</a>
            <a href="delete.php?id=<?php echo $row['MaSV']; ?>" class="delete" onclick="return confirm('Bạn có chắc muốn xóa?');">Delete</a>
        </td>
    </tr>
    <?php endwhile; ?>
</table>

</body>
</html>

<?php
include 'includes/footer.php';
?>
