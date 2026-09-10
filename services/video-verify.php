<?php
/**
 * API.IR WordPress SDK
 * سرویس VideoVerify — احراز ویدئویی بایومتریک
 *
 * @package  APIIR
 * @version  1.0.0
 * @link     https://api.ir
 */

defined('ABSPATH') || exit;

require_once __DIR__ . '/../core.php';

if (!function_exists('apiir_video_verify')) {
    /**
     * احراز ویدئویی بایومتریک
     *
     * احراز هویت بایومتریک +Live: تطبیق ویدئوی سلفی با اطلاعات هویتی و تصویر کارت ملی، زنده‌سنجی و تطبیق متن خوانده‌شده.
     *
     * @param string $nationalCode      کد ملی
     * @param string $birthDate         تاریخ تولد به فرمت 1370/1/1
     * @param string $serialNumber      سریال پشت کارت ملی یا رهگیری رسید کارت ملی (حداقل ۵ کاراکتر)
     * @param string $videoBase64       ویدئوی سلفی کاربر به صورت Base64 و حداکثر ۵ مگابایت
     * @param string $speechText        متن تصادفی که فرد هنگام ضبط می‌خواند (حداقل ۱۰ کاراکتر)؛ از سرویس VideoVerifySpeechText دریافت کنید
     * @param int    $matchingThreshold حد آستانه تطبیق چهره
     * @param int    $livenessThreshold حد آستانه زنده سنجی
     * @param int    $speechThreshold   حد آستانه تطبیق گفتار
     * @param int    $timeout           مهلت پاسخ به ثانیه؛ پیش‌فرض این سرویس ۱۲۰ ثانیه (ارسال ویدئوی Base64 تا ۵ مگابایت و پردازش زمان‌بر)
     * @return array success / code / message / data — خروجی data یک آرایه‌ی انجمنی (آبجکت) است
     */
    function apiir_video_verify($nationalCode, $birthDate, $serialNumber, $videoBase64, $speechText, $matchingThreshold = 80, $livenessThreshold = 80, $speechThreshold = 50, $timeout = 120)
    {
        return apiir_request('https://s.api.ir/api/sw1/VideoVerify', [
            'nationalCode'      => $nationalCode,
            'birthDate'         => $birthDate,
            'serialNumber'      => $serialNumber,
            'videoBase64'       => $videoBase64,
            'speechText'        => $speechText,
            'matchingThreshold' => (int)$matchingThreshold,
            'livenessThreshold' => (int)$livenessThreshold,
            'speechThreshold'   => (int)$speechThreshold,
        ], $timeout);
    }
}
