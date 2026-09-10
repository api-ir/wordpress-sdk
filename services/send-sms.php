<?php
/**
 * API.IR WordPress SDK
 * سرویس SendSms — ارسال پیامک خدماتی
 *
 * @package  APIIR
 * @version  1.0.0
 * @link     https://api.ir
 */

defined('ABSPATH') || exit;

require_once __DIR__ . '/../core.php';

if (!function_exists('apiir_send_sms')) {
    /**
     * ارسال پیامک خدماتی
     *
     * ارسال پیامک خدماتی به فهرستی از شماره‌ها با خط اختصاصی.
     *
     * @param string $message متن پیامک
     * @param array  $mobiles موبایل‌ها به صورت لیست
     * @param int    $timeout مهلت پاسخ به ثانیه؛ پیش‌فرض این سرویس ۱۲۰ ثانیه (ارسال گروهی به فهرست شماره‌ها و پردازش زمان‌بر)
     * @return array success / code / message / data — خروجی data از نوع int است
     */
    function apiir_send_sms($message, $mobiles, $timeout = 120)
    {
        return apiir_request('https://s.api.ir/api/sw1/SendSms', [
            'message' => $message,
            'mobiles' => (array)$mobiles,
        ], $timeout);
    }
}
