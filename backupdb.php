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
		$page_title = "Database Backups";
		$username = "root";
		$password = "kaguius";
		$hostname = "localhost";
		$database = "eKodi";
		$username =escapeshellcmd($username);
		$password =escapeshellcmd($password);
		$hostname =escapeshellcmd($hostname);
		$database =escapeshellcmd($database);
		if (!empty($_GET)){	
			$action = $_GET['action'];
		}
		if ($action=='backup'){
			$backupFile='/var/www/backup/'.date("Y-m-d-H-i-s").'_'.$database.'.sql';
			$command = "mysqldump -u$username -p$password -h$hostname $database > $backupFile";
			system($command, $result);
			echo $result;
			?>
			<script type="text/javascript">
				document.location = "backupdb.php";
			</script>
			<?php
		}
		include_once('includes/header.php');
	?>
		<div id="page">
			<div id="content">
				<div class="post">
					<h2><?php echo $page_title ?> | e-kodi</h2>
					<strong>You are here:</strong> &raquo; <a href="index.php">Home</a> &raquo; <a href="admin.php" >Admin</a> &raquo; Database Backups<br />
					<p><a href="backupdb.php?action=backup" title = "Create a system wide data backup"><img src="images/backups.jpg" width="75px"></a></p>
					<?php
						//path to directory to scan
						$directory = "backup/";
						 
						//get all image files with a .jpg extension.
						$files = glob($directory . "*.sql");
						 
						//print each file name
					?>
					<table width="100%" border="0" cellspacing="2" class="display" cellpadding="2" id="example">
						<thead bgcolor="#E6EEEE">
							<tr>
								<th>#</th>
								<th>File Name</th>
							</tr>
						</thead>
						<tbody>
					<?php
						$intcount = 0;
						foreach($files as $image)
						{
							$intcount++;
							if ($intcount % 2 == 0) {
								$display= '<tr bgcolor = #F0F0F6>';
							}
							else {
								$display= '<tr>';
							}
							echo $display;
								echo "<td valign='top'>$intcount.</td>";
								echo "<td valign='top'>$image</td>";				
						}
					?>
						</tbody>
						<tfoot bgcolor="#E6EEEE">
							<tr>
								<th>#</th>
								<th>File Name</th>
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
		

