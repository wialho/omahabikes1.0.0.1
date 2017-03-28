<?php
namespace ApiReddit;

require_once './vendor/autoload.php';

use ApiReddit\Authenticator;

$authorizeUrl = 'https://ssl.reddit.com/api/v1/authorize';
$accessTokenUrl = 'https://ssl.reddit.com/api/v1/access_token';
$clientId = 'Your Client Id';
$clientSecret = 'Your Secret';
$userAgent = 'RedditApiClient/0.1 by YourName';

$redirectUrl =  "Your redirect url";

$auth = new Authenticator( $authorizeUrl, $accessTokenUrl, $clientId, $clientSecret, $userAgent, $redirectUrl );
$auth->authenticate();

?>
