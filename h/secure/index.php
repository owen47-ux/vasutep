<?php
session_start();
$error_msg = ""; // ตัวแปรสำหรับเก็บข้อความแจ้งเตือน

if(isset($_POST['Submit'])) {
    include_once("connectdb.php");
    
    $username = $_POST['auser'];
    $password = $_POST['apwd'];

    // SQL Injection Prevention
    $sql = "SELECT a_id, a_name, a_password FROM `admin` WHERE a_username = ? LIMIT 1";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1){
        $data = $result->fetch_assoc();
        
        // ตรวจสอบรหัสผ่าน (Hash)
        if (password_verify($password, $data['a_password'])) {
            $_SESSION['aid'] = $data['a_id'];
            $_SESSION['aname'] = $data['a_name'];
            header("Location: index2.php");
            exit;
        } else {
            $error_msg = "รหัสผ่านไม่ถูกต้อง";
        }
    } else {
        $error_msg = "ไม่พบชื่อผู้ใช้งานนี้";
    }
    $stmt->close();
}
?>

<!doctype html>
<html lang="th">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>เข้าสู่ระบบ -วาสุเทพ ดวงแพงมาตร </title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@300;400;500&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Kanit', sans-serif;
            background: linear-gradient(135deg, #eef2f3 0%, #8e9eab 100%); /* พื้นหลังไล่สีนุ่มๆ */
            height: 100vh;
            display: flex;
            align_items: center;
            justify-content: center;
        }
        .login-card {
            width: 100%;
            max-width: 420px;
            border: none;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1); /* เงาฟุ้งๆ ดูแพง */
            background: rgba(255, 255, 255, 0.95);
            padding: 2rem;
        }
        .login-header {
            text-align: center;
            margin-bottom: 2rem;
        }
        .login-header i {
            font-size: 3rem;
            color: #0d6efd; /* สีฟ้า Bootstrap */
            margin-bottom: 10px;
        }
        .login-header h4 {
            font-weight: 500;
            color: #333;
        }
        .login-header p {
            color: #666;
            font-size: 0.9rem;
        }
        .btn-login {
            background: #0d6efd;
            border: none;
            padding: 12px;
            font-weight: 500;
            transition: all 0.3s;
        }
        .btn-login:hover {
            background: #0b5ed7;
            transform: translateY(-2px); /* ขยับขึ้นเล็กน้อยเมื่อชี้ */
            box-shadow: 0 5px 15px rgba(13, 110, 253, 0.3);
        }
    </style>
</head>

<body>

    <div class="login-card animate__animated animate__fadeInUp">
        <div class="login-header">
            <i class="bi bi-shield-lock"></i>
            <h4>เข้าสู่ระบบหลังบ้าน</h4>
            <p>Admin: วาสุเทพ ดวงแพงมาตร (โอเว่น)</p>
        </div>

        <?php if(!empty($error_msg)) { ?>
            <div class="alert alert-danger d-flex align-items-center" role="alert">
                <i class="bi bi-exclamation-triangle-fill flex-shrink-0 me-2"></i>
                <div>
                    <?php echo $error_msg; ?>
                </div>
            </div>
        <?php } ?>

        <form method="post" action="">
            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="floatingInput" name="auser" placeholder="Username" autofocus required>
                <label for="floatingInput"><i class="bi bi-person-fill me-1"></i> ชื่อผู้ใช้งาน</label>
            </div>

            <div class="form-floating mb-4">
                <input type="password" class="form-control" id="floatingPassword" name="apwd" placeholder="Password" required>
                <label for="floatingPassword"><i class="bi bi-key-fill me-1"></i> รหัสผ่าน</label>
            </div>

            <div class="d-grid gap-2">
                <button type="submit" name="Submit" class="btn btn-primary btn-login rounded-pill">
                    เข้าสู่ระบบ
                </button>
            </div>
        </form>

        <div class="text-center mt-4">
            <small class="text-muted">&copy; <?php echo date("Y"); ?> Chinnapat L.</small>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>