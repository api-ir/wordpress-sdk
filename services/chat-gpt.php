<?php
/**
 * API.IR WordPress SDK
 * سرویس ChatGPT — وب سرویس Chat GPT
 *
 * @package  APIIR
 * @version  1.0.0
 * @link     https://api.ir
 */

defined('ABSPATH') || exit;

require_once __DIR__ . '/../core.php';

if (!function_exists('apiir_chat_gpt')) {
    /**
     * وب سرویس Chat GPT
     *
     * ارسال دستور و متن به GPT نسخه‌ی ۴ و دریافت پاسخ متنی.
     *
     * @param string $command     دستور پردازش (نمونه: GenerateSummary)
     * @param string $data        متن ورودی برای پردازش
     * @param float  $temperature میزان خلاقیت پاسخ (پیش‌فرض 1)
     * @param int    $timeout     مهلت پاسخ به ثانیه؛ پیش‌فرض این سرویس ۶۰ ثانیه (پردازش هوش مصنوعی زمان‌بر است)
     * @return array success / code / message / data — خروجی data از نوع string است
     */
    function apiir_chat_gpt($command, $data, $temperature = 1.0, $timeout = 60)
    {
        return apiir_request('https://s.api.ir/api/sw1/ChatGPT', [
            'command'     => $command,
            'data'        => $data,
            'temperature' => (float)$temperature,
        ], $timeout);
    }
}
