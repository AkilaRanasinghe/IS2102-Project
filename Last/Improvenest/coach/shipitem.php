<?php

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
			<li>Shipping Details</li>
			<li>Review and Payment</li>
		  </ul>
		</div>
		<div class="input-form" style="padding:20px 150px 20px 150px;">
			<h1>Customer Details</h1>
			<form method="post" action="http://localhost/Improvenest/coach/buyitem.php">
				<?php
				$quantity = 0;
				if(isset($_POST['quantity']))
				{
					$quantity = $_POST ["quantity"];
				}

				$sqll="SELECT * FROM coach WHERE username = '" .$uname. "'";
				$resultt=$conn->query ($sqll);
				if ($resultt -> num_rows >0)
				{
					while ($roww= $resultt -> fetch_assoc())
					{
						$fname = $roww ['f_name'];
						$lname = $roww ['l_name'];
						$country = $roww ['country'];
						$mobile = $roww ['contact_no'];
						$email = $roww ['email'];
						$address = $roww ['address'];
						$district = $roww ['city'];
					}
				}

				?>
				<table cellspacing="2" cellpadding="2" border="0" >
					<tr>
						<td colspan="5">
							<p>First Name</p>
							<input type="text" name="first_name" value="<?php echo $fname ?>" required>
						</td>
						<td colspan="5">
							<p>Last Name</p>
							<input type="text" name="last_name" value="<?php echo $lname ?>" required>
						</td>
					</tr>
					<tr>
						<td colspan="5">
							<p>Email</p>
							<input type="text" name="email" value="<?php echo $email ?>" required>
						</td>
						<td colspan="5">
							<p>Mobile</p>
							<input type="text" name="phone" value="<?php echo $mobile ?>" required>
						</td>
					</tr>
					<tr>
						<td colspan="10">
							<p>Delivery Address</p>
							<input type="text" name="address" value="<?php echo $address ?>" required>
						</td>
					</tr>
					<tr align="center">
						<td colspan="5">
							<button type="submit" id="usersbt" value="Submit">Buy</button>
						</td>
						<td colspan="5">
							<button type="reset" value="Reset" style="background-color:#a32626;">Reset</button>
						</td>
					</tr>
				</table>
			</form>
		</div>
	</div>
	<!-----------CONTENTS END-------------->
</div>
<script src="../js/active.js"></script>
<!-----------BODY END-------------->
<!-----------FOOTER START-------------->
<?php include '../php/userfooter.php';?>
<!-----------FOOTER END-------------->
</body>
</html>

<?php

$_SESSION['quantity'] = $quantity;

?>
