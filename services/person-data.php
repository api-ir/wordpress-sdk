<?php
/**
 * API.IR WordPress SDK
 * سرویس PersonData — استعلام مشخصات هویتی 2
 *
 * @package  APIIR
 * @version  1.0.0
 * @link     https://api.ir
 */

defined('ABSPATH') || exit;

require_once __DIR__ . '/../core.php';

if (!function_exists('apiir_person_data')) {
    /**
     * استعلام مشخصات هویتی 2
     *
     * دریافت مشخصات هویتی، وضعیت حیات و تصویر کارت ملی فرد از ثبت احوال (ارائه به سازمان‌ها با مجوزهای لازم).
     *
     * @param string $nationalCode کد ملی
     * @param string $birthDate    تاریخ تولد به فرمت 1370/1/1
     * @param int    $timeout      مهلت پاسخ به ثانیه؛ پیش‌فرض این سرویس ۶۰ ثانیه (پاسخ شامل تصویر کارت ملی به‌صورت Base64 است و حجم بیشتری دارد)
     * @return array success / code / message / data — خروجی data یک آرایه‌ی انجمنی (آبجکت) است
     */
    function apiir_person_data($nationalCode, $birthDate, $timeout = 60)
    {
        return apiir_request('https://s.api.ir/api/sw1/PersonData', [
            'nationalCode' => $nationalCode,
            'birthDate'    => $birthDate,
        ], $timeout);
    }
}
