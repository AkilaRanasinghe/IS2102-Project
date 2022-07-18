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
<link rel="stylesheet" href="../css/adminstyle.css"/>
<script>

</script>
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
        <div id="Find" class="tabcontent">
            <div class="row search-form">
                <div class="column procol4">
                    <h1> Dahboard </h1>
                </div>   
            </div>
<!--Player Card-->      
			<div class="card" style="background-color:#5bebd1;">
                <center>
                    <?php
                        $sql_query = "SELECT count(player_id) as playercount from player WHERE account_status='Active' ;";
                        $result = mysqli_query($conn, $sql_query);
                    ?>

                    <h1>
                        <?php
                            $row = mysqli_fetch_assoc($result);
                            echo $row["playercount"];
                        ?>
                    </h1>

                    <h1>Players</h1>
                        <input type="submit" name="s1" value="View/Delete" onclick="showTable('Player');">	
                </center>
			</div>
<!--Coach Card-->			
			            <div class="card" style="background-color:#269bf0;">
                        <center>
                            <?php
                                $sql_query = "SELECT count(coach_id) as coachcount from coach WHERE account_status='Active';";
                                $result = mysqli_query($conn, $sql_query);
                            ?>

                            <h1>
                                <?php
                                    $row = mysqli_fetch_assoc($result);
                                    echo $row["coachcount"];
                                ?>
                            </h1>

                    <h1>Coaches</h1>
                        <input type="submit" name="s2" value="View/Delete" onclick="showTable('Coach');">
                </center>
			</div>
<!--Organizer Card-->			
                        <div class="card" style="background-color:#6fbef7;">
                            <center>
                                <?php
                                    $sql_query = "SELECT count(organiser_id) as organisercount from organiser  WHERE account_status='Active' ;";
                                    $result = mysqli_query($conn, $sql_query);
                                ?>

                                <h1>
                                    <?php
                                        $row = mysqli_fetch_assoc($result);
                                        echo $row["organisercount"];
                                    ?>
                                </h1>

                    <h1>Organizers</h1>
                        <input type="submit" name="s3" value="View/Delete"  onclick="showTable('Organizer');">
                </center>
			</div>
<!--Federation Card-->			
                        <div class="card" style="background-color:#7a99eb;">
                            <center>	
                                <?php
                                    $sql_query = "SELECT count(federation_id) as federationcount from federation;";
                                    $result = mysqli_query($conn, $sql_query);
                                ?>

                                <h1>
                                    <?php
                                        $row = mysqli_fetch_assoc($result);
                                        echo $row["federationcount"];
                                    ?>
                                </h1>
                       
                    <h1>Federations</h1>
                    <input type="submit" name="s4" value="View/Delete" onclick="showTable('Federation');">
                </center>
			</div>
            <br /> <br /> <br /> <br /> <br /> <br /> <br /> <br /> <br /> <br /> <br /> <br />


<!-- Coach Table -->
			<div class = "" id = "Coach"  style="display: none">
                <h1> Coach Details</h1>
                    <table width="100%" cellpadding="10px" border="1" style="border-collapse: collapse; ">
                        <thead>
                            <tr style="background-color:#269bf0;">
                                <th>Coach ID</th>
                                <th>User Name</th>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Contact Number</th>
                                <th>Email Address</th>
                                <th>Gender</th>
                                <th>NIC</th>
                                <th>Delete User</th>
                            </tr>
                        </thead>
                    
                        <tbody>
                            <?php
                                
                                $count = 1;
                        
                                $sql_query = "SELECT * FROM coach  WHERE account_status='Active'; ";
                                $result = mysqli_query($conn, $sql_query);
                                while ($row = mysqli_fetch_assoc($result)) { ?>
                                
                                    <tr class="raw">
                                        <td align="center"><?php echo $row["coach_id"]; ?></td>
                                        <td align="center"><?php echo $row["username"]; ?></td>
                                        <td align="center"><?php echo $row["f_name"]; ?></td>
                                        <td align="center"><?php echo $row["l_name"]; ?></td>
                                        <td align="center"><?php echo $row["contact_no"]; ?></td>
                                        <td align="center"><?php echo $row["email"]; ?></td>
                                        <td align="center"><?php echo $row["gender"]; ?></td>
                                        <td align="center"><?php echo $row["nic_passport"]; ?></td>
                                        <td align="center"><a href="coachdelete.php?coach_id=<?php echo $row["coach_id"]; ?>"><button style="width:100%; height:5%; background-color: #ED5F5F; padding: 20px;"> Delete</button></a></td>
                                    </tr>
                                <?php $count++;
                            } ?>
                        </tbody>
                    </table>
                </div>

