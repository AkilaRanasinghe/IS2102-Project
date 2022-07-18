<?php
include 'conn.php';
$uname = $_SESSION['uname'];
?>

<?php
$sql = "SELECT * FROM organiser WHERE username = '".$uname."'";

$result = $conn->query($sql);
						  
if($result->num_rows > 0)
{
	while($row = $result->fetch_assoc())
	{
		echo"<div class='column sidenav'>
				<div class='row'>
					<img src='data:image/jpeg;base64," . base64_encode($row['picture']) . "' alt='Avatar'>
					<h2 style='color:white;float:right;padding-top:7%'>Hello ".$row["username"]."!</h2>
				</div>
				<a class='normal' href='profile.php'>MY PROFILE</a>
				<a class='normal' href='tournament.php'>TOURNAMENTS</a>
				<a class='normal' href='event.php'>EVENTS</a>
				<a class='normal' href='news.php'>NEWS</a>
				
              
			</div>";
	}
}
?>