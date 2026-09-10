<?php
/**
 * API.IR WordPress SDK
 * سرویس ChequeColor — استعلام رنگ چک صیادی
 *
 * @package  APIIR
 * @version  1.0.0
 * @link     https://api.ir
 */

defined('ABSPATH') || exit;

require_once __DIR__ . '/../core.php';

if (!function_exists('apiir_cheque_color')) {
    /**
     * استعلام رنگ چک صیادی
     *
     * دریافت وضعیت اعتباری صادرکننده‌ی چک به‌صورت رنگ برای تعیین ریسک معامله.
     *
     * @param string $nationalCode کد ملی یا شناسه ملی
     * @param bool   $isCompany    حقوقی یا حقیقی
     * @param int    $timeout      مهلت پاسخ به ثانیه؛ پیش‌فرض این سرویس ۳۰ ثانیه (استعلام سبک، از تنظیم سراسری APIIR_TIMEOUT)
     * @return array success / code / message / data — خروجی data یک آرایه‌ی انجمنی (آبجکت) است
     */
    function apiir_cheque_color($nationalCode, $isCompany = false, $timeout = APIIR_TIMEOUT)
    {
        return apiir_request('https://s.api.ir/api/sw1/ChequeColor', [
            'nationalCode' => $nationalCode,
            'isCompany'    => (bool)$isCompany,
        ], $timeout);
    }
}
