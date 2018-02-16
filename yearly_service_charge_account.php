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
		$page_title = "Annual Service Charge Statement Report";
		include_once('includes/header.php');
		if (!empty($_GET)){	
			$rent_month = $_GET['month'];
			$rent_year = $_GET['year'];
			$property_id = $_GET['property_name'];
		} 
		if ($rent_year != "" || $property_name != ""){
			//$rent_period = date("$rent_month, $rent_year");
			$sql = mysql_query("select id, property_name, property_owner, location, propety_contact, commission, taxes from property_details where id = '$property_id'");
			while($row = mysql_fetch_array($sql)) {
				$property_name = $row['property_name']; 
				$property_owner = $row['property_owner']; 
				$location = $row['location']; 
				$property_contact = $row['propety_contact']; 
				$property_commission = $row['commission'];
				$taxes = $row['taxes'];  
			}
			$sql = mysql_query("select sum(payments.service_charge)service_charge from payments inner join property_item on property_item.id = payments.unit_id where property_item.property_listing = '$property_id' and rent_year='$rent_year';");
			while($row = mysql_fetch_array($sql)) {
				$total_service_charge = $row['service_charge']; 
			}
			
				//printing out Deposit Statements
				$page_title = "Annual Service Charge Statement Report";
				?>
				<div id="page">
					<div id="content">
						<div class="post">
							<h2><?php echo $page_title ?> | e-kodi</h2><br />
								<strong>Landlord Name: </strong><?php echo $property_owner ?><br />
								<strong>Property Name: </strong><?php echo $property_name ?><br />
								<strong>Property Location: </strong><?php echo $location ?><br />
								<strong>Property Contact: </strong><?php echo $property_contact ?><br />
								<br />
								<table width="100%" border="0" cellspacing="2" cellpadding="2" >
									<tr bgcolor = '#E6EEEE'>
										<td><strong><font color='brown'>Service Charge Collected</font></strong></td>
										<td align='right'><strong><font color='brown'>KES <?php echo number_format($total_service_charge, 2) ?></font></strong></td>
									</tr>
								</table>
								<table width="100%" border="0" cellspacing="2" cellpadding="2" >
									<thead bgcolor="#E6EEEE">
										<tr>
											<th>#</th>
											<th>Tenant</th>
											<th>Expected</th>
											<th>Collected</th>
											<th>Variance</th>
																										</tr>
									</thead>
									<tbody>
									<?php
										$result = mysql_query("select unit_id, tenants.tenant_name, sum(payments.service_charge)service_charge, tenant_id from payments inner join property_item on property_item.id = payments.unit_id inner join calender on calender.id = payments.rent_month inner join tenants on tenants.id = payments.tenant_id where property_item.property_listing = '6' and rent_year='2013' group by tenant_id order by rent_month, tenants.tenant_name asc");
										$intcount = 0;
										while ($row = mysql_fetch_array($result))
										{
											$intcount++;
											$unit_id = $row['unit_id'];
											$tenant_id = $row['tenant_id'];
											$tenant_name = $row['tenant_name'];
											$collected = $row['service_charge'];
											$sc_result = mysql_query("select service_charge from property_item where id = '$unit_id'");
											while ($row = mysql_fetch_array($sc_result))
											{
												$expected = $row['service_charge'];
											}
											$count_result = mysql_query("select count(distinct rent_month)month_count from payments where tenant_id = '$tenant_id' and category = '2'");
											while ($row = mysql_fetch_array($count_result))
											{
												$month_count = $row['month_count'];
											}
											$expected_service_charge = $expected * $month_count;
											$variance = $expected_service_charge - $collected;

											if ($intcount % 2 == 0) {
												$display= '<tr bgcolor = #F0F0F6>';
											}
											else {
												$display= '<tr>';
											}
											echo $display;
												echo "<td valign='top'>$intcount</td>";
												echo "<td valign='top'>$tenant_name</td>";
												echo "<td valign='top'>KES ".number_format($expected_service_charge, 2)."</td>";
												echo "<td valign='top'>KES ".number_format($collected, 2)."</td>";
												echo "<td valign='top'>KES ".number_format($variance, 2)."</td>";
											echo "</tr>";
										}
									?>
									<tbody>
								</table>
								<h2>Expenses</h2>
								<table width="100%" border="0" cellspacing="2" cellpadding="2" >
									<thead bgcolor="#E6EEEE">
										<tr>
											<th>#</th>
											<th>Expense Detail</th>
											<th>Month</th>
											<th>Year</th>
											<th>Budget Expense</th>
											<th>Actual Expense</th>
											<th>Variance</th>																				
										</tr>
									</thead>
									<tbody>
									<?php
										$result = mysql_query("select expense_id, expense_items.expense_name, calender.month, expense_month, expense_year, expense_items.budget_expense, expense_payment from expense_payment inner join expense_items on  expense_items.id = expense_payment.expense_id inner join calender on calender.id = expense_payment.expense_month where expense_year = '$rent_year' and expense_payment.property_id = '$property_id' order by expense_month, expense_items.expense_name asc");
										$intcount = 0;
										$total_budget_expense = 0;
										$total_expense_payment = 0;
										$total_variance = 0;
										while ($row = mysql_fetch_array($result))
										{
											$intcount++;
											$expense_name = $row['expense_name'];
											$month = $row['month'];
											$expense_year = $row['expense_year'];
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
												echo "<td valign='top'>$month</td>";										
												echo "<td valign='top'>$expense_year</td>";										
												echo "<td valign='top' align='right'>KES ".number_format($budget_expense, 2)."</td>";
												echo "<td valign='top' align='right'>KES ".number_format($expense_payment, 2)."</td>";
												echo "<td valign='top' align='right'>KES ".number_format($variance, 2)."</td>";
																							
											echo "</tr>";
											
											$total_budget_expense = $total_budget_expense + $budget_expense;
											$total_expense_payment = $total_expense_payment + $expense_payment;
											$total_variance = $total_variance + $variance;
											$total_exp_payment = $total_exp_payment + $expense_payment;
										}
										$taxes = $total_payment * $tax_percent;
										$intcount = $intcount + 1;
										$total_budget_expense = $total_budget_expense + $bud_management_fee + $taxes;
										$total_expense_payment = $total_expense_payment + $management_fee + $taxes;
										$total_variance = $total_variance + $man_variance;	
										?>
										</tbody>
										<tr bgcolor = '#E6EEEE'>
											<td colspan='4'><strong>Expenses</strong></td>
											<td align='right'><strong>KES <?php echo number_format($total_budget_expense, 2) ?></strong></td>
											<td align='right'><strong>KES <?php echo number_format($total_expense_payment, 2) ?></strong></td>
											<td align='right'><strong>KES <?php echo number_format($total_variance, 2) ?></strong></td>
										</tr>
								</table>
								<?php
									$diff_expense = $total_service_charge - $total_exp_payment;
									$net_revenue = 0;
									$net_revenue = $total_pay - ($management_fee + $taxes);
								?>
								<table width="100%" border="0" cellspacing="2" cellpadding="2" >
									<tr>
										<td colspan="2">&nbsp;</td>
									</tr>
									<tr bgcolor = '#E6EEEE'>
										<td><strong><font color='brown'>Balance: Service Charge</font></strong></td>
										<td align='right'><strong><font color='brown'>KES <?php echo number_format($diff_expense, 2) ?></font></strong></td>
									</tr>
								</table>
								<br />
								<p>
								<strong>Key:</strong><br />
								<font color='brown'>Service Charge </font> - Indicated as not income to the landlord/ Property Agent
								</p>
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
						<form id="frmDeptCategories" name="frmDeptCategories" method="GET" action="yearly_service_charge_account.php">
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
										else{
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
