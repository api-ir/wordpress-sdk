<?php
/**
 * API.IR WordPress SDK
 * سرویس ChequeInfo — استعلام مشخصات چک صیادی
 *
 * @package  APIIR
 * @version  1.0.0
 * @link     https://api.ir
 */

defined('ABSPATH') || exit;

require_once __DIR__ . '/../core.php';

if (!function_exists('apiir_cheque_info')) {
    /**
     * استعلام مشخصات چک صیادی
     *
     * دریافت اطلاعات کامل یک چک صیادی (دارنده، شبا، سریال، تاریخ صدور و نوع چک) با شناسه‌ی چک.
     *
     * @param string $chequeID شناسه چک صیاد
     * @param int    $timeout  مهلت پاسخ به ثانیه؛ پیش‌فرض این سرویس ۳۰ ثانیه (استعلام سبک، از تنظیم سراسری APIIR_TIMEOUT)
     * @return array success / code / message / data — خروجی data یک آرایه‌ی انجمنی (آبجکت) است
     */
    function apiir_cheque_info($chequeID, $timeout = APIIR_TIMEOUT)
    {
        return apiir_request('https://s.api.ir/api/sw1/ChequeInfo', [
            'chequeID' => $chequeID,
        ], $timeout);
    }
}
