<?php

namespace ProgrammatorDev\OpenWeatherMap\Test\Unit\OneCall;

use ProgrammatorDev\OpenWeatherMap\Entity\Condition;
use ProgrammatorDev\OpenWeatherMap\Entity\OneCall\DayData;
use ProgrammatorDev\OpenWeatherMap\Entity\OneCall\MoonPhase;
use ProgrammatorDev\OpenWeatherMap\Entity\OneCall\Temperature;
use ProgrammatorDev\OpenWeatherMap\Entity\Wind;
use ProgrammatorDev\OpenWeatherMap\Test\AbstractTest;

class DayDataTest extends AbstractTest
{
    public function testMethods()
    {
        $entity = new DayData([
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
        ]);

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
        $this->assertInstanceOf(Temperature::class, $entity->getTemperature());
        $this->assertInstanceOf(Temperature::class, $entity->getTemperatureFeelsLike());
        $this->assertSame(100, $entity->getPrecipitationProbability());
        $this->assertSame('summary', $entity->getSummary());
        $this->assertInstanceOf(MoonPhase::class, $entity->getMoonPhase());
        $this->assertInstanceOf(\DateTimeImmutable::class, $entity->getMoonriseAt());
        $this->assertInstanceOf(\DateTimeImmutable::class, $entity->getMoonsetAt());
        $this->assertInstanceOf(\DateTimeImmutable::class, $entity->getSunriseAt());
        $this->assertInstanceOf(\DateTimeImmutable::class, $entity->getSunsetAt());
    }
}