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
		$page_title = "View Petty Cash Payments";
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
		} 
		include_once('includes/header.php');
		if ($report_start_date != "" || $report_end_date != ""){
			$page_title = "Detailed Petty Cash Payments";
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
		?>		
		<div id="page">
			<div id="content">
				<div class="post">
					<h2><?php echo $page_title ?> | e-kodi</h2>
					<strong>You are here:</strong> &raquo; <a href="index.php">Home</a> &raquo; <a href="financials.php">Financials</a> &raquo; View Petty Cash Payments for <strong>Reporting Date:</strong> <?php echo $report_start_date ." to ".$report_end_date ?><br />
					<h3>Recieved</h3>

					<table width="100%" border="0" cellspacing="2" cellpadding="2" class="display">
						<thead bgcolor="#E6EEEE">
							<tr>
								<th>#</th>
								<th>Date</th>
								<th>Payment Type</th>
								<th>Payment Number</th>
								<th>Transactiontime</th>
								<th>Amount</th>
								
							</tr>
						</thead>
						<tbody>
						<?php
						$result_suppliers = mysql_query("select expense_day, expense_month, expense_year, payment_type, payment_number, payment, fin_expense_payment.transactiontime from fin_expense_payment inner join fin_expenses_items on fin_expenses_items.id = fin_expense_payment.expense_id where fin_expenses_items.expense_name = 'Petty Cash' and expense_month between '$report_start_month' and '$report_end_month' and expense_year between '$report_start_year' and '$report_end_year' order by transactiontime");
						$intcount = 0;
						$total_payment = 0;
						while ($row = mysql_fetch_array($result_suppliers))
						{

							$intcount++;
							$expense_day = $row['expense_day'];
							$expense_month = $row['expense_month'];
							$expense_year = $row['expense_year'];
							$payment_type = $row['payment_type'];
							$payment_number = $row['payment_number'];
							$payment = $row['payment'];
							$transactiontime = $row['transactiontime'];
							if ($intcount % 2 == 0) {
								$display= '<tr bgcolor = #F0F0F6>';
							}
							else {
								$display= '<tr>';
							}
							echo $display;
								echo "<td valign='top'>$intcount</td>";
								echo "<td valign='top'>$expense_day/$expense_month/$expense_year</td>";
								echo "<td valign='top'>$payment_type</td>";
								echo "<td valign='top'>$payment_number</td>";
								echo "<td valign='top'>$transactiontime</td>";	
								echo "<td valign='top' align='right'>KES ".number_format($payment, 2)."</td>";
								
							echo "</tr>";
							$total_payment = $total_payment + $payment;	
						}?>
						</tbody>
						<tr bgcolor = '#E6EEEE'>
								<td colspan='5'><strong>Total Month to Date</strong></td>
								<td align='right'><strong>KES <?php echo number_format($total_payment, 2) ?></strong></td>
						</tr>
					</table>
					<br />
					<h3>Payments</h3>

					<table width="100%" border="0" cellspacing="2" cellpadding="2" class="display">
						<thead bgcolor="#E6EEEE">
							<tr>
								<th>#</th>
								<th>Date</th>
								<th>Particulars</th>
								<th>Payment Type</th>
								<th>Payment Number</th>
								<th>Transactiontime</th>
								<th>Amount</th>
								
							</tr>
						</thead>
						<tbody>
						<?php
						if($property_manager_id == 0){
									$result_suppliers = mysql_query("select name, payment, payment_type, payment_number, petty_cash_day, petty_cash_month, petty_cash_year, transactiontime from fin_petty_cash_payment where petty_cash_month between '$report_start_month' and '$report_end_month' and petty_cash_year between '$report_start_year' and '$report_end_year' order by transactiontime asc");
								}
								else{
									$result_suppliers = mysql_query("select name, payment, payment_type, payment_number, petty_cash_day, petty_cash_month, petty_cash_year, transactiontime from fin_petty_cash_payment where petty_cash_month between '$report_start_month' and '$report_end_month' and petty_cash_year between '$report_start_year' and '$report_end_year' order by transactiontime asc");
								}
						
						$intcount = 0;
						$total_payment = 0;
						while ($row = mysql_fetch_array($result_suppliers))
						{

							$intcount++;
							$name = $row['name'];
							$expense_day = $row['petty_cash_day'];
							$expense_month = $row['petty_cash_month'];
							$expense_year = $row['petty_cash_year'];
							$payment_type = $row['payment_type'];
							$payment_number = $row['payment_number'];
							$payment = $row['payment'];
							$transactiontime = $row['transactiontime'];
							if ($intcount % 2 == 0) {
								$display= '<tr bgcolor = #F0F0F6>';
							}
							else {
								$display= '<tr>';
							}
							echo $display;
								echo "<td valign='top'>$intcount</td>";
								echo "<td valign='top'>$expense_day/$expense_month/$expense_year</td>";
								echo "<td valign='top'>$name</td>";
								echo "<td valign='top'>$payment_type</td>";
								echo "<td valign='top'>$payment_number</td>";
								echo "<td valign='top'>$transactiontime</td>";	
								echo "<td valign='top' align='right'>KES ".number_format($payment, 2)."</td>";
								
							echo "</tr>";
							$total_payment = $total_payment + $payment;	
						}
						$result = mysql_query("select petty_cash from fin_petty_cash_reduce");
						while ($row = mysql_fetch_array($result))
						{
							$petty_cash_balance = $row['petty_cash'];
						}
						?>
						</tbody>
						<tr bgcolor = '#E6EEEE'>
							<td colspan='6'><strong>Total Spent Month to Date</strong></td>
							<td align='right'><strong>KES <?php echo number_format($total_payment, 2) ?></strong></td>
						</tr>
						<tr>
							<td colspan="7">&nbsp;</td>
						</tr>
						<tr bgcolor = '#E6EEEE'>
							<td colspan='6'><strong>Balance on Hand as at <?php echo $expense_day.'/'.$expense_month.'/'.$expense_year ?> </strong></td>
							<td align='right'><strong>KES <?php echo number_format($petty_cash_balance, 2) ?></strong></td>
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
						<form id="frmDeptCategories" name="frmDeptCategories" method="GET" action="fin_petty_cash_details.php">
							<table border="0" width="100%">
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
