<?php
/**
 * API.IR WordPress SDK
 * سرویس MedicalLicense — استعلام اعتبار پروانه پزشکی
 *
 * @package  APIIR
 * @version  1.0.0
 * @link     https://api.ir
 */

defined('ABSPATH') || exit;

require_once __DIR__ . '/../core.php';

if (!function_exists('apiir_medical_license')) {
    /**
     * استعلام اعتبار پروانه پزشکی
     *
     * استعلام اعتبار پروانه پزشکی و فهرست مجوزهای یک پزشک.
     *
     * @param string $medicalCode کد پیگیری مجوز (کد نظام پزشکی)
     * @param int    $timeout     مهلت پاسخ به ثانیه؛ پیش‌فرض این سرویس ۳۰ ثانیه (استعلام سبک، از تنظیم سراسری APIIR_TIMEOUT)
     * @return array success / code / message / data — خروجی data یک آرایه‌ی انجمنی (آبجکت) است
     */
    function apiir_medical_license($medicalCode, $timeout = APIIR_TIMEOUT)
    {
        return apiir_request('https://s.api.ir/api/sw1/MedicalLicense', [
            'medicalCode' => $medicalCode,
        ], $timeout);
    }
}
