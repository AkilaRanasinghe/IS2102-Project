
<!DOCTYPE html>
<html>
<head>
	<script>
		function send_id(occasion){
			window.location.href = "manageevent.php?occasion="+occasion;
		}
	</script>
	<style >
		.closedevent h4{
			color: white;
			padding: 8px;
			background-color: #a32626;
			width: 10%;
			border-radius: 5px;
			text-align: center;
		}
	</style>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="../css/headfoot.css">
<link rel="stylesheet" href="../css/formstyle.css">
<link rel="stylesheet" href="../css/card.css"/>
<script src="../js/commonjs.js"></script>
</head>
<body>
<!-----------HEADER START-------------->

	<?php require sprintf('../php/userheader.php',__DIR__);?>

<!-----------HEADER END-------------->
<!-----------BODY START-------------->
<div class="row">
	<!-----------SIDEBAR START-------------->
			<?php include '../php/coachsidenav.php';?>
	<!-----------SIDEBAR END-------------->
	<!-----------CONTENTS START-------------->

	<div class="column contents">
			<div id="My" class="tabcontent">
			<div class="row">
				<div class="column procol4">
					<h1>My Events</h1>
				</div>
				<div class="column procol5" style="padding-top:10px;">
					<a href="addevent.php"><button style="float:right;">Add New Coaching Session</button></a>
				</div>
			</div>
			<div class="row">
				<?php

				$sql=" SELECT DISTINCT * FROM event e, coaching_session c, event_sport s WHERE c.username = '" .$uname. "' AND e.occasion_id = c.occasion_id AND s.occasion_id = c.occasion_id ORDER BY e.held_date DESC;";
				$result = mysqli_query($conn,$sql);
				$resultchk= mysqli_num_rows($result);

				if($resultchk > 0)
				{
				  while($row = mysqli_fetch_assoc($result))
				  {
				    $occasion = $row["occasion_id"];
				    $helddate = $row["held_date"];
				    $sname = $row['name'];
				    date_default_timezone_set('Asia/Colombo');
				    $today = date("Y-m-d");
				    $clss = "";
				    if($helddate < $today)
				    {
							$sql = "UPDATE event SET status = 'Closed' WHERE occasion_id='$occasion'";
							mysqli_query($conn,$sql);

				      echo"<div class='horitem'>
				          <div class='procol5'>
				          <div class = 'row closedevent'>
									<h4> Closed </h4>
									<h2>".$sname."</h2>
				          </div>"
				          ;
				            $start = date("g:i a", strtotime($row["start_time"]));
				            $end = date("g:i a", strtotime($row["end_time"]));
				            echo"<div class='column procol6'>
				              <h3>Date : ".$row["held_date"]."</h3>
				              <p>Entry Closing Date : ".$row["entry_closing_date"]."</p>
				              <p>Start Time : ".$start."</p>
				              <p>Sport : ".$row["sport"]."</p>
				            </div>
				            <div class='column procol6'>
				              <h3>Venue : ".$row["venue"]."</h3>
				              <p>Participants : ".$row["participants"]."/".$row["max_participants"]."</p>
				              <p>End Time : ".$end."</p>
				              <p>Expenses : ".$row["expenses_fees"]." LKR </p>
				            </div>";

				            $sql2 = "SELECT * FROM event_aspect WHERE occasion_id = '".$occasion."'";
				            $result2 = mysqli_query($conn,$sql2);
				            $resultchk2 = mysqli_num_rows($result2);

				            if($resultchk2 > 0)
				            {
				              $data = array();
				              while($row2 = mysqli_fetch_assoc($result2))
				              {
				                $data[] = $row2["aspect"];
				              }
				              echo"<div class='procol7'>";
				                print_r("Main Focus Areas&emsp;:&emsp;");
				                for($x = 0 ; $x < count($data) ; $x++)
				                {
				                  print_r($data[$x]);echo"&emsp;&emsp;&emsp;";
				                }
				              echo"</div>";
				            }


				          echo"</div>
									<div class='procol4'>
				          	<button type='submit' onclick='send_id($occasion)'>Manage</button>
				          </div>
				        	</div>";
				    	}
				    else
				    {

				      echo"<div class='horitem'>
				          <div class='procol5'>
				            <h2>".$sname."</h2>";
				            $start = date("g:i a", strtotime($row["start_time"]));
				            $end = date("g:i a", strtotime($row["end_time"]));
				            echo"<div class='column procol6'>
				              <h3>Date : ".$row["held_date"]."</h3>
				              <p>Entry Closing Date : ".$row["entry_closing_date"]."</p>
				              <p>Start Time : ".$start."</p>
				              <p>Sport : ".$row["sport"]."</p>
				            </div>
				            <div class='column procol6'>
				              <h3>Venue : ".$row["venue"]."</h3>
				              <p>Participants : ".$row["participants"]."/".$row["max_participants"]."</p>
				              <p>End Time : ".$end."</p>
				              <p>Expenses : ".$row["expenses_fees"]." LKR </p>
				            </div>";
				            $sql2 = "SELECT * FROM event_aspect WHERE occasion_id = '".$occasion."'";
				            $result2 = mysqli_query($conn,$sql2);
				            $resultchk2 = mysqli_num_rows($result2);

				            if($resultchk2> 0)
				            {
				              $data = array();
				              while($row2 = mysqli_fetch_assoc($result2))
				              {
				                $data[] = $row2["aspect"];
				              }
				              echo"<div class='procol7'>";
				                print_r("Main Focus Areas&emsp;:&emsp;");
				                for($x = 0 ; $x < count($data) ; $x++)
				                {
				                  print_r($data[$x]);echo"&emsp;&emsp;&emsp;";
				                }
				              echo"</div>";
				            }


				          echo"</div>
				          <div class='procol4'>
									<button type='submit' onclick='send_id($occasion)'>Manage</button>

				        </div>
				        </div>";
				    }
				  }
				}
				else
				{
				  echo "<div class='procol7'><h3>No Events Added Yet.</h3></div>";
				}
				?>
		</div>
	</div>
</div>
	<!-----------CONTENTS END-------------->
</div>
<!--<script>
document.getElementById("defaultOpen").click();
</script>-->
<script type="text/javascript" src="../js/activejs.js"></script>
<!-----------BODY END-------------->
<!-----------FOOTER START-------------->
<?php include '../php/userfooter.php';
mysqli_close($conn)?>
<script src="../js/activejs.js" charset="utf-8"></script>


<!-----------FOOTER END-------------->
</body>
</html>
