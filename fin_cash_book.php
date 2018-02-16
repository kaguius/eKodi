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
		$page_title = "View Cash Book Payments";
		include_once('includes/db_conn.php');
		$transactiontime = date("Y-m-d G:i:s");
		if($property_manager_id == 0){
			$result_suppliers = mysql_query("select id, company_name from property_managers where id = '$manager_id'");
		}
		else{
			$result_suppliers = mysql_query("select id, company_name from property_managers where id = '$property_manager_id'");
		}
		while ($row = mysql_fetch_array($result_suppliers))
		{
			$lookup_company_name = $row['company_name'];
		}
		if (!empty($_GET)){	
			$report_start_date = $_GET['report_start_date'];
			$report_end_date = $_GET['report_end_date'];
			$property_id = $_GET['property_name'];
		} 
		$running_cash_book = 0;
		
		include_once('includes/header.php');
		if ($report_start_date != "" || $report_end_date != ""){
			$page_title = "Detailed Cash Book Payments";
			$result_tender = mysql_query("select month from calender where id = '$comm_month'");
			while ($row = mysql_fetch_array($result_tender))
			{
				$actual_comm_month = $row['month'];
			}
			$report_start_date = date('Y-m-d', strtotime(str_replace('-', '/', $report_start_date)));
			$report_start_month = date('m',strtotime($report_start_date));
			$report_start_year = date('Y',strtotime($report_start_date));
			$report_end_date = date('Y-m-d', strtotime(str_replace('-', '/', $report_end_date)));
			$report_end_month = date('m',strtotime($report_end_date));
			$report_end_year = date('Y',strtotime($report_end_date));
			$report_start_date = date("d M, Y", strtotime($report_start_date));
			$report_end_date = date("d M, Y", strtotime($report_end_date));

			$result = mysql_query("select sum(amount)amount from property_owner_remittances where remmitance_month between '$report_start_month' and '$report_end_month' and remmitance_year between '$report_start_year' and '$report_end_year' and property_id = '$property_id'");
			while ($row = mysql_fetch_array($result))
			{
				$month_cash_book = $row['amount'];
			}
			$result = mysql_query("select sum(payment)payment from fin_expense_payment where expense_month between '$report_start_month' and '$report_end_month' and expense_year between '$report_start_year' and '$report_end_year' and property_id = '$property_id'");
			while ($row = mysql_fetch_array($result))
			{
				$running_payments = $row['payment'];
			}
			$running_cash_book = $month_cash_book - $running_payments;
		?>		
		<div id="page">
			<div id="content">
				<div class="post">
					<h2><?php echo $page_title ?> | e-kodi</h2>
					<strong>You are here:</strong> &raquo; <a href="index.php">Home</a> &raquo; <a href="financials.php">Financials</a> &raquo; View Cash Book for <strong>Reporting Date:</strong> <?php echo $report_start_date ." to ".$report_end_date ?><br /><br />
					<h2>Cash Book Payments</h2>
					<table width="100%" border="0" cellspacing="2" cellpadding="2" class="display" id="eample">
								<thead bgcolor="#E6EEEE">
									<tr>
										<th>#</th>
										<th>Unit</th>
										<th>Tenant</th>	
										<th>Date</th>
										<th>Type</th>
										<th>Trans ID</th>
										<th>Transactiontime</th>
										<th>Amount</th>
									</tr>
								</thead>
								<tbody>
								<?php
								if($property_manager_id == 0){
									$result_suppliers = mysql_query("select property_item.location, tenants.tenant_name, amount, remmitance_month, remmitance_year, payment_type.payment_type, property_owner_remittances.manager_id, property_owner_remittances.UID, trans_id, property_owner_remittances.transactiontime, trans_id_date from property_owner_remittances inner join property_item on property_item.id = property_owner_remittances.unit_id inner join payment_type on payment_type.id = property_owner_remittances.payment_type inner join tenants on tenants.id = property_owner_remittances.tenant_id where pay_month between '$report_start_month' and '$report_end_month' and pay_year between '$report_start_year' and '$report_end_year' and property_id = '$property_id' order by trans_id_date asc");
								}
								else{
									$result_suppliers = mysql_query("select property_item.location, tenants.tenant_name, amount, remmitance_month, remmitance_year, payment_type.payment_type, property_owner_remittances.manager_id, property_owner_remittances.UID, trans_id, property_owner_remittances.transactiontime, trans_id_date from property_owner_remittances inner join property_item on property_item.id = property_owner_remittances.unit_id inner join payment_type on payment_type.id = property_owner_remittances.payment_type inner join tenants on tenants.id = property_owner_remittances.tenant_id where pay_month between '$report_start_month' and '$report_end_month' and pay_year between '$report_start_year' and '$report_end_year' and property_id = '$property_id' order by trans_id_date asc");
								}
									
									$intcount = 0;
									$total_comms = 0;
									while ($row = mysql_fetch_array($result_suppliers))
									{
										$intcount++;
										$id = $row['id'];
										$location = $row['location'];
										$tenant_name = $row['tenant_name'];
										$amount = $row['amount'];
										$payment_type = $row['payment_type'];
										$remmitance_month = $row['remmitance_month'];
										
										$remmitance_year = $row['remmitance_year'];
										$trans_id = $row['trans_id'];
										$trans_id_date = $row['trans_id_date'];
										$trans_id_date = date("d M, Y", strtotime($trans_id_date));
										$commission = $row['transactiontime'];
										$result_tender = mysql_query("select month from calender where id = '$remmitance_month'");
										while ($row = mysql_fetch_array($result_tender))
										{
											$remmitance_month = $row['month'];
										}
										$period = $pay_month." ".$pay_year;
										if ($intcount % 2 == 0) {
											$display= '<tr bgcolor = #F0F0F6>';
										}
										else {
											$display= '<tr>';
										}
										echo $display;
											echo "<td valign='top'>$intcount</td>";
											echo "<td valign='top'>$location</td>";
											echo "<td valign='top'>$tenant_name</td>";	
											echo "<td valign='top'>$trans_id_date</td>";	
											echo "<td valign='top' align='center'>$payment_type</td>";
											echo "<td valign='top' align='center'>$trans_id</td>";									
											echo "<td valign='top' align='center'>$transactiontime</td>";
											echo "<td valign='top' align='right'>KES ".number_format($amount, 2)."</td>";
										echo "</tr>";	
										$total_comms = $total_comms + $amount;
										}
									?>
									</tbody>
									<tr bgcolor = '#E6EEEE'>
										<td colspan='7'><strong>Cash Book Payments</strong></td>
										<td align='right'><strong>KES <?php echo number_format($total_comms, 2) ?></strong></td>
									</tr>
							</table>
					<br />
					<p>
					<h3>Payments (Expenses)</h3>
					</p>
					<table width="100%" border="0" cellspacing="2" class="display" cellpadding="2" id="eample">
						<thead bgcolor="#E6EEEE">
							<tr>
								<th>#</th>
								<th>Date</th>
								<th>Category</th>
								<th>Expense</th>
								<th>Name</th>
								<th>Number</th>
								<th>Type</th>								
								<th>Transactiontime</th>
								<th>Payment</th>
							</tr>
						</thead>
						<tbody>
						<?php
						if($property_manager_id == 0){
									$result = mysql_query("select fin_expense_payment.expense_category, fin_expenses_items.expense_name, name, payment_type, payment_number, payment, expense_day, expense_month, expense_year, bank_rec, fin_expense_payment.transactiontime from fin_expense_payment inner join fin_expenses_items on fin_expenses_items.id = fin_expense_payment.expense_id where expense_month = '$expense_month' and expense_year = '$expense_year' and fin_expense_payment.property_id = '$property_id'");
								}
								else{
									$result = mysql_query("select fin_expense_payment.expense_category, fin_expenses_items.expense_name, name, payment_type, payment_number, payment, expense_day, expense_month, expense_year, bank_rec, fin_expense_payment.transactiontime from fin_expense_payment inner join fin_expenses_items on fin_expenses_items.id = fin_expense_payment.expense_id where fin_expense_payment.manager_id = '$property_manager_id' and expense_month = '$expense_month' and expense_year = '$expense_year' and property_id = '$property_id'");
								}
							$intcount = 0;
							$total_payment = 0;
							while ($row = mysql_fetch_array($result))
							{
								$intcount++;
								$id = $row['id'];
								$expense_category = $row['expense_category'];
								if($expense_category == 1){
									$expense_category_name = 'Sales & Marketing';
								}
								elseif($expense_category == 2){
									$expense_category_name = 'Research & Development';
								}
								else{
									$expense_category_name = 'General & Administrative';
								}
								$name = $row['name'];
								$expense_name = $row['expense_name'];
								$payment_type = $row['payment_type'];
								$payment_number = $row['payment_number'];
								$payment = $row['payment'];
								$expense_day = $row['expense_day'];
								$expense_month = $row['expense_month'];
								$expense_year = $row['expense_year'];
								$bank_rec = $row['bank_rec'];
								$transactiontime = $row['transactiontime'];
								
								if($bank_rec == 0){
									$display_bank_rec = "";
								}
								else{
									$display_bank_rec = $bank_rec;
								}
								if ($intcount % 2 == 0) {
									$display= '<tr bgcolor = #F0F0F6>';
								}
								else {
									$display= '<tr>';
								}
								echo $display;
									echo "<td valign='top'>$intcount</td>";
									echo "<td valign='top'>$expense_day/$expense_month/$expense_year</td>";
									echo "<td valign='top'>$expense_category_name</td>";
									echo "<td valign='top'>$expense_name</td>";
									echo "<td valign='top'>$name</td>";
									echo "<td valign='top'>$payment_number</td>";
									echo "<td valign='top'>$payment_type</td>";				
									//echo "<td valign='top'>$display_bank_rec</td>";
									echo "<td valign='top'>$transactiontime</td>";
									echo "<td valign='top' align='right'>KES ".number_format($payment, 2)."</td>";	
								echo "</tr>";
								$total_payment = $total_payment + $payment;	
								}
							?>
						<tr bgcolor = '#E6EEEE'>
								<td colspan='8'><strong>Total Expenses for Month</strong></td>
								<td align='right'><strong>KES <?php echo number_format($total_payment, 2) ?></strong></td>
						</tr>
						
						
						</tbody>
					</table>
					<table width="100%" border="0" cellspacing="2" cellpadding="2" >
						<tr bgcolor = '#E6EEEE'>
							<td><strong>Cash Book Running Total:</strong></td>
							<?php
								if($month_cash_book == 0){ ?>
								<td align='right'><strong>KES <font color="red"><?php echo number_format($running_cash_book, 2) ?></font></strong></td>
							<?php }
								else{
							?>
								<td align='right'><strong>KES <?php echo number_format($running_cash_book, 2) ?></font></strong></td>
							<?php } ?>
						</tr>
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
						<form id="frmDeptCategories" name="frmDeptCategories" method="GET" action="fin_cash_book.php">
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
								<tr><td>Select Property: *</td>
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
									<td colspan="3">
										<button name="btnNewCard" id="button">Submit</button>
									</td>
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
