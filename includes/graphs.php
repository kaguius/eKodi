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
	include_once('includes/db_conn.php');
	$expense_month = date("m");
	$expense_year = date("Y");
?>
<script type="text/javascript">
      $(document).ready(function () {
      
	
	jQuery('#property_tracking').tufteBar({
          data: [
			<?php
				if($property_manager_id == 0){
					//$result_tender = mysql_query("select distinct calender.month, count(property_month)property_month from property_details inner join calender on calender.id = property_details.property_month where property_year = '$expense_year' group by property_details.property_month");
					$result_tender = mysql_query("select distinct calender.month, count(property_month)property_month from property_details inner join calender on calender.id = property_details.property_month group by property_details.property_month order by property_year, calender.id asc");
				}
				else{
					//$result_tender = mysql_query("select distinct calender.month, count(property_month)property_month from property_details inner join calender on calender.id = property_details.property_month where property_year = '$expense_year' and manager_id = '$property_manager_id' group by property_details.property_month");
					$result_tender = mysql_query("select distinct calender.month, count(property_month)property_month from property_details inner join calender on calender.id = property_details.property_month where manager_id = '$property_manager_id' group by property_details.property_month order by property_year, calender.id asc");
				}
				$intcount = 0;
				$data_count_total = 0;
				while ($row = mysql_fetch_array($result_tender))
				{
					$intcount++;
					$month = $row['month'];
					$property_month = $row['property_month'];
					?>
					[<?php echo $property_month?>, {label: '<?php echo $month ?>'}],
					<?php
				}
			?>
          ],
          barWidth: 0.8,
          axisLabel: function(index) { return this[1].label },
          color:     function(index) { return ['#71588F', '#0B3B0B'][index % 2] }
        });

	jQuery('#unit_tracking').tufteBar({
          data: [
			<?php
				if($property_manager_id == 0){
					//$result_tender = mysql_query("select distinct calender.month, count(property_month)property_month from property_item inner join calender on calender.id = property_item.property_month where property_year = '$expense_year' group by property_item.property_month");
					$result_tender = mysql_query("select distinct calender.month, count(property_month)property_month from property_item inner join calender on calender.id = property_item.property_month group by property_item.property_month order by property_year, calender.id asc");
				}
				else{
					//$result_tender = mysql_query("select distinct calender.month, count(property_item.property_month)property_month from property_item inner join property_details on property_details.id = property_item.property_listing inner join calender on calender.id = property_item.property_month where property_item.property_year = '$expense_year' and property_details.manager_id = '$property_manager_id' group by property_item.property_month");
					$result_tender = mysql_query("select distinct calender.month, count(property_item.property_month)property_month from property_item inner join property_details on property_details.id = property_item.property_listing inner join calender on calender.id = property_item.property_month where property_details.manager_id = '$property_manager_id' group by property_item.property_month order by property_year, calender.id asc");
				}
				$intcount = 0;
				$data_count_total = 0;
				while ($row = mysql_fetch_array($result_tender))
				{
					$intcount++;
					$month = $row['month'];
					$property_month = $row['property_month'];
					?>
					[<?php echo $property_month?>, {label: '<?php echo $month ?>'}],
					<?php
				}
			?>
          ],
          barWidth: 0.8,
          axisLabel: function(index) { return this[1].label },
         color:     function(index) { return ['#848484', '#82293B'][index % 2] }
        });
	
	jQuery('#expense_ranking').tufteBar({
          data: [
			<?php
				$result_tender = mysql_query("select distinct calender.month, count(property_managers.id)manager_count from property_managers inner join calender on calender.id = property_managers.manager_month group by calender.id order by manager_year, manager_month asc");
				$intcount = 0;
				$data_count_total = 0;
				while ($row = mysql_fetch_array($result_tender))
				{
					$intcount++;
					$month = $row['month'];
					$manager_count = $row['manager_count'];
					?>
					[<?php echo $manager_count ?>, {label: '<?php echo $month ?>'}],
					<?php
				}
			?>
          ],
          barWidth: 0.8,
          axisLabel: function(index) { return this[1].label },
          color:     function(index) { return ['#848484', '#82293B'][index % 2] }
        });
	
	  jQuery('#totalrent').tufteBar({
          data: [
			<?php
				if($property_manager_id == 0){
					//$result = mysql_query("select distinct calender.month, sum(payment)payment, sum(actual_penalties)actual_penalties, sum(water_pay)water_pay, sum(service_charge)service_charge from payments inner join calender on calender.id = payments.rent_month where rent_year = '$expense_year' group by calender.id");
					$result = mysql_query("select distinct calender.month, rent_year, sum(received)payment from payments inner join calender on calender.id = payments.rent_month group by calender.id order by rent_year, rent_month asc limit 12");
				}
				else{
					//$result = mysql_query("select distinct calender.month, sum(payment)payment, sum(actual_penalties)actual_penalties, sum(water_pay)water_pay, sum(service_charge)service_charge from payments inner join calender on calender.id = payments.rent_month where rent_year = '$expense_year' and manager_id = $property_manager_id group by calender.id");
					$result = mysql_query("select distinct calender.month, rent_year, sum(received)payment from payments inner join calender on calender.id = payments.rent_month group by calender.id order by rent_year, rent_month asc limit 12");
				}
				while ($row = mysql_fetch_array($result))
				{
					$month = $row['month'];
					$payment = $row['payment'];
					$rent_year = $row['rent_year'];
					$actual_penalties = $row['actual_penalties'];
					$water_pay = $row['water_pay'];
					$service_charge = $row['service_charge'];
					$total_payments = $payment + $actual_penalties + $water_pay + $service_charge;
					?>
					[<?php echo $total_payments ?>, {label: '<?php echo $month ?>'}],
					<?php
				}
			?>
          ],
          barWidth: 0.8,
          axisLabel: function(index) { return this[1].label },
          color:     function(index) { return ['#A31D03', '#4BACC6'][index % 2] }
        });
		
	jQuery('#totalcomms').tufteBar({
          data: [
			<?php
				if($property_manager_id == 0){
					//$result_tender = mysql_query("select distinct calender.month, sum(comm_paid)comm_paid from comms_table inner join calender on calender.id = comms_table.comm_month where comm_year = '$expense_year' group by comms_table.comm_month");
					$result_tender = mysql_query("select distinct calender.month, sum(comm_paid)comm_paid from comms_table inner join calender on calender.id = comms_table.comm_month group by comms_table.comm_month order by comm_year, comm_month asc");
				}
				else{
					//$result_tender = mysql_query("select distinct calender.month, sum(comm_paid)comm_paid from comms_table inner join calender on calender.id = comms_table.comm_month where comm_year = '$expense_year' and manager_id = '$property_manager_id' group by comms_table.comm_month");
					$result_tender = mysql_query("select distinct calender.month, sum(comm_paid)comm_paid from comms_table inner join calender on calender.id = comms_table.comm_month where manager_id = '$property_manager_id' group by comms_table.comm_month order by comm_year, comm_month asc");
				}
				
				while ($row = mysql_fetch_array($result_tender))
				{
					$month = $row['month'];
					$comm_paid = $row['comm_paid'];
					?>
					[<?php echo $comm_paid ?>, {label: '<?php echo $month ?>'}],
					<?php
				}
			?>
          ],
          barWidth: 0.8,
          axisLabel: function(index) { return this[1].label },
          color:     function(index) { return ['#71588F', '#0B3B0B'][index % 2] }
        });

      });
    </script>
