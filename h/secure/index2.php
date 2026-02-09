<?php
    session_start();
    // ตรวจสอบการ Login (ถ้ายังไม่มีไฟล์ check_login.php ให้ใช้โค้ดเช็ค session แบบเดิมไปก่อน)
    if (!isset($_SESSION['aid'])) {
        header("Location: index.php");
        exit;
    }
?>

<!doctype html>
<html lang="th">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard - วาสุเทพ ดวงแพงมาตร (โอเว่น)</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@300;400;500&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Kanit', sans-serif;
            background-color: #f8f9fa; /* สีพื้นหลังหลัก */
            min-height: 100vh;
        }
        
        /* Navbar ด้านบน */
        .navbar-custom {
            background: linear-gradient(135deg, #0d6efd 0%, #0a58ca 100%);
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
        .navbar-brand {
            font-weight: 500;
            letter-spacing: 0.5px;
        }

        /* ส่วนหัว Welcome */
        .welcome-section {
            background: white;
            padding: 2rem 0;
            margin-bottom: 2rem;
            box-shadow: 0 2px 5px rgba(0,0,0,0.05);
            border-bottom: 1px solid #eee;
        }

        /* การ์ดเมนู (Dashboard Cards) */
        .card-menu {
            border: none;
            border-radius: 15px;
            background: white;
            box-shadow: 0 5px 15px rgba(0,0,0,0.05);
            transition: all 0.3s ease;
            height: 100%; /* ให้การ์ดสูงเท่ากัน */
            text-align: center;
            padding: 2rem 1rem;
            text-decoration: none; /* ตัดเส้นใต้ลิงก์ */
            color: inherit; /* สีตัวอักษรตามปกติ */
            display: block;
        }
        
        .card-menu:hover {
            transform: translateY(-10px); /* ลอยขึ้นเมื่อเอาเมาส์ชี้ */
            box-shadow: 0 15px 30px rgba(0,0,0,0.15);
            color: #0d6efd; /* เปลี่ยนสีตัวอักษรเมื่อชี้ */
        }

        .card-icon {
            font-size: 3.5rem;
            margin-bottom: 1rem;
            color: #6c757d;
            transition: color 0.3s;
        }

        .card-menu:hover .card-icon {
            color: #0d6efd; /* เปลี่ยนสีไอคอนเมื่อชี้ */
        }
        
        .card-title {
            font-size: 1.25rem;
            font-weight: 500;
            margin-bottom: 0.5rem;
        }
        
        .card-text {
            color: #999;
            font-size: 0.9rem;
        }

        /* ปุ่ม Logout มุมขวา */
        .btn-logout {
            border: 1px solid rgba(255,255,255,0.5);
            color: white;
        }
        .btn-logout:hover {
            background: rgba(255,255,255,0.2);
            color: white;
        }
    </style>
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-dark navbar-custom sticky-top">
        <div class="container">
            <a class="navbar-brand" href="#">
                <i class="bi bi-shield-lock-fill me-2"></i>Admin Panel
            </a>
            <div class="d-flex align-items-center text-white">
                <span class="me-3 d-none d-md-block">
                    <i class="bi bi-person-circle me-1"></i> <?php echo $_SESSION['aname']; ?>
                </span>
                <a href="logout.php" class="btn btn-sm btn-logout rounded-pill px-3" onclick="return confirm('ยืนยันการออกจากระบบ?');">
                    <i class="bi bi-box-arrow-right me-1"></i> ออกจากระบบ
                </a>
            </div>
        </div>
    </nav>

    <div class="welcome-section">
        <div class="container">
            <h2 class="mb-0">ยินดีต้อนรับ, คุณ<?php echo $_SESSION['aname']; ?></h2>
            <p class="text-muted mt-1">เลือกระบบที่คุณต้องการจัดการจากเมนูด้านล่าง</p>
        </div>
    </div>

    <div class="container pb-5">
        <div class="row g-4"> <div class="col-12 col-md-6 col-lg-4">
                <a href="product.php" class="card-menu">
                    <div class="card-icon">
                        <i class="bi bi-box-seam-fill"></i>
                    </div>
                    <h5 class="card-title">จัดการสินค้า</h5>
                    <p class="card-text">เพิ่ม ลบ แก้ไข รายการสินค้าและสต็อก</p>
                </a>
            </div>

            <div class="col-12 col-md-6 col-lg-4">
                <a href="orders.php" class="card-menu">
                    <div class="card-icon">
                        <i class="bi bi-receipt"></i>
                    </div>
                    <h5 class="card-title">จัดการออเดอร์</h5>
                    <p class="card-text">ตรวจสอบรายการสั่งซื้อและสถานะการชำระเงิน</p>
                </a>
            </div>

            <div class="col-12 col-md-6 col-lg-4">
                <a href="customer.php" class="card-menu">
                    <div class="card-icon">
                        <i class="bi bi-people-fill"></i>
                    </div>
                    <h5 class="card-title">จัดการลูกค้า</h5>
                    <p class="card-text">ดูรายชื่อสมาชิกและข้อมูลผู้ใช้งาน</p>
                </a>
            </div>

             </div>
    </div>

    <footer class="text-center text-muted py-4 mt-auto">
        <small>&copy; <?php echo date("Y"); ?> ระบบจัดการหลังบ้าน by Chinnapat L.</small>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>