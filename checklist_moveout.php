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
		$page_title = "Move Out Checklist";
		include_once('includes/db_conn.php');
		$transactiontime = date("Y-m-d G:i:s");
		$repair_period = date("F, Y");
		if (!empty($_GET)){
			$unit_id = $_GET['unit_id'];	
			$property_id = $_GET['property_id'];
			$tenant_code = $_GET['tenant_code'];
			$action = $_GET['action'];
			$tenant_id = $_GET['tenant_id'];
			if ($action =='edit'){
				$result = mysql_query("select id, construct from checklist_const where id = '$location_id'");
				//echo $query="select id, location from checklist_location where id = '$location_id'";
				while ($row = mysql_fetch_array($result))
				{
					$ID = $row['id'];
					$checklist_item =$row['construct'];
				}
			}
		}
		$result_suppliers = mysql_query("select property_name from property_details where id = '$property_id'");
		while ($row = mysql_fetch_array($result_suppliers))
		{
			$lookup_company_name = $row['property_name'];
		}
		$result_suppliers = mysql_query("select tenant_name from tenants where id = '$tenant_id'");
		while ($row = mysql_fetch_array($result_suppliers))
		{
			$lookup_tenant_name = $row['tenant_name'];
		}
		if($property_manager_id == 0){
			$result_suppliers = mysql_query("select location from checklist_location where id = '$location_id' and property_id = '$property_id'");
		}
		else{
			$result_suppliers = mysql_query("select location from checklist_location where id = '$location_id' and property_id = '$property_id' and manager_id = '$property_manager_id'");
		}
		while ($row = mysql_fetch_array($result_suppliers))
		{
			$lookup_company_name = $row['location'];
		}
		include_once('includes/header.php');
		?>		
		<div id="page">
			<div id="content">
				<div class="post">
					<h2><?php echo $page_title ?> | e-kodi</h2>
					<strong>You are here:</strong> &raquo; <a href="index.php">Home</a> &raquo; <a href="property_listings.php">Properties</a> &raquo; <a href="tenant_listings.php?property_name=6">Tenants for <?php echo $lookup_company_name ?></a> &raquo; <?php echo $page_title ?> for tenant <strong><?php echo $lookup_tenant_name ?> </strong><br /><br />
					<table width="100%" border="0" cellspacing="2" class="display" cellpadding="2" id="exampl">
						<thead bgcolor="#E6EEEE">
							<tr>
								<th>#</th>
								<th>Construction Aspect</th>
								<th>Move in Status</th>
								<th>Move in Remarks</th>
								<th>Move in Period</th>
								<th>Move Out Status</th>
								<th>Move Out Remarks</th>
								<th>Move Out Period</th>
								<th>Item Cost</th>
							</tr>
						</thead>
						<tbody>
						<?php
						if($property_manager_id == 0){
							$result_suppliers = mysql_query("select tenant_checklist.id, checklist_const.construct, checklist_location.location, status_move_in, status_move_out, comments, movein_month, movein_year, moveout_comments, cost, moveout_month, moveout_year from tenant_checklist inner join checklist_const on checklist_const.id = tenant_checklist.construct_id inner join checklist_location on checklist_location.id = checklist_const.location where tenant_checklist.property_id = '$property_id' and tenant_checklist.unit_id = '$unit_id' and tenant_checklist.tenant_id = '$tenant_id' order by tenant_checklist.id asc");
						}
						else{
							$result_suppliers = mysql_query("select tenant_checklist.id, checklist_const.construct, checklist_location.location, status_move_in, status_move_out, comments, movein_month, movein_year, moveout_comments, cost, moveout_month, moveout_year from tenant_checklist inner join checklist_const on checklist_const.id = tenant_checklist.construct_id inner join checklist_location on checklist_location.id = checklist_const.location where tenant_checklist.property_id = '$property_id' and tenant_checklist.unit_id = '$unit_id' and tenant_checklist.tenant_id = '$tenant_id' and tenant_checklist.manager_id = '$property_manager_id' order by tenant_checklist.id asc");
						}
							while ($row = mysql_fetch_array($result_suppliers))
							{
								$intcount++;
								$id = $row['id'];
								$location = $row['location'];
								$construct = $row['construct'];
								$construction = '<strong>'.$location.'</strong>: '.$construct;
								$status_move_in = $row['status_move_in'];
								$status_move_out = $row['status_move_out'];
								$comments = $row['comments'];
								$movein_month = $row['movein_month'];
								$movein_year = $row['movein_year'];
								$movein_period = $movein_month.', '.$movein_year;
								$moveout_comments = $row['moveout_comments'];
								$moveout_month = $row['moveout_month'];
								$moveout_year = $row['moveout_year'];
								$moveout_period = $moveout_month.', '.$moveout_year;
								$cost = $row['cost'];
								if ($intcount % 2 == 0) {
									$display= '<tr bgcolor = #F0F0F6>';
								}
								else {
									$display= '<tr>';
								}
								echo $display;
									echo "<input type='hidden' id='construct_id[$id]' name='construct_id[$id]' value='$id'>";
									echo "<td valign='top'>$intcount.</td>";
									echo "<td valign='top'>$construction</td>";
									echo "<td valign='top'>$status_move_in</td>";
									echo "<td valign='top'>$comments</td>";
									echo "<td valign='top'>$movein_period</td>";
									echo "<td valign='top'>$status_move_out</td>";
									echo "<td valign='top'>$moveout_comments</td>";
									echo "<td valign='top'>$moveout_period</td>";
									echo "<td valign='top'>".number_format($cost, 2)."</td>";
								echo "</tr>";	
								}
								echo "<input type='hidden' id='construct' name='construct' value='$id'>";
							?>
						</tbody>
						<tfoot bgcolor="#E6EEEE">
							<tr>
								<th>#</th>
								<th>Construction Aspect</th>
								<th>Move in Status</th>
								<th>Move in Remarks</th>
								<th>Move in Period</th>
								<th>Move Out Status</th>
								<th>Move Out Remarks</th>
								<th>Move Out Period</th>
								<th>Item Cost</th>
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
