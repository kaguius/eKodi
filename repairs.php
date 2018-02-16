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
		$page_title = "Repairs Log Payment";
			
		include_once('includes/db_conn.php');
		$transactiontime = date("Y-m-d G:i:s");
		$repair_period = date("F, Y");
		$repair_month = date("m");
		$repair_year = date("Y");
		$repair_name = "";
		$repair_budget = "";
		$justification  = "";
		//$expense_paid = array();
		if (!empty($_GET)){	
			$property_id = $_GET['property_name'];
		}
		$result_suppliers = mysql_query("select id, property_name, commission, location from property_details where id = '$property_id'");
		while ($row = mysql_fetch_array($result_suppliers))
		{
			$property_name = $row['property_name'];
		}
		$sql = "select id, location from property_item where property_listing = '$property_id'";
		include ("includes/core_functions.php");
		include_once('includes/header.php');
		?>		
		<div id="page">
			<div id="content">
				<div class="post">
					<h2><?php echo $page_title ?> | e-kodi</h2>
					<strong>You are here:</strong> &raquo; <a href="index.php">Home</a> &raquo; <a href="property_repairs.php">Repairs</a> &raquo; <a href="property_repairs.php">Property Repairs</a> &raquo; Repairs Log Payment for <?php echo $property_name ?><br />
					<p>Month: <?php echo $repair_period ?></p>
					<form id="frmCreateProperty" name="frmCreateProperty" method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
						<table border="0" width="100%">
							<input type="hidden" name="userid" value="<?php echo $userid ?>">
							<input type="hidden" name="property_id" value="<?php echo $property_id ?>">
							<tr >
								<td>Property Unit *</td>
								<td valign='top'>
									<select name='location' id='location'>
										<?php
										//echo "<option value=''>" "</option>"; 
										$sql2 = mysql_query("select id, location, floor, tenant from property_item where property_listing = '$property_id' order by location asc");
										while($row = mysql_fetch_array($sql2)) {
											$id = $row['id'];
											$location = $row['location'];
											$floor = $row['floor'];
											$tenant = $row['tenant'];
											$block_occupied = $location.", ".$floor;
											if($tenant==0){
												echo "<option value='$id'><font color='red'>Vacant: </font>".$block_occupied."</option>"; 
											}
											else{
												echo "<option value='$id'>".$block_occupied."</option>"; 
											}
										}
										?>
									</select>
								</td>
							</tr>
							<tr >
								<td width="30%">Repair Name *</td>
								<td width="70%">
									<input title="Enter Repair Name" value="<?php echo $repair_name ?>" id="repair_name" name="repair_name" type="text" maxlength="100" class="main_input" size="50" />
								</td>
							</tr>
							<tr >
								<td>Repair Budget * (KES)</td>
								<td>
									<input title="Enter Repair Budget" value="<?php echo $repair_budget ?>" id="repair_budget" name="repair_budget" type="text" maxlength="50" class="main_input" size="25" />
								</td>
							</tr>
							<tr>
								<td >Detailed Reasons *</td>
								<td>
									<textarea title="Enter Detailed Reasons" name="justification" id="justification" cols="45" rows="5" class="textfield"><?php echo $justification ?></textarea>
								</td>
							</tr>
							<tr>
								<td>Payment Responsibility *</td>
								<td valign='top'>
									<select name="payment" id="payment">
										  <option value="1">Tenant</option>
										  <option value="2">Landlord</option>
									</select> 

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
							frmvalidator.addValidation("repair_name","req","Please enter the Repair Name");
							frmvalidator.addValidation("repair_budget","req","Please enter the Repair Budget");
						</script>
					</form>
				</div>
			</div>
			<br class="clearfix" />
			</div>
		</div>
		<?php
			if (!empty($_POST)) {
				$expense_month = date("m");
				$expense_year = date("Y");
				$userid = $_POST['userid'];
				$location = $_POST['location'];
				$property_id = $_POST['property_id'];
				$repair_name = $_POST['repair_name'];
				$repair_budget = $_POST['repair_budget'];
				$justification = $_POST['justification'];
				$payment = $_POST['payment'];
				
				$sql="
					INSERT INTO repairs_table (property_name, property_unit, repair_name, repair_cost, justification, payment, repair_month, repair_year, UID, transactiontime)
					VALUES('$property_id', '$location', '$repair_name', '$repair_budget', '$justification', '$payment', '$repair_month', '$repair_year', '$userid', '$transactiontime')";

				//echo $sql;
				$result = mysql_query($sql3);
				if($payment == '1'){
				}
				else{
					$sql2="
					INSERT INTO expense_items (property_id, expense_name, budget_expense, UID, user_id, transactiontime)
					VALUES('$property_id', '$repair_name', '$repair_budget', '$userid', '$userid', '$transactiontime')";

					//echo $sql2;
					$result = mysql_query($sql2);
					$sql2 = mysql_query("select id from expense_items order by id desc limit 1");
					while($row = mysql_fetch_array($sql2)) {
						$expense_id = $row['id'];
					}
					$sql3="
					INSERT INTO expense_payment (property_id, expense_id, expense_payment, expense_month, expense_year, UID, transactiontime)
					VALUES('$property_id', '$expense_id', '$repair_budget', '$expense_month', '$expense_year', '$userid', '$transactiontime')";

					//echo $sql3;
					$result = mysql_query($sql3);
				}
				?>
					<script type="text/javascript">
						document.location = "repairs_report.php";
					</script>
				<?php
			}
	}
?>
<?php
	include_once('includes/footer.php');
?>
