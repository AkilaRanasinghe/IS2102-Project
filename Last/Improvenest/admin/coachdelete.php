<?php
   
    require('../php/conn.php');
    $did=$_REQUEST['coach_id'];
    $sql = " UPDATE coach SET account_status ='Deactivated' WHERE coach_id='$did'";
    $result = mysqli_query($conn,$sql);
    // $sql = " UPDATE vehicle_det SET is_deleted ='YES' WHERE DID='$did'";
    // $result = mysqli_query($conn,$sql);
    echo '<script> alert(" Coach Deleted Successfully!");</script>';
echo '<script> location.href="dashboard.php"</script>';
  
?>