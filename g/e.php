<?php
include_once("connectdb.php");

// 1. ดึงข้อมูล (รวมยอดขายตามประเทศ เรียงจากมากไปน้อย)
$sql = "SELECT p_country, SUM(p_amount) AS total FROM popsupermarket GROUP BY p_country ORDER BY total DESC";
$rs = mysqli_query($conn, $sql);

// 2. เตรียมข้อมูล (ใช้ array() แทน [] เพื่อแก้ Error ใน DW)
$labels = array();
$data_sales = array();
$raw_data = array();
$grand_total = 0;

while ($row = mysqli_fetch_assoc($rs)) {
    $labels[] = $row['p_country'];
    $data_sales[] = $row['total'];
    $raw_data[] = $row;
    $grand_total += $row['total'];
}
?>

<!doctype html>
<html lang="th">
<head>
    <meta charset="utf-8">
    <title>Sales Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Prompt:wght@300;400;600&display=swap" rel="stylesheet">
    
    <style>
        body { font-family: 'Prompt', sans-serif; background: linear-gradient(135deg, #8EC5FC 0%, #E0C3FC 100%); min-height: 100vh; padding: 30px; }
        .glass-box {
            background: rgba(255, 255, 255, 0.7); backdrop-filter: blur(10px);
            border-radius: 15px; border: 1px solid rgba(255,255,255,0.5);
            padding: 20px; margin-bottom: 20px; box-shadow: 0 4px 15px rgba(0,0,0,0.05);
        }
        canvas { max-height: 300px; }
        .table-head { background: #6c5ce7; color: white; }
    </style>
</head>

<body>
<div class="container">
    <h2 class="text-center text-white mb-4 text-shadow"><b>Dashboard รายงานยอดขาย</b></h2>

    <div class="row">
        <div class="col-md-6">
            <div class="glass-box text-center">
                <h5>สัดส่วนยอดขาย (Doughnut)</h5>
                <canvas id="chartPie"></canvas>
            </div>
        </div>
        <div class="col-md-6">
            <div class="glass-box text-center">
                <h5>เปรียบเทียบยอดขาย (Bar)</h5>
                <canvas id="chartBar"></canvas>
            </div>
        </div>
    </div>

    <div class="glass-box">
        <h5>ตารางสรุปยอดขายรวม: <?php echo number_format($grand_total); ?> บาท</h5>
        <table class="table table-hover mt-3">
            <thead class="table-head"><tr><th>ประเทศ</th><th class="text-end">ยอดขาย (บาท)</th></tr></thead>
            <tbody>
                <?php foreach ($raw_data as $item) { ?>
                <tr>
                    <td><?php echo $item['p_country']; ?></td>
                    <td class="text-end fw-bold"><?php echo number_format($item['total']); ?></td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    // รับค่าจาก PHP (ลดรูป JSON)
    const labels = <?php echo json_encode($labels); ?>;
    const datas = <?php echo json_encode($data_sales); ?>;
    
    // ตั้งค่าสีทีเดียว (ใช้ซ้ำได้)
    const bgColors = ['#FF6384', '#36A2EB', '#FFCE56', '#4BC0C0', '#9966FF', '#FF9F40', '#E7E9ED', '#71B37C'];

    // สร้างกราฟวงกลม
    new Chart(document.getElementById('chartPie'), {
        type: 'doughnut',
        data: { labels: labels, datasets: [{ data: datas, backgroundColor: bgColors }] },
        options: { plugins: { legend: { position: 'right' } } }
    });

    // สร้างกราฟแท่ง
    new Chart(document.getElementById('chartBar'), {
        type: 'bar',
        data: { 
            labels: labels, 
            datasets: [{ label: 'ยอดขาย', data: datas, backgroundColor: '#36A2EB', borderRadius: 5 }] 
        },
        options: { plugins: { legend: { display: false } }, scales: { y: { beginAtZero: true } } }
    });
</script>

</body>
</html>