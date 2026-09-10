<?php
/**
 * API.IR WordPress SDK
 * سرویس Shahkar — احراز هویت شاهکار
 *
 * @package  APIIR
 * @version  1.0.0
 * @link     https://api.ir
 */

defined('ABSPATH') || exit;

require_once __DIR__ . '/../core.php';

if (!function_exists('apiir_shahkar')) {
    /**
     * احراز هویت شاهکار
     *
     * تطبیق کد ملی یا شناسه ملی با شماره موبایل؛ داده‌ها به‌صورت رمزشده استعلام می‌شود.
     *
     * @param string $nationalCode کد ملی یا شناسه ملی
     * @param string $mobile       موبایل با فرمت 09120001111
     * @param bool   $isCompany    حقوقی یا حقیقی
     * @param int    $timeout      مهلت پاسخ به ثانیه؛ پیش‌فرض این سرویس ۳۰ ثانیه (استعلام سبک، از تنظیم سراسری APIIR_TIMEOUT)
     * @return array success / code / message / data — خروجی data از نوع boolean است
     */
    function apiir_shahkar($nationalCode, $mobile, $isCompany = false, $timeout = APIIR_TIMEOUT)
    {
        return apiir_request('https://s.api.ir/api/sw1/Shahkar', [
            'nationalCode' => $nationalCode,
            'mobile'       => $mobile,
            'isCompany'    => (bool)$isCompany,
        ], $timeout);
    }
}
