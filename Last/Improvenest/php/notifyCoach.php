<?php
include 'conn.php';
session_start();
$uname = $_SESSION['uname'];
$iid = $_SESSION['iid'];
$quantity = $_SESSION['quantity'];
$amount = $_SESSION['amount'];
$address = $_SESSION['address'];
date_default_timezone_set('Asia/Colombo');
$date = date('Y-m-d', time());
$time = date("H:i:s", time());
$new_stock=0;
$stock=0;

$sql = "SELECT * FROM item WHERE item_id = '".$iid."'";

$result = $conn->query($sql);

if($result->num_rows > 0)
{
	while($row = $result->fetch_assoc())
	{
		$name = $row["name"];
		$stock = $row["stock"];
	}
}
$new_stock = $stock - $quantity;

$notification = "You have successfully purchased a number of $quantity items from the product $name (Product-Code : $iid), for a net total of LKR $amount";

$sql = "INSERT INTO purchase (buyer_username,item_id,quantity,total,delivery_address,date,time) VALUES ('$uname','$iid','$quantity','$amount','$address','$date','$time');";
$sql .= "INSERT INTO coach_notification (coach_username,date,time,notification) VALUES ('$uname','$date','$time','$notification');";
$sql .= "UPDATE item SET stock = '".$new_stock."' WHERE item_id = '".$iid."';";

if($conn->multi_query($sql))
{
	echo "<script type='text/javascript'>alert('Product Purchasing Successfull'); window.location.href='http://localhost/Improvenest/coach/shops.php';</script>";
}
else
{
	echo "<script type='text/javascript'>alert('Failed to purchase product'); window.location.href='http://localhost/Improvenest/coach/shops.php';</script>";
}

mysqli_close($conn);
?>
