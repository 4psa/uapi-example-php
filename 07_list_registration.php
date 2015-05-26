<?php
 
// Modify these values with the ones you intend to use
define('VN_SERVER_ADDRESS', 'CHANGEME');
define('API_ACCESS_TOKEN',  'CHANGEME');
define('EXTENSION_NUMBER',  'CHANGEME');
 
// Setup the requests parameters
$options = array(
    CURLOPT_HTTPHEADER => array(
        'Content-type: application/json',
        'Authorization: Bearer '.API_ACCESS_TOKEN
    ),
    // URI that identifies the presence
    CURLOPT_URL => 'https://'.VN_SERVER_ADDRESS.'/uapi/extensions/@me/'.EXTENSION_NUMBER.'/presence',
    CURLOPT_CUSTOMREQUEST => 'GET',
    CURLOPT_RETURNTRANSFER => true
);
 
// Makes a HTTP GET request using SSL
$ch = curl_init();
curl_setopt_array($ch, $options);
 
// Parses the JSON response
print_r(json_decode(curl_exec($ch),true)); 

?>
