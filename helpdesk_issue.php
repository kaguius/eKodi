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
		$page_title = "Helpdesk Issue";
		include_once('includes/db_conn.php');
		$transactiontime = date("Y-m-d G:i:s");
		$repair_period = date("F, Y");
		if (!empty($_GET)){
			$helpdesk_id = $_GET['helpdesk_id'];	
		}
		$result_suppliers = mysql_query("select id, support_ticket, company_name, email_address, report_type, comments, transactiontime, solved_time from support_logs where id = '$helpdesk_id'");
		while ($row = mysql_fetch_array($result_suppliers))
		{
			$id = $row['id'];
			$support_ticket = $row['support_ticket'];
			$company_name = $row['company_name'];
			$report_type = $row['report_type'];
			if($report_type==1){
				$report_type_name = 'General Queries or Comments';
			}
			elseif($report_type==2){
				$report_type_name = 'Unable to Login';
			}
			elseif($report_type==3){
				$report_type_name = 'Need to know more about e-Kodi';
			}
			else{
				$report_type_name = 'Complaint';
			}
			$comments = $row['comments'];
			$email_address = $row['email_address'];
		}
		include_once('includes/header.php');
		?>		
		<div id="page">
			<div id="content">
				<div class="post">
					<h2><?php echo $page_title ?> | e-kodi</h2>
					<strong>You are here:</strong> &raquo; <a href="index.php">Home</a> &raquo; <a href="admin.php">Admin</a> &raquo; <a href="helpdesk.php">Helpdesk</a> &raquo; Helpdesk Issue<br />
					<form id="frmCreateProperty" name="frmCreateProperty" method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
					<input type="hidden" name="helpdeskid" value="<?php echo $id ?>">
					<table width="100%" border="0" cellspacing="2" class="display" cellpadding="2" >
						<tr>
							<td width="30%"><strong>Support Ticket: </strong></td>
							<td width="70%"><?php echo $support_ticket  ?></td>
						</tr>
						<tr>
							<td><strong>User Name: </strong></td>
							<td><?php echo $company_name  ?></td>
						</tr>
						<tr>
							<td><strong>Email Address: </strong></td>
							<td><?php echo $email_address  ?></td>
						</tr>
						<tr>
							<td><strong>Report Type: </strong></td>
							<td><?php echo $report_type_name  ?></td>
						</tr>
						<tr>
							<td><strong>Comments: </strong></td>
							<td><?php echo $comments  ?></td>
						</tr>
						<tr>
							<td><strong>Solved *</strong></td>
							<td valign='top'>
								<select name="solved" id="solved">
									<option value="1">No</option>
									<option value="2">Yes</option>
								</select> 
							</td>
						</tr>
						<tr>
							<td valign="top"><strong>Cause of Issue and How was it solved? *</strong></td>
							<td>
								<textarea title="Enter Detailed Reasons" name="how_to" id="how_to" cols="45" rows="5" class="textfield"><?php echo $how_to ?></textarea>
							</td>
						</tr>
					</table>
					<table border="0" width="100%">
							<tr>
								<td valign="top">
									<button name="btnNewCard" id="button">Save</button>
								</td>
								<td align="right">
									<button name="reset" id="button2" type="reset">Reset</button>
								</td>		
							</tr>
						</table>
						<script  type="text/javascript">
							var frmvalidator = new Validator("frmCreateProperty");
							frmvalidator.addValidation("property_name","req","Please enter the Property Name");
							frmvalidator.addValidation("repair_name","req","Please enter the Repair Name");
							frmvalidator.addValidation("repair_budget","req","Please enter the Repair Budget");
						</script>
					</form>
				</div>
			</div>
			<br class="clearfix" />
			</div>
		</div>
<?php
	if (!empty($_POST)) {
		$solved = $_POST['solved'];
		$helpdeskid = $_POST['helpdeskid'];
		$how_to = $_POST['how_to'];
				
		$sql3="update support_logs set resolved='$solved', how='$how_to', UID='$userid', solved_time='$transactiontime' WHERE ID = '$helpdeskid'";

		//echo $sql3;
		$result = mysql_query($sql3);
		$query = "responce_support_email.php?helpdesk_id=$helpdeskid";
		?>
			<script type="text/javascript">
				document.location = "<?php echo $query ?>";
			</script>
		<?php
		}
	}
	include_once('includes/footer.php');
?>
