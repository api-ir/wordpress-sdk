<?php
/**
 * API.IR WordPress SDK
 * سرویس SmsOTP — وب سرویس OTP پیامکی
 *
 * @package  APIIR
 * @version  1.0.0
 * @link     https://api.ir
 */

defined('ABSPATH') || exit;

require_once __DIR__ . '/../core.php';

if (!function_exists('apiir_sms_otp')) {
    /**
     * وب سرویس OTP پیامکی
     *
     * ارسال کد یا رمز پیامکی به همه‌ی شماره‌ها از خط ۸ رقمی، بدون نیاز به خط خدماتی یا پنل پیامکی.
     *
     * @param string $code     کد یا OTP
     * @param string $mobile   موبایل به فرمت 09121112222
     * @param int    $template کد=0 کد ورود=1 کد تایید=2 رمز=3 رمز ورود=4
     * @param int    $timeout  مهلت پاسخ به ثانیه؛ پیش‌فرض این سرویس ۳۰ ثانیه (استعلام سبک، از تنظیم سراسری APIIR_TIMEOUT)
     * @return array success / code / message / data — خروجی data از نوع boolean است
     */
    function apiir_sms_otp($code, $mobile, $template = 1, $timeout = APIIR_TIMEOUT)
    {
        return apiir_request('https://s.api.ir/api/sw1/SmsOTP', [
            'code'     => $code,
            'mobile'   => $mobile,
            'template' => (int)$template,
        ], $timeout);
    }
}
