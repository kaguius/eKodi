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
		//$sql = "select id, property_name, location from property_details order by property_name asc";
		//include ("includes/core_functions.php");	
		include_once('includes/db_conn.php');
		$transactiontime = date("Y-m-d G:i:s");
		$page_title = "Property Tenant Listing";
		include_once('includes/header.php');
		
		?>
		<div id="page">
			<div id="content">
				<div class="post">
					<h2><?php echo $page_title ?> | e-kodi</h2>
						<strong>You are here:</strong> &raquo; <a href="index.php">Home</a> &raquo; <a href="property_tenant_listing.php">Tenants</a> &raquo; Property Tenant Listing<br />
						<form id="frmDeptCategories" name="frmDeptCategories" method="GET" action="tenant_listings.php">
							<table border="0" width="100%">
								<tr>
									<td width="20%">Property Name *</td>
									<td width="80%" valign="top">
										<select name='property_name' id='property_name'>";
											<?php
											if($property_manager_id == 0){
												$sql2 = mysql_query("select id, property_name, location from property_details order by property_name asc");
											}
											else{
												$sql2 = mysql_query("select id, property_name, location from property_details where manager_id = '$property_manager_id' order by property_name asc");
											}
											while($row = mysql_fetch_array($sql2)) {
												$property_id = $row['id'];
												$property_name = $row['property_name'];
												$string = substr($property_name, 0, 2);
												if($string == 'ZA'){
													$property = 'Zawadi Apartments';
													$property_name = $property.": ".$property_name;
												}
												else{
													$property_name = $property_name;
												}
												echo "<option value='$property_id'>$property_name</option>"; 
											}
											?>
										</select>
									</td>
									<!--<td width="80%">
										<?php
											//printSelectFromSql($sql, 'id', 'property_name', 'property_name', 'property_name', '', 'includes/db_conn.php', 1, ' class="myClass" ');
										?>
									</td>-->
								</tr>
								<tr>
									<td colspan="3"><button name="btnNewCard" id="button">Submit</button></td>
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
				//$ID=$_POST['ID'];
				$property_name = $_POST['property_name'];

				$url = "tenant_listings.php?property_name=$property_name" ;
				
				header( "Location: $url" );
				exit ;

			}
	}
	include_once('includes/footer.php');
	?>
