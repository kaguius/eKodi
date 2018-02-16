<?php

/**
 * Collection of PHP Functions I use most often
 *
 * This program is free software; you can redistribute it and/or modify it
 * under the terms of the GNU Lesser General Public License as published by
 * the Free Software Foundation; either version 2.1 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful, but WITHOUT
 * ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or
 * FITNESS FOR A PARTICULAR PURPOSE.  See the GNU Lesser General Public License
 * for more details.
 *
 * You should have received a copy of the GNU Lesser General Public License
 * along with this program; if not, write to the Free Software Foundation,
 * Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA
 *
 * @author    Peter Munene Karunyu <pkarunyu@gmail.com>
 * @copyright Copyright &copy; 2009 Peter Munene Karunyu
 * @license   http://www.gnu.org/copyleft/lesser.txt
 * @package   commmon_functions
 * @version   0.1, 26 July 2009
 */

/**
 * Prevent this file from being accessed directly
 */
//if (eregi("common_functions.php",$_SERVER['PHP_SELF']))
//{
    //die ("<strong>Access Denied:</strong> You can't access this file directly.");
//}

////////////////////////////////////////////////////////////////////////////////
//                              STRING FUNCTIONS                              //
////////////////////////////////////////////////////////////////////////////////


/**
 * Remove leading and trailing spaces from a string, remove HTML tags and escape the string for safe use by MySQL.
 *
 * This would be useful for cleaning user inputs received from forms.
 * TODO: What to do if this function does not receive an input
 *
 * @param  string $input String to be cleaned.
 * @return string        String which has been cleaned.
 * @access public
 */
function cleanUserInput($input)
{
	if (isset($input))
	{
		return mysql_escape_string(strip_tags(trim($input)));
	}
}

/**
 * Display a nicely formatted error message.
 *
 * The message is enclosed in a frame with a title, in red font color. This will facilitate consistency of all error messages.
 * Include the CSS below in the target page to get nicely rounded corners in firefox
 * <style type="text/css">
	   fieldset{
	   -moz-border-radius: 8px;
	   border-radius: px;
	   font: normal small Arial, Helvetica, sans-serif;
	   }
	</style>

 * TODO: Use divs instead of tables
 * TODO: Add a exclamation icon next to the message
 *
 * @param  string $title 	Title or caption of the error message.
 * @param  string $message 	Actual error message.
 * @return string        	Error message enclosed in a table and a fieldset.
 * @access public
 */
function printErrorMessage($title, $message)
{
	if (isset($title) && isset($message))
	{
		echo '
			<table>
				<tr>
					<td>
						<fieldset style="color:Red;">
							<legend><strong>'.$title.'</strong></legend>
							'.$message.'
						</fieldset>
					</td>
				</tr>
			</table>
		';
	}
}

/**
 * Display a nicely formatted success message.
 *
 * The message is enclosed in a frame with a title, in blue font color. This will facilitate consistency of all error messages.
 * Include the CSS below in the target page to get nicely rounded corners in firefox
 * <style type="text/css">
	   fieldset{
	   -moz-border-radius: 8px;
	   border-radius: px;
	   font: normal small Arial, Helvetica, sans-serif;
	   }
	</style>

 * TODO: Use divs instead of tables
 * TODO: Add a confirmation icon next to the message
 *
 * @param  string $title 	Title or caption of the success message.
 * @param  string $message 	Actual success message.
 * @return string        	Success message enclosed in a table and a fieldset.
 * @access public
 */
function printSuccessMessage($title, $message)
{
	if (isset($title) && isset($message))
	{
		echo '
			<table>
				<tr>
					<td>
						<fieldset style="color:Blue;">
							<legend><strong>'.$title.'</strong></legend>
							'.$message.'
						</fieldset>
					</td>
				</tr>
			</table>
		';
	}
}

////////////////////////////////////////////////////////////////////////////////
//                              DATABASE FUNCTIONS                            //
////////////////////////////////////////////////////////////////////////////////

