<?php
/**
 * API.IR WordPress SDK
 * سرویس CardMobileMatch — تطبیق کارت بانکی با موبایل
 *
 * @package  APIIR
 * @version  1.0.0
 * @link     https://api.ir
 */

defined('ABSPATH') || exit;

require_once __DIR__ . '/../core.php';

if (!function_exists('apiir_card_mobile_match')) {
    /**
     * تطبیق کارت بانکی با موبایل
     *
     * بررسی تعلق کارت بانکی به شماره موبایل مشتری.
     *
     * @param string $mobile     موبایل با فرمت 09120001111
     * @param string $cardNumber شماره کارت بانکی
     * @param int    $timeout    مهلت پاسخ به ثانیه؛ پیش‌فرض این سرویس ۳۰ ثانیه (استعلام سبک، از تنظیم سراسری APIIR_TIMEOUT)
     * @return array success / code / message / data — خروجی data از نوع boolean است
     */
    function apiir_card_mobile_match($mobile, $cardNumber, $timeout = APIIR_TIMEOUT)
    {
        return apiir_request('https://s.api.ir/api/sw1/CardMobileMatch', [
            'mobile'     => $mobile,
            'cardNumber' => $cardNumber,
        ], $timeout);
    }
}
