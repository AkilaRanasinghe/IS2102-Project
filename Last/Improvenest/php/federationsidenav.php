<?php
include 'conn.php';
$uname = $_SESSION['uname'];
?>

<?php
$sql = "SELECT * FROM federation WHERE username = '".$uname."'";

$result = $conn->query($sql);
						  
if($result->num_rows > 0)
{
	while($row = $result->fetch_assoc())
	{
		echo"<div class='column sidenav'>
		<div class='row'>
		<img src='data:image/jpeg;base64," . base64_encode($row['picture']) . "' alt='Avatar'>
		<h3 style='color:white;float:right;padding-top:7%'>".$row["name"]."</h3>
		</div>
</br>
				<a class='normal' href='federationprofile.php'>Profile</a>
				<a class='normal' href='tournamentsapproval.php'>Approval</a>
				<a class='normal' href='tournamentsfederation.php'>Tournaments</a>
				<a class='normal' href='eventsfederation.php'>Events</a>
				<a class='normal' href='newsfederation.php'>News</a>
				<a class='normal' href='shopsfederation.php'>Marketplace</a>
				<a class='normal' href='reports.php'>Overview</a>
</div>";
	}
}
?>