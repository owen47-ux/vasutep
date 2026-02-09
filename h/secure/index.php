<?php
session_start();
?>

<!doctype html>
<html lang="th">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login - วาสุเทพ ดวงแพงมาตร (โอเว่น)</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Prompt:wght@300;400;600&display=swap" rel="stylesheet">
    
    <style>
        body {
            background-color: #f8f9fa; /* สีพื้นหลังเทาอ่อน */
            font-family: 'Prompt', sans-serif;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .login-card {
            border-radius: 15px;
            overflow: hidden;
            border: none;
        }
        .card-header {
            background-color: #0d6efd; /* สีน้ำเงิน Bootstrap */
            color: white;
            text-align: center;
            padding: 20px;
        }
    </style>
</head>

<body>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 col-lg-4">
                <div class="card shadow-lg login-card">
                    <div class="card-header">
                        <h4 class="mb-0">เข้าสู่ระบบหลังบ้าน</h4>
                        <small>วาสุเทพ ดวงแพงมาตร (โอเว่น)</small>
                    </div>
                    <div class="card-body p-4">
                        <form method="post" action="">
                            <div class="mb-3">
                                <label for="auser" class="form-label">Username</label>
                                <input type="text" class="form-control" name="auser" id="auser" placeholder="กรอกชื่อผู้ใช้" autofocus required>
                            </div>
                            <div class="mb-3">
                                <label for="apwd" class="form-label">Password</label>
                                <input type="password" class="form-control" name="apwd" id="apwd" placeholder="กรอกรหัสผ่าน" required>
                            </div>
                            <div class="d-grid gap-2">
                                <button type="submit" name="Submit" class="btn btn-primary btn-lg">เข้าสู่ระบบ</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php
    if(isset($_POST['Submit'])) {
        // เชื่อมต่อฐานข้อมูล
        include_once("connectdb.php"); 
        
        // รับค่าและป้องกันเบื้องต้น
        $username = $_POST['auser'];
        $password = $_POST['apwd'];

        // หมายเหตุ: โค้ดเดิมมีความเสี่ยง SQL Injection แนะนำให้ใช้ Prepared Statement (ดูคำแนะนำด้านล่าง)
        $sql = "SELECT * FROM `admin` WHERE a_username = '$username' AND a_password = '$password' LIMIT 1";
        $rs = mysqli_query($conn, $sql);
        $num = mysqli_num_rows($rs);

        if ($num == 1){
            $data = mysqli_fetch_array($rs);
            $_SESSION['aid'] = $data['a_id'];
            $_SESSION['aname'] = $data['a_name'];
            
            // SweetAlert แบบง่าย หรือ Redirect ปกติ
            echo "<script>";
            echo "window.location='index2.php';";
            echo "</script>";
        } else {
            echo "<script>";
            echo "alert('Username หรือ Password ไม่ถูกต้อง');";
            echo "window.history.back();"; // ถอยกลับไปหน้าเดิมเพื่อให้กรอกใหม่
            echo "</script>";
        }
    }
    ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>