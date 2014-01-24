<?php

/**
 * Initial Forecast API settings
 */
$api_key = getenv('FORECAST_API_KEY');
$latitude = '39.983467';
$longitude = '-75.155582';
$forecast = new ForecastIO($api_key);


/**
 * Get a compass direction from a bearing
 *
 * @link https://www.dougv.com/2009/07/13/calculating-the-bearing-and-compass-rose-direction-between-two-latitude-longitude-coordinates-in-php/
 *
 * @param  integer $bearing A compass bearing between 0 and 359
 * @return string           The direction
 */
function tuupdate_get_compass_direction($bearing) {
    $tmp = round($bearing / 22.5);
    switch($tmp) {
        case 1:
             $direction = "NNE";
             break;
        case 2:
             $direction = "NE";
             break;
        case 3:
             $direction = "ENE";
             break;
        case 4:
             $direction = "E";
             break;
        case 5:
             $direction = "ESE";
             break;
        case 6:
             $direction = "SE";
             break;
        case 7:
             $direction = "SSE";
             break;
        case 8:
             $direction = "S";
             break;
        case 9:
             $direction = "SSW";
             break;
        case 10:
             $direction = "SW";
             break;
        case 11:
             $direction = "WSW";
             break;
        case 12:
             $direction = "W";
             break;
        case 13:
             $direction = "WNW";
             break;
        case 14:
             $direction = "NW";
             break;
        case 15:
             $direction = "NNW";
             break;
        default:
             $direction = "N";
    }
    return $direction;
}


function tuupdate_weather_widget($container_class = 'forecast-widget', $nextdays_num = 3) {
    global $api_key, $latitude, $longitude, $forecast;

    $output = '';
    // Get conditions for next week, including today
    $conditions_week = $forecast->getForecastWeek($latitude, $longitude);
    // Get current conditions
    $conditions_current = $forecast->getCurrentConditions($latitude, $longitude);
    // Get hourly conditions
    $conditions_hourly = $forecast->getForecastToday($latitude, $longitude);

    // Current conditions variables
    $current_icon       = $conditions_current->getIcon();
    $current_temp       = round($conditions_current->getTemperature());
    $current_summary    = $conditions_current->getSummary();
    $current_wind_speed = round($conditions_current->getWindSpeed());
    $current_wind_dir   = tuupdate_get_compass_direction($conditions_current->getWindBearing());

    // Hourly conditions variables
    $hour_now           = $conditions_hourly[0];
    $hour_next          = $conditions_hourly[1];
    $hour_now_temp      = round($hour_now->getTemperature());
    $hour_next_temp     = round($hour_next->getTemperature());
    // Temperature change direction
    $temp_dir           = $hour_now_temp < $hour_next_temp ? 'rising' : 'falling';


    $output .= '
<div class="' . $container_class . '  widget--weather  widget">
    <div class="grid  grid--full">
        <div class="forecast-widget__currently  one-half  grid__item">
            <div class="conditions">
                <i class="conditions__icon  informative  text-hide  icon  icon--weather  icon-' . $current_icon . '" title="' . $current_summary . '">' . $current_summary . '</i>
            </div>
            <div class="temp">' . $current_temp . 'º<span class="temp-dir">and ' . $temp_dir . '</span></div>
            <div class="summary">' . $current_summary . '</div>
            <div class="wind">Wind: ' . $current_wind_speed . ' mph (' . $current_wind_dir . ')</div>
        </div><!-- /.forecast-widget__currently
        --><div class="forecast-widget__nextdays  one-half  grid__item">';

    // Show next `$nextdays_num` days, including today
    for ( $i = 0; $i < $nextdays_num; $i++ ) :
        $conditions_day = $conditions_week[$i];
        $day_name       = $i === 0 ? 'Today' : $conditions_day->getTime('D');
        $day_icon       = $conditions_day->getIcon();
        $day_summary    = $conditions_day->getSummary();
        $day_high       = round($conditions_day->getMaxTemperature());
        $day_low        = round($conditions_day->getMinTemperature());

        $output .= '
            <div class="forecast-widget__nextdays__day">
                <div class="day-name">' . $day_name . '</div>
                <div class="conditions"><i class="conditions__icon  informative  text-hide  icon  icon--weather  icon-' . $day_icon . '" title="' . $day_summary . '">' . $day_summary . '</i></div>
                <div class="temp-bar">
                    <div class="temp-bar__hi">' . $day_high . 'º</div>



                    <div class="temp-bar__lo">' . $day_low . 'º</div>
                </div>
            </div>';
    endfor;
    $output .= '
        </div>
    </div>
</div><!-- /.' . $container_class . ' -->';

    return $output;

}
