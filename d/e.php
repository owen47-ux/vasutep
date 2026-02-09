<!doctype html>
<html lang="th">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ร่วมงานกับเรา - TechNova Solutions</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Prompt:wght@300;400;500;600&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Prompt', sans-serif;
            background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
            min-height: 100vh;
            padding: 2rem 0;
        }
        .card-form {
            border: none;
            border-radius: 20px;
            box-shadow: 0 15px 35px rgba(0,0,0,0.1);
            overflow: hidden;
        }
        .header-bg {
            background: linear-gradient(90deg, #0d6efd 0%, #6610f2 100%);
            color: white;
            padding: 3rem 2rem;
            text-align: center;
        }
        .btn-submit {
            background: linear-gradient(90deg, #0d6efd 0%, #0a58ca 100%);
            border: none;
            padding: 12px 30px;
            font-weight: 500;
        }
        .btn-submit:hover {
            box-shadow: 0 5px 15px rgba(13, 110, 253, 0.4);
        }
        /* ปรับแต่ง Floating Label ให้ดูดีกับภาษาไทย */
        .form-floating > label {
            left: 5px;
        }
        .section-title {
            color: #0d6efd;
            font-weight: 600;
            margin-bottom: 1.5rem;
            border-bottom: 2px solid #e9ecef;
            padding-bottom: 0.5rem;
            display: inline-block;
        }
    </style>
</head>

<body>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-9">
            
            <form method="post" action="f.php" enctype="multipart/form-data">
                <div class="card card-form">
                    
                    <div class="header-bg">
                        <h1 class="display-6 fw-bold"><i class="bi bi-buildings"></i> TechNova Solutions</h1>
                        <p class="lead mb-0">แบบฟอร์มรับสมัครพนักงานใหม่ (Job Application)</p>
                    </div>

                    <div class="card-body p-4 p-md-5">
                        
                        <h5 class="section-title"><i class="bi bi-briefcase"></i> ข้อมูลการสมัคร</h5>
                        <div class="mb-4">
                            <div class="form-floating">
                                <select class="form-select" id="position" name="position" required>
                                    <option selected disabled value="">เลือกตำแหน่งที่ต้องการสมัคร...</option>
                                    <option value="Frontend Developer">Frontend Developer (นักพัฒนาหน้าเว็บไซต์)</option>
                                    <option value="Backend Developer">Backend Developer (นักพัฒนาระบบหลังบ้าน)</option>
                                    <option value="UX/UI Designer">UX/UI Designer (นักออกแบบประสบการณ์ผู้ใช้)</option>
                                    <option value="Digital Marketer">Digital Marketer (นักการตลาดดิจิทัล)</option>
                                    <option value="Project Manager">Project Manager (ผู้จัดการโครงการ)</option>
                                    <option value="Data Analyst">Data Analyst (นักวิเคราะห์ข้อมูล)</option>
                                </select>
                                <label for="position">ตำแหน่งที่ต้องการสมัคร <span class="text-danger">*</span></label>
                            </div>
                        </div>

                        <h5 class="section-title mt-4"><i class="bi bi-person-lines-fill"></i> ข้อมูลส่วนตัว</h5>
                        <div class="row g-3">
                            <div class="col-md-2">
                                <div class="form-floating">
                                    <select class="form-select" id="title_name" name="title_name" required>
                                        <option value="นาย">นาย</option>
                                        <option value="นาง">นาง</option>
                                        <option value="นางสาว">นางสาว</option>
                                    </select>
                                    <label for="title_name">คำนำหน้า</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="fullname" name="fullname" placeholder="ชื่อ-นามสกุล" required>
                                    <label for="fullname">ชื่อ-นามสกุล <span class="text-danger">*</span></label>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-floating">
                                    <input type="date" class="form-control" id="dob" name="dob" required>
                                    <label for="dob">วันเดือนปีเกิด <span class="text-danger">*</span></label>
                                </div>
                            </div>
                        </div>

                        <h5 class="section-title mt-5"><i class="bi bi-mortarboard"></i> คุณสมบัติและประสบการณ์</h5>
                        <div class="row g-3">
                            <div class="col-md-12">
                                <div class="form-floating">
                                    <select class="form-select" id="education" name="education" required>
                                        <option selected disabled value="">เลือกระดับการศึกษา...</option>
                                        <option value="มัธยมศึกษาตอนปลาย / ปวช.">มัธยมศึกษาตอนปลาย / ปวช.</option>
                                        <option value="อนุปริญญา / ปวส.">อนุปริญญา / ปวส.</option>
                                        <option value="ปริญญาตรี">ปริญญาตรี</option>
                                        <option value="ปริญญาโท">ปริญญาโท</option>
                                        <option value="ปริญญาเอก">ปริญญาเอก</option>
                                    </select>
                                    <label for="education">ระดับการศึกษาสูงสุด <span class="text-danger">*</span></label>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-floating">
                                    <textarea class="form-control" placeholder="ระบุความสามารถพิเศษ" id="skills" name="skills" style="height: 100px"></textarea>
                                    <label for="skills">ความสามารถพิเศษ (เช่น ภาษา, คอมพิวเตอร์, ขับรถ)</label>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-floating">
                                    <textarea class="form-control" placeholder="ระบุประสบการณ์ทำงาน" id="experience" name="experience" style="height: 120px"></textarea>
                                    <label for="experience">ประสบการณ์ทำงาน (ถ้ามี - ระบุชื่อบริษัทและตำแหน่ง)</label>
                                </div>
                            </div>
                        </div>

                        <div class="d-grid gap-2 d-md-flex justify-content-md-end mt-5">
                            <button class="btn btn-primary ..." type="submit" name="submit_application">
    <i class="bi bi-send-fill"></i> ส่งใบสมัคร
</button>
                            <button class="btn btn-primary btn-submit text-white" type="submit" name="submit_application">
                                <i class="bi bi-send-fill"></i> ส่งใบสมัคร
                            </button>
                        </div>

                    </div>
                </div>
            </form>

            <?php
            if(isset($_POST['submit_application'])){
                $position = $_POST['position'];
                $title_name = $_POST['title_name'];
                $fullname = $_POST['fullname'];
                $dob = $_POST['dob'];
                $education = $_POST['education'];
                $skills = empty($_POST['skills']) ? "-" : nl2br($_POST['skills']); // แปลงบรรทัดใหม่
                $experience = empty($_POST['experience']) ? "ไม่มีประสบการณ์" : nl2br($_POST['experience']);

                // คำนวณอายุคร่าวๆ
                $birthDate = new DateTime($dob);
                $today = new DateTime();
                $age = $today->diff($birthDate)->y;

                echo '
                <div class="alert alert-success mt-4 shadow-sm fade show" role="alert">
                    <h4 class="alert-heading"><i class="bi bi-check-circle-fill"></i> TechNova Solutions ได้รับใบสมัครของคุณแล้ว!</h4>
                    <p>ขอบคุณที่สนใจร่วมงานกับเรา ทางฝ่าย HR จะพิจารณาข้อมูลและติดต่อกลับโดยเร็วที่สุด</p>
                    <hr>
                    <div class="row">
                        <div class="col-md-6">
                            <strong>ผู้สมัคร:</strong> '.$title_name.$fullname.' (อายุ '.$age.' ปี)<br>
                            <strong>ตำแหน่ง:</strong> <span class="badge bg-primary">'.$position.'</span><br>
                            <strong>วุฒิการศึกษา:</strong> '.$education.'
                        </div>
                        <div class="col-md-6">
                            <strong>ความสามารถพิเศษ:</strong><br> <small class="text-muted">'.$skills.'</small><br>
                            <strong>ประสบการณ์:</strong><br> <small class="text-muted">'.$experience.'</small>
                        </div>
                    </div>
                </div>
                ';
            }
            ?>

        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>