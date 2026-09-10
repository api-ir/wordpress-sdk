<?php
/**
 * API.IR WordPress SDK
 * سرویس CardMatch — تطبیق کد ملی با کارت بانکی
 *
 * @package  APIIR
 * @version  1.0.0
 * @link     https://api.ir
 */

defined('ABSPATH') || exit;

require_once __DIR__ . '/../core.php';

if (!function_exists('apiir_card_match')) {
    /**
     * تطبیق کد ملی با کارت بانکی
     *
     * بررسی تعلق کارت بانکی به کد ملی و تاریخ تولد مشتری.
     *
     * @param string $nationalCode کد ملی
     * @param string $birthDate    تاریخ تولد به فرمت 1370/1/1
     * @param string $cardNumber   شماره کارت بانکی
     * @param int    $timeout      مهلت پاسخ به ثانیه؛ پیش‌فرض این سرویس ۳۰ ثانیه (استعلام سبک، از تنظیم سراسری APIIR_TIMEOUT)
     * @return array success / code / message / data — خروجی data از نوع boolean است
     */
    function apiir_card_match($nationalCode, $birthDate, $cardNumber, $timeout = APIIR_TIMEOUT)
    {
        return apiir_request('https://s.api.ir/api/sw1/CardMatch', [
            'nationalCode' => $nationalCode,
            'birthDate'    => $birthDate,
            'cardNumber'   => $cardNumber,
        ], $timeout);
    }
}
