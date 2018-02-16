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
		$company_name = "";
		$physical_address = "";
		$phone_number = "";
		$email_address = "";		
		$commission = "";
		$bank_name = "";
		$bank_branch = "";
		$account_name = "";
		$account_number = "";
		include_once('includes/header.php');
		if (!empty($_GET)){	
			$page_title = "Edit Property Manager Details";
			$action = $_GET['action'];
			$ID = $_GET['id'];
			if ($action=='edit'){
				$result = mysql_query("select id, manager_code, company_name, physical_address, location, phone_number, email_address, commission, bank_name, bank_branch, account_name, account_number, pin_number, vat_number from property_managers where id  = '$ID'");
				while ($row = mysql_fetch_array($result))
				{
					$company_name = $row['company_name'];
					$physical_address = $row['physical_address'];
					$location = $row['location'];
					$bank_name = $row['bank_name'];
					$bank_branch = $row['bank_branch'];
					$account_name = $row['account_name'];
					$account_number = $row['account_number'];
					$commission = $row['commission'];			
					$email_address = $row['email_address'];
					$phone_number = $row['phone_number'];
					$pin_number = $row['pin_number'];
					$vat_number = $row['vat_number'];

					$sql3 = mysql_query("select county from county where county = '$location'");
					while($row = mysql_fetch_array($sql2)) {
						$location = $row['county'];
					}
				}
			}
		}
		else{
			$page_title = "Add Property Manager Details";
		}
		?>		
		<div id="page">
			<div id="content">
				<div class="post">
					<h2><?php echo $page_title ?> | e-kodi</h2>
					<?php 
						if($action == "edit"){
					?>
							<strong>You are here:</strong> &raquo; <a href="index.php">Home</a> &raquo; <a href="property_listings.php">Properties</a> &raquo; Edit Property Manager Details <br />
					<?php
						}
						else{
					?>
							<strong>You are here:</strong> &raquo; <a href="index.php">Home</a> &raquo; <a href="property_listings.php">Properties</a> &raquo; Add Property Manager Details<br />
					<?php
					}
					?>
					<form id="frmCreateManager" name="frmCreateManager" method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
						<input type="hidden" name="page_status" id="page_status" value="<?php echo $action ?>" />
						<input type="hidden" name="page_id" id="page_id" value="<?php echo $ID ?>" />
						<table border='0' width='100%' cellpadding='2' cellspacing='2'>
							<tr >
								<td colspan="2"><strong><u>Property Manager Details</u></strong></td>
							</tr>
							<tr bgcolor = #F0F0F6>
								<td valign='top'>Company Name/ <br /> Property Manager Name *</td>
								<td valign='top'>
									<input title="Enter Company Name" value="<?php echo $company_name ?>" id="company_name" name="company_name" type="text" maxlength="100" class="main_input" size="30" />
								</td>
								<td valign='top'>Physical Address</td>
								<td valign='top'>
									<textarea title="Enter Physical Address" name="physical_address" id="physical_address" cols="45" rows="5" class="textfield"><?php echo $physical_address ?></textarea>
								</td>
							</tr>
							<tr >
								<td valign='top'>Location *</td>
								<td valign='top' colspan="2">
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
							</tr>
							<tr bgcolor = #F0F0F6>
								<td valign='top'>Phone Number *</td>
								<td valign='top'>
									<input title="Enter Property Contact" value="<?php echo $phone_number ?>" id="phone_number" name="phone_number" type="text" maxlength="100" class="main_input" size="30" />
								</td>
								<td valign='top'>Email Address*</td>
								<td valign='top'>
									<input title="Enter Property Contact (Email Address)" value="<?php echo $email_address ?>" id="email_address" name="email_address" type="text" maxlength="100" class="main_input" size="30" />
								</td>
							</tr>
							<tr >
								<td valign='top'>System Commission (%)*</td>
								<td valign='top' colspan="2">
									<input title="Enter Commission" value="<?php echo $commission ?>" id="commission" name="commission" type="text" maxlength="100" class="main_input" size="20" />
								</td>
							</tr>
							<tr bgcolor = #F0F0F6>
								<td valign='top'>PIN *</td>
								<td valign='top'>
									<input title="Enter PIN Number" value="<?php echo $pin_number ?>" id="pin_number" name="pin_number" type="text" maxlength="100" class="main_input" size="30" />
								</td>
								<td valign='top'>VAT No*</td>
								<td valign='top'>
									<input title="Enter VAT Number" value="<?php echo $vat_number ?>" id="vat_number" name="vat_number" type="text" maxlength="100" class="main_input" size="30" />
								</td>
							</tr>
							<tr >
								<td colspan="2"><strong><u>Banking Details</u></strong></td>
							</tr>
							<tr >
								<td valign='top'>Bank Name </td>
								<td valign='top'>
									<input title="Enter Bank Name" value="<?php echo $bank_name ?>" id="bank_name" name="bank_name" type="text" maxlength="100" class="main_input" size="35" />
								</td>
								<td valign='top'>Bank Branch </td>
								<td valign='top'>
									<input title="Enter Bank Branch" value="<?php echo $bank_branch ?>" id="bank_branch" name="bank_branch" type="text" maxlength="100" class="main_input" size="20" />
								</td>
							</tr>
							<tr bgcolor = #F0F0F6>
								<td valign='top'>Account Name </td>
								<td valign='top'>
									<input title="Enter Account Name" value="<?php echo $account_name ?>" id="account_name" name="account_name" type="text" maxlength="100" class="main_input" size="35" />
								</td>
								<td valign='top'>Account Number </td>
								<td valign='top'>
									<input title="Enter Account Number" value="<?php echo $account_number ?>" id="account_number" name="account_number" type="text" maxlength="100" class="main_input" size="15" />
								</td>
							</tr>
						</table>
						<table border="0" width="100%">
							<tr>
								<td valign="top" colspan="2">
									&nbsp;
								</td>		
							</tr>
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
							var frmvalidator = new Validator("frmCreateManager");
							frmvalidator.addValidation("company_name","req","Please enter the Company Name or Property Manager Name");
							frmvalidator.addValidation("location","req","Please enter the Location Address");
							frmvalidator.addValidation("phone_number","req","Please enter the Phone Number");
							frmvalidator.addValidation("email_address","req","Please enter the email address");
							frmvalidator.addValidation("commission","req","Please enter the system Commission");
						</script>
					</form>
				</div>
			</div>
			<br class="clearfix" />
			</div>
		</div>
		<?php
			if (!empty($_POST)) {
				$manager_month = date("m");
				$manager_year = date("Y");
				$company_name = $_POST['company_name'];
				$physical_address = $_POST['physical_address'];
				$location = ucwords(strtolower($_POST['location']));
				$bank_name = ucwords(strtolower($_POST['bank_name']));
				$bank_branch = ucwords(strtolower($_POST['bank_branch']));
				$account_name = $_POST['account_name'];
				$account_number = $_POST['account_number'];
				$commission = $_POST['commission'];					
				$email_address = $_POST['email_address'];
				$phone_number = $_POST['phone_number'];
				$pin_number = $_POST['pin_number'];
				$vat_number = $_POST['vat_number'];

				$page_id = $_POST['page_id'];
				$page_status = $_POST['page_status'];				
				
				$result_tender = mysql_query("select id from property_managers order by id desc limit 1");
				while ($row = mysql_fetch_array($result_tender))
				{
					$return_id = $row['id'];
				}
				
				if ($return_id == ""){
					$return_id = 1;
					$return_id = "0001";
					$manager_code = "e-Kodi-PM-".$return_id;
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
					
					$manager_code = "e-Kodi-PM-".$return_id;
				}
				
				if($page_status == 'edit'){
					$sql3="
						update property_managers set company_name='$company_name', physical_address='$physical_address', location='$location', phone_number='$phone_number', email_address='$email_address', commission='$commission', bank_name='$bank_name', bank_branch='$bank_branch', account_name='$account_name', account_number='$account_number', UID = '$userid', pin_number = '$pin_number', vat_number = '$vat_number' WHERE ID  = '$page_id'";
				}
				else{
					$sql3="
						INSERT INTO property_managers (manager_code, company_name, physical_address, location, phone_number, email_address, commission, bank_name, bank_branch, account_name, account_number, transactiontime, manager_month, manager_year, UID, pin_number, vat_number)
						VALUES('$manager_code', '$company_name', '$physical_address', '$location', '$phone_number', '$email_address', '$commission', '$bank_name', '$bank_branch','$account_name', '$account_number', '$transactiontime', '$manager_month','$manager_year', '$userid', '$pin_number', '$vat_number')";

					
					
				}
				//echo $sql3;
				$result = mysql_query($sql3);
				?>
					<script type="text/javascript">
					<!--
						document.location = "property_manager.php";
					//-->
					</script>
				<?php
			}
	}
	?>
<?php
	include_once('includes/footer.php');
?>
