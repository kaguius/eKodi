<?php
	$userid = "";
	$adminstatus = "";
	session_start();
	if (!empty($_SESSION)){
		$userid = $_SESSION["userid"] ;
		$adminstatus = $_SESSION["adminstatus"] ;
		$sacco_id = $_SESSION["sacco_id"] ;
	}
	if($adminstatus == 3){
		include_once('includes/header.php');
		?>
		<script type="text/javascript">
			document.location = "insufficient_permission.php";
		</script>
		<?php
	}
	else{
		include_once('includes/db_conn.php');
		$first_name = "";
		$last_name = "";
		$password_main = "";
		$password_confirm = "";
		$phone_number = "";
		$email_address = "";
		$transactiontime = date("Y-m-d G:i:s");
		$sql3 = mysql_query("select company_name from property_managers where id = '$property_manager_id'");
		while($row = mysql_fetch_array($sql3)) {
			$actual_manager_name = $row['company_name'];
		}
		$page_title = "User Profiles";
		if (!empty($_GET)){	
			$page_title = "User Profile";
			$action = $_GET['action'];
			$user_id = $_GET['id'];
			if ($action=='edit'){
				$page_title = "Edit User Profiles";
				$result = mysql_query("select first_name, last_name, email_address, phone_number, admin_status, user_status, manager_id from user_profiles where id = '$user_id'");
				while ($row = mysql_fetch_array($result))
				{
					$first_name = $row['first_name'];
					$last_name = $row['last_name'];
					$email_address = $row['email_address'];
					$phone_number = $row['phone_number'];
					$user_status = $row['user_status'];
					$admin_status = $row['admin_status'];
					$manager_id = $row['manager_id'];
					$sql2 = mysql_query("select id, admin_status from admin_status where id = '$admin_status'");
					while($row = mysql_fetch_array($sql2)) {
						$admin_id = $row['id'];
						$admin_status = $row['admin_status'];
					}
					
					//echo $manager_id;
					$sql3 = mysql_query("select id, company_name from property_managers where id = '$manager_id'");
					while($row = mysql_fetch_array($sql3)) {
						$manager_id = $row['id'];
						$manager_name = $row['company_name'];
					}
					echo $company_name;
					if($user_status == '1'){
						$user_status = 'Active';
					}
					else{
						$user_status = 'Disabled';
					}
				}
			}
		}
		include_once('includes/header.php');
		?>		
		<div id="page">
			<div id="content">
				<div class="post">
					<h2><?php echo $page_title ?> | e-kodi</h2>
					<strong>You are here:</strong> &raquo; <a href="index.php">Home</a> &raquo; <a href="admin.php">Admin</a> &raquo; User Profile<br />
					<form id="frmUserProfiles" name="frmUserProfiles" method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
						<input type="hidden" name="page_status" id="page_status" value="<?php echo $action ?>" />
						<input type="hidden" name="user_id" id="user_id" value="<?php echo $user_id ?>" />
						<table border="0" width="100%">
							<tr >
								<td width="30%">First Name *</td>
								<td width="70%">
									<input title="Enter First Name" value="<?php echo $first_name ?>" id="first_name" name="first_name" type="text" maxlength="100" class="main_input" size="20" />
								</td>

							</tr>
							<tr>
								<td >Last Name *</td>
								<td>
									<input title="Enter Last Name" class="main_input" value="<?php echo $last_name ?>" id="last_name" name="last_name" type="text" maxlength="100" size="20" />
								</td>

							</tr>
							<tr>
								<td>Property Manager</td>
								<td>
								<?php
									if($property_manager_id == 0){
								?>
									<select name='manager_id' id='manager_id'>
										<?php
											if($action == 'edit'){
										?>
												<!--<option value="<?php echo $manager_id ?>"><?php echo $manager_name ?></option>	-->
												<option value="<?php echo $manager_id ?>"><?php echo $manager_name ?></option>	
										<?php
											}
											else{
										?>
												<option value=''> </option>
										<?php
											}
										//echo "<option value=''>" "</option>"; 
										$sql2 = mysql_query("select id, company_name from property_managers order by company_name asc");
										while($row = mysql_fetch_array($sql2)) {
											$manager_id = $row['id'];
											$manager_name = $row['company_name'];
											echo "<option value='$manager_id'>".$manager_name."</option>"; 
										}
										?>
										</select>
									<?php
									}
									else{
	
										echo $actual_manager_name;
									}
									?>
								</td>
							</tr>
							<tr>
								<td >Email Address *</td>
								<td>
									<input title="Enter Email Address" class="main_input" value="<?php echo $email_address ?>" id="email_address" name="email_address" type="text" maxlength="100" size="25" />
								</td>

							</tr>
							<?php
								if($action == 'edit'){
							?>
							<tr>
								<td colspan="4"><strong>If you want to edit the password, please enter it here, if not please leave it blank.</strong></td>

							</tr>
							<?php
								}
							?>
							<tr>
								<td >Profile Password *</td>
								<td>
									<input title="Enter Profile Password" class="main_input" value="<?php echo $password_main ?>" id="password_main" name="password_main" type="password" maxlength="100" size="15" />
								</td>

							</tr>
							<tr>
								<td >Retype Profile Password *</td>
								<td>
									<input title="Retype Profile Password" class="main_input" value="<?php echo $password_confirm ?>" id="password_confirm" name="password_confirm" type="password" maxlength="100" size="15" />
								</td>

							</tr>
							<tr>
								<td >Phone Number *</td>
								<td>
									<input title="Enter Phone Number" class="main_input" value="<?php echo $phone_number ?>" id="phone_number" name="phone_number" type="text" maxlength="100" size="25" />
								</td>
							</tr>
							<tr>
									<td width="20%">Admin Status *</td>
									<td width="55%">
									<?php
										if($property_manager_id == 0){
									?>
										<select name='admin_status' id='admin_status'>
											<?php
												if($action == 'edit'){
											?>
													<option value="<?php echo $admin_id ?>"><?php echo $admin_status ?></option>	
											<?php
												}
												else{
											?>
													<option value=''> </option>
											<?php
												}
											//echo "<option value=''>" "</option>"; 
											$sql2 = mysql_query("select id, admin_status from admin_status order by admin_status asc");
											while($row = mysql_fetch_array($sql2)) {
												$admin_id = $row['id'];
												$admin_status = $row['admin_status'];
												echo "<option value='$admin_id'>".$admin_status."</option>"; 
											}
											?>
										</select>
									<?php
									}
									else{
									?>
										<select name='admin_status' id='admin_status'>
											<?php
												if($action == 'edit'){
											?>
													<option value="<?php echo $admin_id ?>"><?php echo $admin_status ?></option>	
											<?php
												}
												else{
											?>
													<option value=''> </option>
											<?php
												}
											//echo "<option value=''>" "</option>"; 
											$sql2 = mysql_query("select id, admin_status from admin_status where admin_status = 'Management' order by admin_status asc");
											while($row = mysql_fetch_array($sql2)) {
												$admin_id = $row['id'];
												$admin_status = $row['admin_status'];
												echo "<option value='$admin_id'>".$admin_status."</option>"; 
											}
											?>
										</select>
									<?php
										}
									?>
									</td>
								</tr>
							<?php
								if($action == 'edit'){
							?>
							<tr>
								<td>User System Status:</td>
								<td>
									<strong><?php echo $user_status ?></strong>			
								</td>
							</tr>
							<?php
								}
							?>
						</table>
			
						<table border="0" width="100%">
							<tr>
								<td valign="top">
									<button name="btnNewCard" id="button">Save</button>
								</td>
								<td align="right">
									<button name="reset" id="button2" type="reset">Reset</button>
								</td>		
							</tr>
						</table>
						<script  type="text/javascript">
							var frmvalidator = new Validator("frmUserProfiles");
							frmvalidator.addValidation("first_name","req","Please enter the User's First Name");
							frmvalidator.addValidation("last_name","req","Please enter the User's Last Name");
							frmvalidator.addValidation("email_address","req","Please enter User's Email Address");
							frmvalidator.addValidation("phone_number","req","Please enter the user's Phone Number");
							frmvalidator.addValidation("admin_status","req","Please enter the user's System status");
						</script>
					</form>
				</div>
			</div>
			<br class="clearfix" />
			</div>
		</div>
		<?php
			if (!empty($_POST)) {
				$first_name=$_POST['first_name'];
				$last_name=$_POST['last_name'];
				$email_address=$_POST['email_address'];
				$password_main=$_POST["password_main"];				
				$password_confirm=$_POST["password_confirm"];
				$phone_number=$_POST['phone_number'];
				$admin_status =$_POST['admin_status'];
				$manager_id =$_POST['manager_id'];
				
				$page_status = $_POST['page_status'];
				$user_id = $_POST['user_id'];
				
				if($password_confirm!=$password_main){
					?>
					<script type="text/javascript">
						alert("The passwords entered do not match. Please reconfirm the passwords.");
					</script>
					<?php
				}				
				else {
					if($page_status == 'edit'){
						if($password_main != ""){
							$password_confirm=MD5($password_confirm);
							$password_main=MD5($password_main);
							$sql3="
							update user_profiles set first_name='$first_name', last_name='$last_name', email_address='$email_address', phone_number='$phone_number', admin_status ='$admin_status', manager_id ='$manager_id', UID = '$userid', password_main = '$password_main', password_confirm='$password_confirm' WHERE ID  = '$user_id'";
							$result = mysql_query($sql3);
							//echo $sql3;
						}
						else{
							$sql3="
							update user_profiles set first_name='$first_name', last_name='$last_name', email_address='$email_address', phone_number='$phone_number', admin_status ='$admin_status', manager_id ='$manager_id', UID = '$userid' WHERE ID  = '$user_id'";
							$result = mysql_query($sql3);
							//echo $sql3;
						}
					}
					else{
						$password_confirm=MD5($password_confirm);
						$password_main=MD5($password_main);
						$sql="
						INSERT INTO user_profiles (first_name, last_name, email_address, password_main, password_confirm, phone_number, transactiontime, admin_status, manager_id, user_status, UID)
						VALUES('$first_name','$last_name', '$email_address', '$password_main', '$password_confirm', '$phone_number', '$transactiontime', '$admin_status', '$manager_id', '1', '$userid')";

						//echo $sql;
						$result = mysql_query($sql);
					}

					?>
					<script type="text/javascript">
					<!--
						document.location = "user_details.php";
					//-->
					</script>
					<?php
				}				
			}
	}
?>
<?php
	include_once('includes/footer.php');
?>
