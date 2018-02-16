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
		$page_title = "Add Tenant";
		
		include ("includes/core_functions.php");	
		include_once('includes/db_conn.php');
		$transactiontime = date("Y-m-d G:i:s");
		
		include_once('includes/header.php');
		?>		
		<div id="page">
			<div id="content">
				<div class="post">
					<h2><?php echo $page_title ?> | e-kodi</h2>
					<form id="frmCreateTenant" name="frmCreateTenant" method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
						
						<input type="hidden" name="commission" value="<?php echo $commission ?>">
						<table width="100%" border="0" cellspacing="2" class="display" cellpadding="2" id="example" >
								<thead bgcolor="#E6EEEE">
									<tr>
										<th>Approach</th>
										<th>Location</th>
										<th>Construction Set</th>
										<th>Status</th>
										<th>Remarks</th>						
									</tr>
								</thead>
								<tbody>
								<?php
									$result_suppliers = mysql_query("select id, approach from checklist_approach;
");
									$intcount = 0;
									while ($row = mysql_fetch_array($result_suppliers))
									{
										$intcount++;
										$approach_id = $row['id'];
										$approach_name = $row['approach'];
										$floor = $row['floor'];
										echo '<tr>';
											echo "<td valign='top'>$approach_name</td>";
											$result = mysql_query("select id, approach, locarion from checklist_location where approach = '$approach_id' order by id asc;");
											$intcount2 = 0;
											while ($row = mysql_fetch_array($result))
											{
												$intcount++;
												$location_id = $row['id'];
												$location = $row['locarion'];
												echo '<tr>';
													echo "<td valign='top'>&nbsp;</td>";
													echo "<td valign='top'>$location</td>";
													if($approach_id=='1'){
														echo "<td valign='top'>&nbsp;</td>";							
														echo "<td valign='top'><input name='status' type='checkbox'";
													}
													$resul = mysql_query("select id, location, construct from checklist_const where location = '$location_id' order by id asc;");
													$intcount = 0;
													while ($row = mysql_fetch_array($resul))
													{
														$intcount++;
														$construct_id = $row['id'];
														$construct = $row['construct'];
														echo '<tr>';
															echo "<td valign='top'>&nbsp;</td>";
															echo "<td valign='top'>&nbsp;</td>";
															echo "<td valign='top'>$construct</td>";
															echo "<td valign='top'><input name='status' type='checkbox'";
														
														echo "</tr>";
														echo "<tr>";
															echo "<td valign='top'>&nbsp;</td>";
															echo "<td valign='top'>&nbsp;</td>";
															echo "<td valign='top'>&nbsp;</td>";
															echo "<td valign='top'>&nbsp;</td>";
															echo "<td valign='top'><input name='status' type='text'";	
														echo "</tr>";
														}
												echo "</tr>";	
												}
											
										echo "</tr>";	
										}
									?>
									</tbody>
									<tfoot bgcolor="#E6EEEE">
										<tr>
											<th>Approach</th>
											<th>Location</th>
											<th>Construction Set</th>
											<th>Status</th>
											<th>Remarks</th>
										</tr>
									</tfoot>
							</table>
						<table border="0" width="100%">
							<tr>
								<td valign="top">
									<input type="submit" class="buttonSubmit" value="Save" name="btnNewCard"/>
								</td>
								<td align="right">
									<input type="reset" class="buttonSubmit" value="Reset" />
								</td>
							</tr>
						</table>
						<script  type="text/javascript">
							var frmvalidator = new Validator("frmCreateTenant");
							frmvalidator.addValidation("tenant_name","req","Please enter the Tenant Name");
							frmvalidator.addValidation("mailing_address","req","Please enter the Tenant's Mailing Address");
							frmvalidator.addValidation("phone_number","req","Please enter the Tenant's Phone Number");
							frmvalidator.addValidation("tenant_status","req","Please enter the tenent Status");
							frmvalidator.addValidation("next_kin","req","Please enter the Tenant's Next of Kin");
							frmvalidator.addValidation("next_kin_contact","req","Please enter the Tenant's Next of Kin Contact Information");
						</script>
					</form>
				</div>
			</div>
			<br class="clearfix" />
			</div>
		</div>
		<?php
		$deposit_month = date("m");
		$deposit_year = date("Y");
			if (!empty($_POST)) {
				$property_listing = $_POST['property_listing'];
				$rent_expt = $_POST['rent_expt'];
				$property_block = $_POST['property_block'];
				$tenant_name = $_POST['tenant_name'];
				$mailing_address = $_POST['mailing_address'];
				$phone_number = $_POST['phone_number'];
				$email_address = $_POST['email_address'];
				$tenant_status = $_POST['tenant_status'];
				$next_kin = $_POST['next_kin'];
				$next_kin_contact = $_POST['next_kin_contact'];
				$deposit_amt_paid = $_POST['deposit_amt_paid'];
				$commission = $_POST['commission'];
				$service_charge = $_POST['service_charge'];
				$payment_type = $_POST['payment_type'];
				
				//Calculate commission on rent and deposit
				//rent
				$rent_comm = $rent_expt - $service_charge;
				$value_rent_comm = $rent_comm * ($commission / 100);
				$actual_rent = $rent_expt - $value_rent_comm;
				
				//deposit
				//$value_deposit_comm = $deposit_amt_paid * ($commission / 100);
				$actual_deposit = $deposit_amt_paid - $value_deposit_comm;
				
				$sql3="
					INSERT INTO tenants (property_listing, property_block, tenant_name, mailing_address, phone_number, email_address, tenant_status, next_kin, next_kin_contact, transactiontime)
					VALUES('$property_listing', '$property_block', '$tenant_name', '$mailing_address', '$phone_number', '$email_address', '$tenant_status', '$next_kin', '$next_kin_contact', '$transactiontime')";

				//echo $sql3;
				$result = mysql_query($sql3);
				
				$result_tender = mysql_query("select id from tenants order by id desc limit 1");
				while ($row = mysql_fetch_array($result_tender))
				{
					$tenant_id= $row['id'];			
				}
				
				if ($tenant_id == ""){
					$tenant_id = 1;
					$tenant_id = "0001";
					$tenant_code = "ClydeRMS-569-".$tenant_id;
				}
				else{
					$return_id++;
					$str = ($return_id);
					if($str == 1){
						$return_id = "000".$tenant_id;
					}
					elseif ($str == 2){
						$return_id = "00".$tenant_id;
					}
					elseif ($str == 3){
						$return_id = "0".$tenant_id;
					}
					else{
						$return_id = $tenant_id;
					}
					$tenant_code = "ClydeRMS-569-".$return_id;
				}
				
				if($deposit_amt_paid != ""){
					
					$sql2="update property_item SET tenant='$tenant_id', deposit_paid = '1' where property_listing = '$property_listing' and id = '$property_block'";
					$result2 = mysql_query($sql2);
					
					$sql4="INSERT INTO payments (unit_id, tenant_id, payment, actual_payment, rent_month, rent_year, category, payment_type, transactiontime) VALUES('$property_block', '$tenant_id', '$deposit_amt_paid', '$actual_deposit', '$deposit_month', '$deposit_year', '1', '$payment_type', '$transactiontime')";
					$result = mysql_query($sql4);
				}
				else{
					$sql2="update property_item SET tenant='$tenant_id', deposit_paid = '0' where property_listing = '$property_listing' and id = '$property_block'";
					$result2 = mysql_query($sql2);
				}
				
				$sql3="update tenants SET tenant_code='$tenant_code' where id = '$tenant_id'";
				$result3 = mysql_query($sql3);
				
				$sql4="INSERT INTO payments (unit_id, tenant_id, payment, actual_payment, rent_month, rent_year, category, payment_type, transactiontime) VALUES('$property_block', '$tenant_id', '$rent_expt', '$actual_rent', '$deposit_month', '$deposit_year', '2', '$payment_type', '$transactiontime')";
				$result = mysql_query($sql4);
				
				if($value_deposit_comm != ""){
					$sql5="INSERT INTO comms_table (unit_id, tenant_id, comm_paid, comm_month, comm_year, status, transactiontime) VALUES ('$property_block', '$tenant_id', '$value_deposit_comm', '$deposit_month', '$deposit_year', '1', '$transactiontime')";
					$result = mysql_query($sql5);
				}
				
				if($value_rent_comm != ""){
					$sql5="INSERT INTO comms_table (unit_id, tenant_id, comm_paid, comm_month, comm_year, status, transactiontime) VALUES ('$property_block', '$tenant_id', '$value_rent_comm', '$deposit_month', '$deposit_year', '2', '$transactiontime')";
					$result = mysql_query($sql5);
				}				
				
				?>
					<script type="text/javascript">
					<!--
						document.location = "property_listings.php";
					//-->
					</script>
				<?php
			}
	}
?>
<?php
	include_once('includes/footer.php');
?>
