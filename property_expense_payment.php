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
		$page_title = "Expenses Payment";
		include_once('includes/db_conn.php');
		$transactiontime = date("Y-m-d G:i:s");
		$repair_period = date("F, Y");
		$property_name = "";
		$physical_address = "";
		$location = "";
		$property_owner = "";
		$propety_contact = "";
		$bank_name = "";
		$bank_branch = "";
		$account_name = "";
		$account_number = "";
		$rent_month = date("m");
		$rent_year = date("Y");
		include_once('includes/header.php');
		?>		
		<div id="page">
			<div id="content">
				<div class="post">
					<h2><?php echo $page_title ?> | e-kodi</h2>
					<strong>You are here:</strong> &raquo; <a href="index.php">Home</a> &raquo; Expenses Payment<br />
					<strong>Expenses Payment Period: <?php echo $repair_period ?></strong><br />
					<table width="100%" border="0" cellspacing="2" class="display" cellpadding="2" id="example">
						<thead bgcolor="#E6EEEE">
							<tr>
								<th>#</th>
								<th>Name</th>
								<th>Owner</th>
								<th>Location</th>
								<th>Contact</th>
								<th>Cost</th>							
								<th>Pay Expenses</th>
							</tr>
						</thead>
						<tbody>
						<?php
						if($property_manager_id == 0){
							$result_suppliers = mysql_query("select property_details.id, property_code, property_owner, property_name, property_details.location, propety_contact from property_details order by property_name, property_owner asc");
						}
						else{
							if($adminstatus == '5'){
								$result_suppliers = mysql_query("select property_details.id, property_code, property_owner, property_name, property_details.location, propety_contact from property_details where manager_id = '$property_manager_id' and owner_id = '$userid' order by property_name, property_owner asc");
							}
							else{
								$result_suppliers = mysql_query("select property_details.id, property_code, property_owner, property_name, property_details.location, propety_contact from property_details where manager_id = '$property_manager_id' order by property_name, property_owner asc");
							}
							
						}
							$intcount = 0;
							$expense_payment = 0;
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
								$service_charge = $row['service_charge'];
								$rent = $row['rent'];
								$expected_rent = $rent + $service_charge;
								$propety_contact = $row['propety_contact'];
								$result = mysql_query("select sum(expense_payment)expense_payment from expense_payment where property_id = '$id' and expense_month = '$rent_month' and expense_year = '$rent_year' group by property_id");
								$expense_payment = 0;
								while ($row = mysql_fetch_array($result))
								{
									$expense_payment = $row['expense_payment'];
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
									echo "<td valign='top' align='right'>".number_format($expense_payment, 0)."</td>";							
									if($adminstatus == '5'){
										echo "<td valign='top' align='center'><a href='#' title = 'Pay Expenses for Property $property_name'><img src='images/rent.png' width='35px'></a></td>";
									}
									else{
										echo "<td valign='top' align='center'><a href='expense_payment.php?property_name=$id' title = 'Pay Expenses for Property $property_name'><img src='images/rent.png' width='35px'></a></td>";
									}
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
								<th>Cost</th>							
								<th>Pay Expenses</th>
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
