<!doctype html>
<html lang="th">
<head>
<meta charset="utf-8">
<title>วาสุเทพ ดวงแพงมาตร (โอเว่น) -ChatGPT</title>

<!-- Bootstrap 5.3 -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

<div class="container py-5">

    <div class="card shadow-lg border-0">
        <div class="card-header bg-primary text-white text-center">
            <h2 class="my-2">แบบฟอร์มสมัครสมาชิก ChatGPT</h2>
        </div>

        <div class="card-body p-4">

            <form method="post" action="">

                <div class="mb-3">
                    <label class="form-label">ชื่อ-สกุล</label>
                    <input type="text" name="fullname" class="form-control" required autofocus>
                </div>

                <div class="mb-3">
                    <label class="form-label">เบอร์โทร</label>
                    <input type="text" name="phone" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">เงินเดือน (บาท)</label>
                    <input type="number" name="saraly" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">ความสูง (ซม.)</label>
                    <input type="number" name="height" step="5" max="220" min="50" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">สีที่ชอบ</label>
                    <input type="color" name="color" class="form-control form-control-color">
                </div>

                <div class="mb-3">
                    <label class="form-label">สาขาวิชา</label>
                    <select name="major" class="form-select">
                        <option value="การบัญชี">การบัญชี</option>
                        <option value="การจัดการ">การจัดการ</option>
                        <option value="การตลาด">การตลาด</option>
                        <option value="การคอมพิวเตอร์ธุรกิจ">การคอมพิวเตอร์ธุรกิจ</option>
                        <option value="การตลก">การตลก</option>
                    </select>
                </div>

                <div class="d-flex gap-2 mt-4">
                    <button type="submit" name="Submit" class="btn btn-success w-100">สมัครสมาชิก</button>
                    <button type="reset" class="btn btn-secondary w-100">รีเซ็ต</button>
                </div>

                <div class="d-flex gap-2 mt-3">
                    <button type="button" onclick="window.location='https://www.msu.ac.th';" class="btn btn-info w-100 text-white">ไปยัง MSU</button>
                    <button type="button" onclick="window.print();" class="btn btn-dark w-100">พิมพ์</button>
                </div>

            </form>
        </div>
    </div>

    <div class="mt-4">
        <hr>
        <?php
        if(isset($_POST['Submit'])){
            $fullname= $_POST['fullname'];
            $phone= $_POST['phone'];
            $saraly= $_POST['saraly'];
            $height= $_POST['height'];
            $color= $_POST['color'];
            $major= $_POST['major'];

            echo "<div class='alert alert-primary mt-3'>";
            echo "<h5>ผลการส่งข้อมูล</h5>";
            echo "ชื่อ-สกุล: ".$fullname."<br>";
            echo "เบอร์โทร: ".$phone."<br>";
            echo "เงินเดือน: ".$saraly." บาท<br>";
            echo "ความสูง: ".$height." ซม.<br>";
            echo "สีที่ชอบ: ".$color." <div style='background:{$color}; width:30px; height:30px; border-radius:5px; display:inline-block;'></div><br>";
            echo "สาขาวิชา: ".$major."<br>";
            echo "</div>";
        }
        ?>
    </div>

</div>

</body>
</html>
