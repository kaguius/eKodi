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
		//$page_title = "Add Property Unit";
		$sql = "select id, property_name from property_details order by property_name asc";
		include ("includes/core_functions.php");	
		include_once('includes/db_conn.php');
		$location = "";
		$floor = "";
		$rent = "";
		$service_charge = "";
		$transactiontime = date("Y-m-d G:i:s");
		if (!empty($_GET)){	
			$page_title = "Add Property Unit";
			$action = $_GET['action'];
			$property_id = $_GET['id'];
			$property_item = $_GET['property_item'];
			if ($action=='edit'){
				$page_title = "Edit Property Unit";
				$result = mysql_query("select location, floor, deposit, rent, service_charge, unit_type, list, parking_fee, garbage_fee from property_item where id = '$property_item'");
				while ($row = mysql_fetch_array($result))
				{
					$location = $row['location'];
					$floor = $row['floor'];
					$deposit = $row['deposit'];
					$rent = $row['rent'];
					$service_charge = $row['service_charge'];
					$property_type = $row['unit_type'];
					$parking_fee = $row['parking_fee'];
					$garbage_fee = $row['garbage_fee'];
					$list = $row['list'];
					if($list == '1'){
						$list_name = 'Yes';
					}
					else {
						$list_name = 'No';
					}
				}
			}
		}
		$result_suppliers = mysql_query("select id, property_name from property_details where id = '$property_id'");
		while ($row = mysql_fetch_array($result_suppliers))
		{
			$lookup_property_name = $row['property_name'];
		}
		include_once('includes/header.php');
		?>		
		<div id="page">
			<div id="content">
				<div class="post">
					<h2><?php echo $page_title ?> | Property Name: <?php echo $lookup_property_name ?> | e-kodi</h2>
					<?php 
						if($action == "edit"){
					?>
							<strong>You are here:</strong> &raquo; <a href="index.php">Home</a> &raquo; <a href="property_listings.php">Properties</a> &raquo; Edit Unit for <?php echo $lookup_property_name ?><br />
					<?php
						}
						else{
					?>
							<strong>You are here:</strong> &raquo; <a href="index.php">Home</a> &raquo; <a href="property_listings.php">Properties</a> &raquo; Add Property Unit for <?php echo $lookup_property_name ?><br />
					<?php
					}
					?>
					<form id="frmCreatePropertyItem" name="frmCreatePropertyItem" method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
						<table border="0" width="100%">
							<input type="hidden" name="page_status" id="page_status" value="<?php echo $action ?>" />
							<input type="hidden" name="property_id" id="property_id" value="<?php echo $property_id ?>" />
							<input type="hidden" name="property_item" id="property_item" value="<?php echo $property_item ?>" />
							
							<tr >
								<td colspan="2"><strong><u>Property Details</u></strong></td>
							</tr>
							<?php
								if($property_id == ""){ ?>
								<tr >
									<td width="30%">Property Listing *</td>
									<td width="70%">
										<?php
											printSelectFromSql($sql, 'id', 'property_name', 'property_name', 'property_name', '', 'includes/db_conn.php', 1, ' class="myClass" ');
										?>
									</td>
								</tr>
								<?php
								}else{
									echo "<input type='hidden' name='property_name' value='$property_id'>";
								}
								?>
							<tr >
								<td width="30%">Unit Num/Name *</td>
								<td width="70%">
									<input title="Enter Location" value="<?php echo $location ?>" id="location" name="location" type="text" maxlength="100" class="main_input" size="50" />
								</td>
							</tr>
							<tr >
								<td>Floor *</td>
								<td>
									<input title="Enter Floor" value="<?php echo $floor ?>" id="floor" name="floor" type="text" maxlength="100" class="main_input" size="40" />
								</td>
							</tr>
							<tr >
								<td>Deposit (KES)*</td>
								<td>
									<input title="Enter Deposit" value="<?php echo $deposit ?>" id="deposit" name="deposit" type="text" maxlength="100" class="main_input" size="50" />
								</td>
							</tr>
							<tr >
								<td>Rent (KES)*</td>
								<td>
									<input title="Enter Rent" value="<?php echo $rent ?>" id="rent" name="rent" type="text" maxlength="100" class="main_input" size="50" />
								</td>
							</tr>
							<!--<tr >
								<td>Service Charge (KES)*</td>
								<td>
									<input title="Enter Service Charge" value="<?php echo $service_charge ?>" id="service_charge" name="service_charge" type="text" maxlength="100" class="main_input" size="50" />
								</td>
							</tr>-->
							<tr >
								<td>Parking Fee (KES)*</td>
								<td>
									<input title="Enter Parking Fee" value="<?php echo $parking_fee ?>" id="parking_fee" name="parking_fee" type="text" maxlength="100" class="main_input" size="30" />
								</td>
							</tr>
							<tr >
								<td>Garbage Fee (KES)*</td>
								<td>
									<input title="Enter Garbage Fee" value="<?php echo $garbage_fee ?>" id="garbage_fee" name="garbage_fee" type="text" maxlength="100" class="main_input" size="30" />
								</td>
							</tr>
							<tr >
								<td>Property Type *</td>
								<td>
									<select name='property_type' id='property_type'>
										<?php
											if($action == 'edit'){
										?>
												<option value="<?php echo $property_type ?>"><?php echo $property_type ?></option>	
										<?php
											}
											else{
										?>
												<option value=''> </option>
										<?php
											}
										$sql2 = mysql_query("select property_type from property_type order by property_type asc");
										while($row = mysql_fetch_array($sql2)) {
											$property_type = $row['property_type'];
											echo "<option value='$property_type'>".$property_type."</option>"; 
										}
										?>
									</select>
								</td>
							</tr>
							<!--<tr >
								<td>List on e-Kodi.com *</td>
								<td>
									<select name="list" id="list">
										<?php
										  if($action == 'edit'){
										?>
										  <option value="<?php echo $list  ?>"><?php echo $list_name ?></option>
										<?php
										  }
										?>
										  <option value="1">Yes</option>
										  <option value="0">No</option>
									</select> 
								</td>
							</tr>-->
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
							var frmvalidator = new Validator("frmCreatePropertyItem");
							frmvalidator.addValidation("property_name","req","Please enter the Property Name");
							frmvalidator.addValidation("location","req","Please enter the Location Address");
							frmvalidator.addValidation("rent","req","Please enter the Rent Amount");
							frmvalidator.addValidation("service_charge","req","Please enter the Service Charge");
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
				$location = $_POST['location'];
				$floor = $_POST['floor'];
				$deposit = $_POST['deposit'];
				$rent = $_POST['rent'];
				$service_charge = $_POST['service_charge'];
				$parking_fee = $_POST['parking_fee'];
				$garbage_fee = $_POST['garbage_fee'];
				$property_id = $_POST['property_id'];
				$property_item = $_POST['property_item'];
				$page_status = $_POST['page_status'];
				$property_type = $_POST['property_type'];
				$list = $_POST['list'];
				
				if($page_status == 'edit'){
					$sql3="
						update property_item set location='$location', floor='$floor', deposit='$deposit', rent='$rent', service_charge='$service_charge', unit_type='$property_type', UID='$userid', list='$list', parking_fee='$parking_fee', garbage_fee='$garbage_fee' WHERE ID  = '$property_item'";
				}
				else{				
					$sql3="
						INSERT INTO property_item (property_listing, location, floor, deposit, rent, service_charge, transactiontime, property_month, property_year, unit_type, UID, list, parking_fee, garbage_fee)
						VALUES('$property_name', '$location', '$floor', '$deposit', '$rent', '$service_charge', '$transactiontime', '$property_month', '$property_year', '$property_type', '$userid', '$list', '$parking_fee', '$garbage_fee')";
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
