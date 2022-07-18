<?php
include "../php/conn.php";

session_start(); 
$uname = $_SESSION['uname'];

$name = ($_POST['name']);
$tmax = ($_POST['maxp']);
$tconditions = ($_POST['condition']);
$tnumber = ($_POST['contact']); 
$tvenue = ($_POST['venue']); 
$tclosingDate = ($_POST['rcdate']);
$tstartDate = ($_POST['sdate']); 
$tendDate = ($_POST['edate']);
$tsendFor = ($_POST['sport']);
$tentryFee = ($_POST['entryfee']);
$trules = ($_POST['rules']); 
$participants = "0";


$sql2 = "SELECT occasion_id FROM event UNION SELECT occasion_id FROM tournament";
$result2 = $conn->query($sql2);
													  
if($result2->num_rows > 0)
{
	$data = array();
	while($row2 = $result2->fetch_assoc())
	{
		$data[] = $row2["occasion_id"];
	}
	$toccasionid = max($data) + 1; 
}

$sql = "INSERT INTO tournament (occasion_id,username,name,max_participants,participants,conditions,contact_no,venue,entry_closing_date,start_date,end_date,sport,entry_fee,rules_regulations,status,occasion_type) VALUES('$toccasionid','$uname','$name','$tmax','$participants','$tconditions','$tnumber','$tvenue','$tclosingDate','$tstartDate','$tendDate','$tsendFor','$tentryFee','$trules','pending','Tournament')";


if (mysqli_query($conn, $sql)) {
  // echo "New record successfully";
  echo '<script> alert("Success!");</script>';
  echo '<script> location.href="./tournament.php"</script>';
} else {
  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
?>