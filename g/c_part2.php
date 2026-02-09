<!doctype html>
<html lang="th">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ค้นหาข้อมูลยอดขาย - วาสุเทพ ดวงแพงมาตร (โอเว่น)</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap5.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Prompt:wght@300;400;500;600&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Prompt', sans-serif;
            background: linear-gradient(135deg, #fdfbfb 0%, #ebedee 100%);
            min-height: 100vh;
            padding-top: 2rem;
        }
        .main-card {
            border: none;
            border-radius: 20px;
            box-shadow: 0 15px 35px rgba(0,0,0,0.05);
            background: white;
            overflow: hidden;
        }
        .header-section {
            background: linear-gradient(90deg, #2193b0 0%, #6dd5ed 100%);
            padding: 30px;
            color: white;
            text-align: center;
        }
        .search-box {
            max-width: 600px;
            margin: -25px auto 30px; /* ดึงขึ้นไปทับ Header */
            background: white;
            padding: 20px;
            border-radius: 15px;
            box-shadow: 0 10px 20px rgba(0,0,0,0.1);
        }
        .product-img {
            width: 50px;
            height: 50px;
            object-fit: cover;
            border-radius: 12px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
            transition: transform 0.2s;
        }
        .product-img:hover {
            transform: scale(1.5);
            z-index: 10;
        }
        .table thead th {
            background-color: #f8f9fa;
            font-weight: 600;
            color: #495057;
        }
        .total-row {
            background-color: #e3f2fd !important;
            font-weight: bold;
            color: #0d47a1;
            font-size: 1.1em;
        }
    </style>
</head>

<body>

<div class="container mb-5">
    <div class="main-card">
        
        <div class="header-section">
            <h2 class="fw-bold mb-4">ระบบค้นหายอดขายสินค้า</h2>
            <p class="mb-5"><i class="bi bi-person-circle"></i> วาสุเทพ ดวงแพงมาตร (โอเว่น)</p>
        </div>

        <div class="search-box">
            <form method="post" action="">
                <label class="form-label text-muted small fw-bold">ระบุคำค้นหา (ชื่อสินค้า, ประเภท, หรือประเทศ)</label>
                <div class="input-group input-group-lg">
                    <span class="input-group-text bg-white border-end-0 text-primary">
                        <i class="bi bi-search"></i>
                    </span>
                    <input type="text" name="a" class="form-control border-start-0 ps-0" 
                           placeholder="พิมพ์คำค้นหาที่นี่..." 
                           value="<?php echo isset($_POST['a']) ? $_POST['a'] : ''; ?>" 
                           autofocus>
                    <button type="submit" name="Submit" class="btn btn-primary px-4 rounded-end">
                        ค้นหา
                    </button>
                </div>
            </form>
        </div>

        <div class="card-body p-4">
            <div class="table-responsive">
                <table id="resultTable" class="table table-hover align-middle" style="width:100%">
                    <thead class="table-light">
                        <tr>
                            <th class="text-center">Order ID</th>
                            <th class="text-center">รูปภาพ</th>
                            <th>สินค้า</th>
                            <th>ประเภทสินค้า</th>
                            <th class="text-center">วันที่</th>
                            <th class="text-center">ประเทศ</th>
                            <th class="text-end">จำนวนเงิน</th>
                        </tr>
                    </thead>
                    <tbody>
                    
                    <?php
                        include_once("connectdb.php");
                        
                        // รับค่าค้นหา และป้องกัน SQL Injection
                        $kw = isset($_POST['a']) ? $_POST['a'] : '';
                        $kw = mysqli_real_escape_string($conn, $kw); // เพิ่มความปลอดภัย

                        $sql = "SELECT * FROM popsupermarket 
                                WHERE p_product_name LIKE '%{$kw}%' 
                                OR p_category LIKE '%{$kw}%' 
                                OR p_country LIKE '%{$kw}%' ";
                        
                        $rs = mysqli_query($conn, $sql);
                        $total = 0;
                        
                        while ($data = mysqli_fetch_array($rs)){
                            $total += $data['p_amount'];
                            
                            // สุ่มสี Badge ตามประเภท (เพื่อให้ดูสวยงามขึ้น)
                            $badgeClass = 'bg-secondary';
                            if($data['p_category'] == 'Vegetables') $badgeClass = 'bg-success';
                            elseif($data['p_category'] == 'Fruits') $badgeClass = 'bg-warning text-dark';
                            elseif($data['p_category'] == 'Meat') $badgeClass = 'bg-danger';
                    ?>
                        <tr>
                            <td class="text-center text-muted">#<?php echo $data['p_order_id'];?></td>
                            <td class="text-center">
                                <img src="<?php echo $data['p_product_name'];?>.png" 
                                     class="product-img"
                                     onerror="this.onerror=null;this.src='https://via.placeholder.com/50?text=IMG';"> 
                            </td>
                            <td class="fw-bold text-primary"><?php echo $data['p_product_name'];?></td>
                            <td>
                                <span class="badge rounded-pill <?php echo $badgeClass; ?>">
                                    <?php echo $data['p_category'];?>
                                </span>
                            </td>
                            <td class="text-center text-secondary">
                                <i class="bi bi-calendar-event me-1"></i>
                                <?php echo $data['p_date'];?>
                            </td>
                            <td class="text-center">
                                <span class="badge bg-light text-dark border">
                                    <?php echo $data['p_country'];?>
                                </span>
                            </td>
                            <td class="text-end fw-bold text-success">
                                <?php echo number_format($data['p_amount'],0);?> ฿
                            </td>
                        </tr>
                    <?php } ?>
                    
                    </tbody>
                    <tfoot>
                        <tr class="total-row">
                            <td colspan="6" class="text-end text-uppercase">ยอดรวมทั้งหมดจากการค้นหา</td>
                            <td class="text-end"><?php echo number_format($total,0);?> ฿</td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
    
    <div class="text-center mt-3 text-muted small">
        &copy; <?php echo date("Y"); ?> Data System by Wasuthep (Owen)
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap5.min.js"></script>

<script>
    $(document).ready(function() {
        $('#resultTable').DataTable({
            "language": {
                "url": "//cdn.datatables.net/plug-ins/1.13.7/i18n/th.json"
            },
            "searching": false, // ปิดการค้นหาของ DataTables (เพราะเราใช้ PHP Search ด้านบนแล้ว)
            "lengthChange": false, // ปิดการเปลี่ยนจำนวนแถว (ถ้าอยากให้หน้าสะอาด)
            "pageLength": 10
        });
    });
</script>

</body>
</html>