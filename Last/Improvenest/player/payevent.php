<?php
include '../php/conn.php';
session_start();
$uname = $_SESSION['uname'];
$eid = $_SESSION['eid'];
?>

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="../css/headfoot.css">
<link rel="stylesheet" href="../css/formstyle.css">
<link rel="stylesheet" href="../css/card.css"/>
<script src="../js/commonjs.js"></script>
</head>
<body>
<!-----------HEADER START-------------->
<?php require sprintf('../php/userheader.php',__DIR__);?>
<!-----------HEADER END-------------->
<!-----------BODY START-------------->
<div class="row">
	<!-----------SIDEBAR START-------------->
	<?php include '../php/playersidenav.php';?>
	<!-----------SIDEBAR END-------------->
	<!-----------CONTENTS START-------------->
	<div class="column contents">	
		<div class="input-form" style="padding:20px 150px 20px 150px;">
			<h1>Join Event</h1>
			<form method="post" action="https://sandbox.payhere.lk/pay/checkout">
				<?php
				$sql = "SELECT * FROM event WHERE occasion_id = '" .$eid. "'";

				$result = $conn->query($sql);
										  
				if ($result -> num_rows >0)
				{
					while ($row= $result -> fetch_assoc())
					{
						$name = $row["name"];
						$date = $row["held_date"];
						$venue = $row["venue"];
						$stime = date("g:i a", strtotime($row["start_time"]));
						$etime = date("g:i a", strtotime($row["end_time"]));
						$fee = $row["expenses_fees"];
					}
				}
				$order_id = $uname." - ".$eid;
				
				$sqll="SELECT * FROM player WHERE username = '" .$uname. "'";
				$resultt=$conn->query ($sqll);
				if ($resultt -> num_rows >0)
				{
					while ($roww= $resultt -> fetch_assoc())
					{				
						$first_name = $roww ['f_name'];
						$last_name = $roww ['l_name'];
						$email = $roww ['email'];
						$phone = $roww ['contact_no'];
						$address = $roww ['address'];
						$country = "Sri Lanka";
						$district = $roww ['city'];
					}
				}
				
				?>
				<input type="hidden" name="merchant_id" value="1219975">
				<input type="hidden" name="return_url" value="http://localhost/Improvenest/php/finalizedplayerevent.php">
				<input type="hidden" name="cancel_url" value="http://localhost/Improvenest/player/events.php">
				<input type="hidden" name="notify_url" value="">
				<input type="hidden" name="order_id" value="<?php echo $order_id ?>">
				<input type="hidden" name="currency" value="LKR">
				<input type="hidden" name="city" value="<?php echo $district ?>">
				<input type="hidden" name="country" value="<?php echo $country ?>">
				<input type="hidden" name="address" value="<?php echo $address ?>">
				<fieldset>
					<legend>Event Details:</legend>
					<table cellspacing="2" cellpadding="2" border="0" >
						<tr>
							<td colspan="10">
								<p>Event Name</p>
								<input type="text" name="items" value="<?php echo $name ?>" readonly>				
							</td>			
						</tr>
						<tr>
							<td colspan="10">
								<p>Held Date</p>
								<input type="text" value="<?php echo $date ?>" readonly>				
							</td>			
						</tr>
						<tr>
							<td colspan="10">
								<p>Venue</p>
								<input type="text" value="<?php echo $venue ?>" readonly>				
							</td>			
						</tr>						
						<tr>
							<td colspan="5">
								<p>Start Time</p>
								<input type="text" value="<?php echo $stime ?>" readonly>		
							</td>
							<td colspan="5">
								<p>End Time</p>
								<input type="text" value="<?php echo $etime ?>" readonly>	
							</td>			
						</tr>
						<tr>
							<td colspan="10">
								<p>Entry Fee (LKR)</p>
								<input type="text" name="amount" id="amount" value="<?php echo $fee ?>" readonly> 
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
								<input type="text" name="first_name" value="<?php echo $first_name ?>" required>							
							</td>
							<td colspan="5">
								<p>Last Name</p>
								<input type="text" name="last_name" value="<?php echo $last_name ?>" required>												
							</td>			
						</tr>
						<tr>
							<td colspan="5">
								<p>Email</p>
								<input type="text" name="email" pattern="[a-zA-Z0-9%_+-]+@[a-zA-Z]+\.[a-z]{2,3}" value="<?php echo $email ?>" required>
						
							</td>
							<td colspan="5">
								<p>Mobile</p>
								<input type="text" name="phone" pattern="[0-9]{10}" value="<?php echo $phone ?>" required>					
							</td>			
						</tr>
					</table>
				</fieldset>
				<table cellspacing="2" cellpadding="2" border="0" >
					<tr align="center">
						<td colspan="5">
							<button type="submit" id="usersbt" value="Submit">Pay Fee</button>				
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