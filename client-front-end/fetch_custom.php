<?php

//fetch.php
require 'vendor/autoload.php';

	use GuzzleHttp\Client;

	$client = new Client();

	if ($_GET['type']!="") {
		$response = $client->request('GET','http://localhost/sprint-test-project/toko_mobil_ali/api/mobil',['query' =>[
		'brand'=>$_GET['merek'],
		'type'=>$_GET['type'],
		'TOKEN-TOKO'=>'ogriV18091995'
		]
	]);
	$result = json_decode($response->getBody()->getContents(),true);
	}
	else if($_GET['merek']!="")
	{
		$response = $client->request('GET','http://localhost/sprint-test-project/toko_mobil_ali/api/mobil',['query' =>[
		'brand'=>$_GET['merek'],
		'TOKEN-TOKO'=>'ogriV18091995'
		]
	]);
	$result = json_decode($response->getBody()->getContents(),true);
	}
	else{
	$response = $client->request('GET','http://localhost/sprint-test-project/toko_mobil_ali/api/mobil',['query' =>[
		'TOKEN-TOKO'=>'ogriV18091995'
		]
	]);
	$result = json_decode($response->getBody()->getContents(),true);
	}
 

$output = '';

if(count($result) > 0)
{
	foreach($result['data'] as $row)
	{
		$output .= '
		<tr>
			<td>'.$row['no_rangka'].'</td>
			<td>'.$row['no_polisi'].'</td>
			<td>'.$row['merek'].'</td>
			<td>'.$row['tipe'].'</td>
			<td>'.$row['tahun'].'</td>
			<td><button type="button" name="edit" class="btn btn-warning btn-xs edit" id="'.$row['id'].'">Edit</button>
				<button type="button" name="delete" class="btn btn-danger btn-xs delete" id="'.$row['id'].'">Delete</button></td>
		</tr>
		';
	}
}
else
{
	$output .= '
	<tr>
		<td colspan="5" align="center">No Data Found</td>
	</tr>
	';
}

echo $output;

?>