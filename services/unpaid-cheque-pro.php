<?php
/**
 * API.IR WordPress SDK
 * سرویس UnpaidChequePro — استعلام تعداد چک برگشتی پرو
 *
 * @package  APIIR
 * @version  1.0.0
 * @link     https://api.ir
 */

defined('ABSPATH') || exit;

require_once __DIR__ . '/../core.php';

if (!function_exists('apiir_unpaid_cheque_pro')) {
    /**
     * استعلام تعداد چک برگشتی پرو
     *
     * استعلام تعداد، مبلغ و فهرست چک‌های برگشتی همراه با اطلاعات شعبه‌ی برگشت‌دهنده (فقط شرکت‌ها و سازمان‌ها).
     *
     * @param string $nationalCode کد ملی
     * @param int    $timeout      مهلت پاسخ به ثانیه؛ پیش‌فرض این سرویس ۳۰ ثانیه (استعلام سبک، از تنظیم سراسری APIIR_TIMEOUT)
     * @return array success / code / message / data — خروجی data یک آرایه‌ی انجمنی (آبجکت) است
     */
    function apiir_unpaid_cheque_pro($nationalCode, $timeout = APIIR_TIMEOUT)
    {
        return apiir_request('https://s.api.ir/api/sw1/UnpaidChequePro', [
            'nationalCode' => $nationalCode,
        ], $timeout);
    }
}
