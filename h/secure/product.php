<?php
    session_start();
    include_once("check_login.php"); 
    // ตรวจสอบว่ามีไฟล์ check_login.php หรือยัง ถ้ายังไม่มีให้ใช้โค้ดเช็ค session แบบเดิมไปก่อนนะครับ
?>

<!doctype html>
<html lang="th">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>จัดการสินค้า - วาสุเทพ ดวงแพงมาตร </title>
    
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
        }

        .table thead th {
            background-color: #e9ecef;
            font-weight: 500;
        }
        
        /* จัดให้อรูปภาพในตารางสวยงาม */
        .product-img {
            width: 50px;
            height: 50px;
            object-fit: cover;
            border-radius: 8px;
            background-color: #eee;
        }

        .btn-action {
            margin-right: 5px;
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
                        <a class="nav-link active fw-bold" href="product.php">จัดการสินค้า</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="orders.php">จัดการออเดอร์</a>
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
                <h2 class="mb-1">จัดการข้อมูลสินค้า</h2>
                <p class="text-muted mb-0">รายการสินค้าทั้งหมดในระบบ</p>
            </div>
            <a href="form_product.php" class="btn btn-success rounded-pill px-4">
                <i class="bi bi-plus-lg me-1"></i> เพิ่มสินค้าใหม่
            </a>
        </div>

        <div class="card card-custom mb-4">
            <div class="card-body">
                <form class="row g-3" method="get" action="">
                    <div class="col-md-10">
                        <input type="text" class="form-control" name="q" placeholder="ค้นหาชื่อสินค้า..." value="">
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
                                <th class="ps-4" style="width: 80px;">รูปภาพ</th>
                                <th>ชื่อสินค้า</th>
                                <th>ราคา</th>
                                <th>คงเหลือ</th>
                                <th class="text-center">จัดการ</th>
                            </tr>
                        </thead>
                        <tbody>
                            
                            <tr>
                                <td class="ps-4"><img src="https://via.placeholder.com/50" class="product-img" alt="Product"></td>
                                <td>
                                    <div class="fw-bold">iPhone 15 Pro</div>
                                    <small class="text-muted">ID: P001</small>
                                </td>
                                <td class="text-primary fw-bold">42,900 ฿</td>
                                <td>
                                    <span class="badge bg-success">12 ชิ้น</span>
                                </td>
                                <td class="text-center">
                                    <a href="#" class="btn btn-sm btn-warning btn-action"><i class="bi bi-pencil-square"></i> แก้ไข</a>
                                    <a href="#" class="btn btn-sm btn-danger btn-action" onclick="return confirm('ยืนยันการลบสินค้านี้?');"><i class="bi bi-trash"></i> ลบ</a>
                                </td>
                            </tr>

                            <tr>
                                <td class="ps-4"><img src="https://via.placeholder.com/50" class="product-img" alt="Product"></td>
                                <td>
                                    <div class="fw-bold">Samsung S24 Ultra</div>
                                    <small class="text-muted">ID: P002</small>
                                </td>
                                <td class="text-primary fw-bold">45,900 ฿</td>
                                <td>
                                    <span class="badge bg-danger">0 ชิ้น</span> </td>
                                <td class="text-center">
                                    <a href="#" class="btn btn-sm btn-warning btn-action"><i class="bi bi-pencil-square"></i> แก้ไข</a>
                                    <a href="#" class="btn btn-sm btn-danger btn-action" onclick="return confirm('ยืนยันการลบสินค้านี้?');"><i class="bi bi-trash"></i> ลบ</a>
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
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item"><a class="page-link" href="#">ถัดไป</a></li>
            </ul>
        </nav>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>