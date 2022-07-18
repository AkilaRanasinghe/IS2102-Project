<?php
include '../php/conn.php';
session_start();
$uname = $_SESSION['uname'];
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
	<?php include '../php/playersidenav.php';?>
	<!-----------SIDEBAR END-------------->
	<!-----------CONTENTS START-------------->	
	<div class="column contents">
		<div class="progresscontainer">
		  <ul class="progressbar">
			<li>Checkout Details</li>
			<li>Shipping Details</li>
			<li>Review and Payment</li>
		  </ul>
		</div>	
		<?php
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
								  
		if($result->num_rows > 0)
		{
			while($row = $result->fetch_assoc())
			{
				$stock = $row["stock"];
				echo"<div class='row input-form' style='padding:30px;'>
					<div class='column procol7'>
						<div class='row' style='display: flex;'>
							<img src='data:image/jpeg;base64," . base64_encode($row['image']) . "' alt='Image' style='width:40%; height: 40%;margin: 15px 40px 50px 0px;float: left;'>
							<div class='productinfo'>
								<small style='float:right;'>In Stock : ".$stock."</small>								
								<h1>".$row["name"]."</h1>
								<h5>".nl2br($row["description"])."</h5>
								<table cellspacing='2' cellpadding='2' border='0'>
									<tr>
										<td colspan='3'>
											<h2 style='font-family: Georgia, serif;'>Price&emsp;:&emsp;LKR ".$row["price"]."</h2>		
										</td>
										<td colspan='3'>
											<h4>Brand&emsp;:&emsp;".$row["brand"]."</h4> 
										</td>
										<td colspan='3'>
											<h4>Condition&emsp;:&emsp;".$row["type"]."</h4>
										</td>										
									</tr>									
								</table>
								<form method='post' action='shipitem.php'>
									<table cellspacing='2' cellpadding='2' border='0'>
										<tr>
											<td colspan='5'>
												<p>Quantity</p>
												<input type='hidden' name='cost' id='cost' value=".$row["price"].">
												<input type='number' name='quantity' id='quantity' min='1' max='$stock' oninput='multiply()' required>		
											</td>
											<td colspan='5'>
												<p>Net Total (LKR)</p>
												<input type='text' name='amount' id='amount' readonly required> 
											</td>											
										</tr>
										<tr align='center'>
											<td colspan='5'>
												<button type='submit' id='usersbt' value='Submit'>Continue To Purchase</button>				
											</td>
											<td colspan='5'>
												<button type='reset' value='Reset' style='background-color:#a32626;'>Reset</button>			
											</td>				
										</tr>										
									</table>								
								</form>
							</div>
						</div>
					</div>
				</div>";
			}
		}
		?>
	</div>
	<!-----------CONTENTS END-------------->
</div>
<script type="text/javascript">
function multiply() 
{
	var myBox1 = document.getElementById('cost').value; 
	var myBox2 = document.getElementById('quantity').value;
	var result = document.getElementById('amount'); 
	var myResult = myBox1 * myBox2;
	result.value = myResult;
}
</script>
<script src="../js/active.js"></script>
<!-----------BODY END-------------->
<!-----------FOOTER START-------------->
<?php include '../php/userfooter.php';?>
<!-----------FOOTER END-------------->
</body>
</html>