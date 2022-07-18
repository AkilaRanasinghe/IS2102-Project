<?php
   
    require('../php/conn.php');
    $oid=$_REQUEST['organiser_id'];
    $sql = " UPDATE organiser SET account_status ='Deactivated' WHERE organiser_id='$oid'";
    $result = mysqli_query($conn,$sql);
    // $sql = " UPDATE vehicle_det SET is_deleted ='YES' WHERE DID='$did'";
    // $result = mysqli_query($conn,$sql);
    echo '<script> alert("Organizer Deleted Successfully!");</script>';
echo '<script> location.href="dashboard.php"</script>';
  
?>