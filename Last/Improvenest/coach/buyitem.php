<?php
include '../php/conn.php';
header('Cache-Control: no cache'); //no cache
session_cache_limiter('private_no_expire'); // works
//session_cache_limiter('public'); // works too

?>

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="../css/headfoot.css">
<link rel="stylesheet" href="../css/formstyle.css">
<link rel="stylesheet" href="../css/card.css"/>
<link rel="stylesheet" href="../css/progress.css">
<script src="../js/commonjs.js"></script>
</head>
<body>
<!-----------HEADER START-------------->
<?php require sprintf('../php/userheader.php',__DIR__);?>
<!-----------HEADER END-------------->
<!-----------BODY START-------------->
<div class="row">
	<!-----------SIDEBAR START-------------->
	<?php include '../php/coachsidenav.php';?>
	<!-----------SIDEBAR END-------------->
	<!-----------CONTENTS START-------------->
	<div class="column contents">
		<div class="progresscontainer">
		  <ul class="progressbar">
			<li class="active">Checkout Details</li>
			<li class="active">Shipping Details</li>
			<li>Review and Payment</li>
		  </ul>
		</div>
		<div class="input-form" style="padding:20px 150px 20px 150px;">
			<h1>Proceed Purchase</h1>
			<form method="post" action="https://sandbox.payhere.lk/pay/checkout">
				<?php
				$first_name = "";
				$last_name = "";
				$email = "";
				$phone = "";
				$address = "";
				$quantity="";
				if(isset($_SESSION['quantity'])){

					$quantity=$_SESSION['quantity'];
				}
				if(isset($_POST['first_name']))
				{
					$first_name = $_POST ["first_name"];
				}
				if(isset($_POST['last_name']))
				{
					$last_name = $_POST ["last_name"];
				}
				if(isset($_POST['email']))
				{
					$email = $_POST ["email"];
				}
				if(isset($_POST['phone']))
				{
					$phone = $_POST ["phone"];
				}
				if(isset($_POST['address']))
				{
					$address = $_POST ["address"];
				}
				if(isset($_GET["iid"]))
				{
					$iid = $_GET["iid"];
				}
				else
				{
					$iid = $_SESSION['iid'];
				}
				$_SESSION['iid'] = $iid;

				$sql = "SELECT * FROM item WHERE item_id = '".$iid."'";

				$result = $conn->query($sql);

				if ($result -> num_rows >0)
				{
					while ($row= $result -> fetch_assoc())
					{
						$name = $row ['name'];
						$price = $row ['price'];
					}
				}
				$amount = $quantity * $price;

				$sqll="SELECT * FROM coach WHERE username = '" .$uname. "'";
				$resultt=mysqli_query($conn,$sqll);
				if (mysqli_num_rows($resultt) >0)
				{
					while ($roww= $resultt -> fetch_assoc())
					{
						$country = $roww ['country'];
						$district = $roww ['city'];
					}
				}

				$sql2 = "SELECT purchase_id FROM purchase";
        $result2= mysqli_query($conn,$sql2);
				$result2 = $conn->query($sql2);

				if(mysqli_num_rows($result2)> 0)
				{
					$data = array();
					while($row2 = $result2->fetch_assoc())
					{
						$data[] = $row2["purchase_id"];
					}
					$next = max($data) + 1;
				}
				else
				{
					$next = 1;
				}
				?>
				<input type="hidden" name="merchant_id" value="1219975">
				<input type="hidden" name="return_url" value="http://localhost/Improvenest/php/notifyCoach.php">
				<input type="hidden" name="cancel_url" value="http://localhost/Improvenest/coach/shops.php">
				<input type="hidden" name="notify_url" value="">
				<input type="hidden" name="order_id" value="<?php echo $next ?>">
				<input type="hidden" name="currency" value="LKR">
				<input type="hidden" name="city" value="<?php echo $district ?>">
				<input type="hidden" name="country" value="<?php echo $country ?>">
				<fieldset>
					<legend>Item Details:</legend>
					<table cellspacing="2" cellpadding="2" border="0" >
						<tr>
							<td colspan="10">
								<p>Item Name</p>
								<input type="text" name="items" value="<?php echo $name ?>" readonly>
							</td>
						</tr>
						<tr>
							<td colspan="5">
								<p>Price (LKR)</p>
								<input type="hidden" name="item_name_1" value="<?php echo $name ?>" readonly>
								<input type="text" name="amount_1" id="cost" value="<?php echo $price ?>" readonly>
							</td>
							<td colspan="5">
								<p>Quantity</p>
								<input type="hidden" name="item_number_1" value="<?php echo $iid ?>" readonly>
								<input type="number" name="quantity_1" id="quantity" value="<?php echo $quantity ?>" readonly>
							</td>
						</tr>
						<tr>
							<td colspan="10">
								<p>Net Total (LKR)</p>
								<input type="text" name="amount" id="amount" value="<?php echo $amount ?>" readonly>
							</td>
						</tr>
					</table>
				</fieldset>
				<br/>
				<fieldset>
					<legend>Customer Details:</legend>
					<table cellspacing="2" cellpadding="2" border="0" >
						<tr>
							<td colspan="5">
								<p>First Name</p>
								<input type="text" name="first_name" value="<?php echo $first_name ?>" readonly>
							</td>
							<td colspan="5">
								<p>Last Name</p>
								<input type="text" name="last_name" value="<?php echo $last_name ?>" readonly>
							</td>
						</tr>
						<tr>
							<td colspan="5">
								<p>Email</p>
								<input type="text" name="email" value="<?php echo $email ?>" readonly>

							</td>
							<td colspan="5">
								<p>Mobile</p>
								<input type="text" name="phone" value="<?php echo $phone ?>" readonly>
							</td>
						</tr>
						<tr>
							<td colspan="10">
								<p>Delivery Address</p>
								<input type="text" name="address" value="<?php echo $address ?>" readonly>
							</td>
						</tr>
					</table>
				</fieldset>
				<table cellspacing="2" cellpadding="2" border="0" >
					<tr align="center">
						<td colspan="5">
							<button type="submit" id="usersbt" value="Submit">Buy</button>
						</td>
						<td colspan="5">
							<button type="reset" value="Reset" style="background-color:#a32626;" onclick="cancel()">Cancel</button>
						</td>
					</tr>
				</table>
			</form>
		</div>
	</div>
	<!-----------CONTENTS END-------------->
</div>
<script type="text/javascript">
function cancel()
{
	history.go(-2);
}
</script>
<script src="../js/active.js"></script>
<!-----------BODY END-------------->
<!-----------FOOTER START-------------->
<?php include '../php/userfooter.php';?>
<!-----------FOOTER END-------------->
</body>
</html>

<?php

$_SESSION['iid'] = $iid;
$_SESSION['quantity'] = $quantity;
$_SESSION['amount'] = $amount;
$_SESSION['address'] = $address;

?>
