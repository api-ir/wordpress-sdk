<?php
/**
 * API.IR WordPress SDK
 * سرویس CompanyMembers — استعلام اعضای هیئت مدیره
 *
 * @package  APIIR
 * @version  1.0.0
 * @link     https://api.ir
 */

defined('ABSPATH') || exit;

require_once __DIR__ . '/../core.php';

if (!function_exists('apiir_company_members')) {
    /**
     * استعلام اعضای هیئت مدیره
     *
     * دریافت فهرست اعضای هیئت مدیره و سهامداران یک شرکت همراه با سمت‌ها.
     *
     * @param string $nationalID شناسه ملی شرکت
     * @param int    $timeout    مهلت پاسخ به ثانیه؛ پیش‌فرض این سرویس ۳۰ ثانیه (استعلام سبک، از تنظیم سراسری APIIR_TIMEOUT)
     * @return array success / code / message / data — خروجی data یک آرایه‌ی انجمنی (آبجکت) است
     */
    function apiir_company_members($nationalID, $timeout = APIIR_TIMEOUT)
    {
        return apiir_request('https://s.api.ir/api/sw1/CompanyMembers', [
            'nationalID' => $nationalID,
        ], $timeout);
    }
}
