<?php
/**
 * API.IR WordPress SDK
 * سرویس VehicleInfo — استعلام مشخصات و مدل خودرو
 *
 * @package  APIIR
 * @version  1.0.0
 * @link     https://api.ir
 */

defined('ABSPATH') || exit;

require_once __DIR__ . '/../core.php';

if (!function_exists('apiir_vehicle_info')) {
    /**
     * استعلام مشخصات و مدل خودرو
     *
     * دریافت شماره موتور، شماره شاسی، شماره VIN و مدل خودرو با کد ملی و شماره پلاک.
     *
     * @param string $nationalCode کد ملی
     * @param string $plateNumber  پلاک به فرمت: ایران 11 – 1111 ب 11
     * @param int    $timeout      مهلت پاسخ به ثانیه؛ پیش‌فرض این سرویس ۳۰ ثانیه (استعلام سبک، از تنظیم سراسری APIIR_TIMEOUT)
     * @return array success / code / message / data — خروجی data یک آرایه‌ی انجمنی (آبجکت) است
     */
    function apiir_vehicle_info($nationalCode, $plateNumber, $timeout = APIIR_TIMEOUT)
    {
        return apiir_request('https://s.api.ir/api/sw1/VehicleInfo', [
            'nationalCode' => $nationalCode,
            'plateNumber'  => $plateNumber,
        ], $timeout);
    }
}
