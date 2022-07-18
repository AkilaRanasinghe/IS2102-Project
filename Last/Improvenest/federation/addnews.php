<?php
include '../php/conn.php';
session_start();
$uname = $_SESSION['uname'];
?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="../css/headfoot.css">
<link rel="stylesheet" href="../css/formstyle.css">
<script src="../js/commonjs.js"></script>
</head>
<body>
<!-----------HEADER START-------------->
<?php require sprintf('../php/userheader.php',__DIR__);?>
<!-----------HEADER END-------------->
<!-----------BODY START-------------->
<div class="row">
	<!-----------SIDEBAR START-------------->
	<?php include '../php/federationsidenav.php';?>
	<!-----------SIDEBAR END-------------->
	<!-----------CONTENTS START-------------->
    <div class="column contents" >
	<div class="input-form" style="padding:20px 150px 20px 150px;">
				<div class="mybox" style="width: 90%; margin-left: 5%; ">
				<form method="post"  class="data" action="add_news.php" enctype='multipart/form-data'>
  	  					<h1 style="padding-top: 10px;"> <center>  Add News </center></h1>
						<hr />
						<br />
						<br />
						<br />
        				<label for="title">Title</label> 
						<br />
						<input type="text" style="height: 50px; width: 800px"placeholder="title" name="title" id="title" required>
						<br />
						<br />
						<br />


						<label for="Category">Category : </label> 
						<select id="Category" input style="height: 30px; width: 200px" name="Category" required>
						   <option value="" selected disabled>Category</option>
						   <option value="Updates">Sports Updates</option>
						   <option value="Tips">Improving Tips</option>
						   
						   
						</select>	<label for="link">Enter Youtube embed link :</label> 
						
						<input type="text" style="height: 30px; width: 300px" placeholder="youtube embed link" name="link" id="link" required>
<br />
						<br />
						<label for="image">Upload image  :</label>
						<input type='file' name='image' required>
						<br />
						<br />
						<label for="content">Content</label> 
						<br />
  	 		 			<input type="textarea" style="height: 100px; width: 800px"   placeholder="Enter News" name="content" id="content" required>
						<br />
						<br />	
						<br />
						<br />
						<label for="bigcontent">Descriptive Content</label> 
						<br />
  	 		 			<input type="textarea" style="height: 100px; width: 800px"   placeholder="Enter News" name="bigcontent" id="bigcontent" required>
						<br />
						<br />	
						<br />
						
						<center>
						<button style="width:40%; margin-left: 30px;" type="submit" id="organisersbt" value="Submit" >Submit</button>
						<button type="reset" value="Reset" style="background-color:#a32626; width:40%;">Reset</button>	
						</center>
						<br />	
						<br />
						<br />					
						
					</form>
				</div>	
			</div>
		</div>
		</div>




    
	<!-----------CONTENTS END-------------->
</div>
<script>
	document.getElementById("defaultOpen").click();
</script>
<script src="../js/active.js"></script>
<!-----------BODY END-------------->
<!-----------FOOTER START-------------->
<?php include '../php/userfooter.php';?>
<!-----------FOOTER END-------------->
</body>
</html>