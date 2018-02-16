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
		$page_title = "Meter Reading";
			
		include_once('includes/db_conn.php');
		$transactiontime = date("Y-m-d G:i:s");
		$repair_period = date("F, Y");
		$repair_month = date("m");
		$repair_year = date("Y");
		$previous_reading = "";
		$current_reading = "";
		//$expense_paid = array();
		if (!empty($_GET)){	
			$tenant_id = $_GET['tenant_id'];
			//$property_id = $_GET['property'];
			$property_id = $_GET['property_id'];
			$unit_id = $_GET['unit_id'];
			$reading_id = $_GET['reading_id'];
			$action = $_GET['action'];
			if ($action=='edit'){
				$result = mysql_query("select previous_reading, last_reading from water_meter_details where id = '$reading_id'");
				while ($row = mysql_fetch_array($result))
				{
					$previous_reading =$row['previous_reading'];
					$current_reading =$row['last_reading'];
				}
			}
		}
		$result_suppliers = mysql_query("select id, property_name, water_cost, commission, location from property_details where id = '$property_id'");
		while ($row = mysql_fetch_array($result_suppliers))
		{
			$property_name = $row['property_name'];
			$water_cost = $row['water_cost'];
		}
		$result_suppliers = mysql_query("select tenant_name, location from tenants inner join property_item on property_item.id = tenants.property_block where property_block = '$unit_id' and tenant_status = '1'");
		while ($row = mysql_fetch_array($result_suppliers))
		{
			$tenant_name = $row['tenant_name'];
			$location = $row['location'];
		}
		$result_suppliers = mysql_query("select tenant_name from tenants where unit_id = '$unit_id' and tenant_status = '1'");
		while ($row = mysql_fetch_array($result_suppliers))
		{
			$tenant_name = $row['tenant_name'];
		}
		
		$result = mysql_query("select last_reading from water_meter_details where property_unit = '$unit_id';");
		while ($row = mysql_fetch_array($result))
		{
			$previous_reading = $row['last_reading'];
		}
		if($previous_reading == ""){
			$previous_reading = 0;
		}
		include ("includes/core_functions.php");
		include_once('includes/header.php');
		?>		
		<div id="page">
			<div id="content">
				<div class="post">
					<h2><?php echo $page_title ?> for <?php echo $property_name ?> | e-kodi</h2>
					<strong>You are here:</strong> &raquo; <a href="index.php">Home</a> &raquo; <a href="admin.php">Admin</a> &raquo; <a href="water_property.php">Water Meter Reading</a> &raquo; Meter Reading for <?php echo $property_name ?><br />
					<p>Tenant Details: Name: <?php echo $tenant_name ?>, House Number: <?php echo $location ?></p>
					<form id="frmCreateProperty" name="frmCreateProperty" method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
						<input type="hidden" name="tenant_id" id="tenant_id" value="<?php echo $tenant_id ?>" />
						<input type="hidden" name="property_id" id="property_id" value="<?php echo $property_id ?>" />
						<input type="hidden" name="unit_id" id="unit_id" value="<?php echo $unit_id ?>" />
						<input type="hidden" name="water_cost" id="water_cost" value="<?php echo $water_cost ?>" />
						<table border="0" width="100%">
							<input type='hidden' name='userid' value='<?php echo $userid ?>'>
							<tr >
								<td width="30%">Previous Meter Reading *</td>
								<td width="70%">
									<input title="Enter Repair Name" value="<?php echo $previous_reading ?>" id="previous_reading" name="previous_reading" type="text" maxlength="100" class="main_input" size="25" />
								</td>
							</tr>
							<tr >
								<td width="30%">Current Meter Reading *</td>
								<td width="70%">
									<input title="Enter the current meter reading" value="<?php echo $current_reading ?>" id="current_reading" name="current_reading" type="text" maxlength="100" class="main_input" size="25" />
								</td>
							</tr>
							<tr>
								<td>Date of Consumption</td>
								<td valign="top"><input title="Enter the Date of Consumption" value="<?php echo $trans_date ?>" id="trans_date" name="trans_date" type="text" maxlength="100" class="main_input" size="25" /></td>
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
				$previous_reading = $_POST['previous_reading'];
				$current_reading = $_POST['current_reading'];
				$tenant_id = $_POST['tenant_id'];
				$property_id = $_POST['property_id'];
				$unit_id = $_POST['unit_id'];
				$water_cost = $_POST['water_cost'];
				$trans_date = $_POST['trans_date'];

				$trans_date = date('Y-m-d', strtotime(str_replace('-', '/', $trans_date)));
				$reading_month = date('m',strtotime($trans_date));
				$reading_year = date('Y',strtotime($trans_date));
				
				$reading = $current_reading - $previous_reading;
				$cost = $water_cost * $reading;
				
				$sql="
					INSERT INTO water_meter_details (property_name, property_unit, tenant, previous_reading, last_reading, cost, month, year, transactiontime, UID)
					VALUES('$property_id', '$unit_id', '$tenant_id', '$previous_reading', '$current_reading', '$cost', '$reading_month', '$reading_year', '$transactiontime', '$userid')";

				//echo $sql3;
				$result = mysql_query($sql);

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
