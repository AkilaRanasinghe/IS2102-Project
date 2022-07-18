<?php
$sql=" SELECT DISTINCT * FROM event e, coaching_session c, event_sport s WHERE c.username = '" .$uname. "' AND e.occasion_id = c.occasion_id AND s.occasion_id = c.occasion_id";
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

      echo"<div class='horitem'>
          <div class='procol5'>
          <div class = 'closedevent'>
          <h4> Closed </h4>
          </div>
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
            $sql2 = "SELECT * FROM coaching_session_focus WHERE occasion_id = '".$occasion."'";
            $result2 = mysqli_query($conn,$sql2);
            $resultchk2 = mysqli_num_rows($result2);

            if($resultchk2 > 0)
            {
              $data = array();
              while($row2 = mysqli_fetch_assoc($result2))
              {
                $data[] = $row2["focus_on"];
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
          <a href='manageevent.php'><button type='submit' onclick='send_id('".$occasion."')'>Manage</button></a>
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
            $sql2 = "SELECT * FROM coaching_session_focus WHERE occasion_id = '".$occasion."'";
            $result2 = mysqli_query($conn,$sql2);
            $resultchk2 = mysqli_num_rows($result2);

            if($resultchk2> 0)
            {
              $data = array();
              while($row2 = mysqli_fetch_assoc($result2))
              {
                $data[] = $row2["focus_on"];
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

        <a href='manageevent.php'><button type='submit' onclick='send_id('".$occasion."')'>Manage</button></a>
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
<script>
  function send_id(occasionid){
    window.location.href = "manageevent.php?occasionid="+occasionid;
  }
</script>
