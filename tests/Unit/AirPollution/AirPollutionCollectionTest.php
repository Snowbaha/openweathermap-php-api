<?php

namespace ProgrammatorDev\OpenWeatherMap\Test\Unit\AirPollution;

use ProgrammatorDev\OpenWeatherMap\Entity\AirPollution\AirPollutionCollection;
use ProgrammatorDev\OpenWeatherMap\Entity\AirPollution\AirPollutionData;
use ProgrammatorDev\OpenWeatherMap\Entity\Coordinate;
use ProgrammatorDev\OpenWeatherMap\Test\AbstractTest;

class AirPollutionCollectionTest extends AbstractTest
{
    public function testMethods()
    {
        $entity = new AirPollutionCollection([
            'coord' => [
                'lat' => 50,
                'lon' => 50
            ],
            'list' => [
                [
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
                ]
            ]
        ]);

        $this->assertSame(1, $entity->getNumResults());
        $this->assertInstanceOf(Coordinate::class, $entity->getCoordinate());
        $this->assertContainsOnlyInstancesOf(AirPollutionData::class, $entity->getData());
    }
}