/**
 * This function prints a simple table based on the results returned by MySQL
 *
 * Using the $parameters variable, you can customize the table by passing it width, height, class, id etc
 *
 * @param 	string $sql 				The sql statement to be executed
 * @param  	string $dbConnectionFile 	File used to connect to the database.
 * @param  	string $parameters		 	Parameters to be passed to the <table> opening tag.
 * @return 	string $tableHtml	  		Complete HTML to create the table
 * @access 	public
*/
function sqlToTable($sql, $dbConnectionFile, $parameters)
{
	require("$dbConnectionFile");
	$tableHtml='';

	$result=mysql_query($sql);
	if (!$result) {
		//error executing query
		printErrorMessage('Database Error','Error creating table. Function: sqlToTable(). MySQL said: '.mysql_error());
		return $tableHtml;
	}

	$numberOfColumns=mysql_num_fields($result);

		//layout the table header
	$tableHtml = "<table $parameters><thead><tr >";

	for ($i=0; $i<$numberOfColumns; $i++)
	{
		$tableHtml .= "<th >".mysql_field_name($result, $i)."</th>";
	}
	$tableHtml .= "</tr></thead>";	//end table header

	//layout table body
	$tableHtml .= '<tbody>';
	while ($row=mysql_fetch_row($result))
	{
		$tableHtml .= "<tr>";
		for ($i=0; $i<$numberOfColumns; $i++)
		{
			$tableHtml .= "<td>";

			//replace Null values with a dash
			$tableHtml .= !isset($row[$i]) ? "-" : $row[$i];

			$tableHtml .= "</td>";
		}
		$tableHtml .= "</tr>";
	}
	$tableHtml .= "</tbody></table>";

	return $tableHtml;
}

/**
 * This function will retrieve a single value from a table using the provided sql statement.
 *
 * The query must return one column, but using MySQL's inbuilt functions such as CONCAT(), that column can have more than one value
 *
 * @param 	string $selectName	Name of the select element
 * @param  	string $selectId	Id of the select element
 * @param 	string $start		The minimum number
 * @param 	string $end			The maximum number
 * @param  	string $parameters	Parameters to be passed to the <select> opening tag, e.g. class, inline javascript etc
 * @param 	string $default		The value that will be selected by default
 * @return 	string 				Complete HTML to create the select box
 * @access 	public
*/
function getScalarValue($sql, $dbConnectionFile)
{
    if (isset ($sql) ) {
        require("$dbConnectionFile");

		$result=mysql_query($sql);
		if ($result) {
			$row_data=mysql_fetch_row($result);
            return $row_data[0];
		}
		else {
			return false;
		}
    }
    else {
		return false;
	}
}

/**
 * Display HTML select element based on an SQL query.
 *
 * @param  string $sql	 				The SQL statement.
 * @param  string $idColumn				The table column with the id. This will be used as the value in <option value=$idColumn /> if $useIdColumnAsValue is set to 1
 * @param  string $nameColumn			The table columns with the name. This will be used in the <option>$nameColumn</option>. This will be used as the value in <option value=$nameColumn /> if $useIdColumnAsValue is set to 0
 * @param  string $selectId 			ID of the select element.
 * @param  string $selectName 			Name of the select element.
 * @param  string $defaultValue			The element that will be selected by default.
 * @param  string $dbConnectionFile 	File used to connect to the database.
 * @param  string $useIdColumnAsValue 	If this is set to 1, <option value=$idColumn />, if set to 0, <option value=$nameColumn />.
 * @param  string $otherParameters 		A string with other parameters that might be needed in the <select $parameters /> e.g. inline javascript, CSS styles etc.
 * @return string        				Complete HTML to create the select element.
 * @access public
 */
