<?php
/**
 * API.IR WordPress SDK
 * سرویس PostalCodeLocation — سرویس دریافت لوکیشن با کدپستی
 *
 * @package  APIIR
 * @version  1.0.0
 * @link     https://api.ir
 */

defined('ABSPATH') || exit;

require_once __DIR__ . '/../core.php';

if (!function_exists('apiir_postal_code_location')) {
    /**
     * سرویس دریافت لوکیشن با کدپستی
     *
     * دریافت مختصات جغرافیایی و لینک نقشه‌ی یک کد پستی؛ مناسب تحویل مرسوله و راهنمایی پیک.
     *
     * @param string $postalCode کد پستی
     * @param int    $timeout    مهلت پاسخ به ثانیه؛ پیش‌فرض این سرویس ۳۰ ثانیه (استعلام سبک، از تنظیم سراسری APIIR_TIMEOUT)
     * @return array success / code / message / data — خروجی data یک آرایه‌ی انجمنی (آبجکت) است
     */
    function apiir_postal_code_location($postalCode, $timeout = APIIR_TIMEOUT)
    {
        return apiir_request('https://s.api.ir/api/sw1/PostalCodeLocation', [
            'postalCode' => $postalCode,
        ], $timeout);
    }
}
