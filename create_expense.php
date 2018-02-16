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
		$page_title = "Create Expense Item";
		$sql = "select id, property_name from property_details order by property_name asc";
		include ("includes/core_functions.php");
		include_once('includes/db_conn.php');
		if (!empty($_GET)){	
			$property_id = $_GET['id'];
			$status = $_GET['status'];
		} 
		$result_suppliers = mysql_query("select id, property_name from property_details where id = '$property_id'");
		while ($row = mysql_fetch_array($result_suppliers))
		{
			$lookup_property_name = $row['property_name'];
		}
		$transactiontime = date("Y-m-d G:i:s");
		$expense_budget = "";
		$expense_name = "";

		include_once('includes/header.php');
		?>		
		<div id="page">
			<div id="content">
				<div class="post">
					<h2><?php echo $page_title ?> | e-kodi</h2>
					<strong>You are here:</strong> &raquo; <a href="index.php">Home</a> &raquo; <a href="property_expense_payment.php">Expenses</a> &raquo; Create expense for <?php echo $lookup_property_name ?><br />
					<form id="frmCreateProperty" name="frmCreateProperty" method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
					<input type="hidden" name="property_id" id="property_id" value="<?php echo $property_id ?>" />
						<table border="0" width="100%">
							<?php
								if($property_id == ""){ ?>
								<tr >
									<td width="30%">Property Listing *</td>
									<td width="70%">
										<?php
											printSelectFromSql($sql, 'id', 'property_name', 'property_name', 'property_name', '', 'includes/db_conn.php', 1, ' class="myClass" ');
										?>
									</td>
								</tr>
								<?php
								}else{
									echo "<input type='hidden' name='property_name' value='$property_id'>";
								}
								?>
							<input type='hidden' name='userid' value='<?php echo $userid ?>'>
							<tr >
								<td width="30%">Expense Name *</td>
								<td width="70%">
									<input title="Enter Expense Name" value="<?php echo $expense_name ?>" id="expense_name" name="expense_name" type="text" maxlength="100" class="main_input" size="50" />
								</td>
							</tr>
							<tr >
								<td>Expense Budget * (KES)</td>
								<td>
									<input title="Enter Expense Budget" value="<?php echo $expense_budget ?>" id="expense_budget" name="expense_budget" type="text" maxlength="100" class="main_input" size="50" />
								</td>
							</tr>
							
							<?php if($status == 'expense_name_exists'){ ?>
								<tr>
									<td colspan="2">
										<font color="red">The expense name specified already exists, please enter another one.</font></a>	
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
							frmvalidator.addValidation("property_name","req","Please enter the Property Name");
							frmvalidator.addValidation("expense_name","req","Please enter the Expense Name");
							frmvalidator.addValidation("expense_budget","req","Please enter the expense Budget");
						</script>
					</form>
				</div>
			</div>
			<br class="clearfix" />
			</div>
		</div>
		<?php
			if (!empty($_POST)) {
				$userid = $_POST['userid'];
				//$property_id = $_POST['property_id'];
				$property_name = $_POST['property_name'];
				$expense_name = $_POST['expense_name'];
				$expense_budget = $_POST['expense_budget'];

				$result_tender = mysql_query("select expense_name from expense_items where expense_name = '$expense_name' and property_id = '$property_name'");
				while ($row = mysql_fetch_array($result_tender))
				{
					$expense_name_exists = $row['expense_name'];
				}
				//echo $query="select expense_name from expenses_items where expense_name = '$expense_name' and property_id = '$property_name'";
				$expense_name_exists = strtolower($expense_name_exists);
				$expense_name = strtolower($expense_name);

				if(($expense_name_exists != $expense_name)) {
					$sql3="
						INSERT INTO expense_items (property_id, expense_name, budget_expense, user_id, transactiontime, UID)
						VALUES('$property_name', '$expense_name', '$expense_budget', '$userid', '$transactiontime', '$userid')";

					//echo $sql3;
					$result = mysql_query($sql3);
					?>
					<script type="text/javascript">
						//document.location = "property_listings.php";
					</script>
					<?php
				}
				else {

					$expense_name_exists = MD5(expense_name_exists);
					$query = "create_expense.php?id=$property_name&status=expense_name_exists&expense_status=$expense_name_exists";
					//echo $query;
					?>
					<script type="text/javascript">
					<!--
						/*alert("Either the Email Address or the Password do not match the records in the database or you have been disabled from the system, please contact the system admin at www.e-kodi.com/contact.php");*/
						document.location = "<?php echo $query ?>";
					//-->
					</script>
					<?php
				}	
			}
	}
	?>
<?php
	include_once('includes/footer.php');
?>
