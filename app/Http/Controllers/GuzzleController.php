<?php

namespace App\Http\Controllers;

use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Http\Request;
use GuzzleHttp\Client;



class GuzzleController extends Controller
{
    public function getRemoteData()
    {
        // $a = [];
        $client = new Client();
        // $res = $client->request('GET', 'http://livescore-api.com/api-client/fixtures/leagues.json?key=LLPdb8UjRIFuupej&secret=qAaiwvKfEqcat5oeQds2mnle51IzrXTS', ['headers' => ['Accept' => 'application/json', 'Content-type' => 'application/json']]);
        // $decodedData = json_decode($res->getBody(), true);
        // $fixturesDataLink = $decodedData['data']['leagues']['22']['fixures'];
        // dump($fixturesDataLink);
        $res = $client->request('GET', 'https://livescore-api.com/api-client/fixtures/matches.json?key=LLPdb8UjRIFuupej&secret=qAaiwvKfEqcat5oeQds2mnle51IzrXTS&league=25', []);
        $decodeData = json_decode($res->getBody(), true);
        $fixtures = $decodeData['data']['fixtures'];
        return view('admin.matches.indexp', compact('fixtures'));
    }
}
