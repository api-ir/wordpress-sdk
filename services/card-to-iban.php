<?php
/**
 * API.IR WordPress SDK
 * سرویس CardToIban — سرویس تبدیل کارت به شبا
 *
 * @package  APIIR
 * @version  1.0.0
 * @link     https://api.ir
 */

defined('ABSPATH') || exit;

require_once __DIR__ . '/../core.php';

if (!function_exists('apiir_card_to_iban')) {
    /**
     * سرویس تبدیل کارت به شبا
     *
     * دریافت مشخصات شبای یک کارت بانکی.
     *
     * @param string $cardNumber شماره کارت بانکی
     * @param int    $timeout    مهلت پاسخ به ثانیه؛ پیش‌فرض این سرویس ۳۰ ثانیه (استعلام سبک، از تنظیم سراسری APIIR_TIMEOUT)
     * @return array success / code / message / data — خروجی data یک آرایه‌ی انجمنی (آبجکت) است
     */
    function apiir_card_to_iban($cardNumber, $timeout = APIIR_TIMEOUT)
    {
        return apiir_request('https://s.api.ir/api/sw1/CardToIban', [
            'cardNumber' => $cardNumber,
        ], $timeout);
    }
}
