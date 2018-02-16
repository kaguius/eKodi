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
		$page_title = "Enter Tenant Balances";
		include ("includes/core_functions.php");	
		include_once('includes/db_conn.php');
		$transactiontime = date("Y-m-d G:i:s");	
		$rent_period = date("F, Y");
		$rent_day = date("d");
		$rent_month = date("m");
		$rent_year = date("Y");
		$rent_payment = "";
		$tenant_rent_paid = array();
		if (!empty($_GET)){	
			$property_id = $_GET['property_name'];
		}
		$result_suppliers = mysql_query("select id, property_name, commission, location, penalties_day, penalties, manager_id from property_details where id = '$property_id'");
		while ($row = mysql_fetch_array($result_suppliers))
		{
			$property_name = $row['property_name'];
			$commission = $row['commission'];
			$penalties_day = $row['penalties_day'];
			$penalties = $row['penalties'];
			$manager_id = $row['manager_id'];
			$property_name = ucwords(strtolower($property_name));	
		}
		$result_rent_paid = mysql_query("select tenant_id, payment, service_charge, actual_penalties, water_pay, parking_fee from payments where rent_month = '$rent_month' and rent_year = '$rent_year'");
		$tenants_counter = 0 ;
		while ($row = mysql_fetch_array($result_rent_paid))
		{
			$tenant_rent_paid[$tenants_counter] = $row['tenant_id'];
			$tenant_actual_payment[$tenants_counter] = $row['payment'];
			$tenant_actual_service_charge[$tenants_counter] = $row['service_charge'];
			$tenant_actual_penalties[$tenants_counter] = $row['actual_penalties'];
			$tenant_actual_water_pay[$tenants_counter] = $row['water_pay'];
			$tenant_actual_parking_fee[$tenants_counter] = $row['parking_fee'];
			$tenants_counter++ ;
			$actual_payment = $tenant_actual_payment[$tenants_counter] + $tenant_actual_service_charge[$tenants_counter] + $tenant_actual_penalties[$tenants_counter] + $tenant_actual_water_pay[$tenants_counter] + $tenant_actual_parking_fee[$tenants_counter];
		}
		
		include_once('includes/header.php');
		?>		
		<div id="page">
			<div id="content">
				<div class="post">
					<h2><?php echo $page_title ?> | e-kodi</h2>
					<strong>You are here:</strong> &raquo; <a href="index.php">Home</a> &raquo; <a href="property_tenant_listing_payment.php">Rent</a> &raquo; <a href="property_tenant_listing_payment.php">Property Listing Payment</a> &raquo; Tenant Payment for Property <?php echo $property_name ?><br />
					<p>Month: <?php echo $rent_period ?></p>
					<form id="frmCreatePropertyItem" name="frmCreatePropertyItem" method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
					<input type="hidden" name="commission" value="<?php echo $commission ?>">
					<input type="hidden" name="penalties_day" value="<?php echo $penalties_day ?>">
					<input type="hidden" name="penalties" value="<?php echo $penalties ?>">
					<input type="hidden" name="manager_id" value="<?php echo $manager_id ?>">
					<input type="hidden" name="property_id" value="<?php echo $property_id ?>">
					<!--<table width="100%" border="0" cellspacing="2" cellpadding="2" >-->
					<table width="100%" border="0" cellspacing="2" cellpadding="2" class="display" id="">				
						<thead bgcolor="#E6EEEE">
							<tr>
								<th>Hse No.</th>	
								<th>Name</th>					
								<th>Balance</th>
							</tr>
						</thead>
						<tbody>
						<?php
							$result_suppliers = mysql_query("select tenants.id, (property_item.id)unit_id, tenant_code, property_details.property_name, property_item.location, property_item.floor, tenant_name, property_item.rent, property_item.garbage_fee, property_item.parking_fee, tenants.transactiontime from tenants inner join property_details on property_details.id = tenants.property_listing inner join property_item on property_item.id = tenants.property_block where tenants.property_listing = '$property_id' and tenants.tenant_status = '1' order by tenants.id asc");
							$intcount = 0;							
							$NumberOfRows = mysql_num_rows($result_suppliers);
							if($NumberOfRows == 0){
								echo "<tr>";
									echo "<td valign='top' colspan='7'><strong>No unit blocks for $property_name have been rented out.</strong></td>";
								echo "</tr>";
							}
							else{
								$total_rent = 0;
								$total_service_charge = 0;
								$total_expt_rent = 0;
								$total_rent_collected = 0;
								$rent_collected = 0;
								$monthly_rent = 0;
								$penalty_paid = 0;
								while ($row = mysql_fetch_array($result_suppliers))
								{
									$intcount++;								
									$id = $row['id'];
									$unit_id = $row['unit_id'];
									$tenant_name = $row['tenant_name'];
									$tenant_name = ucwords(strtolower($tenant_name));
									$location = $row['location'];
									$floor = $row['floor'];
									$rent = $row['rent'];
									$garbage_fee = $row['garbage_fee'];
									$parking_fee = $row['parking_fee'];
									//$result_suppliers = mysql_query("select sum(cost)water_cost from water_meter_details where tenant = '$id' and month = '$rent_month' and year = '$rent_year' and paid = '0'");
									//while ($row = mysql_fetch_array($result_suppliers))
									//{
									//	$water_cost = $row['water_cost'];
									//}
									
									$monthly_rent = $rent + $garbage_fee + $parking_fee;
									$block_occupied = "Unit: ".$location.", Floor: ".$floor;
									
									if ($intcount % 2 == 0) {
										$display= '<tr bgcolor = #F0F0F6>';
									}
									else {
										$display= '<tr>';
									}
									
									echo $display;
										echo "<input type='hidden' id='unit_id[$id]' name='unit_id[$id]' value='$unit_id'>";
										echo "<input type='hidden' id='tenant_id[$id]' name='tenant_id[$id]' value='$id'>";
										echo "<input type='hidden' id='service_charge[$id]' name='service_charge[$id]' value='$service_charge'>";
										echo "<input type='hidden' id='manager_id[$id]' name='manager_id[$id]' value='$manager_id'>";
										echo "<input type='hidden' id='property_id[$id]' name='property_id[$id]' value='$property_id'>";
										echo "<td valign='top'>$location</td>";
										echo "<td valign='top'>$tenant_name</td>";
																				
																	
										$hasPaid = false ; 
										for($suppliers_counter = 0; $suppliers_counter < count($tenant_rent_paid); $suppliers_counter++){
											if ($tenant_rent_paid[$suppliers_counter] == $id) {
												// if the value has not been found, no need to continue looping
												$hasPaid = true ;
												$rent_collected = $actual_payment[$suppliers_counter];
											}
										}
										
										echo "<td valign='top'><input name='initial_balance[$id]' id='initial_balance[$id]' type='text' class='textfield' value='$initial_balance' size='10'></td>";

									echo "</tr>";	
								}
								echo "<input type='hidden' id='tenant' name='tenant' value='$id'>";
							}							
							?>
							</tbody>
							<tfoot bgcolor="#E6EEEE">
								<tr>
									<th>Hse No.</th>	
									<th>Name</th>					
									<th>Balance</th>
								</tr>
							</tfoot>
							</table>
							<table border="0" width="100%">
								<tr>
									<td colspan="2">&nbsp;</td>
								</tr>
								<tr>
									<td valign="top">
										<button name="submit" id="button" onclick="return CheckForm();">Apply</button>
									</td>
									<td align="right">
										<button name="reset" id="button2" type="reset">Reset</button>
									</td>		
								</tr>
							</table>
						<script  type="text/javascript">
							var frmvalidator = new Validator("frmCreatePropertyItem");
							frmvalidator.addValidation("property_name","req","Please enter the Property Name");
							frmvalidator.addValidation("floor","req","Please enter the Property's Physical Address");
							frmvalidator.addValidation("location","req","Please enter the Location Address");
							frmvalidator.addValidation("rent","req","Please enter the Property Owner's Details");
							frmvalidator.addValidation("service_charge","req","Please enter the Owner's Contact Information");
						</script>
					</form>
				</div>
			</div>
			<br class="clearfix" />
			</div>
		</div>
	<?php
			if (!empty($_POST)) {
				$commission = $_POST['commission'];
				$penalties_day = $_POST['penalties_day'];	
				$penalties = $_POST['penalties'];	
				$rent_payment = $_POST['rent_payment'];
				$total_receieved = $_POST['rent_payment'];
				$initial_balance = $_POST['initial_balance'];
				$parking_fee = $_POST['parking_fee'];
				$garbage_fee = $_POST['garbage_fee'];
				$total_expected = $_POST['total_expected'];		
				$tenant_id = $_POST['tenant_id'];
				$service_charge = $_POST['service_charge'];
				$unit_id = $_POST['unit_id'];
				$tenant = $_POST['tenant'];
				$day = $_POST['day'];
				$month = $_POST['month'];
				$year = $_POST['year'];
				$ref_id = $_POST['ref_id'];
				$ref_id_date = $_POST['trans_date'];		
				$manager_id = $_POST['manager_id'];
				$property_id = $_POST['property_id'];
				$payment_type = $_POST['payment_type'];
				$penalty_paid = $_POST['penalty_paid'];
				$previous_balance = $_POST['previous_balance'];

				$pay_month = $_POST['pay_month'];
				$pay_year = $_POST['pay_year'];

				for($rent_payment_counter = 1 ;  $rent_payment_counter <= $tenant; $rent_payment_counter++) {				
					if ($initial_balance[$rent_payment_counter] != 0) {
						$rent_payment_unit = $rent_payment[$rent_payment_counter];
						$tenant_water_cost = $water_cost[$rent_payment_counter];
						$tenant_payment_id = $tenant_id[$rent_payment_counter];
						$tenant_unit_id = $unit_id[$rent_payment_counter];
						$tenant_service_charge = $service_charge[$rent_payment_counter];
						$tenant_payment_type = $payment_type[$rent_payment_counter];
						$tenant_penalty_paid = $penalty_paid[$rent_payment_counter];
						$tenant_manager_id = $manager_id[$rent_payment_counter];
						$tenant_property_id = $property_id[$rent_payment_counter];
						$tenant_parking_fee = $parking_fee[$rent_payment_counter];
						$tenant_garbage_fee = $garbage_fee[$rent_payment_counter];
						$tenant_total_expected = $total_expected[$rent_payment_counter];
						$tenant_total_receieved = $total_receieved[$rent_payment_counter];
						$rent_day = $day[$rent_payment_counter];
						$rent_month = $month[$rent_payment_counter];
						$rent_year = $year[$rent_payment_counter];
						$tenant_ref_id = $ref_id[$rent_payment_counter];
						$tenant_ref_id_date = $ref_id_date[$rent_payment_counter];
						$tenant_ref_id_date = $rent_year."-".$rent_month."-".$rent_day;
						$rent_pay_month = $pay_month[$rent_payment_counter];
						$rent_pay_year = $pay_year[$rent_payment_counter];
						$rent_initial_balance = $initial_balance[$rent_payment_counter];

						//Insert the payments into the payments table
						$sql2="INSERT INTO payments (unit_id, tenant_id, display_balance, UID, transactiontime, manager_id, category, rent_month, rent_year, pay_month, pay_year) 
						VALUES('$tenant_unit_id', '$tenant_payment_id', '$rent_initial_balance', '$userid', '$transactiontime', '$tenant_manager_id', '2', '1', '2013', '1', '2013')";
						//echo $sql2."<br />";
						$result2 = mysql_query($sql2);

					}
				}
				
				
				?>
					<script type="text/javascript">
					<!--
						document.location = "property_tenant_listing_payment.php";
						//document.location = "<?php echo $query ?>";
					//-->
					</script>
				<?php
			}
	}
?>
<?php
	include_once('includes/footer.php');
?>
