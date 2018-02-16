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
		$page_title = "Tenant Water Payments";
		include_once('includes/db_conn.php');
		$transactiontime = date("Y-m-d G:i:s");
		$property_name = "";
		$physical_address = "";
		$location = "";
		$property_owner = "";
		$propety_contact = "";
		$bank_name = "";
		$bank_branch = "";
		$account_name = "";
		$account_number = "";
		if (!empty($_GET)){	
			$tenant_id = $_GET['tenant_id'];
			$property_id = $_GET['property'];
			$unit_id = $_GET['unit_id'];
			$reading_id = $_GET['id'];
			$result = mysql_query("select tenant_name from tenants where id = '$tenant_id'");
			while ($row = mysql_fetch_array($result))
			{
				$tenant_name = $row['tenant_name'];
			}
		
			if($action=='delete'){
				$sql5="delete from water_meter_details where id = '$reading_id'";	
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
		include_once('includes/header.php');
		?>		
		<div id="page">
			<div id="content">
				<div class="post">
					<h2><?php echo $page_title ?> | e-kodi</h2>
					<strong>You are here:</strong> <a href="index.php">Home</a> &raquo; <a href="admin.php">Admin</a> &raquo; <a href="property_tenant_listing.php">Property Tenant Listing</a> &raquo; Tenant Water Payment for <?php echo $tenant_name ?><br />
					<table width="100%" border="0" cellspacing="2" cellpadding="2" class="display" id="example">
						<thead bgcolor="#E6EEEE">
							<tr>
								<th>#</th>
								<th>Property Name</th>
								<th>Property Unit</th>
								<th>Previous Reading</th>
								<th>Current Reading</th>
								<th>Cost</th>
								<th>Month</th>
								<th>Year</th>
								<th>Pay Status</th>
								<th>Edit</th>
								<th>Delete</th>
							</tr>
						</thead>
						<tbody>
						<?php
							$result_suppliers = mysql_query("select water_meter_details.id, property_details.property_name, property_item.location, property_item.floor, tenants.tenant_name, previous_reading, last_reading, cost, calender.month, year, paid from water_meter_details inner join property_details on property_details.id = water_meter_details.property_name inner join property_item on property_item.id = water_meter_details.property_unit inner join tenants on tenants.id = water_meter_details.tenant inner join calender on calender.id = water_meter_details.month where water_meter_details.tenant = '$tenant_id' and water_meter_details.property_unit = '$unit_id' and water_meter_details.property_name = '$property_id' order by water_meter_details.transactiontime desc;");
							$intcount = 0;
							
								while ($row = mysql_fetch_array($result_suppliers))
								{
									$intcount++;
									$id = $row['id'];
									$property_name = $row['property_name'];
									$location = $row['location'];
									$tenant_name = $row['tenant_name'];
									$location = $row['location'];
									$floor = $row['floor'];
									$previous_reading = $row['previous_reading'];
									$last_reading = $row['last_reading'];
									$tenant_status = $row['tenant_status'];
									$cost = $row['cost'];
									$month = $row['month'];
									$year = $row['year'];
									$paid = $row['paid'];
									$block_occupied = $location.", ".$floor;
									$property_name = ucwords(strtolower($property_name));
									$block_occupied = ucwords(strtolower($block_occupied));
									
									if($paid == '1'){
										$payStatus = "<font color='green'>Bill Paid</font>";
									}
									else{
										$payStatus = "<font color='red'>Bill Not Paid</font>";
									}
									if ($intcount % 2 == 0) {
										$display= '<tr bgcolor = #F0F0F6>';
									}
									else {
										$display= '<tr>';
									}
									echo $display;
										echo "<td valign='top'>$intcount</td>";
										echo "<td valign='top'>$property_name</td>";
										echo "<td valign='top'>$block_occupied</td>";
										echo "<td valign='top'>".number_format($previous_reading, 0)."</td>";
										echo "<td valign='top'>".number_format($last_reading, 0)."</td>";	
										echo "<td valign='top'>KES ".number_format($cost, 2)."</td>";
										echo "<td valign='top'>$month</td>";
										echo "<td valign='top'>$year</td>";
										echo "<td valign='top'>$payStatus</td>";
										if($paid == '1'){
											echo "<td valign='top' align='center'><a title = 'Edit Detail'><img src='images/edit.png' width='35px'></a></td>";
											echo "<td valign='top' align='center'><a title = 'Delete $property_name Details'><img src='images/delete.png' width='25px'></a></td>";
										}
										else{
											echo "<td valign='top' align='center'><a title = 'Edit Meter Reading' href='meter_reading_edit.php?reading_id=$id&tenant_id=$tenant_id&property_id=$property_id&unit_id=$unit_id&action=edit'><img src='images/edit.png' width='35px'></a></td>";
											echo "<td valign='top' align='center'><a title = 'Delete $property_name Details' href='water_payment_list.php?id=$id&action=delete'><img src='images/delete.png' width='25px'></a></td>";
										}
									echo "</tr>";	
								}
							?>
						</tbody>
						<tfoot bgcolor="#E6EEEE">
							<tr>
								<th>#</th>
								<th>Property Name</th>
								<th>Property Unit</th>
								<th>Previous Reading</th>
								<th>Current Reading</th>
								<th>Cost</th>
								<th>Month</th>
								<th>Year</th>
								<th>Pay Status</th>
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