<script type="text/javascript">

		      // Load the Visualization API and the piechart package.
		      google.load('visualization', '1.0', {'packages':['corechart']});

		      // Set a callback to run when the Google Visualization API is loaded.
		      google.setOnLoadCallback(drawChart);

		      // Callback that creates and populates a data table,
		      // instantiates the pie chart, passes in the data and
		      // draws it.
		      function drawChart() {

			// Create the data table.
			var data = new google.visualization.DataTable();
			data.addColumn('string', 'Topping');
			data.addColumn('number', 'Unit Types');
			data.addRows([
			<?php
				if($property_manager_id == 0){
					$result_tender = mysql_query("select distinct unit_type, count(id)unit_counts from property_item group by unit_type");
				}
				else{
					$result_tender = mysql_query("select distinct unit_type, count(property_item.id)unit_counts from property_item inner join property_details on property_details.id = property_item.property_listing where property_details.manager_id = '$property_manager_id' group by unit_type");
				}
				$intcount = 0;
				$data_count_total = 0;
				while ($row = mysql_fetch_array($result_tender))
				{
					$intcount++;
					$unit_type = $row['unit_type'];
					$unit_counts = $row['unit_counts'];
					?>
					 ['<?php echo $unit_type?>', <?php echo $unit_counts?>],
					<?php
				}
			?>
			]);

			// Set chart options
			//var options = {'title':'Unit Types',
			//	       'width':500,
			//	       'height':500};
			var options = {backgroundColor: '#FFFFFF',
		           'width':350,
		           'height':350,
		           'title' : 'Unit Types',
			   legend : { position : 'bottom' }
			};
			// Instantiate and draw our chart, passing in some options.
			var chart = new google.visualization.PieChart(document.getElementById('chart_div'));
			chart.draw(data, options);
		      }
		    </script>
