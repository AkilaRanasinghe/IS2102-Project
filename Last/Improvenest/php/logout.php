<?php
session_start();
$uname = $_SESSION['uname'];
session_destroy();
echo "<script type='text/javascript'>alert('Logged Out!'); window.location.href='http://localhost/Improvenest/index.php';</script>";
?>