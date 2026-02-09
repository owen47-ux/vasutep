<?php
    session_start();
    include_once("check_login.php");
?>

<!doctype html>
<html lang="th">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>จัดการสินค้า - วาสุเทพ ดวงแพงมาตร (โอเว่น)</title>
    
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
        .img-thumbnail-custom {
            width: 60px;
            height: 60px;
            object-fit: cover;
            border-radius: 8px;
        }
        .action-icon {
            font-size: 1.1rem;
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
                            <i class="bi bi-box-seam me-2"></i>จัดการสินค้า
                        </h4>
                    </div>
                    <div class="col-md-6 text-md-end mt-3 mt-md-0">
                        <div class="btn-group" role="group">
                            <a href="index2.php" class="btn btn-outline-secondary">
                                <i class="bi bi-house-door"></i> หน้าหลัก
                            </a>
                            <a href="orders.php" class="btn btn-outline-warning">
                                <i class="bi bi-receipt"></i> ออเดอร์
                            </a>
                            <a href="customer.php" class="btn btn-outline-success">
                                <i class="bi bi-people"></i> ลูกค้า
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card-body">
                
                <div class="row mb-4">
                    <div class="col-md-6 mb-2 mb-md-0">
                        <a href="frm_product.php" class="btn btn-success">
                            <i class="bi bi-plus-circle me-1"></i> เพิ่มสินค้าใหม่
                        </a>
                    </div>
                    <div class="col-md-6">
                        <form action="" method="get">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="ค้นหาชื่อสินค้า..." name="q">
                                <button class="btn btn-primary" type="submit"><i class="bi bi-search"></i></button>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="table-responsive">
                    <table class="table table-hover align-middle">
                        <thead class="table-light">
                            <tr>
                                <th width="10%">รูปภาพ</th>
                                <th width="10%">ID</th>
                                <th width="35%">ชื่อสินค้า</th>
                                <th width="15%" class="text-end">ราคา</th>
                                <th width="15%" class="text-center">คงเหลือ</th>
                                <th width="15%" class="text-center">จัดการ</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            // $sql = "SELECT * FROM product";
                            // $result = mysqli_query($conn, $sql);
                            // while($row = mysqli_fetch_array($result)) {
                            ?>
                            
                            <tr>
                                <td>
                                    <img src="https://placehold.co/100x100" class="img-thumbnail-custom" alt="product">
                                </td>
                                <td>P-001</td>
                                <td>
                                    <div class="fw-bold">iPhone 15 Pro Max</div>
                                    <small class="text-muted">หมวดหมู่: มือถือ</small>
                                </td>
                                <td class="text-end">48,900 ฿</td>
                                <td class="text-center">
                                    <span class="badge bg-success rounded-pill">12 ชิ้น</span>
                                </td>
                                <td class="text-center">
                                    <div class="btn-group" role="group">
                                        <a href="frm_update_product.php?id=1" class="btn btn-sm btn-warning text-dark" title="แก้ไข">
                                            <i class="bi bi-pencil-square action-icon"></i>
                                        </a>
                                        <a href="delete_product.php?id=1" class="btn btn-sm btn-danger" title="ลบ" onclick="return confirm('ยืนยันการลบสินค้า?');">
                                            <i class="bi bi-trash action-icon"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <img src="https://placehold.co/100x100" class="img-thumbnail-custom" alt="product">
                                </td>
                                <td>P-002</td>
                                <td>
                                    <div class="fw-bold">Samsung Galaxy S24</div>
                                    <small class="text-muted">หมวดหมู่: มือถือ</small>
                                </td>
                                <td class="text-end">32,900 ฿</td>
                                <td class="text-center">
                                    <span class="badge bg-danger rounded-pill">หมด</span>
                                </td>
                                <td class="text-center">
                                    <div class="btn-group" role="group">
                                        <a href="#" class="btn btn-sm btn-warning text-dark"><i class="bi bi-pencil-square action-icon"></i></a>
                                        <a href="#" class="btn btn-sm btn-danger"><i class="bi bi-trash action-icon"></i></a>
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