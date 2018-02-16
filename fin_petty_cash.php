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
		$page_title = "Make Petty Cash Payments";
		include ("includes/core_functions.php");
		include_once('includes/db_conn.php');
		if (!empty($_GET)){	
			$manager_id = $_GET['id'];
		}
		$expense_month = date("m");
		$expense_year = date("Y");
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
		$transactiontime = date("Y-m-d G:i:s");

		$name = "";
		$payment = "";
		$payment_type = "";
		$payment_number = "";


		include_once('includes/header.php');
		?>		
		<div id="page">
			<div id="content">
				<div class="post">
					<h2><?php echo $page_title ?> | e-kodi</h2>
					<strong>You are here:</strong> &raquo; <a href="index.php">Home</a> &raquo; <a href="financials.php">Financials</a> &raquo; Create Petty Cash Postings<br />
					<form id="frmCashBookPayments" name="frmCashBookPayments" method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
					<?php					
					$result = mysql_query("select petty_cash from fin_petty_cash_reduce");
					while ($row = mysql_fetch_array($result))
					{
						$petty_cash_amount_disp = $row['petty_cash'];
					}
					if($petty_cash_amount_disp < 150){
					?>
						<font color="red">NOTICE: The petty cash box has <strong> KES <?php echo number_format($petty_cash_amount_disp, 2) ?></strong>, please top up. Click here to see the payment details: Please <a href="fin_petty_cash_details.php">click here </a></font>
					<?php
					}
					else{
					?>
						<font color="green">NOTICE: You have <strong>KES <?php echo number_format($petty_cash_amount_disp, 2) ?> </strong>in your Petty Cash Box. Please top up when balance is below <strong>KES 150.00</strong></font>
					<?php
					}
					?>
					<table width="100%" border="0" cellspacing="2" cellpadding="2" class="display">
						<thead bgcolor="#E6EEEE">
							<tr>
								<th>#</th>
								<th>Expense Name</th>
								<th>Payment</th>
								<th>Payment Type</th>
								<th>Payment Number</th>
							</tr>
						</thead>
						<tbody>
						<?php
						//$id = 10;
						for($expense_payment_counter = 1 ;  $expense_payment_counter <= 10; $expense_payment_counter++)		
						{
							$intcount++;
							if ($intcount % 2 == 0) {
								$display= '<tr bgcolor = #F0F0F6>';
							}
							else {
								$display= '<tr>';
							}
							echo $display;
								echo "<td valign='top'>$intcount</td>";
								//echo "<input type='hidden' id='manager_id[$expense_payment_counter]' name='manager_id[$expense_payment_counter]' value='$property_manager_id'>";
								echo "<td><input name='name[$expense_payment_counter]' id='name[$expense_payment_counter]' type='text' class='textfield' value='$petty_cash_name' size='20'></td>";
								echo "<td><input name='payment[$expense_payment_counter]' id='payment[$expense_payment_counter]' type='text' class='textfield' value='$petty_cash_payment' size='15'></td>";	
								echo "<td><input name='payment_type[$expense_payment_counter]' id='payment_type[$expense_payment_counter]' type='text' class='textfield' value='$petty_cash_payment_type' size='10'></td>";
								echo "<td><input name='payment_number[$expense_payment_counter]' id='payment_number[$expense_payment_counter]' type='text' class='textfield' value='$petty_cash_payment_number' size='15'></td>";
							}
							echo "<input type='hidden' id='expense' name='expense' value='$expense_payment_counter'>";
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
					</form>
				</div>
			</div>
			<br class="clearfix" />
			</div>
		</div>
		<?php
			if (!empty($_POST)) {
				$expense_day = date("d");
				$expense_month = date("m");
				$expense_year = date("Y");				
				//$manager_id = $_POST['manager_id'];

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
						$company_manager_id = $manager_id[$expense_payment_counter];
						
						//Store the actual expense paid for the month, year
						$sql3="INSERT INTO fin_petty_cash_payment (manager_id, name, payment, payment_type, payment_number, petty_cash_day, petty_cash_month, petty_cash_year, UID, transactiontime) 
						VALUES('$company_manager_id','$company_name', '$company_payment', '$company_payment_type', '$company_payment_number', '$expense_day', '$expense_month', '$expense_year', '$userid', '$transactiontime')";
						echo $sql3."<br />";
						//$result = mysql_query($sql3);	

						//$petty_cash_amount = 0;
						
						
						$result = mysql_query("select petty_cash from fin_petty_cash_reduce");
						while ($row = mysql_fetch_array($result))
						{
							$petty_cash_amount = $row['petty_cash'];
						}							
							
						$petty_cash_amount = $petty_cash_amount - $company_payment;

						$sql2="update fin_petty_cash_reduce SET petty_cash='$petty_cash_amount'";
						//$result2 = mysql_query($sql2);
						echo $sql2."<br />";					
						
					}
				}
				
				?>
					<script type="text/javascript">
					<!--
						//document.location = "fin_petty_cash_details.php";
					//-->
					</script>
				<?php
		}
	}
	?>
<?php
	include_once('includes/footer.php');
?>
