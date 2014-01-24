<?php

/**
 * Initial Forecast API settings
 */
$api_key = getenv('FORECAST_API_KEY');
$latitude = '39.983467';
$longitude = '-75.155582';
$forecast = new ForecastIO($api_key);
