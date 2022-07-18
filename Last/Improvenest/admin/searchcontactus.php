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
<link rel="stylesheet" href="../css/card.css"/>
<script src="../js/commonjs.js"></script>
</head>
<body>
<!-----------HEADER START-------------->
<?php require sprintf('../php/userheader.php',__DIR__);?>
<!-----------HEADER END-------------->
<!-----------BODY START-------------->
<div class="row">
	<!-----------SIDEBAR START-------------->
	<?php include '../php/adminsidenav.php';?>
	<!-----------SIDEBAR END-------------->
	<!-----------CONTENTS START-------------->
	<div class="column contents">
		<div class="row tab">
			
			
		</div>	

<!--Reports against Players-->		
		<div id="player" class="tabcontent">
			<div class="row search-form">
				<div class="column procol4">
					<h1>Search Results</h1>
				</div>
				<div class="column procol5" style="padding-top:25px;">
					<form action="searchcontactus.php" method="POST">
						<table cellspacing="2" cellpadding="2" border="0" width="100%" style="float:right">
						<tr>
							<td>
								<input type="text" placeholder="Search.." name="search" required>					
							</td>
							<td width="150px">
								<select name="sort">
									<option value="" selected disabled>-Sort-</option>
									<option value="asce">Ascending</option>
									<option value="desc">Descending</option>
								</select>					
							</td>
							<td width="20px">
								<button type="submit"><img src="../images/csearch.png"></button>
							</td>
						</tr>
						</table>
					</form>
				</div>
			</div>

            <?php
                $search = "";
                $sort ="";

                if(isset($_POST['search']))
                {
                    $search = $_POST["search"];
                }
                if(isset($_POST['sort']))
				{
					$sort = $_POST["sort"];
				} 
                
                if($sort == "desc" || $sort == "")
			    {
                
            ?>
		
			<div class="row">
				<table width="100%" cellpadding="10px" border="1" style="border-collapse: collapse; ">
    	    		<thead> 
		    		</thead>
		    		<tbody>
                    <?php
							$count = 1;
								
							$sql = "SELECT DISTINCT * FROM feedback WHERE CONCAT (username, '', name, '', email, '', feedback) LIKE '%" . $search . "%' AND read_status='false' ORDER BY feedback_id DESC";
							$result = $conn->query($sql);
				    
                        if($result->num_rows > 0)
				        {
					        while($row = $result->fetch_assoc())
					        { 
                                $id=$row["feedback_id"];
                                $sqli = "SELECT * FROM feedback WHERE read_status='false' ORDER BY feedback_id DESC";
                                $resulti = $conn->query($sqli);

                                if($resulti->num_rows > 0)
                                {
                                ?>
								<tr class="raw"> 
									<div class="row">
										<div class="horitem">
											<div class="procol5">
												<h3>Username: <?php echo $row["username"]; ?></h3>
                                                <p>Name: <?php echo $row["name"]; ?></p>
												<p>Email Address: <?php echo $row["email"]; ?></p>
												<p>Feedback: <?php echo $row["feedback"]; ?>
												
											</div>

											<div class="procol4">
											<br /><br />
											<?php echo"<a href='../php/markasread.php?id=".$id."'>"; ?><button style="background-color: #34EC47;"> &#10003; <h6>Mark As Read</h6></button></a>
											</div>				
										</div>
									</div>	
									<br/>
								</tr>
								<?php $count++;
							}
                         }
                         }
                        }
                        else if($sort == "asce")
                        { ?>
                        			<div class="row">
				<table width="100%" cellpadding="10px" border="1" style="border-collapse: collapse; ">
    	    		<thead> 
		    		</thead>
		    		<tbody>
                    <?php
							$count = 1;
								
							$sql = "SELECT DISTINCT * FROM feedback WHERE CONCAT (username, '', name, '', email, '', feedback) LIKE '%" . $search . "%' AND read_status='false'";
							$result = $conn->query($sql);
				    
                        if($result->num_rows > 0)
				        {
					        while($row = $result->fetch_assoc())
					        { 
                                $id=$row["feedback_id"];
                                $sqli = "SELECT * FROM feedback WHERE read_status='false'";
                                $resulti = $conn->query($sqli);

                                if($resulti->num_rows > 0)
                                {
                                ?>
								<tr class="raw"> 
									<div class="row">
										<div class="horitem">
											<div class="procol5">
												<h3>Username: <?php echo $row["username"]; ?></h3>
                                                <p>Name: <?php echo $row["name"]; ?></p>
												<p>Email Address: <?php echo $row["email"]; ?></p>
												<p>Feedback: <?php echo $row["feedback"]; ?>
												
											</div>

											<div class="procol4">
											<br /><br />
											<?php echo"<a href='../php/markasread.php?id=".$id."'>"; ?><button style="background-color: #34EC47;"> &#10003; <h6>Mark As Read</h6></button></a>
											</div>				
										</div>
									</div>	
									<br/>
								</tr>
								<?php $count++;
							}
                         }
                         } 
                        }?>
        
					</tbody>
				</table>	
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