<?php
/**
 * API.IR WordPress SDK
 * سرویس TextToSpeech — تبدیل متن به صوت با هوش مصنوعی بومی
 *
 * @package  APIIR
 * @version  1.0.0
 * @link     https://api.ir
 */

defined('ABSPATH') || exit;

require_once __DIR__ . '/../core.php';

if (!function_exists('apiir_text_to_speech')) {
    /**
     * تبدیل متن به صوت با هوش مصنوعی بومی
     *
     * تبدیل متن‌های کوتاه به صوت با هوش مصنوعی بومی که در اینترنت ملی نیز کار می‌کند.
     *
     * @param string $text      متن پیام
     * @param bool   $male      صدای گوینده آقا باشد یا خیر؟
     * @param int    $ttsEngine موتور هوشمند=1 موتور با هوش مصنوعی بومی=2 هوش مصنوعی خارجی=3
     * @param int    $timeout   مهلت پاسخ به ثانیه؛ پیش‌فرض این سرویس ۶۰ ثانیه (تولید صوت با هوش مصنوعی زمان‌بر است)
     * @return array success / code / message / data — خروجی data از نوع string است
     */
    function apiir_text_to_speech($text, $male = true, $ttsEngine = 1, $timeout = 60)
    {
        return apiir_request('https://s.api.ir/api/sw1/TextToSpeech', [
            'text'      => $text,
            'male'      => (bool)$male,
            'ttsEngine' => (int)$ttsEngine,
        ], $timeout);
    }
}
