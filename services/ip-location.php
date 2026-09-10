<?php
/**
 * API.IR WordPress SDK
 * سرویس IPLocation — وب سرویس تشخیص موقعیت IP
 *
 * @package  APIIR
 * @version  1.0.0
 * @link     https://api.ir
 */

defined('ABSPATH') || exit;

require_once __DIR__ . '/../core.php';

if (!function_exists('apiir_ip_location')) {
    /**
     * وب سرویس تشخیص موقعیت IP
     *
     * دریافت موقعیت جغرافیایی و مشخصات شبکه‌ی یک آدرس IP نسخه‌ی ۴.
     *
     * @param string $ip      آی پی ورژن 4
     * @param int    $timeout مهلت پاسخ به ثانیه؛ پیش‌فرض این سرویس ۳۰ ثانیه (استعلام سبک، از تنظیم سراسری APIIR_TIMEOUT)
     * @return array success / code / message / data — خروجی data یک آرایه‌ی انجمنی (آبجکت) است
     */
    function apiir_ip_location($ip, $timeout = APIIR_TIMEOUT)
    {
        return apiir_request('https://s.api.ir/api/sw1/IPLocation', [
            'ip' => $ip,
        ], $timeout);
    }
}
