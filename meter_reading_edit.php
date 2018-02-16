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
			$property_id = $_GET['property'];
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
						<input type="hidden" name="tenant_id" id="tenant_id" value="<?php echo $tenant_id ?>" />
						<input type="hidden" name="property_id" id="property_id" value="<?php echo $property_id ?>" />
						<input type="hidden" name="unit_id" id="unit_id" value="<?php echo $unit_id ?>" />
						<input type="hidden" name="water_cost" id="water_cost" value="<?php echo $water_cost ?>" />
						<input type="hidden" name="reading_id" id="reading_id" value="<?php echo $reading_id?>" />
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
				$reading_id = $_POST['reading_id'];
				
				$reading = $current_reading - $previous_reading;
				$cost = $water_cost * $reading;

				$sql3="
					update water_meter_details set previous_reading='$previous_reading', last_reading='$current_reading', cost= '$cost' WHERE ID  = '$reading_id'";
				

				//echo $sql3;
				$result = mysql_query($sql3);

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
