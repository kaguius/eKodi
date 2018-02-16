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
		$page_title = "Banking Details";
		include_once('includes/db_conn.php');
		$location = "";
		$floor = "";
		$rent = "";
		$bank_deposit = "";
		$transactiontime = date("Y-m-d G:i:s");
		if (!empty($_GET)){	
			$unit_id = $_GET['unit_id'];
			$tenant_id = $_GET['tenant_id'];
			$property_id = $_GET['property_id'];
			$deposit_id = $_GET['deposit_id'];
			$mode = $_GET['mode'];
			$banking_amt = $_GET['banking_amt'];
		} 
		$result_suppliers = mysql_query("select id, property_owner, bank_name, bank_branch, account_name, account_number from property_details where id = '$property_id'");
		while ($row = mysql_fetch_array($result_suppliers))
		{
			$property_owner = $row['property_owner'];
			$bank_name = $row['bank_name'];
			$bank_branch = $row['bank_branch'];
			$account_name = $row['account_name'];
			$account_number = $row['account_number'];
		}
		$service_charge = "";
		include_once('includes/header.php');
		?>		
		<div id="page">
			<div id="content">
				<div class="post">
					<h2><?php echo $page_title ?> | e-kodi</h2>
					<strong>Property Owner: </strong><?php echo $property_owner ?><br />
					<form id="frmCreatePropertyItem" name="frmCreatePropertyItem" method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
						<table border="0" width="100%">
							<tr >
								<td width="30%"><strong>Bank Name: </strong> <?php echo $bank_name ?></td>
								<td width="70%"><strong>Branch Name: </strong> <?php echo $bank_branch ?></td>
							</tr>
							<tr >
								<td width="30%"><strong>Account Name: </strong> <?php echo $account_name ?></td>
								<td width="70%"><strong>Account Number: </strong> <?php echo $account_number ?></td>
							</tr>
							<tr >
								<td colspan="2"><strong>Banking Amount: </strong> KES <?php echo number_format($banking_amt, 2) ?></td>
							</tr>
							<tr>
								<td>
									<input type="hidden" name="unit_id" value="<?php echo $unit_id ?>">
								</td>
								<td>
									<input type="hidden" name="tenant_id" value="<?php echo $tenant_id ?>">
								</td>
								<td>
									<input type="hidden" name="deposit_id" value="<?php echo $deposit_id ?>">
								</td>
								<td>
									<input type="hidden" name="mode" value="<?php echo $mode ?>">
								</td>
							</tr>
							<tr >
								<td width="30%" valign='top'>Bank Deposit Details *</td>
								<td width="70%">
									<textarea title="Enter Bank Deposit Details" name="bank_deposit" id="bank_deposit" cols="45" rows="5" class="textfield"><?php echo $bank_deposit ?></textarea>
								</td>
							</tr>
						</table>
						<table border="0" width="100%">
							<tr>
								<td valign="top">
									<button name="btnNewCard" id="button">Save</button>
								</td>
								<td align="right">
									<button name="reset" id="button2" type="reset">Reset</button>
								</td>		
							</tr>
						</table>
						<script  type="text/javascript">
							var frmvalidator = new Validator("frmCreatePropertyItem");
							frmvalidator.addValidation("bank_deposit","req","Please enter the Bank deposit Details");
						</script>
					</form>
				</div>
			</div>
			<br class="clearfix" />
			</div>
		</div>
		<?php
			if (!empty($_POST)) {
				$unit_id = $_POST['unit_id'];
				$tenant_id = $_POST['tenant_id'];
				$bank_deposit = $_POST['bank_deposit'];
				$deposit_id = $_POST['deposit_id'];
				$mode = $_POST['mode'];
				
				$sql3="
					INSERT INTO banking_deposit (unit_id, tenant_id, bank_deposit, mode, transactiontime)
					VALUES('$unit_id', '$tenant_id', '$bank_deposit', '$mode', '$transactiontime')";
				$result = mysql_query($sql3);
				
				if($mode == 'deposit'){
					$sql2="update payments SET banked='1' where id = '$deposit_id'";
					$result2 = mysql_query($sql2);
					?>
						<script type="text/javascript">
						<!--
							document.location = "deposit_report.php";
						//-->
						</script>
					<?php
				}
				else{
					$sql2="update payments SET banked='1' where id = '$deposit_id'";
					$result2 = mysql_query($sql2);
					?>
						<script type="text/javascript">
						<!--
							document.location = "rent_report.php";
						//-->
						</script>
					<?php
				}
			}
	}
?>
<?php
	include_once('includes/footer.php');
?>
