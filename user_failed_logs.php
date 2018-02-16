<?php
	$userid = "";
	$adminstatus = 3;
	session_start();
	if (!empty($_SESSION)){
		$userid = $_SESSION["userid"] ;
		$adminstatus = $_SESSION["adminstatus"] ;
	}

	//if($adminstatus != 1 || $adminstatus != 2 || $adminstatus != 4){
	if($adminstatus == 3){
		include_once('includes/header.php');
		?>
		<script type="text/javascript">
			document.location = "login.php";
		</script>
		<?php
	}
	else{
		$transactiontime = date("Y-m-d G:i:s");
		$page_title = "User Failed Logs";
		include_once('includes/db_conn.php');
		include_once('includes/header.php');
		?>		
		<div id="page">
			<div id="content">
				<div class="post">
				<h2><?php echo $page_title ?> | e-kodi</h2>
					<strong>You are here:</strong> &raquo; <a href="index.php">Home</a> &raquo; <a href="admin.php">Admin</a> &raquo; User Failed Logs<br />
					<table width="100%" border="0" cellspacing="2" class="display" cellpadding="2" id="example">
						<thead bgcolor="#E6EEEE">
							<tr>
								<th width="5%">#</th>
								<th width="15%">Email Address</th>
								<th width="20%">Password</th>
								<th width="20%">IP Address</th>
								<th width="20%">Transactiontime</th>
							</tr>
						</thead>
						<tbody>
						<?php
							$result_suppliers = mysql_query("select id, email_address, password, ipaddress, tranasctiontime from users_failed_logs order by tranasctiontime desc");
							$intcount = 0;
							while ($row = mysql_fetch_array($result_suppliers))
							{
								$intcount++;
								$email_address = $row['email_address'];
								$password = $row['password'];
								$ipaddress = $row['ipaddress'];
								$tranasctiontime = $row['tranasctiontime'];
								if ($intcount % 2 == 0) {
									$display= '<tr bgcolor = #F0F0F6>';
								}
								else {
									$display= '<tr>';
								}
								echo $display;
									echo "<td valign='top'>$intcount</td>";
									echo "<td valign='top'>$email_address</td>";
									echo "<td valign='top'>$password</td>";
									echo "<td valign='top'>$ipaddress</td>";	
									echo "<td valign='top'>$tranasctiontime</td>";		
								echo "</tr>";	
								}
							?>
						</tbody>
						<tfoot bgcolor="#E6EEEE">
							<tr>
								<th width="5%">#</th>
								<th width="15%">Email Address</th>
								<th width="20%">Password</th>
								<th width="20%">IP Address</th>
								<th width="20%">Transactiontime</th>
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
