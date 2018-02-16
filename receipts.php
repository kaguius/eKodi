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
		$tax_percent = 0/100;
		$rent_month = "";
		$rent_year = "";
		$property_name = "";
		$actual_rent_month = date("m");
		$actual_rent_year = date("Y");
		$transactiontime = date("Y-m-d G:i:s");
		$page_title = "Print Receipts";
		include_once('includes/header.php');
		if (!empty($_GET)){	
			$report_start_date = $_GET['report_start_date'];
			$report_end_date = $_GET['report_end_date'];
			$property_id = $_GET['property_name'];
		} 
		if ($report_start_date != "" || $report_end_date != "" || $property_name != ""){
			
			$result_tender = mysql_query("select month from calender where id = '$rent_month'");
			while ($row = mysql_fetch_array($result_tender))
			{
				$actual_rent_month = $row['month'];
			}
			//$rent_period = date("$rent_month, $rent_year");
			$sql = mysql_query("select id, property_name, water_cost, property_owner, property_type, location, propety_contact, commission, taxes from property_details where id = '$property_id'");
			while($row = mysql_fetch_array($sql)) {
				$property_name = $row['property_name']; 
				$property_owner = $row['property_owner']; 
				$location = $row['location']; 
				$property_contact = $row['propety_contact']; 
				$property_commission = $row['commission'];
				$property_type = $row['property_type'];
				$taxes = $row['taxes']; 
				$water_cost = $row['water_cost'];    
			}
			$report_start_date = date('Y-m-d', strtotime(str_replace('-', '/', $report_start_date)));
			$report_start_month = date('m',strtotime($report_start_date));
			$report_start_year = date('Y',strtotime($report_start_date));
			$report_end_date = date('Y-m-d', strtotime(str_replace('-', '/', $report_end_date)));
			$report_end_month = date('m',strtotime($report_end_date));
			$report_end_year = date('Y',strtotime($report_end_date));
			$report_start_date = date("d M, Y", strtotime($report_start_date));
			$report_end_date = date("d M, Y", strtotime($report_end_date));
				//printing out Deposit Statements
				$page_title = "Print Receipts";
				?>
				<div id="page">
					<div id="content">
						<div class="post">
							<h2><?php echo $page_title ?> | e-kodi</h2>
						
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
										$result_suppliers = mysql_query("select property_item.property_listing, payments.id, (property_item.id)unit_id, (tenants.id)tenant_id, property_details.property_name, property_details.commission, property_item.floor, property_item.location, tenants.tenant_name, payment, payments.service_charge, property_item.rent, actual_penalties, water_pay, payments.parking_fee, payments.garbage_fee, payments.expected, payments.received, payments.balance, payments.display_balance, payments.water_deposit, payments.elec_deposit, ref_id_date, rent_month, rent_year, payments.category, payments.transactiontime from payments inner join property_item on property_item.id = payments.unit_id inner join property_details on property_item.property_listing = property_details.id inner join tenants on tenants.id = payments.tenant_id where pay_month between '$report_start_month' and '$report_end_month' and pay_year between '$report_start_year' and '$report_end_year' and property_item.property_listing = '$property_id' order by property_details.property_name, tenants.tenant_name, category asc");
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
											
											$display_rent = $payment;
											if($category == 1) {
												$sub_total = $display_rent;
											}
											else{
												$sub_total = $rent + $garbage_fee + $water_pay + $balance;
											}
											$sub_total_penanlties = $sub_total + $actual_penalties;
											$total_deposit = $deposit + $water_deposit + $elec_deposit;									
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
												echo "<td valign='top' align='right'>".number_format($total_deposit, 0)."</td>";
												echo "<td valign='top'>$block_occupied</td>";
												echo "<td valign='top'>$tenant_name</td>";
												if($category == 1) {
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
												echo "<td valign='top' align='right'><a href='print_receipt.php?id=$id&property_id=$property_id'><img src='images/receipts.jpg' height='40px'></a></td>";
												
											echo "</tr>";
											$previous_balance = 0;
											$balance = 0;
											$total_rent = $total_rent + $display_rent;
											$total_service = $total_service + $service_charge;
											$total_expected = $total_expected + $rent_expected;
											$total_commission = $total_commission + $comms_paid;
											$total_penalties = $total_penalties + $actual_penalties;
											$total_water = $total_water + $water_pay;
											$display_ttotal = $display_ttotal + $display_total;
											$total_pay = $total_pay + $total;
											$total_expected = $total_expected + $expected;
											$total_received = $total_received + $received;
											$total_parking_fee = $total_parking_fee + $parking_fee;
											$total_garbage_fee = $total_garbage_fee + $garbage_fee;
											$total_balance = $total_balance + $balance;
											$total_water_deposit = $total_water_deposit + $water_deposit;
											$total_elec_deposit = $total_elec_deposit + $elec_deposit;
											$total_tpayment = $total_tpayment + $total_payment;
											$total_previous_balance = $total_previous_balance + $display_balance;
											}
										?>
										</tbody>
								</table>
							</div>
						</div>
						<br class="clearfix" />
					</div>
				</div>
		<?php
		}
		else{
		?>
		<div id="page">
			<div id="content">
				<div class="post">
					<h2><?php echo $page_title ?> | e-kodi</h2>
						<form id="frmDeptCategories" name="frmDeptCategories" method="GET" action="receipts.php">
							<table border="0" width="100%">
								<tr>
									<td valign='top'>Select Start Date *</td>
									<td valign='top'>
										<input title="Enter Start Date" value="<?php echo $report_start_date ?>" id="report_start_date" name="report_start_date" type="text" maxlength="100" class="main_input" size="25" />
									</td>
									<td valign='top'>Select End Date *</td>
									<td valign='top'>
										<input title="Enter End Date" value="<?php echo $report_end_date ?>" id="report_end_date" name="report_end_date" type="text" maxlength="100" class="main_input" size="25" />
									</td>
								</tr>
								<!--<tr >
									<td width="30%">Select Month *</td>
									<td width="70%">
										<select name="month" id="month">
											<option value="">&nbsp;</option>
											<option value="1">January</option>
											<option value="2">February</option>
											<option value="3">March</option>
											<option value="4">April</option>
											<option value="5">May</option>
											<option value="6">June</option>
											<option value="7">July</option>
											<option value="8">August</option>
											<option value="9">September</option>
											<option value="10">October</option>
											<option value="11">November</option>
											<option value="12">December</option>
										</select>
									</td>
								</tr>
								<tr>
								<td>Select Year: *</td>
								<td>
									<select name="year" id="year">
										<option>&nbsp;</option>
										<?php
											$sql = mysql_query("select distinct rent_year from payments order by rent_year asc");
											while($row = mysql_fetch_array($sql)) {
												$rent_year = $row['rent_year'];
												//echo "$county";
												echo "<option value='$rent_year'>".$rent_year."</option>"; 
											}
										?>
										</select>
									</td>
								</tr>-->
								<td>Select Property: *</td>
								<td>
									<select name="property_name" id="property_name">
										<option>&nbsp;</option>
										<?php
										if($property_manager_id == 0){
											$sql = mysql_query("select id, property_name from property_details order by property_name asc");
										}
										else {
											$sql = mysql_query("select id, property_name from property_details where manager_id = '$property_manager_id' order by property_name asc");
										}
											while($row = mysql_fetch_array($sql)) {
												$id = $row['id'];
												$property_name = $row['property_name'];
												$string = substr($property_name, 0, 2);
												if($string == 'ZA'){
													$property = 'Zawadi Apartments';
													$property_name = $property.": ".$property_name;
												}
												else{
													$property_name = $property_name;
												}
												//echo "$county";
												echo "<option value='$id'>".$property_name."</option>"; 
											}
										?>
										</select>
									</td>
								</tr>
								<tr>
									<td colspan="3"><button name="btnNewCard" id="button">Submit</button></td>
								</tr>
							</table>
						</form>
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