function printSelectFromSql($sql, $idColumn, $nameColumn, $selectId, $selectName, $defaultValue, $dbConnectionFile, $useIdColumnAsValue, $otherParameters)
{
	//depending on how one has setup database access, the line below might not be necessary
	require("$dbConnectionFile");

	//if one is paranoid, they could escape the $sql variable thus
	//$sql=mysql_escape_string($sql);
	$sql=$sql;

	$result=mysql_query($sql);
	if ($result)
	{
		echo "
			<select name=\"$selectName\" id=\"$selectId\" $otherParameters>
			<option> </option>
		";
		while ($row=mysql_fetch_array($result))
		{
			//check if the user has specified if the id column be used as the value in the option
			$value = $useIdColumnAsValue==1 ? $row["$idColumn"] : $row["$nameColumn"];

			//check for default value
			$defaultSelected = ($row["$idColumn"]==$defaultValue || $row["$nameColumn"]==$defaultValue) ? 'selected="selected"' : '';

			echo "<option $defaultSelected value=\"$value\">".$row["$nameColumn"]."</option>";
		}
		echo '</select>';
	}
	else
	{
		//print out an error message using one of the funtions in this file
		printErrorMessage('Database Error','Unable to read the contents of specified table, MySQL said: '.mysql_error());
	}
}

/**
 * Execute the provided SQL statement and store the result values in a variable separating the values using a comma and a space for example: 1, 2, 3, 4, 5
 *
 * This might be useful for using in a NOT IN() clause in a query
 * NOTE: The sql statement must have a column called or aliased to name as thats the one which will be used to retrieve the values
 *
 * @param 	string $sql 				The sql statement to be executed
 * @param  	string $dbConnectionFile 	File used to connect to the database.
 * @return 	string $variable_csv  		Variable containing the results of the sql statement, separated by commas, or an empty string if none
 * @access 	public
*/
function putSqlResultInVariableCsv($sql, $dbConnectionFile)
{
	//depending on how one has setup database access, the line below might not be necessary
	require("$dbConnectionFile");

	$variableCsv='';
	$counter = 0; //this variable is used to remember the current number inside a loop

	if (strlen(trim($sql))==0) {
		$variableCsv='';
		return $variableCsv;
	}

	$result=mysql_query($sql);

	if (!$result) {
		//error executing query
		$variableCsv='';
		return $variableCsv;
	}

	if (mysql_num_rows($result)<1) {
		//no data found in the table
		$variableCsv='';
		return $variableCsv;
	}

	while ($row = mysql_fetch_array($result)) {
		//if its the first value, put it as e.g. 1 if its not the first, put: , 2
		$variableCsv .= $counter==0 ? $row['name'] : ', '.$row['name'];
		$counter++;
	}

	return $variableCsv;
}

////////////////////////////////////////////////////////////////////////////////
//                              EMAIL FUNCTIONS                               //
////////////////////////////////////////////////////////////////////////////////

/**
 * Check the validity of an email address using a regular expression match
 *
 * @param 	string $emailAddress	The email address to be checked
 * @return 	boolean   				The function returns true if the email address is valid, false if otherwise
 * @access 	public
*/
function validEmailAddressPreg($emailAddress)
{
	return (!preg_match("/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix", $emailAddress)) ? FALSE : TRUE;
}

/**
 * Check the validity of an email address using a case insensitive regular expression match
 *
 * @param 	string $emailAddress	The email address to be checked
 * @return 	boolean   				The function returns true if the email address is valid, false if otherwise
 * @access 	public
*/
function validEmailAddressEregi($emailAddress)
{
	return (!eregi("^[A-Z0-9._%-]+@[A-Z0-9._%-]+\.[A-Z]{2,4}$", $emailAddress)) ? FALSE : TRUE;
}

/**
 * Format the subject line of an email nicely
 *
 * Make the first character uppercase, remove leading and trailing spaces and remove HTML tags
 *
 * @param 	string $subject	The subject line to be formatted
 * @return 	string $subject The subject line which has been nicely formatted
 * @access 	public
*/
function prepareSubjectLine($subject)
{
	return strip_tags(trim(ucfirst($subject)));
}

