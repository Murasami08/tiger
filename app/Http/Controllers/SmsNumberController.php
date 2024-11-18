<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use GuzzleHttp\Client;

class SmsNumberController extends Controller
{
    protected $client;
    protected $baseUrl = 'https://postback-sms.com/api/';
    protected $token = '5994c91001f57eea808aff11738d752a';
    public function __construct()
    {
        $this->client = new Client();
    }
    public function getNumber(Request $request)
    {
        
        $country = $request->input('country');
        $service = $request->input('service');
        
        if (!$country || !$service) {
            return response()->json([
                'code' => 'error',
                'message' => 'Not parameters passed'
            ]);
        }

        $params = [
            'action' => 'getNumber',
            'country' => $country,
            'service' => $service,
            'token' => $this->token,
            'rent_time' => $request->input('rent_time', null) 
        ];

        $response = $this->client->get($this->baseUrl, ['query' => $params]);
        return json_decode($response->getBody(), true);
    }

    public function getSms(Request $request)
    {
      
        $activation = $request->input('activation');
        
        if (!$activation) {
            return response()->json([
                'code' => 'error',
                'message' => 'Not parameters passed'
            ]);
        }

        $params = [
            'action' => 'getSms',
            'token' => $this->token,
            'activation' => $activation,
        ];

        $response = $this->client->get($this->baseUrl, ['query' => $params]);
        return json_decode($response->getBody(), true);
    }

    public function cancelNumber(Request $request)
    {
        
        $activation = $request->input('activation');
        
        if (!$activation) {
            return response()->json([
                'code' => 'error',
                'message' => 'Not parameters passed'
            ]);
        }

        $params = [
            'action' => 'cancelNumber',
            'token' => $this->token,
            'activation' => $activation,
        ];

        $response = $this->client->get($this->baseUrl, ['query' => $params]);
        return json_decode($response->getBody(), true);
    }

    public function getStatus(Request $request)
    {
     
        $activation = $request->input('activation');
        
        if (!$activation) {
            return response()->json([
                'code' => 'error',
                'message' => 'Not parameters passed'
            ]);
        }

        $params = [
            'action' => 'getStatus',
            'token' => $this->token,
            'activation' => $activation,
        ];

        $response = $this->client->get($this->baseUrl, ['query' => $params]);
        return json_decode($response->getBody(), true);
    }
}
