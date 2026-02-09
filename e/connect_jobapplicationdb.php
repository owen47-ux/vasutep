<?php
$servername = "localhost";
$username = "root";
$password = "chinnapat";
$dbname = "4114db"; // ตรวจสอบชื่อ DB ให้ตรงกับของคุณ

$conn = mysqli_connect($servername, $username, $password, $dbname);

// ตั้งค่าภาษาไทย
mysqli_set_charset($conn, "utf8");

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>