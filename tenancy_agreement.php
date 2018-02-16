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
	$expense_month = date("m");
	$expense_year = date("Y");

	//if($adminstatus != 1 || $adminstatus != 2 || $adminstatus != 4){
	if($adminstatus == 3){
		include_once('includes/header.php');
		$query = "login.php";
		?>
		<script type="text/javascript">
			document.location = "<?php echo $query ?>";
		</script>
		<?php
	}
	else{
		$transactiontime = date("Y-m-d G:i:s");
		include_once('includes/header.php');
		include_once('includes/graphs.php');
		$today = date("F j, Y");
		$rent_period = date("F, Y");
		if (!empty($_GET)){	
			$tenant_id = $_GET['tenant_id'];
			$unit_id = $_GET['unit_id'];
			$property_name = $_GET['property_name'];
			$property_id = $_GET['property_name'];
		}
		$sql = mysql_query("select property_managers.company_name, property_managers.phone_number, property_details.property_owner, property_details.property_name, property_details.deposit, property_details.penalties_day, property_details.propety_contact, property_details.penalties from property_details inner join property_managers on property_managers.id = property_details.manager_id  where property_details.id = '$property_id'");
		while($row = mysql_fetch_array($sql)) {
			$property_manager_name = $row['company_name']; 
			$property_manager_phone = $row['propety_contact']; 
			$property_owner = $row['property_owner']; 
			$property_name = $row['property_name']; 
			$property_name = ucwords(strtolower($property_name));
			$deposit = $row['deposit']; 
			$penalties_day = $row['penalties_day'];
			$penalties = $row['penalties'];  
		}
		$sql = mysql_query("select id, property_name, property_owner, location, propety_contact, lr_number, property_type, manager_id, bank_name, bank_branch, account_name, account_number from property_details where id = '$property_id'");
		while($row = mysql_fetch_array($sql)) {
			$bank_name = $row['bank_name'];
			$bank_branch = $row['bank_branch'];
			$account_name = $row['account_name'];
			$account_number = $row['account_number'];
		} 
		$sql = mysql_query("select tenant_name, transactiontime, mailing_address, phone_number, id_number, employment_place from tenants where id = '$tenant_id'");
		while($row = mysql_fetch_array($sql)) {
			$tenant_name = $row['tenant_name']; 
			$tenant_name = ucwords(strtolower($tenant_name));
			$date_transactiontime = $row['transactiontime'];
			$mailing_address = $row['mailing_address']; 
			$phone_number = $row['phone_number']; 
			$id_number = $row['id_number'];
			$employment_place = $row['employment_place']; 
			$employment_place = ucwords(strtolower($employment_place)); 
		}
		$sql = mysql_query("select location, floor, deposit, rent, service_charge, garbage_fee, parking_fee from property_item where id = '$unit_id'");
		while($row = mysql_fetch_array($sql)) {
			$location = $row['location'];
			$floor = $row['floor'];
			$location = ucwords(strtolower($location));
			$floor = ucwords(strtolower($floor));
			$block_occupied = $location.", ".$floor;
			$block_occupied = ucwords(strtolower($block_occupied));
			$deposit = $row['deposit'];
			$rent = $row['rent'];
			$service_charge = $row['service_charge'];
			$garbage_fee = $row['garbage_fee'];
			$parking_fee = $row['parking_fee'];
		}
		?>		
		<div id="page">
			<div id="content">
				<div class="post">
					<h2 align="center">Tenancy Agreement</h2>
					<p align="right"><a href="print_agreement.php?tenant_id=<?php echo $tenant_id?>&property_name=<?php echo $property_id?>&unit_id=<?php echo $unit_id ?>" title="Print the Tenancy Agreement for <?php echo $tenant_name ?>"><img src="images/printer.jpg" width="40px"></a></p>
					<br />
					<p>This Agreement is made this <strong><?php echo $date_transactiontime ?></strong> between [<strong><?php echo $property_manager_name ?></strong>] of Tel: [<strong><?php echo $property_manager_phone ?></strong>] herein referred to as the Landlord (for landlord) and [<strong><?php echo $tenant_name ?></strong>} Of P.O.box [<strong><?php echo $mailing_address ?></strong>] and holder of Identity card/.(attach copy) [<?php echo $id_number ?>] Mobile No [<strong><?php echo $phone_number ?></strong>] Place of work [<strong><?php echo $employment_place ?></strong>] Hereby referred to as the tenant.</p>
					<p>RE: TENANCY OF PLOT NO: [<strong><?php echo $property_name ?></strong>] LOCATION: [<strong><?php echo $floor ?></strong>] HOUSE NO: [<strong><?php echo $location ?></strong>] DUE DATE: [<strong><?php echo $penalties_day ?> day of the month</strong>] NATURE OF OCCUPATION: <strong>RESIDENTIAL</strong> GARBAGE FEE PER MONTH: [<strong>KES <?php echo $garbage_fee ?></strong>] </p>
					
					<p><strong><u>NOW IT IS HEREBY MUTUALLY AGREED AS FOLLOWS:-</u></strong></p>
					<p>1. This serves to confirm the tenancy of the above premises for use by myself and my family, partners, associates as a RESIDENTIAL premises on the agreed terms and conditions. I have therefore taken in rent the premises with effect from ................... and agreed to pay in advance a monthly rent of <strong>Kshs.<?php echo number_format($rent, 2) ?></strong> Payable to the Landlordlsquo;s ACCOUNT at any date not later than <strong><?php echo $penalties_day ?>th day of each month</strong> and a rent deposit of <strong>Kshs. <?php echo number_format($deposit, 2) ?></strong> And bills deposits of Kshs................... which shall not be treated as rent or bills payments but to cover for any unpaid bills/damage/recovery fee to be held by the landlord or agent and refunded at the termination of the tenancy period if there is no such complain.</p>
					<p>2. That the tenant shall deposit all the money at:-<br />
					      - Bank Name: <strong><?php echo $bank_name ?></strong><br />
					      - Account name: <strong><?php echo $account_name ?></strong><br />
					      - Account No.: <strong><?php echo $account_number ?></strong> <br />
				       And the deposit slip should be dropped in the pigeon box provided at the premises.</p>
					<p>3. That the tenant is supposed to retain a photocopy of Bank deposit slip, after every payment for his/her record, for the Landlord shall not be held responsible for any payment other than direct deposit to the above quoted landlords account. <strong>NOTE: Any payments made in cash whether to the landlord, Agent, caretaker or any other person shall not be considered thus one paying at his/her own risk.</strong></p>
					<p>4. The tenant shall pay all the relevant bills to all the appointed companies or agents including opening light and water accounts by paying his own deposit and paying the same bills per month or as per the statement raised by the respective bodies unless there are communal sharing units.</p>
					<p>5. That the tenant shall permit the landlord with or without workmen and other with necessary appliances and reasonable times to enter upon the demised premises or any part thereof to view its conditions and the state of repair and also to carry out and execute such repairs to the demised premise as may be necessary, when such need arises and the tenant shall not assign sub-let any part with possession of the demised unless there is a written agreement between him, and the landlord.  And he/she shall not make any alterations or additions to the demised premise without the consent of the landlord first hand and obtained.</p>
					<p>6. That the tenant is not allowed to put any additional structures or sub-let any part within the premise or compound unless authorized in writing by the agent or the landlord.</p>
					<p>7. That the demised premise shall be used for <strong>Residential</strong> purpose only and the tenant shall not cause any troubles or annoyance to any other tenant in adjoining premises.</p>
					<p>8. That the tenant shall repair and/or replace any of the Landlord’s fixtures, fittings, furniture or furnishings damaged, broken or lost during the tenancy period and he/she will ensure all of his property are secure and the landlord will not be liable fro any loss encountered to the tenant’s fixtures on/or property during the course of tenant’s tenure.</p>
					<p>9. That the landlord has the right to keep on demanding the rent if not paid by the due date and incase the tenant is sent rent demand letter from any of the appointed Company/landlord/agent’s attorney’s shall be at his /her own cost.</p>
					<p>10. If the rent payment is to be made by Cheque it should only be deposited accompanied by equivalent bank clearance charges and to be deposited before 1st of every month, giving it three days to mature and incase the cheque bounces Tenant will be charged amount equivalent to our bank charges and if it bounces twice the Landlord will give a notice to vacate.</p>
					<p>11. That the Landlord does not object and give room to any reason for not paying rent on time. Only if this reason is sympathetically genuine and reported not in any means unless written notice before the tenant’s due date and should either be death, sickness or any tragedy affecting the financial position of the immediate tenant and should therefore be discussed between the tenant and the Landlord whether genuine or not. Less we shall not accept any reason of not paying rent on time unless it happens on the night of your due date.</p>
					<p>12. The tenancy is on monthly basis and should the tenant want to vacate he/she should give one month written notice for the house to be inspected and deposit refund preparation and for quarterly rent payment basis, the tenant should give three months notice, less without such a notice the tenant shall lose his or her deposit to cover the month (s) he/she has first occupied. However, the tenant will be given by the agent /Landlord not less than three months written notice but in accordance with the law.</p>
					<p>13. The tenant undertakes to keep in force a valid insurance policy during the cause of this Agreement to cover for all risks associated with his properties, himself or anybody associated with him and therefore the landlord nor the agent undertakes No liability for loss or damage incurred as a result of theft burglary or fire.</p>
					<p>14. Note that the government taxation which is required to be paid by the tenant shall be treated separately from the rent and that the tenant shall be required to adhere to it if demanded and be paid.</p>
					<p>15. Rent shall be reviewed after every one year from the date the agreement is signed but in accordance with the current market value within the location of the said property. However the company will give three months written notice in advance.</p>
					<p>16. That the landlord shall maintain the exterior of the premises in good and proper conditions unless there is an exterior damage due to negligence of the tenant of which he or she (tenant) shall be responsible. Also the tenant paying rent hereby reserved performing and observing the covenants and conditions implied the landlord shall permit the tenant to have a quiet lawfully claiming under the landlord unless the tenants breaks the Agreement.</p>
					<p>17. That the tenancy shall yield up and deliver to the landlord premises fixtures, fittings and furnishings in as good a state or repair and decoration as the same are now in (reasonable tear and wear excepted) provided always incase of removal of any of the tenant fixtures the tenant shall repair and make good any damages caused by him in removing the said fixtures from the premises.</p>
					<p>18. If the rent is not paid by the due date `it will automatically attract a penalty of 10% monthly compounded of the total amount due plus a further charge of the cost/fuel consumed by the messenger if the tenant is then served by a notice of reminder. However rent arrears shall be treated in accordance with the law.</p>
					<p>I <strong><u><?php echo $tenant_name ?></u></strong> do hereby confirm that I have read and understood all the above conditions and I do hereby declare that I shall abide to all of them without exemption, failure to do so will result to eviction and shall have no cause of complaints against the landlord/owner/agent for such eviction.</p>
					<table border="0" width="100%">
						<tr>
							<td valign="top">
								<p>Signed by the Landlord:<br /><br />
								Name: <strong><?php echo $property_manager_name ?></strong><br />
								Phone No: <strong><?php echo $property_manager_phone ?></strong><br />
								Date: <strong><?php echo $date_transactiontime ?></strong>
								</p>
							</td>
							<td>
								<p>Signed by the Tenant:<br /><br />

								Name: <strong><?php echo $tenant_name ?></strong><br />
								ID No: <strong><?php echo $id_number ?></strong><br />
								Phone No: <strong><?php echo $phone_number ?></strong><br />
								Date: <strong><?php echo $date_transactiontime ?></strong>
								</p>
							</td>
						</tr>
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
