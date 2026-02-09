<!doctype html>
<html lang="th">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>สรุปข้อมูลผู้สมัคร - TechNova Solutions</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Prompt:wght@300;400;500;600&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Prompt', sans-serif;
            background-color: #f0f2f5;
            padding: 2rem 0;
        }
        .resume-card {
            border: none;
            box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.1);
            border-radius: 12px;
            overflow: hidden;
        }
        .resume-header {
            background: linear-gradient(90deg, #2c3e50 0%, #3498db 100%);
            color: white;
            padding: 2rem;
            position: relative;
        }
        .profile-icon {
            font-size: 4rem;
            background: rgba(255,255,255,0.2);
            width: 100px;
            height: 100px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
            margin-bottom: 1rem;
        }
        .data-label {
            color: #6c757d;
            font-size: 0.9rem;
            margin-bottom: 0.2rem;
        }
        .data-value {
            font-size: 1.1rem;
            font-weight: 500;
            color: #212529;
            margin-bottom: 1rem;
        }
        .badge-position {
            background-color: rgba(255,255,255,0.2);
            border: 1px solid rgba(255,255,255,0.5);
            padding: 0.5em 1em;
            border-radius: 20px;
        }
    </style>
</head>

<body>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-8">

        <?php
        // ตรวจสอบว่ามีการส่งข้อมูลมาหรือไม่
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // รับค่าและป้องกัน XSS (Security)
            $position = htmlspecialchars($_POST['position']);
            $title_name = htmlspecialchars($_POST['title_name']);
            $fullname = htmlspecialchars($_POST['fullname']);
            $dob = $_POST['dob'];
            $education = htmlspecialchars($_POST['education']);
            
            // จัดการกับการเว้นบรรทัด (Textarea)
            $skills = empty($_POST['skills']) ? "-" : nl2br(htmlspecialchars($_POST['skills']));
            $experience = empty($_POST['experience']) ? "ไม่มีประสบการณ์" : nl2br(htmlspecialchars($_POST['experience']));

            // คำนวณอายุ
            $birthDate = new DateTime($dob);
            $today = new DateTime();
            $age = $today->diff($birthDate)->y;
            
            // แปลงวันที่เป็นรูปแบบไทย (ฟังก์ชันเสริม)
            $thai_months = array(
    1=>"ม.ค.", 2=>"ก.พ.", 3=>"มี.ค.", 4=>"เม.ย.", 5=>"พ.ค.", 6=>"มิ.ย.", 
    7=>"ก.ค.", 8=>"ส.ค.", 9=>"ก.ย.", 10=>"ต.ค.", 11=>"พ.ย.", 12=>"ธ.ค."
);
            $y = $birthDate->format("Y") + 543;
            $m = $thai_months[$birthDate->format("n")];
            $d = $birthDate->format("j");
            $thai_dob = "$d $m $y";

        ?>
            <div class="card resume-card animate-slide-in">
                
                <div class="resume-header text-center">
                    <div class="d-flex justify-content-center">
                        <div class="profile-icon">
                            <i class="bi bi-person-fill"></i>
                        </div>
                    </div>
                    <h2 class="mb-1"><?php echo $title_name . $fullname; ?></h2>
                    <span class="badge-position">
                        <i class="bi bi-star-fill me-1"></i> สมัครตำแหน่ง: <?php echo $position; ?>
                    </span>
                </div>

                <div class="card-body p-4 p-md-5">
                    
                    <h5 class="text-primary mb-4 border-bottom pb-2"><i class="bi bi-person-badge"></i> ข้อมูลส่วนตัว</h5>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="data-label">วันเดือนปีเกิด</div>
                            <div class="data-value"><?php echo $thai_dob; ?> (อายุ <?php echo $age; ?> ปี)</div>
                        </div>
                        <div class="col-md-6">
                            <div class="data-label">ระดับการศึกษาสูงสุด</div>
                            <div class="data-value"><?php echo $education; ?></div>
                        </div>
                    </div>

                    <h5 class="text-primary mb-4 border-bottom pb-2 mt-4"><i class="bi bi-tools"></i> ความสามารถพิเศษ</h5>
                    <div class="p-3 bg-light rounded border-start border-4 border-info mb-4">
                        <?php echo $skills; ?>
                    </div>

                    <h5 class="text-primary mb-4 border-bottom pb-2"><i class="bi bi-briefcase-fill"></i> ประสบการณ์ทำงาน</h5>
                    <div class="p-3 bg-light rounded border-start border-4 border-warning">
                        <?php echo $experience; ?>
                    </div>

                    <hr class="my-5">

                    <div class="d-flex justify-content-center gap-3 no-print">
                        <button onclick="window.print()" class="btn btn-outline-dark">
                            <i class="bi bi-printer"></i> พิมพ์ใบสมัคร
                        </button>
                        <button onclick="history.back()" class="btn btn-primary">
                            <i class="bi bi-arrow-left"></i> กลับไปแก้ไข
                        </button>
                    </div>

                </div>
            </div>

        <?php 
        } else { 
            // กรณีเข้าไฟล์นี้โดยตรงไม่ได้ผ่านฟอร์ม
            echo '<div class="alert alert-warning text-center">ไม่พบข้อมูล กรุณากรอกข้อมูลผ่านแบบฟอร์ม <br><a href="index.php" class="btn btn-warning mt-2">ไปที่แบบฟอร์ม</a></div>';
        } 
        ?>

        </div>
    </div>
</div>

</body>
</html>