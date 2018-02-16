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
		$page_title = "Add Tenant";
		include_once('includes/db_conn.php');
		$sql = "select id, tenant_status from tenant_status where tenant_status = 'In-House' order by id asc";
		$sql2 = "select id, admin_status from admin_status where admin_status = 'User' order by admin_status asc";
		include ("includes/core_functions.php");	
		
		$transactiontime = date("Y-m-d G:i:s");
		$tenant_name = "";
		$mailing_address = "";
		$phone_number = "";
		$email_address = "";
		$next_kin = "";
		$next_kin_contact = "";
		$deposit_amt_paid = "";
		$rent_expt = "";
		$commission = "";
		if (!empty($_GET)){	
			$page_title = "Edit Tenant Details";
			$action = $_GET['action'];
			$ID = $_GET['id'];
			$property_id = $_GET['property_id'];
			if ($action=='edit'){
				$result = mysql_query("select id, property_listing, property_block, tenant_name, mailing_address, phone_number, email_address, tenant_status, next_kin, next_kin_contact, transactiontime, UID, employment_place, designation, work_id, work_address, street, building, floor, id_number, lease_start_date, lease_end_date from tenants WHERE ID  = '$ID'");
				while ($row = mysql_fetch_array($result))
				{
					$ID=$row['id'];
					$tenant_name =$row['tenant_name'];
					$mailing_address =$row['mailing_address'];
					$phone_number =$row['phone_number'];
					$next_kin =$row['next_kin'];
					$next_kin_contact =$row['next_kin_contact'];
					$bank_name =$row['bank_name'];
					$bank_branch =$row['bank_branch'];
					$account_name =$row['account_name'];
					$account_number =$row['account_number'];
					$id_number =$row['id_number'];
					$employment_place =$row['employment_place'];
					$designation =$row['designation'];
					$water_cost =$row['water_cost'];
					$work_id =$row['work_id'];
					$email_address =$row['email_address'];
					$work_address =$row['work_address'];
					$street =$row['street'];
					$building =$row['building'];
					$floor =$row['floor'];
					$lease_start_date =$row['lease_start_date'];
					$lease_end_date =$row['lease_end_date'];
					$lease_start_date = date('m/d/Y', strtotime(str_replace('-', '/', $lease_start_date)));
					$lease_end_date = date('m/d/Y', strtotime(str_replace('-', '/', $lease_end_date)));
					$tenant_status =$row['tenant_status'];	
					$sql2 = mysql_query("select id, tenant_status from tenant_status where id = '$tenant_status'");
					while($row = mysql_fetch_array($sql2)) {
						$tenant_status_name = $row['tenant_status'];
					}
					$tenant_status =$row['tenant_status'];	
					$sql2 = mysql_query("select id, tenant_status from tenant_status where id = '$tenant_status'");
					while($row = mysql_fetch_array($sql2)) {
						$tenant_status_name = $row['tenant_status'];
					}						
				}
			}
		}
		else{
			$page_title = "Add Property";
		}
		$result_suppliers = mysql_query("select property_item.id, property_details.commission, property_item.property_listing, rent, service_charge, property_details.deposit, property_details.manager_id from property_item inner join property_details on property_details.id = property_item.property_listing where property_item.id = '$ID'");
		$intcount = 0;
		while ($row = mysql_fetch_array($result_suppliers))
		{
			$intcount++;
			$property_listing = $row['property_listing'];
			$property_block = $row['id'];
			$rent = $row['rent'];
			$service_charge = $row['service_charge'];
			$deposit = $row['deposit'];
			$deposit_amt = ($rent * $deposit);
			$rent_expected = $rent + $service_charge;
			$commission = $row['commission'];
			$manager_id = $row['manager_id'];
		}
		include_once('includes/header.php');
		?>		
		<div id="page">
			<div id="content">
				<div class="post">
					<h2><?php echo $page_title ?> | e-kodi</h2>
					<form id="frmCreateTenant" name="frmCreateTenant" method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
						<input type="hidden" name="property_listing" value="<?php echo $property_listing ?>">
						<input type="hidden" name="property_block" value="<?php echo $property_block ?>">
						<input type="hidden" name="rent" value="<?php echo $rent ?>">
						<input type="hidden" name="service_charge" value="<?php echo $service_charge ?>">
						<input type="hidden" name="commission" value="<?php echo $commission ?>">
						<input type="hidden" name="manager_id" value="<?php echo $manager_id ?>">
						<input type="hidden" name="tenant_id" value="<?php echo $ID ?>">
						<input type="hidden" name="property_id" value="<?php echo $property_id ?>">
						<input type="hidden" name="page_status" id="page_status" value="<?php echo $action ?>" />
						<table border="0" width="100%" cellspacing="2" cellpadding="2">					
							<tr bgcolor = #F0F0F6>
								<td valign='top'>Tenant Name *</td>
								<td valign='top'>
									<input title="Enter First Name" value="<?php echo $tenant_name ?>" id="tenant_name" name="tenant_name" type="text" maxlength="100" class="main_input" size="25" />
								</td>
								<td valign="top">Mailing Address *</td>
								<td valign="top">
									<textarea title="Enter Mailing Address" name="mailing_address" id="mailing_address" cols="45" rows="5" class="textfield"><?php echo $mailing_address ?></textarea>
								</td>
							</tr>
							<tr >
								<td valign="top">Phone Number *</td>
								<td valign="top">
									<input title="Enter Phone Number" value="<?php echo $phone_number ?>" id="phone_number" name="phone_number" type="text" maxlength="100" class="main_input" size="25" />
								</td>
								<td valign="top">Email Address</td>
								<td valign="top">
									<input title="Enter Email Address" value="<?php echo $email_address ?>" id="email_address" name="email_address" type="text" maxlength="100" class="main_input" size="25" />
								</td>
							</tr>
							<tr bgcolor = #F0F0F6>
								<td valign="top">Tenant Status *</td>
								<td valign='top'>
									<select name='tenant_status' id='tenant_status'>
										<?php
											if($action == 'edit'){
										?>
												<option value="<?php echo $tenant_status ?>"><?php echo $tenant_status_name ?></option>	
										<?php
											}
											else{
										?>
												<option value=''> </option>
										<?php
											}
										//echo "<option value=''>" "</option>"; 
										if($property_manager_id == 0){
											$sql2 = mysql_query("select id, tenant_status from tenant_status order by tenant_status asc");
										}
										else{
											$sql2 = mysql_query("select id, tenant_status from tenant_status order by tenant_status asc");
										}
										while($row = mysql_fetch_array($sql2)) {
											$tenant_status_id = $row['id'];
											$tenant_status_name = $row['tenant_status'];
											echo "<option value='$tenant_status_id'>".$tenant_status_name."</option>"; 
										}
										?>
										</select>
									</td>
								</td>
								<td valign="top">Next of Kin Name*</td>
								<td valign="top">
									<input title="Enter Next of Kin" value="<?php echo $next_kin ?>" id="next_kin" name="next_kin" type="text" maxlength="100" class="main_input" size="25" />
								</td>
							</tr>
							<tr >
								<td valign="top">Next of Kin Contact *</td>
								<td valign="top">
									<input title="Enter Next of Kin Contact" value="<?php echo $next_kin_contact ?>" id="next_kin_contact" name="next_kin_contact" type="text" maxlength="100" class="main_input" size="25" />
								</td>
								<td valign="top">Identification Number *</td>
								<td valign="top">
									<input title="Enter Identification Number" value="<?php echo $id_number?>" id="id_number" name="id_number" type="text" maxlength="100" class="main_input" size="25" />
								</td>
							</tr>
							<tr >
								<td colspan="2"><strong><u>Employment Details</u></strong></td>
							</tr>
							<tr bgcolor = #F0F0F6>
								<td valign="top">Place of Work *</td>
								<td valign="top">
									<input title="Enter Place of Work" value="<?php echo $employment_place ?>" id="employment_place" name="employment_place" type="text" maxlength="100" class="main_input" size="25" />
								</td>
								<td valign="top">Designation</td>
								<td valign="top">
									<input title="Enter Designation" value="<?php echo $designation ?>" id="designation" name="designation" type="text" maxlength="100" class="main_input" size="25" />
								</td>
							</tr>
							<tr >
								<td valign="top">Work ID</td>
								<td valign="top">
									<input title="Enter Work ID" value="<?php echo $work_id ?>" id="work_id" name="work_id" type="text" maxlength="100" class="main_input" size="25" />
								</td>
								<td valign="top">Postal Address</td>
								<td valign="top">
									<textarea title="Enter Work Postal Address" name="work_address" id="work_address" cols="45" rows="5" class="textfield"><?php echo $work_address ?></textarea>
								</td>
							</tr>
							<tr bgcolor = #F0F0F6>
								<td valign="top" colspan="2">Physical Address</td>
								<td valign="top">Street</td>
								<td valign="top">
									<input title="Enter Street Address" value="<?php echo $street ?>" id="street" name="street" type="text" maxlength="100" class="main_input" size="25" />
								</td>
								</td>
							</tr>
							<tr>
								<td valign="top" colspan="2">&nbsp;</td>
								<td valign="top">Building</td>
								<td valign="top">
									<input title="Enter Building" value="<?php echo $building ?>" id="building" name="building" type="text" maxlength="100" class="main_input" size="25" />
								</td>
								</td>
							</tr>
							<tr bgcolor = #F0F0F6>
								<td valign="top" colspan="2">&nbsp;</td>
								<td valign="top">Floor/ Room</td>
								<td valign="top">
									<input title="Enter floor" value="<?php echo $floor ?>" id="floor" name="floor" type="text" maxlength="100" class="main_input" size="25" />
								</td>
								</td>
							</tr>
							<tr >
								<td colspan="2"><strong><u>Lease Duration</u></strong></td>
							</tr>
				
							<tr bgcolor = #F0F0F6>
								<td valign="top">Lease Start Date *</td>
								<td valign="top">
									<input title="Enter the Lease Start Date" value="<?php echo $lease_start_date ?>" id="lease_start_date" name="lease_start_date" type="text" maxlength="100" class="main_input" size="25" />
								</td>
								<td valign="top">Lease End Date *</td>
								<td valign="top">
									<input title="Enter the Lease End Date" value="<?php echo $lease_end_date ?>" id="lease_end_date" name="lease_end_date" type="text" maxlength="100" class="main_input" size="25" />
								</td>
							</tr>
							<tr >
								<td colspan="2"><strong><u>User Credentials</u></strong></td>
							</tr>
				
							<tr bgcolor = #F0F0F6>
								<td valign="top">Username *</td>
								<td valign="top" colspan="3">
									<input title="Enter the client's Username" value="<?php echo $username ?>" id="username" name="username" type="text" maxlength="100" class="main_input" size="25" />
								</td>
							</tr>
							<tr >
								<td colspan="2"><strong><u>Initial Payment Details</u></strong></td>
							</tr>
							<tr bgcolor = #F0F0F6>
								<td valign="top">Deposit *</td>
								<td valign="top">
									<input title="Enter Deposit Paid" value="<?php echo $deposit_amt_paid ?>" id="deposit_amt_paid" name="deposit_amt_paid" type="text" maxlength="100" class="main_input" size="25" />
								</td>
								<td valign="top">Rent *</td>
								<td valign="top">
									<input title="Enter Rent Paid" value="<?php echo $rent_expt ?>" id="rent_expt" name="rent_expt" type="text" maxlength="100" class="main_input" size="25" />
								</td>
							</tr>
							<tr >
								<td valign="top">Water Deposit *</td>
								<td valign="top">
									<input title="Enter Water Deposit Paid" value="<?php echo $water_deposit ?>" id="water_deposit" name="water_deposit" type="text" maxlength="100" class="main_input" size="25" />
								</td>
								<td valign="top">Electricity Deposit *</td>
								<td valign="top">
									<input title="Enter Electricity Deposit Paid" value="<?php echo $elec_deposit ?>" id="elec_deposit" name="elec_deposit" type="text" maxlength="100" class="main_input" size="25" />
								</td>
							</tr>
							<tr bgcolor = #F0F0F6>
								
								<td valign="top">Payment Type</td>
								<td valign="top" colspan="3">
									<select name='payment_type' id='payment_type'>";
										<?php
										$sql2 = mysql_query("select id, payment_type from payment_type order by payment_type asc");
										while($row = mysql_fetch_array($sql2)) {
											$payment_type_id = $row['id'];
											$payment_type = $row['payment_type'];
											echo "<option value='$payment_type_id'>".$payment_type."</option>"; 
										}
										?>
									</select>
								</td>
							</tr>
							<tr >
								<td valign="top">Transaction Date *</td>
								<td valign="top">
									<input title="Enter the Transactiondate" value="<?php echo $trans_date ?>" id="trans_date" name="trans_date" type="text" maxlength="100" class="main_input" size="25" />
								</td>
								<td valign="top">Referenec ID *</td>
								<td valign="top">
									<input name="ref_id" id="ref_id" type="text" class="textfield" value="<?php echo $ref_id ?>" size="25">
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
							var frmvalidator = new Validator("frmCreateTenant");
							frmvalidator.addValidation("tenant_name","req","Please enter the Tenant Name");
							//frmvalidator.addValidation("tenant_status","req","Please enter the Tenant Status");					
						</script>
					</form>
				</div>
			</div>
			<br class="clearfix" />
			</div>
		</div>
		<?php
		$deposit_month = date("m");
		$deposit_year = date("Y");
			if (!empty($_POST)) {
				$property_listing = $_POST['property_listing'];
				$rent_expt = $_POST['rent_expt'];
				$property_block = $_POST['property_block'];
				$tenant_name = $_POST['tenant_name'];
				$mailing_address = $_POST['mailing_address'];
				$phone_number = $_POST['phone_number'];
				$email_address = $_POST['email_address'];
				$tenant_status = $_POST['tenant_status'];
				$next_kin = $_POST['next_kin'];
				$next_kin_contact = $_POST['next_kin_contact'];
				$deposit_amt_paid = $_POST['deposit_amt_paid'];
				$commission = $_POST['commission'];
				$service_charge = $_POST['service_charge'];
				$payment_type = $_POST['payment_type'];
				//$admin_status = $_POST['admin_status'];
				$username = $_POST['username'];
				$water_deposit = $_POST['water_deposit'];
				$elec_deposit = $_POST['elec_deposit'];
				$ref_id = $_POST['ref_id'];
				$ref_id_date = $_POST['trans_date'];
				$ref_id_date = date('Y-m-d', strtotime(str_replace('-', '/', $ref_id_date)));
				$deposit_month = date('m',strtotime($ref_id_date));
				$deposit_year = date('Y',strtotime($ref_id_date));
				
				$manager_id = $_POST['manager_id'];
				$tenant_id = $_POST['tenant_id'];
				$property_id = $_POST['property_id'];
				$page_status = $_POST['page_status'];

				$employment_place = $_POST['employment_place'];
				$designation = $_POST['designation'];
				$work_id = $_POST['work_id'];
				$work_address = $_POST['work_address'];
				$street = $_POST['street'];
				$building = $_POST['building'];
				$floor = $_POST['floor'];
				$id_number = $_POST['id_number'];

				$lease_end_date = $_POST["lease_end_date"];		
				$lease_end_date = date('Y-m-d', strtotime(str_replace('-', '/', $lease_end_date)));
				$lease_start_date = $_POST["lease_start_date"];		
				$lease_start_date = date('Y-m-d', strtotime(str_replace('-', '/', $lease_start_date)));
				
				$result = mysql_query("SELECT passwords FROM passwords ORDER BY RAND() limit 1");
				while ($row = mysql_fetch_array($result))
				{
					$user_password = $row['passwords'];
					$user_password_text = $user_password;
					$user_password = MD5($user_password);			
				}

				//Calculate commission on rent and deposit
				//rent
				$rent_comm = $rent_expt;
				$value_rent_comm = $rent_comm * ($commission / 100);
				$actual_rent = $rent_comm - $value_rent_comm;
				
				//deposit
				//$value_deposit_comm = $deposit_amt_paid * ($commission / 100);
				$actual_deposit = $deposit_amt_paid - $value_deposit_comm;

				if($page_status == 'edit'){
					$sql2="update tenants SET tenant_name='$tenant_name', mailing_address='$mailing_address', phone_number='$phone_number', email_address='$email_address', next_kin='$next_kin', next_kin_contact='$next_kin_contact', employment_place='$employment_place', designation='$designation', work_id='$work_id', work_address='$work_address', street='$street', building='$building', floor='$floor', id_number='$id_number', lease_start_date='$lease_start_date', lease_end_date='$lease_end_date' where id = '$tenant_id'";
					$result2 = mysql_query($sql2);
					//echo $sql2;
					$query = "property_listings.php";
				}
				else{
				
					$sql3="
						INSERT INTO tenants (property_listing, property_block, tenant_name, mailing_address, phone_number, email_address, tenant_status, next_kin, next_kin_contact, transactiontime, UID, employment_place, designation, work_id, work_address, street, building, floor, id_number, lease_start_date, lease_end_date)
						VALUES('$property_listing', '$property_block', '$tenant_name', '$mailing_address', '$phone_number', '$email_address', '$tenant_status', '$next_kin', '$next_kin_contact', '$transactiontime', '$userid', '$employment_place', '$designation', '$work_id', '$work_address', '$street', '$building', '$floor', '$id_number', '$lease_start_date', '$lease_end_date')";

					//echo $sql3."<br />";
					$result = mysql_query($sql3);
				
					$result_tender = mysql_query("select id from tenants order by id desc limit 1");
					while ($row = mysql_fetch_array($result_tender))
					{
						$tenant_id= $row['id'];			
					}
				
					$sql10="
						INSERT INTO user_profiles (first_name, email_address, password_main, phone_number, tenant_id, user_status, transactiontime, UID, manager_id)

						VALUES('$tenant_name', '$email_address', '$user_password', '$phone_number', '$tenant_id', '1', '$transactiontime', '$userid', '$manager_id')";

					//echo $sql."<br />";
					$result = mysql_query($sql10);

					if ($tenant_id == ""){
						$tenant_id = 1;
						$tenant_id = "0001";
						$tenant_code = "ClydeRMS-569-".$tenant_id;
					}
					else{
						$return_id++;
						$str = ($return_id);
						if($str == 1){
							$return_id = "000".$tenant_id;
						}
						elseif ($str == 2){
							$return_id = "00".$tenant_id;
						}
						elseif ($str == 3){
							$return_id = "0".$tenant_id;
						}
						else{
							$return_id = $tenant_id;
						}
						$tenant_code = "ClydeRMS-569-".$return_id;
					}
				
					if($deposit_amt_paid != ""){

						$expected = $deposit_amt_paid + $water_deposit + $elec_deposit;
						$received = $deposit_amt_paid + $water_deposit + $elec_deposit;
					
						$sql2="update property_item SET tenant='$tenant_id', deposit_paid = '1', UID = '$userid' where property_listing = '$property_listing' and id = '$property_block'";
						$result2 = mysql_query($sql2);
						//echo $sql2."<br />";
					
						$sql4="INSERT INTO payments (unit_id, tenant_id, expected, received, payment, water_deposit, elec_deposit, rent_month, rent_year, ref_id, ref_id_date, category, payment_type, transactiontime, UID, manager_id, pay_month, pay_year) VALUES('$property_block', '$tenant_id', '$expected', '$received', '$deposit_amt_paid', '$water_deposit', '$elec_deposit', '$deposit_month', '$deposit_year', '$ref_id', '$ref_id_date', '1', '$payment_type', '$transactiontime', '$userid', '$manager_id', '$deposit_month', '$deposit_year')";
						$result = mysql_query($sql4);
						//echo $sql4."<br />";

						$sql8="INSERT INTO property_owner_remittances (unit_id, tenant_id, amount, remmitance_month, remmitance_year, payment_type, manager_id, property_id, UID, trans_id, trans_id_date, transactiontime, pay_month, pay_year) VALUES ('$property_block', '$tenant_id', '$received', '$deposit_month', '$deposit_year', '$payment_type', '$manager_id', '$property_id', '$userid', '$ref_id', '$ref_id_date', '$transactiontime', '$deposit_month', '$deposit_year')";
						$result8 = mysql_query($sql8);
						//echo $sql8."<br />";
					}
					else{
						$sql2="update property_item SET tenant='$tenant_id', deposit_paid = '0', UID = '$userid' where property_listing = '$property_listing' and id = '$property_block'";
						$result2 = mysql_query($sql2);
						//echo $sql2."<br />";
					}
				
					$sql3="update tenants SET tenant_code='$tenant_code' where id = '$tenant_id'";
					$result3 = mysql_query($sql3);
				
					$expected = $rent_comm;
					$received = $rent_comm;

					$sql4="INSERT INTO payments (unit_id, tenant_id, expected, received, payment, service_charge, rent_month, rent_year, ref_id, ref_id_date, category, payment_type, transactiontime, UID, manager_id) VALUES('$property_block', '$tenant_id', '$expected', '$received', '$rent_comm', '$service_charge', '$deposit_month', '$deposit_year', '$ref_id', '$ref_id_date', '2', '$payment_type', '$transactiontime', '$userid', '$manager_id')";
					$result = mysql_query($sql4);
					//echo $sql4."<br />";

					$sql8="INSERT INTO property_owner_remittances (unit_id, tenant_id, amount, remmitance_month, remmitance_year, payment_type, manager_id, property_id, UID, trans_id, trans_id_date, transactiontime) VALUES ('$property_block', '$tenant_id', '$received', '$deposit_month', '$deposit_year', '$payment_type', '$manager_id', '$property_id', '$userid', '$ref_id', '$ref_id_date', '$transactiontime')";
						$result8 = mysql_query($sql8);
						//echo $sql8."<br />";
				
					if($value_deposit_comm != ""){
						$sql5="INSERT INTO comms_table (unit_id, tenant_id, comm_paid, comm_month, comm_year, status, transactiontime, UID, manager_id) VALUES ('$property_block', '$tenant_id', '$value_deposit_comm', '$deposit_month', '$deposit_year', '1', '$transactiontime', '$userid', '$manager_id'))";
						$result = mysql_query($sql5);
						//echo $sql5."<br />";
					}
				
					if($value_rent_comm != ""){
						$sql5="INSERT INTO comms_table (unit_id, tenant_id, comm_paid, comm_month, comm_year, status, transactiontime, UID, manager_id) VALUES ('$property_block', '$tenant_id', '$value_rent_comm', '$deposit_month', '$deposit_year', '2', '$transactiontime', '$userid', '$manager_id')";
						$result = mysql_query($sql5);
						//echo $sql5."<br />";
					}				
				
					$query = "tenant_reg_email.php?tenant_id=$tenant_id&creds=$user_password_text";
					//echo $query;
				}

				//$linkurl = "property_listings.php";
				//$linkurl = $query;;
				//header( "Location: $linkurl" );
				?>
					<script type="text/javascript">
						/*document.location = "tenant_reg_email.php?tenant_id="<?php.$tenant_id?>"creds="<?php.$user_password_text?>";*/
						document.location = "<?php echo $query ?>";
					</script>
				<?php
			}
	}
?>
<?php
	include_once('includes/footer.php');
?>
