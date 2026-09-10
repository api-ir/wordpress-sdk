<?php
/**
 * API.IR WordPress SDK
 * هسته — تنها فایلی که درخواست HTTP ارسال می‌کند
 *
 * @package  APIIR
 * @version  1.0.0
 * @link     https://api.ir
 */

defined('ABSPATH') || exit;

require_once __DIR__ . '/config.php';

// پیام پیش‌فرض خطا وقتی سرویس پیامی نداده باشد
if (!defined('APIIR_DEFAULT_MESSAGE')) {
    define('APIIR_DEFAULT_MESSAGE', 'درخواست ناموفق بود.');
}

if (!function_exists('apiir_request')) {
    /**
     * ارسال درخواست به وب‌سرویس‌های api.ir
     *
     * @param string $url     آدرس کامل و ثابت سرویس
     * @param array  $data    بدنه‌ی درخواست
     * @param int    $timeout مهلت پاسخ به ثانیه — از سرویس می‌آید (پیش‌فرض همان سرویس یا مقدار کاربر)
     * @return array success / code / message / data
     */
    function apiir_request($url, array $data = [], $timeout = APIIR_TIMEOUT)
    {
        // مرحله ۱ — نمونه‌ی خروجی — قبل از try ساخته می‌شود و در هر شرایطی همین برگردانده می‌شود
        $result = apiir_error(APIIR_DEFAULT_MESSAGE);

        try {
            // مرحله ۲ — ارتباط با سرور
            // سرویس بدون ورودی باید بدنه‌ی {} بگیرد؛ آرایه‌ی خالی PHP به [] تبدیل می‌شود،
            // پس آرایه‌ی خالی به آبجکت خالی تبدیل می‌شود
            $payload = empty($data) ? new stdClass() : $data;

            // wp_json_encode استثنا نمی‌دهد و در صورت شکست false برمی‌گرداند؛
            // بدنه‌ی خالی نباید ارسال شود، پس شکست encode هم به catch می‌رود
            $body = wp_json_encode($payload, JSON_UNESCAPED_UNICODE);

            if ($body === false) {
                throw new RuntimeException('بدنه‌ی درخواست به JSON تبدیل نشد.');
            }

            $response = wp_remote_post($url, [
                'timeout'   => (int)$timeout,
                'sslverify' => APIIR_SSL_VERIFY,
                'headers'   => [
                    'Content-Type'  => 'application/json',
                    'Accept'        => 'application/json',
                    'Authorization' => 'Bearer ' . APIIR_TOKEN,
                ],
                'body'      => $body,
            ]);

            // خطای اتصال → استثنا → catch
            if (is_wp_error($response)) {
                throw new RuntimeException($response->get_error_message());
            }

            // پاسخ سرور، با هر کد HTTP، به قالب استاندارد تبدیل می‌شود
            // JSON نامعتبر یا خارج از قالب → استثنا → catch
            $envelope = json_decode(wp_remote_retrieve_body($response), true, 512, JSON_THROW_ON_ERROR);

            if (!is_array($envelope)) {
                throw new UnexpectedValueException('پاسخ سرور قالب استاندارد ندارد.');
            }

            $success      = isset($envelope['success']) && $envelope['success'] === true;
            $code         = isset($envelope['code']) ? (int)$envelope['code'] : 0;
            $responseData = isset($envelope['data']) ? $envelope['data'] : null;
            $message      = isset($envelope['message']) && $envelope['message'] !== '' ? (string)$envelope['message'] : null;

            // کاربر هرگز نباید خطای بی‌پیام ببیند
            if (!$success && $message === null) {
                $message = APIIR_DEFAULT_MESSAGE;
            }

            // پر کردن result — آخرین دستور داخل try
            $result['success'] = $success;
            $result['code']    = $code;
            $result['message'] = $message;
            $result['data']    = $responseData;

        } catch (Throwable $e) {
            // مرحله ۳ — هر خطایی (اتصال، مهلت پاسخ، SSL، JSON نامعتبر) — فقط message پر می‌شود
            $result['message'] = $e->getMessage() !== '' ? $e->getMessage() : get_class($e);
        }

        // مرحله ۴ — تنها نقطه‌ی بازگشت
        return $result;
    }
}

if (!function_exists('apiir_error')) {
    /**
     * ساخت خروجی خطا با همان ساختار پاسخ موفق
     *
     * @param string $message متن خطا
     * @param int    $code    کد خطا (پیش‌فرض ۰)
     * @return array success / code / message / data
     */
    function apiir_error($message, $code = 0)
    {
        return [
            'success'  => false,
            'code'     => (int)$code,
            'message'  => $message,
            'data'     => null,
        ];
    }
}
