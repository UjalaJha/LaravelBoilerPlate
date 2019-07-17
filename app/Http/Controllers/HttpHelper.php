<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class HttpHelper 
{
    public static function httpCall($endpoint)
	{ 
        
		$client = new Client([
            'headers' => [
                'content-type' => 'application/x-www-form-urlencoded',
                
            ]
        ]);
        // return $form_params;
        $response = $client->request('GET', 'http://127.0.0.1:5000/api/users/'.$endpoint);
        // return $response;
        $content = $response->getBody();
        // return $content;
        return json_decode($content, true);
    }
    public static function httpCallPost($endpoint, $form_params)
    { 
        
        $client = new Client([
            'headers' => [
                'content-type' => 'application/x-www-form-urlencoded',
                
            ]
        ]);
        // return $form_params;
        $response = $client->request('POST', 'http://127.0.0.1:5000/api/users/'.$endpoint, [
            'form_params' => $form_params
        ]);
        $content = $response->getBody();
        // return $content;
        return json_decode($content, true);
    }
    public static function httpCallPostJson($endpoint, $json)
    { 
        
        $client = new Client([
            'headers' => [
                'content-type' => 'application/json',
                
            ]
        ]);
        $data = json_encode($json);
        // return $data;
       	// exit;
        $response = $client->post('http://127.0.0.1:5000/api/users/'.$endpoint, 
        	['body' => $data]
        );
        $content = $response->getBody();
        // return $content;
        return json_decode($content, true);
    }
}
