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
		$page_title = "Renovation Requests";
		include_once('includes/db_conn.php');
		$transactiontime = date("Y-m-d G:i:s");
		$repair_period = date("F, Y");
		$rent_month = date("m");
		$rent_year = date("Y");
		if (!empty($_GET)){	
			$property_id = $_GET['property_name'];
		}
		$result_suppliers = mysql_query("select id, property_name, commission, location from property_details where id = '$property_id'");
		while ($row = mysql_fetch_array($result_suppliers))
		{
			$property_name = $row['property_name'];
		}
		$renovation_paid = array();
		$result_rent_paid = mysql_query("select id, repair_cost from repairs_table where repair_category = '2' and repair_cost = '0'");
		$renovation_counter = 0 ;
		while ($row = mysql_fetch_array($result_rent_paid))
		{
			$renovation_paid[$renovation_counter] = $row['id'];
			$renovation_payment[$renovation_counter] = $row['repair_cost'];
			$renovation_counter++ ;
		}
		include_once('includes/header.php');
		?>		
		<div id="page">
			<div id="content">
				<div class="post">
					<h2><?php echo $page_title ?> | e-kodi</h2>
					<strong>You are here:</strong> &raquo; <a href="index.php">Home</a> &raquo; <a href="property_repairs.php">Repairs</a> &raquo; Renovation Requests<br />
					<strong>Property Renovation Requests Period: <?php echo $repair_period ?></strong><br />
					<strong>Property Name: <?php echo $property_name ?></strong><br />
					<form id="frmExpensePayment" name="frmExpensePayment" method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
					<table width="100%" border="0" cellspacing="2" class="display" cellpadding="2" id="eample">
						<thead bgcolor="#E6EEEE">
							<tr>
								<th>#</th>
								<th>Unit</th>
								<th>Renovation Name</th>
								<th>Justification</th>
								<th>Cost</th>
								<th>Owner</th>						
							</tr>
						</thead>
						<tbody>
						<?php
						if($property_manager_id == 0){
							$result_suppliers = mysql_query("select id, property_unit, repair_name, justification, payment from repairs_table where property_name = '$property_id' and repair_cost = '0' and repair_category = '2' order by transactiontime asc");
						}
						else{
							$result_suppliers = mysql_query("select repairs_table.id, property_details.manager_id, property_unit, repair_name, justification, payment from repairs_table inner join property_details on property_details.id = repairs_table.property_name where repairs_table.property_name = '$property_id' and repair_cost = '0' and repair_category = '2' and property_details.manager_id = '$property_manager_id' order by repairs_table.transactiontime asc");					
						}
							$intcount = 0;
							$repair_payment = 0;
							$units = 0;
							while ($row = mysql_fetch_array($result_suppliers))
							{
								$intcount++;
								$id = $row['id'];
								$property_unit = $row['property_unit'];
								$repair_name = $row['repair_name'];
								$justification = $row['justification'];
								$payment = $row['payment'];
								if($payment == '1'){ $payment_name = 'Tenant'; } else { $payment_name = 'Landlord'; };
								$result = mysql_query("select location, floor from property_item where id = '$property_unit'");
								while ($row = mysql_fetch_array($result))
								{
									$location = $row['location']; 
									$floor = $row['floor']; 
									$block_occupied = "<strong>Unit:</strong> ".$location.", <strong>Floor:</strong> ".$floor; 
								}

								if ($intcount % 2 == 0) {
									$display= '<tr bgcolor = #F0F0F6>';
								}
								else {
									$display= '<tr>';
								}
								echo $display;
									echo "<input type='hidden' id='property_id[$id]' name='property_id[$id]' value='$property_id'>";
									echo "<input type='hidden' id='repair_id[$id]' name='repair_id[$id]' value='$id'>";
									echo "<input type='hidden' id='property_unit[$id]' name='property_unit[$id]' value='$property_unit'>";
									echo "<input type='hidden' id='repair_name[$id]' name='repair_name[$id]' value='$repair_name'>";
									echo "<td valign='top'>$intcount.</td>";
									echo "<td valign='top'>$block_occupied</td>";
									echo "<td valign='top'>$repair_name</td>";
									echo "<td valign='top'>$justification</td>";
									
									echo "<td valign='top'>KES <input title='Enter Repair Budget' value='$repair_budget' id='repair_budget[$id]' name='repair_budget[$id]' type='text' maxlength='50' class='main_input' size='25' /></td>";
									echo "<td valign='top'>";
									echo "<select name='payment_type[$id]' id='payment_[$id]'>";
									echo "<option value='$payment'>".$payment_name."</option>"; 
									echo "<option value='1'>".Tenant."</option>"; 
									echo "<option value='2'>".Landlord."</option>"; 
									echo "</select>";
									echo "</td>";		
								echo "</tr>";									
								}
							echo "<input type='hidden' id='renovation' name='renovation' value='$id'>";
							
							?>
							
						</tbody>
						
					</table>
					<table>
						<tr>
							<td colspan="9" align="left">
							<button name="submit" id="button" onclick="return CheckForm();">Approve & Make Payment</button>								
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
				$expense_month = date("m");
				$expense_year = date("Y");	
				$repair_budget = $_POST['repair_budget'];	
				$property_id = $_POST['property_id'];
				$property_unit = $_POST['property_unit'];
				$repair_id = $_POST['repair_id'];
				$renovation = $_POST['renovation'];
				$payment_type = $_POST['payment_type'];
				$repair_name = $_POST['repair_name'];

				for($expense_payment_counter = 1 ;  $expense_payment_counter <= $renovation; $expense_payment_counter++) {				
					if ($repair_budget[$expense_payment_counter] != 0) {
						$expense_payment_unit = $repair_budget[$expense_payment_counter];
						$property_unit = $property_id[$expense_payment_counter];
						$property_unit_id = $property_unit[$expense_payment_counter];
						$repair_unit_id = $repair_id[$expense_payment_counter];
						$repair_payment_type = $payment_type[$expense_payment_counter];
						$repair_name_detail = $repair_name[$expense_payment_counter];

						$sql3="update repairs_table SET repair_cost='$expense_payment_unit', payment ='$repair_payment_type' where property_name = '$property_unit' and id = '$repair_unit_id'";
						//echo $sql3."<br />";
						$result = mysql_query($sql3);	
					}

					if($repair_payment_type == '1'){
						
					}
					elseif($repair_payment_type == '2'){
						$sql2="
						INSERT INTO expense_items (property_id, expense_name, budget_expense, UID, user_id, transactiontime)
						VALUES('$property_unit', '$repair_name_detail', '$expense_payment_unit', '$userid', '$userid', '$transactiontime')";

						//echo $sql2."<br />";
						$result = mysql_query($sql2);
						$sql2 = mysql_query("select id from expense_items order by id desc limit 1");
						while($row = mysql_fetch_array($sql2)) {
							$expense_id = $row['id'];
						}
						$sql3="
						INSERT INTO expense_payment (property_id, expense_id, expense_payment, expense_month, expense_year, UID, transactiontime)
						VALUES('$property_unit', '$expense_id', '$expense_payment_unit', '$expense_month', '$expense_year', '$userid', '$transactiontime')";

						//echo $sql3."<br />";
						$result = mysql_query($sql3);
					}
				}
				$query = "property_repairs.php";
				
				?>
					<script type="text/javascript">
					<!--
						document.location = "<?php echo $query ?>";
					//-->
					</script>
				<?php
		}
	}
	include_once('includes/footer.php');
?>
