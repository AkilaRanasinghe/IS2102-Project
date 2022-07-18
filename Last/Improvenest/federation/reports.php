<?php
include '../php/conn.php';
session_start();
$uname = $_SESSION['uname'];
?>

<!-- passwords 
sls 123456789ab
slb -->

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="../css/headfoot.css">
<link rel="stylesheet" href="../css/report.css">
<script src="../js/commonjs.js"></script>

</head>
<body>
<!-----------HEADER START-------------->
<?php require sprintf('../php/userheader.php',__DIR__);?>
<!-----------HEADER END-------------->
<!-----------BODY START-------------->
<div class="row">
	<!-----------SIDEBAR START-------------->
	<?php include '../php/federationsidenav.php';?>
	<!-----------SIDEBAR END-------------->
	<!-----------CONTENTS START-------------->

<br>
<br>
<h2 style="color:white;"><center>Overview - Sri Lanka Squash </center></h2>
<hr />
<br>
<br>
<div class="timeline">

  <div class="container left">
    <div class="content">
    <?php
    $sql = "SELECT COUNT(*) AS count FROM player " ;
    $result = $conn->query($sql);
								  
		if($result->num_rows > 0)
		{
      while($row = $result->fetch_assoc())
			{		
				$output = $row['count'];
      }
    }
    ?>
     <h2><?php echo $output; ?></h2>
    
      
      <p>Players registered</p>
      <hr style="height:3pt; visibility:hidden;" />
      <a href="playerlistfed.php" button class="reports">View all players</button></a>
      <hr style="height:3pt; visibility:hidden;" />
    </div>
  </div>
  <div class="container right">
    <div class="content">
    <?php
    $sql = "SELECT COUNT(*) AS count FROM coach " ;
    $result = $conn->query($sql);
								  
		if($result->num_rows > 0)
		{
      while($row = $result->fetch_assoc())
			{		
				$output = $row['count'];
      }
    }
    ?>
     <h2><?php echo $output; ?></h2>
    
  
      <p>coaches registered</p>
      <hr style="height:3pt; visibility:hidden;" />
      <a href="coachlistfed.php" button class="reports">View all coaches</button></a>
      <hr style="height:3pt; visibility:hidden;" />
    </div>
  </div>
  <div class="container left">
    <div class="content">
    <?php
    $sql = "SELECT COUNT(*) AS count FROM tournament " ;
    $result = $conn->query($sql);
								  
		if($result->num_rows > 0)
		{
      while($row = $result->fetch_assoc())
			{		
				$output = $row['count'];
      }
    }
    ?>
     <h2><?php echo $output; ?></h2>
      
      <p>Official tournaments have been held</p>
    </div>
  </div>
  <div class="container right">
    <div class="content">
    <?php
    $sql = "SELECT COUNT(*) AS count FROM event " ;
    $result = $conn->query($sql);
								  
		if($result->num_rows > 0)
		{
      while($row = $result->fetch_assoc())
			{		
				$output = $row['count'];
      }
    }
    ?>
     <h2><?php echo $output; ?></h2>
      
      <p>Official events have been held</p>
    </div>
  </div>
  <div class="container left">
    <div class="content">
    <?php
    $sql = "SELECT COUNT(*) AS count FROM group_training_session " ;
    $result = $conn->query($sql);
								  
		if($result->num_rows > 0)
		{
      while($row = $result->fetch_assoc())
			{		
				$output = $row['count'];
      }
    }
    ?>
     <h2><?php echo $output; ?></h2>
      <p>Player activities have been held</p>
    </div>
  </div>
  <div class="container right">
    <div class="content">
    <?php
    $sql = "SELECT COUNT(*) AS count FROM coaching_session " ;
    $result = $conn->query($sql);
								  
		if($result->num_rows > 0)
		{
      while($row = $result->fetch_assoc())
			{		
				$output = $row['count'];
      }
    }
    ?>
     <h2><?php echo $output; ?></h2>
     
      <p>Coaching sessions have been held</p>
    </div>
  </div>
  <div class="container left">
    <div class="content">
    <?php
   $sql = " SELECT SUM(revenue) as count FROM tournament";
    
    $result = $conn->query($sql);
								  
		if($result->num_rows > 0)
		{
      while($row = $result->fetch_assoc())
			{		
				$output = $row['count'];
      }
    }
    ?>
     <h2 style ="letter-spacing : 1px">Rs.<?php echo $output; ?></h2>
     
      
      <p>Tournaments registration revenue</p>
    </div>
  </div>


  <div class="container right">
    <div class="content">
    <?php
   $sql = " SELECT SUM(revenue) as count FROM event";
    
    $result = $conn->query($sql);
								  
		if($result->num_rows > 0)
		{
      while($row = $result->fetch_assoc())
			{		
				$output = $row['count'];
      }
    }
    ?>
     <h2 style ="letter-spacing : 1px">Rs.<?php echo $output; ?></h2>
     
      
      <p>Events registration revenue</p>
    </div>
  </div>


</div>








    </div> -->
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
<script>
	document.getElementById("defaultOpen").click();
</script>
<script src="../js/active.js"></script>
<!-----------BODY END-------------->
<!-----------FOOTER START-------------->
<!-- <?php include '../php/userfooter./php';?> -->
<!-----------FOOTER END-------------->
</body>
</html>