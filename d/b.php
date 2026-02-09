<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>วาสุเทพ ดวงแพงมาตร (โอเว่น)</title>
</head>

<body>

<h1>วาสุเทพ ดวงแพงมาตร (โอเว่น)</h1>
<form method="post" action="">


ชื่อ-สกุล <input type="text" name="fullname" required autofocus>*<br>
เบอร์โทร<input type="text" name="phone" required>*<br>
เงินเดือน<input type="number" name="saraly" required>บาท*<br>
ความสูง <input type="number" name="height" step="5" max= "220" min = "50"required>ซม.*<br>
สีที่ชอบ <input type="color"name="color"><br>
สาขาวิชา
<select name = "major">
	<option value="การบัญชี">การบัญชี</option>
    <option value="การจัดการ">การจัดการ</option>
    <option value="การตลาด">การตลาด</option>
    <option value="การคอมพิวเตอร์ธุรกิจ">การคอมพิวเตอร์ธุรกิจ</option>
    <option value="การตลก">การตลก</option>
</select><br>
 <!--<input type="submit" name="Submit"value = "สมัครสมาชิก">!-->
 <button type ="submit" name="Submit"> สมัครสมาชิก</button>
 
 <button type="reset">Reset</button>
 <button type="button"onclick="window.location='https://www.msu.ac.th';">go ro MSU</button>
 <button type="button"onclick="window.print();">พิมพ์</button>
 

</form>

<hr>
<?php
if(isset($_POST['Submit'])){
	$fullname= $_POST['fullname'];
	$phone= $_POST['phone'];
	$saraly= $_POST['saraly'];
	$height= $_POST['height'];
	$color= $_POST['color'];
	$major= $_POST['major'];
	
	
	echo "ชื่อ-สกุล:".$fullname."<br>";
	echo "เบอร์โทร:".$phone."<br>";
	echo "เงินเดือน:".$saraly."บาท.<br>";
	echo "ความสูง:".$height."ซม.<br>";
	echo "สีที่ชอบ:".$color."<div style='background:{$color}'>.</div>";
	echo "สาขาวิชา:".$major."<br>";
}
?>
</body>
</html>
