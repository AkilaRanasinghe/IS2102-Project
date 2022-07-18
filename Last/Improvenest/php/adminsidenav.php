<?php
include 'conn.php';
$uname = $_SESSION['uname'];
?>

<?php
$sql = "SELECT * FROM admin WHERE username = '".$uname."'";

$result = $conn->query($sql);
						  
if($result->num_rows > 0)
{
	while($row = $result->fetch_assoc())
	{
		$sqll="SELECT DISTINCT * FROM report pa WHERE status = 'delete'";
		$resultt = $conn->query($sqll);
		$count = mysqli_num_rows($resultt);

		echo"<div class='column sidenav'>
				<div class='row'>
					<img src='data:image/jpeg;base64," . base64_encode($row['picture']) . "' alt='Avatar'>
					<h2 style='color:white;float:right;padding-top:7%'>Hello ".$row["username"]."!</h2>
				</div>
				<a class='normal' href='dashboard.php'>DASHBOARD</a>";

				
				if($count>0)
				{
					echo"<a class='normal' href='reportPlayer.php'><span>COMPLAINTS</span>
					<span style='float:right;padding: 5px 7px 0px 7px;border-radius: 50%;background-color: red;color: white;'>".$count."</span></a>";	
				}
				else
				{
					echo"<a class='normal' href='reportPlayer.php'>COMPLAINTS</a>";						
				}

				echo "<a class='normal' href='federation.php'>FEDERATION ACCOUNTS</a>
				<a class='normal' href='newsfederation.php'>NEWS</a>
				
				<a class='normal' href='contactus.php'>CONTACT US</a>
				<a class='normal' href='profile.php'>PROFILE</a>
                <br /><br /><br /><br /><br /><br /><br /><br /><br />
              
			</div>";
	}
}
?>