<?php

namespace Tests\Unit\Integrations;

use App\Components\ExampleWeatherIntegration\Client as ClientAuthorization;
use Tests\TestCase;

class ExampleWeatherTest extends TestCase {

    /**
     * A basic unit test example.
     *
     * @return void
     */
    function test_example_weather() {
        $city=455856;
        $expceted=app(ClientAuthorization::class)->generateWeather($city);
        if (is_object($expceted)) {
            $this->assertEquals($expceted->results->city_name, "Criciúma");
        } else {
            dd('error');
        }
    }

}
