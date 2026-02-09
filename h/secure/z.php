<?php
$password = '4321'; 
$hash = password_hash($password, PASSWORD_DEFAULT);

echo "รหัสผ่านที่ต้องเอาไปใส่ในฐานข้อมูลคือ:<br><br>";
echo $hash;
?>