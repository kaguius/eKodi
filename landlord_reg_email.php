<?php
include_once('includes/db_conn.php');

if (!empty($_GET)){	
	$tenant_id = $_GET['tenant_id'];
} 


$email = 'info@e-kodi.com';
$name = 'e-Kodi Administrator';

$result = mysql_query("select property_owner, (property_details.email_address)owner_email, property_details.property_name, tenant_name, tenants.email_address, tenants.phone_number, property_item.location, property_item.floor from tenants inner join property_details on property_details.id = tenants.property_listing inner join property_item on property_item.id = tenants.property_block where tenants.id = '$tenant_id'");
while ($row = mysql_fetch_array($result))
{
	$property_owner = $row['property_owner'];
	$property_name = $row['property_name'];
	$tenant_name = $row['tenant_name'];
	$owner_email = $row['owner_email'];
	$email_address = $row['email_address'];
	$phone_number = $row['phone_number'];
	$location = $row['location'];
	$floor = $row['floor'];
}

$mailto = "$owner_address" ;
$subject = "[e-kodi Property Manager] New Tenant Details for $location, floor: $floor" ;
$formurl = "tenant_reg_email.php" ;
$thankyouurl = "property_listings.php" ;

//echo $subject.'<br />';

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
	"Dear $property_owner, \n" .
	"\n" .
	"The following property; $property_name, unit details: $location, $floor has just been occupied by the following tenant, his/ her details are:\n" .
	"\n" .
	"Tenant Name: $tenant_name\n" .
	"Email Address: $email_address\n" .
	"Phone Number: $phone_number\n" .
	"\n" .
	"Best Regards,\n" .
	"---\n" .
	"e-Kodi.com\n" .
	"Client Services Team\n" .
	"\n\n------------------------------------------------------------\n" ;

echo $messageproper;
//$headers =
	//"From: \"$name\" <$fromemail>" . $headersep . "Reply-To: \"$name\" <$email>" . $headersep . "X-Mailer: chfeedback.php 2.15.0" .
	//$headersep . 'MIME-Version: 1.0' . $headersep ;

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
