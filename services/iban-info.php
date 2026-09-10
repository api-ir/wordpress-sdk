<?php
/**
 * API.IR WordPress SDK
 * سرویس IbanInfo — استعلام نام دارنده شبا
 *
 * @package  APIIR
 * @version  1.0.0
 * @link     https://api.ir
 */

defined('ABSPATH') || exit;

require_once __DIR__ . '/../core.php';

if (!function_exists('apiir_iban_info')) {
    /**
     * استعلام نام دارنده شبا
     *
     * دریافت نام دارنده، نام بانک و وضعیت فعال بودن یک شماره شبا.
     *
     * @param string $iban    شماره شبا ۲۶ رقمی به فرمت IR000000000000000000000000
     * @param int    $timeout مهلت پاسخ به ثانیه؛ پیش‌فرض این سرویس ۳۰ ثانیه (استعلام سبک، از تنظیم سراسری APIIR_TIMEOUT)
     * @return array success / code / message / data — خروجی data یک آرایه‌ی انجمنی (آبجکت) است
     */
    function apiir_iban_info($iban, $timeout = APIIR_TIMEOUT)
    {
        return apiir_request('https://s.api.ir/api/sw1/IbanInfo', [
            'iban' => $iban,
        ], $timeout);
    }
}
