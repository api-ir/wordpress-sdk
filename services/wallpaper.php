<?php
/**
 * API.IR WordPress SDK
 * سرویس Wallpaper — وب سرویس بگراند پویا برنامه
 *
 * @package  APIIR
 * @version  1.0.0
 * @link     https://api.ir
 */

defined('ABSPATH') || exit;

require_once __DIR__ . '/../core.php';

if (!function_exists('apiir_wallpaper')) {
    /**
     * وب سرویس بگراند پویا برنامه
     *
     * دریافت تصویر پس‌زمینه‌ی جدید روزانه از سراسر جهان برای جذاب‌تر کردن محیط نرم‌افزار یا سایت.
     *
     * @param int $timeout مهلت پاسخ به ثانیه؛ پیش‌فرض این سرویس ۳۰ ثانیه (استعلام سبک، از تنظیم سراسری APIIR_TIMEOUT)
     * @return array success / code / message / data — خروجی data از نوع string است
     */
    function apiir_wallpaper($timeout = APIIR_TIMEOUT)
    {
        return apiir_request('https://s.api.ir/api/sw1/Wallpaper', [], $timeout);
    }
}
