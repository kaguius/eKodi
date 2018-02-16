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
		$page_title = "Remmitances Report";
		include_once('includes/header.php');
		if (!empty($_GET)){	
			$report_start_date = $_GET['report_start_date'];
			$report_end_date = $_GET['report_end_date'];
			$property_id = $_GET['property_name'];
			$remit_id = $_GET['remit_id'];
			$action = $_GET['action'];

			if($action=='delete'){
				$sql5="delete from property_owner_remittances where id = '$remit_id'";	
				//echo $sql5;
				$result = mysql_query($sql5);
				?>
				<script type="text/javascript">
				<!--
					document.location = "remmitances_report.php";
				//-->
				</script>
				<?php
			}
		} 
		if ($report_start_date != "" || $report_end_date != ""){
			$page_title = "Detailed Remmitances Report";
			$result_tender = mysql_query("select month from calender where id = '$comm_month'");
			while ($row = mysql_fetch_array($result_tender))
			{
				$actual_comm_month = $row['month'];
			}
			$report_start_date = date('Y-m-d', strtotime(str_replace('-', '/', $report_start_date)));
			$report_start_month = date('m',strtotime($report_start_date));
			$report_start_year = date('Y',strtotime($report_start_date));
			$report_end_date = date('Y-m-d', strtotime(str_replace('-', '/', $report_end_date)));
			$report_end_month = date('m',strtotime($report_end_date));
			$report_end_year = date('Y',strtotime($report_end_date));
			$report_start_date = date("d M, Y", strtotime($report_start_date));
			$report_end_date = date("d M, Y", strtotime($report_end_date));
		?>
			<div id="page">
				<div id="content">
					<div class="post">
						<h2><?php echo $page_title ?> | e-kodi</h2>
							Reporting Date: <?php echo $report_start_date ." to ".$report_end_date ?><br />
							<table width="100%" border="0" cellspacing="2" cellpadding="2" class="display" id="eample">
								<thead bgcolor="#E6EEEE">
									<tr>
										<th>#</th>
										<th>Unit</th>
										<th>Tenant</th>	
										<th>Date</th>
										<th>Type</th>
										<th>Trans ID</th>
										<th>Transactiontime</th>
										<th>Amount</th>
										<th>&nbsp;</th>
										<th>Delete</th>
									</tr>
								</thead>
								<tbody>
								<?php
								if($property_manager_id == 0){
									$result_suppliers = mysql_query("select (property_owner_remittances.id)remit_id, property_item.location, tenants.tenant_name, amount, remmitance_month, remmitance_year, payment_type.payment_type, property_owner_remittances.manager_id, property_owner_remittances.UID, trans_id, property_owner_remittances.transactiontime, trans_id_date from property_owner_remittances inner join property_item on property_item.id = property_owner_remittances.unit_id inner join payment_type on payment_type.id = property_owner_remittances.payment_type inner join tenants on tenants.id = property_owner_remittances.tenant_id where pay_month between '$report_start_month' and '$report_end_month' and pay_year between '$report_start_year' and '$report_end_year' and property_item.property_listing = '$property_id' order by trans_id_date asc");
								}
								else{
									$result_suppliers = mysql_query("select (property_owner_remittances.id)remit_id, property_item.location, tenants.tenant_name, amount, remmitance_month, remmitance_year, payment_type.payment_type, property_owner_remittances.manager_id, property_owner_remittances.UID, trans_id, property_owner_remittances.transactiontime, trans_id_date from property_owner_remittances inner join property_item on property_item.id = property_owner_remittances.unit_id inner join payment_type on payment_type.id = property_owner_remittances.payment_type inner join tenants on tenants.id = property_owner_remittances.tenant_id where property_owner_remittances.manager_id = '$property_manager_id' and pay_month between '$report_start_month' and '$report_end_month' and pay_year between '$report_start_year' and '$report_end_year' and property_item.property_listing = '$property_id' order by trans_id_date asc");
								}
									
									$intcount = 0;
									$total_comms = 0;
									while ($row = mysql_fetch_array($result_suppliers))
									{
										$intcount++;
										$id = $row['id'];
										$remit_id = $row['remit_id'];
										$location = $row['location'];
										$tenant_name = $row['tenant_name'];
										$amount = $row['amount'];
										$payment_type = $row['payment_type'];
										$remmitance_month = $row['remmitance_month'];
										
										$remmitance_year = $row['remmitance_year'];
										$trans_id = $row['trans_id'];
										$trans_id_date = $row['trans_id_date'];
										$trans_id_date = date("d M, Y", strtotime($trans_id_date));
										$commission = $row['transactiontime'];
										$result_tender = mysql_query("select month from calender where id = '$remmitance_month'");
										while ($row = mysql_fetch_array($result_tender))
										{
											$remmitance_month = $row['month'];
										}
										$period = $remmitance_month." ".$remmitance_year;
										if ($intcount % 2 == 0) {
											$display= '<tr bgcolor = #F0F0F6>';
										}
										else {
											$display= '<tr>';
										}
										echo $display;
											echo "<td valign='top'>$intcount</td>";
											echo "<td valign='top'>$location</td>";
											echo "<td valign='top'>$tenant_name</td>";	
											echo "<td valign='top'>$trans_id_date</td>";	
											echo "<td valign='top' align='center'>$payment_type</td>";
											echo "<td valign='top' align='center'>$trans_id</td>";									
											echo "<td valign='top' align='center'>$transactiontime</td>";
											echo "<td valign='top' align='right'>KES ".number_format($amount, 2)."</td>";
											echo "<td valign='top'>&nbsp;</td>";	
											echo "<td valign='top' align='center'><a title = 'Delete $property_name Details' href='remmitances_report.php?remit_id=$remit_id&action=delete'><img src='images/delete.png' width='25px'></a></td>";
										echo "</tr>";	
										$total_comms = $total_comms + $amount;
										}
									?>
									</tbody>
									<tr bgcolor = '#E6EEEE'>
										<td colspan='7'><strong>Total Payments</strong></td>
										<td align='right'><strong>KES <?php echo number_format($total_comms, 2) ?></strong></td>
										<td><strong>&nbsp;</strong></td>
										<td><strong>&nbsp;</strong></td>
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
						<form id="frmDeptCategories" name="frmDeptCategories" method="GET" action="remmitances_report.php">
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
									<td>Select Property: *</td>
								<td>
									<select name="property_name" id="property_name">
										<option>&nbsp;</option>
										<?php
										if($property_manager_id == 0){
											$sql = mysql_query("select id, property_name from property_details order by property_name asc");
										}
										else {
											$sql = mysql_query("select id, property_name from property_details where manager_id = '$property_manager_id' order by property_name asc");
										}
											while($row = mysql_fetch_array($sql)) {
												$id = $row['id'];
												$property_name = $row['property_name'];
												$string = substr($property_name, 0, 2);
												if($string == 'ZA'){
													$property = 'Zawadi Apartments';
													$property_name = $property.": ".$property_name;
												}
												else{
													$property_name = $property_name;
												}
												//echo "$county";
												echo "<option value='$id'>".$property_name."</option>"; 
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
