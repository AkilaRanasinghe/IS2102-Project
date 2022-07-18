<?php
include "../php/conn.php";
session_start();
$uname = $_SESSION['uname'];
?>

<?php
$title= ($_POST['title']);
$Category= ($_POST['Category']);
$content = ($_POST['content']); 
$image = addslashes(file_get_contents($_FILES['image']['tmp_name']));
$link = ($_POST['link']); 
$bigcontent = ($_POST['bigcontent']); 
date_default_timezone_set('Asia/Colombo');
			$today = date("Y-m-d");

$sql = "INSERT INTO news (username,title,Category,content,image,link,bigcontent,added_date) VALUES('$uname','$title','$Category','$content','$image','$link','$bigcontent','$today')";

if (mysqli_query($conn, $sql)) {
  // echo "New record successfully";
  echo '<script> alert("Success!");</script>';
  echo '<script> location.href="./newsfederation.php"</script>';
} else {
  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
?>