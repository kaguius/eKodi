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
		$page_title = "Checklist Items per Location";
		include_once('includes/db_conn.php');
		$transactiontime = date("Y-m-d G:i:s");
		$repair_period = date("F, Y");
		if (!empty($_GET)){
			$location_id = $_GET['location_id'];	
			$property_id = $_GET['property_id'];
			$status = $_GET['status'];
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
					<strong>You are here:</strong> &raquo; <a href="index.php">Home</a> &raquo; <a href="property_listings.php">Properties</a> &raquo; <?php echo $page_title.' for '.$lookup_company_name ?><br />
					<a href="create_checklist_specific.php?property_id=<?php echo $property_id ?>&location_id=<?php echo $location_id ?>">+ Add new Checklist Item(s) for <?php echo $lookup_company_name ?></a>
					<table width="100%" border="0" cellspacing="2" class="display" cellpadding="2" id="example">
						<thead bgcolor="#E6EEEE">
							<tr>
								<th>#</th>
								<th>Checklist Item</th>
								<th>Edit</th>
							</tr>
						</thead>
						<tbody>
						<?php
						if($property_manager_id == 0){
							$result_suppliers = mysql_query("select id, construct from checklist_const where property_id = '$property_id' and location = '$location_id' order by construct asc");
						}
						else{
							$result_suppliers = mysql_query("select id, construct from checklist_const where property_id = '$property_id' and location = '$location_id' and manager_id = '$property_manager_id' order by construct asc");
						}
							while ($row = mysql_fetch_array($result_suppliers))
							{
								$intcount++;
								$id = $row['id'];
								$construct = $row['construct'];
								if ($intcount % 2 == 0) {
									$display= '<tr bgcolor = #F0F0F6>';
								}
								else {
									$display= '<tr>';
								}
								echo $display;
									echo "<td valign='top'>$intcount.</td>";
									echo "<td valign='top'>$construct</td>";
									echo "<td valign='top' align='center'><a title = 'Edit Detail' href='create_checklist_specific.php?location_id=$id&property_id=$property_id&action=edit'><img src='images/edit.png' width='35px'></a></td>";
								echo "</tr>";	
								}
							?>
						</tbody>
						<tfoot bgcolor="#E6EEEE">
							<tr>
								<th>#</th>
								<th>Checklist Item</th>
								<th>Edit</th>
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
