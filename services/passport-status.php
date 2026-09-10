<?php
/**
 * API.IR WordPress SDK
 * سرویس PassportStatus — استعلام وضعیت پاسپورت
 *
 * @package  APIIR
 * @version  1.0.0
 * @link     https://api.ir
 */

defined('ABSPATH') || exit;

require_once __DIR__ . '/../core.php';

if (!function_exists('apiir_passport_status')) {
    /**
     * استعلام وضعیت پاسپورت
     *
     * استعلام اعتبار و وضعیت گذرنامه‌ی فرد؛ مناسب فعالان حوزه‌ی گردشگری.
     *
     * @param string $nationalCode کد ملی
     * @param string $mobile       موبایل با فرمت 09120001111
     * @param int    $timeout      مهلت پاسخ به ثانیه؛ پیش‌فرض این سرویس ۳۰ ثانیه (استعلام سبک، از تنظیم سراسری APIIR_TIMEOUT)
     * @return array success / code / message / data — خروجی data یک آرایه‌ی انجمنی (آبجکت) است
     */
    function apiir_passport_status($nationalCode, $mobile, $timeout = APIIR_TIMEOUT)
    {
        return apiir_request('https://s.api.ir/api/sw1/PassportStatus', [
            'nationalCode' => $nationalCode,
            'mobile'       => $mobile,
        ], $timeout);
    }
}
