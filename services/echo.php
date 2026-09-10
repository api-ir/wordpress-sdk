<?php
/**
 * API.IR WordPress SDK
 * سرویس Echo — Echo
 *
 * @package  APIIR
 * @version  1.0.0
 * @link     https://api.ir
 */

defined('ABSPATH') || exit;

require_once __DIR__ . '/../core.php';

if (!function_exists('apiir_echo')) {
    /**
     * Echo
     *
     * تست، دیباگ و پیاده‌سازی اولیه به‌صورت رایگان؛ ساختار پاسخ با سایر وب‌سرویس‌ها یکسان است.
     *
     * @param string $name    نام شما؟
     * @param int    $timeout مهلت پاسخ به ثانیه؛ پیش‌فرض این سرویس ۳۰ ثانیه (استعلام سبک، از تنظیم سراسری APIIR_TIMEOUT)
     * @return array success / code / message / data — خروجی data یک آرایه‌ی انجمنی (آبجکت) است
     */
    function apiir_echo($name, $timeout = APIIR_TIMEOUT)
    {
        return apiir_request('https://s.api.ir/api/Sandbox/Echo', [
            'name' => $name,
        ], $timeout);
    }
}
