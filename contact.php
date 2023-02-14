<?
/*
    CHFEEDBACK.PHP Feedback Form PHP Script Ver 2.03
   

*/

$mailto = 'ceabunt@gmail.com' ;


$subject = "Contact Form" ;


$formurl = "https://charliebunt.github.io/toybox/contact.html" ;
$errorurl = "https://charliebunt.github.io/toybox/error.html" ;
$thankyouurl = "https://charliebunt.github.io/toybox/thanks.html" ;


$name = $_POST['name'] ;
$email = $_POST['email'] ;
$comments = $_POST['comments'] ;
$http_referrer = getenv( "HTTP_REFERER" );

if (!isset($_POST['email'])) {
	header( "Location: $formurl" );
	exit ;
}
if (empty($name) || empty($email) || empty($comments)) {
   header( "Location: $errorurl" );
   exit ;
}
if (get_magic_quotes_gpc()) {
	$comments = stripslashes( $comments );
}

$messageproper =

	"This message was sent from:\n" .
	"$http_referrer\n" .
	"------------------------- COMMENTS -------------------------\n\n" .
	$comments .
	"\n\n------------------------------------------------------------\n" ;

mail($mailto, $subject, $messageproper, "From: \"$name\" <$email>\nReply-To: \"$name\" <$email>\nX-Mailer: chfeedback.php 2.03" );
header( "Location: $thankyouurl" );
exit ;

?>
