<?php
   
    require('../php/conn.php');
    $id=$_REQUEST['player_id'];
    $sql = " UPDATE player SET account_status ='Deactivated' WHERE player_id='$id'";
    $result = mysqli_query($conn,$sql);

    echo '<script> alert("Player Deleted Successfully!");</script>';
    echo '<script> location.href="dashboard.php"</script>';
  
?>