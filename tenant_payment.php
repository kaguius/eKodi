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
		$page_title = "Tenant Payment";
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
								<th>Rent</th>
								<th>Garbage</th>
								<th>Water</th>
								<th>Total</th>
								<th>Bal</th>
								<th>Penalties</th>
								<th>Expected</th>
								<th>Collected</th>
								<th>Balance</th>
								<th>Type</th>
								<th>Date</th>
								<th>Pay Month</th>
								<th>Number</th>
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
																				
										echo "<td valign='top'>".number_format($rent, 2)."</td>";
										echo "<td valign='top'>".number_format($garbage_fee, 2)."</td>";
										
										//echo "<td valign='top'>".number_format($parking_fee, 2)."</td>";
										
										$actual_rent = $rent + $garbage_fee + $parking_fee;
										$hasPaid = false ; 
										for($suppliers_counter = 0; $suppliers_counter < count($tenant_rent_paid); $suppliers_counter++){
											if ($tenant_rent_paid[$suppliers_counter] == $id) {
												// if the value has not been found, no need to continue looping
												$hasPaid = true ;
												$rent_collected = $actual_payment[$suppliers_counter];
											}
										}
										if($hasPaid) {
											//$sql3 = mysql_query("select payment_type.payment_type, payment, service_charge, actual_penalties from payments inner join payment_type on payment_type.id = payments.payment_type where rent_month = '$rent_month' and rent_year = '$rent_year' and tenant_id = '$id' and category = '2'");
											$sql3 = mysql_query("select payment_type.payment_type, sum(payment)payment, sum(service_charge)service_charge, sum(actual_penalties)actual_penalties, sum(water_pay)water_pay, sum(parking_fee)parking_fee, sum(garbage_fee)garbage_fee, sum(balance)balance, rent_month, rent_year, ref_id_date, ref_id from payments inner join payment_type on payment_type.id = payments.payment_type where rent_month = '$rent_month' and rent_year = '$rent_year' and tenant_id = '$id' and category = '2'");
											$payment2= 0;
											//$monthly_rent = 0;
											while($row = mysql_fetch_array($sql3)) {
												$payment_type = $row['payment_type'];
												$payment = $row['payment'];
												$service_charge = $row['service_charge'];
												$actual_penalties = $row['actual_penalties'];
												$water_cost = $row['water_pay'];
												$parking_fee = $row['parking_fee'];
												$garbage_fee = $row['garbage_fee'];
												$balance_fee = $row['balance'];
												$rent_month = $row['rent_month'];
												$rent_year = $row['rent_year'];
												$date_period = $rent_month.": ".$rent_year;
												$ref_id_detail = $row['ref_id'];
												$ref_id_date = $row['ref_id_date'];		
											}
											
											$payment2 = $payment + $service_charge + $actual_penalties + $water_cost + $parking_fee + $garbage_fee;
											$monthly_rent = $monthly_rent + $actual_penalties + $water_cost;
											$actual_rent = $actual_rent + $water_cost;
											echo "<td valign='top'>".number_format($water_cost, 2)."</td>";
											echo "<td valign='top'>".number_format($actual_rent, 2)."</td>";
											//$sql2 = mysql_query("select sum(display_balance)balance from payments where tenant_id = '$id' and category = '2' and rent_month <> '$rent_month' or rent_year <> '$rent_year' limit 1");
											$sql2 = mysql_query("select (display_balance)balance from payments where tenant_id = '$id' order by id desc limit 1");
											while($row = mysql_fetch_array($sql2)) {
												$previous_balance = $row['balance'];
												
											}
											//echo "<input type='hidden' id='previous_balance[$id]' name='previous_balance[$id]' value='$previous_balance'>";
											echo "<td valign='top'>".number_format($previous_balance, 2)."</td>";
											//echo "<td valign='top'><input name='previous_balance[$id]' id='previous_balance[$id]' type='text' class='textfield' value='$previous_balance' size='5'></td>";
											//echo "<td valign='top'>".number_format($actual_penalties, 2)."</td>";										$monthly_rent = $monthly_rent + $previous_balance;
											if($payment2 < $monthly_rent){							
												if ($rent_day > $penalties_day){
													$balance_penalty_paid = ($balance_fee) * ($penalties / 100);
													echo "<td valign='top'>".number_format($balance_penalty_paid, 2)."</td>";
													echo "<input type='hidden' id='penalty_paid[$id]' name='penalty_paid[$id]' value='$balance_penalty_paid'>";
												}
												else{
													echo "<td valign='top'>".number_format($actual_penalties, 2)."</td>";
													echo "<input type='hidden' id='penalty_paid[$id]' name='penalty_paid[$id]' value='$actual_penalties'>";
												}
												$monthly_rent = $monthly_rent + $balance_penalty_paid;
												echo "<td valign='top'>".number_format($monthly_rent, 2)."</td>";
												if ($rent_day > $penalties_day){
													$balance_penalty_paid = ($balance_fee) * ($penalties / 100);
												}
												$total_expected = $balance_fee + $balance_penalty_paid;
												
												echo "<input type='hidden' id='total_expected[$id]' name='total_expected[$id]' value='$total_expected'>";
												echo "<td valign='top'>$payment2 + <input name='rent_payment[$id]' id='rent_payment[$id]' type='text' class='textfield' value='$rent_payment' size='5'></td>";

												echo "<td valign='top'>".number_format($total_expected, 2)."</td>";
												echo "<td valign='top'><select name='payment_type[$id]' id='payment_type[$id]'>";
												$sql2 = mysql_query("select id, payment_type from payment_type order by payment_type asc");
												while($row = mysql_fetch_array($sql2)) {
													$payment_type_id = $row['id'];
													$payment_type = $row['payment_type'];
													echo "<option value='$payment_type_id'>".$payment_type."</option>"; 
												}
												echo "</select></td>";
											echo "<td>";
												echo "<select name='day[$id]' id='day[$id]'>";
													echo "<option value=''>&nbsp;</option>";
													echo "<option value='1'>1</option>";
													echo "<option value='2'>2</option>";
													echo "<option value='3'>3</option>";
													echo "<option value='4'>4</option>";
													echo "<option value='5'>5</option>";
													echo "<option value='6'>6</option>";
													echo "<option value='7'>7</option>";
													echo "<option value='8'>8</option>";
													echo "<option value='9'>9</option>";
													echo "<option value='10'>10</option>";
													echo "<option value='11'>11</option>";
													echo "<option value='12'>12</option>";
													echo "<option value='13'>13</option>";
													echo "<option value='14'>14</option>";
													echo "<option value='15'>15</option>";
													echo "<option value='16'>16</option>";
													echo "<option value='17'>17</option>";
													echo "<option value='18'>18</option>";
													echo "<option value='19'>19</option>";
													echo "<option value='20'>20</option>";
													echo "<option value='21'>21</option>";
													echo "<option value='22'>22</option>";
													echo "<option value='23'>23</option>";
													echo "<option value='24'>24</option>";
													echo "<option value='25'>25</option>";
													echo "<option value='26'>26</option>";
													echo "<option value='27'>27</option>";
													echo "<option value='28'>28</option>";
													echo "<option value='29'>29</option>";
													echo "<option value='30'>30</option>";
													echo "<option value='31'>31</option>";
												echo "</select>";
												echo "-";
												echo "<select name='month[$id]' id='month[$id]'>";
													echo "<option value=''>&nbsp;</option>";
													echo "<option value='1'>Jan</option>";
													echo "<option value='2'>Feb</option>";
													echo "<option value='3'>Mar</option>";
													echo "<option value='4'>Apr</option>";
													echo "<option value='5'>May</option>";
													echo "<option value='6'>Jun</option>";
													echo "<option value='7'>Jul</option>";
													echo "<option value='8'>Aug</option>";
													echo "<option value='9'>Sep</option>";
													echo "<option value='10'>Oct</option>";
													echo "<option value='11'>Nov</option>";
													echo "<option value='12'>Dec</option>";
												echo "</select>";
												echo "-";
												echo "<select name='year[$id]' id='year[$id]'>";
													echo "<option value='2013'>2013</option>";
													echo "<option value='2014'>2014</option>";
													echo "<option value='2015'>2015</option>";
													echo "<option value='2016'>2016</option>";
													echo "<option value='2017'>2017</option>";
												echo "</select>";
											echo "</td>";
											//echo "<td valign='top'><input title='Enter the Transactiondate' value='$trans_date' id='trans_date' name='trans_date[$id]' type='text' maxlength='100' class='main_input' size='5' /></td>";
											echo "<td valign='top'><input name='ref_id[$id]' id='ref_id' type='text' class='textfield' value='$ref_id' size='5'></td>";
											}
											else{
												//echo "<td valign='top'><input name='rent_payment[$id]' id='rent_payment[$id]' type='text' class='textfield' value='$payment2' size='10'></td>";
												echo "<td valign='top'>".number_format($actual_penalties, 2)."</td>";
												echo "<td valign='top'>".number_format($payment2, 2)."</td>";
												echo "<td valign='top'>".number_format($payment2, 2)."</td>";
												echo "<td valign='top'>".number_format($balance_fee, 2)."</td>";				
												echo "<td valign='top'>$payment_type</td>";
												echo "<td valign='top'>$ref_id_date</td>";
												echo "<td valign='top'>$ref_id_detail</td>";
											}
										}
										else{
											
											$sql2 = mysql_query("select cost from water_meter_details where tenant = '$id' and property_unit = '$unit_id' and paid = '0'");
											while($row = mysql_fetch_array($sql2)) {
												$water_cost = $row['cost'];
											}
											$sql2 = mysql_query("select (display_balance)balance from payments where tenant_id = '$id' and category = '2' order by id desc limit 1");
											while($row = mysql_fetch_array($sql2)) {
												$previous_balance = $row['balance'];
											}
											$sql2 = mysql_query("select sum(display_balance)p_balance from payments where tenant_id = '$id' and category = '2'");
											while($row = mysql_fetch_array($sql2)) {
												$p_balance = $row['p_balance'];
											}
											$monthly_rent = $monthly_rent + $water_cost;
											echo "<td valign='top'>".number_format($water_cost, 2)."</td>";
											echo "<td valign='top'>".number_format($monthly_rent, 2)."</td>";
											echo "<td valign='top'>".number_format($previous_balance, 2)."</td>";
											echo "<input type='hidden' id='previous_balance[$id]' name='previous_balance[$id]' value='$previous_balance'>";										
											if ($rent_day > $penalties_day){
												$penalty_paid = ($monthly_rent + $previous_balance) * ($penalties / 100);
												$penalty_paid=0;	
												//echo "<td valign='top'>".number_format($penalty_paid, 2)."</td>";
												echo "<td valign='top'><input name='penalty_paid[$id]' id='penalty_paid[$id]' type='text' class='textfield' value='$penalty_paid' size='3'></td>";
											}
											else{
												echo "<td>No penalty</td>";
											}
											
											echo "<input type='hidden' id='water_cost[$id]' name='water_cost[$id]' value='$water_cost'>";
											//echo "<input type='hidden' id='penalty_paid[$id]' name='penalty_paid[$id]' value='$penalty_paid'>";
											echo "<input type='hidden' id='parking_fee[$id]' name='parking_fee[$id]' value='$parking_fee'>";
											echo "<input type='hidden' id='garbage_fee[$id]' name='garbage_fee[$id]' value='$garbage_fee'>";
											$total_expected = $penalty_paid + $monthly_rent + $previous_balance;
											$tt_expected = $total_expected + $p_balance;
											echo "<td valign='top'><input name='total_expected[$id]' id='total_expected[$id]' type='text' class='textfield' value='$total_expected' size='3'></td>";
											//echo "<input type='hidden' id='total_expected[$id]' name='total_expected[$id]' value='$total_expected'>";
											//echo "<td valign='top'>".number_format($total_expected, 2)."</td>";
											echo "<td valign='top'><input name='rent_payment[$id]' id='rent_payment[$id]' type='text' class='textfield' value='$rent_payment' size='3'></td>";
											echo "<td valign='top'>".number_format($p, 2)."</td>";
											echo "<td valign='top'><select name='payment_type[$id]' id='payment_type[$id]'>";
											$sql2 = mysql_query("select id, payment_type from payment_type order by payment_type asc");
											while($row = mysql_fetch_array($sql2)) {
												$payment_type_id = $row['id'];
												$payment_type = $row['payment_type'];
												echo "<option value='$payment_type_id'>".$payment_type."</option>"; 
											}
											echo "</select></td>";
											echo "<td>";
												echo "<select name='day[$id]' id='day[$id]'>";
													echo "<option value=''>&nbsp;</option>";
													echo "<option value='1'>1</option>";
													echo "<option value='2'>2</option>";
													echo "<option value='3'>3</option>";
													echo "<option value='4'>4</option>";
													echo "<option value='5'>5</option>";
													echo "<option value='6'>6</option>";
													echo "<option value='7'>7</option>";
													echo "<option value='8'>8</option>";
													echo "<option value='9'>9</option>";
													echo "<option value='10'>10</option>";
													echo "<option value='11'>11</option>";
													echo "<option value='12'>12</option>";
													echo "<option value='13'>13</option>";
													echo "<option value='14'>14</option>";
													echo "<option value='15'>15</option>";
													echo "<option value='16'>16</option>";
													echo "<option value='17'>17</option>";
													echo "<option value='18'>18</option>";
													echo "<option value='19'>19</option>";
													echo "<option value='20'>20</option>";
													echo "<option value='21'>21</option>";
													echo "<option value='22'>22</option>";
													echo "<option value='23'>23</option>";
													echo "<option value='24'>24</option>";
													echo "<option value='25'>25</option>";
													echo "<option value='26'>26</option>";
													echo "<option value='27'>27</option>";
													echo "<option value='28'>28</option>";
													echo "<option value='29'>29</option>";
													echo "<option value='30'>30</option>";
													echo "<option value='31'>31</option>";
												echo "</select>";
												echo "-";
												echo "<select name='month[$id]' id='month[$id]'>";
													echo "<option value=''>&nbsp;</option>";
													echo "<option value='1'>Jan</option>";
													echo "<option value='2'>Feb</option>";
													echo "<option value='3'>Mar</option>";
													echo "<option value='4'>Apr</option>";
													echo "<option value='5'>May</option>";
													echo "<option value='6'>Jun</option>";
													echo "<option value='7'>Jul</option>";
													echo "<option value='8'>Aug</option>";
													echo "<option value='9'>Sep</option>";
													echo "<option value='10'>Oct</option>";
													echo "<option value='11'>Nov</option>";
													echo "<option value='12'>Dec</option>";
												echo "</select>";
												echo "-";
												echo "<select name='year[$id]' id='year[$id]'>";
													echo "<option value='2013'>2013</option>";
													echo "<option value='2014'>2014</option>";
													echo "<option value='2015'>2015</option>";
													echo "<option value='2016'>2016</option>";
													echo "<option value='2017'>2017</option>";
												echo "</select>";
											echo "</td>";
											//echo "<td valign='top'><input title='Enter the Transactiondate' value='$trans_date' id='trans_date' name='trans_date[$id]' type='text' maxlength='100' class='main_input' size='5' /></td>";
											echo "<td>";
												echo "<select name='pay_month[$id]' id='pay_month[$id]'>";
													echo "<option value=''>&nbsp;</option>";
													echo "<option value='1'>Jan</option>";
													echo "<option value='2'>Feb</option>";
													echo "<option value='3'>Mar</option>";
													echo "<option value='4'>Apr</option>";
													echo "<option value='5'>May</option>";
													echo "<option value='6'>Jun</option>";
													echo "<option value='7'>Jul</option>";
													echo "<option value='8'>Aug</option>";
													echo "<option value='9'>Sep</option>";
													echo "<option value='10'>Oct</option>";
													echo "<option value='11'>Nov</option>";
													echo "<option value='12'>Dec</option>";
												echo "</select>";
												echo "-";
												echo "<select name='pay_year[$id]' id='pay_year[$id]'>";
													echo "<option value='2013'>2013</option>";
													echo "<option value='2014'>2014</option>";
													echo "<option value='2015'>2015</option>";
													echo "<option value='2016'>2016</option>";
													echo "<option value='2017'>2017</option>";
												echo "</select>";
											echo "</td>";
											echo "<td valign='top'><input name='ref_id[$id]' id='ref_id' type='text' class='textfield' value='$ref_id' size='3'></td>";
										}
										$water_cost = 0;

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
									<th>Rent</th>
									<th>Garbage</th>
									<th>Water</th>
									<th>Total</th>
									<th>Bal</th>
									<th>Penalties</th>
									<th>Expected</th>
									<th>Collected</th>
									<th>Balance</th>
									<th>Type</th>
									<th>Date</th>
									<th>Pay Month</th>
									<th>Number</th>
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
				$water_cost = $_POST['water_cost'];
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
					if ($rent_payment[$rent_payment_counter] != 0) {
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
						$rent_previous_balance = $previous_balance[$rent_payment_counter];
						//$tenant_ref_id_date = date('Y-m-d', strtotime(str_replace('-', '/', $tenant_ref_id_date)));
						//$rent_month = date('m',strtotime($tenant_ref_id_date));
						//$rent_year = date('Y',strtotime($tenant_ref_id_date));
						
						//Calculate commission on rent and deposit
						//rent
						if($tenant_water_cost > 0){
							$actual_rent = $rent_payment_unit - $tenant_penalty_paid - $tenant_water_cost - $tenant_parking_fee - $tenant_garbage_fee;
						}
						else{
							$actual_rent = $rent_payment_unit - $tenant_penalty_paid - $tenant_parking_fee - $tenant_garbage_fee;
						}
						$actual_payment = 0;
						$sql2 = mysql_query("select service_charge from payments where unit_id = '$tenant_unit_id' and tenant_id = '$tenant_payment_id' and rent_month = '$rent_month' and rent_year = '$rent_year'");
						while($row = mysql_fetch_array($sql2)) {
							$actual_payment = $row['service_charge'];
						}

						if($actual_payment == $tenant_service_charge){
							$rent_comm = $actual_rent;
							$tenant_service_charge = 0;
							//$rent_comm = $actual_rent - $tenant_service_charge;
							$actual_rent_comm = $rent_payment_unit - $tenant_service_charge;
							//$rent_comm = $rent_payment_unit - $tenant_service_charge;
							$value_rent_comm = $actual_rent_comm * ($commission / 100);
						
							//Store the actual rent collected + Rent - Comms
							$actual_rent = $actual_rent - $value_rent_comm;
						}
						else{
							$rent_comm = $actual_rent - $tenant_service_charge;
							$actual_rent_comm = $rent_payment_unit - $tenant_service_charge;
							//$rent_comm = $rent_payment_unit - $tenant_service_charge;
							$value_rent_comm = $actual_rent_comm * ($commission / 100);
						
							//Store the actual rent collected + Rent - Comms
							$actual_rent = $actual_rent - $value_rent_comm;
						}

						//calculate balance on payment if any
						$total_amt_paid = $rent_comm + $tenant_service_charge + $tenant_penalty_paid + $tenant_water_cost + $tenant_parking_fee + $tenant_garbage_fee;
						$balance = $tenant_total_expected - $total_amt_paid;
						

						//Insert the payments into the payments table
						$sql2="INSERT INTO payments (unit_id, tenant_id, expected, received, payment, service_charge, actual_penalties, water_pay, parking_fee, garbage_fee, balance, display_balance, rent_month, rent_year, ref_id, ref_id_date, pay_month, pay_year, category, payment_type, UID, transactiontime, manager_id) 
						VALUES('$tenant_unit_id', '$tenant_payment_id', '$tenant_total_expected', '$tenant_total_receieved', '$rent_comm', '$tenant_service_charge', '$tenant_penalty_paid', '$tenant_water_cost', '$tenant_parking_fee', '$tenant_garbage_fee', '$rent_previous_balance', '$balance', '$rent_month', '$rent_year', '$tenant_ref_id', '$tenant_ref_id_date', '$rent_pay_month', '$rent_pay_year', '2', '$tenant_payment_type', '$userid', '$transactiontime', '$tenant_manager_id')";
						//echo $sql2."<br />";
						$result2 = mysql_query($sql2);

						$sql="update payments SET balance='0', display_balance ='0' where tenant_id = '$tenant_payment_id' and unit_id = '$tenant_unit_id'";
						//$result = mysql_query($sql);
						//echo $sql."<br />";
						
						$sql3 = mysql_query("select id from payments order by id desc limit 1");
						while($row = mysql_fetch_array($sql3)) {
							$payment_id = $row['id'];
						}	
					
						$sql4="INSERT INTO comms_table (payment_id, unit_id, tenant_id, comm_paid, comm_month, comm_year, status, transactiontime, UID, manager_id) VALUES ('$payment_id', '$tenant_unit_id', '$tenant_payment_id', '$value_rent_comm', '$rent_month', '$rent_year', '2', '$transactiontime', '$userid', '$tenant_manager_id')";
						$result4 = mysql_query($sql4);
						//echo $sql4."<br />";


						//insert into the cash book
						$sql5="INSERT INTO property_owner_remittances (unit_id, tenant_id, amount, remmitance_month, remmitance_year, payment_type, manager_id, property_id, UID, trans_id, trans_id_date, transactiontime, pay_month, pay_year) VALUES ('$tenant_unit_id', '$tenant_payment_id', '$total_amt_paid', '$rent_month', '$rent_year', '$tenant_payment_type', '$tenant_manager_id', '$tenant_property_id', '$userid', '$tenant_ref_id', '$tenant_ref_id_date', '$transactiontime', '$rent_pay_month', '$rent_pay_year')";
						$result5 = mysql_query($sql5);
						//echo $sql5."<br />";

						$water_payment = 0;
						$sql6 = mysql_query("select payment from water_meter_details where tenant = '$tenant_payment_id' and property_unit = '$tenant_unit_id'");
						while($row = mysql_fetch_array($sql6)) {
							$water_payment = $row['payment'];
						}

						if($tenant_water_cost == 0){
							$sql7="update water_meter_details SET paid='0', payment = '$tenant_water_cost' where tenant = '$tenant_payment_id' and property_unit = '$tenant_unit_id'";
							$result7 = mysql_query($sql7);
							//echo $sql7."<br />";	
						}
						else{
							$sql7="update water_meter_details SET paid='1', payment = '$tenant_water_cost' where tenant = '$tenant_payment_id' and property_unit = '$tenant_unit_id'";
							$result7 = mysql_query($sql7);
							//echo $sql7."<br />";
						}
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
