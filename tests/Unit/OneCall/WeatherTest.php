<?php

namespace ProgrammatorDev\OpenWeatherMap\Test\Unit\OneCall;

use ProgrammatorDev\OpenWeatherMap\Entity\Coordinate;
use ProgrammatorDev\OpenWeatherMap\Entity\OneCall\Alert;
use ProgrammatorDev\OpenWeatherMap\Entity\OneCall\DayData;
use ProgrammatorDev\OpenWeatherMap\Entity\OneCall\HourData;
use ProgrammatorDev\OpenWeatherMap\Entity\OneCall\MinuteData;
use ProgrammatorDev\OpenWeatherMap\Entity\OneCall\Weather;
use ProgrammatorDev\OpenWeatherMap\Entity\OneCall\WeatherData;
use ProgrammatorDev\OpenWeatherMap\Entity\Timezone;
use ProgrammatorDev\OpenWeatherMap\Test\AbstractTest;

class WeatherTest extends AbstractTest
{
    public function testMethods()
    {
        $entity = new Weather([
            'lat' => 50,
            'lon' => 50,
            'timezone' => 'UTC',
            'timezone_offset' => 0,
            'current' => [
                'dt' => 1715561801,
                'pressure' => 1000,
                'humidity' => 10,
                'dew_point' => 10,
                'uvi' => 1,
                'clouds' => 10,
                'wind_speed' => 10,
                'wind_deg' => 10,
                'wind_gust' => 10,
                'weather' => [
                    [
                        'id' => 200,
                        'main' => 'name',
                        'description' => 'description',
                        'icon' => '01d'
                    ]
                ],
                'rain' => 1,
                'snow' => 1,
                'temp' => 10,
                'feels_like' => 10,
                'visibility' => 10000,
                'sunrise' => 1715561801,
                'sunset' => 1715616968
            ],
            'minutely' => [
                [
                    'dt' => 1715561801,
                    'precipitation' => 1
                ]
            ],
            'hourly' => [
                [
                    'dt' => 1715561801,
                    'pressure' => 1000,
                    'humidity' => 10,
                    'dew_point' => 10,
                    'uvi' => 1,
                    'clouds' => 10,
                    'wind_speed' => 10,
                    'wind_deg' => 10,
                    'wind_gust' => 10,
                    'weather' => [
                        [
                            'id' => 200,
                            'main' => 'name',
                            'description' => 'description',
                            'icon' => '01d'
                        ]
                    ],
                    'rain' => 1,
                    'snow' => 1,
                    'temp' => 10,
                    'feels_like' => 10,
                    'visibility' => 10000,
                    'pop' => 1
                ]
            ],
            'daily' => [
                [
                    'dt' => 1715561801,
                    'pressure' => 1000,
                    'humidity' => 10,
                    'dew_point' => 10,
                    'uvi' => 1,
                    'clouds' => 10,
                    'wind_speed' => 10,
                    'wind_deg' => 10,
                    'wind_gust' => 10,
                    'weather' => [
                        [
                            'id' => 200,
                            'main' => 'name',
                            'description' => 'description',
                            'icon' => '01d'
                        ]
                    ],
                    'rain' => 1,
                    'snow' => 1,
                    'temp' => [
                        'morn' => 10,
                        'day' => 15,
                        'eve' => 15,
                        'night' => 10,
                        'min' => 10,
                        'max' => 15,
                    ],
                    'feels_like' => [
                        'morn' => 10,
                        'day' => 15,
                        'eve' => 15,
                        'night' => 10
                    ],
                    'pop' => 1,
                    'summary' => 'summary',
                    'moon_phase' => 1,
                    'moonrise' => 1715561801,
                    'moonset' => 1715616968,
                    'sunrise' => 1715561801,
                    'sunset' => 1715616968
                ]
            ],
            'alerts' => [
                [
                    'sender_name' => 'sender name',
                    'event' => 'event name',
                    'start' => 1715561801,
                    'end' => 1715616968,
                    'description' => 'description',
                    'tags' => ['tag1', 'tag2']
                ]
            ]
        ]);

        $this->assertInstanceOf(Coordinate::class, $entity->getCoordinate());
        $this->assertInstanceOf(Timezone::class, $entity->getTimezone());
        $this->assertInstanceOf(WeatherData::class, $entity->getCurrent());
        $this->assertContainsOnlyInstancesOf(MinuteData::class, $entity->getMinutelyForecast());
        $this->assertContainsOnlyInstancesOf(HourData::class, $entity->getHourlyForecast());
        $this->assertContainsOnlyInstancesOf(DayData::class, $entity->getDailyForecast());
        $this->assertContainsOnlyInstancesOf(Alert::class, $entity->getAlerts());
    }
}