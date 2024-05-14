<?php

namespace ProgrammatorDev\OpenWeatherMap\Test\Unit\AirPollution;

use ProgrammatorDev\OpenWeatherMap\Entity\AirPollution\AirPollutionData;
use ProgrammatorDev\OpenWeatherMap\Entity\AirPollution\AirQuality;
use ProgrammatorDev\OpenWeatherMap\Test\AbstractTest;

class AirPollutionDataTest extends AbstractTest
{
    public function testMethods()
    {
        $entity = new AirPollutionData([
            'dt' => 1715279409,
            'main' => [
                'aqi' => 1
            ],
            'components' => [
                'co' => 100,
                'no' => 0,
                'no2' => 1,
                'o3' => 100,
                'so2' => 1,
                'pm2_5' => 1,
                'pm10' => 1,
                'nh3' => 1
            ]
        ]);

        $this->assertInstanceOf(\DateTimeImmutable::class, $entity->getDateTime());
        $this->assertInstanceOf(AirQuality::class, $entity->getAirQuality());
        $this->assertSame(100.0, $entity->getCarbonMonoxide());
        $this->assertSame(0.0, $entity->getNitrogenMonoxide());
        $this->assertSame(1.0, $entity->getNitrogenDioxide());
        $this->assertSame(100.0, $entity->getOzone());
        $this->assertSame(1.0, $entity->getSulphurDioxide());
        $this->assertSame(1.0, $entity->getFineParticulateMatter());
        $this->assertSame(1.0, $entity->getCoarseParticulateMatter());
        $this->assertSame(1.0, $entity->getAmmonia());
    }
}