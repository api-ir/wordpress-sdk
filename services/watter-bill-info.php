<?php
/**
 * API.IR WordPress SDK
 * سرویس WatterBillInfo — وب سرویس قبض آب با جزئیات
 *
 * @package  APIIR
 * @version  1.0.0
 * @link     https://api.ir
 */

defined('ABSPATH') || exit;

require_once __DIR__ . '/../core.php';

if (!function_exists('apiir_watter_bill_info')) {
    /**
     * وب سرویس قبض آب با جزئیات
     *
     * بررسی وضعیت پرداخت قبض آب همراه با مشخصات مشترک، آدرس و اطلاعات کنتور.
     *
     * @param string $billID  شناسه قبض
     * @param int    $timeout مهلت پاسخ به ثانیه؛ پیش‌فرض این سرویس ۳۰ ثانیه (استعلام سبک، از تنظیم سراسری APIIR_TIMEOUT)
     * @return array success / code / message / data — خروجی data یک آرایه‌ی انجمنی (آبجکت) است
     */
    function apiir_watter_bill_info($billID, $timeout = APIIR_TIMEOUT)
    {
        return apiir_request('https://s.api.ir/api/sw1/WatterBillInfo', [
            'billID' => $billID,
        ], $timeout);
    }
}
