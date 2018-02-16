<?php
include_once('includes/db_conn.php');

$email = 'info@e-kodi.com';
$name = 'e-Kodi Administrator';

$result_tender = mysql_query("select company_name, email_address, report_type, comments from support_logs order by id desc limit 1");
while ($row = mysql_fetch_array($result_tender))
{
	$company_name = $row['company_name'];
	$email_address = $row['email_address'];
	$report_type = $row['report_type'];
	$comments = $row['comments'];
}

if($report_type==1){
	$report_type_name = 'General Queries or Comments';
}
elseif($report_type==2){
	$report_type_name = 'Unable to Login';
}
elseif($report_type==3){
	$report_type_name = 'Need to know more about e-Kodi';
}
else{
	$report_type_name = 'Complaint';
}

$mailto = 'support@e-kodi.com' ;
$subject = "[e-Kodi Property Manager] Support Logs" ;
$formurl = "customer_support.php" ;
$thankyouurl = "confirmation.php" ;


$uself = 0;
$use_envsender = 0;
$use_sendmailfrom = 0;
$use_webmaster_email_for_from = 0;
$use_utf8 = 1;
$my_recaptcha_private_key = '' ;

// -------------------- END OF CONFIGURABLE SECTION ---------------

$headersep = (!isset( $uself ) || ($uself == 0)) ? "\r\n" : "\n" ;
$content_type = (!isset( $use_utf8 ) || ($use_utf8 == 0)) ? 'Content-Type: text/plain; charset="iso-8859-1"' : 'Content-Type: text/plain; charset="utf-8"' ;
if (!isset( $use_envsender )) { $use_envsender = 0 ; }
if (isset( $use_sendmailfrom ) && $use_sendmailfrom) {
	ini_set( 'sendmail_from', $mailto );
}
$envsender = "-f$mailto" ;
$http_referrer = getenv( "HTTP_REFERER" );

if ( preg_match( "/[\r\n]/", $fullname ) || preg_match( "/[\r\n]/", $email ) ) {
	header( "Location: $errorurl" );
	exit ;
}
if (strlen( $my_recaptcha_private_key )) {
	require_once( 'recaptchalib.php' );
	$resp = recaptcha_check_answer ( $my_recaptcha_private_key, $_SERVER['REMOTE_ADDR'], $_POST['recaptcha_challenge_field'], $_POST['recaptcha_response_field'] );
	if (!$resp->is_valid) {
		header( "Location: $errorurl" );
		exit ;
	}
}
if (empty($email)) {
	$email = $mailto ;
}
$fromemail = (!isset( $use_webmaster_email_for_from ) || ($use_webmaster_email_for_from == 0)) ? $email : $mailto ;

if (function_exists( 'get_magic_quotes_gpc' ) && get_magic_quotes_gpc()) {
	$comments = stripslashes( $comments );
}

$messageproper =
	"Hello $name, \n" .
	"\n" .
	"The following user has sent in their support issue:\n" .
	"User's name: $company_name\n" .
	"Email Address: $email_address\n" .
	"Report Type: $report_type_name\n" .
	"Comments: $comments\n" .
	"\n" .
	"Best Regards, \n" .
	"---\n" .
	"e-Kodi.com\n" .
	"Client Services Team\n" .
	"\n\n------------------------------------------------------------\n" ;
 
$headers =
	"From: \"$name\" <$fromemail>" . $headersep . "Reply-To: \"$name\" <$email>" . $headersep . "X-Mailer: chfeedback.php 2.15.0" .
	$headersep . 'MIME-Version: 1.0' . $headersep . $content_type ;

if ($use_envsender) {
	mail($mailto, $subject, $messageproper, $headers, $envsender );
}
else {
	mail($mailto, $subject, $messageproper, $headers );
}
header( "Location: $thankyouurl" );
exit ;
?>
