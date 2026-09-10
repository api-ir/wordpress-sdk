<?php
/**
 * API.IR WordPress SDK
 * سرویس GeoToAddress — تبدیل لوکیشن به آدرس
 *
 * @package  APIIR
 * @version  1.0.0
 * @link     https://api.ir
 */

defined('ABSPATH') || exit;

require_once __DIR__ . '/../core.php';

if (!function_exists('apiir_geo_to_address')) {
    /**
     * تبدیل لوکیشن به آدرس
     *
     * دریافت استان، شهر و آدرس از مختصات Latitude و Longitude.
     *
     * @param float $latitude  مختصات Latitude
     * @param float $longitude مختصات Longitude
     * @param int   $timeout   مهلت پاسخ به ثانیه؛ پیش‌فرض این سرویس ۳۰ ثانیه (استعلام سبک، از تنظیم سراسری APIIR_TIMEOUT)
     * @return array success / code / message / data — خروجی data یک آرایه‌ی انجمنی (آبجکت) است
     */
    function apiir_geo_to_address($latitude, $longitude, $timeout = APIIR_TIMEOUT)
    {
        return apiir_request('https://s.api.ir/api/sw1/GeoToAddress', [
            'latitude'  => (float)$latitude,
            'longitude' => (float)$longitude,
        ], $timeout);
    }
}
