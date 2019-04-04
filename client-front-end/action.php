<?php

//action.php
require 'vendor/autoload.php';

use GuzzleHttp\Client;

$client = new Client();


if(isset($_POST["action"]))
{
	if($_POST["action"] == 'insert')
	{
				$no_rangka	=	$_POST['no_rangka'];
				$no_polisi	=	$_POST['no_polisi'];
				$merek		=	$_POST['merek'];
				$tipe		=	$_POST['tipe'];
				$tahun		=	$_POST['tahun'];
				$keys		=	'guest123';
		
		$response =$client->request('POST', 'http://localhost/sprint-test-project/toko_mobil_ali/api/mobil', [
			'form_params' => [
				'no_rangka'	=>	$no_rangka,
				'no_polisi'	=>	$no_polisi,
				'merek'		=>	$merek,
				'tipe'		=>	$tipe,
				'tahun'		=>	$tahun,
				'TOKEN-TOKO'=>	$keys
			]
		]);

		$result = json_decode($response->getBody()->getContents(),true);
		if($result['status']=='1')
		{
			echo "input";
		}
		else
		{
			echo "error";	
		}
	}


	if($_POST["action"] == 'fetch_single')
	{
		$id = $_POST["id"];
		
		$client = new Client();

	
		$response = $client->request('GET','http://localhost/sprint-test-project/toko_mobil_ali/api/mobil',['query' =>[
				'id' 		=> $id,
				'TOKEN-TOKO'=>'ogriV18091995'
			]
		]);

		$result = $response->getBody()->getContents();
		echo $result;

	}


	if($_POST["action"] == 'update')
	{
		$id			=	$_POST['hidden_id'];
		$no_rangka	=	$_POST['no_rangka'];
		$no_polisi	=	$_POST['no_polisi'];
		$merek		=	$_POST['merek'];
		$tipe		=	$_POST['tipe'];
		$tahun		=	$_POST['tahun'];
		$keys		=	'guest123';
		
		$response =$client->request('PUT', 'http://localhost/sprint-test-project/toko_mobil_ali/api/mobil', [
			'form_params' => [
				'id'	=>	$id,
				'no_rangka'	=>	$no_rangka,
				'no_polisi'	=>	$no_polisi,
				'merek'		=>	$merek,
				'tipe'		=>	$tipe,
				'tahun'		=>	$tahun,
				'TOKEN-TOKO'=>	$keys
			]
		]);

		$result = json_decode($response->getBody()->getContents(),true);
		if($result['status']=='1')
		{
			echo "update";
		}
		else
		{
			echo "error";	
		}
	}


	if($_POST["action"] == 'delete')
	{
		$id = $_POST['id'];
		$response = $client->request('DELETE','http://localhost/sprint-test-project/toko_mobil_ali/api/mobil',[
			'form_params' =>[
					'id' 		=> $id,
					'TOKEN-TOKO'=>'guest123'
			]
		]);
		echo $response;
	}
}


?>