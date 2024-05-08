<?php

namespace ProgrammatorDev\OpenWeatherMap\Test\Unit\Weather;

use ProgrammatorDev\OpenWeatherMap\Entity\Location;
use ProgrammatorDev\OpenWeatherMap\Entity\Weather\WeatherCollection;
use ProgrammatorDev\OpenWeatherMap\Entity\Weather\WeatherData;
use ProgrammatorDev\OpenWeatherMap\Test\AbstractTest;

class WeatherCollectionTest extends AbstractTest
{
    public function testMethods()
    {
        $entity = new WeatherCollection([
            'cnt' => 1,
            'city' => [
                'id' => 100,
                'name' => 'name',
                'coord' => [
                    'lat' => 50,
                    'lon' => 50
                ],
                'country' => 'PT',
                'population' => 100,
                'timezone' => 0,
                'sunrise' => 1715130253,
                'sunset' => 1715184525
            ],
            'list' => [
                [
                    'dt' => 1715187406,
                    'weather' => [
                        [
                            'id' => 200,
                            'main' => 'main',
                            'description' => 'description',
                            'icon' => '01d'
                        ]
                    ],
                    'main' => [
                        'temp' => 20,
                        'feels_like' => 20,
                        'temp_min' => 15,
                        'temp_max' => 25,
                        'pressure' => 1010,
                        'humidity' => 50
                    ],
                    'visibility' => 10000,
                    'wind' => [
                        'speed' => 100,
                        'deg' => 100,
                        'gust' => 100
                    ],
                    'clouds' => [
                        'all' => 100
                    ],
                    'pop' => 1,
                    'rain' => [
                        '3h' => 10
                    ],
                    'snow' => [
                        '3h' => 10
                    ]
                ]
            ]
        ]);

        $this->assertSame(1, $entity->getNumResults());
        $this->assertInstanceOf(Location::class, $entity->getLocation());
        $this->assertContainsOnlyInstancesOf(WeatherData::class, $entity->getData());
    }
}