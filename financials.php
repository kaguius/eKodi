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
		$page_title = "Financial Module";
		include_once('includes/header.php');
		?>		
		<div id="page">
			<div id="content">
				<div class="post">
					<h2><?php echo $page_title ?> | e-kodi</h2>
					<h3>Day to day Accounts</h2>
					Which feature would you like to work with?
					<hr>
					<table width="100%" border="0" cellspacing="2" cellpadding="2" >
						<tr>
							<td width="50%" valign="top">
								<table width="100%" border="0" cellspacing="2" cellpadding="2" >
									<tr>
										<td valign='top'><a title = "Create Expenses" href="fin_create_expense.php?id=<?php echo $property_manager_id ?>"><img src="images/fin.jpeg" width="65px"></a></td>
										<td valign='top'><strong>Create Expenses</strong><br />
										This feature lets you create day to day expenses, it cannot be duplicated.</td>
									</tr>
									<tr>
										<td valign='top'><a href='fin_petty_cash.php'><img src="images/fin.jpeg" width="65px"></a></td>
										<td valign='top'><strong>Make Petty Cash Payments</strong><br />
										Make petty cash payments, using this feature.</td>
									</tr>
									<tr>
										<td valign='top'><a href='fin_petty_cash_details.php'><img src="images/fin.jpeg" width="65px"></a></td>
										<td valign='top'><strong>View Petty Cash Payments</strong><br />
										This feature allows you to view all Petty Cash payments in the system.</td>
									</tr>
									<tr>
										<td valign='top'><a href='fin_asset_register.php'><img src="images/fin.jpeg" width="65px"></a></td>
										<td valign='top'><strong>Asset Register</strong><br />
										This is a listing of all the Assets you have registered in the system.</td>
									</tr>
									
								</table>
							</td>
							<td width="50%" valign="top">
								<table width="100%" border="0" cellspacing="2" cellpadding="2" >
									<tr>
										<td valign='top'><a href='fin_create_inventory.php'><img src="images/fin.jpeg" width="65px"></a></td>
										<td valign='top'><strong>Create Asset Register	</strong><br />
										This feature allows you enter Asset details into the system.</td>
									</tr>
									<tr>
										<td valign='top'><a title = "Create Expenses" href="fin_pay_expenses.php?id=<?php echo $property_manager_id ?>"><img src="images/fin.jpeg" width="65px"></a></td>
										<td valign='top'><strong>Make Cash Book Payments</strong><br />
										With this feature you can make cash book payments.</td>
									</tr>
									<tr>
										<td valign='top'><a href='fin_cash_book.php'><img src="images/fin.jpeg" width="65px"></a></td>
										<td valign='top'><strong>View Cash Book Payments</strong><br />
										This feature allows you to view all the cash book payments done within a certain period.</td>
									</tr>
									
								</table>
							</td>
						</tr>
					</table>
					<hr>
					<br />
					<!--<h3>Final Accounts | e-kodi</h3>
					Which report would you like to work with?
					<hr>
					<table width="100%" border="0" cellspacing="2" cellpadding="2" >
						<tr>
							<td width="50%" valign="top">
								<table width="100%" border="0" cellspacing="2" cellpadding="2" >
									<tr>
										<td valign='top'><a href='fin_profit_n_loss.php'><img src="images/fin.jpeg" width="65px"></a></td>
										<td valign='top'><strong>Income Statement</strong><br />
										View the income statement for a certain period.</td>
									</tr>
									<!--<tr>
										<td valign='top'><a href='#'><img src="images/fin.jpeg" width="65px"></a></td>
										<td valign='top'><strong>Statements of Cashflow</strong><br />
										This feature lets you create property managers to the system.</td>
									</tr>
								</table>
							</td>
							<td width="50%" valign="top">
								<table width="100%" border="0" cellspacing="2" cellpadding="2" >
									<tr>
										<td valign='top'><a href='#'><img src="images/fin.jpeg" width="65px"></a></td>
										<td valign='top'><strong>Balance Sheet</strong><br />
										This feature enables you to optimize the database, makes it faster.</td>
									</tr>
								</table>
							</td>
						</tr>
					</table>-->
				</div>
			</div>
			<br class="clearfix" />
			</div>
		</div>
<?php
	}
	include_once('includes/footer.php');
?>
