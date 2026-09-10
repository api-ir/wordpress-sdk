<?php
/**
 * API.IR WordPress SDK
 * سرویس Enamad — استعلام دارنده اینماد
 *
 * @package  APIIR
 * @version  1.0.0
 * @link     https://api.ir
 */

defined('ABSPATH') || exit;

require_once __DIR__ . '/../core.php';

if (!function_exists('apiir_enamad')) {
    /**
     * استعلام دارنده اینماد
     *
     * استعلام وضعیت نماد اعتماد الکترونیکی (اینماد) یک وب‌سایت.
     *
     * @param string $domain  نام دامنه
     * @param int    $timeout مهلت پاسخ به ثانیه؛ پیش‌فرض این سرویس ۳۰ ثانیه (استعلام سبک، از تنظیم سراسری APIIR_TIMEOUT)
     * @return array success / code / message / data — خروجی data یک آرایه‌ی انجمنی (آبجکت) است
     */
    function apiir_enamad($domain, $timeout = APIIR_TIMEOUT)
    {
        return apiir_request('https://s.api.ir/api/sw1/Enamad', [
            'domain' => $domain,
        ], $timeout);
    }
}
