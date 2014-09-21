
<?php

require_once("ntlm/NTLMStream.php");

require_once("ntlm/NTLMSoapClient.php"); //Aici e definit domeniul, userul si parola

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


