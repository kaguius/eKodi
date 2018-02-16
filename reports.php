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
		include ("includes/core_functions.php");	
		include_once('includes/db_conn.php');
		$transactiontime = date("Y-m-d G:i:s");
		$page_title = "Reports";
		include_once('includes/header.php');
		?>		
		<div id="page">
			<div id="content">
				<div class="post">
					<h2><?php echo $page_title ?> | e-kodi</h2>
					Which report would you like to view?
					<hr>
					<table width="100%" border="0" cellspacing="2" cellpadding="2" >
						<tr>
							<td width="50%" valign="top">
								<table width="100%" border="0" cellspacing="2" cellpadding="2" >
									<?php if($adminstatus == 1){ ?>
									<tr height="85px">
										<td valign='top'><a href='property_manager.php'><img src="images/manager.jpeg" width="65px"></a></td>
										<td valign='top'><strong>Property Managers Report</strong><br />
										This report details all the property managers enlisted in the system..</td>
									</tr>
									<?php } ?>
									<tr height="85px">
										<td valign='top'><a href='deposit_report.php'><img src="images/deposit.jpg" width="65px"></a></td>
										<td valign='top'><strong>Property Deposits Report</strong><br />
										This report details all the deposits done per property.</td>
									</tr>
									<tr height="85px">
										<td valign='top'><a href='deposit_accounting.php'><img src="images/icon_banking.png" width="65px"></a></td>
										<td valign='top'><strong>Security Deposit Reporting</strong><br />
										This report lets you account for the security deposits</td>
									</tr> 										<tr height="85px">
										<td valign='top'><a href='statement.php'><img src="images/statement.jpeg" width="65px"></a></td>

										<td valign='top'><strong>Monthly Landlord Statement</strong><br />
										This report is a statement for the landlord, highlights the revenue, expenses and net revenue for the month.</td>
									</tr>
									<tr height="85px">
										<td valign='top'><a href='commission_report.php'><img src="images/commission.jpg" width="65px"></a></td>
										<td valign='top'><strong>Commissions Report</strong><br />
										This report details the commissions earned per property.</td>
									</tr>							
									<!--<tr height="85px">
										<td valign='top'><a href='repairs_report.php'><img src="images/repairs.jpg" width="65px"></a></td>
										<td valign='top'><strong>Repairs Report</strong><br />
										This report details all the reports done in a single month on all the units, shows total used up and justifications for the repairs.</td>
									</tr>-->
									
								</table>
							</td>
							<td width="50%" valign="top">
								<table width="100%" border="0" cellspacing="2" cellpadding="2" >
									<tr height="85px">
										<td valign='top'><a href='payments_receipts.php'><img src="images/cash.jpeg" width="65px"></a></td>
										<td valign='top'><strong>Daily Payments Receipts</strong><br />
										This report details all the daily payments, when recieved and who paid in.</td>
									</tr>
									<tr height="85px">
										<td valign='top'><a href='rent_report.php'><img src="images/rent.jpg" width="65px"></a></td>
										<td valign='top'><strong>Property Rent Report</strong><br />
										This report details all the rent payments done per property, time paid in and tenant who paid in.</td>
									</tr>
									<!--<tr height="85px">
										<td valign='top'><a href='landlord_statement.php'><img src="images/landlord.jpg" width="65px"></a></td>
										<td valign='top'><strong>Landlord Deposit/ Rent Statement Report</strong><br />
										This report is a statement for the landlord. It is categorised into two parts, deposits and rent statemant.</td>
									</tr>-->
									<tr height="85px">
										<td valign='top'><a href='yearly_statement.php'><img src="images/state.jpg" width="65px"></a></td>
										<td valign='top'><strong>Annual Landlord Statement</strong><br />
										This report is a statement for the landlord, highlights the revenue, expenses and net revenue for the year.</td>
									</tr>
									<!--<tr height="85px">
										<td valign='top'><a href='yearly_service_charge_account.php'><img src="images/coins.jpeg" width="65px"></a></td>
										<td valign='top'><strong>Service Charge Accounting</strong><br />
										This report is a statement to account for the usage of service charge across the year for a piece of property.</td>
									</tr>-->
									<tr height="85px">
										<td valign='top'><a href='receipts.php'><img src="images/receipts.jpg" width="65px"></a></td>
										<td valign='top'><strong>Print Receipts</strong><br />
										This features enables the administrator of the system to print receipts for all the transactions.</td>
									</tr>
									<tr height="85px">
										<td valign='top'><a href='remmitances_report.php'><img src="images/coins.jpeg" width="65px"></a></td>
										<td valign='top'><strong>Remmitances Report</strong><br />
										This report details all the reports done in a single month on all the units, shows total used up and justifications for the repairs.</td>
									</tr>
								</table>
							</td>
						</tr>
					</table>
					<hr>
				</div>
			</div>
			<br class="clearfix" />
			</div>
		</div>
<?php
	}
	include_once('includes/footer.php');
?>
