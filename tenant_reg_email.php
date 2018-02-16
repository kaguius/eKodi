<?php
include_once('includes/db_conn.php');

if (!empty($_GET)){	
	$tenant_id = $_GET['tenant_id'];
	$creds = $_GET['creds'];
} 

$email = 'info@e-kodi.com';
$name = 'e-Kodi Administrator';

$result_tender = mysql_query("select (property_details.email_address)owner_email, property_details.property_name, tenant_name, tenants.email_address from tenants inner join property_details on property_details.id = tenants.property_listing where tenants.id = '$tenant_id'");
while ($row = mysql_fetch_array($result_tender))
{
	$property_name = $row['property_name'];
	$tenant_name = $row['tenant_name'];
	$owner_email = $row['owner_email'];
	$email_address = $row['email_address'];
}

$string = substr($property_name, 0, 2);
if($string == 'ZA'){
	$property_name = 'Zawadi Apartments';
}
else{
	$property_name = $property_name;
}

$mailto = $email_address ;
$subject = "[e-kodi Property Management System] Your Login Credentials" ;
$formurl = "add_tenant.php" ;
$thankyouurl = "property_listings.php" ;

echo $thankyouurl;
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
	"Hi $tenant_name, \n" .
	"\n" .
	"Welcome to $property_name Properties and welcome to e-Kodi, the revolutionary new online Property Management System. " .
	"To access the system, log on to http://www.e-kodi.com\n" .
	"\n" .
	"Username: $email_address\n" .
	"Password: $creds\n" .
	"\n" .
	"Best Regards, \n" .
	"---\n" .
	"e-Kodi.com\n" .
	"Client Services Team\n" .
	"\n\n------------------------------------------------------------\n" ;

//echo $messageproper;

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
