<?php
	$userid = "";
	$adminstatus = "";
	session_start();
	if (!empty($_SESSION)){
		$userid = $_SESSION["userid"] ;
		$adminstatus = $_SESSION["adminstatus"] ;
		$property_manager_id = $_SESSION["property_manager_id"] ;
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
		if($property_manager_id == 0){
			$result_suppliers = mysql_query("select id, company_name from property_managers where id = '$manager_id'");
		}
		else{
			$result_suppliers = mysql_query("select id, company_name from property_managers where id = '$property_manager_id'");
		}
		while ($row = mysql_fetch_array($result_suppliers))
		{
			$lookup_company_name = $row['company_name'];
		}
		
		$page_title = "Asset Register";
		include_once('includes/db_conn.php');
		$transactiontime = date("Y-m-d G:i:s");

		include_once('includes/header.php');
		?>		
		<div id="page">
			<div id="content">
				<div class="post">
					<h2><?php echo $page_title ?> | e-kodi</h2>
					<strong>You are here:</strong> &raquo; <a href="index.php">Home</a> &raquo; <a href="financials.php">Financials</a> &raquo; View Asset Register<br />
					<?php if($property_manager_id == 0){ ?>
						<a href="fin_create_inventory.php">+ Add new Asset Register</a>
					<?php } ?>
					<table width="100%" border="0" cellspacing="2" class="display" cellpadding="2" id="example">
						<thead bgcolor="#E6EEEE">
							<tr>
								<th>#</th>
								<th>Asset Tag</th>
								<th>Description</th>
								<th>Brand</th>
								<th>Model No</th>
								<th>Serial No.</th>
								<th>Purchase Value</th>
								<th>Purchase Year</th>
								<th>Asset Location</th>
								<th>Edit</th>
							</tr>
						</thead>
						<tbody>
						<?php
						if($property_manager_id == 0){
							$result_suppliers = mysql_query("select id, asset_tag, description, brand, model_no, serial_number, purchase_value, purchase_year, asset_location from fin_asset_register");
						}
						else{
							$result_suppliers = mysql_query("select id, asset_tag, description, brand, model_no, serial_number, purchase_value, purchase_year, asset_location from fin_asset_register where manager_id = '$property_manager_id'");
						}
							$intcount = 0;
							while ($row = mysql_fetch_array($result_suppliers))
							{
								$intcount++;
								$id = $row['id'];
								$asset_tag = $row['asset_tag'];
								$asset_description = $row['description'];
								$brand = $row['brand'];
								$model = $row['model_no'];
								$serial_number = $row['serial_number'];
								$purchase_value = $row['purchase_value'];
								$purchase_year = $row['purchase_year'];			
								$asset_location = $row['asset_location'];

								if ($intcount % 2 == 0) {
									$display= '<tr bgcolor = #F0F0F6>';
								}
								else {
									$display= '<tr>';
								}
								echo $display;
									echo "<td valign='top'>$intcount</td>";
									echo "<td valign='top'>$asset_tag</td>";
									echo "<td valign='top'>$asset_description</td>";
									echo "<td valign='top'>$brand</td>";	
									echo "<td valign='top'>$model</td>";
									echo "<td valign='top'>$serial_number</td>";
									echo "<td valign='top'>KES ".number_format($purchase_value, 2)."</td>";
									echo "<td valign='top'>$purchase_year</td>";
									echo "<td valign='top'>$asset_location</td>";
									echo "<td valign='top' align='center'><a title = 'Edit Detail' href='fin_create_inventory.php?id=$id&action=edit'><img src='images/edit.png' width='35px'></a></td>";
								echo "</tr>";	
								}
							?>
						</tbody>
						<tfoot bgcolor="#E6EEEE">
							<tr>
								<th>#</th>
								<th>Code</th>
								<th>Name</th>
								<th>Location</th>
								<th>Contact</th>
								<th>Commission</th>
								<th>Properties</th>
								<th>Unit Counts</th>
								<th>Create Expenses</th>
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
