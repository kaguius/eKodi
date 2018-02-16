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
		$page_title = "Detailed Property Listing";
		include_once('includes/db_conn.php');
		$status = "";
		$account_number = "";
		
		if (!empty($_GET)){	
			$ID = $_GET['id'];
		} 
		$result_suppliers = mysql_query("select id, manager_code, company_name from property_managers where id = '$ID'");
		$intcount = 0;
		while ($row = mysql_fetch_array($result_suppliers))
		{
			$intcount++;
			$manager_code = $row['manager_code'];	
			$company_name = $row['company_name'];
		}
		include_once('includes/header.php');
		?>		
		<div id="page">
			<div id="content">
				<div class="post">
					<h2><?php echo $page_title ?> | Property Name: <?php echo $company_name ?> | e-kodi</h2>
					<strong>You are here:</strong> &raquo; <a href="index.php">Home</a> &raquo; <a href="property_listings.php">Properties</a> &raquo; Property Units for <?php echo $company_name ?><br />
					<a href="create_property.php">+ Add new Units for <?php echo $company_name ?></a>
					<table width="100%" border="0" cellspacing="2" cellpadding="2" class="display" id="example">
						<thead bgcolor="#E6EEEE">
							<tr>
								<th>#</th>
								<th>Code</th>
								<th>Name</th>
								<th>Owner</th>
								<th>Location</th>
								<th>Contact</th>
								<th>Commission</th>
								<th>Taxes</th>
								<th>Units</th>
								<th>Details</th>								
								<th>Expenses</th>
								<th>Edit</th>
							</tr>
						</thead>
						<tbody>
						<?php
							if($property_manager_id == 0){
							$result_suppliers = mysql_query("select id, property_code, commission, deposit, property_owner, property_name, location, propety_contact, taxes from property_details where manager_id = '$ID' order by property_name, property_owner asc");
						}
						else{
							$result_suppliers = mysql_query("select id, property_code, commission, deposit, property_owner, property_name, location, propety_contact, taxes from property_details where manager_id = '$property_manager_id' order by property_name, property_owner asc");
						}
							$intcount = 0;
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
								}
								$property_owner = $row['property_owner'];
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
									echo "<td valign='top'><a href='property_listing.php?id=$id'>$property_code</a></td>";
									echo "<td valign='top'>$property_name</td>";
									echo "<td valign='top'>$property_owner</td>";
									echo "<td valign='top'>$location</td>";	
									echo "<td valign='top'>$propety_contact</td>";
									echo "<td valign='top' align='center'>$commission%</td>";
									if($taxes=='Yes'){
										echo "<td valign='top' align='center'><img src='images/active.png'></td>";
									}
									else{
										echo "<td valign='top' align='center'><img src='images/delete.png'></td>";
									}
									echo "<td valign='top' align='center'><a title = 'Create Unit Blocks for $property_name' href='create_property_item.php?id=$id'><img src='images/add.png' width='25px'></a></td>";
									echo "<td valign='top' align='center'><a href='detailed_property_listing.php?id=$id' title = 'View Unit Blocks for $property_name'><img src='images/units.png' width='35px'></a></td>";
									echo "<td valign='top' align='center'><a title = 'Create Expenses for $property_name' href='create_expense.php?id=$id'><img src='images/expenses.png' width='35px'></a></td>";
									echo "<td valign='top' align='center'><a title = 'Edit Detail' href='create_property.php?id=$id&action=edit'><img src='images/edit.png' width='35px'></a></td>";
								echo "</tr>";	
								}
							?>
						</tbody>
						<tfoot bgcolor="#E6EEEE">
							<tr>
								<th>#</th>
								<th>Code</th>
								<th>Name</th>
								<th>Owner</th>
								<th>Location</th>
								<th>Contact</th>
								<th>Commission</th>
								<th>Taxes</th>
								<th>Units</th>
								<th>Details</th>								
								<th>Expenses</th>
								<th>Edit</th>
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
