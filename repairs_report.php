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
		$deposit_month = "";
		$deposit_year = "";
		$transactiontime = date("Y-m-d G:i:s");
		$page_title = "Repairs Report";
		include_once('includes/header.php');
		if (!empty($_GET)){	
			$repair_month = $_GET['month'];
			$repair_year = $_GET['year'];
		} 
		if ($repair_month != "" || $repair_year != ""){
			$page_title = "Detailed Repairs Report";
			$result_tender = mysql_query("select month from calender where id = '$repair_month'");
			while ($row = mysql_fetch_array($result_tender))
			{
				$actual_repair_month = $row['month'];
			}
			//$rent_period = date("$repair_month, $repair_year");
		?>
			<div id="page">
				<div id="content">
					<div class="post">
						<h2><?php echo $page_title ?> | e-kodi</h2>
							Reporting Date: <?php echo $actual_repair_month .", ".$repair_year ?>
							<table width="100%" border="0" cellspacing="2" cellpadding="2" class="display" id="example">
								<thead bgcolor="#E6EEEE">
									<tr>
										<th>#</th>
										<th>Property Name</th>
										<th>Property Unit</th>
										<th>Repair Detail</th>										
										<th>Justification</th>										
										<th>Transactiontime</th>
										<th>Responsibility</th>
										<th>Repair Cost</th>
									</tr>
								</thead>
								<tbody>
								<?php
								if($property_manager_id == 0){
									$result_suppliers = mysql_query("select repairs_table.id, property_details.property_name, property_item.location, repair_name, repair_cost, justification, payment, repairs_table.transactiontime from repairs_table inner join property_details on property_details.id = repairs_table.property_name inner join property_item on property_item.id = repairs_table.property_unit where repair_month = '$repair_month' and repair_year = '$repair_year'");
								}
								else{
									$result_suppliers = mysql_query("select repairs_table.id, property_details.property_name, property_item.location, repair_name, repair_cost, justification, payment, repairs_table.transactiontime from repairs_table inner join property_details on property_details.id = repairs_table.property_name inner join property_item on property_item.id = repairs_table.property_unit where repair_month = '$repair_month' and repair_year = '$repair_year' and property_details.manager_id = '$property_manager_id'");
								}
									$intcount = 0;
									$total_repair_cost = 0;
									while ($row = mysql_fetch_array($result_suppliers))
									{
										$intcount++;
										$id = $row['id'];
										$property_name = $row['property_name'];
										$property_unit = $row['location'];
										$repair_name = $row['repair_name'];
										$repair_cost = $row['repair_cost'];
										$justification = $row['justification'];
										$transactiontime = $row['transactiontime'];
										$payment = $row['payment'];
										if($payment == '1'){
											$responsible='Tenant';
										}
										else{
											$responsible='Landlord';
										}
										if ($intcount % 2 == 0) {
											$display= '<tr bgcolor = #F0F0F6>';
										}
										else {
											$display= '<tr>';
										}
										echo $display;
											echo "<td valign='top'>$intcount</td>";
											echo "<td valign='top'>$property_name</td>";
											echo "<td valign='top'>$property_unit</td>";
											echo "<td valign='top'>$repair_name</td>";
											echo "<td valign='top'>$justification</td>";	
											echo "<td valign='top' align='center'>$transactiontime</td>";
											echo "<td valign='top' align='center'>$responsible</td>";
											echo "<td valign='top' align='right'>".number_format($repair_cost, 2)."</td>";	
										echo "</tr>";	
										//$total_deposit = $total_deposit + $deposit_payment;
										//$total_actual_deposit = $total_actual_deposit + $actual_deposit;
										//$total_commission = $total_commission + $comms_paid;
									
										$total_repair_cost = $total_repair_cost + $repair_cost;
										}
									?>
									</tbody>
									<tr bgcolor = '#E6EEEE'>
										<td colspan='7'><strong>Total Payment</strong></td>
										<td align='right'><strong><?php echo number_format($total_repair_cost, 2) ?></strong></td>
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
						<form id="frmDeptCategories" name="frmDeptCategories" method="GET" action="repairs_report.php">
							<table border="0" width="100%">
								<tr >
									<td width="30%">Select Month *</td>
									<td width="70%">
										<select name="month" id="month">
											<option value="">&nbsp;</option>
											<option value="1">January</option>
											<option value="2">February</option>
											<option value="3">March</option>
											<option value="4">April</option>
											<option value="5">May</option>
											<option value="6">June</option>
											<option value="7">July</option>
											<option value="8">August</option>
											<option value="9">September</option>
											<option value="10">October</option>
											<option value="11">November</option>
											<option value="12">December</option>
										</select>
									</td>
								</tr>
								<tr>
								<td>Select Year: *</td>
								<td>
									<select name="year" id="year">
										<option>&nbsp;</option>
										<?php
											$sql = mysql_query("select distinct repair_year from repairs_table order by repair_year asc");
											while($row = mysql_fetch_array($sql)) {
												$repair_year = $row['repair_year'];
												//echo "$county";
												echo "<option value='$repair_year'>".$repair_year."</option>"; 
											}
										?>
										</select>
									</td>
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
	include_once('includes/footer.php');
	?>
