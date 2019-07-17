<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;

class FetchApiController extends Controller
{
    public function fetchusers()
    {

		$evaluation = HttpHelper::httpCall('getall');
		echo "<pre>";
		print_r($evaluation);
	}
	public function createuser()
    {
    	$data=[];
    	$data['name']='ujalax';
    	$data['email']='123@456.com';
    	$data['age']=23;
    	$data['password']='abcdef';

		$response = HttpHelper::httpCallPostJson('create',$data);

		echo "<pre>";
		print_r($response);
	}
	public function deleteuser()
    {

		$evaluation = HttpHelper::httpCall('delete/' . 16);
		echo "<pre>";
		print_r($evaluation);
	}
}
