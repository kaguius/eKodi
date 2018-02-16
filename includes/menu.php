<?php
	$userid = "";
	$adminstatus = "";
	session_start();
	if (!empty($_SESSION)){
		$userid = $_SESSION["userid"] ;
		$adminstatus = $_SESSION["adminstatus"] ;
	}
?>
<div id="menu">
	<ul>
		<li class="first current_page_item"><a href="dashboard.php">Dashboard</a></li>
		<li><a href="property_listings.php" title="Clike here to view Property added to the system">Properties</a></li>
		<li><a href="property_tenant_listing_payment.php" title="Clike here to make rent payments">Rent</a></li>
		<!--<li><a href="property_expense_payment.php" title="Clike here to make expense payments">Expenses</a></li>
		<li><a href="property_repairs.php" title="Clike here to make expense payments">Repairs</a></li>-->
		<?php 
			if($adminstatus <> '5'){
		?>
			<li><a href="financials.php" title="Clike here to view Financial functions">Financials</a></li>	
		<?php
			}
		?>
		<li><a href="reports.php" title="Clike here to view system reports">Reports</a></li>			
		<li><a href="resources.php" title="Clike here to view resources">Resources</a></li>
		<li><a href="admin.php" title="Clike here to view Admin functions">Admin</a></li>
		<li><a href="logout.php" title="Clike here to log out of the system">Log Out</a></li>
	</ul>
	<br class="clearfix" />
</div>
