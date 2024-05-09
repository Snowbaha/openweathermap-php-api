# Supported APIs

- [APIs](#apis)
  - [One Call](#one-call)
    - [getWeather](#getweather)
    - [getHistoryMoment](#gethistorymoment)
    - [getHistoryAggregate](#gethistoryaggregate)
  - [Weather](#weather)
    - [getCurrent](#getcurrent)
    - [getForecast](#getforecast)
  - [Air Pollution](#air-pollution)
    - [getCurrent](#getcurrent-1)
    - [getForecast](#getforecast-1)
    - [getHistory](#gethistory)
  - [Geocoding](#geocoding)
    - [getByLocationName](#getbylocationname)
    - [getByCoordinate](#getbycoordinate)
    - [getByZipCode](#getbyzipcode)
- [Common Methods](#common-methods)
  - [withUnitSystem](#withunitsystem)
  - [withLanguage](#withlanguage)
  - [withCacheTtl](#withcachettl)

## APIs

### One Call

#### `getWeather`

```php
getWeather(float $latitude, float $longitude): OneCall
```

Get current and forecast (minutely, hourly and daily) weather data.

Returns a [`OneCall`](05-entities.md#onecall) object:

```php
$weather = $openWeatherMap->oneCall()->getWeather(50, 50);

echo $weather->getCurrent()->getTemperature();
```

#### `getHistoryMoment`

```php
getHistoryMoment(float $latitude, float $longitude, \DateTimeInterface $dateTime): WeatherLocation
```

Get weather data from a single moment in the past.

Returns a [`WeatherLocation`](05-entities.md#weatherlocation) object:

```php
$weather = $openWeatherMap->oneCall()->getHistoryMoment(50, 50, new \DateTime('2023-01-01 12:00:00'));

echo $weather->getTemperature();
```

#### `getHistoryAggregate`

```php
getHistoryAggregate(float $latitude, float $longitude, \DateTimeInterface $date): WeatherAggregate
```

Get aggregated weather data from a single day in the past.

Returns a [`WeatherAggregate`](05-entities.md#weatheraggregate) object:

```php
$weather = $openWeatherMap->oneCall()->getHistoryAggregate(50, 50, new \DateTime('1985-07-19'));

echo $weather->getTemperature();
```

### Weather

#### `getCurrent`

```php
getCurrent(float $latitude, float $longitude): Weather
```

Get current weather data.

Returns a [`Weather`](05-entities.md#weather-2) object:

```php
$currentWeather = $api->weather()->getCurrent(50, 50);
```

#### `getForecast`

```php
getForecast(float $latitude, float $longitude, int $numResults = 40): WeatherCollection
```

Get weather forecast for the next 5 days in 3-hour steps.

Returns a [`WeatherCollection`](05-entities.md#weathercollection) object:

```php
// Since it returns data in 3-hour steps,
// passing 8 as the numResults means it will return results for the next 24 hours
$weatherForecast = $api->weather()->getForecast(50, 50, 8);
```

### Air Pollution

#### `getCurrent`

```php
getCurrent(float $latitude, float $longitude): AirPollutionLocation
```

Get current air pollution data.

Returns a [`AirPollutionLocation`](05-entities.md#airpollutionlocation) object:

```php
$airPollution = $openWeatherMap->airPollution()->getCurrent(50, 50);

echo $airPollution->getAirQuality()->getQualitativeName();
echo $airPollution->getCarbonMonoxide();
```

#### `getForecast`

```php
getForecast(float $latitude, float $longitude): AirPollutionLocationList
```

Get air pollution forecast data per 1-hour for the next 24 hours.

Returns a [`AirPollutionLocationList`](05-entities.md#airpollutionlocationlist) object:

```php
$airPollutionForecast = $openWeatherMap->airPollution()->getForecast(50, 50);

foreach ($airPollutionForecast->getList() as $airPollution) {
    echo $airPollution->getDateTime()->format('Y-m-d H:i:s');
    echo $airPollution->getAirQuality()->getQualitativeName();
    echo $airPollution->getCarbonMonoxide();
}
```

#### `getHistory`

```php
getHistory(float $latitude, float $longitude, \DateTimeInterface $startDate, \DateTimeInterface $endDate): AirPollutionLocationList
```

Get air pollution history data between two dates.

Returns a [`AirPollutionLocationList`](05-entities.md#airpollutionlocationlist) object:

```php
$startDate = new \DateTime('-7 days'); // 7 days ago
$endDate = new \DateTime('-6 days'); // 6 days ago
$airPollutionHistory = $openWeatherMap->airPollution()->getHistory(50, 50, $startDate, $endDate);

foreach ($airPollutionHistory->getList() as $airPollution) {
    echo $airPollution->getDateTime()->format('Y-m-d H:i:s');
    echo $airPollution->getAirQuality()->getQualitativeName();
    echo $airPollution->getCarbonMonoxide();
}
```

### Geocoding

#### `getByLocationName`

```php
/**
 * @return Location[]
 */
getByLocationName(string $locationName, int $numResults = 5): array
```

Get locations by location name. 

Returns an array of [`Location`](05-entities.md#location) entities.

```php
$locations = $api->geocoding()->getByLocationName('lisbon');
```

#### `getByCoordinate`

```php
/**
 * @return Location[]
 */
getByCoordinate(float $latitude, float $longitude, int $numResults = 5): array
```

Get locations by coordinate. 

Returns an array of [`Location`](05-entities.md#location) entities.

```php
$locations = $api->geocoding()->getByCoordinate(50, 50);
```

#### `getByZipCode`

```php
getByZipCode(string $zipCode, string $countryCode): ZipLocation
```

Get location by zip code. 

Returns a [`ZipLocation`](05-entities.md#ziplocation) entity.

```php
$location = $api->geocoding()->getByZipCode('1000-001', 'pt');
```

## Common Methods

#### `withLanguage`

```php
withLanguage(string $language): self
```

Set the language per request. 
Only available for [`OneCall`](#one-call) and [`Weather`](#weather) API requests.

```php
use ProgrammatorDev\OpenWeatherMap\Language\Language

// uses the "pt" language for this request alone
$api->weather()
    ->withLanguage(Language::PORTUGUESE)
    ->getCurrent(50, 50);
```

#### `withUnitSystem`

```php
withUnitSystem(string $unitSystem): self
```

Set the unit system per request.
Only available for [`OneCall`](#one-call) and [`Weather`](#weather) API requests.

```php
use ProgrammatorDev\OpenWeatherMap\UnitSystem\UnitSystem;

// uses the "imperial" unit system for this request alone
$api->weather()
    ->withUnitSystem(UnitSystem::IMPERIAL)
    ->getCurrent(50, 50);
```

#### `withCacheTtl`

```php
withCacheTtl(?int $ttl): self
```

Makes a request and saves into cache for the provided duration in seconds. 

Semantics of values:
- `0`, the response will not be cached (if the servers specifies no `max-age`).
- `null`, the response will be cached for as long as it can (forever).

> [!NOTE]
> Setting cache to `null` or `0` seconds will **not** invalidate any existing cache.

[//]: # (Check the [Cache TTL]&#40;02-configuration.md#cache-ttl&#41; section for more information regarding default values.)

[//]: # (Available for all APIs if `cache` is enabled in the [configuration]&#40;02-configuration.md#cache&#41;.)

```php
// cache will be saved for 1 hour for this request alone
$api->weather()
    ->withCacheTtl(3600)
    ->getCurrent(50, 50);
```