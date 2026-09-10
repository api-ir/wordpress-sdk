<?php
/**
 * API.IR WordPress SDK
 * نمونه استفاده داخل افزونه — این فایل را در افزونه‌ی خود کپی نکنید؛ فقط الگوی آن را ببینید
 *
 * @package  APIIR
 * @version  1.0.0
 * @link     https://api.ir
 */

defined('ABSPATH') || exit;

// ۱. SDK را از مسیر افزونه‌ی خودتان بارگذاری کنید (هر سرویس، فایل خودش را دارد)
require_once plugin_dir_path(__FILE__) . 'apiir/services/shahkar.php';

// ۲. داخل یک hook، shortcode یا REST endpoint فراخوانی کنید
add_action('admin_post_my_plugin_check', function () {

    // بررسی دسترسی و nonce با افزونه‌ی میزبان است
    if (!current_user_can('manage_options') || !check_admin_referer('my_plugin_check')) {
        wp_die('دسترسی غیرمجاز');
    }

    // ۳. ورودی کاربر را قبل از ارسال اعتبارسنجی کنید تا اعتبار حساب بابت درخواست نامعتبر مصرف نشود
    $nationalCode = sanitize_text_field($_POST['national_code'] ?? '');
    $mobile       = sanitize_text_field($_POST['mobile'] ?? '');

    if (!preg_match('/^\d{10}$/', $nationalCode) || !preg_match('/^09\d{9}$/', $mobile)) {
        wp_die('کد ملی یا شماره موبایل نامعتبر است.');
    }

    // ۴. یک فراخوانی — مهلت پاسخ در صورت نیاز با آرگومان آخر قابل تغییر است: apiir_shahkar($nationalCode, $mobile, false, 10)
    $result = apiir_shahkar($nationalCode, $mobile);

    // ۵. همیشه اول success را بررسی کنید؛ در حالت خطا دوباره تلاش نکنید
    if (!$result['success']) {
        wp_die('❌ ' . esc_html($result['message']) . ' (code: ' . (int)$result['code'] . ')');
    }

    // ۶. فقط بعد از success، مقدار data را بخوانید (برای این سرویس boolean است)
    echo $result['data'] === true
        ? '✅ تطابق شماره موبایل با کد ملی تایید شد.'
        : '❌ شماره موبایل با کد ملی تطابق ندارد.';
});
