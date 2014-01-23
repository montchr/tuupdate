<?php

/**
 * Initial Forecast API settings
 */
$api_key = getenv('FORECAST_API_KEY');
$latitude = '39.95';
$longitude = '-75.166667';
$forecast = new ForecastIO($api_key);
