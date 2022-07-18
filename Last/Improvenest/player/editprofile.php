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
	<?php include '../php/playersidenav.php';?>
	<!-----------SIDEBAR END-------------->
	<!-----------CONTENTS START-------------->
	<div class="column contents">
		<div class="input-form" style="padding:20px 150px 20px 150px;">
			<h1>Edit Profile</h1>
				<form action="../php/playerUpdate.php" name="updateForm" method="POST" onsubmit="return epassword()">
				<?php
				$sql="SELECT * FROM player WHERE username = '" .$uname. "'";
				$result=$conn->query ($sql);
				if ($result -> num_rows >0)
				{
					while ($row= $result -> fetch_assoc())
					{
						$fname = $row ['f_name'];
						$lname = $row ['l_name'];
						$nic = $row ['nic_passport'];
						$dob = $row ['dob'];
						$gender = $row ['gender'];
						$country = $row ['country'];
						$mobile = $row ['contact_no'];
						$email = $row ['email'];
						$address = $row ['address'];
						$password = $row ['password'];
						$achievement = $row ['achievement_level'];
						$fitness = $row ['fitness_level'];
						$province = $row ['province'];
						$district = $row ['city'];
						$place = $row ['venue'];
						$notes = $row ['note'];
					}
				}
				?>				
				<table cellspacing="2" cellpadding="2" border="0" >
				<tr>
					<td colspan="5">
						<p>First Name</p>
						<input type="text" placeholder="First Name" value="<?php echo $fname ?>" name="Fname" required>				
					</td>
					<td colspan="5">
						<p>Last Name</p>
						<input type="text" placeholder="Last Name" value="<?php echo $lname ?>" name="Lname" required>				
					</td>			
				</tr>
				<tr>
					<td colspan="5">
						<p>NIC/Passport</p>
						<input type="text" placeholder="NIC/Passport" value="<?php echo $nic ?>" name="Nic" pattern="[A-Z0-9]{9,12}" required>				
					</td>
					<td colspan="5">
						<p>Date of Birth</p>
						<input type="date" value="<?php echo $dob ?>" name="Dob" required>			
					</td>			
				</tr>
				<tr>
					<td colspan="10">
						<p>Gender</p>				
					</td>
				</tr>
				<tr>
					<td></td>
					<td>
						<?php
							if($gender == "Male" || $gender == "")
							{
								echo"<input type='radio' name='Gender' value='Male' checked>";
							}
							else
							{
								echo"<input type='radio' name='Gender' value='Male'>";
							}
						?>
					</td>
					<td>
						<label>Male</label>			
					</td>
					<td>
						<?php
							if($gender == "Female")
							{
								echo"<input type='radio' name='Gender' value='Female' checked>";
							}
							else
							{
								echo"<input type='radio' name='Gender' value='Female'>";
							}						
						?>
					</td>
					<td>
						<label>Female</label>			
					</td>				
					<td colspan='5'></td>
				</tr>
				<tr>
					<td colspan="10">
						<p>Country</p>
						<select id="country" name="Country" required>
						   <?php
						   if($country == "")
						   {
							   echo"<option value='' disabled selected>Country</option>";
						   }
						   else
						   {
							   echo"<option value='".$country."' selected>".$country."</option>";
						   }
						   ?>
						   <option value="Afganistan">Afghanistan</option>
						   <option value="Albania">Albania</option>
						   <option value="Algeria">Algeria</option>
						   <option value="American Samoa">American Samoa</option>
						   <option value="Andorra">Andorra</option>
						   <option value="Angola">Angola</option>
						   <option value="Anguilla">Anguilla</option>
						   <option value="Antigua and Barbuda">Antigua and Barbuda</option>
						   <option value="Argentina">Argentina</option>
						   <option value="Armenia">Armenia</option>
						   <option value="Aruba">Aruba</option>
						   <option value="Australia">Australia</option>
						   <option value="Austria">Austria</option>
						   <option value="Azerbaijan">Azerbaijan</option>
						   <option value="Bahamas">Bahamas</option>
						   <option value="Bahrain">Bahrain</option>
						   <option value="Bangladesh">Bangladesh</option>
						   <option value="Barbados">Barbados</option>
						   <option value="Belarus">Belarus</option>
						   <option value="Belgium">Belgium</option>
						   <option value="Belize">Belize</option>
						   <option value="Benin">Benin</option>
						   <option value="Bermuda">Bermuda</option>
						   <option value="Bhutan">Bhutan</option>
						   <option value="Bolivia">Bolivia</option>
						   <option value="Bonaire">Bonaire</option>
						   <option value="Bosnia and Herzegovina">Bosnia and Herzegovina</option>
						   <option value="Botswana">Botswana</option>
						   <option value="Brazil">Brazil</option>
						   <option value="British Indian Ocean Ter">British Indian Ocean Ter</option>
						   <option value="Brunei">Brunei</option>
						   <option value="Bulgaria">Bulgaria</option>
						   <option value="Burkina Faso">Burkina Faso</option>
						   <option value="Burundi">Burundi</option>
						   <option value="Cambodia">Cambodia</option>
						   <option value="Cameroon">Cameroon</option>
						   <option value="Canada">Canada</option>
						   <option value="Canary Islands">Canary Islands</option>
						   <option value="Cape Verde">Cape Verde</option>
						   <option value="Cayman Islands">Cayman Islands</option>
						   <option value="Central African Republic">Central African Republic</option>
						   <option value="Chad">Chad</option>
						   <option value="Channel Islands">Channel Islands</option>
						   <option value="Chile">Chile</option>
						   <option value="China">China</option>
						   <option value="Christmas Island">Christmas Island</option>
						   <option value="Cocos Island">Cocos Island</option>
						   <option value="Colombia">Colombia</option>
						   <option value="Comoros">Comoros</option>
						   <option value="Congo">Congo</option>
						   <option value="Cook Islands">Cook Islands</option>
						   <option value="Costa Rica">Costa Rica</option>
						   <option value="Cote DIvoire">Cote DIvoire</option>
						   <option value="Croatia">Croatia</option>
						   <option value="Cuba">Cuba</option>
						   <option value="Curaco">Curacao</option>
						   <option value="Cyprus">Cyprus</option>
						   <option value="Czech Republic">Czech Republic</option>
						   <option value="Denmark">Denmark</option>
						   <option value="Djibouti">Djibouti</option>
						   <option value="Dominica">Dominica</option>
						   <option value="Dominican Republic">Dominican Republic</option>
						   <option value="East Timor">East Timor</option>
						   <option value="Ecuador">Ecuador</option>
						   <option value="Egypt">Egypt</option>
						   <option value="El Salvador">El Salvador</option>
						   <option value="Equatorial Guinea">Equatorial Guinea</option>
						   <option value="Eritrea">Eritrea</option>
						   <option value="Estonia">Estonia</option>
						   <option value="Ethiopia">Ethiopia</option>
						   <option value="Falkland Islands">Falkland Islands</option>
						   <option value="Faroe Islands">Faroe Islands</option>
						   <option value="Fiji">Fiji</option>
						   <option value="Finland">Finland</option>
						   <option value="France">France</option>
						   <option value="French Guiana">French Guiana</option>
						   <option value="French Polynesia">French Polynesia</option>
						   <option value="French Southern Ter">French Southern Ter</option>
						   <option value="Gabon">Gabon</option>
						   <option value="Gambia">Gambia</option>
						   <option value="Georgia">Georgia</option>
						   <option value="Germany">Germany</option>
						   <option value="Ghana">Ghana</option>
						   <option value="Gibraltar">Gibraltar</option>
						   <option value="Great Britain">Great Britain</option>
						   <option value="Greece">Greece</option>
						   <option value="Greenland">Greenland</option>
						   <option value="Grenada">Grenada</option>
						   <option value="Guadeloupe">Guadeloupe</option>
						   <option value="Guam">Guam</option>
						   <option value="Guatemala">Guatemala</option>
						   <option value="Guinea">Guinea</option>
						   <option value="Guyana">Guyana</option>
						   <option value="Haiti">Haiti</option>
						   <option value="Hawaii">Hawaii</option>
						   <option value="Honduras">Honduras</option>
						   <option value="Hong Kong">Hong Kong</option>
						   <option value="Hungary">Hungary</option>
						   <option value="Iceland">Iceland</option>
						   <option value="Indonesia">Indonesia</option>
						   <option value="India">India</option>
						   <option value="Iran">Iran</option>
						   <option value="Iraq">Iraq</option>
						   <option value="Ireland">Ireland</option>
						   <option value="Isle of Man">Isle of Man</option>
						   <option value="Israel">Israel</option>
						   <option value="Italy">Italy</option>
						   <option value="Jamaica">Jamaica</option>
						   <option value="Japan">Japan</option>
						   <option value="Jordan">Jordan</option>
						   <option value="Kazakhstan">Kazakhstan</option>
						   <option value="Kenya">Kenya</option>
						   <option value="Kiribati">Kiribati</option>
						   <option value="Korea North">Korea North</option>
						   <option value="Korea Sout">Korea South</option>
						   <option value="Kuwait">Kuwait</option>
						   <option value="Kyrgyzstan">Kyrgyzstan</option>
						   <option value="Laos">Laos</option>
						   <option value="Latvia">Latvia</option>
						   <option value="Lebanon">Lebanon</option>
						   <option value="Lesotho">Lesotho</option>
						   <option value="Liberia">Liberia</option>
						   <option value="Libya">Libya</option>
						   <option value="Liechtenstein">Liechtenstein</option>
						   <option value="Lithuania">Lithuania</option>
						   <option value="Luxembourg">Luxembourg</option>
						   <option value="Macau">Macau</option>
						   <option value="Macedonia">Macedonia</option>
						   <option value="Madagascar">Madagascar</option>
						   <option value="Malaysia">Malaysia</option>
						   <option value="Malawi">Malawi</option>
						   <option value="Maldives">Maldives</option>
						   <option value="Mali">Mali</option>
						   <option value="Malta">Malta</option>
						   <option value="Marshall Islands">Marshall Islands</option>
						   <option value="Martinique">Martinique</option>
						   <option value="Mauritania">Mauritania</option>
						   <option value="Mauritius">Mauritius</option>
						   <option value="Mayotte">Mayotte</option>
						   <option value="Mexico">Mexico</option>
						   <option value="Midway Islands">Midway Islands</option>
						   <option value="Moldova">Moldova</option>
						   <option value="Monaco">Monaco</option>
						   <option value="Mongolia">Mongolia</option>
						   <option value="Montserrat">Montserrat</option>
						   <option value="Morocco">Morocco</option>
						   <option value="Mozambique">Mozambique</option>
						   <option value="Myanmar">Myanmar</option>
						   <option value="Nambia">Nambia</option>
						   <option value="Nauru">Nauru</option>
						   <option value="Nepal">Nepal</option>
						   <option value="Netherland Antilles">Netherland Antilles</option>
						   <option value="Netherlands">Netherlands</option>
						   <option value="Nevis">Nevis</option>
						   <option value="New Caledonia">New Caledonia</option>
						   <option value="New Zealand">New Zealand</option>
						   <option value="Nicaragua">Nicaragua</option>
						   <option value="Niger">Niger</option>
						   <option value="Nigeria">Nigeria</option>
						   <option value="Niue">Niue</option>
						   <option value="Norfolk Island">Norfolk Island</option>
						   <option value="Norway">Norway</option>
						   <option value="Oman">Oman</option>
						   <option value="Pakistan">Pakistan</option>
						   <option value="Palau Island">Palau Island</option>
						   <option value="Palestine">Palestine</option>
						   <option value="Panama">Panama</option>
						   <option value="Papua New Guinea">Papua New Guinea</option>
						   <option value="Paraguay">Paraguay</option>
						   <option value="Peru">Peru</option>
						   <option value="Phillipines">Philippines</option>
						   <option value="Pitcairn Island">Pitcairn Island</option>
						   <option value="Poland">Poland</option>
						   <option value="Portugal">Portugal</option>
						   <option value="Puerto Rico">Puerto Rico</option>
						   <option value="Qatar">Qatar</option>
						   <option value="Republic of Montenegro">Republic of Montenegro</option>
						   <option value="Republic of Serbia">Republic of Serbia</option>
						   <option value="Reunion">Reunion</option>
						   <option value="Romania">Romania</option>
						   <option value="Russia">Russia</option>
						   <option value="Rwanda">Rwanda</option>
						   <option value="St Barthelemy">St Barthelemy</option>
						   <option value="St Eustatius">St Eustatius</option>
						   <option value="St Helena">St Helena</option>
						   <option value="St Kitts-Nevis">St Kitts-Nevis</option>
						   <option value="St Lucia">St Lucia</option>
						   <option value="St Maarten">St Maarten</option>
						   <option value="St Pierre and Miquelon">St Pierre and Miquelon</option>
						   <option value="St Vincent and Grenadines">St Vincent and Grenadines</option>
						   <option value="Saipan">Saipan</option>
						   <option value="Samoa">Samoa</option>
						   <option value="Samoa American">Samoa American</option>
						   <option value="San Marino">San Marino</option>
						   <option value="Sao Tome and Principe">Sao Tome and Principe</option>
						   <option value="Saudi Arabia">Saudi Arabia</option>
						   <option value="Senegal">Senegal</option>
						   <option value="Seychelles">Seychelles</option>
						   <option value="Sierra Leone">Sierra Leone</option>
						   <option value="Singapore">Singapore</option>
						   <option value="Slovakia">Slovakia</option>
						   <option value="Slovenia">Slovenia</option>
						   <option value="Solomon Islands">Solomon Islands</option>
						   <option value="Somalia">Somalia</option>
						   <option value="South Africa">South Africa</option>
						   <option value="Spain">Spain</option>
						   <option value="Sri Lanka">Sri Lanka</option>
						   <option value="Sudan">Sudan</option>
						   <option value="Suriname">Suriname</option>
						   <option value="Swaziland">Swaziland</option>
						   <option value="Sweden">Sweden</option>
						   <option value="Switzerland">Switzerland</option>
						   <option value="Syria">Syria</option>
						   <option value="Tahiti">Tahiti</option>
						   <option value="Taiwan">Taiwan</option>
						   <option value="Tajikistan">Tajikistan</option>
						   <option value="Tanzania">Tanzania</option>
						   <option value="Thailand">Thailand</option>
						   <option value="Togo">Togo</option>
						   <option value="Tokelau">Tokelau</option>
						   <option value="Tonga">Tonga</option>
						   <option value="Trinidad and Tobago">Trinidad and Tobago</option>
						   <option value="Tunisia">Tunisia</option>
						   <option value="Turkey">Turkey</option>
						   <option value="Turkmenistan">Turkmenistan</option>
						   <option value="Turks and Caicos Is">Turks and Caicos Is</option>
						   <option value="Tuvalu">Tuvalu</option>
						   <option value="Uganda">Uganda</option>
						   <option value="United Kingdom">United Kingdom</option>
						   <option value="Ukraine">Ukraine</option>
						   <option value="United Arab Erimates">United Arab Emirates</option>
						   <option value="United States of America">United States of America</option>
						   <option value="Uraguay">Uruguay</option>
						   <option value="Uzbekistan">Uzbekistan</option>
						   <option value="Vanuatu">Vanuatu</option>
						   <option value="Vatican City State">Vatican City State</option>
						   <option value="Venezuela">Venezuela</option>
						   <option value="Vietnam">Vietnam</option>
						   <option value="Virgin Islands (Brit)">Virgin Islands (Brit)</option>
						   <option value="Virgin Islands (USA)">Virgin Islands (USA)</option>
						   <option value="Wake Island">Wake Island</option>
						   <option value="Wallis and Futana Is">Wallis and Futana Is</option>
						   <option value="Yemen">Yemen</option>
						   <option value="Zaire">Zaire</option>
						   <option value="Zambia">Zambia</option>
						   <option value="Zimbabwe">Zimbabwe</option>
						</select>				
					</td>		
				</tr>
				<tr>
					<td colspan="5">
						<p>Contact Number</p>
						<input type="text" placeholder="Contact Number" value="<?php echo $mobile ?>" name="Contact" pattern="[0-9]{10}" required>							
					</td>
					<td colspan="5">
						<p>Email</p>
						<input type="text" placeholder="Email" value="<?php echo $email ?>" name="EMail" pattern="[a-zA-Z0-9%_+-]+@[a-zA-Z]+\.[a-z]{2,3}" required>												
					</td>			
				</tr>
				<tr>
					<td colspan="10">
						<p>Address</p>
						<input type="text" placeholder="Address" value="<?php echo $address ?>" name="Address" required>	
					</td>			
				</tr>
				<tr>
					<td colspan="10">
						<p>Sports</p>				
					</td>
				</tr>
				<?php
					$sqll = "SELECT * FROM player_sport WHERE username = '".$uname."'";
					$resultt = $conn->query($sqll);
					if($resultt->num_rows >= 0)
					{
						$data = array();
						while($roww = $resultt->fetch_assoc())
						{
							$data[] = $roww["sport"];
						}
					}						
				?>
				<tr>
					<td></td>
					<td>
						<?php
							if(in_array("Squash" ,$data ))
							{
								echo "<input type='checkbox' name='Sport[]' value='Squash' checked>";
							}
							else
							{
								echo "<input type='checkbox' name='Sport[]' value='Squash'>";
							}
						?>				
					</td>
					<td>
						<label>Squash</label>			
					</td>
					<td>
						<?php
							if(in_array("Tennis" ,$data ))
							{
								echo "<input type='checkbox' name='Sport[]' value='Tennis' checked>";
							}
							else
							{
								echo "<input type='checkbox' name='Sport[]' value='Tennis'>";
							}
						?>				
					</td>
					<td>
						<label>Tennis</label>			
					</td>
					<td>
						<?php
							if(in_array("Badminton" ,$data ))
							{
								echo "<input type='checkbox' name='Sport[]' value='Badminton' checked>";
							}
							else
							{
								echo "<input type='checkbox' name='Sport[]' value='Badminton'>";
							}
						?>	
					</td>
					<td>
						<label>Badminton</label>			
					</td>
					<td>
						<?php
							if(in_array("Archery" ,$data ))
							{
								echo "<input type='checkbox' name='Sport[]' value='Archery' checked>";
							}
							else
							{
								echo "<input type='checkbox' name='Sport[]' value='Archery'>";
							}
						?>				
					</td>
					<td>
						<label>Archery</label>			
					</td>
					<td></td>				
				</tr>
				<tr>
					<td></td>
					<td>
						<?php
							if(in_array("Mixed Martial Arts" ,$data ))
							{
								echo "<input type='checkbox' name='Sport[]' value='Mixed Martial Arts' checked>";
							}
							else
							{
								echo "<input type='checkbox' name='Sport[]' value='Mixed Martial Arts'>";
							}
						?>
					</td>				
					<td colspan="4">
						<label>Mixed Martial Arts</label>				
					</td>
					<td colspan="5"></td>				
				</tr>
				<tr>
					<td colspan="5">
						<p>Password</p>
						<input type="password" placeholder="10-20 characters including @, #, $, %, &" value="<?php echo $password ?>" name="Password" pattern="[a-zA-Z0-9%@#$&]{10,20}" required>			
					</td>
					<td colspan="5">
						<p>Re-enter password</p>
						<input type="password" placeholder="Re-enter password" value="<?php echo $password ?>" name="RPassword" required>				
					</td>			
				</tr>
				<tr>
					<td colspan="10">
						<br/><hr/><br/>				
					</td>
				</tr>
				<tr>
					<td colspan="10">
						<p>Achievement Level</p>				
					</td>
				</tr>
				<tr>
					<td></td>
					<td>
						<?php
							if($achievement == "Novices Level" || $achievement == "")
							{
								echo"<input type='radio' name='Achievement' value='Novices Level' checked>";
							}
							else
							{
								echo"<input type='radio' name='Achievement' value='Novices Level'>";
							}
						?>
					</td>
					<td>
						<label>Novice's Level</label>			
					</td>
					<td>
						<?php
							if($achievement == "Novices Winner")
							{
								echo"<input type='radio' name='Achievement' value='Novices Winner' checked>";
							}
							else
							{
								echo"<input type='radio' name='Achievement' value='Novices Winner'>";
							}
						?>		
					</td>
					<td>
						<label>Novice's Winner</label>			
					</td>
					<td>
						<?php
							if($achievement == "Plate Winner")
							{
								echo"<input type='radio' name='Achievement' value='Plate Winner' checked>";
							}
							else
							{
								echo"<input type='radio' name='Achievement' value='Plate Winner'>";
							}
						?>			
					</td>
					<td>
						<label>Plate Winner</label>			
					</td>					
					<td colspan='3'></td>
				</tr>
				<tr>
					<td></td>
					<td>
						<?php
							if($achievement == "National 8 - 16")
							{
								echo"<input type='radio' name='Achievement' value='National 8 - 16' checked>";
							}
							else
							{
								echo"<input type='radio' name='Achievement' value='National 8 - 16'>";
							}
						?>			
					</td>
					<td>
						<label>National 8 - 16</label>			
					</td>
					<td>
						<?php
							if($achievement == "National Top 8")
							{
								echo"<input type='radio' name='Achievement' value='National Top 8' checked>";
							}
							else
							{
								echo"<input type='radio' name='Achievement' value='National Top 8'>";
							}
						?>	
					</td>
					<td>
						<label>National Top 8</label>			
					</td>
					<td>
						<?php
							if($achievement == "International Ranking")
							{
								echo"<input type='radio' name='Achievement' value='International Ranking' checked>";
							}
							else
							{
								echo"<input type='radio' name='Achievement' value='International Ranking'>";
							}
						?>		
					</td>
					<td>
						<label>International Ranking</label>			
					</td>					
					<td colspan='3'></td>
				</tr>
				<tr>
					<td colspan="10"><br/></td>
				</tr>				
				<tr>
					<td colspan="10">
						<p>Current Fitness Level</p>				
					</td>
				</tr>
				<tr>
					<td></td>
					<td>
						<?php
							if($fitness == "Low Level" || $fitness == "")
							{
								echo"<input type='radio' name='Fitness' value='Low Level' checked>";
							}
							else
							{
								echo"<input type='radio' name='Fitness' value='Low Level'>";
							}
						?>		
					</td>
					<td>
						<label>Low Level</label>			
					</td>
					<td>
						<?php
							if($fitness == "Competition Level")
							{
								echo"<input type='radio' name='Fitness' value='Competition Level' checked>";
							}
							else
							{
								echo"<input type='radio' name='Fitness' value='Competition Level'>";
							}
						?>		
					</td>
					<td>
						<label>Competition Level</label>			
					</td>					
					<td>
						<?php
							if($fitness == "Casual Training Level")
							{
								echo"<input type='radio' name='Fitness' value='Casual Training Level' checked>";
							}
							else
							{
								echo"<input type='radio' name='Fitness' value='Casual Training Level'>";
							}
						?>	
					</td>
					<td colspan='2'>
						<label>Casual Training Level</label>			
					</td>					
					<td colspan='2'></td>
				</tr>
				<tr>
					<td colspan="10"><br/></td>
				</tr>				
				<tr>
					<td colspan="10">
						<p>Training Aspects</p>				
					</td>
				</tr>
				<?php
					$sqlll = "SELECT * FROM player_training_aspect WHERE username = '".$uname."'";
					$resulttt = $conn->query($sqlll);
					if($resulttt->num_rows >= 0)
					{
						$dataa = array();
						while($rowww = $resulttt->fetch_assoc())
						{
							$dataa[] = $rowww["training_aspect"];
						}
					}						
				?>
				<tr>
					<td></td>
					<td>
						<?php
							if(in_array("Sports Technique" ,$dataa ))
							{
								echo "<input type='checkbox' name='Training[]' value='Sports Technique' checked>";
							}
							else
							{
								echo "<input type='checkbox' name='Training[]' value='Sports Technique'>";
							}
						?>		
					</td>
					<td>
						<label>Sports Technique</label>			
					</td>
					<td>
						<?php
							if(in_array("Match Play" ,$dataa ))
							{
								echo "<input type='checkbox' name='Training[]' value='Match Play' checked>";
							}
							else
							{
								echo "<input type='checkbox' name='Training[]' value='Match Play'>";
							}
						?>				
					</td>
					<td>
						<label>Match Play</label>			
					</td>					
					<td>
						<?php
							if(in_array("Strength and Conditioning" ,$dataa ))
							{
								echo "<input type='checkbox' name='Training[]' value='Strength and Conditioning' checked>";
							}
							else
							{
								echo "<input type='checkbox' name='Training[]' value='Strength and Conditioning'>";
							}
						?>		
					</td>
					<td colspan="2">
						<label>Strength and Conditioning</label>			
					</td>					
					<td colspan="2"></td>
				</tr>			
				<tr>
					<td colspan="10"><br/></td>
				</tr>
				<tr>
					<td colspan="10">
						<p>Usual Training Places</p>				
					</td>
				</tr>				
				<tr>
					<td colspan="5">
						<p>Province</p>
						<select id="province" name="Province" required>
						   <?php
						   if($province == "")
						   {
							   echo"<option value='' disabled selected>Province</option>";
						   }
						   else
						   {
							   echo"<option value='".$province."' selected>".$province."</option>";
						   }
						   ?>					
						   <option value="Western">Western</option>
						   <option value="Southern">Southern</option>
						   <option value="Central">Central</option>
						   <option value="Uva">Uva</option>
						   <option value="Sabaragamuwa">Sabaragamuwa</option>
						   <option value="North Western">North Western</option>
						   <option value="North Central">North Central</option>
						   <option value="Nothern">Nothern</option>
						   <option value="Eastern">Eastern</option>						   
						</select>				
					</td>
					<td colspan="5">
						<p>District</p>
						<select id="district" name="District" required>
						   <?php
						   if($district == "")
						   {
							   echo"<option value='' disabled selected>District</option>";
						   }
						   else
						   {
							   echo"<option value='".$district."' selected>".$district."</option>";
						   }
						   ?>					   
						</select>				
					</td>					
				</tr>						   
				<tr>
					<td colspan="10">
						<p>Place</p>
						<input type="text" placeholder="Place" value="<?php echo $place ?>" name="Place" required>									
					</td>
				</tr>
				<tr>
					<td colspan="10">
						<p>Notes</p>
						<textarea type="text" rows="4" name="Notes" required><?php echo $notes ?></textarea>									
					</td>
				</tr>								
				<tr>
					<td colspan="10"><br/></td>
				</tr>
				<tr align="center">
					<td colspan="5">
						<button type="submit" id="usersbt" value="Submit">Update</button>				
					</td>
					<td colspan="5">
						<button type="reset" value="Reset" style="background-color:#a32626;">Reset</button>			
					</td>				
				</tr>			
				</table>
				</form>		
		</div>
	</div>
	<!-----------CONTENTS END-------------->
</div>
<script src="../js/active.js"></script>
<script src='../js/jquery.js'></script>
<script src="../js/script.js"></script>
<!-----------BODY END-------------->
<!-----------FOOTER START-------------->
<?php include '../php/userfooter.php';?>
<!-----------FOOTER END-------------->
</body>
</html>