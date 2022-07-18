<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="../css/headfoot.css">
<link rel="stylesheet" href="../css/formstyle.css" />
<style media="screen">
	.center{
	margin-left: 100px;
	margin-right: 100px;
  width: 80%;
  border: 0px
  padding: 10px;
	}
</style>
</head>
<body>
<!-----------HEADER START-------------->
<?php require sprintf('../php/userheader.php',__DIR__);?>
<!-----------HEADER END-------------->
<!-----------BODY START-------------->
<div class="row">
	<!-----------SIDEBAR START-------------->
	<?php include '../php/coachsidenav.php';?>
	<!-----------SIDEBAR END-------------->
	<!-----------CONTENTS START-------------->
	<div class="column contents" align = center>
    <div class="input-form center" style="padding:20px;color:white">
          <h1 style="color:white">Registered Participants</h1>
            <table cellspacing="2" cellpadding="2" border="0" style="margin-left:30px;">
						<?php
						$occasion = $_GET['id'];

						$sql = "SELECT * FROM player p, participate pc WHERE p.username=pc.username AND pc.occasion_id=$occasion ;";
						$result=mysqli_query($conn,$sql);
						if(mysqli_num_rows($result)>0){
							while ($row = mysqli_fetch_assoc($result)) {
								echo "<tr>
										<td colspan='5'>".$row['f_name'].$row['l_name']."</td>
										<td colspan=''><a href='../coach/viewplayer.php?id=".$row['username']."'><button>View Profile</button></a></td>
			            </tr>";
							}
						}
						?>
            </table>
      </form>
    </div>
    </div>


	</div>
	<!-----------CONTENTS END-------------->
</div>
<!-----------BODY END-------------->
<!-----------FOOTER START-------------->
<?php include '../php/userfooter.php';?>
<?php mysqli_close($conn);?>
<script src="../js/activejs.js" charset="utf-8"></script>
<!-----------FOOTER END-------------->
</body>
</html>
