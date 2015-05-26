<?php
 
// Modify these values with the ones you intend to use
define('VN_SERVER_ADDRESS', 'CHANGEME');
define('API_ACCESS_TOKEN',  'CHANGEME');
define('EXTENSION_NUMBER',  'CHANGEME');
define('SANDBOX_NUMBER',    'CHANGEME');
  
// The parameters sent in the body of the request
$data = array(
    'extension' => EXTENSION_NUMBER,
    'phoneCallView' => array(array(
        'source' => EXTENSION_NUMBER,
        'destination' => SANDBOX_NUMBER))
);
 
// Setup the requests parameters
$options = array(
    CURLOPT_HTTPHEADER => array(
        'Content-type: application/json',
        'Authorization: Bearer '.API_ACCESS_TOKEN
    ),
     
    // URI that identifies the phone call
    CURLOPT_URL => 'https://'.VN_SERVER_ADDRESS.'/uapi/phoneCalls/@me/simple',
    CURLOPT_CUSTOMREQUEST => 'POST',
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_POSTFIELDS => json_encode($data)
);
 
// Makes a HTTP POST request using SSL
$ch = curl_init();
curl_setopt_array($ch, $options);
 
// Parses the JSON response
print_r(json_decode(curl_exec($ch),true)); 

?>
