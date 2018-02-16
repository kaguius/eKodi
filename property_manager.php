<?php
	$userid = "";
	$adminstatus = "";
	session_start();
	if (!empty($_SESSION)){
		$userid = $_SESSION["userid"] ;
		$adminstatus = $_SESSION["adminstatus"] ;
		$property_manager_id = $_SESSION["property_manager_id"] ;
	}
	if($adminstatus == 3){
		include_once('includes/header.php');
		?>
		<script type="text/javascript">
			document.location = "insufficient_permission.php";
		</script>
		<?php
	}
	else{
		$page_title = "Property Manager(s)";
		include_once('includes/db_conn.php');
		$transactiontime = date("Y-m-d G:i:s");
		if (!empty($_GET)){	
			$manager_id = $_GET['id'];
			$action = $_GET['action'];

			if($action=='delete'){
				$sql5="delete from property_managers where id = '$manager_id'";	
				//echo $sql5;
				$result = mysql_query($sql5);
				?>
				<script type="text/javascript">
				<!--
					document.location = "property_manager.php";
				//-->
				</script>
				<?php
			}
		}
		include_once('includes/header.php');
		?>		
		<div id="page">
			<div id="content">
				<div class="post">
					<h2><?php echo $page_title ?> | e-kodi</h2>
					<strong>You are here:</strong> &raquo; <a href="index.php">Home</a> &raquo; Properties<br />
					<?php if($property_manager_id == 0){ ?>
						<a href="create_property_managers.php">+ Add new Property Manager</a>
					<?php } ?>
					<table width="100%" border="0" cellspacing="2" class="display" cellpadding="2" id="example">
						<thead bgcolor="#E6EEEE">
							<tr>
								<th>#</th>
								<th>Name</th>
								<th>Location</th>
								<th>Contact</th>
								<th>Details</th>
								<th>Properties</th>
								<th>Commercial</th>							
								<th>Residentials</th>
								<th>Edit</th>
								<th>Delete</th>
							</tr>
						</thead>
						<tbody>
						<?php
						if($property_manager_id == 0){
							$result_suppliers = mysql_query("select id, manager_code, company_name, physical_address, location, phone_number, email_address, commission, bank_name, bank_branch, account_name, account_number from property_managers order by company_name asc");
						}
						else{
							$result_suppliers = mysql_query("select id, manager_code, company_name, physical_address, location, phone_number, email_address, commission, bank_name, bank_branch, account_name, account_number from property_managers where id = '$property_manager_id' order by company_name asc");
						}
							$intcount = 0;
							$property_counts = 0;
							$residential_counts = 0;
							$commercial_counts = 0;
							while ($row = mysql_fetch_array($result_suppliers))
							{
								$intcount++;
								$id = $row['id'];
								$manager_code = $row['manager_code'];
								$company_name = $row['company_name'];
								$company_name = ucwords(strtolower($company_name));
								$commission = $row['commission'];
								$location = $row['location'];
								$phone_number = $row['phone_number'];
								$result = mysql_query("select count(id)counts from property_details where manager_id = '$id'");
								while ($row = mysql_fetch_array($result))
								{
									$property_counts = $row['counts'];
								}
								$result = mysql_query("select count(property_item.id) as counts from property_item inner join property_details on property_details.id = property_item.property_listing where manager_id = '$id' and property_details.property_type = 'Residential'");
								while ($row = mysql_fetch_array($result))
								{
									$residential_counts = $row['counts'];
								}
								$result = mysql_query("select count(property_item.id) as counts from property_item inner join property_details on property_details.id = property_item.property_listing where manager_id = '$id' and property_details.property_type = 'Commercial'");
								while ($row = mysql_fetch_array($result))
								{
									$commercial_counts = $row['counts'];
								}
								if ($intcount % 2 == 0) {
									$display= '<tr bgcolor = #F0F0F6>';
								}
								else {
									$display= '<tr>';
								}
								echo $display;
									echo "<td valign='top'>$intcount</td>";
									echo "<td valign='top'>$company_name</td>";
									echo "<td valign='top'>$location</td>";	
									echo "<td valign='top'>$phone_number</td>";
									echo "<td valign='top' align='center'><a href='property_listings.php?manager_id=$id' title = 'View Unit Blocks for $property_name'><img src='images/units.png' width='35px'></a></td>";
									echo "<td valign='top' align='right'>".number_format($property_counts, 0)."</td>";
									echo "<td valign='top' align='right'>".number_format($commercial_counts, 0)."</td>";
									
									echo "<td valign='top' align='right'>".number_format($residential_counts, 0)."</td>";
									echo "<td valign='top' align='center'><a title = 'Edit Detail' href='create_property_managers.php?id=$id&action=edit'><img src='images/edit.png' width='35px'></a></td>";
									echo "<td valign='top' align='center'><a title = 'Delete $property_name Details' href='property_manager.php?id=$id&action=delete'><img src='images/delete.png' width='25px'></a></td>";
								echo "</tr>";
								$properties = $properties + $property_counts;	
								$commercial_properties = $commercial_properties + $commercial_counts;
								$residential_properties = $residential_properties + $residential_counts;
								}
								
								$total_properties = $commercial_properties + $residential_properties;
							?>
							</tbody>
							<tr bgcolor = '#E6EEEE'>
								<td colspan='5'><strong>Total Properties</strong></td>
								<td align='right'><strong><?php echo number_format($properties, 0) ?></strong></td>
								<td align='right'><strong><?php echo number_format($commercial_properties, 0) ?></strong></td>
								<td align='right'><strong><?php echo number_format($residential_properties, 0) ?></strong></td>
								<td colspan='2' align='right'><strong><?php echo number_format($total_properties, 0) ?></strong></td>
							</tr>
						
						<tfoot bgcolor="#E6EEEE">
							<tr>
								<th>#</th>
								<th>Name</th>
								<th>Location</th>
								<th>Contact</th>
								<th>Details</th>
								<th>Properties</th>
								<th>Commercial</th>							
								<th>Residentials</th>
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
