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
		$page_title = "User Logs";
		include_once('includes/db_conn.php');
		include_once('includes/header.php');
		?>		
		<div id="page">
			<div id="content">
				<div class="post">
				<h2><?php echo $page_title ?> | e-kodi</h2>
					<strong>You are here:</strong> &raquo; <a href="index.php">Home</a> &raquo; <a href="admin.php">Admin</a> &raquo; User Logs<br />
					<table width="100%" border="0" cellspacing="2" class="display" cellpadding="2" id="example">
						<thead bgcolor="#E6EEEE">
							<tr>
								<th width="5%">#</th>
								<th width="15%">Username</th>
								<th width="20%">Timestamp</th>
								<th width="20%">IP Address</th>
								<th width="40%">Browser</th>
							</tr>
						</thead>
						<tbody>
						<?php
							$result_suppliers = mysql_query("select username, log_time, log_ipaddress, log_browser, city, country, latitude, longitude from user_logs order by log_time desc");
							$intcount = 0;
							while ($row = mysql_fetch_array($result_suppliers))
							{
								$intcount++;
								$username = $row['username'];
								$log_time = $row['log_time'];
								$log_ipaddress = $row['log_ipaddress'];
								$log_browser = $row['log_browser'];
								if ($intcount % 2 == 0) {
									$display= '<tr bgcolor = #F0F0F6>';
								}
								else {
									$display= '<tr>';
								}
								echo $display;
									echo "<td valign='top'>$intcount</td>";
									echo "<td valign='top'>$username</td>";
									echo "<td valign='top'>$log_time</td>";
									echo "<td valign='top'>$log_ipaddress</td>";								
									echo "<td valign='top'>$log_browser</td>";
								echo "</tr>";	
								}
							?>
						</tbody>
						<tfoot bgcolor="#E6EEEE">
							<tr>
								<th width="5%">#</th>
								<th width="15%">Username</th>
								<th width="20%">Timestamp</th>
								<th width="20%">IP Address</th>
								<th width="40%">Browser</th>
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
