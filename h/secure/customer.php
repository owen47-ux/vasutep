<?php
    session_start();
    include_once("check_login.php"); 
?>

<!doctype html>
<html lang="th">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>จัดการลูกค้า - วาสุเทพ ดวงแพงมาตร </title>
    
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
        
        /* รูปโปรไฟล์ลูกค้าในตาราง */
        .avatar-img {
            width: 45px;
            height: 45px;
            object-fit: cover;
            border-radius: 50%; /* ทำเป็นวงกลม */
            border: 2px solid #e9ecef;
        }

        .contact-info {
            font-size: 0.9rem;
            color: #666;
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
                        <a class="nav-link" href="orders.php">จัดการออเดอร์</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active fw-bold" href="customer.php">จัดการลูกค้า</a>
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
                <h2 class="mb-1">ข้อมูลลูกค้า (Customers)</h2>
                <p class="text-muted mb-0">จัดการรายชื่อสมาชิกและสิทธิ์การใช้งาน</p>
            </div>
            <a href="#" class="btn btn-primary rounded-pill px-4">
                <i class="bi bi-person-plus-fill me-1"></i> เพิ่มสมาชิกใหม่
            </a>
        </div>

        <div class="card card-custom mb-4">
            <div class="card-body">
                <form class="row g-3" method="get" action="">
                    <div class="col-md-10">
                        <input type="text" class="form-control" name="q" placeholder="ค้นหาชื่อ, อีเมล หรือเบอร์โทรลูกค้า...">
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
                                <th class="ps-4" style="width: 80px;">รูป</th>
                                <th>ชื่อ - นามสกุล</th>
                                <th>ข้อมูลติดต่อ</th>
                                <th>วันที่สมัคร</th>
                                <th>สถานะ</th>
                                <th class="text-center">จัดการ</th>
                            </tr>
                        </thead>
                        <tbody>
                            
                            <tr>
                                <td class="ps-4">
                                    <img src="https://ui-avatars.com/api/?name=Somchai+J&background=random" class="avatar-img" alt="User">
                                </td>
                                <td>
                                    <div class="fw-bold">สมชาย ใจดี</div>
                                    <small class="text-muted">ID: CUS-001</small>
                                </td>
                                <td>
                                    <div class="contact-info"><i class="bi bi-envelope me-1"></i> somchai@email.com</div>
                                    <div class="contact-info"><i class="bi bi-telephone me-1"></i> 081-234-5678</div>
                                </td>
                                <td>15 ต.ค. 2566</td>
                                <td><span class="badge bg-success rounded-pill">ปกติ</span></td>
                                <td class="text-center">
                                    <a href="#" class="btn btn-sm btn-info text-white" title="ดูประวัติการสั่งซื้อ"><i class="bi bi-clock-history"></i></a>
                                    <a href="#" class="btn btn-sm btn-warning" title="แก้ไขข้อมูล"><i class="bi bi-pencil-square"></i></a>
                                    <a href="#" class="btn btn-sm btn-danger" title="ลบ/แบน" onclick="return confirm('ต้องการลบลูกค้ารายนี้?');"><i class="bi bi-trash"></i></a>
                                </td>
                            </tr>

                            <tr>
                                <td class="ps-4">
                                    <img src="https://ui-avatars.com/api/?name=Lisa+M&background=ffc107&color=000" class="avatar-img" alt="User">
                                </td>
                                <td>
                                    <div class="fw-bold">ลิซ่า มโนบาล</div>
                                    <small class="text-muted">ID: CUS-002</small>
                                </td>
                                <td>
                                    <div class="contact-info"><i class="bi bi-envelope me-1"></i> lisa@blackpink.com</div>
                                    <div class="contact-info"><i class="bi bi-telephone me-1"></i> 099-999-9999</div>
                                </td>
                                <td>เมื่อวานนี้</td>
                                <td><span class="badge bg-success rounded-pill">ปกติ</span></td>
                                <td class="text-center">
                                    <a href="#" class="btn btn-sm btn-info text-white"><i class="bi bi-clock-history"></i></a>
                                    <a href="#" class="btn btn-sm btn-warning"><i class="bi bi-pencil-square"></i></a>
                                    <a href="#" class="btn btn-sm btn-danger"><i class="bi bi-trash"></i></a>
                                </td>
                            </tr>

                            <tr>
                                <td class="ps-4">
                                    <img src="https://ui-avatars.com/api/?name=Hacker+X&background=000&color=fff" class="avatar-img" alt="User">
                                </td>
                                <td>
                                    <div class="fw-bold">Mr. Hacker</div>
                                    <small class="text-muted">ID: CUS-003</small>
                                </td>
                                <td>
                                    <div class="contact-info"><i class="bi bi-envelope me-1"></i> hack@darkweb.com</div>
                                    <div class="contact-info"><i class="bi bi-telephone me-1"></i> - </div>
                                </td>
                                <td>01 ม.ค. 2566</td>
                                <td><span class="badge bg-danger rounded-pill">ถูกระงับ</span></td>
                                <td class="text-center">
                                    <a href="#" class="btn btn-sm btn-secondary disabled"><i class="bi bi-clock-history"></i></a>
                                    <a href="#" class="btn btn-sm btn-warning"><i class="bi bi-pencil-square"></i></a>
                                    <a href="#" class="btn btn-sm btn-dark"><i class="bi bi-unlock"></i></a>
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