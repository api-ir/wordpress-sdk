<?php
/**
 * API.IR WordPress SDK
 * سرویس License — استعلام اعتبار مجوز شغلی
 *
 * @package  APIIR
 * @version  1.0.0
 * @link     https://api.ir
 */

defined('ABSPATH') || exit;

require_once __DIR__ . '/../core.php';

if (!function_exists('apiir_license')) {
    /**
     * استعلام اعتبار مجوز شغلی
     *
     * استعلام اعتبار مجوز شغلی (پروانه کسب) شخصی یا شرکتی با کد پیگیری مجوز.
     *
     * @param string $trackingCode کد پیگیری مجوز
     * @param int    $timeout      مهلت پاسخ به ثانیه؛ پیش‌فرض این سرویس ۳۰ ثانیه (استعلام سبک، از تنظیم سراسری APIIR_TIMEOUT)
     * @return array success / code / message / data — خروجی data یک آرایه‌ی انجمنی (آبجکت) است
     */
    function apiir_license($trackingCode, $timeout = APIIR_TIMEOUT)
    {
        return apiir_request('https://s.api.ir/api/sw1/License', [
            'trackingCode' => $trackingCode,
        ], $timeout);
    }
}
