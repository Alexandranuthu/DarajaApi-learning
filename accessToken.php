<!-- GENERATING ACCESS TOKENS -->
<?php
//The Mpesa api keys which is going to be used to generate an access token
$consumerKey = "OESOhpcFtdhwxJhtslYqGvRNSVtfp2a1MUbTn1DzwoOxzE9d";
$consumerSecret = "ZGAlrmTa35P5FhNptxc6h8FIjrIrnrizDIXxmPwE9fVejJp2cDKeH4CAVfqGzmda";
//access token url to generate  the access token for authenticating your API calls
$access_token_url = 'https://sandbox.safaricom.co.ke/oauth/v1/generate?grant_type=client_credentials';
//setting the content type to json
$headers = ['Content-Type:application/json; charset=utf8'];
//Initializing the curl session
//cURL is a tool for transferring data through different protocols i.e HTTP
$curl = curl_init( $access_token_url );
//CURLOPT_HTTPHEADER: Sets the HTTP headers for the request.
curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
//CURLOPT_RETURNTRANSFER: Sets to TRUE to return the transfer as a string instead of outputting it directly.
curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
//CURLOPT_HEADER: Sets to FALSE to exclude the header from the output.
curl_setopt($curl, CURLOPT_HEADER, FALSE);
//CURLOPT_USERPWD: Sets the username and password for HTTP authentication.
curl_setopt($curl, CURLOPT_USERPWD, $consumerKey . ':' . $consumerSecret);
//executing the request
$result = curl_exec($curl);
//It retrieves the HTTP status code of the request using curl_getinfo().
$status = curl_getinfo($curl, CURLINFO_HTTP_CODE);
//outputing the result
$result = json_decode($result);
echo $access_token = $result->access_token; //printing the generated Access Token
// echo $result;
if(!$result) die("Error in getting the Access Token");
//closing the session
curl_close($curl);
