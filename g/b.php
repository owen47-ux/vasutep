<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>วาสุเทพ ดวงแพงมาตร (โอเว่น)</title>
</head>

<body>
<h1>วาสุเทพ ดวงแพงมาตร (โอเว่น)</h1>

<form method="post" action="">
ค้นหา <input type="" name="a" autofocus >
<button type="submit" name="Submit">OK </button>
</form>
<hr>

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
    @$kw = $_POST['a'];
    //$sql = "SELECT * FROM popsupermarket ";
    $sql = "SELECT * FROM popsupermarket 
    WHERE p_product_name LIKE '%{$kw}%' 
    OR p_category LIKE '%{$kw}%' 
    OR p_country LIKE '%{$kw}%' ";
    $rs = mysqli_query($conn, $sql);
    $total = 0;
    while ($data = mysqli_fetch_array($rs)){
        $total += $data['p_amount'];
?>

<tr>
    <td><?php echo $data['p_order_id'];?></td>
    <td><?php echo $data['p_product_name'];?></td>
    <td><?php echo $data['p_category'];?></td>
    <td><?php echo $data['p_date'];?></td>
    <td><?php echo $data['p_country'];?></td>
    <td align="right"><?php echo number_format($data['p_amount'],0);?></td>
    <td><img src ="<?php echo $data['p_product_name'];?>.png" width="50"></td>
</tr>
<?php } ?>

<tr>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td align="right"><b><?php echo number_format($total,0);?></b></td>
    <td></td>
</tr>
</table>
</body>

</html>