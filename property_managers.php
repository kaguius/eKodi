<?php
	$userid = "";
	$adminstatus = "";
	session_start();
	if (!empty($_SESSION)){
		$userid = $_SESSION["userid"] ;
		$adminstatus = $_SESSION["adminstatus"] ;
	}
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
		$result_suppliers = mysql_query("select id, manager_code, company_name, physical_address, location, phone_number, email_address, commission, bank_name, bank_branch, account_name, account_number from property_managers where id = '$ID'");
		$intcount = 0;
		while ($row = mysql_fetch_array($result_suppliers))
		{
			$manager_code = $row['manager_code'];
			$company_name = $row['company_name'];
			$physical_address = $row['physical_address'];
			$location = $row['location'];
			$bank_name = $row['bank_name'];
			$bank_branch = $row['bank_branch'];
			$account_name = $row['account_name'];
			$account_number = $row['account_number'];
			$commission = $row['commission'];			
			$email_address = $row['email_address'];
			$phone_number = $row['phone_number'];
		}
		echo $phone_number;
		include_once('includes/header.php');
		?>		
		<div id="page">
			<div id="content">
				<div class="post">
					<h2><?php echo $property_name ?> | <?php echo $page_title ?> | e-kodi</h2>
					<strong>You are here:</strong> &raquo; <a href="index.php">Home</a> &raquo; <a href="property_listings.php">Properties</a> &raquo; Property Details<br />
					<strong>Manager Code: <?php echo $manager_code ?></strong><br />
						<table border='0' width='100%' cellpadding='2' cellspacing='2'>
							<tr >
								<td colspan="2"><strong><u>Property Manager Details</u></strong></td>
							</tr>
							<tr bgcolor = #F0F0F6>
								<td valign='top'>Company Name/ <br /> Property Manager Name *</td>
								<td valign='top'>
									<?php echo $company_name ?>
								</td>
								<td valign='top'>Physical Address</td>
								<td valign='top'>
									<textarea title="Enter Physical Address" name="physical_address" id="physical_address" cols="45" rows="5" class="textfield"><?php echo $physical_address ?></textarea>
								</td>
							</tr>
							<tr >
								<td valign='top'>Location *</td>
								<td valign='top' colspan="2">
									<input title="Enter Property Location" value="<?php echo $location ?>" id="location" name="location" type="text" maxlength="100" class="main_input" size="50" />
								</td>
							</tr>
							<tr bgcolor = #F0F0F6>
								<td valign='top'>Phone Number *</td>
								<td valign='top'>
									<input title="Enter Property Contact" value="<?php echo $phone_number ?>" id="phone_number" name="phone_number" type="text" maxlength="100" class="main_input" size="50" />
								</td>
								<td valign='top'>Email*</td>
								<td valign='top'>
									<input title="Enter Property Contact (Email Address)" value="<?php echo $email_address ?>" id="email_address" name="email_address" type="text" maxlength="100" class="main_input" size="50" />
								</td>
							</tr>
							<tr >
								<td valign='top'>System Commission (%)*</td>
								<td valign='top' colspan="2">
									<input title="Enter Commission" value="<?php echo $commission ?>" id="commission" name="commission" type="text" maxlength="100" class="main_input" size="20" />
								</td>
							</tr>
							<tr >
								<td colspan="2"><strong><u>Banking Details</u></strong></td>
							</tr>
							<tr >
								<td valign='top'>Bank Name </td>
								<td valign='top'>
									<input title="Enter Bank Name" value="<?php echo $bank_name ?>" id="bank_name" name="bank_name" type="text" maxlength="100" class="main_input" size="40" />
								</td>
								<td valign='top'>Bank Branch </td>
								<td valign='top'>
									<input title="Enter Bank Branch" value="<?php echo $bank_branch ?>" id="bank_branch" name="bank_branch" type="text" maxlength="100" class="main_input" size="40" />
								</td>
							</tr>
							<tr bgcolor = #F0F0F6>
								<td valign='top'>Account Name </td>
								<td valign='top'>
									<input title="Enter Account Name" value="<?php echo $account_name ?>" id="account_name" name="account_name" type="text" maxlength="100" class="main_input" size="40" />
								</td>
								<td valign='top'>Account Number </td>
								<td valign='top'>
									<input title="Enter Account Number" value="<?php echo $account_number ?>" id="account_number" name="account_number" type="text" maxlength="100" class="main_input" size="40" />
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
