<?php

namespace ProgrammatorDev\OpenWeatherMap\Test\Unit\OneCall;

use ProgrammatorDev\OpenWeatherMap\Entity\Condition;
use ProgrammatorDev\OpenWeatherMap\Entity\Coordinate;
use ProgrammatorDev\OpenWeatherMap\Entity\OneCall\WeatherMoment;
use ProgrammatorDev\OpenWeatherMap\Entity\Timezone;
use ProgrammatorDev\OpenWeatherMap\Entity\Wind;
use ProgrammatorDev\OpenWeatherMap\Test\AbstractTest;

class WeatherMomentTest extends AbstractTest
{
    public function testMethods()
    {
        $entity = new WeatherMoment([
            'lat' => 50,
            'lon' => 50,
            'timezone' => 'UTC',
            'timezone_offset' => 0,
            'data' => [
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
                    'sunrise' => 1715561801,
                    'sunset' => 1715616968
                ]
            ]
        ]);

        $this->assertInstanceOf(Coordinate::class, $entity->getCoordinate());
        $this->assertInstanceOf(Timezone::class, $entity->getTimezone());
        $this->assertInstanceOf(\DateTimeImmutable::class, $entity->getDateTime());
        $this->assertSame(1000, $entity->getAtmosphericPressure());
        $this->assertSame(10, $entity->getHumidity());
        $this->assertSame(10.0, $entity->getDewPoint());
        $this->assertSame(1.0, $entity->getUltraVioletIndex());
        $this->assertSame(10, $entity->getCloudiness());
        $this->assertInstanceOf(Wind::class, $entity->getWind());
        $this->assertContainsOnlyInstancesOf(Condition::class, $entity->getConditions());
        $this->assertSame(1.0, $entity->getRainVolume());
        $this->assertSame(1.0, $entity->getSnowVolume());
        $this->assertSame(10.0, $entity->getTemperature());
        $this->assertSame(10.0, $entity->getTemperatureFeelsLike());
        $this->assertSame(10000, $entity->getVisibility());
        $this->assertInstanceOf(\DateTimeImmutable::class, $entity->getSunriseAt());
        $this->assertInstanceOf(\DateTimeImmutable::class, $entity->getSunsetAt());
    }
}