<?php
   
    require('../php/conn.php');
    $id=$_REQUEST['federation_id'];
    $sql = " UPDATE federation SET account_status ='Deactivated' WHERE federation_id='$id'";
    $result = mysqli_query($conn,$sql);

    echo '<script> alert("Federation Deleted Successfully!");</script>';
    echo '<script> location.href="dashboard.php"</script>';
  
?>