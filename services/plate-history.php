<?php
/**
 * API.IR WordPress SDK
 * سرویس PlateHistory — استعلام تاریخچه پلاک
 *
 * @package  APIIR
 * @version  1.0.0
 * @link     https://api.ir
 */

defined('ABSPATH') || exit;

require_once __DIR__ . '/../core.php';

if (!function_exists('apiir_plate_history')) {
    /**
     * استعلام تاریخچه پلاک
     *
     * دریافت تاریخچه‌ی کامل یک پلاک شامل مدل خودرو، سال ساخت و تاریخ نصب و جداسازی.
     *
     * @param string $nationalCode کد ملی
     * @param string $plateNumber  پلاک به فرمت: ایران 11 – 1111 ب 11
     * @param int    $timeout      مهلت پاسخ به ثانیه؛ پیش‌فرض این سرویس ۳۰ ثانیه (استعلام سبک، از تنظیم سراسری APIIR_TIMEOUT)
     * @return array success / code / message / data — خروجی data یک آرایه‌ی انجمنی (آبجکت) است
     */
    function apiir_plate_history($nationalCode, $plateNumber, $timeout = APIIR_TIMEOUT)
    {
        return apiir_request('https://s.api.ir/api/sw1/PlateHistory', [
            'nationalCode' => $nationalCode,
            'plateNumber'  => $plateNumber,
        ], $timeout);
    }
}
