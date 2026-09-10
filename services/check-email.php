<?php
/**
 * API.IR WordPress SDK
 * سرویس CheckEmail — اعتبار سنجی ایمیل
 *
 * @package  APIIR
 * @version  1.0.0
 * @link     https://api.ir
 */

defined('ABSPATH') || exit;

require_once __DIR__ . '/../core.php';

if (!function_exists('apiir_check_email')) {
    /**
     * اعتبار سنجی ایمیل
     *
     * بررسی صحت آدرس و فعال بودن یک ایمیل.
     *
     * @param string $email   ایمیل
     * @param int    $timeout مهلت پاسخ به ثانیه؛ پیش‌فرض این سرویس ۳۰ ثانیه (استعلام سبک، از تنظیم سراسری APIIR_TIMEOUT)
     * @return array success / code / message / data — خروجی data از نوع boolean است
     */
    function apiir_check_email($email, $timeout = APIIR_TIMEOUT)
    {
        return apiir_request('https://s.api.ir/api/sw1/CheckEmail', [
            'email' => $email,
        ], $timeout);
    }
}
