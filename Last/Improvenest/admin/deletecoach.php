<?php
   
    require('../php/conn.php');
    $did=$_REQUEST['reported_username'];
    $sql = " UPDATE coach SET account_status ='Deactivated' WHERE username='$did'";
    $result = mysqli_query($conn,$sql);

    $sql2 = " UPDATE report SET status ='Deleted' WHERE reported_username='$did'";
    $result2 = mysqli_query($conn,$sql2);

    echo '<script> alert("Coach Deleted Successfully!");</script>';
    echo '<script> location.href="reportCoach.php"</script>';
  
?>