<?php
 
// Modify these values with the ones you intend to use
define('VN_SERVER_ADDRESS', 'CHANGEME');
define('API_ACCESS_TOKEN',  'CHANGEME');
define('PHONECALL_ID',      'CHANGEME"');
define('PHONECALLVIEW_ID',  'CHANGEME');
define('EXTENSION_NUMBER',  'CHANGEME');
 
// The parameters sent in the body of the request
$data = array(
    'action' => 'Park',
    'phoneCallViewId' => PHONECALLVIEW_ID
);
 
// Setup the requests parameters
$options = array(
    CURLOPT_HTTPHEADER => array(
        'Content-type: application/json',
        'Authorization: Bearer '.API_ACCESS_TOKEN
    ),
    CURLOPT_URL => 'https://'.VN_SERVER_ADDRESS.'/uapi/phoneCalls/@me/'. EXTENSION_NUMBER .'/'.PHONECALL_ID,
    CURLOPT_CUSTOMREQUEST => 'PUT',
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_POSTFIELDS => json_encode($data)
);
 
// Makes a HTTP PUT request using SSL
$ch = curl_init();
curl_setopt_array($ch, $options);
 
// Parses the JSON response
print_r(json_decode(curl_exec($ch),true)); 

?>

