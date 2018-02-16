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
		$page_title = "Expense Payment";
		include ("includes/core_functions.php");	
		include_once('includes/db_conn.php');
		$transactiontime = date("Y-m-d G:i:s");
		$expense_period = date("F, Y");
		$expense_month = date("m");
		$expense_year = date("Y");
		$expense_payment = "";
		$expense_pay = "";
		$expense_paid = array();
		if (!empty($_GET)){	
			$property_id = $_GET['property_name'];
		}
		$result_suppliers = mysql_query("select id, property_name, commission, location from property_details where id = '$property_id'");
		while ($row = mysql_fetch_array($result_suppliers))
		{
			$property_name = $row['property_name'];
		}
		$result_rent_paid = mysql_query("select expense_id, expense_payment from expense_payment where expense_month = '$expense_month' and expense_year = '$expense_year'");
		$expense_counter = 0 ;
		while ($row = mysql_fetch_array($result_rent_paid))
		{
			$expense_paid[$expense_counter] = $row['expense_id'];
			$expense_payment[$expense_counter] = $row['expense_payment'];
			$expense_counter++ ;
		}
		
		include_once('includes/header.php');
		?>		
		<div id="page">
			<div id="content">
				<div class="post">
					<h2><?php echo $page_title ?> | e-kodi</h2>
					<strong>You are here:</strong> &raquo; <a href="index.php">Home</a> &raquo; <a href="property_expense_payment.php">Expenses</a> &raquo; <a href="property_expense_payment.php">Property Expenses Payment</a> &raquo; Expense Payment for <?php echo $property_name ?><br />
					<p>Month: <?php echo $expense_period ?></p>
					<form id="frmExpensePayment" name="frmExpensePayment" method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
						<table width="100%" border="0" cellspacing="2" cellpadding="2" >
						<thead bgcolor="#E6EEEE">
							<tr>
								<th>#</th>
								
								<th>Expense Detail</th>
								<th>Budget</th>
								<th>Expense Collected</th>
							</tr>
						</thead>
						<tbody>
						<?php
							$result_suppliers = mysql_query("select expense_items.id, expense_name, budget_expense from expense_items inner join property_details on property_details.id = expense_items.property_id where expense_items.property_id = '$property_id'");
							$intcount = 0;							
							$NumberOfRows = mysql_num_rows($result_suppliers);
							if($NumberOfRows == 0){
								echo "<tr>";
									echo "<td valign='top' colspan='7'><strong>No expense items for $property_name have been entered in the system.</strong></td>";
								echo "</tr>";
							}
							else{
								while ($row = mysql_fetch_array($result_suppliers))
								{
									$intcount++;								
									$id = $row['id'];
									$expense_name = $row['expense_name'];
									$budget_expense = $row['budget_expense'];
									
									if ($intcount % 2 == 0) {
										$display= '<tr bgcolor = #F0F0F6>';
									}
									else {
										$display= '<tr>';
									}
									
									echo $display;
										echo "<td valign='top'>$intcount</td>";
										echo "<input type='hidden' id='property_id[$id]' name='property_id[$id]' value='$property_id'>";
										echo "<input type='hidden' id='expense_id[$id]' name='expense_id[$id]' value='$id'>";
										echo "<td valign='top'>$expense_name</td>";
										echo "<td valign='top'>KES ".number_format($budget_expense, 2)."</td>";
										$hasPaid = false ; 
										for($expenses_counter = 0; $expenses_counter < count($expense_paid); $expenses_counter++){
											if ($expense_paid[$expenses_counter] == $id) {
												// if the value has not been found, no need to continue looping
												$hasPaid = true ;
												//$rent_collected = $tenant_actual_payment[$expenses_counter];
											}
										}
										if($hasPaid) {
											$expenses = mysql_query("select expense_payment from expense_payment where expense_id = '$id' and property_id = '$property_id' and expense_month = '$expense_month' and expense_year = '$expense_year'");
											while ($row = mysql_fetch_array($expenses))
											{
												$expense_payment = $row['expense_payment'];
											}
											echo "<td>KES <input name='expense_pay[$id]' id='expense_pay[$id]' type='text' class='textfield' value='$expense_payment' size='15'></td>";
											//echo "<td>The expense has been paid.</td>";
											//$rent_collected = $rent_collected + $monthly_rent;
										}
										else{
											echo "<td>KES <input name='expense_pay[$id]' id='expense_pay[$id]' type='text' class='textfield' value='$expense_pay' size='15'></td>";
										}

									echo "</tr>";	
								}
								echo "<input type='hidden' id='expense' name='expense' value='$id'>";
							}							
							?>
							<tr>
								<td colspan="9" align="left">
								<button name="submit" id="button" onclick="return CheckForm();">Make Payment</button>								
							</tr>
						</tbody>
						</table>
						<script  type="text/javascript">
							var frmvalidator = new Validator("frmExpensePayment");
							frmvalidator.addValidation("expense","req","Please enter the Expense Payment");
						</script>
					</form>
				</div>
			</div>
			<br class="clearfix" />
			</div>
		</div>
		<?php
			if (!empty($_POST)) {
				$expense_month = date("m");
				$expense_year = date("Y");
				$expense_id = $_POST['expense_id'];	
				$expense_pay = $_POST['expense_pay'];	
				$property_id = $_POST['property_id'];
				$expense = $_POST['expense'];
				for($expense_payment_counter = 1 ;  $expense_payment_counter <= $expense; $expense_payment_counter++) {				
					if ($expense_pay[$expense_payment_counter] != 0) {
						$expense_payment_unit = $expense_pay[$expense_payment_counter];
						$property_unit = $property_id[$expense_payment_counter];
						$expense_Unit_id = $expense_id[$expense_payment_counter];

						$expense_payment = 0;
						$expenses = mysql_query("select expense_payment from expense_payment where expense_id = '$expense_Unit_id' and property_id = '$property_unit' and expense_month = '$expense_month' and expense_year = '$expense_year'");
						while ($row = mysql_fetch_array($expenses))
						{
							$expense_payment = $row['expense_payment'];
						}
						
						if($expense_payment > 0){
							$sql2="update expense_payment SET expense_payment='$expense_payment_unit' where expense_id = '$expense_Unit_id' and property_id = '$property_unit' and expense_month = '$expense_month' and expense_year = '$expense_year'";
							$result2 = mysql_query($sql2);
							//echo $sql2."<br />";
						}
						else{
							//Store the actual expense paid for the month, year
							$sql3="INSERT INTO expense_payment (property_id, expense_id, expense_payment, expense_month, expense_year, transactiontime, UID) 
							VALUES('$property_unit', '$expense_Unit_id', '$expense_payment_unit','$expense_month', '$expense_year', '$transactiontime', '$userid')";
							//echo $sql3."<br />";
							$result = mysql_query($sql3);						
						}
					}
				}
				$query = "expense_payment.php?property_name=$property_unit";
				
				?>
					<script type="text/javascript">
					<!--
						document.location = "<?php echo $query ?>";
					//-->
					</script>
				<?php
		}
	}
?>
<?php
	include_once('includes/footer.php');
?>
