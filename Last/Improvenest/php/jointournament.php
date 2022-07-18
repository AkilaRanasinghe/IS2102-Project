<?php
include 'conn.php';
session_start();
$uname = $_SESSION['uname'];
if(isset($_GET["tid"]))  
{
	$tid = $_GET["tid"];
}
else
{
	$tid = $_SESSION['tid'];
}

$sql = "SELECT * FROM tournament WHERE occasion_id = '".$tid."'";

$result = $conn->query($sql);

if($result->num_rows > 0)
{
	while($row = $result->fetch_assoc())
	{
		$fromdate = $row["start_date"];
		$todate = $row["end_date"];
	}
}

$sqll = "SELECT * FROM participate WHERE username = '".$uname."' AND date BETWEEN '".$fromdate."' AND '".$todate."'";

$resultt = $conn->query($sqll);

if($resultt->num_rows > 0)
{
	echo "<script>
			if (confirm('You have already registerd to sessions which are happening on the time period of this tournament! Are you sure you want to register to this tournament?')) 
			{
				window.location.href='http://localhost/Improvenest/player/paytournament.php';
			} 
			else 
			{
				history.go(-1);
			}
		</script>";	
}
else
{
	header("Location: http://localhost/Improvenest/player/paytournament.php");
}

mysqli_close($conn);
?>