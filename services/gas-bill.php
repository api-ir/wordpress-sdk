<?php
/**
 * API.IR WordPress SDK
 * سرویس GasBill — وب سرویس قبض گاز
 *
 * @package  APIIR
 * @version  1.0.0
 * @link     https://api.ir
 */

defined('ABSPATH') || exit;

require_once __DIR__ . '/../core.php';

if (!function_exists('apiir_gas_bill')) {
    /**
     * وب سرویس قبض گاز
     *
     * بررسی وضعیت پرداخت و بدهی قبض گاز با شناسه قبض.
     *
     * @param string $billID  شناسه قبض
     * @param int    $timeout مهلت پاسخ به ثانیه؛ پیش‌فرض این سرویس ۳۰ ثانیه (استعلام سبک، از تنظیم سراسری APIIR_TIMEOUT)
     * @return array success / code / message / data — خروجی data یک آرایه‌ی انجمنی (آبجکت) است
     */
    function apiir_gas_bill($billID, $timeout = APIIR_TIMEOUT)
    {
        return apiir_request('https://s.api.ir/api/sw1/GasBill', [
            'billID' => $billID,
        ], $timeout);
    }
}
