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
		$page_title = "Client Services Helpdesk";
		include_once('includes/db_conn.php');
		$transactiontime = date("Y-m-d G:i:s");
		$repair_period = date("F, Y");
		$property_name = "";
		$physical_address = "";
		$location = "";
		$property_owner = "";
		$propety_contact = "";
		$bank_name = "";
		$bank_branch = "";
		$account_name = "";
		$account_number = "";

		include_once('includes/header.php');
		?>		
		<div id="page">
			<div id="content">
				<div class="post">
					<h2><?php echo $page_title ?> | e-kodi</h2>
					<strong>You are here:</strong> &raquo; <a href="index.php">Home</a> &raquo; <a href="admin.php">Admin</a> &raquo; Helpdesk<br />
					<strong>Reporting Period as at: <?php echo $repair_period ?></strong><br />
					<table width="100%" border="0" cellspacing="2" class="display" cellpadding="2" id="example">
						<thead bgcolor="#E6EEEE">
							<tr>
								<th>#</th>
								<th>ID</th>
								<th>User</th>
								<th>Report Type</th>
								<th>Resolved</th>
								<th>Created Time</th>
								<th>Solved Time</th>
								<th>Support User</th>
							</tr>
						</thead>
						<tbody>
						<?php
						$result_suppliers = mysql_query("select id, support_ticket, company_name, report_type, resolved, transactiontime, solved_time from support_logs order by resolved asc");
							$intcount = 0;
							$unit_count = 0;
							while ($row = mysql_fetch_array($result_suppliers))
							{
								$intcount++;
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
								$resolved = $row['resolved'];
								$transactiontime = $row['transactiontime'];
								$solved_time = $row['solved_time'];
								if ($intcount % 2 == 0) {
									$display= '<tr bgcolor = #F0F0F6>';
								}
								else {
									$display= '<tr>';
								}
								echo $display;
									echo "<td valign='top'>$intcount.</td>";
									echo "<td valign='top'>$support_ticket</td>";
									echo "<td valign='top'>$company_name</td>";
									echo "<td valign='top'>$report_type_name</td>";	
									if($resolved=='2'){
										echo "<td valign='top' align='center'><img src='images/active.png'></td>";
									}
									else{
										echo "<td valign='top' align='center'><img src='images/delete.png'></td>";
									}
									echo "<td valign='top'>$transactiontime</td>";	
									echo "<td valign='top'>$solved_time</td>";
									echo "<td valign='top' align='center'><a title = 'Sort out $company_name issue' href='helpdesk_issue.php?helpdesk_id=$id&action=solve_issue'><img src='images/users.png' width='20px'></a></td>";		
								echo "</tr>";	
								}
							?>
						</tbody>
						<tfoot bgcolor="#E6EEEE">
							<tr>
								<th>#</th>
								<th>ID</th>
								<th>User</th>
								<th>Report Type</th>
								<th>Resolved</th>
								<th>Created Time</th>
								<th>Solved Time</th>
								<th>Support User</th>
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
