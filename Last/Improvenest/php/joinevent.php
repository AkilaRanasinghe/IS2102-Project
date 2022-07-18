<?php
include 'conn.php';
session_start();
$uname = $_SESSION['uname'];
if(isset($_GET["eid"]))  
{
	$eid = $_GET["eid"];
}
else
{
	$eid = $_SESSION['eid'];
}

$sql = "SELECT * FROM event WHERE occasion_id = '".$eid."'";

$result = $conn->query($sql);

if($result->num_rows > 0)
{
	while($row = $result->fetch_assoc())
	{
		$edate = $row["held_date"];
		$from = $row["start_time"];
		$to = $row["end_time"];
	}
}

$sqll = "SELECT * FROM participate WHERE username = '".$uname."' AND date = '".$edate."'";

$resultt = $conn->query($sqll);

if($resultt->num_rows > 0)
{
	while($roww = $resultt->fetch_assoc())
	{
		$from_compare = $roww["start_time"];
		$to_compare = $roww["end_time"];
		if(($from >= $from_compare && $from <= $to_compare) || ($from_compare >= $from && $from_compare <= $to))
		{
			echo "<script>
					if (confirm('You have already registerd to an event happening on the same time! Are you sure you want to join this event?')) 
					{
					  window.location.href='http://localhost/Improvenest/player/payevent.php';
					} 
					else 
					{
					  history.go(-1);
					}
				</script>";	
		}
		else
		{
			echo "<script>
					if (confirm('You have already registerd to an event happening on the same day! Are you sure you want to join this event?')) 
					{
						window.location.href='http://localhost/Improvenest/player/payevent.php';
					} 
					else 
					{
						history.go(-1);
					}
				</script>";	
		}
		
	}
}
else
{
	header("Location: http://localhost/Improvenest/player/payevent.php");
}

mysqli_close($conn);
?>