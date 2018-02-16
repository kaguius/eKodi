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
		if($property_manager_id == 0){
			$result_suppliers = mysql_query("select id, company_name from property_managers where id = '$manager_id'");
		}
		else{
			$result_suppliers = mysql_query("select id, company_name from property_managers where id = '$property_manager_id'");
		}
		while ($row = mysql_fetch_array($result_suppliers))
		{
			$lookup_company_name = $row['company_name'];
		}
		include_once('includes/header.php');
		if (!empty($_GET)){	
			$page_title = "Edit Asset Register";
			$action = $_GET['action'];
			$ID = $_GET['id'];
			if ($action=='edit'){
				$result = mysql_query("select id, asset_tag, description, brand, model_no, serial_number, purchase_value, purchase_year, asset_location from fin_asset_register where id  = '$ID'");
				
				while ($row = mysql_fetch_array($result))
				{
					$id = $row['id'];
					$asset_tag = $row['asset_tag'];
					$asset_description = $row['description'];
					$brand = $row['brand'];
					$model = $row['model_no'];
					$serial_number = $row['serial_number'];
					$purchase_value = $row['purchase_value'];
					$purchase_year = $row['purchase_year'];			
					$asset_location = $row['asset_location'];
				}
			}
		}
		else{
			$page_title = "Create Asset Register";
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
							<strong>You are here:</strong> &raquo; <a href="index.php">Home</a> &raquo; <a href="financials.php">Financials</a> &raquo; Create Inventory Register for <?php echo $lookup_company_name ?><br />
					<?php
					}
					?>
					<form id="frmCreateManager" name="frmCreateManager" method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
						<input type="hidden" name="page_status" id="page_status" value="<?php echo $action ?>" />
						<input type="hidden" name="page_id" id="page_id" value="<?php echo $ID ?>" />
						<table border='0' width='100%' cellpadding='2' cellspacing='2'>
						<?php 
							if($action == "edit"){
						?>
							<tr>
								<td valign='top'>Asset Tag *</td>
								<td valign='top' colspan="3">
									<input title="Enter Asset Tag" value="<?php echo $asset_tag ?>" id="asset_tag" name="asset_tag" type="text" maxlength="100" readonly class="main_input" size="20" />
								</td>
							</tr>
						<?php
						}
						?>
							<tr bgcolor = #F0F0F6>
								<td valign='top'>Asset Description *</td>
								<td valign='top'>
									<textarea title="Enter Asset Description" name="asset_description" id="asset_description" cols="45" rows="5" class="textfield"><?php echo $asset_description ?></textarea>
								</td>
								<td valign='top'>Brand *</td>
								<td valign='top'>
									<input title="Enter Brand" value="<?php echo $brand ?>" id="brand" name="brand" type="text" maxlength="100" class="main_input" size="50" />
								</td>
							</tr>
							<tr>
								<td valign='top'>Model No *</td>
								<td valign='top'>
									<input title="Enter Model No" value="<?php echo $model ?>" id="model" name="model" type="text" maxlength="100" class="main_input" size="20" />
								</td>
								<td valign='top'>Serial No *</td>
								<td valign='top'>
									<input title="Enter Serial No" value="<?php echo $serial_number ?>" id="serial_number" name="serial_number" type="text" maxlength="100" class="main_input" size="50" />
								</td>
							</tr>
							<tr bgcolor = #F0F0F6>
								<td valign='top'>Purchase Value *</td>
								<td valign='top' colspan="3">
									<input title="Enter Purchase Value" value="<?php echo $purchase_value ?>" id="purchase_value" name="purchase_value" type="text" maxlength="100" class="main_input" size="20" />
								</td>
							</tr>
							<tr>
								<td valign='top'>Purchase Year*</td>
								<td valign='top'>
									<input title="Enter Purchase Year" value="<?php echo $purchase_year ?>" id="purchase_year" name="purchase_year" type="text" maxlength="100" class="main_input" size="50" />
								</td>
								<td valign='top'>Asset Location</td>
								<td valign='top'>
									<textarea title="Enter Asset Location" name="asset_location" id="asset_location" cols="45" rows="5" class="textfield"><?php echo $asset_location ?></textarea>
								</td>
							</tr>
							<tr>
								<td colspan="4" valign="top">&nbsp;</td>
							</tr>
							<tr>		
								<td colspan="2" valign="top">
									<button name="btnNewCard" id="button">Save</button>
								</td>
								<td colspan="2" align="right">
									<button name="reset" id="button2" type="reset">Reset</button>
								</td>		
							</tr>
						</table>
						<script  type="text/javascript">
							var frmvalidator = new Validator("frmCreateManager");
							frmvalidator.addValidation("asset_description","req","Please enter the Company Name or Property Manager Name");
							frmvalidator.addValidation("brand","req","Please enter the Location Address");
							frmvalidator.addValidation("serial_number","req","Please enter the Location Address");
							frmvalidator.addValidation("purchase_value","req","Please enter the Location Address");
							frmvalidator.addValidation("purchase_year","req","Please enter the Location Address");
							frmvalidator.addValidation("asset_location","req","Please enter the Location Address");
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
				$asset_description = $_POST['asset_description'];
				$brand = $_POST['brand'];
				$model = $_POST['model'];	
				$serial_number = $_POST['serial_number'];	
				$purchase_value = $_POST['purchase_value'];	
				$purchase_year = $_POST['purchase_year'];	
				$asset_location = $_POST['asset_location'];	

				$page_id = $_POST['page_id'];
				$page_status = $_POST['page_status'];				
				
				$result_tender = mysql_query("select id from fin_asset_register order by id desc limit 1");
				while ($row = mysql_fetch_array($result_tender))
				{
					$return_id = $row['id'];
				}
				
				if ($return_id == ""){
					$return_id = 1;
					$return_id = "0001";
					$asset_tag = "e-Kodi-ASSET-".$return_id;
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
					
					$asset_tag = "e-Kodi-ASSET-".$return_id;
				}
				
				if($page_status == 'edit'){
					$sql3="
						update fin_asset_register set asset_location ='$asset_location', description='$asset_description', brand='$brand', model_no='$model', serial_number='$serial_number', purchase_value='$purchase_value', purchase_year='$purchase_year', UID='$userid'  WHERE ID  = '$page_id'";
				}
				else{
					$sql3="
						INSERT INTO fin_asset_register (asset_tag, description, brand, model_no, serial_number, purchase_value, purchase_year, asset_location, UID, manager_id)
						VALUES('$asset_tag', '$asset_description', '$brand', '$model', '$serial_number', '$purchase_value', '$purchase_year', '$asset_location', '$userid', '$property_manager_id')";

					
					
				}
				//echo $sql3;
				$result = mysql_query($sql3);
				?>
					<script type="text/javascript">
					<!--
						document.location = "fin_asset_register.php";
					//-->
					</script>
				<?php
			}
	}
	?>
<?php
	include_once('includes/footer.php');
?>
