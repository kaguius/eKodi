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
		$page_title = "Tenant Details";
		include_once('includes/db_conn.php');
		if (!empty($_GET)){	
			$ID = $_GET['id'];
		} 
		$result_suppliers = mysql_query("select tenant_code, property_details.property_name, property_item.location, property_item.floor, tenant_name, mailing_address, phone_number, tenants.email_address, next_kin, next_kin_contact, tenant_status.tenant_status from tenants inner join property_details on property_details.id = tenants.property_listing inner join property_item on property_item.id = tenants.property_block inner join tenant_status on tenant_status.id = tenants.tenant_status where tenants.id = '$ID'");
		while ($row = mysql_fetch_array($result_suppliers))
		{
			$property_name = $row['property_name'];
			$tenant_code = $row['tenant_code'];	
			$location = $row['location'];	
			$floor = $row['floor'];
			$tenant_name = $row['tenant_name'];
			$mailing_address = $row['mailing_address'];	
			$phone_number = $row['phone_number'];	
			$email_address = $row['email_address'];	
			$next_kin = $row['next_kin'];	
			$next_kin_contact = $row['next_kin_contact'];
			$tenant_status_value = $row['tenant_status'];
			if($tenant_status_value == "In-House"){
				$tenant_status = "<font color='green'>$tenant_status</font>";
			}
			else{
				$tenant_status = "<font color='red'>$tenant_status</font>";
			}
		}
		include_once('includes/header.php');
		?>		
		<div id="page">
			<div id="content">
				<div class="post">
					<h2><?php echo $page_title ?> | Property Name: <?php echo $property_name ?> | e-kodi</h2>
					<strong>You are here:</strong> &raquo; <a href="index.php">Home</a> &raquo; <a href="property_tenant_listing.php">Tenants</a> &raquo; View Tenant Details<br />
					<table border="0" width="100%" cellspacing="2" cellpadding="2">					
							<tr bgcolor = #F0F0F6>
								<td width="20%" valign='top'>Tenant Name </td>
								<td width="30%" valign='top'>
									<?php echo $tenant_name ?>
								</td>
								<td width="20%" valign="top">Mailing Address </td>
								<td width="30%" valign="top">
									<?php echo $mailing_address ?>
								</td>
							</tr>
							<tr >
								<td valign="top">Phone Number </td>
								<td valign="top">
									<?php echo $phone_number ?>
								</td>
								<td valign="top">Email Address</td>
								<td valign="top">
									<?php echo $email_address ?>
								</td>
							</tr>
							<tr bgcolor = #F0F0F6>
								<td valign="top">Tenant Status </td>
								<td valign="top">
									<?php echo $tenant_status_value ?>
								</td>
								<td valign="top">Next of Kin </td>
								<td valign="top">
									<?php echo $next_kin ?>
								</td>
							</tr>
							<tr >
								<td valign="top">Next of Kin Contact *</td>
								<td colspan="3" valign="top">
									<?php echo $next_kin_contact ?>
								</td>
							</tr>
							<tr bgcolor = #F0F0F6>
								<td valign="top">Tenant Code</td>
								<td valign="top">
									<?php echo $tenant_code ?>
								</td>
								<td valign="top">Property Details</td>
								<td valign="top">
									<?php echo $property_name.', Unit: '.$location.', Floor: '.$floor ?>
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
	include_once('includes/footer.php');
?>
