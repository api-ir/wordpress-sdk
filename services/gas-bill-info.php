<?php
/**
 * API.IR WordPress SDK
 * سرویس GasBillInfo — وب سرویس قبض گاز با جزئیات
 *
 * @package  APIIR
 * @version  1.0.0
 * @link     https://api.ir
 */

defined('ABSPATH') || exit;

require_once __DIR__ . '/../core.php';

if (!function_exists('apiir_gas_bill_info')) {
    /**
     * وب سرویس قبض گاز با جزئیات
     *
     * بررسی وضعیت پرداخت و بدهی قبض گاز همراه با مشخصات اشتراک.
     *
     * @param string $billID  شناسه اشتراک
     * @param int    $timeout مهلت پاسخ به ثانیه؛ پیش‌فرض این سرویس ۳۰ ثانیه (استعلام سبک، از تنظیم سراسری APIIR_TIMEOUT)
     * @return array success / code / message / data — خروجی data یک آرایه‌ی انجمنی (آبجکت) است
     */
    function apiir_gas_bill_info($billID, $timeout = APIIR_TIMEOUT)
    {
        return apiir_request('https://s.api.ir/api/sw1/GasBillInfo', [
            'billID' => $billID,
        ], $timeout);
    }
}
