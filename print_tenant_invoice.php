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
		$tenant_id = "";
		$transactiontime = date("Y-m-d G:i:s");
		$page_title = "Tenant Statement Report";
		//include_once('includes/header.php');
		if (!empty($_GET)){	
			$tenant_id = $_GET['tenant_id'];
			$property_id = $_GET['property_id'];
			$report_start_date = $_GET['report_start_date'];
			$report_end_date = $_GET['report_end_date'];
		} 
		$rent_month = date("m");
		$rent_year = date("Y");
		$rent_day = date("d");
		$invoice_date = date("Y-m-d");
		$invoice_date = date("M, Y", strtotime($invoice_date));
		if ($tenant_id != "" && $property_id != "" && $report_start_date != "" && $report_end_date != ""){
			$report_start_date = date('Y-m-d', strtotime(str_replace('-', '/', $report_start_date)));
			$report_start_month = date('m',strtotime($report_start_date));
			$report_start_year = date('Y',strtotime($report_start_date));
			$report_end_date = date('Y-m-d', strtotime(str_replace('-', '/', $report_end_date)));
			$report_end_month = date('m',strtotime($report_end_date));
			$report_end_year = date('Y',strtotime($report_end_date));
			$report_start_date = date("d M, Y", strtotime($report_start_date));
			$report_end_date = date("d M, Y", strtotime($report_end_date));
			$sql = mysql_query("select tenant_code, tenant_name, mailing_address, phone_number, email_address from tenants where id = '$tenant_id'");
			while($row = mysql_fetch_array($sql)) {
				$tenant_code = $row['tenant_code'];
				$tenant_name = $row['tenant_name']; 
				$tenant_name = ucwords(strtolower($tenant_name));
				$mailing_address = $row['mailing_address']; 
				$phone_number = $row['phone_number']; 
				$email_address = $row['email_address']; 
			}
			
			$sql = mysql_query("select id, property_name, property_owner, location, propety_contact, lr_number, property_type, manager_id, bank_name, bank_branch, account_name, account_number, water_cost from property_details where id = '$property_id'");
			while($row = mysql_fetch_array($sql)) {
				$property_name = $row['property_name']; 
				$property_name = ucwords(strtolower($property_name));
				$property_owner = $row['property_owner']; 
				$location = $row['location']; 
				$propety_contact = $row['propety_contact']; 
				$lr_number = $row['lr_number']; 
				$property_type = $row['property_type']; 
				$manager_id = $row['manager_id']; 
				$bank_name = $row['bank_name'];
				$bank_branch = $row['bank_branch'];
				$account_name = $row['account_name'];
				$account_number = $row['account_number'];
				$water_pay_cost = $row['water_cost'];  
			} 
			$page_title = "Tenant Invoice";
			$sql = mysql_query("select sum(payment)payment from payments where tenant_id = '$tenant_id' and rent_month = '$rent_month' and rent_year = '$rent_year'");
			while($row = mysql_fetch_array($sql)) {
				$payment = $row['payment']; 
			}
			$sql = mysql_query("select pin_number, vat_number from property_managers where id = '$manager_id'");
			while($row = mysql_fetch_array($sql)) {
				$pin_number = $row['pin_number']; 
				$vat_number = $row['vat_number']; 
			} 
			?>
			<div id="page">
				<div id="content">
					<div class="post">
					<table borber="1" width="300px">
						<tr>
							<td>
							<font face="verdana" size="2">
							<strong>TENANT INVOICE</strong><br />
							<strong>DATE:</strong> <?php echo $report_start_date ?><br /> 
							<strong>INVOICE No:</strong> <?php echo $report_start_month.''.$report_start_year.'/'.$tenant_code ?><br />
							<table width="100%" border="0" cellspacing="2" cellpadding="2">
							<tr>
								<td width="50%" valign="top">
									<strong><font face="verdana" size="2"><u>Property</u></strong><br />
									<strong><font face="verdana" size="2">Landlord: </strong><?php echo $property_owner ?><br />
									<strong><font face="verdana" size="2">Property: </strong><?php echo $property_name ?><br />
									<strong><font face="verdana" size="2">Location: </strong><?php echo $location ?><br />
									<strong><font face="verdana" size="2">Contact: </strong><?php echo $propety_contact ?>
								</td>
								<td width="50%" valign="top" align="right">
									<strong><font face="verdana" size="2"><u>Tenant</u></strong><br />
									<strong><font face="verdana" size="2">Name: </strong><?php echo $tenant_name ?><br />
									<strong><font face="verdana" size="2">Code: </strong><?php echo $tenant_code ?><br />
									<strong><font face="verdana" size="2">Contact: </strong><?php echo $phone_number ?>
								</td>
							</tr>
							</table>
							<?php
							$result = mysql_query("select sum(previous_reading)previous_reading, sum(last_reading)last_reading, sum(cost)cost, sum(balance)balance from water_meter_details where tenant = '$tenant_id' and month between '$report_start_month' and '$report_end_month' and year between '$report_start_year' and '$report_end_year' and paid = '0'");
							$water_cost = 0;
							$water_balance = 0;
							while ($row = mysql_fetch_array($result))
							{
								$intcount++;
								$water_cost = $row['cost'];
								$water_balance = $row['balance'];
								$previous_reading = $row['previous_reading'];
								$last_reading = $row['last_reading'];
								$units_used = $last_reading - $previous_reading;
								if($water_balance > 0){
									$water_pay = $water_balance;
								}
								else{
									$water_pay = $water_cost;
								}
							}		
							$result_suppliers = mysql_query("select rent, garbage_fee, parking_fee from property_item where tenant = '$tenant_id'");
							while ($row = mysql_fetch_array($result_suppliers))
							{
								$intcount++;
								$rent = $row['rent'];
								$garbage_fee = $row['garbage_fee'];
								$parking_fee = $row['parking_fee'];
							}	
							$result_suppliers = mysql_query("select sum(balance)balance, sum(display_balance)display_balance from payments where tenant_id = '$tenant_id'");
							while ($row = mysql_fetch_array($result_suppliers))
							{
								$display_balance = $row['display_balance'];
							}	
							$sub_total = $rent + $parking_fee + $water_pay + $garbage_fee + $display_balance;
							if($property_type == "Commercial"){
								$vat = (16/100) * $sub_total;
							}
							else{
								$vat = 0;
							}
							$total = $sub_total + $vat;
							?>
							<table border="0" width="100%">
									<tr>
										<td width="60%"><strong><font face="verdana" size="2">Description</strong></td>						
										<td width="40%"><strong><font face="verdana" size="2">Pay Due</strong></td>
									</tr>
									<tr>	
										<td><font face="verdana" size="2">Rent</th>
										<td align="right"><font face="verdana" size="2"><?php echo number_format($rent, 2) ?></td>
									</tr>
									<tr>	
										<td><font face="verdana" size="2">Garbage</th>
										<td align="right"><font face="verdana" size="2"><?php echo number_format($garbage_fee, 2) ?></td>
									</tr>
									<tr>
										<td><font face="verdana" size="2">Prv Rd</td>
										<td align="right"><font face="verdana" size="2"><?php echo number_format($previous_reading, 2) ?></td>
									</tr>
									<tr>
										<td><font face="verdana" size="2">Curr Rd</td>
										<td align="right"><font face="verdana" size="2"><?php echo number_format($last_reading, 2) ?></td>
									</tr>
									<tr>
										<td><font face="verdana" size="2">Units</td>
										<td align="right"><font face="verdana" size="2"><?php echo number_format($units_used, 2) ?></td>
									</tr>
									<tr>
										<td><font face="verdana" size="2">Rate</td>
										<td align="right"><font face="verdana" size="2"><?php echo number_format($water_pay_cost, 2) ?></td>
									</tr>
									<tr>	
										<td><font face="verdana" size="2">Water</th>
										<td align="right"><font face="verdana" size="2"><?php echo number_format($water_pay, 2) ?></td>
									</tr>
									<tr>	
										<td><font face="verdana" size="2">Previous Balance</th>
										<td align="right"><font face="verdana" size="2"><?php echo number_format($display_balance, 2) ?></td>
									</tr>
									<tr>	
										<td><font face="verdana" size="2">Sub Total</th>
										<td align="right"><font face="verdana" size="2"><?php echo number_format($sub_total, 2) ?></td>
									</tr>
									<tr>	
										<td><font face="verdana" size="2">VAT</th>
										<td align="right"><font face="verdana" size="2"><?php echo number_format($vat, 2) ?></td>
									</tr>
									<tr>	
										<td><strong><font face="verdana" size="2">Total</strong></th>
										<td align="right"><strong><font face="verdana" size="2"><?php echo number_format($total, 2) ?></strong></td>
									</tr>
								</tbody>
							</table>
							<br />
							<font face="verdana" size="1">
							Please deposit (cash only) on time (before 5th) to avoid penalties:<br />
							- <?php echo $bank_name ?><br />
								<?php 
									if($bank_branch != ""){ 
										echo $bank_branch."<br />"; 
									} 
								?>
								- <?php echo $account_name ?><br />
								- <?php echo $account_number ?><br />
							<br />
							<strong>Note:</strong> <br />
							- Always indicate your name and house number when making the deposits.<br />
							- The original deposit slip should be dropped in the pigeon box provided at the premises. <br />
							- Please retain a photocopy of the deposit slip as evidence of payment.<br />
							- Payment that exceeds the 5th of every month shall attract a 10% penalty daily.<br /><br />
							<strong>e-Kodi Property Manager</strong> <br />Designed and developed by Clyde Systems Ltd<br />Tel: 0704 469 814, www.e-kodi.com</font>
							</td>
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
						<form id="frmDeptCategories" name="frmDeptCategories" method="GET" action="tenant_invoice.php">
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
								<tr>
									<td><input type="hidden" name="tenant_id" value="<?php echo $tenant_id ?>">
									<input type="hidden" name="property_id" value="<?php echo $property_id ?>"></td>
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
	//include_once('includes/footer.php');
	?>
