<?php
/**
 * API.IR WordPress SDK
 * سرویس MilitaryStatus — استعلام خدمت سربازی
 *
 * @package  APIIR
 * @version  1.0.0
 * @link     https://api.ir
 */

defined('ABSPATH') || exit;

require_once __DIR__ . '/../core.php';

if (!function_exists('apiir_military_status')) {
    /**
     * استعلام خدمت سربازی
     *
     * استعلام وضعیت نظام وظیفه‌ی فرد با کد ملی و تاریخ تولد؛ مناسب فرآیندهای استخدامی و اداری.
     *
     * @param string $nationalCode کد ملی شخص جهت استعلام وضعیت نظام وظیفه
     * @param string $birthDate    تاریخ تولد شخص به فرمت yyyy/mm/dd
     * @param int    $timeout      مهلت پاسخ به ثانیه؛ پیش‌فرض این سرویس ۳۰ ثانیه (استعلام سبک، از تنظیم سراسری APIIR_TIMEOUT)
     * @return array success / code / message / data — خروجی data یک آرایه‌ی انجمنی (آبجکت) است
     */
    function apiir_military_status($nationalCode, $birthDate, $timeout = APIIR_TIMEOUT)
    {
        return apiir_request('https://s.api.ir/api/sw1/MilitaryStatus', [
            'nationalCode' => $nationalCode,
            'birthDate'    => $birthDate,
        ], $timeout);
    }
}
