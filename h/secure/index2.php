<?php
    session_start();
    // ตรวจสอบการ Login (ถ้าไม่มีไฟล์นี้ ต้องเขียน logic เช็ค $_SESSION['aid'] ที่นี่)
    include_once("check_login.php"); 
?>

<!doctype html>
<html lang="th">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ระบบหลังบ้าน - วาสุเทพ ดวงแพงมาตร (โอเว่น)</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Prompt:wght@300;400;600&display=swap" rel="stylesheet">

    <style>
        body {
            background-color: #f8f9fa;
            font-family: 'Prompt', sans-serif;
        }
        .navbar {
            box-shadow: 0 2px 4px rgba(0,0,0,.1);
        }
        .menu-card {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            border: none;
            border-radius: 15px;
            cursor: pointer;
            height: 100%;
            text-decoration: none; /* ลบเส้นใต้ลิงก์ */
            color: inherit;
        }
        .menu-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0,0,0,0.1) !important;
            color: #0d6efd; /* เปลี่ยนสีตัวอักษรเมื่อ Hover */
        }
        .icon-box {
            font-size: 3rem;
            margin-bottom: 15px;
            color: #0d6efd;
        }
        .menu-card:hover .icon-box {
            color: #0a58ca;
        }
        .welcome-section {
            padding: 40px 0;
            text-align: center;
        }
    </style>
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container">
            <a class="navbar-brand" href="#">
                <i class="bi bi-shield-lock-fill me-2"></i>Admin Panel
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto align-items-center">
                    <li class="nav-item me-3">
                        <span class="text-white">สวัสดี, คุณ <?php echo $_SESSION['aname']; ?></span>
                    </li>
                    <li class="nav-item">
                        <a href="logout.php" class="btn btn-danger btn-sm rounded-pill px-3">
                            <i class="bi bi-box-arrow-right me-1"></i> ออกจากระบบ
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container">
        
        <div class="welcome-section">
            <h2 class="fw-bold text-secondary">ยินดีต้อนรับสู่ระบบจัดการ</h2>
            <p class="text-muted">กรุณาเลือกเมนูที่ต้องการทำงาน</p>
        </div>

        <div class="row g-4 justify-content-center">
            
            <div class="col-md-4 col-sm-6">
                <a href="product.php" class="card menu-card shadow p-4 text-center">
                    <div class="card-body">
                        <div class="icon-box">
                            <i class="bi bi-box-seam"></i>
                        </div>
                        <h4 class="card-title fw-bold">จัดการสินค้า</h4>
                        <p class="card-text text-muted small">เพิ่ม ลบ แก้ไข รายการสินค้าในระบบ</p>
                    </div>
                </a>
            </div>

            <div class="col-md-4 col-sm-6">
                <a href="orders.php" class="card menu-card shadow p-4 text-center">
                    <div class="card-body">
                        <div class="icon-box">
                            <i class="bi bi-receipt"></i>
                        </div>
                        <h4 class="card-title fw-bold">จัดการออเดอร์</h4>
                        <p class="card-text text-muted small">ตรวจสอบและอัปเดตสถานะคำสั่งซื้อ</p>
                    </div>
                </a>
            </div>

            <div class="col-md-4 col-sm-6">
                <a href="customer.php" class="card menu-card shadow p-4 text-center">
                    <div class="card-body">
                        <div class="icon-box">
                            <i class="bi bi-people-fill"></i>
                        </div>
                        <h4 class="card-title fw-bold">จัดการลูกค้า</h4>
                        <p class="card-text text-muted small">ดูรายชื่อและข้อมูลสมาชิก</p>
                    </div>
                </a>
            </div>

        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>