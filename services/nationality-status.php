<?php
/**
 * API.IR WordPress SDK
 * سرویس NationalityStatus — استعلام وضعیت اتباع
 *
 * @package  APIIR
 * @version  1.0.0
 * @link     https://api.ir
 */

defined('ABSPATH') || exit;

require_once __DIR__ . '/../core.php';

if (!function_exists('apiir_nationality_status')) {
    /**
     * استعلام وضعیت اتباع
     *
     * استعلام اطلاعات و اعتبار کارت اتباع از مراجع انتظامی.
     *
     * @param string $code     کد
     * @param int    $codeType کد شناسایی تبعه=1 فیدا=2 شناسه فراگیر ناجا=3 کد یکتا=4
     * @param int    $timeout  مهلت پاسخ به ثانیه؛ پیش‌فرض این سرویس ۳۰ ثانیه (استعلام سبک، از تنظیم سراسری APIIR_TIMEOUT)
     * @return array success / code / message / data — خروجی data یک آرایه‌ی انجمنی (آبجکت) است
     */
    function apiir_nationality_status($code, $codeType = 2, $timeout = APIIR_TIMEOUT)
    {
        return apiir_request('https://s.api.ir/api/sw1/NationalityStatus', [
            'code'     => $code,
            'codeType' => (int)$codeType,
        ], $timeout);
    }
}
