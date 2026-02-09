<?php
include_once("connectdb.php");

// ตรวจสอบการเชื่อมต่อ (เผื่อ connectdb.php มีปัญหา)
if (!isset($conn)) {
    die("Error: ไม่พบการเชื่อมต่อฐานข้อมูล กรุณาตรวจสอบไฟล์ connectdb.php");
}

// รับค่าค้นหา
$kw = isset($_POST['a']) ? $_POST['a'] : '';
// ป้องกัน SQL Injection
$kw = mysqli_real_escape_string($conn, $kw);

// คำสั่ง SQL
$sql = "SELECT * FROM popsupermarket 
        WHERE p_product_name LIKE '%$kw%' 
        OR p_category LIKE '%$kw%' 
        OR p_country LIKE '%$kw%' ";

$rs = mysqli_query($conn, $sql);

// ดึงข้อมูลใส่ Array เพื่อคำนวณยอดสรุป
$data_list = array();
$total_sales = 0;
$total_orders = 0;
$max_sale = 0;

if ($rs) {
    while ($row = mysqli_fetch_assoc($rs)) {
        $data_list[] = $row;
        $total_sales += $row['p_amount'];
        if ($row['p_amount'] > $max_sale) {
            $max_sale = $row['p_amount'];
        }
    }
    $total_orders = count($data_list);
}
?>

