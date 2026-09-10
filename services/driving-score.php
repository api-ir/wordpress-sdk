<?php
/**
 * API.IR WordPress SDK
 * سرویس DrivingScore — استعلام نمره منفی گواهینامه
 *
 * @package  APIIR
 * @version  1.0.0
 * @link     https://api.ir
 */

defined('ABSPATH') || exit;

require_once __DIR__ . '/../core.php';

if (!function_exists('apiir_driving_score')) {
    /**
     * استعلام نمره منفی گواهینامه
     *
     * دریافت نمرات منفی و تعداد خلافی ثبت‌شده روی گواهینامه‌ی رانندگی.
     *
     * @param string $nationalCode  کد ملی
     * @param string $mobile        شماره موبایل
     * @param string $licenseNumber شماره گواهینامه
     * @param int    $timeout       مهلت پاسخ به ثانیه؛ پیش‌فرض این سرویس ۳۰ ثانیه (استعلام سبک، از تنظیم سراسری APIIR_TIMEOUT)
     * @return array success / code / message / data — خروجی data یک آرایه‌ی انجمنی (آبجکت) است
     */
    function apiir_driving_score($nationalCode, $mobile, $licenseNumber, $timeout = APIIR_TIMEOUT)
    {
        return apiir_request('https://s.api.ir/api/sw1/DrivingScore', [
            'nationalCode'  => $nationalCode,
            'mobile'        => $mobile,
            'licenseNumber' => $licenseNumber,
        ], $timeout);
    }
}
