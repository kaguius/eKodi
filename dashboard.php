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
	$expense_month = date("m");
	$expense_year = date("Y");

	//if($adminstatus != 1 || $adminstatus != 2 || $adminstatus != 4){
	if($adminstatus == 3){
		include_once('includes/header.php');
		$query = "login.php";
		?>
		<script type="text/javascript">
			document.location = "<?php echo $query ?>";
		</script>
		<?php
	}
	else{
		$transactiontime = date("Y-m-d G:i:s");
		include_once('includes/db_conn.php');
		include_once('includes/header.php');
		include_once('includes/graphs.php');
		$today = date("F j, Y");
		$rent_period = date("F, Y");
		$sql = mysql_query("select first_name, last_name from user_profiles where id = '$userid'");
		while($row = mysql_fetch_array($sql)) {
			$first_name = $row['first_name']; 
			$last_name = $row['last_name'];
		}
		?>		
		<div id="page">
			<div id="content">
				<div class="post">
					<h2>Dashboard | e-kodi</h2>
					<!--<p><img src="images/content-image.jpg" width="1100" height="200" alt="" /></p>-->					
					Welcome <?php echo $first_name.' '.$last_name ?><br />
					<strong>You are here:</strong> &raquo; <a href="index.php">Home</a> &raquo; Dashboard<br /><br />
					<table width="100%" cellpadding="0" cellspacing="0">
					
						<tr>
							<td width="40%">
								<div class='example awesome'>
								  <p align="left"><strong>Properties Listed</strong></p>
								  <div id='property_tracking' class='graph' style='width: 350px; height: 240px;'></div>
								</div>
							</td>
							<td width="40%">
								<div class='example awesome'>
								  <p align="left"><strong>Units Registered</strong></p>
								  <div id='unit_tracking' class='graph' style='width: 300px; height: 240px;'></div>
								</div> 
							</td>
							
						</tr>
						<tr>
							<td colspan="3">
								<p>&nbsp;</p>
							</td>
						</tr>						
						<tr>
							<td width="80%">
								<div class='example awesome'>
								  <p align="left"><strong>Payments</strong></p>
								  <div id='totalrent' class='graph' style='width: 750px; height: 250px;'></div>
								</div>
						</tr>
					
					</table>
					</p>
				</div>
			</div>
			<br class="clearfix" />
			</div>
		</div>
<?php
	}
	include_once('includes/footer.php');
?>
