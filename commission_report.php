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
		$comm_month = "";
		$comm_year = "";
		$transactiontime = date("Y-m-d G:i:s");
		$page_title = "Commissions Report";
		include_once('includes/header.php');
		if (!empty($_GET)){	
			$comm_month = $_GET['month'];
			$comm_year = $_GET['year'];
		} 
		if ($comm_month != "" || $comm_year != ""){
			$page_title = "Detailed Commissions Report";
			$result_tender = mysql_query("select month from calender where id = '$comm_month'");
			while ($row = mysql_fetch_array($result_tender))
			{
				$actual_comm_month = $row['month'];
			}
		?>
			<div id="page">
				<div id="content">
					<div class="post">
						<h2><?php echo $page_title ?> | e-kodi</h2>
							Reporting Date: <?php echo $actual_comm_month .", ".$comm_year ?>
							<table width="100%" border="0" cellspacing="2" cellpadding="2" class="display" id="example">
								<thead bgcolor="#E6EEEE">
									<tr>
										<th>#</th>
										<th>Property</th>
										<th>Unit</th>
										<th>Tenant</th>
										<th>Source</th>	
										<th>Transactiontime</th>
										<th>% Comms</th>
										<th>Commission</th>
									</tr>
								</thead>
								<tbody>
								<?php
								if($property_manager_id == 0){
									$result_suppliers = mysql_query("select property_item.property_listing, comms_table.id, (property_item.id)unit_id, (tenants.id)tenant_id, property_details.property_name, property_details.commission, banked, property_item.floor, property_item.location, tenants.tenant_name, comm_paid, comm_month, comm_year, comms_table.transactiontime, status, comms_table.manager_id from comms_table inner join property_item on property_item.id = comms_table.unit_id inner join property_details on property_item.property_listing = property_details.id inner join tenants on tenants.id = comms_table.tenant_id where comm_month = '$comm_month' and comm_year = '$comm_year' order by status,tenants.tenant_name asc");
								}
								else{
									$result_suppliers = mysql_query("select property_item.property_listing, comms_table.id, (property_item.id)unit_id, (tenants.id)tenant_id, property_details.property_name, property_details.commission, banked, property_item.floor, property_item.location, tenants.tenant_name, comm_paid, comm_month, comm_year, comms_table.transactiontime, status, comms_table.manager_id from comms_table inner join property_item on property_item.id = comms_table.unit_id inner join property_details on property_item.property_listing = property_details.id inner join tenants on tenants.id = comms_table.tenant_id where comm_month = '$comm_month' and comm_year = '$comm_year' and property_details.manager_id = '$property_manager_id' order by status,tenants.tenant_name asc");
								}
									
									$intcount = 0;
									$total_comms = 0;
									$total_system_comms = 0;
									while ($row = mysql_fetch_array($result_suppliers))
									{
										$intcount++;
										$id = $row['id'];
										$property_name = $row['property_name'];
										$property_listing = $row['property_listing'];
										$unit_id = $row['unit_id'];
										$tenant_id = $row['tenant_id'];
										$commission = $row['commission'];
										$floor = $row['floor'];
										$location = $row['location'];					
										$block_occupied = $location;
										$tenant_name = $row['tenant_name'];
										$comm_paid = $row['comm_paid'];
										$transactiontime = $row['transactiontime'];
										$manager_id = $row['manager_id'];
										$status = $row['status'];
										$result = mysql_query("select commission from property_managers where id = '$manager_id'");
										while ($row = mysql_fetch_array($result))
										{
											$system_comm = $row['commission'];
										}
										$system_comms = 1000;
										if ($intcount % 2 == 0) {
											$display= '<tr bgcolor = #F0F0F6>';
										}										
										else {
											$display= '<tr>';
										}
										echo $display;
											echo "<td valign='top'>$intcount.</td>";
											echo "<td valign='top'>$property_name</td>";
											echo "<td valign='top'>$block_occupied</td>";
											echo "<td valign='top'>$tenant_name</td>";	
											if($status == 1) {
												echo "<td valign='top'>Deposit</td>";	
											}
											else {
												echo "<td valign='top'>Rent</td>";		
											}
											echo "<td valign='top' align='center'>$transactiontime</td>";
											echo "<td valign='top' align='center'>$commission%</td>";
											echo "<td valign='top' align='right'>".number_format($comm_paid, 2)."</td>";
										echo "</tr>";	
										$total_comms = $total_comms + $comm_paid;
										}
									?>
									</tbody>
									<tr bgcolor = '#E6EEEE'>
										<td colspan='7'><strong>Total Payment</strong></td>
										<td align='right'><strong><?php echo number_format($total_comms, 2) ?></strong></td>
									</tr>
								<tfoot bgcolor="#E6EEEE">
									<tr>
										<th>#</th>
										<th>Property</th>
										<th>Unit</th>
										<th>Tenant</th>
										<th>Source</th>	
										<th>Transactiontime</th>
										<th>% Comms</th>
										<th>Commission</th>
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
		else{
		?>
		<div id="page">
			<div id="content">
				<div class="post">
					<h2><?php echo $page_title ?> | e-kodi</h2>
						<form id="frmDeptCategories" name="frmDeptCategories" method="GET" action="commission_report.php">
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
											$sql = mysql_query("select distinct rent_year from payments order by rent_year asc");
											while($row = mysql_fetch_array($sql)) {
												$rent_year = $row['rent_year'];
												//echo "$county";
												echo "<option value='$rent_year'>".$rent_year."</option>"; 
											}
										?>
										</select>
									</td>
								</tr>
								<tr>
									<td colspan="3">
										<button name="btnNewCard" id="button">Submit</button>
									</td>
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
