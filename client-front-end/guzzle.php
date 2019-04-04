<?php 
require 'vendor/autoload.php';

	use GuzzleHttp\Client;

	$client = new Client();

	
		$response = $client->request('GET','http://localhost/sprint-test-project/toko_mobil_ali/api/mobil',['query' =>[
				'id' 		=> $id,
				'TOKEN-TOKO'=>'ogriV18091995'
			]
		]);

	$result = json_decode($response->getBody()->getContents(),true);
	$result = $result['data'];
	var_dump(expression)
 