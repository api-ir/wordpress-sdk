<?php
/**
 * API.IR WordPress SDK
 * سرویس Call — وب سرویس تماس تلفنی
 *
 * @package  APIIR
 * @version  1.0.0
 * @link     https://api.ir
 */

defined('ABSPATH') || exit;

require_once __DIR__ . '/../core.php';

if (!function_exists('apiir_call')) {
    /**
     * وب سرویس تماس تلفنی
     *
     * برقراری تماس تلفنی و پخش فایل صوتی برای فهرستی از شماره‌های ثابت و همراه؛ بدون بلک‌لیست.
     *
     * @param string $voiceID شناسه فایل صوتی
     * @param array  $numbers لیستی از شماره موبایل‌ها یا تلفن‌های ثابت
     * @param int    $timeout مهلت پاسخ به ثانیه؛ پیش‌فرض این سرویس ۱۲۰ ثانیه (ارسال گروهی به فهرست شماره‌ها و پردازش زمان‌بر)
     * @return array success / code / message / data — خروجی data از نوع boolean است
     */
    function apiir_call($voiceID, $numbers, $timeout = 120)
    {
        return apiir_request('https://s.api.ir/api/sw1/Call', [
            'voiceID' => $voiceID,
            'numbers' => (array)$numbers,
        ], $timeout);
    }
}
