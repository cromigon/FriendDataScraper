<?php

# arvin castro, arvin@sudocode.net
# http://sudocode.net/article/368/how-to-get-the-access-token-for-a-facebook-application-in-php
# February 7, 2011

session_name('facebookoauth');
session_start();

$client_id     = '156435901112829'; # the application ID
$client_secret = '04aab90eb749f132b8158f5a8685f5dd';
$callbackURL   = 'http://localhost/fb/FriendDataAnalyzer/api_test/index.php'; # The URL of this script when you place it on your server, so that facebook will know where to redirect the user back
$extendedPermissions = 'user_likes'; # see http://developers.facebook.com/docs/authentication/permissions

require_once '../xhttp.php';

if(isset($_GET['logout']) and $_SESSION['loggedin']) {
	$_SESSION = array();
	session_destroy();
}

if(isset($_GET['signin'])) {

	# STEP 1: Redirect user to Facebook, to grant permission for our application
	$url = 'https://graph.facebook.com/oauth/authorize?' . xhttp::toQueryString(array(
		'client_id'    => $client_id,
		'redirect_uri' => $callbackURL,
		'scope'        => $extendedPermissions,
	));
	header("Location: $url", true, 303);
	die();
}

if(isset($_GET['code'])) {

	# STEP 2: Exchange the code that we have for an access token
	$data = array();
	$data['get'] = array(
		'client_id'     => $client_id,
		'client_secret' => $client_secret,
		'code'		    => $_GET['code'],
		'redirect_uri'  => $callbackURL,
		);

	$response = xhttp::fetch('https://graph.facebook.com/oauth/access_token', $data);

	if($response['successful']) {

		$data = xhttp::toQueryArray($response['body']);
		$_SESSION['access_token'] = $data['access_token'];
		$_SESSION['loggedin']     = true;

	} else {
		print_r($response['body']);
	}
}

if(isset($_GET['error']) and isset($_GET['error_reason']) and isset($_GET['error_description'])) {
	# error_reason: user_denied
	# error: access_denied
	# error_description: The user denied your request.
}

if($_SESSION['loggedin']) {

	# Get access tokens of user's news feed, and his/her pages
	$data = array();
	$data['get'] = array(
		'access_token'  => $_SESSION['access_token'],
		'fields' => 'id,name,accounts'
		);
	$response = xhttp::fetch('https://graph.facebook.com/me', $data);

	if($response['successful']) {

		$_SESSION['user'] = json_decode($response['body'], true);
		$_SESSION['user']['access_token'] = $_SESSION['access_token'];

		echo ''; ?>
<html><body><style type="text/css">
input {
	width:70%;
	padding:10px;
	font-size:15px;
	background:#eee;
	border:1px solid #333;
}
</style>
<p><a href="?logout">Log out</a></p>
<p>
	<h3><?php echo $_SESSION['user']['name'] ?> (User)</h3>
	<input value="<?php echo htmlspecialchars($_SESSION['user']['id']) ?>" />
	<input value="<?php echo htmlspecialchars($_SESSION['user']['access_token']) ?>" />
</p>
<?php foreach((array) $_SESSION['user']['accounts']['data'] as $profile) { ?>
<p>
	<h3><?php echo $profile['name'] ?> (<?php echo $profile['category'] ?>)</h3>
	<input value="<?php echo htmlspecialchars($profile['id']) ?>" />
	<input value="<?php echo htmlspecialchars($profile['access_token']) ?>" />
</p>
<?php } ?></body></html>

<?php } else {
		header('content-type: text/plain');
		print_r($response['body']);
	}

} else {
	echo '<html><body><a href="?signin">Sign in with Facebook</a></body></html>';
}

?>