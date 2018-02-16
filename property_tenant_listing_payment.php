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
		$page_title = "Rent Payment";
		include_once('includes/db_conn.php');
		$transactiontime = date("Y-m-d G:i:s");
		$repair_period = date("F, Y");
		$rent_month = date("m");
		$rent_year = date("Y");
		$rent_day = date("d");

		include_once('includes/header.php');
		?>		
		<div id="page">
			<div id="content">
				<div class="post">
					<h2><?php echo $page_title ?> | e-kodi</h2>
					<strong>You are here:</strong> &raquo; <a href="index.php">Home</a> &raquo; Rent Payment<br />
					<strong>Rent Payment Period: <?php echo $repair_period ?></strong><br />
					<table width="100%" border="0" cellspacing="2" class="display" cellpadding="2" id="example">
						<thead bgcolor="#E6EEEE">
							<tr>
								<th>#</th>
								<th>Name</th>
								<th>Owner</th>
								<th>Location</th>
								<th>Contact</th>
								<th>Initial Balance</th>							
								<th>Pay Rent</th>
							</tr>
						</thead>
						<tbody>
						<?php
						if($property_manager_id == 0){
							$result_suppliers = mysql_query("select property_details.id, property_code, property_owner, property_name, property_details.location, propety_contact, sum(property_item.rent)rent, sum(property_item.garbage_fee)garbage_fee from property_details inner join property_item on property_item.property_listing =property_details.id where property_item.tenant <> 0 group by property_details.id order by property_name, property_owner asc");
						}
						else{
							if($adminstatus == '5'){
								$result_suppliers = mysql_query("select property_details.id, property_code, property_owner, property_name, property_details.location, propety_contact, sum(property_item.rent)rent, sum(property_item.garbage_fee)garbage_fee from property_details inner join property_item on property_item.property_listing =property_details.id where manager_id = '$property_manager_id' and owner_id = '$userid' and property_item.tenant <> 0 group by property_details.id order by property_name, property_owner asc");
							}
							else{
								$result_suppliers = mysql_query("select property_details.id, property_code, property_owner, property_name, property_details.location, propety_contact, sum(property_item.rent)rent, sum(property_item.garbage_fee)garbage_fee from property_details inner join property_item on property_item.property_listing =property_details.id where manager_id = '$property_manager_id' and property_item.tenant <> 0 group by property_details.id order by property_name, property_owner asc");
							}
						}
							$intcount = 0;
							$unit_count = 0;
							while ($row = mysql_fetch_array($result_suppliers))
							{
								$intcount++;
								$id = $row['id'];
								$property_code = $row['property_code'];
								$property_name = $row['property_name'];
								$string = substr($property_name, 0, 2);
								if($string == 'ZA'){
									$property_name = 'Zawadi Apartments';
								}
								else{
									$property_name = $property_name;
									$property_name = ucwords(strtolower($property_name));
								}
								$property_owner = $row['property_owner'];
								$property_owner = ucwords(strtolower($property_owner));
								$location = $row['location'];
								$garbage_fee = $row['garbage_fee'];
								$rent = $row['rent'];
								$expected_rent = $rent + $garbage_fee;
								$propety_contact = $row['propety_contact'];
								//$expected_rent = $expected_rent + $water_cost ;
								$result = mysql_query("select sum(payment)payment, sum(payments.garbage_fee)garbage_fee, sum(payments.parking_fee)parking_fee, sum(received)received, sum(actual_penalties)actual_penalties, sum(water_pay)water_pay from payments inner join property_item on property_item.id = payments.unit_id where rent_month = '$rent_month' and rent_year = '$rent_year' and property_item.property_listing = '$id' and category = '2'");
								$actual_payment = 0;
								while ($row = mysql_fetch_array($result))
								{
									$payment = $row['payment'];
									$parking_fee = $row['parking_fee'];
									$garbage_fee = $row['garbage_fee'];
									$service_charge = $row['service_charge'];
									$actual_penalties = $row['actual_penalties'];
									$water_pay = $row['water_pay'];
									$received = $row['received'];
									$actual_payment = $payment + $garbage_fee + $parking_fee + $actual_penalties + $water_pay;
								}
								$variance = $actual_payment - $expected_rent;
								if ($intcount % 2 == 0) {
									$display= '<tr bgcolor = #F0F0F6>';
								}
								else {
									$display= '<tr>';
								}
								echo $display;
									echo "<td valign='top'>$intcount.</td>";
									echo "<td valign='top'>$property_name</td>";
									echo "<td valign='top'>$property_owner</td>";
									echo "<td valign='top'>$location</td>";	
									echo "<td valign='top'>$propety_contact</td>";
									echo "<td valign='top' align='center'><a href='initial_balance.php?property_name=$id' title = 'Enter Balances for Tenants in $property_name'><img src='images/coins.jpeg' width='35px'></a></td>";
									echo "<td valign='top' align='center'><a href='tenant_payment.php?property_name=$id' title = 'Pay Rent for Tenants in $property_name'><img src='images/rent.png' width='35px'></a></td>";
								echo "</tr>";	
								}
							?>
						</tbody>
						<tfoot bgcolor="#E6EEEE">
							<tr>
								<th>#</th>
								<th>Name</th>
								<th>Owner</th>
								<th>Location</th>
								<th>Contact</th>
								<th>Initial Balance</th>							
								<th>Pay Rent</th>
							</tr>
						</tfoot>
					</table>
				</div>
			</div>
			<br class="clearfix" />
			</div>
		</div>
<?php
	}
	include_once('includes/footer.php');
?>
