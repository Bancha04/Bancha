<?php
// ตั้งค่าการเชื่อมต่อฐานข้อมูล
// เนื่องจากเป็นไฟล์เดียว จึงใส่โค้ดเชื่อมต่อไว้ที่นี่
// หากคุณมีไฟล์ connectdb.php อยู่แล้ว สามารถใช้ include 'connectdb.php'; แทนส่วนนี้ได้
$servername = "localhost"; // หรือ IP ของเซิร์ฟเวอร์ฐานข้อมูล
$username = "root"; // ชื่อผู้ใช้ฐานข้อมูล
$password = ""; // รหัสผ่านฐานข้อมูล
$dbname = "msu"; // ชื่อฐานข้อมูล

// สร้างการเชื่อมต่อ
$conn = new mysqli($servername, $username, $password, $dbname);

// ตั้งค่า character set เป็น utf8mb4 เพื่อรองรับภาษาไทย
$conn->set_charset("utf8mb4");

// ตรวจสอบการเชื่อมต่อ
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$message = ''; // ตัวแปรสำหรับเก็บข้อความแจ้งเตือน

// ตรวจสอบว่ามีการส่งข้อมูลมาจากฟอร์มหรือไม่ (METHOD POST)
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // รับค่าจากฟอร์มและป้องกัน SQL Injection
    $s_id = $_POST['s_id'];
    $s_name = $_POST['s_name'];
    $s_address = $_POST['s_address'];
    $s_gpax = $_POST['s_gpax'];
    $f_id = $_POST['f_id'];

    // เตรียมคำสั่ง SQL สำหรับเพิ่มข้อมูลด้วย Prepared Statement
    $sql_insert = "INSERT INTO student (s_id, s_name, s_address, s_gpax, f_id) VALUES (?, ?, ?, ?, ?)";
    
    $stmt = $conn->prepare($sql_insert);
    
    // ตรวจสอบว่า prepare สำเร็จหรือไม่
    if ($stmt === false) {
        $message = '<div class="alert alert-danger" role="alert">เกิดข้อผิดพลาดในการเตรียมคำสั่ง SQL: ' . $conn->error . '</div>';
    } else {
        // Bind parameters เข้ากับ statement
        $stmt->bind_param("sssdi", $s_id, $s_name, $s_address, $s_gpax, $f_id);

        // Execute statement และตรวจสอบผลลัพธ์
        if ($stmt->execute()) {
            $message = '<div class="alert alert-success" role="alert">เพิ่มข้อมูลนิสิตสำเร็จ!</div>';
        } else {
            // แสดงข้อความ error กรณีรหัสนิสิตซ้ำ หรือมีข้อผิดพลาดอื่น
            $message = '<div class="alert alert-danger" role="alert">เกิดข้อผิดพลาดในการเพิ่มข้อมูล: ' . $stmt->error . '</div>';
        }
        // ปิด statement
        $stmt->close();
    }
}

// ดึงข้อมูลคณะทั้งหมดเพื่อไปแสดงใน dropdown
// กรองข้อมูลที่ชื่อคณะเป็นค่าว่างออก
$sql_faculty = "SELECT f_id, f_name FROM faculty WHERE f_name IS NOT NULL AND f_name != '' ORDER BY f_name";
$faculty_result = $conn->query($sql_faculty);
?>

<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ฟอร์มเพิ่มข้อมูลนิสิต</title>
    <!-- Bootstrap CSS v5.3.2 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Google Fonts: Kanit -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@400;500;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Kanit', sans-serif;
            background-color: #f8f9fa;
        }
        .container {
            max-width: 700px;
        }
        .card {
            border: none;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        }
    </style>
</head>
<body>

<div class="container my-5">
    <div class="card">
        <div class="card-header bg-primary text-white">
            <h1 class="h4 mb-0">ฟอร์มเพิ่มข้อมูลนิสิต</h1>
        </div>
        <div class="card-body">
            
            <?php 
            // แสดงข้อความแจ้งเตือน (ถ้ามี)
            echo $message; 
            ?>

            <!-- action ของฟอร์มจะส่งข้อมูลกลับมาที่ไฟล์ตัวเอง -->
            <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                <div class="mb-3">
                    <label for="s_id" class="form-label">รหัสนิสิต</label>
                    <input type="text" class="form-control" id="s_id" name="s_id" required maxlength="11" pattern="\d{11}" title="กรุณากรอกรหัสนิสิต 11 หลัก">
                </div>
                <div class="mb-3">
                    <label for="s_name" class="form-label">ชื่อ-สกุล</label>
                    <input type="text" class="form-control" id="s_name" name="s_name" required>
                </div>
                <div class="mb-3">
                    <label for="s_address" class="form-label">ที่อยู่</label>
                    <textarea class="form-control" id="s_address" name="s_address" rows="3"></textarea>
                </div>
                <div class="mb-3">
                    <label for="s_gpax" class="form-label">เกรดเฉลี่ย (GPAX)</label>
                    <input type="number" class="form-control" id="s_gpax" name="s_gpax" step="0.01" min="0" max="4.00" required>
                </div>
                <div class="mb-3">
                    <label for="f_id" class="form-label">คณะ</label>
                    <select class="form-select" id="f_id" name="f_id" required>
                        <option selected disabled value="">--- กรุณาเลือกคณะ ---</option>
                        <?php
                        // วนลูปแสดงรายชื่อคณะใน dropdown
                        if ($faculty_result->num_rows > 0) {
                            while($row = $faculty_result->fetch_assoc()) {
                                echo '<option value="' . htmlspecialchars($row['f_id']) . '">' . htmlspecialchars($row['f_name']) . '</option>';
                            }
                        }
                        ?>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary w-100">บันทึกข้อมูล</button>
            </form>
        </div>
    </div>
</div>

<!-- Bootstrap JS Bundle (includes Popper) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>

<?php
// ปิดการเชื่อมต่อฐานข้อมูล
$conn->close();
?>
