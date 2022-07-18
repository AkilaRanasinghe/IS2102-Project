<?php
include "../php/conn.php";
session_start();
$uname = $_SESSION['uname'];
?>

<?php
$name= ($_POST['name']);
$contact_no = ($_POST['contact_no']);
$Category= ($_POST['Category']);
$address = ($_POST['address']); 
$description = ($_POST['description']); 
$image = addslashes(file_get_contents($_FILES['image']['tmp_name']));


$sql = "INSERT INTO shop (username,name,contact_no,Category,address,description,image) VALUES('$uname','$name','$contact_no','$Category','$address','$description','$image')";

if (mysqli_query($conn, $sql)) {
  // echo "New record successfully";
  echo '<script> alert("Success!");</script>';
  echo '<script> location.href="./shopsfederation.php"</script>';
} else {
  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
?>