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
		$tax_percent = 0/100;
		$rent_month = "";
		$rent_year = "";
		$property_name = "";
		$actual_rent_month = date("m");
		$actual_rent_year = date("Y");
		$transactiontime = date("Y-m-d G:i:s");
		$page_title = "Print Receipts";
		if (!empty($_GET)){	
			$property_id = $_GET['property_id'];
			$payment_id = $_GET['id'];
		} 
			
			$result_tender = mysql_query("select month from calender where id = '$rent_month'");
			while ($row = mysql_fetch_array($result_tender))
			{
				$actual_rent_month = $row['month'];
			}
			//$rent_period = date("$rent_month, $rent_year");
			$sql = mysql_query("select id, property_name, property_owner, property_type, location, propety_contact, commission, taxes, bank_name, bank_branch, account_name, account_number, water_cost from property_details where id = '$property_id'");
			while($row = mysql_fetch_array($sql)) {
				$property_name = $row['property_name']; 
				$property_owner = $row['property_owner']; 
				$location = $row['location']; 
				$property_contact = $row['propety_contact']; 
				$property_commission = $row['commission'];
				$property_type = $row['property_type'];
				$taxes = $row['taxes'];
				$bank_name = $row['bank_name'];
				$bank_branch = $row['bank_branch'];
				$account_name = $row['account_name'];
				$account_number = $row['account_number'];
				$water_cost = $row['water_cost'];  
			}
			$result = mysql_query("select deposit, rent, garbage_fee from property_item where tenant = '$tenant_id'");
			while ($row = mysql_fetch_array($result))
			{
				$deposit = $row['deposit'];
				$rent = $row['rent'];
				$garbage_fee = $row['garbage_fee'];
			}
			$receipt = mysql_query("select property_item.property_listing, payments.id, (property_item.id)unit_id, (tenants.id)tenant_id, property_details.property_name, property_details.commission, property_item.floor, property_item.location, tenants.tenant_name, payment, payments.service_charge, property_item.rent, actual_penalties, water_pay, payments.parking_fee, payments.ref_id_date, payments.garbage_fee, payments.expected, payments.received, payments.balance, payments.display_balance, payments.water_deposit, payments.elec_deposit, rent_month, rent_year, payments.category, payments.transactiontime from payments inner join property_item on property_item.id = payments.unit_id inner join property_details on property_item.property_listing = property_details.id inner join tenants on tenants.id = payments.tenant_id where payments.id = $payment_id");
			while ($row = mysql_fetch_array($receipt)){
				$intcount++;
				$id = $row['id'];
				$property_name = $row['property_name'];
				$property_listing = $row['property_listing'];
				$unit_id = $row['unit_id'];
				$tenant_id = $row['tenant_id'];
				$commission = $row['commission'];	
				$category = $row['category'];
				$floor = $row['floor'];
				$location = $row['location'];
				$service_charge = $row['service_charge'];
				$block_occupied = "Unit: ".$location;
				$tenant_name = $row['tenant_name'];
				$payment = $row['payment'];
				$parking_fee = $row['parking_fee'];
				$garbage_fee = $row['garbage_fee'];
				$water_deposit = $row['water_deposit'];
				$elec_deposit = $row['elec_deposit'];
				$water_pay = $row['water_pay'];
				$balance = $row['balance'];
				$ref_id_date = $row['ref_id_date'];
				$ref_id_date = date("d M, Y", strtotime($ref_id_date));
				$display_balance = $row['display_balance'];
				$transactiontime = $row['transactiontime'];
				$actual_penalties = $row['actual_penalties'];
				$expected = $row['expected'];
				$received = $row['received'];
				$result = mysql_query("select comm_paid from comms_table where unit_id = '$unit_id' and comm_month = '$rent_month' and comm_year = '$rent_year'");
				while ($row = mysql_fetch_array($result))
				{
					$comms_paid = $row['comm_paid'];
				}
				$result = mysql_query("select deposit, rent, garbage_fee from property_item where tenant = '$tenant_id'");
				while ($row = mysql_fetch_array($result))
				{
					$deposit = $row['deposit'];
					$rent = $row['rent'];
					$garbage_fee = $row['garbage_fee'];
				}
				//$result = mysql_query("select previous_reading, last_reading from water_meter_details where month between '$report_start_month' and '$report_end_month' and year between '$report_start_year' and '$report_end_year' and tenant = '$tenant_id'");
				$result = mysql_query("select previous_reading, last_reading from water_meter_details where tenant = '$tenant_id' and paid = '1' limit 1");
				while ($row = mysql_fetch_array($result))
				{
					$previous_reading = $row['previous_reading'];
					$last_reading = $row['last_reading'];
					$units_used = $last_reading - $previous_reading;
					//$garbage_fee = $row['garbage_fee'];
				}
				//$expected = $exp_rent + $exp_garbage_fee + $exp_parking_fee + $exp_water_pay;
											
								
				if($rent_month != $actual_rent_month){
					$sql2 = mysql_query("select sum(display_balance)balance from payments where tenant_id = '$tenant_id' and category = '2' and rent_month <> '$actual_rent_month' or rent_year <> '$actual_rent_year' limit 1");
					while($row = mysql_fetch_array($sql2)) {
						$previous_balance = $row['balance'];
					}
				}
				else{
					$sql2 = mysql_query("select sum(display_balance)balance from payments where tenant_id = '$tenant_id' and category = '2' and rent_month <> '$rent_month' or rent_year <> '$rent_year'");
					while($row = mysql_fetch_array($sql2)) {
						$previous_balance = $row['balance'];
					}
				}
				$sub_total = $rent + $garbage_fee + $water_pay + $balance;
				$display_rent = $payment;
				$display_total = $display_rent + $water_pay + $parking_fee + $garbage_fee + $water_deposit + $elec_deposit;
				$total = $payment + $actual_penalties + $water_pay + $parking_fee + $garbage_fee + $water_deposit + $elec_deposit + $balance;
				$total_payment = $total + $balance;
			}
			//printing out Deposit Statements
			$page_title = "Print Receipts";
			?>
			<div id="page">
				<div id="content">
					<div class="post">
					<table borber="1" width="280px">
						<tr>
							<td>
								<font face="verdana" size="2">
								<strong>Payment Receipt</strong>
								<br />
								Property Name: <?php echo $property_name ?><br />
								Tenant Name: <?php echo $tenant_name ?><br />
								House Number: <?php echo $block_occupied ?>
								<br /><br />
								<strong>Particulars</strong><br />
								-----------------------------------------
								<table border="0" width="100%">
									<tr>
										<td width="60%"><font face="verdana" size="2">Rent</font></td>
										<td width="40%" align="right"><font face="verdana" size="2"><?php echo number_format($rent, 2) ?></font></td>
									</tr>
									<tr>
										<td><font face="verdana" size="2">Garbage</td>
										<td align="right"><font face="verdana" size="2"><?php echo number_format($garbage_fee, 2) ?></td>
									</tr>
									<?php if($parking_fee != 0){ ?>
									<tr>
										<td><font face="verdana" size="2">Parking</td>
										<td align="right"><font face="verdana" size="2"><?php echo number_format($parking_fee, 2) ?></td>
									</tr>
									<?php } ?>
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
										<td align="right"><font face="verdana" size="2"><?php echo number_format($water_cost, 2) ?></td>
									</tr>
									<tr>
										<td><font face="verdana" size="2">Water</td>
										<td align="right"><font face="verdana" size="2"><?php echo number_format($water_pay, 2) ?></td>
									</tr>
									<tr>
										<td><font face="verdana" size="2">Prv Bal</td>
										<td align="right"><font face="verdana" size="2"><?php echo number_format($balance, 2) ?></td>
									</tr>
									<tr>
										<td><font face="verdana" size="2">Total</td>
										<td align="right"><font face="verdana" size="2"><?php echo number_format($sub_total, 2) ?></td>
									</tr>
									<tr>
										<td><font face="verdana" size="2">Penalties</td>
										<td align="right"><font face="verdana" size="2"><?php echo number_format($actual_penalties, 2) ?></td>
									</tr>
									<?php if($water_deposit != 0){ ?>
									<tr>
										<td><font face="verdana" size="2">Water Deposit</td>
										<td align="right"><font face="verdana" size="2"><?php echo number_format($water_deposit, 2) ?></td>
									</tr>
									<?php } ?>
									<?php if($elec_deposit != 0){ ?>
									<tr>
										<td><font face="verdana" size="2">Electricity Deposit</td>
										<td align="right"><font face="verdana" size="2"><?php echo number_format($elec_deposit, 2) ?></td>
									</tr>
									<?php } ?>
									<tr>
										<td><font face="verdana" size="2">Total</td>
										<td align="right"><font face="verdana" size="2"><?php echo number_format($expected, 2) ?></td>
									</tr>
									<tr>
										<td><font face="verdana" size="2">Received</td>
										<td align="right"><font face="verdana" size="2"><?php echo number_format($received, 2) ?></td>
									</tr>
									<tr>
										<td colspan="2">--------------------------------------</td>
									</tr>
									<tr>
										<td><font face="verdana" size="2">Balance</td>
										<td align="right"><font face="verdana" size="2"><?php echo number_format($display_balance, 2) ?></td>
									</tr>
								</table>
								---------------------------------------
								<font face="verdana" size="1">
								<p>- <?php echo $bank_name ?><br />
								<?php 
									if($bank_branch != ""){ 
										echo $bank_branch."<br />"; 
									} 
								?>
								- <?php echo $account_name ?><br />
								- <?php echo $account_number ?><br />
								</p>
								<p>Date Posted: <?php echo $ref_id_date ?></p>
								<p><strong>e-Kodi Property Manager</strong><br />
								Designed and developed by Clyde Systems Ltd <br />
								Tel: 0704 469 814, www.e-kodi.com</p>
								</font>
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
	?>
