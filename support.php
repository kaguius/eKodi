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
		$transactiontime = date("Y-m-d G:i:s");
		$property_name = "";
		$physical_address = "";
		$location = "";
		$property_owner = "";
		$propety_contact = "";
		$bank_name = "";
		$bank_branch = "";
		$account_name = "";
		$account_number = "";

		include_once('includes/header.php');
		?>		
		<div id="page">
			<div id="content">
				<div class="post">
					<h2><?php echo $page_title ?> | e-kodi</h2>
					<strong>You are here:</strong> &raquo; <a href="index.php">Home</a> &raquo; <a href="admin.php">Admin</a> &raquo; <?php echo $page_title ?><br />
					<p>We offer many customer support options including answers to Frequently Asked Questions, a User Guide, and Video Tutorials for you to find solutions quickly when you need them.</p>
					<form id="frmLogin" name="frmLogin" method="post" onSubmit='return vdator2.exec();' action="<?php echo $_SERVER['PHP_SELF'];?>">
					<table border='0' cellpadding='2' cellspacing='2'>
				        	<tr>
						        <td>Name: </td>
							<td>
								<input id="company_name" name="company_name" class="main_input"  size="25" value="" type="text" ">
								 <script language="JavaScript" type="text/javascript">if(document.getElementById) document.getElementById('company_name').focus();</script> 
					                </td>
				                </tr>
						<tr>
						        <td>Email Address: </td>
							<td>
								<input id="email_address" name="email_address" class="main_input"  size="15" value="" type="text" ">
					                </td>
				                </tr>
						<tr>
								<td>Report Type:</td>
								<td>
									<select name="report_type" id="report_type">
										 <option value="1">General Queries or Comments</option>
										 <option value="2">Unable to Login</option>
										 <option value="3">Need to know more about e-Kodi</option>
										 <option value="4">Complaint</option>
									</select> 

								</td>
							</tr>
						<tr>
						        <td>Comments: </td>
							<td>
								<textarea title="Enter Comment(s)" name="comments" id="comments" cols="55" rows="5" class="textfield"></textarea>
					                </td>
				                </tr>
						<tr>
							<td align="left">
								<button name="submit" id="button" onclick="return CheckForm();">Submit to Support</button>
							</td>
						</tr>
		                          </table>
					<script  type="text/javascript">
						var frmvalidator = new Validator("frmLogin");
							frmvalidator.addValidation("company_name","req","Name field cannot be empty");
							frmvalidator.addValidation("email_address","req","Email Address cannot be empty");
							frmvalidator.addValidation("comments","req","Please enter your comments");
					</script>
					</form>
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
