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
		$page_title = "Tenant Payment Edit";
			
		include_once('includes/db_conn.php');
		$transactiontime = date("Y-m-d G:i:s");
		$repair_period = date("F, Y");
		$repair_month = date("m");
		$repair_year = date("Y");
		$previous_reading = "";
		$current_reading = "";
		//$expense_paid = array();
		if (!empty($_GET)){	
			$property_id = $_GET['property_id'];
			$tenant_id = $_GET['tenant_id'];
			$unit_id = $_GET['unit_id'];
			$payment_id = $_GET['payment_id'];
			$action = $_GET['action'];
			if ($action=='edit'){
				$result = mysql_query("select id, unit_id, tenant_id, expected, received, payment, service_charge, actual_penalties, water_pay, parking_fee, garbage_fee, water_deposit, elec_deposit, balance, display_balance, rent_month, rent_year, ref_id, ref_id_date, category, payment_type from payments where unit_id = '$unit_id' and tenant_id = '$tenant_id' and id = '$payment_id'");
				while ($row = mysql_fetch_array($result))
				{
					$expected = $row['expected'];
					$received = $row['received'];
					$payment = $row['payment'];
					$service_charge = $row['service_charge'];
					$actual_penalties = $row['actual_penalties'];
					$water_pay = $row['water_pay'];
					$parking_fee = $row['parking_fee'];
					$garbage_fee = $row['garbage_fee'];
					$water_deposit = $row['water_deposit'];
					$elec_deposit = $row['elec_deposit'];
					$balance = $row['balance'];
					$display_balance = $row['display_balance'];
					$ref_id = $row['ref_id,'];
					$ref_id_date = $row['ref_id_date'];
					$category = $row['category'];
					$payment_type = $row['payment_type'];
				}
			}
		}
		include ("includes/core_functions.php");
		include_once('includes/header.php');
		?>		
		<div id="page">
			<div id="content">
				<div class="post">
					<h2><?php echo $page_title ?> | e-kodi</h2>
					<strong>You are here:</strong> &raquo; <a href="index.php">Home</a> &raquo; <a href="admin.php">Admin</a> &raquo; <a href="water_property.php">Water Meter Reading</a> &raquo; Meter Reading<br />
					<p>Month: <?php echo $repair_period ?></p>
					<form id="frmCreateProperty" name="frmCreateProperty" method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
						<input type="hidden" name="property_id" id="property_id" value="<?php echo $property_id ?>" />
						<input type="hidden" name="tenant_id" id="tenant_id" value="<?php echo $tenant_id ?>" />
						<input type="hidden" name="payment_id" id="payment_id" value="<?php echo $payment_id ?>" />
						<input type="hidden" name="unit_id" id="unit_id" value="<?php echo $unit_id ?>" />
						<table border="0" width="100%">
							<input type='hidden' name='userid' value='<?php echo $userid ?>'>
							<tr >
								<td width="30%">Rent *</td>
								<td width="70%">
									<input title="" value="<?php echo $payment ?>" id="payment" name="payment" type="text" maxlength="100" class="main_input" size="25" />
								</td>
							</tr>
							<tr >
								<td width="30%">Garbage *</td>
								<td width="70%">
									<input title="" value="<?php echo $garbage_fee ?>" id="garbage_fee" name="garbage_fee" type="text" maxlength="100" class="main_input" size="25" />
								</td>
							</tr>
							<tr >
								<td width="30%">Parking *</td>
								<td width="70%">
									<input title="" value="<?php echo $parking_fee ?>" id="parking_fee" name="parking_fee" type="text" maxlength="100" class="main_input" size="25" />
								</td>
							</tr>
							<tr >
								<td width="30%">Water *</td>
								<td width="70%">
									<input title="" value="<?php echo $water_pay ?>" id="water_pay" name="water_pay" type="text" maxlength="100" class="main_input" size="25" />
								</td>
							</tr>
							<tr >
								<td width="30%">Previous Balance *</td>
								<td width="70%">
									<input title="" value="<?php echo $balance ?>" id="balance" name="balance" type="text" maxlength="100" class="main_input" size="25" />
								</td>
							</tr>
							<tr >
								<td width="30%">Penalties *</td>
								<td width="70%">
									<input title="" value="<?php echo $actual_penalties ?>" id="actual_penalties" name="actual_penalties" type="text" maxlength="100" class="main_input" size="25" />
								</td>
							</tr>
							<tr >
								<td width="30%">Total Expected *</td>
								<td width="70%">
									<input title="" value="<?php echo $expected ?>" id="expected" name="expected" type="text" maxlength="100" class="main_input" size="25" />
								</td>
							</tr>
							<tr >
								<td width="30%">Total Receieved *</td>
								<td width="70%">
									<input title="" value="<?php echo $received ?>" id="received" name="received" type="text" maxlength="100" class="main_input" size="25" />
								</td>
							</tr>
							<tr >
								<td width="30%">Balance *</td>
								<td width="70%">
									<input title="" value="<?php echo $display_balance ?>" id="display_balance" name="display_balance" type="text" maxlength="100" class="main_input" size="25" />
								</td>
							</tr>
							<tr>
								<td width="30%">Payment Date *</td>
								<td valign='top'><input title="Enter the Transactiondate" value="<?php echo $ref_id_date ?>" id="trans_date" name="trans_date" type="text" maxlength="100" class="main_input" size="25" /></td>
								
						</table>
						<table border="0" width="100%">
							<tr>
								<td valign="top">
									<button name="btnNewCard" id="button">Edit Payment</button>
								</td>
								<td align="right">
									<button name="reset" id="button2" type="reset">Reset</button>
								</td>		
							</tr>
						</table>
						<script  type="text/javascript">
							var frmvalidator = new Validator("frmCreateProperty");
							frmvalidator.addValidation("current_reading","req","Please enter the Meter Reading");
						</script>
					</form>
				</div>
			</div>
			<br class="clearfix" />
			</div>
		</div>
		<?php
			if (!empty($_POST)) {
				$reading_month = date("m");
				$reading_year = date("Y");
				
				$property_id = $_POST['property_id'];
				$tenant_id = $_POST['tenant_id'];
				$unit_id = $_POST['unit_id'];
				$payment_id = $_POST['payment_id'];

				$payment = $_POST['payment'];
				$garbage_fee = $_POST['garbage_fee'];
				$parking_fee = $_POST['parking_fee'];
				$water_pay = $_POST['water_pay'];
				$balance = $_POST['balance'];
				$actual_penalties = $_POST['actual_penalties'];
				$expected = $_POST['expected'];
				$received = $_POST['received'];
				$display_balance = $_POST['display_balance'];
				$ref_id_date = $_POST['trans_date'];
	
				$ref_id_date = date('Y-m-d', strtotime(str_replace('-', '/', $ref_id_date)));
				$rent_month = date('m',strtotime($ref_id_date));
				$rent_year = date('Y',strtotime($ref_id_date));

				$sql3="
					update payments set payment='$payment', garbage_fee='$garbage_fee', parking_fee= '$parking_fee', water_pay='$water_pay', balance='$balance', actual_penalties='$actual_penalties', rent_month='$rent_month', rent_year='$rent_year', expected='$expected', received='$received', display_balance='$display_balance', ref_id_date='$ref_id_date' WHERE ID  = '$payment_id'";				

				//echo $sql3;
				//$result = mysql_query($sql);

				$sql5="INSERT INTO property_owner_remittances (unit_id, tenant_id, amount, remmitance_month, remmitance_year, payment_type, manager_id, property_id, UID, trans_id_date, transactiontime) VALUES ('$unit_id', '$tenant_id', '$received', '$rent_month', '$rent_year', '9', '$property_manager_id', '$property_id', '$userid', '$ref_id_date', '$transactiontime')";
				//echo $sql5;
				$result5 = mysql_query($sql5);

				?>
					<script type="text/javascript">
						document.location = "property_listings.php";
					</script>
				<?php
			}
	}
?>
<?php
	include_once('includes/footer.php');
?>
