<?php
/**
 * API.IR WordPress SDK
 * سرویس ShahkarLite — احراز هویت شاهکار Lite
 *
 * @package  APIIR
 * @version  1.0.0
 * @link     https://api.ir
 */

defined('ABSPATH') || exit;

require_once __DIR__ . '/../core.php';

if (!function_exists('apiir_shahkar_lite')) {
    /**
     * احراز هویت شاهکار Lite
     *
     * نسخه‌ی Lite شاهکار؛ تطبیق کد ملی با شماره موبایل با قیمت کمتر، مناسب کسب‌وکارهای کوچک.
     *
     * @param string $nationalCode کد ملی
     * @param string $mobile       موبایل با فرمت 09120001111
     * @param int    $timeout      مهلت پاسخ به ثانیه؛ پیش‌فرض این سرویس ۳۰ ثانیه (استعلام سبک، از تنظیم سراسری APIIR_TIMEOUT)
     * @return array success / code / message / data — خروجی data از نوع boolean است
     */
    function apiir_shahkar_lite($nationalCode, $mobile, $timeout = APIIR_TIMEOUT)
    {
        return apiir_request('https://s.api.ir/api/sw1/ShahkarLite', [
            'nationalCode' => $nationalCode,
            'mobile'       => $mobile,
        ], $timeout);
    }
}
