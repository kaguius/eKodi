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
		$property_name = "";
		$transactiontime = date("Y-m-d G:i:s");
		$page_title = "Landlord Rent Statement Report";
		include_once('includes/header.php');
		if (!empty($_GET)){	
			$rent_month = $_GET['month'];
			$rent_year = $_GET['year'];
			$property_id = $_GET['property_name'];
			$statement_category = $_GET['statement_category'];
		} 
		if ($rent_month != "" || $rent_year != "" || $property_name != ""){
			
			$result_tender = mysql_query("select month from calender where id = '$rent_month'");
			while ($row = mysql_fetch_array($result_tender))
			{
				$actual_rent_month = $row['month'];
			}
			$sql = mysql_query("select id, property_name, property_owner, location, propety_contact from property_details where id = '$property_id'");
			while($row = mysql_fetch_array($sql)) {
				$property_name = $row['property_name']; 
				$property_owner = $row['property_owner']; 
				$location = $row['location']; 
				$propety_contact = $row['propety_contact']; 
			}
			if ($statement_category == 1){
				//printing out Deposit Statements
				$page_title = "Landlord Deposit Statement Report";
				?>
				<div id="page">
					<div id="content">
						<div class="post">
							<h2><?php echo $page_title ?> | e-kodi</h2>
							<h2 align='right'>Landlord Statement</h2>
								<strong>Landlord Name: </strong><?php echo $property_owner ?><br />
								<strong>Property Name: </strong><?php echo $property_name ?><br />
								<strong>Property Location: </strong><?php echo $location ?><br />
								<strong>Property Contact: </strong><?php echo $propety_contact ?><br />
								<strong>Statement Month: </strong><?php echo $actual_rent_month .", ".$rent_year ?><br /><br />
								<table width="100%ight" border="0" cellspacing="2" cellpadding="2" class="display" id="example">
									<thead bgcolor="#E6EEEE">
										<tr>
											<th>#</th>
											<th>Unit Occupied</th>
											<th>Tenant Name</th>
											<th>% Comms</th>
											<th>Deposit</th>
											
											<th>Commission</th>
											<th>Total</th>														
										</tr>
									</thead>
									<tbody>
									<?php
										$result_suppliers = mysql_query("select property_item.property_listing, payments.id, (property_item.id)unit_id, (tenants.id)tenant_id, property_details.property_name, property_details.commission, property_item.floor, property_item.location, tenants.tenant_name, payment, payments.service_charge, property_item.service_charge, rent_month, rent_year, banked, payments.transactiontime from payments inner join property_item on property_item.id = payments.unit_id inner join property_details on property_item.property_listing = property_details.id inner join tenants on tenants.id = payments.tenant_id where rent_month = '$rent_month' and rent_year = '$rent_year'  and property_item.property_listing = '$property_id' and payments.category = '$statement_category' order by property_details.property_name, rent_year, rent_month asc");
										$intcount = 0;
										$total_payment = 0;
										$total_actual_payment = 0;
										$total_commission = 0;
										$total_service_charge = 0;
										$total_rent_expected = 0;
										$total_rent = 0;
										//$total_penalties = 0;
										while ($row = mysql_fetch_array($result_suppliers))
										{
											$intcount++;
											$id = $row['id'];
											$property_name = $row['property_name'];
											$property_listing = $row['property_listing'];
											$unit_id = $row['unit_id'];
											$tenant_id = $row['tenant_id'];
											$commission = $row['commission'];
											$floor = $row['floor'];
											$location = $row['location'];
											$service_charge = $row['service_charge'];
											$block_occupied = "Unit: ".$location.", Floor: ".$floor;
											$tenant_name = $row['tenant_name'];
											$payment = $row['payment'];
											//$actual_penalties = $row['actual_penalties'];
											$transactiontime = $row['transactiontime'];
											$banked = $row['banked'];
											$comms_paid = $payment - $actual_payment;
											//$deposit_expected = $deposit_payment - $service_charge;
											if ($intcount % 2 == 0) {
												$display= '<tr bgcolor = #F0F0F6>';
											}
											else {
												$display= '<tr>';
											}
											echo $display;
												echo "<td valign='top'>$intcount</td>";
												echo "<td valign='top'>$block_occupied</td>";
												echo "<td valign='top'>$tenant_name</td>";
												echo "<td valign='top' align='center'>$commission%</td>";	
												echo "<td valign='top' align='right'>KES ".number_format($payment, 2)."</td>";
												
												echo "<td valign='top' align='right'>KES (".number_format(0, 2).")</td>";
												echo "<td valign='top' align='right'>KES ".number_format($payment, 2)."</td>";											
											echo "</tr>";	
											$total_payment = $total_payment + $payment;
											$total_actual_payment = $total_actual_payment + $payment;
											$total_commission = $total_commission + $comms_paid;
											}
										?>
										</tbody>
										<tr bgcolor = '#E6EEEE'>
											<td colspan='4'><strong>Total Payment</strong></td>
											<td align='right'><strong>KES <?php echo number_format($total_payment, 2) ?></strong></td>
											<td align='right'><strong>KES (<?php echo number_format(0, 2) ?>)</strong></td>
											
											<td align='right'><strong>KES <?php echo number_format($total_actual_payment, 2) ?></strong></td>
										</tr>
									<tfoot bgcolor="#E6EEEE">
										<tr>
											<th>#</th>
											<th>Unit Occupied</th>
											<th>Tenant Name</th>
											<th>% Comms</th>
											<th>Deposit</th>
											
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
				//printing out Rent Statements
				$page_title = "Landlord Rent Statement Report";
				?>
				<div id="page">
					<div id="content">
						<div class="post">
							<h2><?php echo $page_title ?> | e-kodi</h2>
							<h2 align='right'>Landlord Statement</h2>
								<strong>Landlord Name: </strong><?php echo $property_owner ?><br />
								<strong>Property Name: </strong><?php echo $property_name ?><br />
								<strong>Property Location: </strong><?php echo $location ?><br />
								<strong>Property Contact: </strong><?php echo $propety_contact ?><br />
								<strong>Statement Month: </strong><?php echo $actual_rent_month .", ".$rent_year ?><br /><br />
								<table width="100%ight" border="0" cellspacing="2" cellpadding="2" class="display" id="example">
									<thead bgcolor="#E6EEEE">
										<tr>
											<th>#</th>
											<th>Unit</th>
											<th>Tenant</th>
											<th>Comms</th>
											<th>Rent</th>
											<th>Garbage</th>
											<th>Parking</th>
											<th>Water</th>
											<th>Expected</th>					
											<th>Penalties</th>
											<th>Total</th>						
										</tr>
									</thead>
									<tbody>
									<?php
									$result_suppliers = mysql_query("select property_item.property_listing, payments.id, (property_item.id)unit_id, (tenants.id)tenant_id, property_details.property_name, property_details.commission, property_item.floor, property_item.location, tenants.tenant_name, payment, payments.garbage_fee, payments.parking_fee, rent_month, rent_year, banked, payments.water_pay, payments.transactiontime, actual_penalties from payments inner join property_item on property_item.id = payments.unit_id inner join property_details on property_item.property_listing = property_details.id inner join tenants on tenants.id = payments.tenant_id where rent_month = '$rent_month' and rent_year = '$rent_year' and property_item.property_listing = '$property_id' and payments.category = '$statement_category' order by property_details.property_name, rent_year, rent_month asc");

										$intcount = 0;
										$total_rent = 0;
										$total_service = 0;
										$total_expected = 0;
										$total_commission = 0;
										$total_penalties = 0;
										$total_water = 0;
										$total_pay = 0;
										$total_parking_fee = 0;

										while ($row = mysql_fetch_array($result_suppliers))
										{
											$intcount++;
											$id = $row['id'];
											$property_name = $row['property_name'];
											$property_listing = $row['property_listing'];
											$unit_id = $row['unit_id'];
											$tenant_id = $row['tenant_id'];
											$commission = $row['commission'];
											$floor = $row['floor'];
											$location = $row['location'];
											$garbage_fee = $row['garbage_fee'];
											$block_occupied = "Unit: ".$location.", Floor: ".$floor;
											$tenant_name = $row['tenant_name'];
											$payment = $row['payment'];
											$parking_fee = $row['parking_fee'];
											$water_pay = $row['water_pay'];
											$actual_penalties = $row['actual_penalties'];
											$transactiontime = $row['transactiontime'];
											$banked = $row['banked'];
											$rent_expected = $payment + $garbage_fee + $parking_fee + $water_pay;
											$total = $rent_expected + $actual_penalties;
											if ($intcount % 2 == 0) {
												$display= '<tr bgcolor = #F0F0F6>';
											}
											else {
												$display= '<tr>';
											}
											echo $display;
												echo "<td valign='top'>$intcount</td>";
												echo "<td valign='top'>$block_occupied</td>";
												echo "<td valign='top'>$tenant_name</td>";
												echo "<td valign='top' align='center'>$commission%</td>";	
												echo "<td valign='top' align='right'>".number_format($payment, 2)."</td>";
												echo "<td valign='top' align='right'>".number_format($garbage_fee, 2)."</td>";
												echo "<td valign='top' align='right'>".number_format($parking_fee, 2)."</td>";
												echo "<td valign='top' align='right'>".number_format($water_pay, 2)."</td>";
												echo "<td valign='top' align='right'>".number_format($rent_expected, 2)."</td>";
												echo "<td valign='top' align='right'>".number_format($actual_penalties, 2)."</td>";											
												echo "<td valign='top' align='right'>".number_format($total, 2)."</td>";	
												
											echo "</tr>";	
											$total_rent = $total_rent + $payment;
											$total_garbage_fee = $total_garbage_fee + $garbage_fee;
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
											<td colspan='4'><strong>Total Payment</strong></td>
											<td align='right'><strong><?php echo number_format($total_rent, 2) ?></strong></td>
											<td align='right'><strong><?php echo number_format($total_garbage_fee, 2) ?></strong></td>
											<td align='right'><strong><?php echo number_format($total_parking_fee, 2) ?></strong></td>
											<td align='right'><strong><?php echo number_format($total_water, 2) ?></strong></td>
											<td align='right'><strong><?php echo number_format($total_expected, 2) ?></strong></td>
											<td align='right'><strong><?php echo number_format($total_penalties, 2) ?></strong></td>
											<td align='right'><strong><?php echo number_format($total_pay, 2) ?></strong></td>
										</tr>
									<tfoot bgcolor="#E6EEEE">
										<tr>
											<th>#</th>
											<th>Unit</th>
											<th>Tenant</th>
											<th>Comms</th>
											<th>Rent</th>
											<th>Garbage</th>
											<th>Parking</th>
											<th>Water</th>
											<th>Expected</th>					
											<th>Penalties</th>
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
		}
		else{
		?>
		<div id="page">
			<div id="content">
				<div class="post">
					<h2><?php echo $page_title ?> | e-kodi</h2>
						<form id="frmDeptCategories" name="frmDeptCategories" method="GET" action="landlord_statement.php">
							<table border="0" width="100%">
								<tr >
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
								</tr>
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
								<tr >
									<td width="30%">Select Category *</td>
									<td width="70%">
										<select name="statement_category" id="statement_category">
											<option value="">&nbsp;</option>
											<option value="1">Deposit Statement</option>
											<option value="2">Rent Statement</option>
										</select>
									</td>
								</tr>
								<tr>
									<td colspan="3"><button name="submit" id="button" onclick="return CheckForm();">Submit</button></td>
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