/**
 * Format the body content of an email nicely
 *
 * Properly place line breaks, make sure maximum line length is 70 characters
 *
 * @param 	string $message	The email body content to be formatted
 * @return 	string $message The email body content which has been nicely formatted
 * @access 	public
*/
function prepareEmailBody($message)
{
	if (strlen($message)>0) {
		$message = (trim($message));

		// Make the linebreaks consistent
		$message = str_replace("\r\n", "\n", $message);
		$message = str_replace("\r", "\n", $message);
		$message = str_replace("\n", "\r\n", $message);

		//Ensure line lenghts are at a constant 70 characters
		$message = wordwrap($message, 70);

		return $message;
	}
	else {
		return false;
	}
}

/**
 * Prepare the email headers with sender, recipient, cc and bcc details
 *
 * Properly place line breaks, make sure maximum line length is 70 characters
 *
 * @param 	string $message	The email body content to be formatted
 * @return 	string $message The email body content which has been nicely formatted
 * @access 	public
*/
function prepareHeaders($fromName, $fromEmail, $toName, $toEmail, $cc, $bcc)
{
	if (isset($fromEmail) && isset($toEmail)) {
		// To send HTML mail, the Content-type header must be set
		$headers  = 'MIME-Version: 1.0' . "\r\n";
		$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

		// Additional headers
		$headers .= "From: $fromName <$fromEmail>" . "\r\n";
		$headers .= "To: $toName <$toEmail>" . "\r\n";
		$headers .= "Reply-To: $fromEmail" . "\r\n";

		//Only add the cc and bcc headers if they were received
		if (isset($cc)) {
			$headers .= "cc: $cc" . "\r\n";
		}
		if (isset($bcc)) {
			$headers .= "bcc: $bcc" . "\r\n";
		}

		return $headers;
	}
	else {
		return false;
	}
}


////////////////////////////////////////////////////////////////////////////////
//                          DATE AND TIME FUNCTIONS                           //
////////////////////////////////////////////////////////////////////////////////

/**
 * Print two select boxes for selecting time in 24 hour format
 *
 * Values less than 10 are padded with 0, for example, 9:30 is shown as 09:30. The first select name is appended _hour
 * For example, if the $selectName provided is "start_time", the actual name output is "start_time_hour"
 * The same applies to the minute select, where the actual name output will be "start_time_minute"
 *
 * @param 	string $selectName 			Name of the select elements
 * @param  	string $selectId 			Id's of the select elements
 * @param  	string $parametersHour		Parameters to be passed to the hour <select> opening tag.
 * @param  	string $parametersMinute	Parameters to be passed to the minute <select> opening tag.
 * @return 	string 				  		Complete HTML to create the two select boxes
 * @access 	public
*/
function printTimeSelector24hrs($selectName, $selectId, $parametersHour, $parametersMinute)
{
	echo "<select name='{$selectName}_hour' id='{$selectId}_hour' $parametersHour />";
	for ($i=0; $i<24; $i++){
		$iPadded = $i<10 ? "0$i" : $i;
		echo "<option >$iPadded</option>";
	}
	echo '</select>';
	echo "<select name='{$selectName}_minute' id='{$selectId}_minute' $parametersMinute />";
	for ($i=0; $i<60; $i++){
		$iPadded = $i<10 ? "0$i" : $i;
		echo "<option >$iPadded</option>";
	}
	echo '</select>';
}

