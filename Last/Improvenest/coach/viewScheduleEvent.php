<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="../css/headfoot.css">
<link rel="stylesheet" href="../css/formstyle.css">
<!--<link rel="stylesheet" href="../css/calender.css">-->
<link rel="stylesheet" href="../css/card.css"/>
<script src="../js/common.js"></script>
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
  <div id="My"class="tabcontent">
    <div class="row">
	     <?php

        $id = "";
        $date = "";

        if(isset($_GET["id"]))
        {
        	$id = $_GET["id"];
        }
        if(isset($_GET["date"]))
        {
        	$date = $_GET["date"];
        }

        $sql = "SELECT * FROM event e, event_sport s WHERE e.username = '".$uname."' AND e.occasion_id = '".$id."'AND e.occasion_id= s.occasion_id AND e.held_date = '".$date."'";
        $result = mysqli_query($conn,$sql);
        if(mysqli_num_rows($result)>0)
        {
            while($row=mysqli_fetch_assoc($result)){
              echo"
              <div class='horitem'>
                  <div class='procol5'>
                    <div class = 'closedevent'>
                      <h4> Closed </h4>
                    </div>
                    <h2>".$row['name']."</h2>";
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
                      </div>
                    </div>
                  </div>";
                }
              }
              mysqli_close($conn);
              ?>
      </div>
    </div>
    </div>
  </div>
  <!-----------CONTENTS END-------------->
</div>
<script src="../js/active.js"></script>
<!-----------BODY END-------------->
<!-----------FOOTER START-------------->
<?php include '../php/userfooter.php';?>
<!-----------FOOTER END-------------->
</body>
</html>
