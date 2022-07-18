<?php
include "../php/conn.php";
session_start();
$uname = $_SESSION['uname'];
?>

<?php
date_default_timezone_set('Asia/Colombo');
$date = date('Y-m-d', time());
$title= ($_POST['title']);
$Category= ($_POST['Category']);
$content = ($_POST['content']); 
$image = "";
$link = ($_POST['link']); 
$bigcontent = ($_POST['bigcontent']);
if(isset($_POST['title']))  
{
	$image = addslashes(file_get_contents($_FILES['image']['tmp_name']));
}
 


$sql = "INSERT INTO news (username,title,Category,content,image,link,bigcontent,added_date) VALUES('$uname','$title','$Category','$content','$image','$link','$bigcontent','$date')";

if (mysqli_query($conn, $sql)) {
  // echo "New record successfully";
  echo '<script> alert("Success!");</script>';
  echo '<script> location.href="./newsfederation.php"</script>';
} else {
  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
?>