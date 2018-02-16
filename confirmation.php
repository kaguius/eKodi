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
		$page_title = "e-Kodi User Support";
		include_once('includes/db_conn.php');
		$result_tender = mysql_query("select id, company_name, email_address, report_type, comments from support_logs order by id desc limit 1");
		while ($row = mysql_fetch_array($result_tender))
		{
			$id = $row['id'];
			$company_name = $row['company_name'];
			$email_address = $row['email_address'];
			$report_type = $row['report_type'];
			$comments = $row['comments'];
		}
		$support_ticket = "e-Kodi-Support-".$id;
		include_once('includes/header.php');
		?>		
		<div id="page">
			<div id="content">
				<div class="post">
					<h2><?php echo $page_title ?> | e-kodi</h2>
					<strong>You are here:</strong> &raquo; <a href="index.php">Home</a> &raquo; <a href="admin.php">Admin</a> &raquo; <?php echo $page_title ?><br />
					<h3><?php echo $pagetitle ?> Confirmation: <?php echo $company_name ?></h3>
					<p>Hello <?php echo $company_name ?>,<br /><br />
					We have received your inquiry, and have assigned it to a representative who will contact you shortly. This issue has be tracked through our Support Center using the following Ticket ID: <strong><?php echo $support_ticket ?></strong>.</p>
					<p>If corresponding by e-mail, to <a href="mailto:support@e-kodi.com">support@e-kodi.com</a> please be sure to include your Ticket ID number in the subject line in all messages regarding this inquiry. Thank you for your business, it is always a pleasure to serve you!</p>
					<p>Best regards,<br />

					<strong>e-Kodi.com</strong><br />
					Client Services Team</p>
				</div>
			</div>
			<br class="clearfix" />
			</div>
		</div>
<?php
	if (!empty($_POST)) {
			$company_name = $_POST['company_name'];
			$email_address = $_POST['email_address'];
			$report_type = $_POST['report_type'];
			$comments = $_POST['comments'];
		 	
			$result_tender = mysql_query("select id from support_logs order by id desc limit 1");
			while ($row = mysql_fetch_array($result_tender))
			{
				$id = $row['id'];
				$id++;
			}

			$support_ticket = "e-Kodi-Support-".$id;
			$sql="INSERT INTO support_logs (support_ticket, company_name, email_address, report_type, comments, transactiontime) VALUES 				('$support_ticket', '$company_name','$email_address', '$report_type','$comments', '$transactiontime')";
			
			//echo $sql;
			$result = mysql_query($sql);
			?>
				<script type="text/javascript">
					document.location = "support_email.php";
				</script>
			<?php
			
		} 
	}
	include_once('includes/footer.php');
?>
