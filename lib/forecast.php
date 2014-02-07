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


/**
 * Forecast.io weather widget
 *
 * Generates a Forecast.io weather widget based
 * heavily on DuckDuckGo's JS widget.
 *
 * @link  https://github.com/duckduckgo/zeroclickinfo-spice/tree/master/share/spice/forecast DuckDuckGo Forecast.io JS widget
 *
 * @param  string  $container_class The wrapper class for the widget. Defaults to `forecast-widget`.
 * @param  integer $daily_num       The number of days to display. Defaults to 3. Maximum is 7.
 * @param  integer $max_temp_height The maximum height for the temperature bars. Default is 84 (px) (24px*3.5)
 *
 * @return html                   The widget
 */
function tuupdate_weather_widget($container_class = 'forecast-widget', $daily_num = 3, $max_temp_height = 84) {
    global $api_key, $latitude, $longitude, $forecast;

    $output = '';
    // Get conditions for next week, including today
    $week = $forecast->getForecastWeek($latitude, $longitude);
    // Get current conditions
    $current = $forecast->getCurrentConditions($latitude, $longitude);
    // Get hourly conditions
    $hourly = $forecast->getForecastToday($latitude, $longitude);

    // Current conditions variables
    $current_icon       = $current->getIcon();
    $current_temp       = round($current->getTemperature());
    $current_summary    = $current->getSummary();
    $current_wind_speed = round($current->getWindSpeed());
    $current_wind_dir   = tuupdate_get_compass_direction($current->getWindBearing());

    // Hourly conditions variables
    $hour_now           = $hourly[0];
    $hour_next          = $hourly[1];
    $hour_now_temp      = round($hour_now->getTemperature());
    $hour_next_temp     = round($hour_next->getTemperature());
    // Temperature change direction
    $temp_dir           = $hour_now_temp < $hour_next_temp ? 'rising' : 'falling';


    $output .= '
<div class="' . $container_class .'  widget--weather  widget">
    <div class="forecast">
        <div class="forecast__currently">
            <div class="conditions">
                <i class="conditions__icon--currently  conditions__icon  informative  text-hide  icon  icon--weather  icon-' . $current_icon . '" title="' . $current_summary . '">' . $current_summary . '</i>
            </div>
            <div class="temp"><span class="temp__str' . $current_temp . 'º</span><span class="temp__dir">and ' . $temp_dir . '</span></div>
            <div class="summary">' . $current_summary . '</div>
            <div class="wind">Wind: ' . $current_wind_speed . ' mph (' . $current_wind_dir . ')</div>
        </div>
        <div class="forecast__daily">';

        // Find weekly high and low temps, for scaling
        $Infinity      = INF;
        $high_temp     = -$Infinity;
        $low_temp      = $Infinity;

        for ( $i = 0; $i < $daily_num; $i++ ) :
            $day                  = $week[$i];
            $day_high             = $day->getMaxTemperature();
            $day_low              = $day->getMinTemperature();

            // This increases the temperature range until the end of the loop
            if ($day_high > $high_temp) $high_temp = $day_high;
            if ($day_low < $low_temp) $low_temp = $day_low;
        endfor;

        // Now create each day element
        $temp_span     = $high_temp - $low_temp;

        // Show next `$daily_num` days, including today
        for ( $i = 0; $i < $daily_num; $i++ ) :
            $day                  = $week[$i];
            $day_name             = $i === 0 ? 'Today' : $day->getTime('D');
            $day_icon             = $day->getIcon();
            $day_summary          = $day->getSummary();
            $day_high             = $day->getMaxTemperature();
            $day_low              = $day->getMinTemperature();
            $day_high_round       = round($day_high);
            $day_low_round        = round($day_low);

            $temp_height          = $max_temp_height * ($day_high - $day_low) / $temp_span;
            $temp_top             = $max_temp_height * ($high_temp - $day_high) / $temp_span;

            $output .= '
            <div class="forecast__daily__day" style="position: relative;">
                <div class="day-name">' . $day_name . '</div>
                <div class="conditions"><i class="conditions__icon--day  conditions__icon  informative  text-hide  icon  icon--weather  icon-' . $day_icon . '" title="' . $day_summary . '">' . $day_summary . '</i></div>
                <div class="temp-bar" style="height: ' . $temp_height . 'px; top: ' . $temp_top . ';">
                    <span class="temp-bar__hi">' . $day_high_round . 'º</span>
                    <span class="temp-bar__lo">' . $day_low_round . 'º</span>
                </div>
            </div>';
        endfor;
        $output .= '
        </div>
    </div><!-- /.forecast -->
</div><!-- /.' . $container_class . ' -->';

    return $output;

}
