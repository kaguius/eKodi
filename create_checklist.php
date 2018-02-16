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
		$page_title = "Create Checklist Locations";
		include ("includes/core_functions.php");
		include_once('includes/db_conn.php');
		if (!empty($_GET)){
			$property_id = $_GET['property_id'];	
			$status = $_GET['status'];
			$action = $_GET['action'];
			$location_id = $_GET['location_id'];
			if ($action =='edit'){
				$result = mysql_query("select id, location from checklist_location where id = '$location_id'");
				//echo $query="select id, location from checklist_location where id = '$location_id'";
				while ($row = mysql_fetch_array($result))
				{
					$ID = $row['id'];
					$checklist_location =$row['location'];
				}
			}
		}
		
		if($property_manager_id == 0){
			$result_suppliers = mysql_query("select property_name from property_details where id = '$property_id'");
		}
		else{
			$result_suppliers = mysql_query("select property_name from property_details where id = '$property_id'");
		}
		while ($row = mysql_fetch_array($result_suppliers))
		{
			$lookup_company_name = $row['property_name'];
		}
		$transactiontime = date("Y-m-d G:i:s");
		$expense_code = "";
		$expense_name = "";

		include_once('includes/header.php');
		?>		
		<div id="page">
			<div id="content">
				<div class="post">
					<h2><?php echo $page_title ?> | e-kodi</h2>
					<strong>You are here:</strong> &raquo; <a href="index.php">Home</a> &raquo; <a href="property_listings.php">Properties</a> &raquo; Create Checklist Location for <?php echo $lookup_company_name ?><br />
					<form id="frmCreateProperty" name="frmCreateProperty" method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
					<input type="hidden" name="manager_id" id="manager_id" value="<?php echo $property_manager_id ?>" />
					<input type="hidden" name="property_id" id="property_id" value="<?php echo $property_id ?>" />
					<input type="hidden" name="page_status" id="page_status" value="<?php echo $action ?>" />
					<input type="hidden" name="location_id" id="location_id" value="<?php echo $location_id ?>" />
					<table border="0" width="100%">
							<tr >
								<td width="30%">Checklist Location *</td>
								<td width="70%">
									<input title="Enter Checklist Location" value="<?php echo $checklist_location ?>" id="checklist_location" name="checklist_location" type="text" maxlength="100" class="main_input" size="50" />
									<script language="JavaScript" type="text/javascript">if(document.getElementById) document.getElementById('checklist_location').focus();</script> 
								</td>
							</tr>
							<?php if($status == 'checklist_location_exists'){ ?>
								<tr>
									<td colspan="2">
										<font color="red">The Checklist Location specified already exists, enter another one.</font></a>	
									</td>
								</tr>
							<?php } ?>							
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
							frmvalidator.addValidation("checklist_location","req","Please enter the Checklist Location");
						</script>
					</form>
				</div>
			</div>
			<br class="clearfix" />
			</div>
		</div>
		<?php
			if (!empty($_POST)) {
				$manager_id = $_POST['manager_id'];
				$property_id = $_POST['property_id'];
				$checklist_location = $_POST['checklist_location'];
				$page_status = $_POST['page_status'];
				$location_id = $_POST['location_id'];

				$result_tender = mysql_query("select location from checklist_location where location = '$checklist_location' and manager_id = '$manager_id' and property_id = '$property_id'");
				while ($row = mysql_fetch_array($result_tender))
				{
					$checklist_location_exists = $row['location'];
				}
				
				$checklist_location_exists = strtolower($checklist_location_exists);
				$checklist_location = strtolower($checklist_location);

				if(($checklist_location_exists != $checklist_location)) {
				
					$checklist_location = ucwords(strtolower($checklist_location));
					//$expense_code = "ek-".$manager_id."-".$return_id;
				
					if($page_status == 'edit'){
						$sql3="
							update checklist_location set location='$checklist_location' WHERE ID  = '$location_id'";
					}
					else{
						$sql3="
						INSERT INTO checklist_location (property_id, location, manager_id, UID)
						VALUES('$property_id', '$checklist_location', '$manager_id', '$userid')";	
					}
					

					//echo $sql3;
					$result = mysql_query($sql3);

					//$url = "property_listings.php" ;
				
					//header( "Location: $url" );
					//exit ;
					$query = "checklist_locations.php?property_id=$property_id";

					?>
						<script type="text/javascript">
							document.location = "<?php echo $query ?>";
						</script>
					<?php
				}				
				else {

					$checklist_location_exists = MD5(checklist_location_exists);
					$query = "create_checklist.php?manager_id=$manager_id&status=checklist_location_exists&location_status=$checklist_location_exists";
					?>
					<script type="text/javascript">
					<!--
						/*alert("Either the Email Address or the Password do not match the records in the database or you have been disabled from the system, please contact the system admin at www.e-kodi.com/contact.php");*/
						document.location = "<?php echo $query ?>";
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