/**
 * Print three select boxes for selecting time in 12 hour format
 *
 * Values less than 10 are padded with 0, for example, 9:30 is shown as 09:30. The first select name is appended _hour
 * For example, if the $selectName provided is "start_time", the actual name output is "start_time_hour"
 * The same applies to the minute select, where the actual name output will be "start_time_minute"
 *
 * @param 	string $selectName 			Name of the select elements
 * @param  	string $selectId 			Id's of the select elements
 * @param  	string $parametersHour		Parameters to be passed to the hour <select> opening tag.
 * @param  	string $parametersMinute	Parameters to be passed to the minute <select> opening tag.
 * @param  	string $parametersAmPm		Parameters to be passed to the AM/PM <select> opening tag.
 * @return 	string 				  		Complete HTML to create the two select boxes
 * @access 	public
*/
function printTimeSelector12hrs($selectName, $selectId, $parametersHour, $parametersMinute, $parametersAmPm)
{
	echo "<select name='{$selectName}_hour' id='{$selectId}_hour' $parametersHour ><option ></option >";
	for ($i=1; $i<13; $i++){
		$iPadded = $i<10 ? "0$i" : $i;
		echo "<option >$iPadded</option>";
	}
	echo '</select>';
	echo "<select name='{$selectName}_minute' id='{$selectId}_minute' $parametersMinute ><option ></option >";
	for ($i=0; $i<60; $i++){
		$iPadded = $i<10 ? "0$i" : $i;
		echo "<option >$iPadded</option>";
	}
	echo '</select>';
	echo "<select name='{$selectName}_ampm' id='{$selectId}_ampm' $parametersAmPm ><option ></option ><option>AM</option><option>PM</option></select>";

}

function dateSubtract($date, $hourSubtract, $minuteSubtract, $secondSubtract, $monthSubtract, $daySubtract, $yearSubtract, $returnedDateFormat)
{
	$base_day_timestamp = strtotime($date);
	
	$second = date('s',$base_day_timestamp);
	$minute = date('i',$base_day_timestamp);
	$hour = date('G',$base_day_timestamp);
	$day = date('j',$base_day_timestamp);
	$month = date('n',$base_day_timestamp);
	$year = date('Y',$base_day_timestamp);
	
	$hour = $hour - $hourSubtract;
	$minute = $minute - $minuteSubtract;
	$second = $second - $secondSubtract;
	
	$month = $month - $monthSubtract;
	$day = $day - $daySubtract;
	$year = $year - $yearSubtract;
	
	$subtractedDateTimestamp = mktime($hour, $minute, $second, $month, $day, $year);
	$subtractedDate = date("$returnedDateFormat",$subtractedDateTimestamp);
	
	return $subtractedDate;
}

/**
 * This function will print a generic select element with a series of numbers
 *
 * This might be useful for choosing, for example, age.
 * TODO: Include a step number so that the select can show numbers e.g 5, 10, 15 instead of sequential numbers like 1,2,3,4,5,6 etc
 *
 * @param 	string $selectName	Name of the select element
 * @param  	string $selectId	Id of the select element
 * @param 	string $start		The minimum number
 * @param 	string $end			The maximum number
 * @param  	string $parameters	Parameters to be passed to the <select> opening tag, e.g. class, inline javascript etc
 * @param 	string $default		The value that will be selected by default
 * @return 	string 				Complete HTML to create the select box
 * @access 	public
*/
function printNumbersSelect($selectName, $selectId, $start, $end, $parameters, $default)
{
	echo "
	<select name='$selectName' id='$selectId' $parameters/>
	<option value=''></option>
	";

	for ($i=$start; $i<=$end; $i++)
	{
		if ($default==$i) {
			echo "<option selected value='$i' />$i</option>";
		}
		else {
			echo "<option value='$i' />$i</option>";
		}
	}

	echo '</select>';
}

function print_error_message_modified_with_pic($title,$message)
{
	if (isset($title) && isset($message))
	{
		echo "
			<fieldset>
				<legend><font color=Red style=\"font-size:11px\"><b>$title</b></font></legend>
				<table>
					<tr>
						<td valign=center><img src='img/warning.png' alt='error'/></td>
						<td valign=center>
						<font color=Red style=\"font-size:11px\">$message</font>
						</td>
					</tr>
				</table>
			</fieldset>
		";
	}
}

function print_success_message_modified_with_pic($title,$message)
{
	if (isset($title) && isset($message))
	{
		echo "
			<fieldset>
				<legend><font color=Blue style=\"font-size:11px\"><b>$title</b></font></legend>
				<table>
					<tr>
						<td valign=center><img src='img/info.png' alt='success'/></td>
						<td valign=center>
						<font color=Blue style=\"font-size:11px\">$message</font>
						</td>
					</tr>
				</table>
			</fieldset>
		";
	}
}

