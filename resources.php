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
		include ("includes/core_functions.php");	
		include_once('includes/db_conn.php');
		$transactiontime = date("Y-m-d G:i:s");
		$page_title = "System Resources";
		include_once('includes/header.php');
		?>		
		<div id="page">
			<div id="content">
				<div class="post">
					<h2><?php echo $page_title ?> | e-kodi</h2>
					Which feature would you like to work with?
					<hr>
					<table width="100%" border="0" cellspacing="2" cellpadding="2" >
						<tr>
							<td width="50%" valign="top">
								<table width="100%" border="0" cellspacing="2" cellpadding="2" >
									<tr>
										<td valign='top'><a href='images/e_Kodi_Property_Manager_User_Manual_18012013.pdf'><img src="images/manual.jpeg" width="65px"></a></td>
										<td valign='top'><strong>User Manual</strong><br />
										This is the system manual last edited on Jan 18, 2013.</td>
									</tr>
								</table>
							</td>
							<td width="50%" valign="top">
								<table width="100%" border="0" cellspacing="2" cellpadding="2" >
									<tr>
										<!--<td valign='top'><a href='optimizedb.php'><img src="images/database.jpg" width="65px"></a></td>
										<td valign='top'><strong>Optimize Database</strong><br />
										This feature enables you to optimize the database, makes it faster.</td>-->
									</tr>									
								</table>
							</td>
						</tr>
					</table>
					<hr>
				</div>
			</div>
			<br class="clearfix" />
			</div>
		</div>
<?php
	}
	include_once('includes/footer.php');
?>
