<?php


namespace App\Services;


use App\Models\Stock;
use App\Models\StockCollection;
use Carbon\Carbon;
use Carbon\CarbonImmutable;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Exception\GuzzleException;

class FinHubService
{

    public function requestStocks()
    {
        $url = $_ENV['API_BASE_URL'] . $_ENV["API_BASE_PATH"] . $_ENV["API_DESTINATION_STOCKS"];

        $response = [];


        $parameters = [
            "api_key" => [
                "type" => "apiKey",
                "name" => "token",
                "in" => "query"
            ],
            "token" => $_ENV["API_KEY"],

        ];

        $qs = http_build_query($parameters);

        $request = "$url?$qs";

        $client = new Client();

        try {
            $response = $client->request('GET', $request);
        } catch (ClientException $e) {
            echo 'Caught exception: ' . $e->getMessage() . "\n";
        } catch (GuzzleException $e) {
            echo $e;
        }
        $apiResponse = json_decode($response->getBody(), true);


        $stocks = [];

        foreach ($apiResponse["quote"] as $stockName => $stockPrice) {
            $stockPriceOld = ($stockPrice + rand(-2, 2) /5);
            $stocks[] = new Stock(
                $stockName,

                $stockPrice,
                $stockPriceOld
            );
        }


        return new StockCollection($stocks);
    }


    public function requestCandles()
    {
        $url = $_ENV['API_BASE_URL'] . $_ENV["API_BASE_PATH"] . $_ENV["API_DESTINATION_CANDLES"];

        $response = [];


        $parameters = [
            "symbol"=>"OANDA:EUR_USD",
            "resolution"=>"D",
            "from"=> CarbonImmutable::now()->subtract('days', 7)->timestamp,
            "to"=> Carbon::now()->timestamp,
            "api_key" => [
                "type" => "apiKey",
                "name" => "token",

            ],
            "token" => $_ENV["API_KEY"],

        ];

        $qs = http_build_query($parameters);

        $request = "$url?$qs";

        $client = new Client();

        try {
            $response = $client->request('GET', $request);
        } catch (ClientException $e) {
            echo 'Caught exception: ' . $e->getMessage() . "\n";
        } catch (GuzzleException $e) {
            echo $e;
        }
        $apiResponse = json_decode($response->getBody(), true);

        var_dump($apiResponse);

//        $candles = [];
//
//        foreach ($apiResponse as $candle => $stockPrice) {
//            $stocks[] = new Stock(
//                $stockName,
//                $stockPrice
//            );
//        }
//
//
//        return new StockCollection($stocks);
    }


}
