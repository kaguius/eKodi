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
		$rem_month = date("m");
		$rem_year = date("Y");
		$page_title = "Cash Book Payments";
		include ("includes/core_functions.php");
		include_once('includes/db_conn.php');
		if (!empty($_GET)){	
			$manager_id = $_GET['id'];
		}
		if (!empty($_GET)){	
			$expense_month = $_GET['month'];
			$expense_year = $_GET['year'];
			$property_id = $_GET['property_name'];
		} 

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

		$result = mysql_query("select sum(amount)amount from property_owner_remittances where remmitance_month = '$expense_month' and remmitance_year = '$expense_year' and property_id = '$property_id'");
		while ($row = mysql_fetch_array($result))
		{
			$month_cash_book = $row['amount'];
		}
		$result = mysql_query("select sum(payment)payment from fin_expense_payment where expense_month = '$expense_month' and expense_year = '$expense_year' and property_id = '$property_id'");
		while ($row = mysql_fetch_array($result))
		{
			$running_payments = $row['payment'];
		}
		$running_cash_book = $month_cash_book - $running_payments;
		$transactiontime = date("Y-m-d G:i:s");

		$name = "";
		$payment = "";
		$payment_type = "";
		$payment_number = "";


		include_once('includes/header.php');
		if ($expense_month != "" || $expense_year != ""){
			$page_title = "Detailed Cash Book Payments";
			$result_tender = mysql_query("select month from calender where id = '$comm_month'");
			while ($row = mysql_fetch_array($result_tender))
			{
				$actual_comm_month = $row['month'];
			}
		?>				
		<div id="page">
			<div id="content">
				<div class="post">
					<h2><?php echo $page_title ?> | e-kodi</h2>
					<strong>You are here:</strong> &raquo; <a href="index.php">Home</a> &raquo; <a href="financials.php">Financials</a> &raquo; Create expense post for <?php echo $lookup_company_name ?><br />
					<table width="100%" border="0" cellspacing="2" cellpadding="2" >
						<tr bgcolor = '#E6EEEE'>
							<td><strong>Cash Book Running Total for the Month:</strong></td>
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
					<form id="frmCashBookPayments" name="frmCashBookPayments" method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
					<table width="100%" border="0" cellspacing="2" cellpadding="2" class="display">
						<thead bgcolor="#E6EEEE">
							<tr>
								<th>#</th>
								<th>Expense Category</th>
								<th>Expense Name</th>
								<th>Company Name</th>
								<th>Payment</th>
								<th>Payment Type</th>
								<th>Payment Number</th>
							</tr>
						</thead>
						<tbody>
						<?php
						$result_suppliers = mysql_query("select id, expense_category, expense_name, expense_code, manager_id from fin_expenses_items where property_id = '$property_id' order by id, expense_name asc");
						$intcount = 0;
						while ($row = mysql_fetch_array($result_suppliers))
						{
							$intcount++;
							$id = $row['id'];
							$expense_category = $row['expense_category'];
							$expense_name = $row['expense_name'];
							$expense_code = $row['expense_code'];
							$manager_id = $row['manager_id'];

							if($expense_category == 1){
								$expense_category_name = 'Sales & Marketing';
							}
							elseif($expense_category == 2){
								$expense_category_name = 'Research & Development';
							}
							else{
								$expense_category_name = 'General & Administrative';
							}
							if ($intcount % 2 == 0) {
								$display= '<tr bgcolor = #F0F0F6>';
							}
							else {
								$display= '<tr>';
							}
							echo $display;
								echo "<input type='hidden' id='expense_id[$id]' name='expense_id[$id]' value='$id'>";
								echo "<input type='hidden' id='expense_name_view[$id]' name='expense_name_view[$id]' value='$expense_name'>";
								echo "<input type='hidden' id='property_id[$id]' name='property_id[$id]' value='$property_id'>";
								echo "<input type='hidden' id='expense_category[$id]' name='expense_category[$id]' value='$expense_category'>";
								echo "<td valign='top'>$intcount</td>";
								echo "<td valign='top'>$expense_category_name</td>";
								echo "<td valign='top'>$expense_name</td>";
								echo "<td><input name='name[$id]' id='name[$id]' type='text' class='textfield' value='$name' size='20'></td>";
								echo "<td><input name='payment[$id]' id='payment[$id]' type='text' class='textfield' value='$payment' size='15'></td>";	
								echo "<td><input name='payment_type[$id]' id='payment_type[$id]' type='text' class='textfield' value='$payment_type' size='10'></td>";
								echo "<td><input name='payment_number[$id]' id='payment_number[$id]' type='text' class='textfield' value='$payment_number' size='15'></td>";
							}
							echo "<input type='hidden' id='expense' name='expense' value='$id'>";
							?>
							</tbody>
						</table>
						<br />
						<table border="0" width="100%">
							<tr>
								<td valign="top">
									<button name="btnNewCard" id="button">Post</button>
								</td>
								<td align="right">
									<button name="reset" id="button2" type="reset">Reset</button>
								</td>		
							</tr>
						</table>
						<script  type="text/javascript">
							var frmvalidator = new Validator("frmCashBookPayments");
							frmvalidator.addValidation("expense_name","req","Please enter the Expense Name");
							frmvalidator.addValidation("expense_code","req","Please enter the Expense Code");
						</script>
					</form>
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
						<form id="frmDeptCategories" name="frmDeptCategories" method="GET" action="fin_pay_expenses.php">
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
			if (!empty($_POST)) {
				$expense_day = date("d");
				$expense_month = date("m");
				$expense_year = date("Y");
				$expense_id = $_POST['expense_id'];
				$expense_name_view = $_POST['expense_name_view'];				
				$property_id = $_POST['property_id'];
				$expense_category = $_POST['expense_category'];

				$name = $_POST['name'];	
				$payment = $_POST['payment'];
				$payment_type = $_POST['payment_type'];
				$payment_number = $_POST['payment_number'];
			
				$expense = $_POST['expense'];

				for($expense_payment_counter = 1 ;  $expense_payment_counter <= $expense; $expense_payment_counter++) 					{		
					if ($payment[$expense_payment_counter] != 0) {
						$company_name = $name[$expense_payment_counter];	
						$company_payment = $payment[$expense_payment_counter];
						$company_payment_type= $payment_type[$expense_payment_counter];
						$company_payment_number = $payment_number[$expense_payment_counter];
						$company_expense_id = $expense_id[$expense_payment_counter];
						$company_expense_expense_view = $expense_name_view[$expense_payment_counter];
						$company_property_id = $property_id[$expense_payment_counter];
						$company_expense_category = $expense_category[$expense_payment_counter];
						
						//Store the actual expense paid for the month, year
						$sql3="INSERT INTO fin_expense_payment (expense_id, expense_category, property_id, name, payment, payment_type, payment_number, expense_day, expense_month, expense_year, UID, transactiontime) 
						VALUES('$company_expense_id', '$company_expense_category', '$company_property_id','$company_name', '$company_payment', '$company_payment_type', '$company_payment_number', '$expense_day', '$expense_month', '$expense_year', '$userid', '$transactiontime')";
						echo $sql3."<br />";
						//$result = mysql_query($sql3);	
						
						
						if($company_expense_expense_view == 'Petty Cash'){
							$petty_cash_amount = 0;
							$result = mysql_query("select petty_cash from fin_petty_cash_reduce");
							while ($row = mysql_fetch_array($result))
							{
								$petty_cash_amount = $row['petty_cash'];
							}							
							
							$petty_cash_amount = $petty_cash_amount + $company_payment;

							if($petty_cash_amount == 0){
								$sql4="INSERT INTO fin_petty_cash_reduce (petty_cash) VALUES('$petty_cash_amount')";
								echo $sql4."<br />";
								//$result = mysql_query($sql4);
							}
							else{
								$sql2="update fin_petty_cash_reduce SET petty_cash='$petty_cash_amount'";
								//$result2 = mysql_query($sql2);
								echo $sql2."<br />";
							}
						}					
						
					}
				}
				
				?>
					<script type="text/javascript">
					<!--
						//document.location = "fin_cash_book.php";
					//-->
					</script>
				<?php
		}
	}
	?>
<?php
	include_once('includes/footer.php');
?>