<!-- Player Table -->
        <div class = "" id = "Player" style="display: none">

            <h1> Player Details</h1>
                <table width="100%" cellpadding="10px" border="1" style="border-collapse: collapse; ">
                    <thead>
                        <tr style="background-color:#5bebd1;">
                            <th>Player ID</th>
                            <th>User Name</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Contact Number</th>
                            <th>Email Address</th>
                            <th>Gender</th>
                            <th>NIC</th>
                            <th>DELETE</th>
                        </tr>
                    </thead>
                
                    <tbody>
                        <?php
                        
                        $count = 1;
                    
                        $sql_query = "SELECT * FROM player  WHERE account_status='Active'; ";
                        $result = mysqli_query($conn, $sql_query);
                        while ($row = mysqli_fetch_assoc($result)) { ?>
                            <tr class="raw">
                                <td align="center"><?php echo $row["player_id"]; ?></td>
                                <td align="center"><?php echo $row["username"]; ?></td>
                                <td align="center"><?php echo $row["f_name"]; ?></td>
                                <td align="center"><?php echo $row["l_name"]; ?></td>
                                <td align="center"><?php echo $row["contact_no"]; ?></td>
                                <td align="center"><?php echo $row["email"]; ?></td>
                                <td align="center"><?php echo $row["gender"]; ?></td>
                                <td align="center"><?php echo $row["nic_passport"]; ?></td>
                                <td align="center"><a href="playerdelete.php?player_id=<?php echo $row["player_id"]; ?>"> <button style="width:100%; height:5%; background-color: #ED5F5F; padding: 20px;"> Delete</button></a></td>
                            </tr>

                            <?php $count++;
                        } ?>
                    </tbody>
                </table>
        </div>

<!-- Organizer table -->

        <div class = "" id = "Organizer" style="display: none">
        
        <h1> Organizer Details</h1>
                <table width="100%" cellpadding="10px" border="1" style="border-collapse: collapse; ">
                    <thead>
                        <tr style="background-color:#6fbef7;">
                            <th>Organizer ID</th>
                            <th>User Name</th>
                            <th>Name</th>
                            <th>Contact Number</th>
                            <th>Email Address</th>
                            <th>DELETE</th>
                        </tr>
                    </thead>
                
                    <tbody>
                        <?php
                        
                        $count = 1;
                    
                        $sql_query = "SELECT * FROM organiser WHERE account_status='Active'; ";
                        $result = mysqli_query($conn, $sql_query);
                        while ($row = mysqli_fetch_assoc($result)) { ?>
                            <tr class="raw">
                                <td align="center"><?php echo $row["organiser_id"]; ?></td>
                                <td align="center"><?php echo $row["username"]; ?></td>
                                <td align="center"><?php echo $row["name"]; ?></td>
                                <td align="center"><?php echo $row["contact_no"]; ?></td>
                                <td align="center"><?php echo $row["email"]; ?></td>
                                <td align="center"> <a href="organizerdelete.php?organiser_id=<?php echo $row["organiser_id"]; ?>"> <button style="width:100%; height:5%; background-color: #ED5F5F; padding: 20px;">Delete</button></a></td>
                            </tr>

                            <?php $count++;
                        } ?>
                    </tbody>
                </table>
        </div>

<!-- Federation Table -->
        <div class = "" id = "Federation" style="display: none">
        <h1> Federation Details</h1>
                <table width="100%" cellpadding="10px" border="1" style="border-collapse: collapse; ">
                    <thead>
                        <tr style="background-color:#7a99eb;">
                            <th>Federation ID</th>
                            <th>User Name</th>
                            <th>Name</th>
                            <th>Sport</th>
                            <th>Contact Number</th>
                            <th>Email Address</th>
                            
                        </tr>
                    </thead>
                
                    <tbody>
                        <?php
                        // $usernm=$_SESSION['username']
                        $count = 1;
                    
                        $sql_query = "SELECT * FROM federation; ";
                        $result = mysqli_query($conn, $sql_query);
                        while ($row = mysqli_fetch_assoc($result)) { ?>
                            <tr class="raw">
                                <td align="center"><?php echo $row["federation_id"]; ?></td>
                                <td align="center"><?php echo $row["username"]; ?></td>
                                <td align="center"><?php echo $row["name"]; ?></td>
                                <td align="center"><?php echo $row["sport"]; ?></td>
                                <td align="center"><?php echo $row["contact_no"]; ?></td>
                                <td align="center"><?php echo $row["email"]; ?></td>
                                
                            </tr>

                            <?php $count++;
                        } ?>
                    </tbody>
                </table>
        </div>
				
			
    <script>
        function showTable(table)
        {
            document.getElementById("Player").style.display="none";
            document.getElementById("Coach").style.display="none";
            document.getElementById("Organizer").style.display="none";
            document.getElementById("Federation").style.display="none";
            document.getElementById(table).style.display="block";

        }
    </script>
</div>			
</div>

<!-----------CONTENTS END-------------->
<script src="../js/active.js"></script>
<!-----------BODY END-------------->
<!-----------FOOTER START-------------->
<?php include '../php/userfooter.php';?>
<!-----------FOOTER END-------------->
</body>
</html>