<!doctype html>
<html lang="th">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard - วาสุเทพ ดวงแพงมาตร (โอเว่น)</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap5.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Prompt:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <style>
        :root {
            --primary-gradient: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            --glass-bg: rgba(255, 255, 255, 0.85);
            --glass-border: 1px solid rgba(255, 255, 255, 0.4);
        }

        body {
            font-family: 'Prompt', sans-serif;
            background: linear-gradient(-45deg, #ee7752, #e73c7e, #23a6d5, #23d5ab);
            background-size: 400% 400%;
            animation: gradientBG 15s ease infinite;
            min-height: 100vh;
            padding-bottom: 50px;
        }

        @keyframes gradientBG {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }

        /* Glassmorphism Card */
        .glass-card {
            background: var(--glass-bg);
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
            border-radius: 20px;
            border: var(--glass-border);
            box-shadow: 0 8px 32px 0 rgba(31, 38, 135, 0.15);
            transition: transform 0.3s ease;
        }

        /* Stat Cards */
        .stat-card {
            border: none;
            border-radius: 15px;
            color: white;
            overflow: hidden;
            position: relative;
            transition: all 0.3s;
        }
        .stat-card:hover { transform: translateY(-5px); box-shadow: 0 10px 20px rgba(0,0,0,0.2); }
        .bg-gradient-1 { background: linear-gradient(45deg, #11998e, #38ef7d); }
        .bg-gradient-2 { background: linear-gradient(45deg, #FF512F, #DD2476); }
        .bg-gradient-3 { background: linear-gradient(45deg, #4568DC, #B06AB3); }
        
        .stat-icon {
            position: absolute;
            right: 15px;
            top: 50%;
            transform: translateY(-50%);
            font-size: 3rem;
            opacity: 0.3;
        }

        /* Search Box */
        .search-input {
            border-radius: 50px;
            padding: 15px 25px;
            border: none;
            box-shadow: 0 5px 15px rgba(0,0,0,0.05);
        }
        .btn-search {
            border-radius: 50px;
            padding: 12px 30px;
            background: var(--primary-gradient);
            border: none;
            font-weight: 600;
        }

        /* Product Image */
        .product-img {
            width: 45px;
            height: 45px;
            border-radius: 10px;
            object-fit: cover;
            cursor: pointer;
            transition: transform 0.2s;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
        }
        .product-img:hover { transform: scale(1.2) rotate(3deg); }

        /* Table Styling */
        table.dataTable thead th {
            background-color: rgba(248, 249, 250, 0.5) !important;
            border-bottom: 2px solid #e9ecef;
            color: #444;
        }
        .table-hover tbody tr:hover {
            background-color: rgba(255, 255, 255, 0.6);
            transform: scale(1.005);
            transition: 0.2s;
        }
        
        /* Badge Custom */
        .badge-soft {
            padding: 8px 12px;
            border-radius: 8px;
            font-weight: 500;
        }
    </style>
</head>

<body>

<div class="container py-5">
    
    <div class="text-center text-white mb-5">
        <h1 class="fw-bold display-5 text-shadow">ระบบรายงานยอดขายสินค้า</h1>
        <p class="fs-5 opacity-75"><i class="bi bi-code-slash"></i> Developed by Wasuthep (Owen)</p>
    </div>

    <div class="row g-4 mb-5">
        <div class="col-md-4">
            <div class="card stat-card bg-gradient-1 p-4">
                <h6 class="text-uppercase mb-2">ยอดขายรวม (Total Sales)</h6>
                <h2 class="fw-bold mb-0"><?php echo number_format($total_sales, 0); ?> ฿</h2>
                <i class="bi bi-cash-coin stat-icon"></i>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card stat-card bg-gradient-2 p-4">
                <h6 class="text-uppercase mb-2">จำนวนรายการ (Orders)</h6>
                <h2 class="fw-bold mb-0"><?php echo number_format($total_orders); ?> รายการ</h2>
                <i class="bi bi-cart-check stat-icon"></i>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card stat-card bg-gradient-3 p-4">
                <h6 class="text-uppercase mb-2">ยอดสูงสุดต่อบิล (Max)</h6>
                <h2 class="fw-bold mb-0"><?php echo number_format($max_sale, 0); ?> ฿</h2>
                <i class="bi bi-graph-up-arrow stat-icon"></i>
            </div>
        </div>
    </div>

    <div class="glass-card p-4 p-lg-5">
        
        <form method="post" action="" class="mb-5 position-relative">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="input-group">
                        <input type="text" name="a" class="form-control search-input" 
                               placeholder="🔍 ค้นหาสินค้า, ประเภท หรือประเทศ..." 
                               value="<?php echo htmlspecialchars($kw); ?>" autofocus>
                        <button type="submit" name="Submit" class="btn btn-primary btn-search text-white ms-2">
                            ค้นหาข้อมูล
                        </button>
                    </div>
                </div>
            </div>
        </form>

        <div class="table-responsive">
            <table id="salesTable" class="table table-hover align-middle w-100">
                <thead>
                    <tr>
                        <th class="text-center">ID</th>
                        <th class="text-center">รูปสินค้า</th>
                        <th>ชื่อสินค้า</th>
                        <th>หมวดหมู่</th>
                        <th class="text-center">วันที่ขาย</th>
                        <th class="text-center">ประเทศ</th>
                        <th class="text-end">ยอดขาย (บาท)</th>
                    </tr>
                </thead>
                <tbody>
                <?php 
                if(!empty($data_list)) {
                    foreach ($data_list as $data) { 
                        // Logic เลือกสี Badge
                        $badge_class = 'bg-secondary';
                        $icon_cat = 'bi-box';
                        if($data['p_category'] == 'Vegetables') { $badge_class = 'bg-success bg-opacity-10 text-success'; $icon_cat = 'bi-flower1'; }
                        elseif($data['p_category'] == 'Fruits') { $badge_class = 'bg-warning bg-opacity-10 text-warning'; $icon_cat = 'bi-apple'; }
                        elseif($data['p_category'] == 'Meat') { $badge_class = 'bg-danger bg-opacity-10 text-danger'; $icon_cat = 'bi-egg-fried'; }
                ?>
                    <tr>
                        <td class="text-center text-muted">#<?php echo $data['p_order_id'];?></td>
                        <td class="text-center">
                            <img src="<?php echo $data['p_product_name'];?>.png" 
                                 class="product-img"
                                 onclick="showImage('<?php echo $data['p_product_name'];?>')"
                                 onerror="this.onerror=null;this.src='https://via.placeholder.com/150/e9ecef/868e96?text=No+Img';">
                        </td>
                        <td class="fw-bold text-dark"><?php echo $data['p_product_name'];?></td>
                        <td>
                            <span class="badge <?php echo $badge_class; ?> badge-soft">
                                <i class="bi <?php echo $icon_cat; ?>"></i> <?php echo $data['p_category'];?>
                            </span>
                        </td>
                        <td class="text-center text-secondary small">
                            <?php echo date("d/m/Y", strtotime($data['p_date'])); ?>
                        </td>
                        <td class="text-center">
                            <span class="badge bg-light text-dark border rounded-pill px-3">
                                <?php echo $data['p_country'];?>
                            </span>
                        </td>
                        <td class="text-end fw-bold text-primary">
                            <?php echo number_format($data['p_amount'], 0);?>
                        </td>
                    </tr>
                <?php 
                    } 
                } 
                ?>
                </tbody>
            </table>
        </div>

    </div>
    
    <div class="text-center mt-4 text-white opacity-75 small">
        &copy; <?php echo date("Y"); ?> Data System designed by Wasuthep (Owen)
    </div>

</div>

<div class="modal fade" id="imageModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content bg-transparent border-0">
      <div class="modal-body text-center">
        <img id="modalImagePreview" src="" class="img-fluid rounded-3 shadow-lg" style="max-height: 80vh;">
        <h5 class="mt-3 text-white text-shadow" id="modalImageTitle"></h5>
      </div>
    </div>
  </div>
</div>

<script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap5.min.js"></script>

<script>
    // ส่วนทำงานเมื่อเว็บโหลดเสร็จ
    $(document).ready(function() {
        $('#salesTable').DataTable({
            "language": {
                "url": "//cdn.datatables.net/plug-ins/1.13.7/i18n/th.json"
            },
            "pageLength": 10,
            "lengthMenu": [10, 20, 50],
            "searching": false, 
            "dom": '<"d-flex justify-content-between mb-3"l>rtip' 
        });
    });

    // ฟังก์ชันโชว์รูปใน Modal (ย้ายออกมาข้างนอก document.ready แล้ว)
    function showImage(productName) {
        // เปลี่ยน let เป็น var เพื่อรองรับ Dreamweaver รุ่นเก่า
        var imgSrc = productName + ".png";
        
        $('#modalImagePreview').attr('src', imgSrc);
        $('#modalImageTitle').text(productName);
        
        // เช็คว่าถ้าโหลดรูปไม่ได้ ให้โชว์ placeholder ใน modal แทน
        $('#modalImagePreview').off('error').on('error', function(){
            $(this).attr('src', 'https://via.placeholder.com/400?text=Image+Not+Found');
        });

        var myModal = new bootstrap.Modal(document.getElementById('imageModal'));
        myModal.show();
    }
</script>

</body>
</html>