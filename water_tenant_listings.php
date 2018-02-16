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
		$page_title = "Tenant Listings";
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
			$property_id = $_GET['property_name'];
		}
		$result = mysql_query("select id, property_name, water_cost from property_details where id = '$property_id'");
		while ($row = mysql_fetch_array($result))
		{
			$property_id = $row['id'];
			$property_name = $row['property_name'];
			$water_cost  = $row['water_cost'];
			$property_name = ucwords(strtolower($property_name));
		}
		include_once('includes/header.php');
		?>		
		<div id="page">
			<div id="content">
				<div class="post">
					<h2><?php echo $page_title ?> | e-kodi</h2>
					<strong>You are here:</strong> &raquo; <a href="index.php">Home</a> &raquo; <a href="property_tenant_listing.php">Tenants</a> &raquo; <a href="property_tenant_listing.php">Property Tenant Listing</a> &raquo; Tenant Listing for Property <?php echo $property_name ?><br />
					<table width="100%" border="0" cellspacing="2" cellpadding="2" class="display" id="example">
						<thead bgcolor="#E6EEEE">
							<tr>
								<th>#</th>
								<th>Code</th>
								<th>Unit</th>
								<th>Tenant</th>
								<th>Phone</th>
								<th>Cost</th>
								<th>Reading</th>
								<th>Payment</th>
							</tr>
						</thead>
						<tbody>
						<?php
							$result_suppliers = mysql_query("select tenants.id, tenant_code, property_details.property_name, (property_item.id)unit_id, property_item.location, property_item.floor, tenant_name, mailing_address, phone_number, tenants.email_address, next_kin, next_kin_contact, tenant_status.tenant_status, tenants.transactiontime from tenants inner join property_details on property_details.id = tenants.property_listing inner join property_item on property_item.id = tenants.property_block inner join tenant_status on tenant_status.id = tenants.tenant_status where tenants.property_listing = '$property_id' order by tenant_status.id, unit_id, tenant_name asc");
							$intcount = 0;
								while ($row = mysql_fetch_array($result_suppliers))
								{
									$intcount++;
									$id = $row['id'];
									$tenant_code = $row['tenant_code'];
									$tenant_name = $row['tenant_name'];
									$location = $row['location'];
									$unit_id = $row['unit_id'];
									$floor = $row['floor'];
									$phone_number = $row['phone_number'];
									$tenant_status = $row['tenant_status'];
									$transactiontime = $row['transactiontime'];
									$block_occupied = $location.", ".$floor;
									$tenant_name = ucwords(strtolower($tenant_name));
									$block_occupied = ucwords(strtolower($block_occupied));
									if($tenant_status == "In-House"){
										$tenant_status = "<font color='green'>$tenant_status</font>";
									}
									else{
										$tenant_status = "<font color='red'>$tenant_status</font>";
									}
									if ($intcount % 2 == 0) {
										$display= '<tr bgcolor = #F0F0F6>';
									}
									else {
										$display= '<tr>';
									}
									echo $display;
										echo "<td valign='top'>$intcount</td>";
										echo "<td valign='top'><a href='tenant_details.php?id=$id' title='Tenant Details'>$tenant_code</a></td>";
										echo "<td valign='top'>$block_occupied</td>";
										echo "<td valign='top'>$tenant_name</td>";
										echo "<td valign='top'>$phone_number</td>";	
										echo "<td valign='top' align='right'>KES ".number_format($water_cost, 2)."</td>";
										echo "<td valign='top' align='center'><a title = 'Enter meter reading for $tenant_name' href='meter_reading.php?tenant_id=$id&property_id=$property_id&unit_id=$unit_id'><img src='images/water.jpg' width='25px'></a></td>";
										echo "<td valign='top' align='center'><a title = 'View Payment details for $tenant_name' href='water_payment_list.php?tenant_id=$id&property=$property_id&unit_id=$unit_id'><img src='images/payment.jpg' width='25px'></a></td>";
									echo "</tr>";	
								}
							?>
						</tbody>
						<tfoot bgcolor="#E6EEEE">
							<tr>
								<th>#</th>
								<th>Code</th>
								<th>Tenant</th>
								<th>Unit</th>
								<th>Phone</th>
								<th>Cost</th>
								<th>Reading</th>
								<th>Payment</th>
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
