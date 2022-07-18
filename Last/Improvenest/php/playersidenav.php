<?php
include 'conn.php';
$uname = $_SESSION['uname'];
?>

<?php
$sql = "SELECT * FROM player WHERE username = '".$uname."'";

$result = $conn->query($sql);
						  
if($result->num_rows > 0)
{
	while($row = $result->fetch_assoc())
	{
		$sqll="SELECT DISTINCT * FROM player pa, player_request pr WHERE pr.receiver_username = '" .$uname. "' AND pr.requester_username = pa.username AND pr.status = 'Pending'";
		$resultt = $conn->query($sqll);
		$count = mysqli_num_rows($resultt);
		
		echo"<div class='column sidenav'>
				<div class='row'>
					<img src='data:image/jpeg;base64," . base64_encode($row['picture']) . "' alt='Avatar'>
					<h2 style='color:white;float:right;padding-top:7%'>Hello ".$row["f_name"]."!</h2>
				</div>
				<a class='normal' href='profile.php'>MY PROFILE</a>
				<a class='normal' href='news.php'>NEWS</a>
				<a class='normal' href='schedule.php'>SCHEDULE</a>";
				if($count>0)
				{
					echo"<a class='normal' href='partners.php'><span>PARTNERS</span>
					<span style='float:right;padding: 5px 7px 0px 7px;border-radius: 50%;background-color: red;color: white;'>".$count."</span></a>";	
				}
				else
				{
					echo"<a class='normal' href='partners.php'>PARTNERS</a>";						
				}
				echo"<a class='normal' href='coaches.php'>COACHES</a>
				<a class='normal' href='tournaments.php'>TOURNAMENTS</a>
				<a class='normal' href='events.php'>EVENTS</a>
				<a class='normal' href='shops.php'>SHOPS</a>
			</div>";
	}
}
?>