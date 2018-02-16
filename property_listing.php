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
		$page_title = "Property Details";
		include_once('includes/db_conn.php');
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
			$ID = $_GET['id'];
		} 
		$result_suppliers = mysql_query("select id, property_code, commission, deposit, property_name, property_owner, physical_address, location, propety_contact, bank_name, bank_branch, account_name, account_number, penalties_day, penalties, transactiontime, water_cost, taxes, email_address from property_details where id = '$ID'");
		$intcount = 0;
		while ($row = mysql_fetch_array($result_suppliers))
		{
			$intcount++;
			$property_code = $row['property_code'];	
			$property_name = $row['property_name'];	
			$physical_address = $row['physical_address'];
			$location = $row['location'];
			$property_owner = $row['property_owner'];	
			$propety_contact = $row['propety_contact'];	
			$deposit = $row['deposit'];	
			$bank_name = $row['bank_name'];	
			$bank_branch = $row['bank_branch'];
			$account_name = $row['account_name'];
			$account_number = $row['account_number'];	
			$commission = $row['commission'];
			$penalties_day = $row['penalties_day'];
			$penalties = $row['penalties'];
			$email_address = $row['email_address'];
			$water_cost = $row['water_cost'];
			$transactiontime = $row['transactiontime'];
			$taxes = $row['taxes'];
		}
		include_once('includes/header.php');
		?>		
		<div id="page">
			<div id="content">
				<div class="post">
					<h2><?php echo $property_name ?> | <?php echo $page_title ?> | e-kodi</h2>
					<strong>You are here:</strong> &raquo; <a href="index.php">Home</a> &raquo; <a href="property_listings.php">Properties</a> &raquo; Property Details<br />
					<strong>Property Code: <?php echo $property_code ?></strong><br />
						<table border='0' width='100%' cellpadding='5' cellspacing='3'>
							<tr >
								<td colspan="2"><strong><u>Property Details</u></strong></td>
							</tr>
							<tr bgcolor = #F0F0F6>
								<td valign='top' width="20%">Property Name</td>
								<td valign='top' width="30%">
									<?php echo $property_name ?>
								</td>
								<td valign='top' width="20%">Physical Address</td>
								<td valign='top' width="30%">
									<?php echo $physical_address ?>
								</td>
							</tr>
							<tr >
								<td valign='top'>Property Location</td>
								<td valign='top'>
									<?php echo $location ?>
								</td>
								<td valign='top'>Property Owner</td>
								<td valign='top'>
									<?php echo $property_owner ?>
								</td>
							</tr>
							<tr bgcolor = #F0F0F6>
								<td valign='top'>Phone Number</td>
								<td valign='top'>
									<?php echo $propety_contact ?>
								</td>
								<td valign='top'>Email*</td>
								<td valign='top'>
									<?php echo $email_address ?>
								</td>
							</tr>
							<tr >
								<td valign='top'>Deposit Months</td>
								<td valign='top'>
									<?php echo $deposit ?> Months
								</td>
								<td valign='top'>Commission (%)</td>
								<td valign='top'>
									<?php echo $commission ?>%
								</td>
							</tr>
							<tr bgcolor = #F0F0F6>
								<td valign='top'>Penalties Cut-off Day <br />(Day of the Month)*</td>
								<td valign='top'>
									<?php echo $penalties_day ?>th Day of the Month
								</td>
								<td valign='top'>Penalties <br />(% of the Rent)*</td>
								<td valign='top'>
									<?php echo $penalties ?>th Day of the Month
								</td>
							</tr>
							<tr bgcolor = #F0F0F6>
								<td valign='top'>Water cost (Cubic Meter)*</td>
								<td valign='top'>
									KES <?php echo $water_cost ?>
								</td>
								<td valign='top'>Taxes*</td>
								<td valign='top'>
									<?php echo $taxes ?>
								</td>
							</tr>
							<tr >
								<td colspan="2"><strong><u>Banking Details</u></strong></td>
							</tr>
							<tr bgcolor = #F0F0F6>
								<td valign='top'>Bank Name </td>
								<td valign='top'>
									<?php echo $bank_name ?>
								</td>
								<td valign='top'>Bank Branch </td>
								<td valign='top'>
									<?php echo $bank_branch ?>
								</td>
							</tr>
							<tr>
								<td valign='top'>Account Name </td>
								<td valign='top'>
									<?php echo $account_name ?>
								</td>
								<td valign='top'>Account Number </td>
								<td valign='top'>
									<?php echo $account_number ?>
								</td>
							</tr>
						</table>
						<table width="100%">
							<tr bgcolor = #F0F0F6>
								<td width="25%" valign="top" align="center"><a title = "Create Unit Blocks for <?php echo $property_name ?>" href="create_property_item.php?id=<?php echo $ID; ?>"><img src="images/add.jpg" width="35px"></a><br /> Add Units</td>
								<td width="25%" valign="top" align="center"><a href="detailed_property_listing.php?id=<?php echo $ID ?>" title = "View Unit Blocks for <?php echo $property_name; ?>"><img src="images/units.jpg" width="35px"></a><br /> View Units</td>
								<td width="25%" valign="top" align="center"><a title = "Create Expenses for <?php echo $property_name ?>" href="create_expense.php?id=<?php echo $ID ?>"><img src="images/expenses.jpg" width="35px"></a><br /> Create Expenses</td>
								<td  width="25%" valign="top" align="center"><a title = "Edit Detail" href="create_property.php?id=<?php echo $ID ?>&action=edit"><img src="images/edit.jpg" width="35px"></a><br /> Edit Property</td>
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
