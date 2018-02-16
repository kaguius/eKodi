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
		$rent_month = "";
		$rent_year = "";
		$transactiontime = date("Y-m-d G:i:s");
		$page_title = "Rent Report";
		include_once('includes/header.php');
		if (!empty($_GET)){	
			$report_start_date = $_GET['report_start_date'];
			$report_end_date = $_GET['report_end_date'];
			$property_id = $_GET['property_name'];
		} 
		if ($report_start_date != "" || $report_end_date != "" || $property_name != ""){
			$page_title = "Detailed Rent Report";
			$result_tender = mysql_query("select month from calender where id = '$deposit_month'");
			while ($row = mysql_fetch_array($result_tender))
			{
				$actual_deposit_month = $row['month'];
			}
		$report_start_date = date('Y-m-d', strtotime(str_replace('-', '/', $report_start_date)));
		$report_start_month = date('m',strtotime($report_start_date));
		$report_start_year = date('Y',strtotime($report_start_date));
		$report_end_date = date('Y-m-d', strtotime(str_replace('-', '/', $report_end_date)));
		$report_end_month = date('m',strtotime($report_end_date));
		$report_end_year = date('Y',strtotime($report_end_date));
		$report_start_date = date("d M, Y", strtotime($report_start_date));
		$report_end_date = date("d M, Y", strtotime($report_end_date));
		?>
			<div id="page">
				<div id="content">
					<div class="post">
						<h2><?php echo $page_title ?> | e-kodi</h2>
							<strong>Reporting Date:</strong> <?php echo $report_start_date ." to ".$report_end_date ?><br />
							<table width="100%" border="0" cellspacing="2" class="display" cellpadding="2" id="example" >
								<thead bgcolor="#E6EEEE">
									<tr>
										<th>#</th>
											<th>Property</th>
											<th>Unit</th>
											<th>Tenant</th>
											<th>Comms</th>	
											<th>Rent</th>
											<th>Garbage</th>
											<th>Parking</th>
											<th>Expected</th>					
											<th>Penalties</th>
											<th>Water</th>
											<th>Commission</th>
											<th>Total</th>						
									</tr>
								</thead>
								<tbody>
								<?php
								if($property_manager_id == 0){
									$result_suppliers = mysql_query("select property_details.property_name, payments.id, (property_item.id)unit_id, (tenants.id)tenant_id, property_details.property_name, property_details.commission, property_item.floor, property_item.location, tenants.tenant_name, payment, payments.garbage_fee, rent_month, rent_year, payments.water_pay, payments.parking_fee, payments.transactiontime, actual_penalties from payments inner join property_item on property_item.id = payments.unit_id inner join property_details on property_item.property_listing = property_details.id inner join tenants on tenants.id = payments.tenant_id where rent_month between '$report_start_month' and '$report_end_month' and rent_year between '$report_end_year' and '$report_end_year' and category='2' and property_item.property_listing = '$property_id' order by property_details.property_name, tenant_name asc");
								}
								else{
									$result_suppliers = mysql_query("select property_details.property_name, payments.id, (property_item.id)unit_id, (tenants.id)tenant_id, property_details.property_name, property_details.commission, property_item.floor, property_item.location, tenants.tenant_name, payment, payments.garbage_fee, rent_month, rent_year, payments.water_pay, payments.transactiontime, payments.parking_fee, actual_penalties from payments inner join property_item on property_item.id = payments.unit_id inner join property_details on property_item.property_listing = property_details.id inner join tenants on tenants.id = payments.tenant_id where rent_month between '$report_start_month' and '$report_end_month' and rent_year between '$report_end_year' and '$report_end_year' and property_details.manager_id = '$property_manager_id' and category='2' and property_item.property_listing = '$property_id' order by property_details.property_name, tenant_name asc");
								}
									
									$intcount = 0;
									$total_rent = 0;
									$total_service = 0;
									$total_expected = 0;
									$total_commission = 0;
									$total_penalties = 0;
									$total_water = 0;
									$total_parking_fee = 0;
									$total_pay = 0;
									while ($row = mysql_fetch_array($result_suppliers))
									{
										$intcount++;
										$id = $row['id'];
										$property_name = $row['property_name'];
										$property_name = $row['property_name'];
										$property_name = ucwords(strtolower($property_name));	
										$unit_id = $row['unit_id'];
										$tenant_id = $row['tenant_id'];
										$commission = $row['commission'];
										$floor = $row['floor'];
										$location = $row['location'];
										$garbage_fee = $row['garbage_fee'];
										$block_occupied = $location;
										$tenant_name = $row['tenant_name'];
										$tenant_name = ucwords(strtolower($tenant_name));	
										$payment = $row['payment'];
										$parking_fee = $row['parking_fee'];
										$water_pay = $row['water_pay'];
										$actual_penalties = $row['actual_penalties'];
										$transactiontime = $row['transactiontime'];
										$banked = $row['banked'];
										$rent_expected = $payment + $service_charge + $parking_fee;
										
										$result = mysql_query("select comm_paid from comms_table where payment_id = '$id'");
										while ($row = mysql_fetch_array($result))
										{
											$comms_paid = $row['comm_paid'];
										}
										
										$total = ($payment + $garbage_fee + $water_pay + $actual_penalties) - $comms_paid;
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
												echo "<td valign='top'>$tenant_name</td>";
												echo "<td valign='top' align='center'>$commission%</td>";	
												echo "<td valign='top' align='right'>".number_format($payment, 2)."</td>";
												echo "<td valign='top' align='right'>".number_format($garbage_fee, 2)."</td>";
												echo "<td valign='top' align='right'>".number_format($parking_fee, 2)."</td>";
												echo "<td valign='top' align='right'>".number_format($rent_expected, 2)."</td>";
												echo "<td valign='top' align='right'>".number_format($actual_penalties, 2)."</td>";
												echo "<td valign='top' align='right'>".number_format($water_pay, 2)."</td>";
												echo "<td valign='top' align='right'>(".number_format($comms_paid, 2).")</td>";
												echo "<td valign='top' align='right'>".number_format($total, 2)."</td>";	
											
										echo "</tr>";	
										$total_rent = $total_rent + $payment;
										$total_service = $total_service + $service_charge;
										$total_expected = $total_expected + $rent_expected;
										$total_commission = $total_commission + $comms_paid;
										$total_penalties = $total_penalties + $actual_penalties;
										$total_water = $total_water + $water_pay;
										$total_pay = $total_pay + $total;
										$total_parking_fee = $total_parking_fee + $parking_fee;
										}
									?>
									</tbody>
									<tr bgcolor = '#E6EEEE'>
										<td colspan='5'><strong>Total Payment</strong></td>
											<td align='right'><strong><?php echo number_format($total_rent, 2) ?></strong></td>
											<td align='right'><strong><?php echo number_format($total_service, 2) ?></strong></td>
											<td align='right'><strong><?php echo number_format($total_parking_fee, 2) ?></strong></td>
											<td align='right'><strong><?php echo number_format($total_expected, 2) ?></strong></td>
											<td align='right'><strong><?php echo number_format($total_penalties, 2) ?></strong></td>
											<td align='right'><strong><?php echo number_format($total_water, 2) ?></strong></td>
											<td align='right'><strong>(<?php echo number_format($total_commission, 2) ?>)</strong></td>
											<td align='right'><strong><?php echo number_format($total_pay, 2) ?></strong></td>
									</tr>
									
									<tfoot bgcolor="#E6EEEE">
										<tr>
											<th>#</th>
											<th>Property</th>
											<th>Unit</th>
											<th>Tenant</th>
											<th>Comms</th>	
											<th>Rent</th>
											<th>Service</th>
											<th>Parking</th>
											<th>Expected</th>					
											<th>Penalties</th>
											<th>Water</th>
											<th>Commission</th>
											<th>Total</th>
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
		else{
		?>
		<div id="page">
			<div id="content">
				<div class="post">
					<h2><?php echo $page_title ?> | e-kodi</h2>
						<form id="frmDeptCategories" name="frmDeptCategories" method="GET" action="rent_report.php">
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
								<tr>
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
