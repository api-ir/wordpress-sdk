<?php
/**
 * API.IR WordPress SDK
 * سرویس PostalTracking — سرویس رهیگیری بسته پستی
 *
 * @package  APIIR
 * @version  1.0.0
 * @link     https://api.ir
 */

defined('ABSPATH') || exit;

require_once __DIR__ . '/../core.php';

if (!function_exists('apiir_postal_tracking')) {
    /**
     * سرویس رهیگیری بسته پستی
     *
     * دریافت وضعیت و همه‌ی رویدادهای یک مرسوله‌ی پستی از تولید بارکد تا تحویل با کد رهگیری.
     *
     * @param string $trackingCode کد رهیگیری مرسوله
     * @param int    $timeout      مهلت پاسخ به ثانیه؛ پیش‌فرض این سرویس ۳۰ ثانیه (استعلام سبک، از تنظیم سراسری APIIR_TIMEOUT)
     * @return array success / code / message / data — خروجی data یک آرایه‌ی انجمنی (آبجکت) است
     */
    function apiir_postal_tracking($trackingCode, $timeout = APIIR_TIMEOUT)
    {
        return apiir_request('https://s.api.ir/api/sw1/PostalTracking', [
            'trackingCode' => $trackingCode,
        ], $timeout);
    }
}
