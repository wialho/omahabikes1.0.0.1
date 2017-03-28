<?php

namespace ApiReddit;

class Authenticator
{

    public function __construct($authorizeUrl, $accessTokenUrl, $clientId, $clientSecret, $userAgent, $redirectUrl)
    {

        $this->authorizeUrl   = $authorizeUrl;
        $this->accessTokenUrl = $accessTokenUrl;
        $this->clientId       = $clientId;
        $this->clientSecret   = $clientSecret;
        $this->userAgent      = $userAgent;
        $this->redirectUrl    = $redirectUrl;
    }

    public function authenticate()
    {

        $client = new \OAuth2\Client($this->clientId, $this->clientSecret, \OAuth2\Client::AUTH_TYPE_AUTHORIZATION_BASIC);
        $client->setCurlOption(CURLOPT_USERAGENT, $this->userAgent);

        if (!isset($_GET["code"])) {
            $authUrl = $client->getAuthenticationUrl($this->authorizeUrl, $this->redirectUrl, array(
                "scope" => "identity",
                "state" => "SomeUnguessableValue"
            ));
            header("Location: " . $authUrl);
            die("Redirect");
        } else {
            $this->getUserPreferences($client, $this->accessTokenUrl);
        }
    }
    
    /**
* This function will request the Reddit API for the user information
*
* @param $client The client ID
* @param $accessToken The access token given
*/

public function getUserPreferences( $client, $accessToken )
{

    $params = array("code" => $_GET["code"], "redirect_uri" => $this->redirectUrl);
    $response = $client->getAccessToken($accessToken, "authorization_code", $params);

    $accessTokenResult = $response["result"];
    $client->setAccessToken($accessTokenResult["access_token"]);
    $client->setAccessTokenType(OAuth2\Client::ACCESS_TOKEN_BEARER);

    $response = $client->fetch("https://oauth.reddit.com/api/v1/me.json");

    echo('<strong>Response for fetch me.json:</strong><pre>');
    print_r($response);
    echo('</pre>');
}
}

?>