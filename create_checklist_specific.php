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
		$page_title = "Create Construction Aspect";
		include ("includes/core_functions.php");
		include_once('includes/db_conn.php');
		if (!empty($_GET)){	
			$location_id = $_GET['location_id'];	
			$property_id = $_GET['property_id'];
			$status = $_GET['status'];
			$action = $_GET['action'];
			if ($action =='edit'){
				$result = mysql_query("select id, construct from checklist_const where id = '$location_id'");
				//echo $query="select id, location from checklist_location where id = '$location_id'";
				while ($row = mysql_fetch_array($result))
				{
					$ID = $row['id'];
					$checklist_item =$row['construct'];
				}
			}
		}

		if($property_manager_id == 0){
			$result_suppliers = mysql_query("select location from checklist_location where id = '$location_id' and property_id = '$property_id'");
		}
		else{
			$result_suppliers = mysql_query("select location from checklist_location where id = '$location_id' and property_id = '$property_id' and manager_id = '$property_manager_id'");
		}
		while ($row = mysql_fetch_array($result_suppliers))
		{
			$lookup_company_name = $row['location'];
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
					<strong>You are here:</strong> &raquo; <a href="index.php">Home</a> &raquo; <a href="checklist_locations.php?property_id=<?php echo $property_id ?>">Checklist Location(s)</a> &raquo; <?php echo $page_title ?> for <strong><?php echo $lookup_company_name ?> </strong>Checklist Item<br />
					<form id="frmCreateProperty" name="frmCreateProperty" method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
					<input type="hidden" name="manager_id" id="manager_id" value="<?php echo $property_manager_id ?>" />
					<input type="hidden" name="property_id" id="property_id" value="<?php echo $property_id ?>" />
					<input type="hidden" name="page_status" id="page_status" value="<?php echo $action ?>" />
					<input type="hidden" name="location_id" id="location_id" value="<?php echo $location_id ?>" />
					<table border="0" width="100%">
							<tr >
								<td width="30%">Create Construction Aspect *</td>
								<td width="70%">
									<input title="Enter Checklist Item" value="<?php echo $checklist_item ?>" id="checklist_item" name="checklist_item" type="text" maxlength="100" class="main_input" size="50" />
									 <script language="JavaScript" type="text/javascript">if(document.getElementById) document.getElementById('checklist_item').focus();</script> 
								</td>
							</tr>
							<?php if($status == 'checklist_item_exists'){ ?>
								<tr>
									<td colspan="2">
										<font color="red">The Checklist Specific Item specified already exists, enter another one.</font></a>	
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
							frmvalidator.addValidation("checklist_item","req","Please enter the Checklist Specific Item");
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
				$location_id = $_POST['location_id'];
				$property_id = $_POST['property_id'];
				$checklist_item = $_POST['checklist_item'];
				$page_status = $_POST['page_status'];
				$location_id = $_POST['location_id'];

				$result_tender = mysql_query("select construct from checklist_const where location = '$location_id' and manager_id = '$manager_id' and construct = '$checklist_item'");
				while ($row = mysql_fetch_array($result_tender))
				{
					$checklist_construct_exists = $row['construct'];
				}
				
				$checklist_construct_exists = strtolower($checklist_construct_exists);
				$checklist_item = strtolower($checklist_item);

				if(($checklist_construct_exists != $checklist_item)) {
				
					$checklist_item = ucwords(strtolower($checklist_item));
				
					if($page_status == 'edit'){
						$sql3="
						update checklist_const set construct='$checklist_item' WHERE ID = '$location_id'";
					}
					else{
						$sql3="
						INSERT INTO checklist_const (property_id, location, construct, manager_id, UID)
						VALUES('$property_id', '$location_id', '$checklist_item', '$manager_id', '$userid')";	
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

					$checklist_item_exists = MD5(checklist_item_exists);
					$query = "create_checklist_specific.php?manager_id=$manager_id&status=checklist_item_exists&location_status=$checklist_item_exists";
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
