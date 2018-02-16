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
		$tenant_id = "";
		$transactiontime = date("Y-m-d G:i:s");
		$page_title = "Tenant Statement Report";
		include_once('includes/header.php');
		if (!empty($_GET)){	
			$tenant_id = $_GET['tenant_id'];
			$property_id = $_GET['property_id'];
		} 
		if ($tenant_id != "" || $property_id != ""){
			$sql = mysql_query("select tenant_code, tenant_name, mailing_address, phone_number, email_address from tenants where id = '$tenant_id'");
			while($row = mysql_fetch_array($sql)) {
				$tenant_code = $row['tenant_code'];
				$tenant_name = $row['tenant_name']; 
				$mailing_address = $row['mailing_address']; 
				$phone_number = $row['phone_number']; 
				$email_address = $row['email_address']; 
			}
			
			$sql = mysql_query("select id, property_name, property_owner, water_cost, location, propety_contact, lr_number from property_details where id = '$property_id'");
			while($row = mysql_fetch_array($sql)) {
				$property_name = $row['property_name']; 
				$property_owner = $row['property_owner']; 
				$location = $row['location']; 
				$propety_contact = $row['propety_contact']; 
				$lr_number = $row['lr_number'];
				$water_cost = $row['water_cost'];   
			} 
			$page_title = "Tenant Statement Report";
			?>
			<div id="page">
				<div id="content">
					<div class="post">
						<h2><?php echo $page_title ?> | e-kodi</h2>
							<strong>You are here:</strong> &raquo; <a href="index.php">Home</a> &raquo; <a href="property_tenant_listing.php">Tenants</a> &raquo; <a href="property_tenant_listing.php">Property Tenant Listing</a> &raquo; Tenant Listing for Property <?php echo $property_name ?> &raquo; Tenant Statement<br />
							<p align="center"><h2>STATEMENT OF ACCOUNT</h2>
							LR. NUMBER: <?php echo $lr_number ?></p>
							<table width="100%" border="0" cellspacing="2" cellpadding="2">
								<tr>
								<td>										
										<h3>Property Details</h3>
										<p><strong>Landlord Name: </strong><?php echo $property_owner ?><br />
										<strong>Property Name: </strong><?php echo $property_name ?><br />
										<strong>Property Location: </strong><?php echo $location ?><br />
										<strong>Property Contact: </strong><?php echo $propety_contact ?><p />
									</td>
									<td>
										<h3>Tenant Details</h3>
										<p><strong>Tenant Name: </strong><?php echo $tenant_name ?><br />
										<strong>Tenant Code: </strong><?php echo $tenant_code ?><br />
										<strong>Address: </strong><?php echo $mailing_address ?><br />
										<strong>Property Contact: </strong><?php echo $phone_number ?><p />
									</td>
								</tr>
							</table>
							<h3>Property Payments</h3>
							<table width="100%ight" border="0" cellspacing="2" cellpadding="2" >
									<thead bgcolor="#E6EEEE">
										<tr>
											<th>Deposit</th>
											<th>Unit</th>
											<th>Tenant</th>
											<th>Category</th>
											<th>Rent</th>
											<th>Garbage</th>
											<th>&nbsp;</th>
											<th>Cur Rd</th>
											<th>Prev Rd</th>
											<th>Units</th>
											<th>Rate</th>
											<th>Water</th>
											<th>&nbsp;</th>
											<th>Prv Bal</th>
											<th>Total</th>
											<th>Penalties</th>
											<th>Total</th>
											<th>Received</th>
											<th>Date</th>						
											<th>Bal</th>			
										</tr>
									</thead>
									<tbody>
									<?php
										$result_suppliers = mysql_query("select property_item.property_listing, payments.id, (property_item.id)unit_id, (tenants.id)tenant_id, property_details.property_name, property_details.commission, property_item.floor, property_item.location, tenants.tenant_name, payment, payments.service_charge, property_item.rent, actual_penalties, water_pay, payments.parking_fee, payments.garbage_fee, payments.expected, payments.received, payments.balance, payments.display_balance, payments.water_deposit, payments.elec_deposit, ref_id_date, rent_month, rent_year, payments.category, payments.transactiontime from payments inner join property_item on property_item.id = payments.unit_id inner join property_details on property_item.property_listing = property_details.id inner join tenants on tenants.id = payments.tenant_id where property_item.property_listing = '$property_id' and tenant_id = '$tenant_id' order by ref_id_date, property_details.property_name, tenants.tenant_name, category asc");
										$intcount = 0;
										$total_deposit_sum = 0;
										$display_rent_sum = 0;
										$rent_sum = 0;
										$total_rent_sum = 0;
										$garbage_fee_sum = 0;
										$units_used_sum = 0;
										$balance_sum = 0;
										$previous_balance_sum = 0;
										while ($row = mysql_fetch_array($result_suppliers))
										{
											$intcount++;
											$id = $row['id'];
											$property_name = $row['property_name'];
											$property_listing = $row['property_listing'];
											$unit_id = $row['unit_id'];
											$tenant_id = $row['tenant_id'];
											$commission = $row['commission'];	
											$category = $row['category'];
											$floor = $row['floor'];
											$location = $row['location'];
											$service_charge = $row['service_charge'];
											$block_occupied = "Unit: ".$location;
											$tenant_name = $row['tenant_name'];
											$payment = $row['payment'];
											$parking_fee = $row['parking_fee'];
											//$garbage_fee = $row['garbage_fee'];
											$water_deposit = $row['water_deposit'];
											$elec_deposit = $row['elec_deposit'];
											$water_pay = $row['water_pay'];
											$balance = $row['balance'];
											$display_balance = $row['display_balance'];
											$transactiontime = $row['transactiontime'];
											$actual_penalties = $row['actual_penalties'];
											$expected = $row['expected'];
											$received = $row['received'];
											$rent_month = $row['rent_month'];
											$rent_year = $row['rent_year'];
											$ref_id_date = $row['ref_id_date'];
											$ref_id_date = date("d M, Y", strtotime($ref_id_date));

											$result = mysql_query("select deposit, rent, garbage_fee from property_item where tenant = '$tenant_id'");
											while ($row = mysql_fetch_array($result))
											{
												$deposit = $row['deposit'];
												$rent = $row['rent'];
												$garbage_fee = $row['garbage_fee'];
											}

											$result = mysql_query("select previous_reading, last_reading from water_meter_details where month = '$rent_month' and year = '$rent_year' and tenant = '$tenant_id'");
											while ($row = mysql_fetch_array($result))
											{
												$previous_reading = $row['previous_reading'];
												$last_reading = $row['last_reading'];
												$units_used = $last_reading - $previous_reading;
												//$garbage_fee = $row['garbage_fee'];
											}

											//$expected = $exp_rent + $exp_garbage_fee + $exp_parking_fee + $exp_water_pay;
											
											
											//if($report_start_month != $actual_rent_month){
											//	$sql2 = mysql_query("select sum(display_balance)balance from payments where tenant_id = '$tenant_id' and category = '2' and pay_month <> '$actual_rent_month' or pay_year <> '$actual_rent_year' limit 1");
											//	while($row = mysql_fetch_array($sql2)) {
											//		$previous_balance = $row['balance'];
											//	}
											//}
											//else{
											//	$sql2 = mysql_query("select sum(display_balance)balance from payments where tenant_id = '$tenant_id' and category = '2' and pay_month <> $report_start_month' or pay_year <> '$report_start_year'");
											//	while($row = mysql_fetch_array($sql2)) {
											//		$previous_balance = $row['balance'];
											//	}
											//}
											$display_rent = $payment;
											if($category == 1) {
												$sub_total = $display_rent;
											}
											else{
												$sub_total = $rent + $garbage_fee + $water_pay + $balance;
											}
											$sub_total_penanlties = $sub_total + $actual_penalties;
											//$total_deposit = $deposit + $water_deposit + $elec_deposit;									
											$display_total = $display_rent + $water_pay + $parking_fee + $garbage_fee + $water_deposit + $elec_deposit;
											$total = $payment + $actual_penalties + $water_pay + $parking_fee + $garbage_fee + $water_deposit + $elec_deposit + $balance;
											$total_payment = $total + $balance;

											//$payment_expected = $payment - $service_charge;
											if ($intcount % 2 == 0) {
												$display= '<tr bgcolor = #F0F0F6>';
											}
											else {
												$display= '<tr>';
											}
											echo $display;
												//echo "<td valign='top' align='right'>".number_format($total_deposit, 0)."</td>";
											//	echo "<td valign='top'>$block_occupied</td>";
											//	echo "<td valign='top'>$tenant_name</td>";
												if($category == 1) {
													echo "<td valign='top' align='right'>".number_format($deposit, 0)."</td>";
													echo "<td valign='top'>$block_occupied</td>";
													echo "<td valign='top'>$tenant_name</td>";
													echo "<td valign='top'>Deposit</td>";	
													echo "<td valign='top' align='right'>".number_format($display_rent, 0)."</td>";
													echo "<td valign='top' align='right'>".number_format(0, 0)."</td>";
													echo "<td valign='top' align='right'>&nbsp;</td>";
													echo "<td valign='top' align='right'>".number_format(0, 0)."</td>";	
													echo "<td valign='top' align='right'>".number_format(0, 0)."</td>";
													echo "<td valign='top' align='right'>".number_format(0, 0)."</td>";
													echo "<td valign='top' align='right'>".number_format(0, 0)."</td>";
													echo "<td valign='top' align='right'>".number_format(0, 0)."</td>";
													echo "<td valign='top' align='right'>&nbsp;</td>";
												}
												else {
													echo "<td valign='top' align='right'>".number_format($deposit, 0)."</td>";
													echo "<td valign='top'>$block_occupied</td>";
													echo "<td valign='top'>$tenant_name</td>";
													echo "<td valign='top'>Rent</td>";
													echo "<td valign='top' align='right'>".number_format($rent, 0)."</td>";
													echo "<td valign='top' align='right'>".number_format($garbage_fee, 0)."</td>";
													echo "<td valign='top' align='right'>&nbsp;</td>";
													echo "<td valign='top' align='right'>".number_format($last_reading, 0)."</td>";	
													echo "<td valign='top' align='right'>".number_format($previous_reading, 0)."</td>";
													echo "<td valign='top' align='right'>".number_format($units_used, 0)."</td>";
													echo "<td valign='top' align='right'>".number_format($water_cost, 0)."</td>";	
													echo "<td valign='top' align='right'>".number_format($water_pay, 0)."</td>";
													echo "<td valign='top' align='right'>&nbsp;</td>";	
												}
												echo "<td valign='top' align='right'>".number_format($balance, 0)."</td>";
												
												echo "<td valign='top' align='right'>".number_format($sub_total, 0)."</td>";												
												
												echo "<td valign='top' align='right'>".number_format($actual_penalties, 0)."</td>";
												
												echo "<td valign='top' align='right'>".number_format($sub_total_penanlties, 0)."</td>";
												echo "<td valign='top' align='right'>".number_format($received, 0)."</td>";
												echo "<td valign='top' align='right'>$ref_id_date</td>";
													echo "<td valign='top' align='right'>".number_format($display_balance, 0)."</td>";
												
											echo "</tr>";
											$previous_balance = 0;
											//$balance = 0;
											$last_reading = 0;
											$previous_reading = 0;
											//$units_used = 0;
											
											//$display_rent_sum = $display_rent_sum + $display_rent;
											//$rent_sum = $rent_sum + $rent;
											//$total_rent_sum = $display_rent_sum + $rent_sum;
											if($category == 1) {
												$total_deposit_sum = $total_deposit_sum + $total_deposit;
												$display_rent_sum = $display_rent_sum + $display_rent;	
											}
											else{
												$total_deposit_sum = $total_deposit_sum + $total_deposit;
												$rent_sum = $rent_sum + $rent;
												$garbage_fee_sum = $garbage_fee_sum + $garbage_fee;
												$units_used_sum = $units_used_sum + $units_used;
												$water_pay_sum = $water_pay_sum + $water_pay;
											}
											$total_rent_sum = $display_rent_sum + $rent_sum;
											$balance_sum = $balance_sum + $display_balance;
											$previous_balance_sum = $previous_balance_sum + $balance;
											$sub_total_sum = $sub_total_sum + $sub_total;
											$actual_penalties_sum = $actual_penalties_sum + $actual_penalties;
											$sub_total_penanlties_sum = $sub_total_penanlties_sum + $sub_total_penanlties;
											$received_sum = $received_sum + $received;
										}
										?>
										</tbody>
										<tr bgcolor = '#E6EEEE'>
											
											<!--<td align='right'><strong><?php echo number_format($total_deposit_sum, 0) ?></strong></td>-->
											<td colspan='6'><strong>&nbsp;</strong></td>
											<td align='right'>&nbsp;</td>
											<td colspan='2'><strong>&nbsp;</strong></td>
											<td align='right'><strong><?php echo number_format($units_used_sum, 0) ?></strong></td>
											<td align='right'>&nbsp;</td>
											<td align='right'><strong><?php echo number_format($water_pay_sum, 0) ?></strong></td>
											<td align='right'>&nbsp;</td>
											<td align='right'>&nbsp;</td>
											<td align='right'>&nbsp;</td>				
											<td align='right'><strong><?php echo number_format($actual_penalties_sum, 0) ?></strong></td>
											<td align='right'>&nbsp;</td>
											<td align='right'><strong><?php echo number_format($received_sum, 0) ?></strong></td>
											<td align='right'>&nbsp;</td>
											<td align='right'><strong><?php echo number_format($display_balance, 0) ?></strong></td>
										</tr>
								</table>
						</div>
					</div>
					<br class="clearfix" />
				</div>
			</div>
		<?php
		}
	}
	include_once('includes/footer.php');
	?>
