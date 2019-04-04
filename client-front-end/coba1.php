<?php 
$api_url = "http://localhost/Belajar_API/api/test_api.php?action=fetch_single&id=10";  //change this url as per your folder path for api folder
		$client = curl_init($api_url);
		curl_setopt($client, CURLOPT_RETURNTRANSFER, true);
		$response = curl_exec($client);
		echo $response;