function print_combobox_from_sql($sql,$id_column,$name_column,$combo_id,$combo_name,$default_value,$combo_class)
{
	require('db_conn.php');

	$combo_sql=$sql;
	//echo "Combo SQL: $combo_sql";
	if ($combo_result=mysql_query($combo_sql))
	{
		echo "
			<select name=\"$combo_name\" id=\"$combo_id\" class=\"$combo_class\">
			<option> </option>
		";
		while ($row=mysql_fetch_array($combo_result))
		{//check for default value
			if	($row["$id_column"]==$default_value || $row["$name_column"]==$default_value)
			{//default
				echo "<option selected=\"selected\" value=\"".$row["$id_column"]."\">".$row["$name_column"]."</option>";
			}
			else//not default
			{
				echo "<option value=\"".$row["$id_column"]."\">".$row["$name_column"]."</option>";
			}
		}
		echo '</select>';
	}
	else
	{
		print_error_message_modified_with_pic('Database Error','Unable to read the contents of specified table, MySQL said: ');
	}
}

function print_combobox_from_table($table_name,$id_column,$name_column,$combo_id,$combo_name,$default_value,$combo_class)
{
	require('db_conn.php');

	$combo_sql="SELECT x.$id_column,x.$name_column FROM $table_name x ORDER BY x.$name_column";
    $combo_result=mysql_query($combo_sql);
	if ($combo_result)
	{
		echo "
			<select name=\"$combo_name\" id=\"$combo_id\" class=\"$combo_class\">
			<option> </option>
		";

		while ($row=mysql_fetch_array($combo_result))
		{
				//check for default value
			if ($row["$id_column"]==$default_value || $row["$name_column"]==$default_value)
			{
					//default
				echo "<option selected=\"selected\" value=\"".$row["$id_column"]."\">".$row["$name_column"]."</option>";
			}
			else
			{
					//not default
				echo "<option value=\"".$row["$id_column"]."\">".$row["$name_column"]."</option>";
			}
		}

		echo '</select>';
	}
	else
	{
		print_error_message('Database Error','Unable to read the contents of specified table, MySQL said: '.mysql_error());
	}
}

function print_combobox_from_table_distinct($table_name,$id_column,$name_column,$combo_id,$combo_name,$default_value,$combo_class)
{
	require('db_conn.php');

	$combo_sql="SELECT DISTINCT x.$name_column, x.$id_column FROM $table_name x ORDER BY x.$name_column";

    $combo_result=mysql_query($combo_sql);
	if ($combo_result)
	{
		echo "
			<select name=\"$combo_name\" id=\"$combo_id\" class=\"$combo_class\">
			<option> </option>
		";
		while ($row=mysql_fetch_array($combo_result))
		{
				//check for default value
			if ($row["$id_column"]==$default_value || $row["$name_column"]==$default_value)
			{
					//default	selected="selected"
				echo "<option selected=\"selected\" value=\"".$row["$id_column"]."\">".$row["$name_column"]."</option>";
			}
			else
			{
					//not default
				echo "<option value=\"".$row["$id_column"]."\">".$row["$name_column"]."</option>";
			}
		}
		echo '</select>';
	}
	else
	{
		print_error_message('Database Error','Unable to read the contents of specified table, MySQL said: '.mysql_error());
	}
}

