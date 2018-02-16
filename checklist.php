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
		$page_title = "Tenant Checklist";
		$manager_id = $property_manager_id;
		include ("includes/core_functions.php");
		include_once('includes/db_conn.php');
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
		$transactiontime = date("Y-m-d G:i:s");
		$expense_code = "";
		$expense_name = "";

		include_once('includes/header.php');
		?>		
		<div id="page">
			<div id="content">
				<div class="post">
					<h2><?php echo $page_title ?> | e-kodi</h2>
					<strong>You are here:</strong> &raquo; <a href="index.php">Home</a> &raquo; <a href="property_listings.php">Properties</a> &raquo; <a href="tenant_listings.php?property_name=6">Tenants for <?php echo $lookup_company_name ?></a> &raquo; <?php echo $page_title ?> for tenant <strong><?php echo $lookup_tenant_name ?> </strong><br /><br />
					<form id="frmCreateProperty" name="frmCreateProperty" method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
					<input type="hidden" name="page_status" id="page_status" value="<?php echo $action ?>" />
					<table width="100%" border="0" cellspacing="2" class="display" cellpadding="2" id="exampl">
						<thead bgcolor="#E6EEEE">
							<tr>
								<th>#</th>
								<th>Construction Aspect</th>
								<th>Move in Status</th>
								<th>Remarks</th>
							</tr>
						</thead>
						<tbody>
						<?php
						if($property_manager_id == 0){
							$result = mysql_query("select checklist_const.id, checklist_location.location, construct from checklist_const inner join checklist_location on checklist_location.id = checklist_const.location where checklist_const.property_id = '$property_id' order by checklist_const.id asc");
						}
						else{
							$result = mysql_query("select checklist_const.id, checklist_location.location, construct from checklist_const inner join checklist_location on checklist_location.id = checklist_const.location where checklist_const.manager_id = '$property_manager_id' and checklist_const.property_id = '$property_id' order by checklist_const.id, construct asc");
						}
								
						while ($row = mysql_fetch_array($result))
						{
							$intcount++;
							$id = $row['id'];
							$location = $row['location'];
							$construct = $row['construct'];
							$construction = '<strong>'.$location.'</strong>: '.$construct;
							if ($intcount % 2 == 0) {
								$display= '<tr bgcolor = #F0F0F6>';
							}
							else {
								$display= '<tr>';
							}
							echo $display;
								echo "<td valign='top'>$intcount.</td>";
								echo "<input type='hidden' id='construct_id[$id]' name='construct_id[$id]' value='$id'>";
								echo "<input type='hidden' id='manager_id[$id]' name='manager_id[$id]' value='$manager_id'>";
								echo "<input type='hidden' id='tenant_id[$id]' name='tenant_id[$id]' value='$tenant_id'>";
								echo "<input type='hidden' id='unit_id[$id]' name='unit_id[$id]' value='$unit_id'>";
								echo "<input type='hidden' id='property_id[$id]' name='property_id[$id]' value='$property_id'>";
								echo "<td valign='top'>$construction</td>";
								echo "<td valign='top' align='center'><input name='move_in[$id]' id='move_in[$id]' type='text' class='textfield' value='$move_in' size='10'></td>";
								echo "<td valign='top' align='center'><input name='comments[$id]' id='comments[$id]' type='text' class='textfield' value='$comments' size='20'></td>";
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
								<th>Remarks</th>
							</tr>
						</tfoot>
					</table>
						<table border="0" width="100%">
							<tr>
								<td valign="top">
									<button name="btnNewCard" id="button">Submit</button>
								</td>
								<td align="right">
									<button name="reset" id="button2" type="reset">Reset</button>
								</td>		
							</tr>
						</table>
					</form>
				</div>
			</div>
			<br class="clearfix" />
			</div>
		</div>
		<?php
			if (!empty($_POST)) {
				$construct_id = $_POST['construct_id'];			
				$manager_id = $_POST['manager_id'];
				$property_id = $_POST['property_id'];
				$tenant_id = $_POST['tenant_id'];
				$unit_id = $_POST['unit_id'];

				$move_in = $_POST['move_in'];	
				$comments = $_POST['comments'];
				$construct = $_POST['construct'];

				$checklist_month = date("m");
				$checklist_year = date("Y");

				for($checklist_counter = 1 ;  $checklist_counter <= $construct; $checklist_counter++) 					{
					//echo $construct;	
					if ($move_in[$checklist_counter] != "") {
						$checklist_property_id = $property_id[$checklist_counter];
						$checklist_unit_id = $unit_id[$checklist_counter];
						$checklist_tenant_id = $tenant_id[$checklist_counter];
						$checklist_construct_id = $construct_id[$checklist_counter];
						$checklist_move_in = $move_in[$checklist_counter];		
						$checklist_comments = $comments[$checklist_counter];
						$checklist_manager_id = $manager_id[$checklist_counter];

						//Store the actual expense paid for the month, year
						$sql3="INSERT INTO tenant_checklist (property_id, unit_id, tenant_id, construct_id, status_move_in, comments, manager_id, UID, movein_month, movein_year, transactiontime) 
						VALUES('$checklist_property_id', '$checklist_unit_id', '$checklist_tenant_id', '$checklist_construct_id','$checklist_move_in', '$checklist_comments', '$checklist_manager_id', '$userid', '$checklist_month', '$checklist_year', '$transactiontime')";
						//echo $sql3."<br />";
						$result = mysql_query($sql3);					
						
					}
				}
				$location = MD5(checklist_item_exists);
				$query = "tenant_listings.php?property_name=$checklist_property_id&$location";

				?>
					<script type="text/javascript">
						document.location = "<?php echo $query ?>";
					</script>
				<?php
		}
	}
	?>
<?php
	include_once('includes/footer.php');
?>
