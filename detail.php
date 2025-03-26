<?php
include 'includes/header.php';
include 'config.php';

$MaSV = $_GET['id'];
$sql = "SELECT * FROM sinhvien WHERE MaSV='$MaSV'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
?>

<h2>Student Details</h2>
<p>MaSV: <?php echo $row['MaSV']; ?></p>
<p>HoTen: <?php echo $row['HoTen']; ?></p>
<p>GioiTinh: <?php echo $row['GioiTinh']; ?></p>
<p>NgaySinh: <?php echo $row['NgaySinh']; ?></p>
<p>Hinh: <img src="uploads/<?php echo $row['Hinh']; ?>" alt="Student Image" width="100"></p>
<p>MaNganh: <?php echo $row['MaNganh']; ?></p>
<a href="index.php">
        <button type="button">Quay về Trang Chủ</button>
    </a>
<?php
include 'includes/footer.php';
?>