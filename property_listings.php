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
		$page_title = "Properties";
		include_once('includes/db_conn.php');
		$transactiontime = date("Y-m-d G:i:s");
		$repair_period = date("F, Y");

		include_once('includes/header.php');
		if (!empty($_GET)){	
			$property_id = $_GET['id'];
			$property_manager_id = $_GET['manager_id'];
			$action = $_GET['action'];

			if($action=='delete'){
				$sql5="delete from property_details where id = '$property_id'";	
				//echo $sql5;
				$result = mysql_query($sql5);
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
		<div id="page">
			<div id="content">
				<div class="post">
					<h2><?php echo $page_title ?> | e-kodi</h2>
					<strong>You are here:</strong> &raquo; <a href="index.php">Home</a> &raquo; Properties<br />
					<strong>Properties as at: <?php echo $repair_period ?></strong><br />
					<a href="create_property.php">+ Add new Property</a>
					<table width="100%" border="0" cellspacing="2" class="display" cellpadding="2" id="example">
						<thead bgcolor="#E6EEEE">
							<tr>
								<th>#</th>
								<th>Name</th>
								<th>Owner</th>
								<th>County</th>
								<th>Contact</th>
								<th>Details</th>								
								<!--<th>Expenses</th>-->
								<th>Tenants</th>
								<th>Checklist</th>
								<th>Water</th>
								<th>Invoices</th>
								<th>Edit</th>
								<th>Delete</th>
							</tr>
						</thead>
						<tbody>
						<?php
						if($property_manager_id == 0){
							$result_suppliers = mysql_query("select id, property_code, commission, deposit, property_owner, property_name, location, propety_contact, taxes from property_details order by property_name, property_owner asc");
						}
						else{
							if($adminstatus == '5'){
								$result_suppliers = mysql_query("select id, property_code, commission, deposit, property_owner, property_name, location, propety_contact, taxes from property_details where manager_id = '$property_manager_id' and owner_id = '$userid' order by property_name, property_owner asc");
							}
							else{
								$result_suppliers = mysql_query("select id, property_code, commission, deposit, property_owner, property_name, location, propety_contact, taxes from property_details where manager_id = '$property_manager_id' order by property_name, property_owner asc");
							}
						}
							$intcount = 0;
							$unit_count = 0;
							while ($row = mysql_fetch_array($result_suppliers))
							{
								$intcount++;
								$id = $row['id'];
								$property_code = $row['property_code'];
								$property_name = $row['property_name'];
					
								$string = substr($property_name, 0, 2);
								if($string == 'ZA'){
									$property_name = 'Zawadi Apartments';
								}
								else{
									$property_name = $property_name;
									$property_name = ucwords(strtolower($property_name));
								}
								$property_owner = $row['property_owner'];
								$property_owner = ucwords(strtolower($property_owner));
								$commission = $row['commission'];
								$location = $row['location'];
								$deposit = $row['deposit'];
								$taxes = $row['taxes'];
								$propety_contact = $row['propety_contact'];
								if ($intcount % 2 == 0) {
									$display= '<tr bgcolor = #F0F0F6>';
								}
								else {
									$display= '<tr>';
								}
								echo $display;
									echo "<td valign='top'>$intcount.</td>";
									echo "<td valign='top'>$property_name</td>";
									echo "<td valign='top'>$property_owner</td>";
									echo "<td valign='top'>$location</td>";	
									echo "<td valign='top'>$propety_contact</td>";
									if($adminstatus == '5'){
										echo "<td valign='top' align='center'><a href='#' title = 'View Unit Blocks for $property_name'><img src='images/units.png' width='35px'></a></td>";
										//echo "<td valign='top' align='center'><a title = 'Create Expenses for $property_name' href='#'><img src='images/expenses.png' width='35px'></a></td>";
										echo "<td valign='top' align='center'><a href='#' title = 'View Tenants for $property_name'><img src='images/tenant.png' width='35px'></a></td>";
										echo "<td valign='top' align='center'><a title = 'Create Property Checklist for $property_name' href='#'><img src='images/checklist-icon.png' width='35px'></a></td>";
										echo "<td valign='top' align='center'><a title = 'Enter Water Meter Readings for $property_name' href='#'><img src='images/water.jpg' width='35px'></a></td>";
										echo "<td valign='top' align='center'><a title = 'Delete $property_name Details' href='print_bulk_tenant_invoice.php?property_id=$id'><img src='images/printer.jpg' width='25px'></a></td>";
										echo "<td valign='top' align='center'><a title = 'Edit Detail' href='#'><img src='images/edit.png' width='35px'></a></td>";
										echo "<td valign='top' align='center'><a title = 'Delete $property_name Details' href='property_listings.php?id=$id&action=delete'><img src='images/delete.png' width='25px'></a></td>";
									}
									else{
										echo "<td valign='top' align='center'><a href='detailed_property_listing.php?id=$id' title = 'View Unit Blocks for $property_name'><img src='images/units.png' width='35px'></a></td>";
										//echo "<td valign='top' align='center'><a title = 'Create Expenses for $property_name' href='create_expense.php?id=$id'><img src='images/expenses.png' width='35px'></a></td>";
										echo "<td valign='top' align='center'><a href='tenant_listings.php?property_name=$id' title = 'View Tenants for $property_name'><img src='images/tenant.png' width='35px'></a></td>";
										echo "<td valign='top' align='center'><a title = 'Create Property Checklist for $property_name' href='checklist_locations.php?property_id=$id'><img src='images/checklist-icon.png' width='35px'></a></td>";
										echo "<td valign='top' align='center'><a title = 'Enter Water Meter Readings for $property_name' href='water_tenant_listings.php?property_name=$id'><img src='images/water.jpg' width='35px'></a></td>";
										echo "<td valign='top' align='center'><a title = 'Delete $property_name Details' href='print_bulk_tenant_invoice.php?property_id=$id'><img src='images/printer.jpg' width='25px'></a></td>";
										echo "<td valign='top' align='center'><a title = 'Edit Detail' href='create_property.php?id=$id&action=edit'><img src='images/edit.png' width='35px'></a></td>";
										echo "<td valign='top' align='center'><a title = 'Delete $property_name Details' href='property_listings.php?id=$id&action=delete'><img src='images/delete.png' width='25px'></a></td>";
									}
								echo "</tr>";	
								}
							?>
						</tbody>
						<tfoot bgcolor="#E6EEEE">
							<tr>
								<th>#</th>
								<th>Name</th>
								<th>Owner</th>
								<th>County</th>
								<th>Contact</th>
								<th>Details</th>								
								<!--<th>Expenses</th>-->
								<th>Tenants</th>
								<th>Checklist</th>
								<th>Water</th>
								<th>Invoices</th>
								<th>Edit</th>
								<th>Delete</th>
							</tr>
						</tfoot>
					</table>
				</div>
			</div>
			<br class="clearfix" />
			</div>
		</div>
<?php
	}
	include_once('includes/footer.php');
?>
