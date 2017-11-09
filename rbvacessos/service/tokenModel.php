<?php

function getService() {
  // Creates and returns the Analytics service object.

  // Load the Google API PHP Client Library.
  require_once 'google-api-php-client/src/Google/autoload.php';

  // Use the developers console and replace the values with your
  // service account email, and relative location of your key file.
  $service_account_email = 'mamilos@dotted-electron-134923.iam.gserviceaccount.com';
  $key_file_location = './client_secrets_@#_secret.p12';

  // Create and configure a new client object.
  $client = new Google_Client();
  $client->setApplicationName("tokenModel");
  $analytics = new Google_Service_Analytics($client);

  // Read the generated client_secrets.p12 key.
  $key = file_get_contents($key_file_location);
  $cred = new Google_Auth_AssertionCredentials(
      $service_account_email,
      array(Google_Service_Analytics::ANALYTICS_READONLY),
      $key
  );

  $client->setAssertionCredentials($cred);

  if($client->getAuth()->isAccessTokenExpired()) {
    $client->getAuth()->refreshTokenWithAssertion($cred);
  }

  $access_token = $client->getAccessToken();

  return $access_token;

}

//get token
$analytics = getService();

//imprime token
echo $analytics;

?>
