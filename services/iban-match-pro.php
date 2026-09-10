<?php
/**
 * API.IR WordPress SDK
 * سرویس IbanMatchPro — تطبیق کد ملی با شبا پرو (سیاح)
 *
 * @package  APIIR
 * @version  1.0.0
 * @link     https://api.ir
 */

defined('ABSPATH') || exit;

require_once __DIR__ . '/../core.php';

if (!function_exists('apiir_iban_match_pro')) {
    /**
     * تطبیق کد ملی با شبا پرو (سیاح)
     *
     * تطبیق شماره شبا با کد ملی بدون نیاز به تاریخ تولد؛ مناسب فرآیندهای KYC، پرداخت و تسویه‌حساب.
     *
     * @param string $nationalCode کد ملی
     * @param string $iban         شماره شبا ۲۶ رقمی به فرمت IR000000000000000000000000
     * @param int    $timeout      مهلت پاسخ به ثانیه؛ پیش‌فرض این سرویس ۳۰ ثانیه (استعلام سبک، از تنظیم سراسری APIIR_TIMEOUT)
     * @return array success / code / message / data — خروجی data از نوع boolean است
     */
    function apiir_iban_match_pro($nationalCode, $iban, $timeout = APIIR_TIMEOUT)
    {
        return apiir_request('https://s.api.ir/api/sw1/IbanMatchPro', [
            'nationalCode' => $nationalCode,
            'iban'         => $iban,
        ], $timeout);
    }
}
