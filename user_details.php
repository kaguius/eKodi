<?php
	$userid = "";
	$adminstatus = "";
	$property_manager_id = "";
	session_start();
	if (!empty($_SESSION)){
		$userid = $_SESSION["userid"] ;
		$adminstatus = $_SESSION["adminstatus"] ;
		$sacco_id = $_SESSION["sacco_id"] ;
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
		$page_title = "System Users Listing";
		include_once('includes/db_conn.php');
		include_once('includes/header.php');
		if (!empty($_GET)){	
			$action = $_GET['action'];
			$tenant_user_id = $_GET['id'];
		}

		if ($action=='disable'){
			$sql2="update user_profiles set user_status = '0' where id = '$tenant_user_id'";
			//echo $sql2;

			//$result = mysql_query($sql);
			$result = mysql_query($sql2);
			?>
				<script type="text/javascript">
				<!--
					//document.location = "user_details.php";
				//-->
				</script>
			<?php
		}
		if ($action=='enable'){
			$sql2="update user_profiles set user_status = '1' where id = '$tenant_user_id'";
			//echo $sql2;

			//$result = mysql_query($sql);
			$result = mysql_query($sql2);
			?>
				<script type="text/javascript">
				<!--
					document.location = "user_details.php";
				//-->
				</script>
			<?php
		}
		?>		
		<div id="page">
			<div id="content">
				<div class="post">
					<h2><?php echo $page_title ?> | e-kodi</h2>
					<strong>You are here:</strong> &raquo; <a href="index.php">Home</a> &raquo; <a href="admin.php">Admin</a> &raquo; <a href="user_details.php">System Users Listing</a><br />
					+<a href="user_profiles.php">Add a new User</a>
					<table width="100%" border="0" cellspacing="2" cellpadding="2" class="display" id="example">
						<thead bgcolor="#E6EEEE">
							<tr>
								<th>#</th>
								<th>Full Name</th>
								<th>First Name</th>
								<th>Last Name</th>
								<th>Email Address</th>
								<th>Phone Number</th>
								<th>User Status</th>
								<th>Status</th>
								<th>Disable/ Enable</th>
								<th>Properties</th>
							</tr>
						</thead>
						<tbody>
						<?php
						if($property_manager_id == 0){
							$result_suppliers = mysql_query("select user_profiles.id, first_name, last_name, email_address, phone_number, admin_status.admin_status, user_status from user_profiles inner join admin_status on admin_status.id = user_profiles.admin_status order by user_status desc");
						}
						else{
							$result_suppliers = mysql_query("select user_profiles.id, first_name, last_name, email_address, phone_number, admin_status.admin_status, user_status from user_profiles inner join admin_status on admin_status.id = user_profiles.admin_status where manager_id = '$property_manager_id'  order by user_status desc");
							//$result_suppliers = mysql_query("select id, property_code, commission, deposit, property_owner, property_name, location, propety_contact, taxes from property_details where manager_id = '$property_manager_id' order by property_name, property_owner asc");
						}
							
							$intcount = 0;
								while ($row = mysql_fetch_array($result_suppliers))
								{
									$intcount++;
									$id = $row['id'];
									$first_name = $row['first_name'];
									$first_name = ucwords(strtolower($first_name));
									$last_name = $row['last_name'];
									$last_name = ucwords(strtolower($last_name));
									$user_name = $first_name." ".$last_name;
									$email_address = $row['email_address'];
									$phone_number = $row['phone_number'];
									$admin_status = $row['admin_status'];
									$user_status = $row['user_status'];
									
									if ($intcount % 2 == 0) {
										$display= '<tr bgcolor = #F0F0F6>';
									}
									else {
										$display= '<tr>';
									}
									echo $display;
										echo "<td valign='top'>$intcount</td>";
										echo "<td valign='top'><a href='user_profiles.php?id=$id&action=edit' title='Tenant Details'>$user_name</a></td>";
										echo "<td valign='top'>$first_name</td>";
										echo "<td valign='top'>$last_name</td>";
										echo "<td valign='top'>$email_address</td>";	
										echo "<td valign='top'>$phone_number</td>";
										echo "<td valign='top'>$admin_status</td>";
										if($user_status == '1'){
											echo "<td valign='top'>Active</td>";
											echo "<td valign='top' align='center'><a title = 'Disable User' href='user_details.php?id=$id&action=disable'><img src='images/delete.png' width='20px'></a></td>";
										}
										else{
											echo "<td valign='top'>Disabled</td>";
											if($user_status == 'Administrator' && $user_status == 'Management' && $user_status == 'Developer'){
												echo "<td valign='top' align='center'><a title = 'Enable User' href='user_details.php?id=$id&action=enable'><img src='images/active.png' width='20px'></a></td>";
											}
											else{
												echo "<td valign='top' align='center'><a title = 'Enable User' href='user_details.php?id=$id&action=enable'><img src='images/active.png'  width='20px'></a></td>";
											}
										}
										if($admin_status == 'Property Owner'){
											echo "<td valign='top' align='center'><a title = 'Enable User' href='assign_properties.php?id=$id&action=enable&manager_id=$property_manager_id'><img src='images/occupied.png' width='35px'></a></td>";
										}
										else{
											echo "<td valign='top' align='center'>None</td>";
										}
										
									echo "</tr>";	
								}
							//}
							?>
						</tbody>
						<tfoot bgcolor="#E6EEEE">
							<tr>
								<th>#</th>
								<th>Full Name</th>
								<th>First Name</th>
								<th>Last Name</th>
								<th>Email Address</th>
								<th>Phone Number</th>
								<th>User Status</th>
								<th>Status</th>
								<th>Disable/ Enable</th>
								<th>Properties</th>
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
