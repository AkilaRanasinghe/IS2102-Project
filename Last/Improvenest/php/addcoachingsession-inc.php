<?php
include 'conn.php';
session_start();
$uname = $_SESSION['uname'];

$next = 0;
$sname = "";
$location = "";
$participants = "";
$sport = "";
$expenses = "";
$date = "";
$closedate = "";
$stime = "";
$etime = "";
$focus = "";
$status = "Approved";
$occasion = "Event";
$event = "Coaching Session";
$chk = "";
$current = 0;
$phone = "";

if(isset($_POST['SName']))
{
	$sname = $_POST ["SName"];
}
if(isset($_POST['Location']))
{
	$location = $_POST ["Location"];
}
if(isset($_POST['Participants']))
{
	$participants = $_POST ["Participants"];
}
if(isset($_POST['Sport']))
{
	$sport = $_POST ["Sport"];
}
if(isset($_POST['Expenses']))
{
	$expenses = $_POST ["Expenses"];
}
if(isset($_POST['HeldDate']))
{
	$date = $_POST ["HeldDate"];
}
if(isset($_POST['CloseDate']))
{
	$closedate = $_POST ["CloseDate"];
}
if(isset($_POST['STime']))
{
	$stime = $_POST ["STime"];
}
if(isset($_POST['ETime']))
{
	$etime = $_POST ["ETime"];
}
if(isset($_POST['Focus']))
{
	$focus = $_POST ["Focus"];
}

$sql1 = "SELECT contact_no FROM coach where username = '" .$uname. "'";
$result1 = $conn->query($sql1);

if($result1->num_rows > 0)
{
	$data = array();
	while($row1 = $result1->fetch_assoc())
	{
		$phone = $row1["contact_no"];
	}
}

$sql2 = "SELECT occasion_id FROM event UNION SELECT occasion_id FROM tournament";
$result2 = $conn->query($sql2);
													  
if($result2->num_rows > 0)
{
	$data = array();
	while($row2 = $result2->fetch_assoc())
	{
		$data[] = $row2["occasion_id"];
	}
	$next = max($data) + 1; 
}
else
{
	$next = 1;
}

/*echo $uname;
echo $next;
echo $sname;
echo $location;
echo $participants;
echo $sport;
echo $expenses;
echo $date;
echo $closedate;
echo $stime;
echo $etime;
echo $current;
echo $phone;*/

$sql = "INSERT INTO coaching_session (occasion_id,username) VALUES ('$next','$uname');";
$sql .= "INSERT INTO event_sport (occasion_id,sport) VALUES ('$next','$sport');";
$sql .= "INSERT INTO event (occasion_id,username,name,max_participants,participants,contact_no,venue,held_date,entry_closing_date,start_time,end_time,expenses_fees,status,occasion_type,event_type) VALUES ('$next','$uname','$sname','$participants','$current','$phone','$location','$date','$closedate','$stime','$etime','$expenses','$status','$occasion','$event');";

if($conn->multi_query($sql)) 
{
	while ($conn->more_results() && $conn->next_result());
	foreach($focus as $chk)
	{
		$query1 = "INSERT INTO event_aspect (occasion_id,aspect) VALUES ('$next','$chk')";
		$query_run = mysqli_query($conn, $query1);
	}  
	if($query_run)  
	{  
		echo "<script type='text/javascript'>alert('Coaching Session Added!'); window.location.href='http://localhost/Improvenest/coach/events.php';</script>";
	}  
	else  
	{  
		echo "<script type='text/javascript'>alert('Failed to add coaching session'); window.location.href='http://localhost/Improvenest/coach/addevent.php';</script>"; 	
	}
} 
else
{
	echo "<script type='text/javascript'>alert('Failed to add coaching session'); window.location.href='http://localhost/Improvenest/coach/addevent.php';</script>";
}

mysqli_close($conn);
?>