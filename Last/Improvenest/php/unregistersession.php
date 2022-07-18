<?php
include 'conn.php';
session_start();
$uname = $_SESSION['uname'];
if(isset($_GET["id"]))  
{
	$id = $_GET["id"];
}

echo "<script>
	if (confirm('Please note that if you unregister this session, no refund will be given. Are you sure you want to unregister?')) 
	{
		window.location.href='http://localhost/Improvenest/php/unregister.php?id=".$id."';
	} 
	else 
	{
		history.go(-1);
	}
</script>";	


mysqli_close($conn);
?>