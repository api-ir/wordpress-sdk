<?php
/**
 * API.IR WordPress SDK
 * سرویس BankAccountInfo — استعلام شبا با شماره حساب
 *
 * @package  APIIR
 * @version  1.0.0
 * @link     https://api.ir
 */

defined('ABSPATH') || exit;

require_once __DIR__ . '/../core.php';

if (!function_exists('apiir_bank_account_info')) {
    /**
     * استعلام شبا با شماره حساب
     *
     * استعلام شماره حساب بانکی و دریافت شماره شبای متعلق به آن.
     *
     * @param string $accountNumber شماره حساب بانکی
     * @param string $bankCode      کد بانک: مرکزی=010 صنعت‌ومعدن=011 ملت=012 رفاه=013 مسکن=014 سپه=015 کشاورزی=016 ملی=017 تجارت=018 صادرات=019 توسعه‌صادرات=020 پست‌بانک=021 توسعه‌تعاون=022 کارآفرین=053 پارسیان=054 اقتصادنوین=055 سامان=056 پاسارگاد=057 سرمایه=058 سینا=059 مهرایران=060 شهر=061 آینده=062 گردشگری=064 دی=066 ایران‌زمین=069 رسالت=070 ملل=075 خاورمیانه=080
     * @param int    $timeout       مهلت پاسخ به ثانیه؛ پیش‌فرض این سرویس ۳۰ ثانیه (استعلام سبک، از تنظیم سراسری APIIR_TIMEOUT)
     * @return array success / code / message / data — خروجی data یک آرایه‌ی انجمنی (آبجکت) است
     */
    function apiir_bank_account_info($accountNumber, $bankCode = '', $timeout = APIIR_TIMEOUT)
    {
        $data = [
            'accountNumber' => $accountNumber,
        ];

        // bankCode اختیاری است و فقط در صورت مقداردهی ارسال می‌شود
        if ($bankCode !== '') {
            $data['bankCode'] = $bankCode;
        }

        return apiir_request('https://s.api.ir/api/sw1/BankAccountInfo', $data, $timeout);
    }
}
