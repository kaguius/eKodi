<?php
	$userid = "";
	$adminstatus = "";
	$property_manager_id = "";	
	session_start();
	$page_title = "Login";
	include_once('includes/db_conn.php');
	if (!empty($_GET)){	
		$login_status = $_GET['login_status'];
	}
	$password = "";
	$first_name = "";
	$last_name = "";
	$company = "";
	$phone = "";
	$address = "";
	$nature = "";
	$email_address = "";
	$transactiontime = date("Y-m-d G:i:s");
	include_once('includes/login_header.php');
	
?>		
	<div id="page">
		<div id="content">
			<div class="post">
				<h2><?php echo $page_title ?> | e-kodi</h2>
				<p><img src="images/content-image.jpg" width="1100" height="200" alt="" /></p>
				<table class="dataTable" width="100%" border="0" cellspacing="0" cellpadding="0">
				<tr>
					<td width="128" align="right"><img src="images/unlock.png" alt="" /></td>
					<td align="left" valign="middle" width="500" style="border: 1px dotted #C5D6FC; padding-left:2px;">
					<form id="frmLogin" name="frmLogin" method="post" onSubmit='return vdator2.exec();' action="<?php echo $_SERVER['PHP_SELF'];?>">
                                                <table border="0" align="left" cellpadding="5" cellspacing="5">
                                                        <tr>
                                                                <td><b>Email Address/ Username :</b></td>
                                                                <td align="right">
                                                                        <input id="email_address" name="email_address" type="text" class="main_input" />
                                                                        <script language="JavaScript" type="text/javascript">if(document.getElementById) document.getElementById('email_address').focus();</script> 
                                                                </td>
                                                        </tr>
                                                        <tr>
                                                          	<td><b>Password :</b></td>
                                                          	<td align="right">
                                                          		<input name="password" id="password" type="password" class="main_input" />
                                                          	</td>
                                                        </tr>
                                                        <tr>
                                                          	<td colspan="2">
									<button name="submit" id="button" onclick="return CheckForm();">Log In</button>
								</td>							
                                                        </tr>
							<?php if($login_status== 'badlogin'){ ?>
							<tr>
								<td colspan="2">
									<font color="red">The username or password don't match the records in the database, <br />or your login has been disabled from the system.</font></a>	
								</td>
							</tr>
							<?php } ?>
							<tr>
								<td colspan="2">
									<a href="password_gen.php">Forgot your password</a>
								</td>
							</tr>
                                                </table>
                                        </td>
					<td width="128" align="left"><img src="images/logo2.png" alt="" /></td>
                                  </tr>
                                </table>
				
                                </form>
                        </table>
                        </form>
			
				<br />
				
					<script  type="text/javascript">
						var frmvalidator = new Validator("frmLogin");
						frmvalidator.addValidation("email_address","req","Email Address cannot be empty");
						frmvalidator.addValidation("password","req","Please enter the password");
					</script>
				</form>
			</div>
		</div>
		<br class="clearfix" />
		</div>
	</div>
<?php
		if (!empty($_POST)) {
			$email_address=$_POST['email_address'];
			$password=$_POST['password'];
			
			$result_tender = mysql_query("SELECT id, email_address, admin_status, password_main, user_status, manager_id FROM user_profiles WHERE email_address = '$email_address'");
			while ($row = mysql_fetch_array($result_tender))
			{
				$intcount++;
				$user_id = $row['id'];
				$admin_status = $row['admin_status'];
				$user_email_address_text = $row['email_address'];
				$user_email_address = mysql_real_escape_string($user_email_address_text);
				$user_password_text = $row['password_main'];
				$user_password = mysql_real_escape_string($user_password_text);
				$user_status = $row['user_status'];
				$property_manager_id = $row['manager_id'];
			}
			
			$hashedpassword = MD5($password);
			
			if(($hashedpassword == $user_password) && ($user_email_address == $email_address) && ($user_status=='1' || $user_status=='2' || $user_status=='4')) {
				$ipaddress = $_SERVER['REMOTE_ADDR'];
				$browsertype = $_SERVER['HTTP_USER_AGENT'];

				//Requesting for user location records via geoip
				$tags = get_meta_tags('http://www.geobytes.com/IpLocator.htm?GetLocation&template=php3.txt&IpAddress=$ipaddress');
				$iprecordcity = $tags['city'];  // city name
				$iprecordcountry = $tags['country'];  // Country name
				$iprecordlongitude = $tags['longitude'];  // Longitude name
				$iprecordlatitude = $tags['latitude'];  // latitude name
				
				$sql="INSERT INTO user_logs (username, user_id, log_time, log_ipaddress, log_browser, city, country, latitude, longitude) VALUES ('$user_email_address','$user_id', '$transactiontime','$ipaddress','$browsertype', '$iprecordcity', '$iprecordcountry', '$iprecordlatitude', '$iprecordlongitude')";
				//echo $sql;
				$result = mysql_query($sql);

				$_SESSION["userid"] = $user_id;
				$_SESSION["adminstatus"] = $admin_status;
				$_SESSION["property_manager_id"] = $property_manager_id;
				?>
				<script type="text/javascript">
				<!--
					document.location = "dashboard.php";
				//-->
				</script>
				<?php
			}
			else {
				$ipaddress = $_SERVER['REMOTE_ADDR'];
				$sql="INSERT INTO users_failed_logs (email_address, password, ipaddress, tranasctiontime) VALUES 		('$email_address','$password', '$ipaddress', '$transactiontime')";
				//echo $sql;
				$result = mysql_query($sql);

				$badlogin = MD5(badlogin);
				$query = "login.php?login_status=badlogin&status=$badlogin";
				?>
				<script type="text/javascript">
				<!--
					/*alert("Either the Email Address or the Password do not match the records in the database or you have been disabled from the system, please contact the system admin at www.e-kodi.com/contact.php");*/
					document.location = "<?php echo $query ?>";
				//-->
				</script>
				<?php
			}		
			
		}
?>
<?php
	include_once('includes/footer.php');
?>
