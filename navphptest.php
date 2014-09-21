<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr" lang="is-IS">

<head profile="http://gmpg.org/xfn/11">
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

<title>NAV Web Service via PHP</title>
</head>
<body>

<?php

require_once("ntlm/NTLMStream.php");

require_once("ntlm/NTLMSoapClient.php");

stream_wrapper_unregister('http');

stream_wrapper_register('http', 'NTLMStream') or die("Failed to register protocol");

// Initialize Soap Client  
$baseURL = 'http://86.35.240.116:7149/Test/WS/Test_UnicSpot%20-%20Productie/Page/'; 


$client = new NTLMSoapClient($baseURL.'SiteIntegrationCustomer'); // La linia asta apare eroarea respectiva

	
// Find the first Company in the Companies 
$result = $client->Companies(); 
$companies = $result->return_value; 
echo "Companies:<br>"; 
if (is_array($companies)) { 
  foreach($companies as $company) { 
    echo "$company<br>"; 
  } 
  $cur = $companies[0]; 
} 
else { 
  echo "$companies<br>"; 
  $cur = $companies; 
}




stream_wrapper_restore('http');


?>
</body>
</html>

