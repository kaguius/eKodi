<?php
	$userid = "";
	$adminstatus = 3;
	$property_manager_id = "";
	session_start();
	if (!empty($_SESSION)){
		$userid = $_SESSION["userid"] ;
		$adminstatus = $_SESSION["adminstatus"] ;
		$property_manager_id = $_SESSION["property_manager_id"] ;
	}

	//if($adminstatus != 1 || $adminstatus != 2 || $adminstatus != 4){
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
		$transactiontime = date("Y-m-d G:i:s");
		$property_name = "";
		$physical_address = "";
		$location = "";
		$property_owner = "";
		$propety_contact = "";
		$bank_name = "";
		$bank_branch = "";
		$account_name = "";
		$account_number = "";
		$deposit = "";
		$commission = "";
		$penalties = "";
		$penalties_day = "";
		$email_address = "";
		$water_cost = "";
		$lr_Number = "";
		include_once('includes/header.php');
		if (!empty($_GET)){	
			$page_title = "Edit Property Details";
			$action = $_GET['action'];
			$ID = $_GET['id'];
			if ($action=='edit'){
				$result = mysql_query("select id, property_name, physical_address, location, property_owner, propety_contact, bank_name, bank_branch, account_name, account_number, deposit, commission, penalties_day, penalties, penalties_day_2, penalties_2, penalties_day_3, penalties_3, penalties_day_4, penalties_4, email_address, water_cost, taxes, lr_number, construction_year, property_type, manager_id from property_details WHERE ID  = '$ID'");
				while ($row = mysql_fetch_array($result))
				{
					$ID=$row['id'];
					$property_name =$row['property_name'];
					$physical_address =$row['physical_address'];
					$location =$row['location'];
					$property_owner =$row['property_owner'];
					$propety_contact =$row['propety_contact'];
					$bank_name =$row['bank_name'];
					$bank_branch =$row['bank_branch'];
					$account_name =$row['account_name'];
					$account_number =$row['account_number'];
					$deposit =$row['deposit'];
					$commission =$row['commission'];
					$water_cost =$row['water_cost'];
					$penalties_day =$row['penalties_day'];
					$penalties =$row['penalties'];
					$penalties_day_2 =$row['penalties_day_2'];
					$penalties_2 =$row['penalties_2'];
					$penalties_day_3 =$row['penalties_day_3'];
					$penalties_3 =$row['penalties_3'];
					$penalties_day_4 =$row['penalties_day_4'];
					$penalties_4 =$row['penalties_4'];
					$email_address =$row['email_address'];
					$pay_tax =$row['taxes'];
					$lr_number =$row['lr_number'];
					$construction_year =$row['construction_year'];
					$property_type =$row['property_type'];					
					$manager_id =$row['manager_id'];
					$sql2 = mysql_query("select id, company_name from property_managers where id = '$manager_id'");
					while($row = mysql_fetch_array($sql2)) {
						$manager_id = $row['id'];
						$manager_name = $row['company_name'];
					}

					$sql3 = mysql_query("select county from county where county = '$location'");
					while($row = mysql_fetch_array($sql2)) {
						$location = $row['county'];
					}
				}
			}
		}
		else{
			$page_title = "Add Property";
		}
		?>		
		<div id="page">
			<div id="content">
				<div class="post">
					<h2><?php echo $page_title ?> | e-kodi</h2>
					<?php 
						if($action == "edit"){
					?>
							<strong>You are here:</strong> &raquo; <a href="index.php">Home</a> &raquo; <a href="property_listings.php">Properties</a> &raquo; Edit Unit for <?php echo $property_name ?><br />
					<?php
						}
						else{
					?>
							<strong>You are here:</strong> &raquo; <a href="index.php">Home</a> &raquo; <a href="property_listings.php">Properties</a> &raquo; Add Property Unit<br />
					<?php
					}
					?>
					<form id="frmCreateProperty" name="frmCreateProperty" method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
						<input type="hidden" name="page_status" id="page_status" value="<?php echo $action ?>" />
						<input type="hidden" name="page_id" id="page_id" value="<?php echo $ID ?>" />
						<table border='0' width='100%' cellpadding='2' cellspacing='2'>
							<tr >
								<td colspan="2"><strong><u>Property Manager Details</u></strong></td>
							</tr>
							<tr bgcolor = #F0F0F6>
								<td valign='top'>Company Name *</td>
								<td valign='top' colspan="3">
									<select name='manager_id' id='manager_id'>
										<?php
											if($action == 'edit'){
										?>
												<option value="<?php echo $manager_id ?>"><?php echo $manager_name ?></option>	
										<?php
											}
											else{
										?>
												<option value=''> </option>
										<?php
											}
										//echo "<option value=''>" "</option>"; 
										if($property_manager_id == 0){
											$sql2 = mysql_query("select id, company_name from property_managers order by company_name asc");
										}
										else{
											$sql2 = mysql_query("select id, company_name from property_managers where id = '$property_manager_id' order by company_name asc");
										}
										while($row = mysql_fetch_array($sql2)) {
											$manager_id = $row['id'];
											$manager_name = $row['company_name'];
											echo "<option value='$manager_id'>".$manager_name."</option>"; 
										}
										?>
										</select>
									</td>
								</td>
							<tr >
								<td colspan="2"><strong><u>Property Details</u></strong></td>
							</tr>
							<tr bgcolor = #F0F0F6>
								<td valign='top'>Property Name *</td>
								<td valign='top'>
									<input title="Enter Property Name" value="<?php echo $property_name ?>" id="property_name" name="property_name" type="text" maxlength="100" class="main_input" size="35" />
								</td>
								<td valign='top'>Physical Address *</td>
								<td valign='top'>
									<textarea title="Enter Physical Address" name="physical_address" id="physical_address" cols="45" rows="5" class="textfield"><?php echo $physical_address ?></textarea>
								</td>
							</tr>
							<tr >
								<td valign='top'>Property Location *</td>
								<td valign='top'>
									<select name='location' id='location'>
										<?php
											if($action == 'edit'){
										?>
												<option value="<?php echo $location ?>"><?php echo $location ?></option>	
										<?php
											}
											else{
										?>
												<option value=''> </option>
										<?php
											}
										//echo "<option value=''>" "</option>"; 
										$sql2 = mysql_query("select county from county order by county asc");
										while($row = mysql_fetch_array($sql2)) {
											$location = $row['county'];
											echo "<option value='$location'>".$location."</option>"; 
										}
										?>
									</select>
								</td>
								<td valign='top'>Property Owner *</td>
								<td valign='top'>
									<input title="Enter Property Owner" value="<?php echo $property_owner ?>" id="property_owner" name="property_owner" type="text" maxlength="100" class="main_input" size="40" />
								</td>
							</tr>
							<tr bgcolor = #F0F0F6>
								<td valign='top'>Phone Number *</td>
								<td valign='top'>
									<input title="Enter Property Contact" value="<?php echo $propety_contact ?>" id="propety_contact" name="propety_contact" type="text" maxlength="100" class="main_input" size="40" />
								</td>
								<td valign='top'>Email*</td>
								<td valign='top'>
									<input title="Enter Property Contact (Email Address)" value="<?php echo $email_address ?>" id="email_address" name="email_address" type="text" maxlength="100" class="main_input" size="35" />
								</td>
							</tr>
							<tr >
								<td valign='top'>Deposit Months *</td>
								<td valign='top'>
									<input title="Enter Deposit Months" value="<?php echo $deposit ?>" id="deposit" name="deposit" type="text" maxlength="100" class="main_input" size="20" />
								</td>
								<td valign='top'>Commission (%)*</td>
								<td valign='top'>
									<input title="Enter Commission" value="<?php echo $commission ?>" id="commission" name="commission" type="text" maxlength="100" class="main_input" size="20" />
								</td>
							</tr>
							<tr >
								<td colspan="2"><strong><u>Penalty Interest</u></strong></td>
							</tr>
							<tr bgcolor = #F0F0F6>
								<td valign='top'>Cut-off Day (1)*</td>
								<td valign='top'>
									<input title="Enter Penalties Cut-off Day" value="<?php echo $penalties_day ?>" id="penalties_day" name="penalties_day" type="text" maxlength="100" class="main_input" size="20" /> (Day of the Month)
								</td>
								<td valign='top'>Penalty *</td>
								<td valign='top'>
									<input title="Enter Penanlties" value="<?php echo $penalties ?>" id="penalties" name="penalties" type="text" maxlength="100" class="main_input" size="20" /> (% of the Rent)
								</td>
							</tr>
							<tr>
								<td valign='top'>Cut-off Day (2)</td>
								<td valign='top'>
									<input title="Enter Penalties Cut-off Day" value="<?php echo $penalties_day_2 ?>" id="penalties_day_2" name="penalties_day_2" type="text" maxlength="100" class="main_input" size="20" /> (Day of the Month)
								</td>
								<td valign='top'>Penalty </td>
								<td valign='top'>
									<input title="Enter Penanlties" value="<?php echo $penalties_2 ?>" id="penalties_2" name="penalties_2" type="text" maxlength="100" class="main_input" size="20" /> (% of the Rent)

								</td>
							</tr>
							<tr bgcolor = #F0F0F6>
								<td valign='top'>Cut-off Day (3)</td>
								<td valign='top'>
									<input title="Enter Penalties Cut-off Day" value="<?php echo $penalties_day_3 ?>" id="penalties_day_3" name="penalties_day_3" type="text" maxlength="100" class="main_input" size="20" /> (Day of the Month)
								<td valign='top'>Penalty</td>
								<td valign='top'>
									<input title="Enter Penanlties" value="<?php echo $penalties_3 ?>" id="penalties_3" name="penalties_3" type="text" maxlength="100" class="main_input" size="20" /> (% of the Rent)

								</td>
							</tr>
							<tr>
								<td valign='top'>Cut-off Day (4)</td>
								<td valign='top'>
									<input title="Enter Penalties Cut-off Day" value="<?php echo $penalties_day_4 ?>" id="penalties_day_4" name="penalties_day_4" type="text" maxlength="100" class="main_input" size="20" /> (Day of the Month)
								</td>
								<td valign='top'>Penalty</td>
								<td valign='top'>
									<input title="Enter Penanlties" value="<?php echo $penalties_4 ?>" id="penalties_4" name="penalties_4" type="text" maxlength="100" class="main_input" size="20" /> (% of the Rent)
								</td>
							</tr>
							<tr >
								<td colspan="2"><strong><u>Other details</u></strong></td>
							</tr>
							<tr>
								<td valign='top'>Water cost (Cubic Meter)*</td>
								<td valign='top' colspan="3">
									<input title="Enter Water Cost per Cubic Meter" value="<?php echo $water_cost ?>" id="water_cost" name="water_cost" type="text" maxlength="100" class="main_input" size="20" />

								</td>
							</tr>
							<tr >
								<td colspan="2"><strong><u>Property Records</u></strong></td>
							</tr>
							<tr bgcolor = #F0F0F6>
								<td valign='top'>Land Reference Num</td>
								<td valign='top'>
									<input title="Enter Land Reference Number" value="<?php echo $lr_number ?>" id="lr_number" name="lr_number" type="text" maxlength="100" class="main_input" size="20" />

								</td>
								<td valign='top'>Year of Construction</td>
								<td valign='top'>
									<input title="Enter Year of Construction" value="<?php echo $construction_year ?>" id="construction_year" name="construction_year" type="text" maxlength="100" class="main_input" size="20" />

								</td>
							</tr>
							<tr>
								<td valign='top'>Property Type*</td>
								<td valign='top'>
									<select name="property_type" id="property_type">
										<?php
										  if($action == 'edit'){
										?>
										  <option value="<?php echo $property_type ?>"><?php echo $property_type ?></option>
										<?php
										  }
										?>
										  <option value="Residential">Residential</option>
										  <option value="Commercial">Commercial</option>
									</select> 

								</td>
								<td valign='top'>Pay Tax*</td>
								<td valign='top'>
									<select name="pay_tax" id="pay_tax">
										<?php
										  if($action == 'edit'){
										?>
										  <option value="<?php echo $pay_tax ?>"><?php echo $pay_tax ?></option>
										<?php
										  }
										?>
										  <option value="Yes">Yes</option>
										  <option value="No">No</option>
									</select> 

								</td>
							</tr>
							<tr >
								<td colspan="2"><strong><u>Banking Details</u></strong></td>
							</tr>
							<tr bgcolor = #F0F0F6>
								<td valign='top'>Bank Name </td>
								<td valign='top'>
									<input title="Enter Bank Name" value="<?php echo $bank_name ?>" id="bank_name" name="bank_name" type="text" maxlength="100" class="main_input" size="35" />
								</td>
								<td valign='top'>Bank Branch </td>
								<td valign='top'>
									<input title="Enter Bank Branch" value="<?php echo $bank_branch ?>" id="bank_branch" name="bank_branch" type="text" maxlength="100" class="main_input" size="35" />
								</td>
							</tr>
							<tr>
								<td valign='top'>Account Name </td>
								<td valign='top'>
									<input title="Enter Account Name" value="<?php echo $account_name ?>" id="account_name" name="account_name" type="text" maxlength="100" class="main_input" size="35" />
								</td>
								<td valign='top'>Account Number </td>
								<td valign='top'>
									<input title="Enter Account Number" value="<?php echo $account_number ?>" id="account_number" name="account_number" type="text" maxlength="100" class="main_input" size="35" />
								</td>
							</tr>
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
							var frmvalidator = new Validator("frmCreateProperty");
							frmvalidator.addValidation("property_name","req","Please enter the Property Name");
							frmvalidator.addValidation("property_owner","req","Please enter the Property Owner's Details");
							frmvalidator.addValidation("propety_contact","req","Please enter the Owner's Contact Information");
							frmvalidator.addValidation("deposit","req","Please enter the Deposit Months");
							frmvalidator.addValidation("water_cost","req","Please enter the Water Cost per Cubic Meter");
							frmvalidator.addValidation("property_type","req","Please enter the Property Type");
							frmvalidator.addValidation("penalties","req","Please enter the Penalty");
							frmvalidator.addValidation("penalties_day","req","Please enter the First Penalty Day");
						</script>
					</form>
				</div>
			</div>
			<br class="clearfix" />
			</div>
		</div>
		<?php
			if (!empty($_POST)) {
				$property_month = date("m");
				$property_year = date("Y");
				$property_name = $_POST['property_name'];
				$physical_address = $_POST['physical_address'];
				$location = ucwords(strtolower($_POST['location']));
				$property_owner = ucwords(strtolower($_POST['property_owner']));
				$propety_contact = $_POST['propety_contact'];
				$bank_name = ucwords(strtolower($_POST['bank_name']));
				$bank_branch = ucwords(strtolower($_POST['bank_branch']));
				$account_name = $_POST['account_name'];
				$account_number = $_POST['account_number'];
				$deposit = $_POST['deposit'];
				$commission = $_POST['commission'];
				$penalties_day = $_POST['penalties_day'];
				$penalties = $_POST['penalties'];
				$penalties_day_2 = $_POST['penalties_day_2'];
				$penalties_2 = $_POST['penalties_2'];
				$penalties_day_3 = $_POST['penalties_day_3'];
				$penalties_3 = $_POST['penalties_3'];
				$penalties_day_4 = $_POST['penalties_day_4'];
				$penalties_4 = $_POST['penalties_4'];
				$water_cost = $_POST['water_cost'];
				$page_id = $_POST['page_id'];
				$page_status = $_POST['page_status'];
				$email_address = $_POST['email_address'];
				$pay_tax = $_POST['pay_tax'];
				$lr_number = $_POST['lr_number'];
				$construction_year = $_POST['construction_year'];
				$property_type = $_POST['property_type'];

				$manager_id = $_POST['manager_id'];
				
				$result_tender = mysql_query("select id from property_details order by id desc limit 1");
				while ($row = mysql_fetch_array($result_tender))
				{
					$return_id = $row['id'];
				}
				
				if ($return_id == ""){
					$return_id = 1;
					$return_id = "0001";
					$property_code = "e-Kodi-".$return_id;
				}
				else{
					$return_id++;
					$str = ($return_id);
					if($str == 1){
						$return_id = "0000".$return_id;
					}
					elseif ($str == 2){
						$return_id = "000".$return_id;
					}
					elseif ($str == 3){
						$return_id = "00".$return_id;
					}
					elseif ($str == 4){
						$return_id = "0".$return_id;
					}
					else{
						$return_id = $return_id;
					}
					
					$property_code = "e-Kodi-".$return_id;
				}
				
				if($page_status == 'edit'){
					$sql3="
						update property_details set property_name='$property_name', physical_address='$physical_address', location='$location', property_owner='$property_owner', propety_contact='$propety_contact', bank_name='$bank_name', bank_branch='$bank_branch', account_name='$account_name', account_number='$account_number', deposit='$deposit', commission='$commission', penalties_day='$penalties_day', penalties='$penalties', penalties_day_2='$penalties_day_2', penalties_2='$penalties_2', penalties_day_3='$penalties_day_3', penalties_3='$penalties_3', penalties_day_4='$penalties_day_4', penalties_4='$penalties_4', email_address='$email_address', water_cost = '$water_cost', taxes = '$pay_tax', lr_number = '$lr_number', construction_year = '$construction_year', property_type = '$property_type', manager_id = '$manager_id', UID = '$userid' WHERE ID  = '$page_id'";
				}
				else{
					$sql3="
						INSERT INTO property_details (property_name, physical_address, location, property_owner, propety_contact, bank_name, bank_branch, account_name, account_number, property_code, deposit, transactiontime, commission, property_month, property_year, penalties_day, penalties, penalties_day_2, penalties_2, penalties_day_3, penalties_3, penalties_day_4, penalties_4, email_address, water_cost, taxes, lr_number, construction_year, property_type, manager_id, UID)
						VALUES('$property_name', '$physical_address', '$location', '$property_owner', '$propety_contact', '$bank_name', '$bank_branch', '$account_name', '$account_number', '$property_code', '$deposit', '$transactiontime','$commission', '$property_month', '$property_year', '$penalties_day', '$penalties', '$penalties_day_2', '$penalties_2', '$penalties_day_3', '$penalties_3', '$penalties_day_4', '$penalties_4', '$email_address', '$water_cost', '$pay_tax', '$lr_number', '$construction_year', '$property_type', '$manager_id', '$userid')";

					
					
				}
				//echo $sql3;
				$result = mysql_query($sql3);
				?>
					<script type="text/javascript">
					<!--
						document.location = "property_listings.php";
					//-->
					</script>
				<?php
			}
	}
	?>
<?php
	include_once('includes/footer.php');
?>
