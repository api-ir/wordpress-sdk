<?php
/**
 * API.IR WordPress SDK
 * سرویس IbanMatch — تطبیق کد ملی با شبا
 *
 * @package  APIIR
 * @version  1.0.0
 * @link     https://api.ir
 */

defined('ABSPATH') || exit;

require_once __DIR__ . '/../core.php';

if (!function_exists('apiir_iban_match')) {
    /**
     * تطبیق کد ملی با شبا
     *
     * بررسی تعلق شماره شبا به کد ملی و تاریخ تولد مشتری.
     *
     * @param string $nationalCode کد ملی
     * @param string $birthDate    تاریخ تولد به فرمت 1370/1/1
     * @param string $iban         شماره شبا ۲۶ رقمی به فرمت IR000000000000000000000000
     * @param int    $timeout      مهلت پاسخ به ثانیه؛ پیش‌فرض این سرویس ۳۰ ثانیه (استعلام سبک، از تنظیم سراسری APIIR_TIMEOUT)
     * @return array success / code / message / data — خروجی data از نوع boolean است
     */
    function apiir_iban_match($nationalCode, $birthDate, $iban, $timeout = APIIR_TIMEOUT)
    {
        return apiir_request('https://s.api.ir/api/sw1/IbanMatch', [
            'nationalCode' => $nationalCode,
            'birthDate'    => $birthDate,
            'iban'         => $iban,
        ], $timeout);
    }
}
