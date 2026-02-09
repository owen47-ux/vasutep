<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>วาสุเทพ ดวงแพงมาตร (โอเว่น)</title>
</head>

<body>
<h1>วาสุเทพ ดวงแพงมาตร (โอเว่น)</h1>

<table border="1">
<tr>
	<th>Order ID</th>
    <th>สินค้า</th>
    <th>ประเภทสินค้า</th>
    <th>วันที่</th>
    <th>ประเทศ</th>
    <th>จำนวนเงิน</th>
    <th>รูปสินค้า</th>
</tr>
<?php
	include_once("connectdb.php");
	//$sql = "SELECT * FROM `popsupermarket` where p_country = 'Germany' order by 'p_product_name' desc";
	//$sql = "SELECT * FROM `popsupermarket` where p_amount < 1000 ";
	//$sql = "SELECT * FROM `popsupermarket` where p_country = 'Sweden AND p_category= 'Vegetables' Order by p_product_name desc";
	$sql = "SELECT * FROM popsupermarket WHERE p_country='Sweden' AND p_category='Vegetables' ORDER BY p_product_name DESC";

	
	$rs = mysqli_query($conn,$sql);
	$total = 0;
	while ($data = mysqli_fetch_array($rs)){
		$total += $data['p_amount'];
?>
<tr>
	<td align="Center"><?php echo $data['p_order_id'];?></td>
    <td align="Center"><?php echo $data['p_product_name'];?></td>
    <td align="Center"><?php echo $data['p_category'];?></td>
    <td align="Center"><?php echo $data['p_date'];?></td>
    <td align="Center"><?php echo $data['p_country'];?></td>
    <td align="right"><?php echo number_format($data['p_amount'],0);?></td>
    <td><img src="<?php echo $data['p_product_name'];?>.png"width="50"></td>
</tr>
<?php } ?>

<tr>
	<th>&nbsp;</td>
    <th>&nbsp;</td>
    <th>&nbsp;</td>
    <th>&nbsp;</td>
    <th>&nbsp;</td>
    <th><b><?php echo number_format($total,0);?></b></td>
    <th>&nbsp;</td>
</tr>
</table>

</body>
</html>