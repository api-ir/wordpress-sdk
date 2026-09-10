<?php
/**
 * API.IR WordPress SDK
 * سرویس DrivingLicense — استعلام گواهینامه رانندگی جدید
 *
 * @package  APIIR
 * @version  1.0.0
 * @link     https://api.ir
 */

defined('ABSPATH') || exit;

require_once __DIR__ . '/../core.php';

if (!function_exists('apiir_driving_license')) {
    /**
     * استعلام گواهینامه رانندگی جدید
     *
     * بررسی اعتبار گواهینامه‌های رانندگی فرد (نسخه‌ی جدید سرویس).
     *
     * @param string $nationalCode کد ملی یا شناسه ملی
     * @param string $mobile       موبایل با فرمت 09120001111
     * @param int    $timeout      مهلت پاسخ به ثانیه؛ پیش‌فرض این سرویس ۳۰ ثانیه (استعلام سبک، از تنظیم سراسری APIIR_TIMEOUT)
     * @return array success / code / message / data — خروجی data یک آرایه‌ی انجمنی (آبجکت) است
     */
    function apiir_driving_license($nationalCode, $mobile, $timeout = APIIR_TIMEOUT)
    {
        return apiir_request('https://s.api.ir/api/sw1/DrivingLicense', [
            'nationalCode' => $nationalCode,
            'mobile'       => $mobile,
        ], $timeout);
    }
}
