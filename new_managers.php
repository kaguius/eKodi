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
		$page_title = "Potential Property Managers";
		include_once('includes/db_conn.php');
		include_once('includes/header.php');
		if (!empty($_GET)){	
			$action = $_GET['action'];
			$tenant_user_id = $_GET['id'];
		}
		?>		
		<div id="page">
			<div id="content">
				<div class="post">
					<h2><?php echo $page_title ?> | e-kodi</h2>
					<strong>You are here:</strong> &raquo; <a href="index.php">Home</a> &raquo; <a href="admin.php">Admin</a> &raquo; <a href="new_managers.php">Potential Property Managers</a><br />
					<table width="100%" border="0" cellspacing="2" cellpadding="2" class="display" id="example">
						<thead bgcolor="#E6EEEE">
							<tr>
								<th>#</th>
								<th>Tenant</th>
								<th>Phone</th>
								<th>Email</th>
								<th>Comments</th>
								<th>Transactiontime</th>
							</tr>
						</thead>
						<tbody>
						<?php
						$result_suppliers = mysql_query("select phone_number, company_name, email_address, comments, transactiontime from managers order by transactiontime desc");
							
							$intcount = 0;
								while ($row = mysql_fetch_array($result_suppliers))
								{
									$intcount++;
									$id = $row['id'];
									$company_name = $row['company_name'];
									$company_name = ucwords(strtolower($company_name));
									$email_address = $row['email_address'];
									$phone_number = $row['phone_number'];
									$comments = $row['comments'];
									$transactiontime = $row['transactiontime'];
									
									if ($intcount % 2 == 0) {
										$display= '<tr bgcolor = #F0F0F6>';
									}
									else {
										$display= '<tr>';
									}
									echo $display;
										echo "<td valign='top'>$intcount</td>";
										echo "<td valign='top'>$company_name</a></td>";
										echo "<td valign='top'>$phone_number</td>";
										echo "<td valign='top'>$email_address</td>";	
										echo "<td valign='top'>$comments</td>";
										echo "<td valign='top'>$transactiontime</td>";
									echo "</tr>";	
								}
							//}
							?>
						</tbody>
						<tfoot bgcolor="#E6EEEE">
							<tr>
								<th>#</th>
								<th>Tenant</th>
								<th>Phone</th>
								<th>Email</th>
								<th>Comments</th>
								<th>Transactiontime</th>
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
