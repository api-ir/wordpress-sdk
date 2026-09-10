<?php
/**
 * API.IR WordPress SDK
 * سرویس MyIP — وب سرویس دریافت IP برنامه (کلاینت)
 *
 * @package  APIIR
 * @version  1.0.0
 * @link     https://api.ir
 */

defined('ABSPATH') || exit;

require_once __DIR__ . '/../core.php';

if (!function_exists('apiir_my_ip')) {
    /**
     * وب سرویس دریافت IP برنامه (کلاینت)
     *
     * دریافت IP خروجی برنامه‌ی شما؛ برای بررسی اتصال و تنظیم محدودیت IP روی کلیدها.
     *
     * @param int $timeout مهلت پاسخ به ثانیه؛ پیش‌فرض این سرویس ۳۰ ثانیه (استعلام سبک، از تنظیم سراسری APIIR_TIMEOUT)
     * @return array success / code / message / data — خروجی data از نوع string است
     */
    function apiir_my_ip($timeout = APIIR_TIMEOUT)
    {
        return apiir_request('https://s.api.ir/api/sw1/MyIP', [], $timeout);
    }
}
