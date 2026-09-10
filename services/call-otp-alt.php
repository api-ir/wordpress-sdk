<?php
/**
 * API.IR WordPress SDK
 * سرویس CallOTPalt — وب سرویس OTP تلفنی alt
 *
 * @package  APIIR
 * @version  1.0.0
 * @link     https://api.ir
 */

defined('ABSPATH') || exit;

require_once __DIR__ . '/../core.php';

if (!function_exists('apiir_call_otp_alt')) {
    /**
     * وب سرویس OTP تلفنی alt
     *
     * اعلام کد یک‌بارمصرف از طریق تماس روی شبکه‌ی مجزا؛ گزینه‌ی پشتیبان سرویس CallOTP.
     *
     * @param string $code    کد یکبار مصرف یا OTP
     * @param string $number  شماره موبایل 09121112222 یا تلفن ثابت به فرمت 02122228888
     * @param int    $timeout مهلت پاسخ به ثانیه؛ پیش‌فرض این سرویس ۳۰ ثانیه (استعلام سبک، از تنظیم سراسری APIIR_TIMEOUT)
     * @return array success / code / message / data — خروجی data از نوع boolean است
     */
    function apiir_call_otp_alt($code, $number, $timeout = APIIR_TIMEOUT)
    {
        return apiir_request('https://s.api.ir/api/sw1/CallOTPalt', [
            'code'   => $code,
            'number' => $number,
        ], $timeout);
    }
}
