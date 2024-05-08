<?php

namespace ProgrammatorDev\OpenWeatherMap\Test\Unit\Weather;

use ProgrammatorDev\OpenWeatherMap\Entity\Condition;
use ProgrammatorDev\OpenWeatherMap\Entity\Location;
use ProgrammatorDev\OpenWeatherMap\Entity\Weather\Weather;
use ProgrammatorDev\OpenWeatherMap\Entity\Wind;
use ProgrammatorDev\OpenWeatherMap\Test\AbstractTest;

class WeatherTest extends AbstractTest
{
    public function testMethods()
    {
        $entity = new Weather([
            'coord' => [
                'lat' => 50,
                'lon' => 50
            ],
            'id' => 100,
            'name' => 'name',
            'sys' => [
                'country' => 'PT',
                'sunrise' => 1715130253,
                'sunset' => 1715184525
            ],
            'timezone' => 0,
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
                '1h' => 10
            ],
            'snow' => [
                '1h' => 10
            ],
            'dt' => 1715187406
        ]);

        $this->assertInstanceOf(Location::class, $entity->getLocation());
        $this->assertInstanceOf(\DateTimeImmutable::class, $entity->getDateTime());
        $this->assertSame(20.0, $entity->getTemperature());
        $this->assertSame(20.0, $entity->getTemperatureFeelsLike());
        $this->assertSame(15.0, $entity->getMinTemperature());
        $this->assertSame(25.0, $entity->getMaxTemperature());
        $this->assertSame(50, $entity->getHumidity());
        $this->assertSame(100, $entity->getCloudiness());
        $this->assertSame(10000, $entity->getVisibility());
        $this->assertSame(1010, $entity->getAtmosphericPressure());
        $this->assertContainsOnlyInstancesOf(Condition::class, $entity->getConditions());
        $this->assertInstanceOf(Wind::class, $entity->getWind());
        $this->assertSame(100, $entity->getPrecipitationProbability());
        $this->assertSame(10.0, $entity->getRainVolume());
        $this->assertSame(10.0, $entity->getSnowVolume());
    }
}