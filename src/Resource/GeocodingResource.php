<?php

namespace ProgrammatorDev\OpenWeatherMap\Resource;

use ProgrammatorDev\Api\Method;
use ProgrammatorDev\OpenWeatherMap\Entity\Location;
use ProgrammatorDev\OpenWeatherMap\Resource\Util\ValidationTrait;
use ProgrammatorDev\OpenWeatherMap\Util\EntityTrait;
use ProgrammatorDev\Validator\Exception\ValidationException;
use Psr\Http\Client\ClientExceptionInterface;

class GeocodingResource extends Resource
{
    use EntityTrait;
    use ValidationTrait;

    private const NUM_RESULTS = 5;

    /**
     * @return Location[]
     * @throws ClientExceptionInterface
     * @throws ValidationException
     */
    public function getByLocationName(string $locationName, int $numResults = self::NUM_RESULTS): array
    {
        $this->validateQuery($locationName, 'locationName');
        $this->validatePositive($numResults, 'numResults');

        $data = $this->api->request(
            method: Method::GET,
            path: '/geo/1.0/direct',
            query: [
                'q' => $locationName,
                'limit' => $numResults
            ]
        );

        return $this->createEntityList(Location::class, $data);
    }

    /**
     * @throws ClientExceptionInterface
     * @throws ValidationException
     */
    public function getByZipCode(string $zipCode, string $countryCode): Location
    {
        $this->validateQuery($zipCode, 'zipCode');
        $this->validateCountry($countryCode, 'countryCode');

        $data = $this->api->request(
            method: 'GET',
            path: '/geo/1.0/zip',
            query: [
                'zip' => \sprintf('%s,%s', $zipCode, $countryCode)
            ]
        );

        return new Location($data);
    }

    /**
     * @return Location[]
     * @throws ClientExceptionInterface
     * @throws ValidationException
     */
    public function getByCoordinate(float $latitude, float $longitude, int $numResults = self::NUM_RESULTS): array
    {
        $this->validateCoordinate($latitude, $longitude);
        $this->validatePositive($numResults, 'numResults');

        $data = $this->api->request(
            method: Method::GET,
            path: '/geo/1.0/reverse',
            query: [
                'lat' => $latitude,
                'lon' => $longitude,
                'limit' => $numResults
            ]
        );

        return $this->createEntityList(Location::class, $data);
    }
}