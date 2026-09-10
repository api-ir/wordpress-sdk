<?php
/**
 * API.IR WordPress SDK
 * سرویس ActivePlates — استعلام پلاک های فعال
 *
 * @package  APIIR
 * @version  1.0.0
 * @link     https://api.ir
 */

defined('ABSPATH') || exit;

require_once __DIR__ . '/../core.php';

if (!function_exists('apiir_active_plates')) {
    /**
     * استعلام پلاک های فعال
     *
     * دریافت فهرست کامل پلاک‌های فرد همراه با وضعیت فعال یا فک‌شده، تاریخ و توضیحات فک.
     *
     * @param string $nationalCode کد ملی صاحب خودرو
     * @param string $mobile       شماره موبایل صاحب خودرو
     * @param int    $timeout      مهلت پاسخ به ثانیه؛ پیش‌فرض این سرویس ۳۰ ثانیه (استعلام سبک، از تنظیم سراسری APIIR_TIMEOUT)
     * @return array success / code / message / data — خروجی data آرایه‌ای از آبجکت‌ها است
     */
    function apiir_active_plates($nationalCode, $mobile, $timeout = APIIR_TIMEOUT)
    {
        return apiir_request('https://s.api.ir/api/sw1/ActivePlates', [
            'nationalCode' => $nationalCode,
            'mobile'       => $mobile,
        ], $timeout);
    }
}
