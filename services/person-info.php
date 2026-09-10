<?php
/**
 * API.IR WordPress SDK
 * سرویس PersonInfo — استعلام مشخصات هویتی
 *
 * @package  APIIR
 * @version  1.0.0
 * @link     https://api.ir
 */

defined('ABSPATH') || exit;

require_once __DIR__ . '/../core.php';

if (!function_exists('apiir_person_info')) {
    /**
     * استعلام مشخصات هویتی
     *
     * دریافت مشخصات هویتی و وضعیت حیات فرد از ثبت احوال با کد ملی و تاریخ تولد (نیازمند سطح مجوز trust level).
     *
     * @param string $nationalCode کد ملی
     * @param string $birthDate    تاریخ تولد به فرمت 1370/1/1
     * @param int    $timeout      مهلت پاسخ به ثانیه؛ پیش‌فرض این سرویس ۳۰ ثانیه (استعلام سبک، از تنظیم سراسری APIIR_TIMEOUT)
     * @return array success / code / message / data — خروجی data یک آرایه‌ی انجمنی (آبجکت) است
     */
    function apiir_person_info($nationalCode, $birthDate, $timeout = APIIR_TIMEOUT)
    {
        return apiir_request('https://s.api.ir/api/sw1/PersonInfo', [
            'nationalCode' => $nationalCode,
            'birthDate'    => $birthDate,
        ], $timeout);
    }
}
