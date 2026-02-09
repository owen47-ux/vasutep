<!doctype html>
<html lang="th">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>แบบฟอร์มสมัครสมาชิก - วาสุเทพ ดวงแพงมาตร (โอเว่น) -Gimini</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <link href="https://fonts.googleapis.com/css2?family=Prompt:wght@300;400;600&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Prompt', sans-serif;
            background-color: #f8f9fa;
            padding-top: 40px;
            padding-bottom: 40px;
        }
        .main-card {
            box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15);
            border: none;
            border-radius: 15px;
        }
        .card-header {
            background-color: #0d6efd;
            color: white;
            border-radius: 15px 15px 0 0 !important;
            padding: 1.5rem;
        }
        .color-preview {
            width: 30px;
            height: 30px;
            border-radius: 50%;
            display: inline-block;
            vertical-align: middle;
            border: 2px solid #ddd;
            margin-left: 10px;
        }
    </style>
</head>

<body>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            
            <div class="card main-card">
                <div class="card-header text-center">
                    <h2 class="mb-0">วาสุเทพ ดวงแพงมาตร (โอเว่น) Gimini</h2>
                    <small>ระบบรับสมัครสมาชิกออนไลน์</small>
                </div>
                <div class="card-body p-4">
                    
                    <form method="post" action="" class="needs-validation">
                        
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label for="fullname" class="form-label">ชื่อ-สกุล <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="fullname" name="fullname" required autofocus placeholder="ระบุชื่อและนามสกุล">
                            </div>

                            <div class="col-md-6">
                                <label for="phone" class="form-label">เบอร์โทร <span class="text-danger">*</span></label>
                                <input type="tel" class="form-control" id="phone" name="phone" required placeholder="0xx-xxx-xxxx">
                            </div>

                            <div class="col-md-6">
                                <label for="saraly" class="form-label">เงินเดือน <span class="text-danger">*</span></label>
                                <div class="input-group">
                                    <input type="number" class="form-control" id="saraly" name="saraly" required placeholder="0">
                                    <span class="input-group-text">บาท</span>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <label for="height" class="form-label">ความสูง <span class="text-danger">*</span></label>
                                <div class="input-group">
                                    <input type="number" class="form-control" id="height" name="height" step="5" max="220" min="50" required placeholder="ซม.">
                                    <span class="input-group-text">ซม.</span>
                                </div>
                                <div class="form-text">เพิ่มลดทีละ 5 ซม. (50 - 220)</div>
                            </div>

                            <div class="col-md-6">
                                <label for="major" class="form-label">สาขาวิชา</label>
                                <select class="form-select" id="major" name="major">
                                    <option value="การบัญชี">การบัญชี</option>
                                    <option value="การจัดการ">การจัดการ</option>
                                    <option value="การตลาด">การตลาด</option>
                                    <option value="การคอมพิวเตอร์ธุรกิจ">การคอมพิวเตอร์ธุรกิจ</option>
                                    <option value="การตลก">การตลก</option>
                                </select>
                            </div>

                            <div class="col-md-6">
                                <label for="color" class="form-label">สีที่ชอบ</label>
                                <input type="color" class="form-control form-control-color w-100" id="color" name="color" value="#563d7c" title="เลือกสีที่ชอบ">
                            </div>
                        </div>

                        <hr class="my-4">

                        <div class="d-flex flex-wrap gap-2 justify-content-center">
                            <button type="submit" name="Submit" class="btn btn-primary px-4">
                                สมัครสมาชิก
                            </button>
                            
                            <button type="reset" class="btn btn-secondary">
                                ล้างค่า (Reset)
                            </button>
                            
                            <button type="button" class="btn btn-outline-info" onclick="window.location='https://www.msu.ac.th';">
                                ไปยังเว็บไซต์ MSU
                            </button>
                            
                            <button type="button" class="btn btn-dark" onclick="window.print();">
                                พิมพ์หน้านี้
                            </button>
                        </div>

                    </form>
                </div>
            </div>
            <?php if(isset($_POST['Submit'])): ?>
                <?php
                    $fullname = htmlspecialchars($_POST['fullname']);
                    $phone = htmlspecialchars($_POST['phone']);
                    $saraly = htmlspecialchars($_POST['saraly']);
                    $height = htmlspecialchars($_POST['height']);
                    $color = htmlspecialchars($_POST['color']);
                    $major = htmlspecialchars($_POST['major']);
                ?>
                <div class="alert alert-success mt-4 shadow-sm" role="alert">
                    <h4 class="alert-heading"><i class="bi bi-check-circle-fill"></i> บันทึกข้อมูลสำเร็จ!</h4>
                    <p>ยินดีต้อนรับคุณ <strong><?php echo $fullname; ?></strong> เข้าสู่ระบบ</p>
                    <hr>
                    <div class="row">
                        <div class="col-md-6">
                            <ul class="list-unstyled mb-0">
                                <li><strong>เบอร์โทร:</strong> <?php echo $phone; ?></li>
                                <li><strong>สาขาวิชา:</strong> <?php echo $major; ?></li>
                                <li><strong>เงินเดือน:</strong> <?php echo number_format($saraly); ?> บาท</li>
                            </ul>
                        </div>
                        <div class="col-md-6">
                            <ul class="list-unstyled mb-0">
                                <li><strong>ความสูง:</strong> <?php echo $height; ?> ซม.</li>
                                <li class="d-flex align-items-center">
                                    <strong>สีที่ชอบ:</strong> 
                                    <span style="margin-left:5px;"><?php echo $color; ?></span>
                                    <span class="color-preview" style="background-color: <?php echo $color; ?>;"></span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            <?php endif; ?>

        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>