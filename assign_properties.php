<?php
	$userid = "";
	$adminstatus = "";
	$property_manager_id = "";
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
		$page_title = "Assign Property Owners";
		include_once('includes/db_conn.php');
		include_once('includes/header.php');
		if (!empty($_GET)){	
			$action = $_GET['action'];
			$system_user_id = $_GET['id'];
			$manager_id_id = $_GET['manager_id'];
		}
		$sql2 = mysql_query("select first_name, last_name from user_profiles where id = '$system_user_id'");
		while($row = mysql_fetch_array($sql2)) {
			$user_first_name = $row['first_name'];
			$user_last_name = $row['last_name'];
		}	
		?>		
		<div id="page">
			<div id="content">
				<div class="post">
					<h2>Assign <?php echo $user_first_name.' '.$user_last_name ?> Property Owner Rights | e-kodi</h2>
					<strong>You are here:</strong> &raquo; <a href="index.php">Home</a> &raquo; <a href="admin.php">Admin</a> &raquo; <a href="user_details.php">System Users Listing</a><br />
					<form id="frmCashBookPayments" name="frmCashBookPayments" method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
					<table width="100%" border="0" cellspacing="2" cellpadding="2" class="display" id="example">
						<thead bgcolor="#E6EEEE">
							<tr>
								<th>#</th>
								<th>Name</th>
								<th>Owner</th>
								<th>County</th>
								<th>Contact</th>
								<th>Assign</th>
							</tr>
						</thead>
						<tbody>
						<?php
						if($property_manager_id == 0){
							$result_suppliers = mysql_query("select id, property_code, commission, deposit, property_owner, property_name, location, propety_contact, taxes from property_details where owner_id = '0' order by id asc");
						}
						else{
							$result_suppliers = mysql_query("select id, property_code, commission, deposit, property_owner, property_name, location, propety_contact, taxes from property_details where manager_id = '$property_manager_id' and owner_id = '0' order by id asc");
						}
							
							$intcount = 0;
							while ($row = mysql_fetch_array($result_suppliers))
							{
								$intcount++;
								$id = $row['id'];
								$property_code = $row['property_code'];
								$property_name = $row['property_name'];
								$string = substr($property_name, 0, 2);
								if($string == 'ZA'){
									$property_name = 'Zawadi Apartments';
								}
								else{
									$property_name = $property_name;
								}
								$property_owner = $row['property_owner'];
								$location = $row['location'];
								$propety_contact = $row['propety_contact'];
								if ($intcount % 2 == 0) {
									$display= '<tr bgcolor = #F0F0F6>';
								}
								else {
									$display= '<tr>';
								}
								echo $display;
									echo "<input type='hidden' id='property_id[$id]' name='property_id[$id]' value='$id'>";
									echo "<td valign='top'>$intcount.</td>";
									echo "<td valign='top'>$property_name</td>";
									echo "<td valign='top'>$property_owner</td>";
									echo "<td valign='top'>$location</td>";	
									echo "<td valign='top'>$propety_contact</td>";
									echo "<td><input type='checkbox' name='assign[$id]' value='$system_user_id'></td>";						
							}
							echo "<input type='hidden' id='property[$id]' name='property[$id]' value='$id'>";
							?>
						</tbody>
					</table>
					<table border="0" width="100%">
						<tr>
							<td valign="top">
								<button name="btnNewCard" id="button">Assign</button>
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
			$assign = $_POST['assign'];
			$property_id = $_POST['property_id'];			
			$property = $_POST['property'];

			for($assign_property_counter = 1 ;  $assign_property_counter <= $property; $assign_property_counter++)
			{
				if ($assign[$assign_property_counter] != 0) {
					$assign_property_name = $assign[$assign_property_counter];
					$assign_property_id = $property_id[$assign_property_counter];		
					
					$sql2="update property_details SET owner_id='$assign_property_name' where id = '$assign_property_id'";
					$result2 = mysql_query($sql2);
					//echo $sql2."<br />";					
						
				}
			}

			$query = "user_details.php";	
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
