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
		$result_suppliers = mysql_query("select id, property_code, commission, deposit, property_name from property_details where id = '$ID'");
		$intcount = 0;
		while ($row = mysql_fetch_array($result_suppliers))
		{
			$intcount++;
			$property_code = $row['property_code'];	
			$property_name = $row['property_name'];
			$deposit = $row['deposit'];
			$agent_commission = $row['commission'];	
			$property_name = ucwords(strtolower($property_name));
		}
		include_once('includes/header.php');
		?>		
		<div id="page">
			<div id="content">
				<div class="post">
					<h2><?php echo $page_title ?> | Property Name: <?php echo $property_name ?> | e-kodi</h2>
					<strong>You are here:</strong> &raquo; <a href="index.php">Home</a> &raquo; <a href="property_listings.php">Properties</a> &raquo; Property Units for <?php echo $property_name ?><br />
					<a href="create_property_item.php?id=<?php echo $ID ?>">+ Add new Units for <?php echo $property_name ?></a>
					<table width="100%" border="0" cellspacing="2" cellpadding="2" class="display" id="example">
						<thead bgcolor="#E6EEEE">
							<tr>
								<th>#</th>
								<th>Unit</th>
								<th>Floor</th>
								<th>Type</th>
								<th>Deposit</th>
								<th>Rent</th>
								<th>Garbage</th>
								<th>Parking</th>
								<th>Comms</th>
								<th>Status</th>
								<th>Edit</th>
							</tr>
						</thead>
						<tbody>
							<?php
							$result_suppliers = mysql_query("select id, location, floor, deposit, rent, service_charge, tenant, unit_type, parking_fee, garbage_fee from property_item where property_listing = '$ID'");
							$intcount = 0;
								while ($row = mysql_fetch_array($result_suppliers))
								{
									$intcount++;
									$property_block_id = $row['id'];
									$location = $row['location'];
									$floor = $row['floor'];
									$floor = ucwords(strtolower($floor));
									$deposit = $row['deposit'];
									$rent = $row['rent'];
									$parking_fee = $row['parking_fee'];
									$garbage_fee = $row['garbage_fee'];
									$tenant = $row['tenant'];
									$service_charge = $row['service_charge'];
									$unit_type = $row['unit_type'];
									$initial_deposit = $deposit * $rent;
									$commission = ($rent + $parking_fee) * ($agent_commission / 100);
									if ($intcount % 2 == 0) {
										$display= '<tr bgcolor = #F0F0F6>';
									}
									else {
										$display= '<tr>';
									}							
									echo $display;
										echo "<td valign='top'>$intcount.</td>";
										echo "<td valign='top'>$location</td>";
										echo "<td valign='top'>$floor</td>";
										echo "<td valign='top'>$unit_type</td>";
										echo "<td valign='top' align='right'>".number_format($deposit, 2)."</td>";
										echo "<td valign='top' align='right'>".number_format($rent, 2)."</td>";
										echo "<td valign='top' align='right'>".number_format($garbage_fee, 2)."</td>";
										echo "<td valign='top' align='right'>".number_format($parking_fee, 2)."</td>";
										echo "<td valign='top' align='right'>".number_format($commission, 2)."</td>";
										if($tenant == 0){											
											echo "<td valign='top' align='center'><a href='add_tenant.php?id=$property_block_id&property_id=$ID' title='Vacant: Assign a Tenant'><img src='images/occupied.png' width='35px'></a></td>";
										}
										else{
											echo "<td valign='top' align='center'><a href='tenant_details.php?id=$tenant' title='View Tenant Details'><img src='images/vacant.png' width='35px'></a></td>";
										}
										echo "<td valign='top' align='center'><a title = 'Edit Detail' href='create_property_item.php?property_item=$property_block_id&id=$ID&action=edit'><img src='images/edit.png' width='35px'></a></td>";
									echo "</tr>";
									$commission = 0;
								}
							?>
						</tbody>
						<tfoot bgcolor="#E6EEEE">
							<tr>
								<th>#</th>
								<th>Unit</th>
								<th>Floor</th>
								<th>Type</th>
								<th>Deposit</th>
								<th>Rent</th>
								<th>S.C.</th>
								<th>Parking</th>
								<th>Comms</th>
								<th>Status</th>
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
