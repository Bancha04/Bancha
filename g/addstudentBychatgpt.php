<?php
require 'connectdb.php';

$errors = '';
$success = '';

// ดึงข้อมูลคณะจากฐานข้อมูล
$sql = "SELECT f_id, f_name FROM faculty WHERE f_name != '' ORDER BY f_name ASC";
$result = mysqli_query($conn, $sql);

// กรณีส่งข้อมูลฟอร์ม
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $s_id = trim($_POST['s_id']);
    $s_name = trim($_POST['s_name']);
    $s_address = trim($_POST['s_address']);
    $s_gpax = trim($_POST['s_gpax']);
    $f_id = intval($_POST['f_id']);

    // Validation เบื้องต้น
    if (empty($s_id) || empty($s_name) || $f_id == 0) {
        $errors = 'กรุณากรอกข้อมูลให้ครบถ้วน';
    } else {
        $stmt = $conn->prepare("INSERT INTO student (s_id, s_name, s_address, s_gpax, f_id) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("sssdi", $s_id, $s_name, $s_address, $s_gpax, $f_id);

        if ($stmt->execute()) {
            $success = "บันทึกข้อมูลนิสิตเรียบร้อยแล้ว";
        } else {
            $errors = "เกิดข้อผิดพลาด: " . $stmt->error;
        }

        $stmt->close();
    }
}
?>

<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <title>เพิ่มข้อมูลนิสิต</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
    <div class="card shadow">
        <div class="card-header bg-primary text-white">
            <h5 class="mb-0">ฟอร์มเพิ่มข้อมูลนิสิต</h5>
        </div>
        <div class="card-body">

            <?php if ($errors): ?>
                <div class="alert alert-danger"><?= $errors ?></div>
            <?php elseif ($success): ?>
                <div class="alert alert-success"><?= $success ?></div>
            <?php endif; ?>

            <form method="post">
                <div class="mb-3">
                    <label for="s_id" class="form-label">รหัสนิสิต</label>
                    <input type="text" class="form-control" id="s_id" name="s_id" required>
                </div>

                <div class="mb-3">
                    <label for="s_name" class="form-label">ชื่อนิสิต</label>
                    <input type="text" class="form-control" id="s_name" name="s_name" required>
                </div>

                <div class="mb-3">
                    <label for="s_address" class="form-label">ที่อยู่</label>
                    <textarea class="form-control" id="s_address" name="s_address" rows="2"></textarea>
                </div>

                <div class="mb-3">
                    <label for="s_gpax" class="form-label">GPAX</label>
                    <input type="number" step="0.01" max="4.00" class="form-control" id="s_gpax" name="s_gpax">
                </div>

                <div class="mb-3">
                    <label for="f_id" class="form-label">คณะ</label>
                    <select class="form-select" id="f_id" name="f_id" required>
                        <option value="">-- กรุณาเลือกคณะ --</option>
                        <?php while ($row = mysqli_fetch_assoc($result)): ?>
                            <option value="<?= $row['f_id'] ?>"><?= htmlspecialchars($row['f_name']) ?></option>
                        <?php endwhile; ?>
                    </select>
                </div>

                <button type="submit" class="btn btn-success">บันทึก</button>
                <a href="student_list.php" class="btn btn-secondary">กลับ</a>
            </form>
        </div>
    </div>
</div>

</body>
</html>
