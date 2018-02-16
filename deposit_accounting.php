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
		$page_title = "Security Deposit Accounting";
		include_once('includes/db_conn.php');
		$transactiontime = date("Y-m-d G:i:s");
		$property_name = "";
		$physical_address = "";
		$location = "";
		$property_owner = "";
		$propety_contact = "";
		$bank_name = "";
		$bank_branch = "";
		$account_name = "";
		$account_number = "";
		if (!empty($_GET)){	
			$property_id = $_GET['property_name'];
			$action = $_GET['action'];
			$tenant_code_vacate = $_GET['tenant_code'];
		}

		$result_suppliers = mysql_query("select id, property_name, location from property_details where id = '$property_id'");
		while ($row = mysql_fetch_array($result_suppliers))
		{
			$property_name = $row['property_name'];
		}
		include_once('includes/header.php');
		?>		
		<div id="page">
			<div id="content">
				<div class="post">
					<h2><?php echo $page_title ?> | e-kodi</h2>
					<strong>You are here:</strong> &raquo; <a href="index.php">Home</a> &raquo; <a href="reports.php">Reports</a>  &raquo; <?php echo $page_title ?><br />
					<table width="100%" border="0" cellspacing="2" cellpadding="2" class="display" id="example">
						<thead bgcolor="#E6EEEE">
							<tr>
								<th>#</th>
								<th>Name</th>
								<th>Property</th>
								<th>Unit</th>
								<th>Deposit</th>
								<th>Water</th>
								<th>Electricity</th>
								<th>Repairs</th>
								<th>Remittance</th>
								<th>Checklist</th>
							</tr>
						</thead>
						<tbody>
						<?php
							if($property_manager_id == 0){
								$result_suppliers = mysql_query("select tenants.id, property_details.property_name, (property_item.property_listing)property_id, (property_item.id)unit_id, property_item.location, property_item.floor, tenant_name, sum(payments.payment)payment, (payments.water_deposit)water_deposit, (payments.elec_deposit)elec_deposit from tenants inner join payments on payments.tenant_id = tenants.id inner join property_details on property_details.id = tenants.property_listing inner join property_item on property_item.id = tenants.property_block inner join tenant_status on tenant_status.id = tenants.tenant_status where payments.category = '1' group by payments.payment order by tenant_status.id, property_name, tenant_name asc");
								//$result_suppliers = mysql_query("select tenants.id, property_details.property_name, (property_item.property_listing)property_id, (property_item.id)unit_id, property_item.location, property_item.floor, tenant_name, sum(payments.payment)payment from tenants inner join payments on payments.tenant_id = tenants.id inner join property_details on property_details.id = tenants.property_listing inner join property_item on property_item.id = tenants.property_block inner join tenant_status on tenant_status.id = tenants.tenant_status where tenants.tenant_status <> '1' and payments.category = '1' group by payments.payment order by tenant_status.id, property_name, tenant_name asc");
							}
							else{
								$result_suppliers = mysql_query("select tenants.id, property_details.property_name, (property_item.property_listing)property_id, (property_item.id)unit_id, property_item.location, property_item.floor, tenant_name, sum(payments.payment)payment from tenants inner join payments on payments.tenant_id = tenants.id inner join property_details on property_details.id = tenants.property_listing inner join property_item on property_item.id = tenants.property_block inner join tenant_status on tenant_status.id = tenants.tenant_status where tenants.manager_id = '$property_manager_id' and tenants.tenant_status <> '1' and payments.category = '1' group by payments.payment order by tenant_status.id, property_name, tenant_name asc");
							}
							
							$intcount = 0;
							$balance = 0;
								while ($row = mysql_fetch_array($result_suppliers))
								{
									$intcount++;
									$id = $row['id'];
									$property_id = $row['property_id'];
									$unit_id = $row['unit_id'];
									$tenant_name = $row['tenant_name'];
									$location = $row['location'];
									$floor = $row['floor'];
									$property_name = $row['property_name'];
									$tenant_status = $row['tenant_status'];
									$payment = $row['payment'];
									$water_deposit = $row['water_deposit'];
									$elec_deposit = $row['elec_deposit'];
									$block_occupied = $location.", ".$floor;
									$cost = 0;
									$result = mysql_query("select sum(cost)cost from tenant_checklist where property_id = '$property_id' and unit_id = '$unit_id' and tenant_id = '$id'");
									while ($row = mysql_fetch_array($result))
									{
										$cost = $row['cost'];
									}
									$balance = ($payment + $water_deposit + $elec_deposit) - $cost;
									if ($intcount % 2 == 0) {
										$display= '<tr bgcolor = #F0F0F6>';
									}
									else {
										$display= '<tr>';
									}
									
									echo $display;
										echo "<td valign='top'>$intcount</td>";
										echo "<td valign='top'>$property_name</td>";
										echo "<td valign='top'>$tenant_name</td>";
										echo "<td valign='top'>$block_occupied</td>";
										echo "<td valign='top' align='right'>".number_format($payment, 2)."</td>";
										echo "<td valign='top' align='right'>".number_format($water_deposit, 2)."</td>";
										echo "<td valign='top' align='right'>".number_format($elec_deposit, 2)."</td>";	
										echo "<td valign='top' align='right'>".number_format($cost, 2)."</td>";										
										echo "<td valign='top' align='right'>".number_format($balance, 2)."</td>";	
										echo "<td valign='top' align='center'><a title = 'Tenant Property Checklist' href='checklist_moveout.php?$location&property_id=$property_id&action=checklist&tenant_id=$id&unit_id=$unit_id'><img src='images/checklist-icon2.png' width='20px'></a></td>";										
										
									echo "</tr>";								
								}
								$balance = 0;
								$cost = 0;	
							?>
						</tbody>
						<tfoot bgcolor="#E6EEEE">
							<tr>
								<th>#</th>
								<th>Name</th>
								<th>Property</th>
								<th>Unit</th>
								<th>Deposit</th>
								<th>Water</th>
								<th>Electricity</th>
								<th>Repairs</th>
								<th>Remittance</th>
								<th>Checklist</th>
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
