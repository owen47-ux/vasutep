<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>วาสุเทพ ดวงแพงมาตร (โอเว่น)</title>
</head>

<body>
<h1>วาสุเทพ ดวงแพงมาตร (โอเว่น)</h1>


<form method="post" action="">
กรอกตัวเลขนะจ๊ะ<input type="number"name="a" autofocus required>
<button type="submit"name="Submit">OK</button>
</form>
<hr>

<?php
if(isset($_POST['Submit']))
	{$sex = $_POST['a'];
	
	if ($sex == 1) {
		echo "เพศชาย" ;
	} else if($sex == 2){
		echo "เพศหญิง";
	} else if($sex == 2){
		echo "เพศที่สาม";
	} else {
		echo "ไม่ทราบ";
	}
	
}
?>

</body>
</html>