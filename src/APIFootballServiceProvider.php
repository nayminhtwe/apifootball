<?php
/**
 * Created by PhpStorm.
 * User: Naymin
 * Date: 6/25/19
 * Time: 3:55 PM
 */

namespace Naymin\APIfootball;

use GuzzleHttp\Client;
use Illuminate\Support\ServiceProvider;
use App;


class APIFootballServiceProvider extends ServiceProvider
{
    public function boot()
    {


    }

    public function register()
    {
        $this->app->bind('football', function()
        {
            $client = new Client([
                'base_uri'  =>  'https://api-football-v1.p.rapidapi.com',
                'headers'   =>  [
                    "X-RapidAPI-Host" => "api-football-v1.p.rapidapi.com",
                    'X-RapidAPI-Key' => getenv('APIFOOTBALL_API_KEY')
                ]
            ]);

            return new APIFootball($client);
        });

    }

}
