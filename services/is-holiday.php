<?php
/**
 * API.IR WordPress SDK
 * سرویس IsHoliday — استعلام تعطیلی امروز
 *
 * @package  APIIR
 * @version  1.0.0
 * @link     https://api.ir
 */

defined('ABSPATH') || exit;

require_once __DIR__ . '/../core.php';

if (!function_exists('apiir_is_holiday')) {
    /**
     * استعلام تعطیلی امروز
     *
     * تعیین تعطیل بودن امروز؛ برای اجرا یا توقف برخی سرویس‌ها در روزهای تعطیل.
     *
     * @param bool $weekend تعطیلات آخر هفته هم لحاظ شود؟
     * @param int  $timeout مهلت پاسخ به ثانیه؛ پیش‌فرض این سرویس ۳۰ ثانیه (استعلام سبک، از تنظیم سراسری APIIR_TIMEOUT)
     * @return array success / code / message / data — خروجی data از نوع boolean است
     */
    function apiir_is_holiday($weekend = true, $timeout = APIIR_TIMEOUT)
    {
        return apiir_request('https://s.api.ir/api/sw1/IsHoliday', [
            'weekend' => (bool)$weekend,
        ], $timeout);
    }
}
