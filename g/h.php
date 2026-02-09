<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>วาสุเทพ ดวงแพงมาตร (โอเว่น)</title>
</head>

<body>
<h1>วาสุเทพ ดวงแพงมาตร (โอเว่น)</h1>
<form method="post" action="">
กรอกรหัสนิสิต<input type="number" name="a" autofocus required>
<button type="submit"name="Submit">OK</button>
</form>
<hr>
<?php
	if(isset($_POST['Submit'])){
		$id = $_POST['a'];
		$x = substr($id,0,2);
		echo"<img src=' http://202.28.32.211/picture/student/{$x}/{$id}.jpg'width='400'>";
		
		
}
?>
</body>
</html>