<?php
/**
 * API.IR WordPress SDK
 * سرویس CompanyNewspapers — استعلام اگهی های روزنامه رسمی
 *
 * @package  APIIR
 * @version  1.0.0
 * @link     https://api.ir
 */

defined('ABSPATH') || exit;

require_once __DIR__ . '/../core.php';

if (!function_exists('apiir_company_newspapers')) {
    /**
     * استعلام اگهی های روزنامه رسمی
     *
     * دریافت آگهی‌های منتشرشده‌ی یک شرکت در روزنامه‌های رسمی و محلی.
     *
     * @param string $nationalID شناسه ملی شرکت
     * @param int    $timeout    مهلت پاسخ به ثانیه؛ پیش‌فرض این سرویس ۳۰ ثانیه (استعلام سبک، از تنظیم سراسری APIIR_TIMEOUT)
     * @return array success / code / message / data — خروجی data آرایه‌ای از آبجکت‌ها است
     */
    function apiir_company_newspapers($nationalID, $timeout = APIIR_TIMEOUT)
    {
        return apiir_request('https://s.api.ir/api/sw1/CompanyNewspapers', [
            'nationalID' => $nationalID,
        ], $timeout);
    }
}
