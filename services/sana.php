<?php
/**
 * API.IR WordPress SDK
 * سرویس Sana — استعلام سامانه ثنا
 *
 * @package  APIIR
 * @version  1.0.0
 * @link     https://api.ir
 */

defined('ABSPATH') || exit;

require_once __DIR__ . '/../core.php';

if (!function_exists('apiir_sana')) {
    /**
     * استعلام سامانه ثنا
     *
     * بررسی داشتن یا نداشتن شماره ثنا برای شخص حقیقی یا حقوقی.
     *
     * @param string $nationalCode کد ملی یا شناسه ملی
     * @param bool   $isCompany    حقوقی یا حقیقی
     * @param int    $timeout      مهلت پاسخ به ثانیه؛ پیش‌فرض این سرویس ۳۰ ثانیه (استعلام سبک، از تنظیم سراسری APIIR_TIMEOUT)
     * @return array success / code / message / data — خروجی data از نوع boolean است
     */
    function apiir_sana($nationalCode, $isCompany = false, $timeout = APIIR_TIMEOUT)
    {
        return apiir_request('https://s.api.ir/api/sw1/Sana', [
            'nationalCode' => $nationalCode,
            'isCompany'    => (bool)$isCompany,
        ], $timeout);
    }
}
