<?php
    session_start();
    include_once("check_login.php"); 
    // ตรวจสอบ session (ถ้ายังไม่มีไฟล์ check_login ให้ใช้ code เช็คเดิม)
?>

<!doctype html>
<html lang="th">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>จัดการออเดอร์ - วาสุเทพ ดวงแพงมาตร </title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@300;400;500&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Kanit', sans-serif;
            background-color: #f8f9fa;
            min-height: 100vh;
        }
        
        .navbar-custom {
            background: linear-gradient(135deg, #0d6efd 0%, #0a58ca 100%);
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
        
        .card-custom {
            border: none;
            border-radius: 12px;
            box-shadow: 0 5px 20px rgba(0,0,0,0.05);
            background: white;
            transition: transform 0.2s;
        }
        
        .stat-card {
            border-left: 5px solid #0d6efd;
        }
        .stat-card.warning { border-left-color: #ffc107; }
        .stat-card.success { border-left-color: #198754; }
        .stat-card.danger { border-left-color: #dc3545; }

        .table thead th {
            background-color: #e9ecef;
            font-weight: 500;
        }
        
        .badge-status {
            font-weight: 400;
            padding: 8px 12px;
            border-radius: 20px;
        }
    </style>
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-dark navbar-custom sticky-top">
        <div class="container">
            <a class="navbar-brand" href="index2.php">
                <i class="bi bi-shield-lock-fill me-2"></i>Admin Panel
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="index2.php">หน้าหลัก</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="product.php">จัดการสินค้า</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active fw-bold" href="orders.php">จัดการออเดอร์</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="customer.php">จัดการลูกค้า</a>
                    </li>
                </ul>
                
                <div class="d-flex text-white align-items-center">
                    <span class="me-3 d-none d-lg-block">
                        <i class="bi bi-person-circle me-1"></i> <?php echo $_SESSION['aname']; ?>
                    </span>
                    <a href="logout.php" class="btn btn-sm btn-outline-light rounded-pill px-3" onclick="return confirm('ยืนยันการออกจากระบบ?');">
                        ออกจากระบบ
                    </a>
                </div>
            </div>
        </div>
    </nav>

    <div class="container py-4">
        
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h2 class="mb-1">รายการสั่งซื้อ (Orders)</h2>
                <p class="text-muted mb-0">ตรวจสอบและอัปเดตสถานะการสั่งซื้อ</p>
            </div>
        </div>

        <div class="row g-3 mb-4">
            <div class="col-md-4">
                <div class="card card-custom stat-card warning p-3">
                    <h6 class="text-muted">รอการชำระเงิน</h6>
                    <h3>5 รายการ</h3>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card card-custom stat-card success p-3">
                    <h6 class="text-muted">ชำระเงินแล้ว/จัดส่งแล้ว</h6>
                    <h3>120 รายการ</h3>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card card-custom stat-card danger p-3">
                    <h6 class="text-muted">ยกเลิกคำสั่งซื้อ</h6>
                    <h3>2 รายการ</h3>
                </div>
            </div>
        </div>

        <div class="card card-custom mb-4">
            <div class="card-body">
                <form class="row g-3" method="get" action="">
                    <div class="col-md-8">
                        <input type="text" class="form-control" name="q" placeholder="ค้นหาเลขที่ออเดอร์ หรือ ชื่อลูกค้า...">
                    </div>
                    <div class="col-md-2">
                        <select class="form-select" name="status">
                            <option value="">ทุกสถานะ</option>
                            <option value="1">รอชำระเงิน</option>
                            <option value="2">ชำระแล้ว</option>
                            <option value="0">ยกเลิก</option>
                        </select>
                    </div>
                    <div class="col-md-2 d-grid">
                        <button type="submit" class="btn btn-primary"><i class="bi bi-search"></i> ค้นหา</button>
                    </div>
                </form>
            </div>
        </div>

        <div class="card card-custom">
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-hover align-middle mb-0">
                        <thead>
                            <tr>
                                <th class="ps-4">Order ID</th>
                                <th>ชื่อลูกค้า</th>
                                <th>วันที่สั่งซื้อ</th>
                                <th>ยอดรวม</th>
                                <th>สถานะ</th>
                                <th class="text-center">จัดการ</th>
                            </tr>
                        </thead>
                        <tbody>
                            
                            <tr>
                                <td class="ps-4 fw-bold">#ORD-0025</td>
                                <td>คุณสมชาย ใจดี</td>
                                <td>25/10/2023 10:30</td>
                                <td class="fw-bold">1,250 ฿</td>
                                <td><span class="badge bg-warning text-dark badge-status">รอชำระเงิน</span></td>
                                <td class="text-center">
                                    <a href="#" class="btn btn-sm btn-primary"><i class="bi bi-eye"></i> ดูรายละเอียด</a>
                                </td>
                            </tr>

                            <tr>
                                <td class="ps-4 fw-bold">#ORD-0024</td>
                                <td>คุณสมหญิง รักสวย</td>
                                <td>24/10/2023 14:15</td>
                                <td class="fw-bold text-success">3,500 ฿</td>
                                <td><span class="badge bg-success badge-status">ชำระแล้ว</span></td>
                                <td class="text-center">
                                    <a href="#" class="btn btn-sm btn-primary"><i class="bi bi-eye"></i> ดูรายละเอียด</a>
                                </td>
                            </tr>
                            
                            <tr>
                                <td class="ps-4 fw-bold">#ORD-0023</td>
                                <td>คุณอนันต์ ขยันยิ่ง</td>
                                <td>23/10/2023 09:00</td>
                                <td class="fw-bold text-success">890 ฿</td>
                                <td><span class="badge bg-info text-dark badge-status">จัดส่งแล้ว</span></td>
                                <td class="text-center">
                                    <a href="#" class="btn btn-sm btn-primary"><i class="bi bi-eye"></i> ดูรายละเอียด</a>
                                </td>
                            </tr>

                            <tr>
                                <td class="ps-4 fw-bold text-muted">#ORD-0022</td>
                                <td class="text-muted">คุณมานะ อดทน</td>
                                <td class="text-muted">22/10/2023 11:20</td>
                                <td class="fw-bold text-muted">450 ฿</td>
                                <td><span class="badge bg-danger badge-status">ยกเลิก</span></td>
                                <td class="text-center">
                                    <a href="#" class="btn btn-sm btn-secondary"><i class="bi bi-eye"></i> ดูรายละเอียด</a>
                                </td>
                            </tr>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <nav class="mt-4" aria-label="Page navigation">
            <ul class="pagination justify-content-center">
                <li class="page-item disabled"><a class="page-link" href="#">ก่อนหน้า</a></li>
                <li class="page-item active"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">ถัดไป</a></li>
            </ul>
        </nav>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>