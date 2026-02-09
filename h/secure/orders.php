<?php
    session_start();
    include_once("check_login.php");
?>

<!doctype html>
<html lang="th">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>จัดการออเดอร์ - วาสุเทพ ดวงแพงมาตร (โอเว่น)</title>
    
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
        .table th {
            background-color: #f8f9fa;
            font-weight: 600;
        }
        .status-badge {
            font-size: 0.85em;
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
                            <i class="bi bi-receipt me-2"></i>จัดการออเดอร์
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
                            <a href="customer.php" class="btn btn-outline-success">
                                <i class="bi bi-people"></i> ลูกค้า
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card-body">
                
                <div class="row mb-3">
                    <div class="col-md-4 ms-auto">
                        <form action="" method="get">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="ค้นหาเลขที่ออเดอร์..." name="q">
                                <button class="btn btn-primary" type="submit"><i class="bi bi-search"></i></button>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="table-responsive">
                    <table class="table table-hover align-middle">
                        <thead class="table-light">
                            <tr>
                                <th width="15%">เลขที่ออเดอร์</th>
                                <th width="20%">วันที่สั่งซื้อ</th>
                                <th width="25%">ชื่อลูกค้า</th>
                                <th width="15%" class="text-end">ราคารวม</th>
                                <th width="15%" class="text-center">สถานะ</th>
                                <th width="10%" class="text-center">จัดการ</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            // ตัวอย่าง Loop (เมื่อคุณใส่โค้ดเชื่อมฐานข้อมูลจริง)
                            // while($row = mysqli_fetch_array($result)) {
                            ?>
                            
                            <tr>
                                <td>#ORD-001</td>
                                <td>2023-10-25 14:30</td>
                                <td>คุณสมชาย ใจดี</td>
                                <td class="text-end">1,500 ฿</td>
                                <td class="text-center">
                                    <span class="badge bg-warning text-dark status-badge">รอชำระเงิน</span>
                                </td>
                                <td class="text-center">
                                    <button class="btn btn-sm btn-info text-white" title="ดูรายละเอียด"><i class="bi bi-eye"></i></button>
                                </td>
                            </tr>
                            <tr>
                                <td>#ORD-002</td>
                                <td>2023-10-24 09:15</td>
                                <td>คุณสมหญิง รักสวย</td>
                                <td class="text-end">3,200 ฿</td>
                                <td class="text-center">
                                    <span class="badge bg-success status-badge">ชำระแล้ว</span>
                                </td>
                                <td class="text-center">
                                    <button class="btn btn-sm btn-info text-white" title="ดูรายละเอียด"><i class="bi bi-eye"></i></button>
                                </td>
                            </tr>
                            <?php 
                            // } // ปิดปีกกา Loop
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