<?php
   
    require('../php/conn.php');
    $did=$_REQUEST['reported_username'];
    $sql = " UPDATE player SET account_status ='Deactivated' WHERE username='$did'";
    $result = mysqli_query($conn,$sql);

    $sql2 = " UPDATE report SET status ='Deleted' WHERE reported_username='$did'";
    $result2 = mysqli_query($conn,$sql2);

    echo '<script> alert("Player Deleted Successfully!");</script>';
    echo '<script> location.href="reportPlayer.php"</script>';
  
?>