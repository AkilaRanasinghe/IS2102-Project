<?php
   
    require('../php/conn.php');
    session_start();
    $uname=($_SESSION['uname']);
    $sql = " UPDATE organiser SET account_status ='Deactivated' WHERE username='$uname'";
    $result = mysqli_query($conn,$sql);

    echo '<script> alert("Account Deleted Successfully!");</script>';
    echo '<script> location.href="../index.php"</script>';
  
?>