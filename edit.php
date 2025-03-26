<?php
include 'includes/header.php';
include 'config.php';

$MaSV = $_GET['id'];
$sql = "SELECT * FROM sinhvien WHERE MaSV='$MaSV'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $HoTen = $_POST['HoTen'];
    $GioiTinh = $_POST['GioiTinh'];
    $NgaySinh = $_POST['NgaySinh'];
    $MaNganh = $_POST['MaNganh'];
    $Hinh = $_FILES['Hinh']['name'];
    $target = "assets/" . basename($Hinh);

    if ($Hinh) {
        $sql = "UPDATE sinhvien SET HoTen='$HoTen', GioiTinh='$GioiTinh', NgaySinh='$NgaySinh', Hinh='$Hinh', MaNganh='$MaNganh' WHERE MaSV='$MaSV'";
        move_uploaded_file($_FILES['Hinh']['tmp_name'], $target);
    } else {
        $sql = "UPDATE sinhvien SET HoTen='$HoTen', GioiTinh='$GioiTinh', NgaySinh='$NgaySinh', MaNganh='$MaNganh' WHERE MaSV='$MaSV'";
    }

    if ($conn->query($sql) === TRUE) {
        echo "<div class='alert alert-success'>Cập nhật sinh viên thành công!</div>";
    } else {
        echo "<div class='alert alert-danger'>Lỗi: " . $conn->error . "</div>";
    }
}
?>

<div class="container mt-5">
    <h2 class="text-center mb-4">Chỉnh sửa thông tin sinh viên</h2>
    <div class="card p-4 shadow">
        <form method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="HoTen" class="form-label">Họ Tên:</label>
                <input type="text" class="form-control" id="HoTen" name="HoTen" value="<?php echo $row['HoTen']; ?>" required>
            </div>
            <div class="mb-3">
                <label for="GioiTinh" class="form-label">Giới Tính:</label>
                <select class="form-select" id="GioiTinh" name="GioiTinh" required>
                    <option value="Nam" <?php if ($row['GioiTinh'] == 'Nam') echo 'selected'; ?>>Nam</option>
                    <option value="Nữ" <?php if ($row['GioiTinh'] == 'Nữ') echo 'selected'; ?>>Nữ</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="NgaySinh" class="form-label">Ngày Sinh:</label>
                <input type="date" class="form-control" id="NgaySinh" name="NgaySinh" value="<?php echo $row['NgaySinh']; ?>" required>
            </div>
            <div class="mb-3">
                <label for="Hinh" class="form-label">Hình:</label>
                <input type="file" class="form-control" id="Hinh" name="Hinh">
                <?php if ($row['Hinh']) : ?>
                    <img src="assets/<?php echo $row['Hinh']; ?>" class="img-thumbnail mt-2" width="150">
                <?php endif; ?>
            </div>
            <div class="mb-3">
                <label for="MaNganh" class="form-label">Mã Ngành:</label>
                <input type="text" class="form-control" id="MaNganh" name="MaNganh" value="<?php echo $row['MaNganh']; ?>" required>
            </div>
            <button type="submit" class="btn btn-primary">Cập nhật</button>
            <a href="index.php" class="btn btn-secondary">Quay về Trang Chủ</a>
        </form>
    </div>
</div>

<?php include 'includes/footer.php'; ?>
