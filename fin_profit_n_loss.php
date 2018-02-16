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
		$page_title = "Profit & Loss Statement (Income Statement)";
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
			$expense_month = $_GET['month'];
			$expense_year = $_GET['year'];
		} 
		include_once('includes/header.php');
		if ($expense_month != "" || $expense_year != ""){
			$page_title = "Profit & Loss Statement (Income Statement)";
			$result_tender = mysql_query("select month from calender where id = '$comm_month'");
			while ($row = mysql_fetch_array($result_tender))
			{
				$actual_comm_month = $row['month'];
			}
			$expense_day = date("d");
			//$expense_month = date("m");
			//$expense_year = date("Y");
			$result_suppliers = mysql_query("select sum(amount) as amount from property_owner_remittances where remmitance_month = '$expense_month' and remmitance_year = '$expense_year'");
			while ($row = mysql_fetch_array($result_suppliers))
			{
				$sales_revenue = $row['amount'];
			}
			$total_expense_payment = 0;
		?>		
		<div id="page">
			<div id="content">
				<div class="post">
					<h2><?php echo $page_title ?> | e-kodi</h2>
					<strong>You are here:</strong> &raquo; <a href="index.php">Home</a> &raquo; <a href="financials.php">Financials</a> &raquo; Income Statement for <?php echo $lookup_company_name ?><br />
					<?php
					?>
					<strong>Sales Revenue</strong>					
					<table width="100%" border="0" cellspacing="2" cellpadding="2" class="display">
						<tr bgcolor = #F0F0F6>
							<td colspan='2'><strong>Sales Revenue</strong></td>
						</tr>
						<tr>
							<td>Sales Revenue</td>
							<td>KES <?php echo number_format($sales_revenue, 2) ?></td>
						<tr>
						<tr bgcolor = #F0F0F6>
							<td><strong>Total Sales Revenue</strong></td>
							<td><strong>KES <?php echo number_format($sales_revenue, 2) ?></strong></td>
						<tr>
						<tr>
							<td colspan='2'>&nbsp;</strong></td>
						</tr>
						<tr bgcolor = #F0F0F6>
							<td><strong>Gross Profit</strong></td>
							<td><strong>KES <?php echo number_format($sales_revenue, 2) ?></strong></td>
						<tr>
						<tr>
							<td colspan='2'>&nbsp;</strong></td>
						</tr>
						<tr bgcolor = #F0F0F6>
							<td colspan='2'><strong>Operating Expenses</strong></td>
						</tr>
						<?php
						$result_suppliers = mysql_query("select distinct expense_category from fin_expense_payment where manager_id = '$property_manager_id' order by expense_category asc");
						while ($row = mysql_fetch_array($result_suppliers))
						{
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
							echo "<tr>";
								echo "<td colspan='2'><strong>$expense_category_name</strong></td>";
							echo "</tr>";
							$result = mysql_query("select fin_expenses_items.expense_name, payment from fin_expense_payment inner join fin_expenses_items on fin_expenses_items.id = fin_expense_payment.expense_id where fin_expense_payment.manager_id = '$property_manager_id' and fin_expense_payment.expense_category = '$expense_category'");
							while ($row = mysql_fetch_array($result))
							{
								$expense_name = $row['expense_name'];
								$expense_payment = $row['payment'];
								echo "<tr>";
									echo "<td>$expense_name</td>";
									echo "<td>KES ".number_format($expense_payment, 2)."</td>";
								echo "</tr>";
								$total_expense_payment = $total_expense_payment + $expense_payment;
							}
							echo "<tr bgcolor = #F0F0F6>";
								echo "<td><strong>Total ".$expense_category_name." Expenses</strong></td>";
								echo "<td><strong>KES ".number_format($total_expense_payment, 2)."</strong></td>";
							echo "</tr>";
							$total_category_expense_payment = $total_category_expense_payment + $total_expense_payment;
							$total_expense_payment = 0;
						}
						$income_from_opertaions = $sales_revenue - $total_category_expense_payment; 							$taxes = $income_from_opertaions * (16/100);
						$net_profit = $income_from_opertaions - $taxes;
						$return_sales = ($net_profit / $sales_revenue) * 100;
						?>
						<tr bgcolor = #F0F0F6>
							<td><strong>Total Operating Expenses</strong></td>
							<td><strong>KES <?php echo number_format($total_category_expense_payment, 2) ?></strong></td>
						<tr>
						<tr>
							<td><strong>Income from Operations</strong></td>
							<td><strong>KES <?php echo number_format($income_from_opertaions, 2) ?></strong></td>
						<tr>
						<tr>
							<td><strong>Other Income</strong></td>
							<td><strong>KES <?php echo number_format(0, 2) ?></strong></td>
						<tr>
						<tr bgcolor = #F0F0F6>
							<td colspan='2'><strong>Taxes</strong></td>
						</tr>
						<tr>
							<td>Income Tax</strong></td>
							<td>KES <?php echo number_format($taxes, 2) ?></strong></td>
						<tr>
						<tr>
							<td colspan='2'>&nbsp;</strong></td>
						</tr>
						<tr bgcolor = #F0F0F6>
							<td><strong>Net Profit</strong></td>
							<td><strong>KES <?php echo number_format($net_profit, 2) ?></strong></td>
						<tr>
						<tr>
							<td colspan='2'>&nbsp;</strong></td>
						</tr>
						<tr bgcolor = #F0F0F6>
							<td><strong>Return on Sales </strong></td>
							<td><strong><?php echo number_format($return_sales, 2) ?>%</strong></td>
						<tr>
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
						<form id="frmDeptCategories" name="frmDeptCategories" method="GET" action="fin_profit_n_loss.php">
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
