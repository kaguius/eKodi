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
		$page_title = "Tenant Listings";
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
			$unit_id = $_GET['unit_id'];	
			//$property_id = $_GET['property_id'];
			$tenant_id = $_GET['tenant_id'];
		}

		if ($action=='vacate'){
			$result = mysql_query("select id, property_listing, property_block from tenants where tenant_code = '$tenant_code_vacate'");
			while ($row = mysql_fetch_array($result))
			{
				$property = $row['property_listing'];
				$block = $row['property_block'];
				$tenant_vacate_id = $row['id'];
			}
			//$sql="update property_item set tenant = '0' where tenant = '$tenant_vacate_id' and propert_listing = '$property' and id = '$block'";
			$sql="update property_item set tenant = '0' where tenant = '$tenant_vacate_id'";

			//echo $sql."<br />";
			$result = mysql_query($sql);

			$sql2="update tenants set tenant_status = '2' where tenant_code = '$tenant_code_vacate'";
			//echo $sql2;
			$result = mysql_query($sql2);
			
			$sql3="update user_profiles set tenant_id = '0' where tenant_id = '$tenant_vacate_id'";
			//echo $sql2;
			$result = mysql_query($sql3);

			$location = MD5(checklist_item_exists);
			$query = "checklist_view.php?$location&property_id=$property_id&action=checklist&tenant_code=$tenant_code_vacate&tenant_id=$tenant_id&unit_id=$unit_id";
			//echo $query;

			?>
				<script type="text/javascript">
					document.location = "<?php echo $query ?>";
				</script>
			<?php
		}

		$result_suppliers = mysql_query("select id, property_name, location from property_details where id = '$property_id'");
		while ($row = mysql_fetch_array($result_suppliers))
		{
			$property_name = $row['property_name'];
			$property_name = ucwords(strtolower($property_name));
		}
		include_once('includes/header.php');
		?>		
		<div id="page">
			<div id="content">
				<div class="post">
					<h2><?php echo $page_title ?> | e-kodi</h2>
					<strong>You are here:</strong> &raquo; <a href="index.php">Home</a> &raquo; <a href="property_tenant_listing.php">Tenants</a> &raquo; <a href="property_tenant_listing.php">Property Tenant Listing</a> &raquo; Tenant Listing for Property <?php echo $property_name ?><br />
					<table width="100%" border="0" cellspacing="2" cellpadding="2" class="display" id="example">
						<thead bgcolor="#E6EEEE">
							<tr>
								<th>#</th>
								<th>Code</th>
								<th>Unit</th>
								<th>Name</th>							
								<th>Status</th>
								<th>Statement</th>
								<th>Checklist</th>
								<th>Vacate</th>								
								<th>Invoice</th>
								<th>Agreement</th>
								<th>Payment History</th>
							</tr>
						</thead>
						<tbody>
						<?php
							$result_suppliers = mysql_query("select tenants.id, tenant_code, property_details.property_name, (property_item.id)unit_id, property_item.location, property_item.floor, tenant_name, mailing_address, phone_number, tenants.email_address, next_kin, next_kin_contact, tenant_status.tenant_status, tenants.transactiontime from tenants inner join property_details on property_details.id = tenants.property_listing inner join property_item on property_item.id = tenants.property_block inner join tenant_status on tenant_status.id = tenants.tenant_status where tenants.property_listing = '$property_id' order by tenant_status.id, unit_id, tenant_name asc");
							$intcount = 0;
								while ($row = mysql_fetch_array($result_suppliers))
								{
									$intcount++;
									$id = $row['id'];
									$unit_id = $row['unit_id'];
									$tenant_code = $row['tenant_code'];
									$tenant_name = $row['tenant_name'];
									$tenant_name = ucwords(strtolower($tenant_name));
									$location = $row['location'];
									$floor = $row['floor'];
									$phone_number = $row['phone_number'];
									$tenant_status = $row['tenant_status'];
									$transactiontime = $row['transactiontime'];
									$block_occupied = $location.", ".$floor;
									$block_occupied = ucwords(strtolower($block_occupied));
									$tenant_status_value = $row['tenant_status'];
									if($tenant_status == "In-House"){
										$tenant_status = "<font color='green'>$tenant_status</font>";
									}
									else{
										$tenant_status = "<font color='red'>$tenant_status</font>";
									}

									$tenant_id_type = 0;
									$result = mysql_query("select distinct tenant_id from tenant_checklist where tenant_id = '$id' and property_id = '$property_id' and unit_id = '$unit_id'");
									while ($row = mysql_fetch_array($result))
									{
										$tenant_id_type = $row['tenant_id'];
									}

									if ($intcount % 2 == 0) {
										$display= '<tr bgcolor = #F0F0F6>';
									}
									else {
										$display= '<tr>';
									}

									echo $display;
										echo "<td valign='top'>$intcount</td>";
										echo "<td valign='top'><a href='add_tenant.php?id=$id&action=edit' title='Tenant Details'>$tenant_code</a></td>";
										echo "<td valign='top'>$block_occupied</td>";
										echo "<td valign='top'>$tenant_name</td>";
										echo "<td valign='top'>$tenant_status</td>";
										echo "<td valign='top' align='center'><a href='tenant_statement.php?tenant_id=$id&property_id=$property_id'><img src='images/statement_icon.jpeg' width='25px'></a></td>";
										if($tenant_id_type == ""){
											echo "<td valign='top' align='center'><a title = 'Tenant Property Checklist' href='checklist.php?$location&property_id=$property_id&action=checklist&tenant_code=$tenant_code&tenant_id=$id&unit_id=$unit_id'><img src='images/checklist-icon2.png' width='20px'></a></td>";
										}
										else{
											echo "<td valign='top' align='center'><img src='images/delete.png' width='20px'></td>";
										}
											
										if($tenant_status_value == "In-House"){
											echo "<td valign='top' align='center'><a title = 'Vacate tenant $tenant_name and complete Move Out Checklist' href='tenant_listings.php?$location&property_name=$property_id&action=vacate&tenant_code=$tenant_code&tenant_id=$id&unit_id=$unit_id'><img src='images/delete.png' width='20px'></a></td>";
											echo "<td valign='top' align='center'><a title = 'Tenancy Invoice for $tenant_name' href='tenant_invoice.php?tenant_id=$id&property_id=$property_id'><img src='images/INVOICE_icon.gif' width='25px'></a></td>";
										}
										else{
											echo "<td valign='top' align='center'><img src='images/active.png' width='20px'></td>";
											echo "<td valign='top' align='center'><img src='images/delete.png' width='20px'></td>";
										}
										echo "<td valign='top' align='center'><a title = 'Tenancy Agreement for $tenant_name' href='tenancy_agreement.php?tenant_id=$id&unit_id=$unit_id&property_name=$property_id'><img src='images/pen_icon_2.jpg' width='20px'></a></td>";
										echo "<td valign='top' align='center'><a title = 'Edit Meter Reading' href='tenant_payment_history.php?tenant_id=$id&unit_id=$unit_id'><img src='images/history_icon.jpg' width='25px'></a></td>";
										
											
										
									echo "</tr>";	
								}
							?>
						</tbody>
						<tfoot bgcolor="#E6EEEE">
							<tr>
								<th>#</th>
								<th>Code</th>
								<th>Name</th>
								<th>Unit</th>
								<th>Status</th>
								<th>Statement</th>
								<th>Checklist</th>
								<th>Vacate</th>								
								<th>Invoice</th>
								<th>Agreement</th>
								<th>Payment History</th>
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
