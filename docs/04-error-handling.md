# Error Handling

- [API Errors](#api-errors)
- [Validation Errors](#validation-errors)

## API Errors

To handle API response errors, multiple exceptions are provided. You can see all available in the following example:

```php
use ProgrammatorDev\OpenWeatherMap\Exception\BadRequestException;
use ProgrammatorDev\OpenWeatherMap\Exception\NotFoundException;
use ProgrammatorDev\OpenWeatherMap\Exception\TooManyRequestsException;
use ProgrammatorDev\OpenWeatherMap\Exception\UnauthorizedException;
use ProgrammatorDev\OpenWeatherMap\Exception\UnexpectedErrorException;

try {
    $location = $api->geocoding()->getByZipCode('1000-001', 'pt');
    $coordinate = $location->getCoordinate();
    
    $weather = $api->oneCall()->getWeather(
        $coordinate->getLatitude(), 
        $coordinate->getLongitude()
    );
}
// bad request to the API
catch (BadRequestException $exception) {
    echo $exception->getCode(); // 400
    echo $exception->getMessage();
}
// invalid API key or trying to request an endpoint with no granted access
catch (UnauthorizedException $exception) {
    echo $exception->getCode(); // 401
    echo $exception->getMessage();
}
// resource not found
// for example, when trying to get a location with a zip code that does not exist
catch (NotFoundException $exception) {
    echo $exception->getCode(); // 404
    echo $exception->getMessage();
}
// API key requests quota exceeded
catch (TooManyRequestsException $exception) {
    echo $exception->getCode(); // 429
    echo $exception->getMessage();
}
// any other error, probably an internal error
catch (UnexpectedErrorException $exception) {
    echo $exception->getCode(); // 5xx
    echo $exception->getMessage();
}
```

To catch all API errors with a single exception, `ApiErrorException` is available:

```php
use ProgrammatorDev\OpenWeatherMap\Exception\ApiErrorException;

try {
    $location = $api->geocoding()->getByZipCode('1000-001', 'pt');
    $coordinate = $location->getCoordinate();
    
    $weather = $api->oneCall()->getWeather(
        $coordinate->getLatitude(), 
        $coordinate->getLongitude()
    );
}
// catches all API response errors
catch (ApiErrorException $exception) {
    echo $exception->getCode();
    echo $exception->getMessage();
}
```

## Validation Errors

To catch invalid input data (like an out of range coordinate, blank location name, etc.), the `ValidationException` is available:

```php
use ProgrammatorDev\Validator\Exception\ValidationException;

try {
    // an invalid latitude value is given
    $weather = $api->weather()->getCurrent(999, 50);
}
catch (ValidationException $exception) {
    // should print:
    // The latitude value should be between -90 and 90, 999 given.
    echo $exception->getMessage();
}
```