function print_combobox_from_table_distinct_with_parameters($table_name,$id_column,$name_column,$combo_id,$combo_name,$default_value,$parameters,$first_item)
{
	require('db_conn.php');
    $parameters = strlen(trim($parameters))>0 ? $parameters : '';
    $first_item = strlen(trim($first_item))>0 ? $first_item : '';

	$combo_sql="SELECT DISTINCT x.$name_column, x.$id_column FROM $table_name x ORDER BY x.$name_column";

    $combo_result=mysql_query($combo_sql);
	if ($combo_result)
	{
        if (strlen($first_item)>0) {
            echo "
                <select name=\"$combo_name\" id=\"$combo_id\" $parameters>
                <option>--$first_item--</option>
            ";
        }
        else {
            echo "
                <select name=\"$combo_name\" id=\"$combo_id\" $parameters>
                <option></option>
            ";
        }

		while ($row=mysql_fetch_array($combo_result))
		{
				//check for default value
			if ($row["$id_column"]==$default_value || $row["$name_column"]==$default_value)
			{
					//default	selected="selected"
				echo "<option selected=\"selected\" value=\"".$row["$id_column"]."\">".$row["$name_column"]."</option>";
			}
			else
			{
					//not default
				echo "<option value=\"".$row["$id_column"]."\">".$row["$name_column"]."</option>";
			}
		}
		echo '</select>';
	}
	else
	{
		print_error_message('Database Error','Unable to read the contents of specified table, MySQL said: '.mysql_error());
	}
}

function print_combobox_from_table_distinct_with_condition($table_name,$id_column,$name_column,$combo_id,$combo_name,$default_value,$combo_class,$condition)
{
	require('db_conn.php');
	$condition = trim($condition);
	$combo_sql="SELECT DISTINCT x.$name_column, x.$id_column FROM $table_name x $condition ORDER BY x.$name_column";

    $combo_result=mysql_query($combo_sql);
	if ($combo_result)
	{
		echo "
			<select name=\"$combo_name\" id=\"$combo_id\" class=\"$combo_class\">
			<option> </option>
		";

		while ($row=mysql_fetch_array($combo_result))
		{
				//check for default value
			if ($row["$id_column"]==$default_value || $row["$name_column"]==$default_value)
			{
					//default	selected="selected"
				echo "<option selected=\"selected\" value=\"".$row["$id_column"]."\">".$row["$name_column"]."</option>";
			}
			else
			{
					//not default
				echo "<option value=\"".$row["$id_column"]."\">".$row["$name_column"]."</option>";
			}
		}

		echo '</select>';
	}
	else
	{
		print_error_message('Database Error','Unable to read the contents of specified table, MySQL said: '.mysql_error());
	}
}

function print_combobox_from_table_distinct_with_condition_parameters_first_item($table_name,$id_column,$name_column,$combo_id,$combo_name,$default_value,$combo_class,$condition,$parameters,$first_item)
{
	require('db_conn.php');
	$condition = trim($condition);
	$combo_sql="SELECT DISTINCT x.$name_column, x.$id_column FROM $table_name x $condition ORDER BY x.$name_column";

    $combo_result=mysql_query($combo_sql);
	if ($combo_result)
	{
        if (strlen($first_item)>0) {
            echo "
                <select name=\"$combo_name\" id=\"$combo_id\" class=\"$combo_class\" $parameters>
                <option>--$first_item--</option>
            ";
        }
        else{
            echo "
                <select name=\"$combo_name\" id=\"$combo_id\" class=\"$combo_class\" $parameters>
                <option></option>
            ";
        }

		while ($row=mysql_fetch_array($combo_result))
		{
				//check for default value
			if ($row["$id_column"]==$default_value || $row["$name_column"]==$default_value)
			{
					//default	selected="selected"
				echo "<option selected=\"selected\" value=\"".$row["$id_column"]."\">".$row["$name_column"]."</option>";
			}
			else
			{
					//not default
				echo "<option value=\"".$row["$id_column"]."\">".$row["$name_column"]."</option>";
			}
		}

		echo '</select>';
	}
	else
	{
		print_error_message('Database Error','Unable to read the contents of specified table, MySQL said: '.mysql_error());
	}
}

function print_jquery_error_message($title, $message){
	echo '
	<div class="ui-widget">
		<div class="ui-state-error ui-corner-all" style="padding: 0pt 0.7em;">
			<p><span class="ui-icon ui-icon-alert" style="float: left; margin-right: 0.3em;"></span>
			<strong>'.$title.':</strong> '.$message.'</p>
		</div>
	</div>
	';
}