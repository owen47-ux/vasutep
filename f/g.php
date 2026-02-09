<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>วาสุเทพ ดวงแพงมาตร (โอเว่น)</title>
</head>

<body>
<h1>วาสุเทพ ดวงแพงมาตร (โอเว่น)</h1>
<form method="post" action="">
กรอกตัวเลขนะจ๊ะ<input type="number" max="1000" min="2"name="a" autofocus required>
<button type="submit"name="Submit">OK</button>
</form>
<hr>
<?php
	if(isset($_POST['Submit'])){
		$m = $_POST['a'];
		
		for($x=1;$x<=12;$x++){
			$b= $m*$x;
			echo "{$m} x {$x} = {$b} <br>";
			}
		
}
?>
</body>
</html>