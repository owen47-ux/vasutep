<?php
    session_start();
    include_once("check_login.php");
?>

<!doctype html>
<html lang="th">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>จัดการลูกค้า - วาสุเทพ ดวงแพงมาตร (โอเว่น)</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Prompt:wght@300;400;600&display=swap" rel="stylesheet">

    <style>
        body {
            background-color: #f8f9fa;
            font-family: 'Prompt', sans-serif;
        }
        .navbar-brand {
            font-weight: 600;
        }
        .card-header {
            background-color: #fff;
            border-bottom: 1px solid #eee;
        }
        .avatar-circle {
            width: 40px;
            height: 40px;
            background-color: #e9ecef;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #6c757d;
            font-weight: bold;
        }
    </style>
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-primary shadow-sm">
        <div class="container">
            <a class="navbar-brand" href="index2.php">
                <i class="bi bi-shield-lock-fill me-2"></i>Admin Panel
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto align-items-center">
                    <li class="nav-item me-3">
                        <span class="text-white">
                            <i class="bi bi-person-circle me-1"></i> 
                            <?php echo $_SESSION['aname']; ?>
                        </span>
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

    <div class="container mt-4">
        <div class="card shadow-sm border-0">
            <div class="card-header py-3">
                <div class="row align-items-center">
                    <div class="col-md-6">
                        <h4 class="mb-0 text-primary">
                            <i class="bi bi-people-fill me-2"></i>จัดการลูกค้า
                        </h4>
                    </div>
                    <div class="col-md-6 text-md-end mt-3 mt-md-0">
                        <div class="btn-group" role="group">
                            <a href="index2.php" class="btn btn-outline-secondary">
                                <i class="bi bi-house-door"></i> หน้าหลัก
                            </a>
                            <a href="product.php" class="btn btn-outline-primary">
                                <i class="bi bi-box-seam"></i> สินค้า
                            </a>
                            <a href="orders.php" class="btn btn-outline-warning">
                                <i class="bi bi-receipt"></i> ออเดอร์
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card-body">
                
                <div class="row mb-3">
                    <div class="col-md-6 ms-auto">
                        <form action="" method="get">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="ค้นหาชื่อลูกค้า หรือ เบอร์โทร..." name="q">
                                <button class="btn btn-primary" type="submit"><i class="bi bi-search"></i></button>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="table-responsive">
                    <table class="table table-hover align-middle">
                        <thead class="table-light">
                            <tr>
                                <th width="5%">#</th>
                                <th width="25%">ชื่อ - นามสกุล</th>
                                <th width="20%">เบอร์โทรศัพท์ / อีเมล</th>
                                <th width="35%">ที่อยู่จัดส่ง</th>
                                <th width="15%" class="text-center">จัดการ</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            // $sql = "SELECT * FROM customers";
                            // $result = mysqli_query($conn, $sql);
                            // while($row = mysqli_fetch_array($result)) {
                            ?>
                            
                            <tr>
                                <td>
                                    <div class="avatar-circle">S</div>
                                </td>
                                <td>
                                    <div class="fw-bold">สมชาย ใจดี</div>
                                    <small class="text-muted">ID: C-001</small>
                                </td>
                                <td>
                                    <div><i class="bi bi-telephone me-1"></i> 081-234-5678</div>
                                    <small class="text-muted">somchai@email.com</small>
                                </td>
                                <td>123 ถ.สุขุมวิท แขวงคลองเตย เขตคลองเตย กทม. 10110</td>
                                <td class="text-center">
                                    <div class="btn-group" role="group">
                                        <a href="#" class="btn btn-sm btn-warning" title="แก้ไขข้อมูล"><i class="bi bi-pencil-square"></i></a>
                                        <a href="#" class="btn btn-sm btn-danger" title="ลบลูกค้า" onclick="return confirm('ยืนยันการลบลูกค้า?');"><i class="bi bi-trash"></i></a>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="avatar-circle">A</div>
                                </td>
                                <td>
                                    <div class="fw-bold">อารยา รักสวย</div>
                                    <small class="text-muted">ID: C-002</small>
                                </td>
                                <td>
                                    <div><i class="bi bi-telephone me-1"></i> 099-876-5432</div>
                                    <small class="text-muted">araya@email.com</small>
                                </td>
                                <td>456 หมู่ 5 ต.ในเมือง อ.เมือง จ.ขอนแก่น 40000</td>
                                <td class="text-center">
                                    <div class="btn-group" role="group">
                                        <a href="#" class="btn btn-sm btn-warning"><i class="bi bi-pencil-square"></i></a>
                                        <a href="#" class="btn btn-sm btn-danger"><i class="bi bi-trash"></i></a>
                                    </div>
                                </td>
                            </tr>
                            <?php 
                            // } 
                            ?>
                        </tbody>
                    </table>
                </div>
                
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>