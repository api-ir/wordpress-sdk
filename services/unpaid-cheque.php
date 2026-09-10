<?php
/**
 * API.IR WordPress SDK
 * سرویس UnpaidCheque — استعلام تعداد چک برگشتی
 *
 * @package  APIIR
 * @version  1.0.0
 * @link     https://api.ir
 */

defined('ABSPATH') || exit;

require_once __DIR__ . '/../core.php';

if (!function_exists('apiir_unpaid_cheque')) {
    /**
     * استعلام تعداد چک برگشتی
     *
     * استعلام تعداد و مبلغ چک‌های برگشتی فرد برای ارزیابی ریسک اعتباری (ارائه به کسب‌وکارها در سطح ۲).
     *
     * @param string $nationalCode کد ملی
     * @param int    $timeout      مهلت پاسخ به ثانیه؛ پیش‌فرض این سرویس ۳۰ ثانیه (استعلام سبک، از تنظیم سراسری APIIR_TIMEOUT)
     * @return array success / code / message / data — خروجی data یک آرایه‌ی انجمنی (آبجکت) است
     */
    function apiir_unpaid_cheque($nationalCode, $timeout = APIIR_TIMEOUT)
    {
        return apiir_request('https://s.api.ir/api/sw1/UnpaidCheque', [
            'nationalCode' => $nationalCode,
        ], $timeout);
    }
}
