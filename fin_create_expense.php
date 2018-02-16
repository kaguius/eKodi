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
		$page_title = "Create Expense Post";
		include ("includes/core_functions.php");
		include_once('includes/db_conn.php');
		if (!empty($_GET)){	
			$manager_id = $_GET['id'];	
			$status = $_GET['status'];
		}

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
		$transactiontime = date("Y-m-d G:i:s");
		$expense_code = "";
		$expense_name = "";

		include_once('includes/header.php');
		?>		
		<div id="page">
			<div id="content">
				<div class="post">
					<h2><?php echo $page_title ?> | e-kodi</h2>
					<strong>You are here:</strong> &raquo; <a href="index.php">Home</a> &raquo; <a href="property_expense_payment.php">Expenses</a> &raquo; Create expense post for <?php echo $lookup_company_name ?><br />
					<form id="frmCreateProperty" name="frmCreateProperty" method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
						<input type="hidden" name="manager_id" id="manager_id" value="<?php echo $manager_id ?>" />
					<table border="0" width="100%">
							<tr >
								<td width="30%">Expense Name *</td>
								<td width="70%">
									<input title="Enter Expense Name" value="<?php echo $expense_name ?>" id="expense_name" name="expense_name" type="text" maxlength="100" class="main_input" size="50" />
								</td>
							</tr>
							<tr>
								<td width="30%">Expense Category *</td>
								<td valign='top'>
									<select name="expense_category" id="expense_category">
										  <option value="1">Sales & Marketing</option>
										  <option value="2">Research & Development</option>
										  <option value="3">General & Administrative</option>
									</select> 

								</td>
							</tr>
							<tr><td>Select Property: *</td>
								<td>
									<select name="property_name" id="property_name">
										<option>&nbsp;</option>
										<?php
										if($property_manager_id == 0){
											$sql = mysql_query("select id, property_name from property_details order by property_name asc");
										}
										else {
											$sql = mysql_query("select id, property_name from property_details where manager_id = '$property_manager_id' order by property_name asc");
										}
											while($row = mysql_fetch_array($sql)) {
												$id = $row['id'];
												$property_name = $row['property_name'];
												$string = substr($property_name, 0, 2);
												if($string == 'ZA'){
													$property = 'Zawadi Apartments';
													$property_name = $property.": ".$property_name;
												}
												else{
													$property_name = $property_name;
												}
												//echo "$county";
												echo "<option value='$id'>".$property_name."</option>"; 
											}
										?>
										</select>
									</td>
								</tr>
							<?php if($status == 'expense_name_exists'){ ?>
								<tr>
									<td colspan="2">
										<font color="red">The expense name specified already exists, enter another one.</font></a>	
									</td>
								</tr>
							<?php } ?>							
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
							frmvalidator.addValidation("expense_name","req","Please enter the Expense Name");
							frmvalidator.addValidation("expense_code","req","Please enter the Expense Code");
							frmvalidator.addValidation("property_name","req","Please enter the Property Name");
						</script>
					</form>
				</div>
			</div>
			<br class="clearfix" />
			</div>
		</div>
		<?php
			if (!empty($_POST)) {
				$manager_id = $_POST['manager_id'];
				$expense_name = $_POST['expense_name'];
				$property_id = $_POST['property_name'];
				$expense_category = $_POST['expense_category'];

				$result_tender = mysql_query("select id from fin_expenses_items order by id desc limit 1");
				while ($row = mysql_fetch_array($result_tender))
				{
					$return_id = $row['id'];
				}
				
				//if(($expense_name_exists != $expense_name)) {
					if ($return_id == ""){
						$return_id = 1;
						$return_id = "0001";
						$property_code = "e-Kodi-".$return_id;
					}
					else{
						$return_id++;
						$str = ($return_id);
						if($str == 1){
							$return_id = "0000".$return_id;
						}
						elseif ($str == 2){
							$return_id = "000".$return_id;
						}
						elseif ($str == 3){
							$return_id = "00".$return_id;
						}
						elseif ($str == 4){
							$return_id = "0".$return_id;
						}
						else{
							$return_id = $return_id;
						}
					
						$expense_code = "e-Kodi-".$return_id;
					}

					$expense_name = ucwords(strtolower($expense_name));
					//$expense_code = "ek-".$manager_id."-".$return_id;
				
					$sql3="
						INSERT INTO fin_expenses_items (expense_category, expense_name, expense_code, manager_id, property_id, UID, transactiontime)
						VALUES('$expense_category', '$expense_name', '$expense_code', '$manager_id', '$property_id', '$userid', '$transactiontime')";

					//echo $sql3;
					$result = mysql_query($sql3);

					//$url = "property_listings.php" ;
				
					//header( "Location: $url" );
					//exit ;
					$expense_name_exists = MD5(expense_name_exists);
					$query = "financials.php?id=$manager_id&$expense_name_exists";
					?>
						<script type="text/javascript">
							document.location = "<?php echo $query ?>";
						</script>
					<?php
				//}						
			}
	}
	?>
<?php
	include_once('includes/footer.php');
?>
