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
		$page_title = "Tenant Payment History";
		include ("includes/core_functions.php");	
		include_once('includes/db_conn.php');
		$transactiontime = date("Y-m-d G:i:s");	
		$rent_period = date("F, Y");
		$rent_day = date("d");
		$rent_month = date("m");
		$rent_year = date("Y");
		$rent_payment = "";
		if (!empty($_GET)){	
			$tenant_id = $_GET['tenant_id'];
			$unit_id = $_GET['unit_id'];
			$payment_id = $_GET['payment_id'];
			$action = $_GET['action'];

			if($action=='delete'){
				$sql5="delete from payments where id = '$payment_id'";	
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
		$result_suppliers = mysql_query("select tenant_code, tenant_name from tenants where id = '$tenant_id'");
		while ($row = mysql_fetch_array($result_suppliers))
		{
			$tenant_code = $row['tenant_code'];
			$tenant_name = $row['tenant_name'];
		}
		$result = mysql_query("select property_details.id, property_details.property_name, property_item.location, floor from property_item inner join property_details on property_details.id = property_item.property_listing where property_item.id = '$unit_id'");
		while ($row = mysql_fetch_array($result))
		{
			$property_id = $row['id'];
			$property_name = $row['property_name'];
			$location = $row['location'];
		}
		
		include_once('includes/header.php');
		?>		
		<div id="page">
			<div id="content">
				<div class="post">
					<h2><?php echo $page_title ?> | e-kodi</h2>
					<strong>You are here:</strong> &raquo; <a href="index.php">Home</a> &raquo; <a href="property_tenant_listing_payment.php">Rent</a> &raquo; <a href="property_tenant_listing_payment.php">Property Listing Payment</a> &raquo; Tenant Payment for Property <?php echo $property_name ?><br />
					<form id="frmCreatePropertyItem" name="frmCreatePropertyItem" method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
					<table width="100%" border="0" cellspacing="2" cellpadding="2" class="display" id="">				
						<thead bgcolor="#E6EEEE">
							<tr>
								<th>Property</th>
								<th>Name</th>						
								<th>Rent</th>
								<th>Garbage</th>
								<th>Parking</th>
								<th>Water</th>
								<th>Total</th>
								<th>Bal</th>
								<th>Penalties</th>
								<th>Expected</th>
								<th>Collected</th>
								<th>Balance</th>
								<th>Date</th>
								<th>Edit</th>
								<th>Delete</th>
							</tr>
						</thead>
						<tbody>
						<?php
							$result_suppliers = mysql_query("select id, unit_id, tenant_id, expected, received, payment, service_charge, actual_penalties, water_pay, parking_fee, garbage_fee, water_deposit, elec_deposit, balance, display_balance, rent_month, rent_year, ref_id, ref_id_date, category, payment_type from payments where unit_id = '$unit_id' and tenant_id = '$tenant_id' order by ref_id_date desc");
							$intcount = 0;							
							$NumberOfRows = mysql_num_rows($result_suppliers);
							if($NumberOfRows == 0){
								echo "<tr>";
									echo "<td valign='top' colspan='7'><strong>No Payments have been done thus far.</strong></td>";
								echo "</tr>";
							}
							else{
								while ($row = mysql_fetch_array($result_suppliers))
								{
									$intcount++;
									$id = $row['id'];							
									$expected = $row['expected'];
									$received = $row['received'];
									$payment = $row['payment'];
									$service_charge = $row['service_charge'];
									$actual_penalties = $row['actual_penalties'];
									$water_pay = $row['water_pay'];
									$parking_fee = $row['parking_fee'];
									$garbage_fee = $row['garbage_fee'];
									$water_deposit = $row['water_deposit'];
									$elec_deposit = $row['elec_deposit'];
									$balance = $row['balance'];
									$display_balance = $row['display_balance'];
									$ref_id = $row['ref_id,'];
									$ref_id_date = $row['ref_id_date'];
									$category = $row['category'];
									$payment_type = $row['payment_type'];
									$total= $payment + $garbage_fee + $parking_fee + $water_pay;

									if ($intcount % 2 == 0) {
										$display= '<tr bgcolor = #F0F0F6>';
									}
									else {
										$display= '<tr>';
									}

									echo $display;
										echo "<td valign='top'>$property_name</td>";
										echo "<td valign='top'>$tenant_name</td>";
										echo "<td valign='top'>".number_format($payment, 2)."</td>";
										echo "<td valign='top'>".number_format($garbage_fee, 2)."</td>";
										echo "<td valign='top'>".number_format($parking_fee, 2)."</td>";
										echo "<td valign='top'>".number_format($water_pay, 2)."</td>";
										echo "<td valign='top'>".number_format($total, 2)."</td>";
										echo "<td valign='top'>".number_format($balance, 2)."</td>";
										echo "<td valign='top'>".number_format($actual_penalties, 2)."</td>";
										echo "<td valign='top'>".number_format($expected, 2)."</td>";
										echo "<td valign='top'>".number_format($received, 2)."</td>";
										echo "<td valign='top'>".number_format($display_balance, 2)."</td>";
										echo "<td valign='top'>$ref_id_date</td>";
										echo "<td valign='top' align='center'><a title = 'Edit Meter Reading' href='tenant_payment_edit.php?tenant_id=$tenant_id&unit_id=$unit_id&payment_id=$id&property_id=$property_id&action=edit'><img src='images/edit.jpg' width='35px'></a></td>";
										echo "<td valign='top' align='center'><a title = 'Delete $property_name Details' href='tenant_payment_history.php?payment_id=$id&action=delete'><img src='images/delete.png' width='25px'></a></td>";
									echo "</tr>";	
								}
							}							
							?>
							</tbody>
							<tfoot bgcolor="#E6EEEE">
								<tr>
									<th>Property</th>
									<th>Name</th>						
									<th>Rent</th>
									<th>Garbage</th>
									<th>Parking</th>
									<th>Water</th>
									<th>Total</th>
									<th>Bal</th>
									<th>Penalties</th>
									<th>Expected</th>
									<th>Collected</th>
									<th>Balance</th>
									<th>Date</th>
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
?>
<?php
	include_once('includes/footer.php');
?>									
