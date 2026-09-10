<?php
/**
 * API.IR WordPress SDK
 * سرویس TaxRecords — استعلام پرونده ها مالیاتی
 *
 * @package  APIIR
 * @version  1.0.0
 * @link     https://api.ir
 */

defined('ABSPATH') || exit;

require_once __DIR__ . '/../core.php';

if (!function_exists('apiir_tax_records')) {
    /**
     * استعلام پرونده ها مالیاتی
     *
     * استعلام پرونده‌های مالیاتی و وضعیت ثبت‌نام اشخاص حقیقی یا حقوقی.
     *
     * @param string $inquiryCode شماره ملی حقیقی / شناسه ملی حقوقی / شماره فراگیر / شماره رهگیری / شماره اقتصادی
     * @param int    $timeout     مهلت پاسخ به ثانیه؛ پیش‌فرض این سرویس ۳۰ ثانیه (استعلام سبک، از تنظیم سراسری APIIR_TIMEOUT)
     * @return array success / code / message / data — خروجی data یک آرایه‌ی انجمنی (آبجکت) است
     */
    function apiir_tax_records($inquiryCode, $timeout = APIIR_TIMEOUT)
    {
        return apiir_request('https://s.api.ir/api/sw1/TaxRecords', [
            'inquiryCode' => $inquiryCode,
        ], $timeout);
    }
}
