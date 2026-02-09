<?php
    session_start();
    include_once("check_login.php");
?>


<!doctype html>
<html>

<head>
<meta charset="utf-8">
<title>วาสุเทพ ดวงแพงมาตร (โอเว่น)</title>
</head>

<body>
<h1>จัดการสินค้า <?php echo $_SESSION['aname']; ?></h1>
    
    <a href="index2.php"><button>หน้าหลักแอดมิน</button></a>
    <a href="orders.php"><button>จัดการออเดอร์</button></a>
    <a href="customer.php"><button>จัดการลูกค้า</button></a>
    <a href="logout.php"><button>ออกจากระบบ</button></a>

</body>

</html>