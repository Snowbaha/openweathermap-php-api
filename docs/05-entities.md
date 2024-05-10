# Entities

- [One Call](#one-call)
  - [Alert](#alert)
  - [MinuteForecast](#minuteforecast)
  - [OneCall](#onecall)
  - [Weather](#weather)
  - [WeatherAggregate](#weatheraggregate)
  - [WeatherLocation](#weatherlocation)
- [Weather](#weather-1)
  - [Weather](#weather-2)
  - [WeatherCollection](#weathercollection)
  - [WeatherData](#weatherdata)
- [Air Pollution](#air-pollution)
  - [AirPollution](#airpollution)
  - [AirPollutionCollection](#airpollutioncollection)
  - [AirPollutionData](#airpollutiondata)
  - [AirQuality](#airquality)
- [Geocoding](#geocoding)
  - [ZipLocation](#ziplocation)
- [Common](#common)
  - [Coordinate](#coordinate)
  - [Condition](#condition)
  - [Icon](#icon)
  - [Location](#location)
  - [MoonPhase](#moonphase)
  - [Temperature](#temperature)
  - [Timezone](#timezone)
  - [Wind](#wind)

## One Call

### Alert

- `getSenderName()`: `string`
- `getEventName()`: `string`
- `getStartsAt()`: `\DateTimeImmutable`
- `getEndsAt()`: `\DateTimeImmutable`
- `getDescription()`: `string`
- `getTags()`: `array`

### MinuteForecast

- `getDateTime()`: `\DateTimeImmutable`
- `getPrecipitation()`: `float`

### OneCall

- `getCoordinate()`: [`Coordinate`](#coordinate)
- `getTimezone()`: [`Timezone`](#timezone)
- `getCurrent()`: [`Weather`](#weather)
- `getMinutelyForecast()`: [`?MinuteForecast[]`](#minuteforecast)
- `getHourlyForecast()`: [`Weather[]`](#weather)
- `getDailyForecast()`: [`Weather[]`](#weather)
- `getAlerts()`: [`?Alert[]`](#alert)

### Weather

- `getDateTime()`: `\DateTimeImmutable`
- `getSunriseAt()`: `?\DateTimeImmutable`
- `getSunsetAt()`: `?\DateTimeImmutable`
- `getMoonriseAt()`: `?\DateTimeImmutable`
- `getMoonsetAt()`: `?\DateTimeImmutable`
- `getMoonPhase()`: [`?MoonPhase`](#moonphase)
- `getTemperature()`: `float`|[`Temperature`](#temperature)
- `getTemperatureFeelsLike()`: `float`|[`Temperature`](#temperature)
- `getDescription()`: `?string`
- `getAtmosphericPressure()`: `int`
- `getHumidity()`: `int`
- `getDewPoint()`: `?float`
- `getUltraVioletIndex()`: `?float`
- `getCloudiness()`: `int`
- `getVisibility()`: `?int`
- `getWind()`: [`Wind`](#wind)
- `getPrecipitationProbability()`: `?int`
- `getRain()`: `null`|`float`|[`Rain`](#rain)
- `getSnow()`: `null`|`float`|[`Snow`](#snow)
- `getWeatherConditions()`: [`WeatherCondition[]`](#weathercondition)

### WeatherAggregate

- `getCoordinate()`: [`Coordinate`](#coordinate)
- `getTimezone()`: [`Timezone`](#timezone)
- `getDateTime()`: `\DateTimeImmutable`
- `getCloudiness()`: `int`
- `getHumidity()`: `int`
- `getPrecipitation()`: `float`
- `getTemperature()`: [`Temperature`](#temperature)
- `getAtmosphericPressure()`: `int`
- `getWind()`: [`Wind`](#wind)

### WeatherLocation

- `getCoordinate()`: [`Coordinate`](#coordinate)
- `getTimezone()`: [`Timezone`](#timezone)
- `getDateTime()`: `\DateTimeImmutable`
- `getSunriseAt()`: `?\DateTimeImmutable`
- `getSunsetAt()`: `?\DateTimeImmutable`
- `getMoonriseAt()`: `?\DateTimeImmutable`
- `getMoonsetAt()`: `?\DateTimeImmutable`
- `getMoonPhase()`: [`?MoonPhase`](#moonphase)
- `getTemperature()`: `float`|[`Temperature`](#temperature)
- `getTemperatureFeelsLike()`: `float`|[`Temperature`](#temperature)
- `getDescription()`: `?string`
- `getAtmosphericPressure()`: `int`
- `getHumidity()`: `int`
- `getDewPoint()`: `?float`
- `getUltraVioletIndex()`: `?float`
- `getCloudiness()`: `int`
- `getVisibility()`: `?int`
- `getWind()`: [`Wind`](#wind)
- `getPrecipitationProbability()`: `?int`
- `getRain()`: `null`|`float`|[`Rain`](#rain)
- `getSnow()`: `null`|`float`|[`Snow`](#snow)
- `getWeatherConditions()`: [`WeatherCondition[]`](#weathercondition)

## Weather

### Weather

- `getLocation()`: [`Location`](#location)
- `getDateTime()`: `\DateTimeImmutable`
- `getTemperature()`: `float`
- `getTemperatureFeelsLike()`: `float`
- `getMinTemperature()`: `float`
- `getMaxTemperature()`: `float`
- `getHumidity()`: `int`
- `getCloudiness()`: `int`
- `getVisibility()`: `int`
- `getAtmosphericPressure()`: `int`
- `getConditions()`: [`Condition[]`](#condition)
- `getWind()`: [`Wind`](#wind)
- `getPrecipitationProbability()`: `?int`
- `getRainVolume()`: `?float`
- `getSnowVolume()`: `?float`

### WeatherCollection

- `getNumResults()`: `int`
- `getLocation()`: [`Location`](#location)
- `getData()`: [`WeatherData[]`](#weatherdata)

### WeatherData

- `getDateTime()`: `\DateTimeImmutable`
- `getTemperature()`: `float`
- `getTemperatureFeelsLike()`: `float`
- `getMinTemperature()`: `float`
- `getMaxTemperature()`: `float`
- `getHumidity()`: `int`
- `getCloudiness()`: `int`
- `getVisibility()`: `int`
- `getAtmosphericPressure()`: `int`
- `getConditions()`: [`Condition[]`](#condition)
- `getWind()`: [`Wind`](#wind)
- `getPrecipitationProbability()`: `?int`
- `getRainVolume()`: `?float`
- `getSnowVolume()`: `?float`

## Air Pollution

### AirPollution

- `getCoordinate()`: [`Coordinate`](#coordinate)
- `getDateTime()`: `\DateTimeImmutable`
- `getAirQuality`: [`AirQuality`](#airquality)
- `getCarbonMonoxide()`: `float`
- `getNitrogenMonoxide()`: `float`
- `getNitrogenDioxide()`: `float`
- `getOzone()`: `float`
- `getSulphurDioxide()`: `float`
- `getFineParticulateMatter()`: `float`
- `getCoarseParticulateMatter()`: `float`
- `getAmmonia()`: `float`

### AirPollutionCollection

- `getNumResults()`: `int`
- `getCoordinate()`: [`Coordinate`](#coordinate)
- `getData()`: [`AirPollutionData[]`](#airpollutiondata)

### AirPollutionData

- `getDateTime()`: `\DateTimeImmutable`
- `getAirQuality`: [`AirQuality`](#airquality)
- `getCarbonMonoxide()`: `float`
- `getNitrogenMonoxide()`: `float`
- `getNitrogenDioxide()`: `float`
- `getOzone()`: `float`
- `getSulphurDioxide()`: `float`
- `getFineParticulateMatter()`: `float`
- `getCoarseParticulateMatter()`: `float`
- `getAmmonia()`: `float`

### AirQuality

- `getIndex()`: `int`
- `getQualitativeName()`: `string`

## Geocoding

### ZipLocation

- `getZipCode()`: `string`
- `getName()`: `string`
- `getCountryCode()`: `string`
- `getCoordinate()`: [`Coordinate`](#coordinate)

## Common

### Coordinate

- `getLatitude()`: `float`
- `getLongitude()`: `float`

### Condition

- `getId()`: `int`
- `getName()`: `string`
- `getDescription()`: `string`
- `getIcon()`: [`Icon`](#icon)
- `getSystemName()`: `string`

### Icon

- `getId()`: `string`
- `getUrl()`: `string`

### Location

- `getCoordinate()`: [`Coordinate`](#coordinate)
- `getId()`: `?int`
- `getName()`: `?string`
- `getState()`: `?string`
- `getCountryCode()`: `?string`
- `getLocalNames()`: `?array`
- `getLocalName(string $countryCode)`: `?string`
- `getPopulation()`: `?int`
- `getTimezone()`: [`?Timezone`](#timezone)
- `getSunriseAt()`: `?\DateTimeImmutable`
- `getSunsetAt()`: `?\DateTimeImmutable`

### MoonPhase

- `getValue()`: `float`
- `getName()`: `string`
- `getSysName()`: `string`

### Temperature

- `getMorning()`: `float`
- `getDay()`: `float`
- `getEvening()`: `float`
- `getNight()`: `float`
- `getMin()`: `?float`
- `getMax()`: `?float`

### Timezone

- `getOffset()`: `int`
- `getIdentifier()`: `?string`

### Wind

- `getSpeed()`: `float`
- `getDirection()`: `int`
- `getGust()`: `?float`