<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>วาสุเทพ ดวงแพงมาตร (โอเว่น)</title>
</head>

<body>
<h1>วาสุเทพ ดวงแพงมาตร (โอเว่น)</h1>
<form method="post" action="">
กรอกตัวเลขนะจ๊ะ<input type="number" max="100" min="0"name="a" autofocus required>
<button type="submit"name="Submit">OK</button>
</form>
<hr>
<?php
	if(isset($_POST['Submit'])){
		$score = $_POST['a'];
	if ($score > 100){
		echo "คะแนนของคุณเกินกว่าความเป็นจริง!!";
		$grade = "ไม่แสดง";
	} else if ($score >= 80) {
	$grade = "A" ;
	} else if ($score >= 70) {
	$grade = "B" ;
	} else if ($score >= 60) {
	$grade = "C" ;
	} else if ($score >= 50) {
	$grade = "D" ;
	} else if($score <=49){
	$grade = "F" ;
	} else 
		$grade = "ไม่แสดง" ;
	echo "คะแนนของคุณได้ $score ได้เกรด $grade" ;
		
}
?>
</body>
</html>