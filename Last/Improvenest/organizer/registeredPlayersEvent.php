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
<script>
function delete_profile()
{
	if(confirm("Are you sure you want to delete your profile?"))
	{
		window.location.href="organiserdelete.php";
	}
}
</script>
</head>
<body>
<!-----------HEADER START-------------->
<?php require sprintf('../php/userheader.php',__DIR__);?>
<!-----------HEADER END-------------->
<!-----------BODY START-------------->
<div class="row">
	<!-----------SIDEBAR START-------------->
	<?php include '../php/organisersidenav.php';?>
	<!-----------SIDEBAR END-------------->
	<!-----------CONTENTS START-------------->
	<?php

	if(isset($_GET["id"]))  
	{
		$id = $_GET["id"];
	}
	else
	{
		$id = $_SESSION['id'];
	}

	$_SESSION['id'] = $id;

        
	?>
    <div class='column contents'>
    <h1> Registered Players </h1>
                    <table width="100%" cellpadding="10px" border="1" style="border-collapse: collapse; ">
                        <thead>
                            <tr style="background-color:#269bf0;">
                                <th width='12%'>Number</th>
                                <th>Player User Name</th>
                            </tr>
                        </thead>
                    
                        <tbody>
                            <?php
                                // $usernm=$_SESSION['username']
                                $count = 1;
                                $sql = "SELECT * FROM participate WHERE occasion_id = '".$id."'";
                                $result = $conn->query($sql);
                                
                                while ($row = mysqli_fetch_assoc($result)){                                 
                                 ?>
                                
                                <tr class="raw">
                                    <td align="left"><?php echo$count?></td>
                                    <td align="left"><?php echo $row["username"]; ?></td>
                                </tr>                                   
                                <?php $count++;
                            }   ?> 
                        </tbody>
                    </table>

<?php
    $sql2 = "SELECT * FROM event WHERE occasion_id = '".$id."'";
    $result2 = $conn->query($sql2);
						  
    if($result2->num_rows > 0)
    {
	    while($row2 = $result2->fetch_assoc())
	    {
            $fee = $row2["expenses_fees"];
            $sqll3="SELECT DISTINCT * FROM participate WHERE occasion_id = '".$id."'";

            $resultt3 = $conn->query($sqll3);
            $count3 = mysqli_num_rows($resultt3);
            $revenue = $fee*$count3;

            echo "<h1>Revenue Generated Rs. ".$revenue . ".00 </h1>";
        }
    }
            ?>




                    <br /> <br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br />
                    <br /> <br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br />
	<!-----------CONTENTS END-------------->
</div>
<script>
function openForm() {
	document.getElementById("myForm").style.display = "block";
}

function closeForm() {
	document.getElementById("myForm").style.display = "none";
}
</script>
<script src="../js/active.js"></script>
<!-----------BODY END-------------->
<!-----------FOOTER START-------------->
<?php include '../php/userfooter.php';?>
<!-----------FOOTER END-------------->
</body>
</html>
