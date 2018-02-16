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
		$transactiontime = date("Y-m-d G:i:s");
		$page_title = "Annual Landlord Statement Report";
		include_once('includes/header.php');
		if (!empty($_GET)){	
			$rent_month = $_GET['month'];
			$rent_year = $_GET['year'];
			$property_id = $_GET['property_name'];
		} 
		if ($rent_year != "" || $property_name != ""){
			//$rent_period = date("$rent_month, $rent_year");
			$sql = mysql_query("select id, property_name, property_owner, property_type, location, propety_contact, commission, taxes from property_details where id = '$property_id'");
			while($row = mysql_fetch_array($sql)) {
				$property_name = $row['property_name']; 
				$property_owner = $row['property_owner']; 
				$location = $row['location']; 
				$property_contact = $row['propety_contact']; 
				$property_commission = $row['commission'];
				$property_type = $row['property_type'];
				$taxes = $row['taxes'];  
			}
				//printing out Deposit Statements
				$page_title = "Annual Landlord Statement";
				?>
				<div id="page">
					<div id="content">
						<div class="post">
							<h2><?php echo $page_title ?> | e-kodi</h2>
							<h2 align='right'>Landlord Statement</h2>
								<strong>Landlord Name: </strong><?php echo $property_owner ?><br />
								<strong>Property Name: </strong><?php echo $property_name ?><br />
								<strong>Property Location: </strong><?php echo $location ?><br />
								<strong>Property Contact: </strong><?php echo $property_contact ?><br />
								<strong>Property Type: </strong><?php echo $property_type ?><br />
								<br />
								<h2>Revenue</h2>
								<table width="100%ight" border="0" cellspacing="2" cellpadding="2" >
									<thead bgcolor="#E6EEEE">
										<tr>
											<th>#</th>
											<th>Unit Occupied</th>
											<th>Tenant Name</th>
											<th>Category</th>
											<th>Rent</th>
											<th>Garbage</th>
											<th>Parking</th>
											<th>Water</th>
											<th>Penalties</th>				
											<th>&nbsp;</th>
											<th>Water Dep</th>
											<th>Elec Dep</th>
											<th>Received</th>
											<th>&nbsp;</th>
											<th>Balance</th>
											<th>Total</th>				
										</tr>
									</thead>
									<tbody>
									<?php
										$result_suppliers = mysql_query("select property_item.property_listing, payments.id, (property_item.id)unit_id, (tenants.id)tenant_id, property_details.property_name, property_details.commission, property_item.floor, property_item.location, tenants.tenant_name, payment, payments.service_charge, property_item.rent, actual_penalties, water_pay, payments.parking_fee, payments.garbage_fee, payments.balance, payments.water_deposit, payments.elec_deposit, rent_month, rent_year, banked, payments.category, payments.transactiontime from payments inner join property_item on property_item.id = payments.unit_id inner join property_details on property_item.property_listing = property_details.id inner join tenants on tenants.id = payments.tenant_id where rent_year = '$rent_year' and property_item.property_listing = '$property_id' order by property_details.property_name, tenants.tenant_name, category asc");
										$intcount = 0;
										$total_payment = 0;
										$total_actual_payment = 0;
										$total_commission = 0;
										$total_service_charge = 0;
										$total_payment_expected = 0;
										$total_rent = 0;
										$total_payment_expected2 = 0;
										$cost_payment = 0;
										$total_penalties = 0;
										$total_parking_fee = 0;
										$total_garbage_fee = 0;
										$total_balance = 0;
										$balance = 0;
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
											$block_occupied = "Unit: ".$location.", Floor: ".$floor;
											$tenant_name = $row['tenant_name'];
											$payment = $row['payment'];
											$parking_fee = $row['parking_fee'];
											$garbage_fee = $row['garbage_fee'];
											$water_deposit = $row['water_deposit'];
											$elec_deposit = $row['elec_deposit'];
											$water_pay = $row['water_pay'];
											$balance = $row['balance'];
											$transactiontime = $row['transactiontime'];
											$actual_penalties = $row['actual_penalties'];
											$banked = $row['banked'];

											$result = mysql_query("select comm_paid from comms_table where unit_id = '$unit_id' and comm_month = '$rent_month' and comm_year = '$rent_year'");
											while ($row = mysql_fetch_array($result))
											{
												$comms_paid = $row['comm_paid'];
											}

											//$expected = $exp_rent + $exp_garbage_fee + $exp_parking_fee + $exp_water_pay;
											$total = $payment + $actual_penalties + $water_pay + $parking_fee + $garbage_fee + $water_deposit + $elec_deposit;
											
											$total_payment = $total + $balance;

											//$payment_expected = $payment - $service_charge;
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
												if($category == 1) {
													echo "<td valign='top'>Deposit</td>";	
												}
												else {
													echo "<td valign='top'>Rent</td>";	
												}												
												echo "<td valign='top' align='right'>".number_format($payment, 2)."</td>";
												echo "<td valign='top' align='right'>".number_format($garbage_fee, 2)."</td>";
												echo "<td valign='top' align='right'>".number_format($parking_fee, 2)."</td>";	
												echo "<td valign='top' align='right'>".number_format($water_pay, 2)."</td>";												
												
												echo "<td valign='top' align='right'>".number_format($actual_penalties, 2)."</td>";
												
												
												echo "<td valign='top' align='right'>&nbsp;</td>";
												echo "<td valign='top' align='right'>".number_format($water_deposit, 2)."</td>";
												echo "<td valign='top' align='right'>".number_format($elec_deposit, 2)."</td>";
												echo "<td valign='top' align='right'>".number_format($total, 2)."</td>";
												echo "<td valign='top' align='right'>&nbsp;</td>";
												echo "<td valign='top' align='right'>".number_format($balance, 2)."</td>";
												echo "<td valign='top' align='right'>".number_format($total_payment, 2)."</td>";
												
											echo "</tr>";
											$total_rent = $total_rent + $payment;
											$total_service = $total_service + $service_charge;
											$total_expected = $total_expected + $rent_expected;
											$total_commission = $total_commission + $comms_paid;
											$total_penalties = $total_penalties + $actual_penalties;
											$total_water = $total_water + $water_pay;
											$total_pay = $total_pay + $total;
											$total_parking_fee = $total_parking_fee + $parking_fee;
											$total_garbage_fee = $total_garbage_fee + $garbage_fee;
											$total_balance = $total_balance + $balance;
											$total_water_deposit = $total_water_deposit + $water_deposit;
											$total_elec_deposit = $total_elec_deposit + $elec_deposit;
											$total_tpayment = $total_tpayment + $total_payment;
											}
										?>
										</tbody>
										<tr bgcolor = '#E6EEEE'>
											<td colspan='4'><strong>Total Revenue</strong></td>
											<td align='right'><strong><?php echo number_format($total_rent, 2) ?></strong></td>
											<td align='right'><strong><?php echo number_format($total_garbage_fee, 2) ?></strong></td>
											<td align='right'><strong><?php echo number_format($total_parking_fee, 2) ?></strong></td>
											<td align='right'><strong><?php echo number_format($total_water, 2) ?></strong></td>
											<td align='right'><strong><?php echo number_format($total_penalties, 2) ?></strong></td>
											
											
											<td align='right'>&nbsp;</td>
											<td align='right'><strong><?php echo number_format($total_water_deposit, 2) ?></strong></td>
											<td align='right'><strong><?php echo number_format($total_elec_deposit, 2) ?></strong></td>
											<td align='right'><strong><?php echo number_format($total_pay, 2) ?></strong></td>
											
											<td align='right'>&nbsp;</td>
											<td align='right'><strong><?php echo number_format($total_balance, 2) ?></strong></td>
											<td align='right'><strong><?php echo number_format($total_tpayment, 2) ?></strong></td>
										</tr>
								</table>
								<br /><h2>Expenses</h2>
								<table width="100%" border="0" cellspacing="2" cellpadding="2" >
									<thead bgcolor="#E6EEEE">
										<tr>
											<th>#</th>
											<th>Expense Detail</th>
											<th>Budget Expense</th>
											<th>Actual Expense</th>
											<th>Variance</th>																				
										</tr>
									</thead>
									<tbody>
									<?php
										//echo $cost_payment;
										$management_fee = $cost_payment * ($property_commission /100);
										$bud_management_fee = $cost_payment * ($property_commission /100);
										$man_variance = $bud_management_fee - $management_fee;
										$management_tax = $management_fee * (16/100);
										$result = mysql_query("select expense_id, expense_items.expense_name, expense_items.budget_expense, expense_payment from expense_payment inner join expense_items on  expense_items.id = expense_payment.expense_id where expense_year = '$rent_year' and expense_payment.property_id = '$property_id' order by expense_items.expense_name asc");
										$intcount = 1;
										$total_budget_expense = 0;
										$total_expense_payment = 0;
										$total_variance = 0;
										$display= '<tr>';
										echo $display;
											echo "<td valign='top'>$intcount</td>";
											echo "<td valign='top'>Management Fees</td>";										
											echo "<td valign='top' align='right'>KES ".number_format($bud_management_fee, 2)."</td>";
											echo "<td valign='top' align='right'>KES ".number_format($management_fee, 2)."</td>";
											echo "<td valign='top' align='right'>KES ".number_format($man_variance, 2)."</td>";												
											echo "</tr>";
										$intcount++;
										echo '<tr bgcolor = #F0F0F6>';
											echo "<td valign='top'>$intcount</td>";
											echo "<td valign='top'>Management Fees Taxes</td>";										
											echo "<td valign='top' align='right'>KES ".number_format($management_tax, 2)."</td>";
											echo "<td valign='top' align='right'>KES ".number_format($management_tax, 2)."</td>";
											echo "<td valign='top' align='right'>KES ".number_format(0, 2)."</td>";												
										echo "</tr>";		
										while ($row = mysql_fetch_array($result))
										{
											$intcount++;
											$expense_name = $row['expense_name'];
											$budget_expense = $row['budget_expense'];
											$expense_payment = $row['expense_payment'];
											$variance = $budget_expense - $expense_payment;
											if ($intcount % 2 == 0) {
												$display= '<tr bgcolor = #F0F0F6>';
											}
											else {
												$display= '<tr>';
											}
											echo $display;
												echo "<td valign='top'>$intcount</td>";
												echo "<td valign='top'>$expense_name</td>";										
												echo "<td valign='top' align='right'>KES ".number_format($budget_expense, 2)."</td>";
												echo "<td valign='top' align='right'>KES ".number_format($expense_payment, 2)."</td>";
												echo "<td valign='top' align='right'>KES ".number_format($variance, 2)."</td>";
																							
											echo "</tr>";
											
											$total_budget_expense = $total_budget_expense + $budget_expense;
											$total_expense_payment = $total_expense_payment + $expense_payment;
											$total_variance = $total_variance + $variance;
											$total_exp_payment = $total_exp_payment + $expense_payment;
										}
										if($property_type == 'Residential'){
											if($taxes == 'Yes'){
												$tax_amount1 = 121968;
												$tax_amount2 = 114912;
												$tax_amount3 = 114912;
												$tax_amount4 = 114912;
												$tax_amount5 = 466704;
											
												$tax_percent1 = 10;
												$tax_percent2 = 15;
												$tax_percent3 = 20;
												$tax_percent4 = 25;
												$tax_percent5 = 30;
											
												$tax_bracket1 = $total_pay - $tax_amount1;
												if($total_pay < $tax_amount1){
													$taxes = $total_pay * ($tax_percent1/100);
												}
											}
										}
										else{
											$tax_percent = 16/100;
											$taxes = $total_pay * ($tax_percent);
										}
										
										$intcount = $intcount + 1;
										echo "<tr>";
											echo "<td valign='top'>$intcount</td>";
											echo "<td valign='top'>Taxes</td>";										
											echo "<td valign='top' align='right'>KES ".number_format($taxes, 2)."</td>";
											echo "<td valign='top' align='right'>KES ".number_format($taxes, 2)."</td>";
											echo "<td valign='top' align='right'>KES ".number_format(0, 2)."</td>";
																							
										echo "</tr>";
										$total_budget_expense = $total_budget_expense + $bud_management_fee + $taxes + $management_tax;
										$total_expense_payment = $total_expense_payment + $management_fee + $taxes + $management_tax;
										$total_variance = $total_variance + $man_variance;	
										
										$total_exp_payment = $total_exp_payment + $expense_payment;		
										?>
										</tbody>
										<tr bgcolor = '#E6EEEE'>
											<td colspan='2'><strong>Expenses</strong></td>
											<td align='right'><strong>KES <?php echo number_format($total_budget_expense, 2) ?></strong></td>
											<td align='right'><strong>KES <?php echo number_format($total_expense_payment, 2) ?></strong></td>
											<td align='right'><strong>KES <?php echo number_format($total_variance, 2) ?></strong></td>
										</tr>
								</table>
								<?php
									if($total_service > 0){
									//$diff_expense = $total_service - $total_exp_payment;
									//$net_revenue = 0;
									//$net_revenue = $total_pay - ($management_fee + $taxes);
									$net_revenue = 0;
									$net_revenue = $total_pay - $total_expense_payment;
								}
								else{
									$net_revenue = 0;
									$net_revenue = $total_pay - $total_expense_payment;
								}
								?>
								<table width="100%" border="0" cellspacing="2" cellpadding="2" >
									<tr bgcolor = '#E6EEEE'>
										<td><strong>Net Revenue:</strong></td>
										<td align='right'><strong>KES <?php echo number_format($net_revenue, 2) ?></strong></td>
									</tr>
								</table>
								<br />
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
						<form id="frmDeptCategories" name="frmDeptCategories" method="GET" action="yearly_statement.php">
							<table border="0" width="100%">
								<tr>
									<td width="30%">Select Year *</td>
									<td width="70%">
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
