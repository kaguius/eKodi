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
			document.location = "login.php";
		</script>
		<?php
	}
	else{
		$transactiontime = date("Y-m-d G:i:s");
		include_once('includes/header.php');
		?>		
		<div id="page">
			<div id="content">
				<div class="post">
					<h2>The Complete Online Property Management Solution | e-kodi</h2>
					<p>Our property management software is web-based and all upgrades are done automatically. If you have a mobile device with internet capability, your office can be mobile! The heart of our software is the Rent Roll page, which means entering tenant payments, emailing statements and documents, viewing tenant notes, highlighting any tenant for tracking purposes, moving tenants in or out, and printing daily bank deposit slips are only clicks away. We strive to provide excellent customer support and we continually add new features to our software based on member feedback. These are some of the top reasons property managers choose us!</p>
				</div>
			</div>
			<br class="clearfix" />
			</div>
		</div>
<?php
	}
	include_once('includes/footer.php');
?>
