<?php
/**
 * API.IR WordPress SDK
 * سرویس ActiveLoans — استعلام تسهیلات فعال بانکی
 *
 * @package  APIIR
 * @version  1.0.0
 * @link     https://api.ir
 */

defined('ABSPATH') || exit;

require_once __DIR__ . '/../core.php';

if (!function_exists('apiir_active_loans')) {
    /**
     * استعلام تسهیلات فعال بانکی
     *
     * مشاهده‌ی تسهیلات و وام‌های فعال مشتری همراه با مانده بدهی، سررسیدگذشته و معوق.
     *
     * @param string $nationalCode کد ملی یا شناسه ملی
     * @param int    $timeout      مهلت پاسخ به ثانیه؛ پیش‌فرض این سرویس ۳۰ ثانیه (استعلام سبک، از تنظیم سراسری APIIR_TIMEOUT)
     * @return array success / code / message / data — خروجی data یک آرایه‌ی انجمنی (آبجکت) است
     */
    function apiir_active_loans($nationalCode, $timeout = APIIR_TIMEOUT)
    {
        return apiir_request('https://s.api.ir/api/sw1/ActiveLoans', [
            'nationalCode' => $nationalCode,
        ], $timeout);
    }
}
