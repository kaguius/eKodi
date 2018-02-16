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
		$page_title = "Payments Receipts Report";
		include_once('includes/header.php');
		if (!empty($_GET)){	
			$report_start_date = $_GET['report_start_date'];
			$report_end_date = $_GET['report_end_date'];
			$property_id = $_GET['property_name'];
		} 
		if ($report_start_date != "" || $report_end_date != "" || $property_name != ""){
			$page_title = "Detailed Payments Receipts Report";
			$result_tender = mysql_query("select month from calender where id = '$rent_month'");
			while ($row = mysql_fetch_array($result_tender))
			{
				$actual_rent_month = $row['month'];
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
							Reporting Date: <?php echo $report_start_date ." to ".$report_end_date ?><br />
							<table width="100%" border="0" cellspacing="2" class="display" cellpadding="2" id="example" >
								<thead bgcolor="#E6EEEE">
									<tr>
										<th>#</th>
										<th>Property</th>
										<th>Unit</th>
										<th>Tenant</th>							
										<th>Payment Type</th>
										<th>Date</th>
										<th>Transactiontime</th>
										<th>Payment</th>						
									</tr>
								</thead>
								<tbody>
								<?php
								if($property_manager_id == 0){
									$result_suppliers = mysql_query("select property_details.property_name, payments.id, (property_item.id)unit_id, (tenants.id)tenant_id, property_details.property_name, property_details.commission, property_item.floor, property_item.location, tenants.tenant_name, payment, payments.service_charge, payments.water_pay, payments.transactiontime, actual_penalties, payment_type, payments.received, payments.ref_id_date from payments inner join property_item on property_item.id = payments.unit_id inner join property_details on property_item.property_listing = property_details.id inner join tenants on tenants.id = payments.tenant_id where rent_month between '$report_start_month' and '$report_end_month' and rent_year between '$report_start_year' and '$report_end_year' and property_item.property_listing = '$property_id' order by payments.ref_id_date asc");
								}
								else{
									$result_suppliers = mysql_query("select property_details.property_name, payments.id, (property_item.id)unit_id, (tenants.id)tenant_id, property_details.property_name, property_details.commission, property_item.floor, property_item.location, tenants.tenant_name, payment, payments.service_charge, payments.water_pay, payments.transactiontime, actual_penalties, payment_type, payments.received, payments.ref_id_date from payments inner join property_item on property_item.id = payments.unit_id inner join property_details on property_item.property_listing = property_details.id inner join tenants on tenants.id = payments.tenant_id where rent_month between '$report_start_month' and '$report_end_month' and rent_year between '$report_start_year' and '$report_end_year' and property_details.manager_id = '$property_manager_id' and property_item.property_listing = '$property_id' order by payments.ref_id_date asc");
								}
									
									$intcount = 0;
									$total_pay = 0;
									while ($row = mysql_fetch_array($result_suppliers))
									{
										$intcount++;
										$id = $row['id'];
										$property_name = $row['property_name'];
										$property_name = $row['property_name'];
										$unit_id = $row['unit_id'];
										$tenant_id = $row['tenant_id'];
										$commission = $row['commission'];
										$floor = $row['floor'];
										$location = $row['location'];
										$service_charge = $row['service_charge'];
										$block_occupied = "Unit: ".$location.", Floor: ".$floor;
										$tenant_name = $row['tenant_name'];
										$payment = $row['payment'];
										$received = $row['received'];
										$water_pay = $row['water_pay'];
										$actual_penalties = $row['actual_penalties'];
										$transactiontime = $row['transactiontime'];
										$payment_type = $row['payment_type'];
										$payment = $payment + $service_charge + $water_pay + $actual_penalties;
										$ref_id_date = $row['ref_id_date'];
										$ref_id_date = date("d M, Y", strtotime($ref_id_date));
										
										$result = mysql_query("select payment_type from payment_type where id = '$payment_type'");
										while ($row = mysql_fetch_array($result))
										{
											$payment_type = $row['payment_type'];
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
												echo "<td valign='top'>$tenant_name</td>";
												
												echo "<td valign='top'>$payment_type</td>";
												echo "<td valign='top'>$ref_id_date</td>";
												echo "<td valign='top'>$transactiontime</td>";
												echo "<td valign='top' align='right'>".number_format($received, 2)."</td>";
											
										echo "</tr>";	
										$total_pay = $total_pay + $received;
										}
									?>
									</tbody>
									<tr bgcolor = '#E6EEEE'>
										<td colspan='7'><strong>Total Payment</strong></td>
										<td align='right'><strong><?php echo number_format($total_pay, 2) ?></strong></td>
									</tr>
									
									<tfoot bgcolor="#E6EEEE">
										<tr>
											<th>#</th>
											<th>Property</th>
											<th>Unit</th>
											<th>Tenant</th>							
											<th>Payment Type</th>
											<th>Date</th>
											<th>Transactiontime</th>
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
		else{
		?>
		<div id="page">
			<div id="content">
				<div class="post">
					<h2><?php echo $page_title ?> | e-kodi</h2>
						<form id="frmDeptCategories" name="frmDeptCategories" method="GET" action="payments_receipts.php">
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
