<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class CountryController extends Controller
{
    public function index()
    {
        $client = new Client();

        try {
            $response = $client->get('https://restcountries.com/v3.1/all');
            $countries = json_decode($response->getBody(), true);

            return response()->json($countries);
        } catch (\Exception $e) {
            return response()->json(['error' => 'API request failed'], 500);
        }
    }
}
