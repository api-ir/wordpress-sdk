<?php
/**
 * API.IR WordPress SDK
 * سرویس IPIsIran — وب سرویس تشخیص IP ایرانی
 *
 * @package  APIIR
 * @version  1.0.0
 * @link     https://api.ir
 */

defined('ABSPATH') || exit;

require_once __DIR__ . '/../core.php';

if (!function_exists('apiir_ip_is_iran')) {
    /**
     * وب سرویس تشخیص IP ایرانی
     *
     * تشخیص ایرانی بودن آدرس IP کاربر.
     *
     * @param string $ip      آی پی ورژن 4
     * @param int    $timeout مهلت پاسخ به ثانیه؛ پیش‌فرض این سرویس ۳۰ ثانیه (استعلام سبک، از تنظیم سراسری APIIR_TIMEOUT)
     * @return array success / code / message / data — خروجی data از نوع boolean است
     */
    function apiir_ip_is_iran($ip, $timeout = APIIR_TIMEOUT)
    {
        return apiir_request('https://s.api.ir/api/sw1/IPIsIran', [
            'ip' => $ip,
        ], $timeout);
    }
}
