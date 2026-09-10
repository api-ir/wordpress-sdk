<?php
/**
 * API.IR WordPress SDK
 * سرویس VideoVerifySpeechText — دریافت متن تصادفی ورودی احراز ویدئویی
 *
 * @package  APIIR
 * @version  1.0.0
 * @link     https://api.ir
 */

defined('ABSPATH') || exit;

require_once __DIR__ . '/../core.php';

if (!function_exists('apiir_video_verify_speech_text')) {
    /**
     * دریافت متن تصادفی ورودی احراز ویدئویی
     *
     * تولید یک متن تصادفی که کاربر هنگام ضبط ویدئوی احراز هویت می‌خواند.
     *
     * @param int $timeout مهلت پاسخ به ثانیه؛ پیش‌فرض این سرویس ۳۰ ثانیه (استعلام سبک، از تنظیم سراسری APIIR_TIMEOUT)
     * @return array success / code / message / data — خروجی data از نوع string است
     */
    function apiir_video_verify_speech_text($timeout = APIIR_TIMEOUT)
    {
        return apiir_request('https://s.api.ir/api/sw1/VideoVerifySpeechText', [], $timeout);
    }
}
