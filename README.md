# API.IR WordPress SDK

SDK رسمی وردپرس **api.ir** — کتابخانه‌ای ساده و بدون وابستگی که فقط با توابع داخلی وردپرس (`wp_remote_post`) کار می‌کند. این پوشه را داخل افزونه یا قالب خود کپی می‌کنید و در چند دقیقه اولین استعلام را می‌گیرید.

- **نسخه:** 1.0.0
- **پیش‌نیاز:** وردپرس ۶ به بالا، PHP 7.4 به بالا
- **آدرس سرویس:** `https://s.api.ir` (ثابت)

## فهرست مطالب

1. [معرفی api.ir](#۱-معرفی-apiir)
2. [ثبت‌نام و دریافت کلید](#۲-ثبتنام-و-دریافت-کلید)
3. [شروع سریع — افزودن SDK به افزونه‌ی خودتان](#۳-شروع-سریع--افزودن-sdk-به-افزونهی-خودتان)
4. [قرارداد خروجی](#۴-قرارداد-خروجی)
5. [فهرست کامل وب‌سرویس‌ها](#۵-فهرست-کامل-وبسرویسها)
6. [راهنمای هر سرویس](#۶-راهنمای-هر-سرویس)
7. [سناریوهای پرکاربرد](#۷-سناریوهای-پرکاربرد)
8. [تست بدون هزینه](#۸-تست-بدون-هزینه)
9. [مدیریت خطا](#۹-مدیریت-خطا)
10. [نکات امنیتی و عملیاتی وردپرس](#۱۰-نکات-امنیتی-و-عملیاتی-وردپرس)
11. [پشتیبانی و منابع](#۱۱-پشتیبانی-و-منابع)

---

## ۱. معرفی api.ir

**api.ir** یک **پلتفرم جامع ارائه وب‌سرویس** است که احراز هویت، استعلام‌های هویتی و بانکی، OTP پیامکی و صوتی و پیامک را با **استاندارد واحد** و **پایداری بالا** از طریق **یک کلید یکپارچه** در اختیار شما می‌گذارد.

### ویژگی‌های کلیدی

- **پرداخت به‌ازای مصرف (PayAsYouGo)** که به‌ازای هر فراخوانی کسر می‌شود، و **نداشتن هزینه‌ی اولیه**
- **فعال‌سازی آنی و لحظه‌ای** پس از ساخت کلید در `https://p.api.ir`
- **سرویس‌های مدیریت‌شده با مدیریت لاگ** همه‌ی فراخوانی‌ها در پنل کاربری
- سرویس **Sandbox Echo** روی `https://s.api.ir/api/sandbox/echo` برای تست و پیاده‌سازی آسان
- **نمونه‌کدهای آماده برای تمامی زبان‌های برنامه‌نویسی و اکثر کتابخانه‌ها** از طریق `https://s.api.ir/code`
- ارائه‌ی **پروتکل OpenAPI به‌روز** به آدرس `https://s.api.ir/json` (همان ورودی ساخت این SDK)
- **مستندات تخصصی و حرفه‌ای** و **مستندات Postman** به آدرس `https://documenter.getpostman.com/view/40733477/2sAYJ7gJsi`
- ساخت **۵ کلید برای هر حساب کاربری به‌صورت رایگان** و اتصال **۵ نرم‌افزار یا پلتفرم**
- امکان **مدیریت IP و محدودیت برای هر کلید**
- استاندارد **Bearer Token** و ویژگی‌های بسیار دیگر که پیاده‌سازی و توسعه‌ی برنامه‌هایتان را جلو می‌اندازد
- **استاندارد پایداری بالای ۹۹.۹٪** با شفافیت — اطمینان از استفاده از یک **پلتفرم رده‌اول ایران**؛ در هر لحظه می‌توانید اپتایم سرویس‌ها را در `https://status.api.ir/status/api-ir` مشاهده نمایید

---

## ۲. ثبت‌نام و دریافت کلید

1. **ثبت‌نام**: حساب کاربری خود را در `https://p.api.ir` بسازید — رایگان و **بدون هزینه‌ی اولیه**.
2. **ساخت کلید**: وارد پنل `https://p.api.ir` شوید و کلید API بسازید. هر حساب **۵ کلید رایگان** و اتصال **۵ نرم‌افزار یا پلتفرم** دارد؛ کلید **آنی و لحظه‌ای** فعال می‌شود و **مدیریت IP و محدودیت برای هر کلید** از همان پنل انجام می‌شود.
3. **قرار دادن کلید در SDK**: کلید را کپی کنید و با `define('APIIR_TOKEN', '...')` در `wp-config.php` (یا `config.php`) تعریف کنید، سپس به بخش ۳ «شروع سریع» بروید. اعتبار حساب و **لاگ همه‌ی فراخوانی‌ها** نیز در همان پنل `https://p.api.ir` دیده می‌شود (**پرداخت به‌ازای مصرف**).

> برای هر سایت یک کلید مجزا بسازید و پس از تحویل پروژه کلید را حذف کنید تا مالک سایت کلید خودش را بسازد.

---

## ۳. شروع سریع — افزودن SDK به افزونه‌ی خودتان

> **این SDK افزونه نیست و از پیشخوان وردپرس نصب نمی‌شود.** یک پوشه‌ی کتابخانه‌ای است که داخل افزونه (یا قالب) خودتان کپی و `require` می‌کنید. هیچ صفحه‌ی تنظیمات، منو یا hook خودکاری ندارد.

**پیش‌نیاز:** وردپرس ۶ به بالا و PHP 7.4 به بالا. هیچ افزونه یا کتابخانه‌ی دیگری لازم نیست.

1. **ثبت‌نام و ساخت کلید** در `https://p.api.ir` (بخش ۲).
2. **کپی پوشه‌ی `apiir/`** داخل پوشه‌ی افزونه‌ی خودتان (مثلاً `wp-content/plugins/my-plugin/apiir/`).
3. **تعریف `APIIR_TOKEN`** در `wp-config.php` (توصیه‌ی ما) یا ویرایش `apiir/config.php`:

   ```php
   // wp-config.php
   define('APIIR_TOKEN', 'کلید شما از پنل p.api.ir');
   define('APIIR_TIMEOUT', 30);        // اختیاری — مهلت سراسری سرویس‌های سبک (ثانیه)
   define('APIIR_SSL_VERIFY', true);   // اختیاری — پیش‌فرض true؛ خاموش نکنید
   ```

4. **اجرای نمونه کد شروع سریع** (زیر).

این سه ثابت — `APIIR_TOKEN`، `APIIR_TIMEOUT` و `APIIR_SSL_VERIFY` — کنار هم در `wp-config.php` (یا `config.php`) تعریف می‌شوند. `timeout` علاوه بر آن، در هر فراخوانی با آرگومان آخر تابع قابل تغییر است.

### نمونه کد شروع سریع

استفاده‌ی واقعی از سرویس شاهکار داخل یک شورت‌کد وردپرس. این کد بدون هیچ تغییری (جز تعریف `APIIR_TOKEN`) داخل افزونه‌ی شما اجرا می‌شود:

```php
require_once plugin_dir_path(__FILE__) . 'apiir/services/shahkar.php';

add_shortcode('apiir_shahkar_demo', function () {
    $result = apiir_shahkar('0010007700', '09120000000');

    if (!$result['success']) {
        return 'خطا: ' . esc_html($result['message']);
    }

    return $result['data'] === true ? 'تطابق دارد' : 'تطابق ندارد';
});
```

### احراز هویت

احراز هویت با استاندارد **Bearer Token** انجام می‌شود. کلید از پنل کاربری `https://p.api.ir` ساخته می‌شود (۵ کلید رایگان برای هر حساب). شما فقط `APIIR_TOKEN` را در `wp-config.php` (یا `config.php`) تعریف می‌کنید و SDK آن را به‌صورت خودکار در هدر `Authorization: Bearer {token}` همه‌ی درخواست‌ها قرار می‌دهد. **هیچ تابع سرویسی پارامتر توکن ندارد.**

- کلید نامعتبر یا تنظیم‌نشده با `success = false` و `code = 401` برمی‌گردد (بخش ۹).
- محدودیت IP برای هر کلید از همان پنل قابل تنظیم است؛ IP خروجی سایت خود را با سرویس `MyIP` بگیرید.
- توکن هرگز نباید به JavaScript یا پاسخ REST برسد (بخش ۱۰).

### مهلت پاسخ (timeout)

`APIIR_TIMEOUT` (ثانیه) مهلت سراسری سرویس‌های سبک است و مثل توکن از `wp-config.php` قابل بازنویسی است (پیش‌فرض ۳۰ ثانیه). هر سرویس پیش‌فرض مخصوص خودش را در امضای تابع دارد:

| رده | پیش‌فرض | سرویس‌ها |
|---|---|---|
| استعلام سبک | `APIIR_TIMEOUT` (۳۰ ثانیه) | همه‌ی سرویس‌های دیگر |
| پردازش هوش مصنوعی / پاسخ حاوی تصویر | ۶۰ ثانیه | `ChatGPT`، `TextToSpeech`، `PersonData` |
| ارسال ویدئوی Base64 / ارسال گروهی | ۱۲۰ ثانیه | `VideoVerify`، `Call`، `SendSms` |

در هر فراخوانی می‌توانید مهلت را با **آرگومان آخر** تابع تغییر دهید:

```php
$result = apiir_shahkar('0010007700', '09120000000', false, 10); // ۱۰ ثانیه فقط برای این فراخوانی
```

وقتی مهلت تمام شود، خروجی همان آرایه‌ی استاندارد با `success = false` و متن خطا در `message` است؛ هیچ استثنا یا `wp_die` ای رخ نمی‌دهد.

### اعتبارسنجی SSL

`APIIR_SSL_VERIFY` پیش‌فرض `true` است و گواهی سرور `s.api.ir` را از طریق آرگومان `sslverify` تابع `wp_remote_post` بررسی می‌کند. این تنظیم **سراسری** است، فقط در `core.php` خوانده می‌شود، برای همه‌ی توابع یکسان اعمال می‌شود و به‌ازای هر فراخوانی قابل تغییر نیست.

> **هشدار:** خاموش کردن اعتبارسنجی SSL امنیت ارتباط را از بین می‌برد. فقط اگر هاست شما خطای گواهی می‌دهد و **فقط به‌صورت موقت** آن را `false` کنید. راه‌حل درست، به‌روزرسانی گواهی‌های هاست (بسته‌ی CA) است.

---

## ۴. قرارداد خروجی

هر تابع سرویس **همیشه** یک آرایه با همین چهار کلید برمی‌گرداند:

| کلید | نوع | توضیح |
|---|---|---|
| `success` | `bool` | فقط وقتی `true` است که سرویس هم `true` برگردانده باشد |
| `code` | `int` | فیلد `code` سرویس (در خطای اتصال `0`) |
| `message` | `string\|null` | پیام سرویس؛ در حالت خطا **هرگز خالی نیست** |
| `data` | `mixed\|null` | فیلد `data` سرویس؛ آبجکت‌ها به‌صورت **آرایه‌ی انجمنی** PHP برمی‌گردند |

> **همیشه اول `success` را بررسی کنید، سپس در صورت `null` نبودن `data`، مقدار آن را بخوانید.**

الگوی استاندارد مدیریت خطا:

```php
$result = apiir_iban_info('IR820540102680020817909002');

if (!$result['success']) {
    return 'خطا: ' . esc_html($result['message']) . ' (code: ' . (int)$result['code'] . ')';
}

$name = $result['data']['name'] ?? '';
```

در هر شرایطی — خطای شبکه، مهلت پاسخ، خطای SSL، پاسخ غیر ۲۰۰، پاسخ غیرقابل تبدیل — همین آرایه برمی‌گردد و **هیچ استثنایی پرتاب نمی‌شود**. اگر خطایی رخ داده باشد، متن آن در `message` است. افزونه‌ی شما هرگز به `try/catch` نیاز ندارد.

---

## ۵. فهرست کامل وب‌سرویس‌ها

همه‌ی وب‌سرویس‌ها به همان ترتیب OpenAPI (`https://s.api.ir/json`). هر سرویس یک فایل و یک تابع دارد؛ فقط فایل سرویس مورد نیاز خود را `require` کنید.

| سرویس | نام فارسی | شرح مختصر | پیاده‌سازی |
|---|---|---|---|
| Echo | Echo | سرویس تست رایگان با ساختار پاسخ یکسان با سایر وب‌سرویس‌ها | [echo.php](services/echo.php) |
| Shahkar | احراز هویت شاهکار | تطبیق کد ملی با شماره موبایل (رمزشده، با پشتیبانی اشخاص حقوقی) | [shahkar.php](services/shahkar.php) |
| ShahkarLite | احراز هویت شاهکار Lite | نسخه‌ی سبک شاهکار؛ تطبیق کد ملی با موبایل، مناسب کسب‌وکارهای کوچک | [shahkar-lite.php](services/shahkar-lite.php) |
| ShahkarPro | احراز هویت شاهکار Pro | شاهکار با پایداری بالاتر، مناسب سازمان‌ها و کسب‌وکارهای بزرگ | [shahkar-pro.php](services/shahkar-pro.php) |
| PersonInfo | استعلام مشخصات هویتی | مشخصات هویتی و وضعیت حیات فرد از ثبت احوال با کد ملی و تاریخ تولد | [person-info.php](services/person-info.php) |
| PersonData | استعلام مشخصات هویتی 2 | مشخصات هویتی، وضعیت حیات و عکس کارت ملی از ثبت احوال | [person-data.php](services/person-data.php) |
| CardMatch | تطبیق کد ملی با کارت بانکی | اطمینان از تعلق کارت بانکی به کد ملی مشتری | [card-match.php](services/card-match.php) |
| CardMobileMatch | تطبیق کارت بانکی با موبایل | اطمینان از تعلق کارت بانکی به شماره موبایل مشتری | [card-mobile-match.php](services/card-mobile-match.php) |
| IbanMatch | تطبیق کد ملی با شبا | اطمینان از تعلق شماره شبا به کد ملی مشتری | [iban-match.php](services/iban-match.php) |
| IbanMatchPro | تطبیق کد ملی با شبا پرو (سیاح) | تطبیق شبا و کد ملی بدون تاریخ تولد، مناسب KYC و پرداخت | [iban-match-pro.php](services/iban-match-pro.php) |
| Call | وب سرویس تماس تلفنی | پخش پیام صوتی از طریق تماس با فهرستی از شماره‌های ثابت و همراه | [call.php](services/call.php) |
| CallOTP | وب سرویس OTP تلفنی | اعلام کد یک‌بارمصرف از طریق تماس تلفنی؛ پشتیبان ارسال پیامکی | [call-otp.php](services/call-otp.php) |
| CallOTPalt | وب سرویس OTP تلفنی alt | OTP تلفنی روی شبکه‌ی مجزا؛ پشتیبان سرویس CallOTP | [call-otp-alt.php](services/call-otp-alt.php) |
| SmsOTP | وب سرویس OTP پیامکی | ارسال کد یا رمز پیامکی به همه‌ی شماره‌ها با خط ۸ رقمی | [sms-otp.php](services/sms-otp.php) |
| SendSms | ارسال پیامک خدماتی | ارسال انواع پیامک به فهرستی از شماره‌ها با خط اختصاصی و خدماتی | [send-sms.php](services/send-sms.php) |
| VideoVerifySpeechText | دریافت متن تصادفی ورودی احراز ویدئویی | تولید متن تصادفی برای خواندن در احراز ویدئویی | [video-verify-speech-text.php](services/video-verify-speech-text.php) |
| VideoVerify | احراز ویدئویی بایومتریک | تطبیق ویدئوی سلفی با هویت و کارت ملی، زنده‌سنجی و تطبیق گفتار | [video-verify.php](services/video-verify.php) |
| Enamad | استعلام دارنده اینماد | استعلام وضعیت نماد اعتماد الکترونیکی یک دامنه | [enamad.php](services/enamad.php) |
| IsHoliday | استعلام تعطیلی امروز | تعیین تعطیل بودن امروز برای اجرا یا توقف سرویس‌ها | [is-holiday.php](services/is-holiday.php) |
| Wallpaper | وب سرویس بگراند پویا برنامه | تصویر پس‌زمینه‌ی روزانه از سراسر جهان برای نرم‌افزار و سایت | [wallpaper.php](services/wallpaper.php) |
| IPLocation | وب سرویس تشخیص موقعیت IP | دریافت موقعیت جغرافیایی و مشخصات شبکه‌ی یک IP | [ip-location.php](services/ip-location.php) |
| CheckEmail | اعتبار سنجی ایمیل | بررسی صحت آدرس و فعال بودن یک ایمیل | [check-email.php](services/check-email.php) |
| IPIsIran | وب سرویس تشخیص IP ایرانی | تشخیص ایرانی بودن IP کاربر | [ip-is-iran.php](services/ip-is-iran.php) |
| MyIP | وب سرویس دریافت IP برنامه (کلاینت) | دریافت IP خروجی برنامه؛ مناسب بررسی اتصال و محدودیت IP کلید | [my-ip.php](services/my-ip.php) |
| BankAccountInfo | استعلام شبا با شماره حساب | دریافت شماره شبا و مالکان یک شماره حساب بانکی | [bank-account-info.php](services/bank-account-info.php) |
| BankCardInfo | استعلام مشخصات کارت بانکی | دریافت نام دارنده، شبا و شماره حساب از شماره کارت | [bank-card-info.php](services/bank-card-info.php) |
| CardInfo | استعلام نام مالک کارت بانکی | دریافت نام صاحب یک کارت بانکی | [card-info.php](services/card-info.php) |
| CardToIban | سرویس تبدیل کارت به شبا | دریافت شبا، نام دارنده و نام بانک از شماره کارت | [card-to-iban.php](services/card-to-iban.php) |
| IbanInfo | استعلام نام دارنده شبا | دریافت نام دارنده، نام بانک و وضعیت فعال بودن شبا | [iban-info.php](services/iban-info.php) |
| CompanyInfo | استعلام شخص حقوقی | اطلاعات ثبتی شرکت، موسسه یا سازمان با شناسه ملی | [company-info.php](services/company-info.php) |
| CompanyMembers | استعلام اعضای هیئت مدیره | فهرست اعضای هیئت مدیره و سهامداران شرکت با سمت‌ها | [company-members.php](services/company-members.php) |
| CompanyNewspapers | استعلام اگهی های روزنامه رسمی | آگهی‌های منتشرشده‌ی شرکت در روزنامه‌های رسمی و محلی | [company-newspapers.php](services/company-newspapers.php) |
| CompanySignatories | استعلام صاحبین حق امضا شرکت‌ها | فهرست افراد دارای حق امضا در شرکت طبق روزنامه رسمی | [company-signatories.php](services/company-signatories.php) |
| TaxRecords | استعلام پرونده ها مالیاتی | پرونده‌های مالیاتی و وضعیت ثبت‌نام اشخاص حقیقی یا حقوقی | [tax-records.php](services/tax-records.php) |
| GeoToAddress | تبدیل لوکیشن به آدرس | دریافت استان، شهر و آدرس از مختصات جغرافیایی | [geo-to-address.php](services/geo-to-address.php) |
| PostalCodeInfo | سرویس استعلام کدپستی | دریافت آدرس دقیق یک کد پستی از پست | [postal-code-info.php](services/postal-code-info.php) |
| PostalCodePro | سرویس استعلام کدپستی نسخه Pro | آدرس دقیق کد پستی به‌همراه لوکیشن و لینک نقشه | [postal-code-pro.php](services/postal-code-pro.php) |
| PostalTracking | سرویس رهیگیری بسته پستی | وضعیت و رویدادهای مرسوله‌ی پستی با کد رهگیری | [postal-tracking.php](services/postal-tracking.php) |
| PostalCodeLocation | سرویس دریافت لوکیشن با کدپستی | دریافت مختصات جغرافیایی و لینک نقشه از کد پستی | [postal-code-location.php](services/postal-code-location.php) |
| ChatGPT | وب سرویس Chat GPT | دسترسی به GPT نسخه‌ی ۴ برای پردازش متن | [chat-gpt.php](services/chat-gpt.php) |
| TextToSpeech | تبدیل متن به صوت با هوش مصنوعی بومی | تبدیل متن کوتاه به صوت با هوش مصنوعی؛ کارکرد در اینترنت ملی | [text-to-speech.php](services/text-to-speech.php) |
| Sana | استعلام سامانه ثنا | بررسی داشتن یا نداشتن شماره ثنا با کد ملی یا شناسه ملی | [sana.php](services/sana.php) |
| UnpaidCheque | استعلام تعداد چک برگشتی | تعداد و مبلغ چک‌های برگشتی فرد (سطح ۲) | [unpaid-cheque.php](services/unpaid-cheque.php) |
| UnpaidChequeLite | استعلام تعداد چک برگشتی Lite | فقط تعداد چک‌های برگشتی فرد (نسخه‌ی سبک) | [unpaid-cheque-lite.php](services/unpaid-cheque-lite.php) |
| UnpaidChequePro | استعلام تعداد چک برگشتی پرو | تعداد، مبلغ و فهرست چک‌های برگشتی با شعبه‌ی برگشت‌دهنده | [unpaid-cheque-pro.php](services/unpaid-cheque-pro.php) |
| ChequeColor | استعلام رنگ چک صیادی | وضعیت اعتباری صادرکننده‌ی چک به‌صورت رنگ (سفید تا قرمز) | [cheque-color.php](services/cheque-color.php) |
| ChequeInfo | استعلام مشخصات چک صیادی | اطلاعات کامل چک صیادی با شناسه‌ی چک | [cheque-info.php](services/cheque-info.php) |
| License | استعلام اعتبار مجوز شغلی | اعتبار مجوز شغلی (پروانه کسب) شخصی یا شرکتی | [license.php](services/license.php) |
| MedicalLicense | استعلام اعتبار پروانه پزشکی | اعتبار پروانه پزشکی و فهرست مجوزها با کد نظام پزشکی | [medical-license.php](services/medical-license.php) |
| ActiveLoans | استعلام تسهیلات فعال بانکی | تعداد و مبالغ تسهیلات فعال، معوق و سررسیدگذشته‌ی مشتری | [active-loans.php](services/active-loans.php) |
| PassportStatus | استعلام وضعیت پاسپورت | اعتبار و وضعیت گذرنامه‌ی فرد با کد ملی و موبایل | [passport-status.php](services/passport-status.php) |
| DrivingScore | استعلام نمره منفی گواهینامه | نمرات منفی و تعداد خلافی ثبت‌شده روی گواهینامه | [driving-score.php](services/driving-score.php) |
| DrivingLisense | استعلام گواهینامه رانندگی قدیم | بررسی اعتبار گواهینامه‌ی رانندگی (نسخه‌ی قدیم) | [driving-lisense.php](services/driving-lisense.php) |
| DrivingLicense | استعلام گواهینامه رانندگی جدید | بررسی اعتبار گواهینامه‌ی رانندگی (نسخه‌ی جدید) | [driving-license.php](services/driving-license.php) |
| MilitaryStatus | استعلام خدمت سربازی | وضعیت نظام وظیفه‌ی فرد برای فرآیندهای استخدامی و اداری | [military-status.php](services/military-status.php) |
| ActivePlates | استعلام پلاک های فعال | فهرست پلاک‌های فعال و فک‌شده‌ی فرد با کد ملی و موبایل | [active-plates.php](services/active-plates.php) |
| PlateHistory | استعلام تاریخچه پلاک | تاریخچه‌ی پلاک، مدل خودرو و تاریخ نصب و فک | [plate-history.php](services/plate-history.php) |
| VehicleCard | استعلام کارت و سند خودرو | اعتبار کارت خودرو و سند مالکیت برای جلوگیری از جعل | [vehicle-card.php](services/vehicle-card.php) |
| VehicleInfo | استعلام مشخصات و مدل خودرو | شماره موتور، شاسی، VIN و مدل خودرو با کد ملی و پلاک | [vehicle-info.php](services/vehicle-info.php) |
| VehicleViolation | وب سرویس استعلام خلافی خودرو | فهرست و مبلغ کل خلافی‌های خودرو | [vehicle-violation.php](services/vehicle-violation.php) |
| NationalityStatus | استعلام وضعیت اتباع | اعتبار و اطلاعات کارت اتباع از مراجع انتظامی | [nationality-status.php](services/nationality-status.php) |
| WatterBill | وب سرویس قبض آب | مبلغ و شناسه پرداخت قبض آب با شناسه قبض | [watter-bill.php](services/watter-bill.php) |
| WatterBillInfo | وب سرویس قبض آب با جزئیات | قبض آب همراه با مشخصات مشترک و کنتور | [watter-bill-info.php](services/watter-bill-info.php) |
| GasBill | وب سرویس قبض گاز | مبلغ و شناسه پرداخت قبض گاز با شناسه قبض | [gas-bill.php](services/gas-bill.php) |
| GasBillInfo | وب سرویس قبض گاز با جزئیات | قبض گاز همراه با مشخصات اشتراک و کنتور | [gas-bill-info.php](services/gas-bill-info.php) |
| PowerBill | وب سرویس قبض برق | مبلغ و شناسه پرداخت قبض برق با شناسه قبض | [power-bill.php](services/power-bill.php) |
| PowerBillInfo | وب سرویس قبض برق با جزئیات | قبض برق همراه با مشخصات مشترک و کنتور | [power-bill-info.php](services/power-bill-info.php) |
---

## ۶. راهنمای هر سرویس

نام تابع هر سرویس `apiir_` + نام سرویس به snake_case است (مثلاً `SmsOTP` → `apiir_sms_otp`). پارامتر اختیاری `$timeout` آخرین آرگومان همه‌ی توابع است و در جدول‌های زیر تکرار نشده است (بخش ۳، «مهلت پاسخ»). خروجی `data` از نوع object/array به‌صورت آرایه‌ی انجمنی PHP برمی‌گردد.

### Echo — Echo

تست، دیباگ و پیاده‌سازی اولیه به‌صورت رایگان؛ ساختار پاسخ با سایر وب‌سرویس‌ها یکسان است.

**پارامترها:**

| نام | نوع | اجباری | توضیح | نمونه مقدار |
|---|---|---|---|---|
| `name` | string | بله | نام شما؟ | `علی` |

**مهلت پیش‌فرض:** ۳۰ ثانیه (`APIIR_TIMEOUT`) — استعلام سبک.

**نمونه کد:**

```php
require_once plugin_dir_path(__FILE__) . 'apiir/services/echo.php';

$result = apiir_echo('علی');

if ($result['success']) {
    $info = $result['data']; // آرایه‌ی انجمنی — مثال: $info['greeting']
}
```

**نمونه خروجی `data`:**

```json
{
  "greeting": "سلام علی",
  "job": "برنامه‌نویس",
  "quirks": ["نمونه ۱", "نمونه ۲"],
  "tokenStatus": true
}
```

**نکته:** این سرویس هزینه ندارد و برای بررسی صحت کلید مناسب است؛ فیلد `tokenStatus` وضعیت کلید شما را نشان می‌دهد.

---

### Shahkar — احراز هویت شاهکار

تطبیق کد ملی یا شناسه ملی با شماره موبایل؛ داده‌ها به‌صورت رمزشده استعلام می‌شود.

**پارامترها:**

| نام | نوع | اجباری | توضیح | نمونه مقدار |
|---|---|---|---|---|
| `nationalCode` | string | بله | کد ملی یا شناسه ملی | `0010007700` |
| `mobile` | string | بله | موبایل با فرمت 09120001111 | `09120000000` |
| `isCompany` | boolean | بله | حقوقی یا حقیقی — پیش‌فرض در SDK: `false` | `false` |

**مهلت پیش‌فرض:** ۳۰ ثانیه (`APIIR_TIMEOUT`) — استعلام سبک.

**نمونه کد:**

```php
require_once plugin_dir_path(__FILE__) . 'apiir/services/shahkar.php';

$result = apiir_shahkar('0010007700', '09120000000');

if ($result['success']) {
    $ok = ($result['data'] === true);
}
```

**نمونه خروجی `data`:**

```json
true
```

**نکته:** کد ملی ۱۰ رقمی با صفرهای ابتدایی و موبایل با صفر ابتدایی ارسال شود. برای اشخاص حقوقی `isCompany` را `true` بدهید.

---

### ShahkarLite — احراز هویت شاهکار Lite

نسخه‌ی Lite شاهکار؛ تطبیق کد ملی با شماره موبایل با قیمت کمتر، مناسب کسب‌وکارهای کوچک.

**پارامترها:**

| نام | نوع | اجباری | توضیح | نمونه مقدار |
|---|---|---|---|---|
| `nationalCode` | string | بله | کد ملی | `0010007700` |
| `mobile` | string | بله | موبایل با فرمت 09120001111 | `09120000000` |

**مهلت پیش‌فرض:** ۳۰ ثانیه (`APIIR_TIMEOUT`) — استعلام سبک.

**نمونه کد:**

```php
require_once plugin_dir_path(__FILE__) . 'apiir/services/shahkar-lite.php';

$result = apiir_shahkar_lite('0010007700', '09120000000');

if ($result['success']) {
    $ok = ($result['data'] === true);
}
```

**نمونه خروجی `data`:**

```json
true
```

**نکته:** تفاوت با نسخه‌ی اصلی در قیمت و نوع ارسال داده است؛ در نسخه‌ی اصلی داده رمزشده استعلام می‌شود.

---

### ShahkarPro — احراز هویت شاهکار Pro

تطبیق کد ملی یا شناسه ملی با موبایل با معماری ارتباطی پایدارتر؛ مناسب سازمان‌ها و کسب‌وکارهای بزرگ.

**پارامترها:**

| نام | نوع | اجباری | توضیح | نمونه مقدار |
|---|---|---|---|---|
| `nationalCode` | string | بله | کد ملی یا شناسه ملی | `0010007700` |
| `mobile` | string | بله | موبایل با فرمت 09120001111 | `09120000000` |
| `isCompany` | boolean | بله | حقوقی یا حقیقی — پیش‌فرض در SDK: `false` | `false` |

**مهلت پیش‌فرض:** ۳۰ ثانیه (`APIIR_TIMEOUT`) — استعلام سبک.

**نمونه کد:**

```php
require_once plugin_dir_path(__FILE__) . 'apiir/services/shahkar-pro.php';

$result = apiir_shahkar_pro('0010007700', '09120000000');

if ($result['success']) {
    $ok = ($result['data'] === true);
}
```

**نمونه خروجی `data`:**

```json
true
```

**نکته:** داده‌ها به‌صورت رمزشده استعلام می‌شود و استعلام شناسه ملی و سیم‌کارت اشخاص حقوقی هم پشتیبانی می‌شود.

---

### PersonInfo — استعلام مشخصات هویتی

دریافت مشخصات هویتی و وضعیت حیات فرد از ثبت احوال با کد ملی و تاریخ تولد (نیازمند سطح مجوز trust level).

**پارامترها:**

| نام | نوع | اجباری | توضیح | نمونه مقدار |
|---|---|---|---|---|
| `nationalCode` | string | بله | کد ملی | `0010007700` |
| `birthDate` | string | بله | تاریخ تولد به فرمت 1370/1/1 | `1371/1/1` |

**مهلت پیش‌فرض:** ۳۰ ثانیه (`APIIR_TIMEOUT`) — استعلام سبک.

**نمونه کد:**

```php
require_once plugin_dir_path(__FILE__) . 'apiir/services/person-info.php';

$result = apiir_person_info('0010007700', '1371/1/1');

if ($result['success']) {
    $info = $result['data']; // آرایه‌ی انجمنی — مثال: $info['nationalCode']
}
```

**نمونه خروجی `data`:**

```json
{
  "nationalCode": "0010007700",
  "firstName": "علی",
  "lastName": "محمدی",
  "fatherName": "حسن",
  "gender": 1,
  "alive": true
}
```

**نکته:** تاریخ تولد شمسی با جداکننده‌ی `/` ارسال شود (مثال: `1370/1/1`). این سرویس نیازمند سطح مجوز trust level است.

---

### PersonData — استعلام مشخصات هویتی 2

دریافت مشخصات هویتی، وضعیت حیات و تصویر کارت ملی فرد از ثبت احوال (ارائه به سازمان‌ها با مجوزهای لازم).

**پارامترها:**

| نام | نوع | اجباری | توضیح | نمونه مقدار |
|---|---|---|---|---|
| `nationalCode` | string | بله | کد ملی | `0010007700` |
| `birthDate` | string | بله | تاریخ تولد به فرمت 1370/1/1 | `1371/1/1` |

**مهلت پیش‌فرض:** ۶۰ ثانیه — پاسخ شامل تصویر کارت ملی به‌صورت Base64 است و حجم بیشتری دارد.

**نمونه کد:**

```php
require_once plugin_dir_path(__FILE__) . 'apiir/services/person-data.php';

$result = apiir_person_data('0010007700', '1371/1/1');

if ($result['success']) {
    $info = $result['data']; // آرایه‌ی انجمنی — مثال: $info['nationalCode']
}
```

**نمونه خروجی `data`:**

```json
{
  "nationalCode": "0010007700",
  "firstName": "علی",
  "lastName": "محمدی",
  "fatherName": "حسن",
  "gender": 1,
  "alive": true,
  "imageBase64": "iVBORw0KGgoAAAANSUhEUgAA..."
}
```

**نکته:** `gender`: آقا=1 خانم=2. فیلد `imageBase64` در صورت وجود، تصویر را به‌صورت Base64 برمی‌گرداند و می‌تواند حجیم باشد.

---

### CardMatch — تطبیق کد ملی با کارت بانکی

بررسی تعلق کارت بانکی به کد ملی و تاریخ تولد مشتری.

**پارامترها:**

| نام | نوع | اجباری | توضیح | نمونه مقدار |
|---|---|---|---|---|
| `nationalCode` | string | بله | کد ملی | `0010007700` |
| `birthDate` | string | بله | تاریخ تولد به فرمت 1370/1/1 | `1371/1/1` |
| `cardNumber` | string | بله | شماره کارت بانکی | `6037990000000000` |

**مهلت پیش‌فرض:** ۳۰ ثانیه (`APIIR_TIMEOUT`) — استعلام سبک.

**نمونه کد:**

```php
require_once plugin_dir_path(__FILE__) . 'apiir/services/card-match.php';

$result = apiir_card_match('0010007700', '1371/1/1', '6037990000000000');

if ($result['success']) {
    $ok = ($result['data'] === true);
}
```

**نمونه خروجی `data`:**

```json
true
```

**نکته:** شماره کارت ۱۶ رقمی بدون فاصله و خط تیره ارسال شود.

---

### CardMobileMatch — تطبیق کارت بانکی با موبایل

بررسی تعلق کارت بانکی به شماره موبایل مشتری.

**پارامترها:**

| نام | نوع | اجباری | توضیح | نمونه مقدار |
|---|---|---|---|---|
| `mobile` | string | بله | موبایل با فرمت 09120001111 | `09120000000` |
| `cardNumber` | string | بله | شماره کارت بانکی | `6037990000000000` |

**مهلت پیش‌فرض:** ۳۰ ثانیه (`APIIR_TIMEOUT`) — استعلام سبک.

**نمونه کد:**

```php
require_once plugin_dir_path(__FILE__) . 'apiir/services/card-mobile-match.php';

$result = apiir_card_mobile_match('09120000000', '6037990000000000');

if ($result['success']) {
    $ok = ($result['data'] === true);
}
```

**نمونه خروجی `data`:**

```json
true
```

---

### IbanMatch — تطبیق کد ملی با شبا

بررسی تعلق شماره شبا به کد ملی و تاریخ تولد مشتری.

**پارامترها:**

| نام | نوع | اجباری | توضیح | نمونه مقدار |
|---|---|---|---|---|
| `nationalCode` | string | بله | کد ملی | `0010007700` |
| `birthDate` | string | بله | تاریخ تولد به فرمت 1370/1/1 | `1371/1/1` |
| `iban` | string | بله | شماره شبا ۲۶ رقمی به فرمت IR000000000000000000000000 | `IR820540102680020817909002` |

**مهلت پیش‌فرض:** ۳۰ ثانیه (`APIIR_TIMEOUT`) — استعلام سبک.

**نمونه کد:**

```php
require_once plugin_dir_path(__FILE__) . 'apiir/services/iban-match.php';

$result = apiir_iban_match('0010007700', '1371/1/1', 'IR820540102680020817909002');

if ($result['success']) {
    $ok = ($result['data'] === true);
}
```

**نمونه خروجی `data`:**

```json
true
```

**نکته:** شبا با پیشوند `IR` و ۲۶ کاراکتر، بدون فاصله ارسال شود.

---

### IbanMatchPro — تطبیق کد ملی با شبا پرو (سیاح)

تطبیق شماره شبا با کد ملی بدون نیاز به تاریخ تولد؛ مناسب فرآیندهای KYC، پرداخت و تسویه‌حساب.

**پارامترها:**

| نام | نوع | اجباری | توضیح | نمونه مقدار |
|---|---|---|---|---|
| `nationalCode` | string | بله | کد ملی | `0010007700` |
| `iban` | string | بله | شماره شبا ۲۶ رقمی به فرمت IR000000000000000000000000 | `IR820540102680020817909002` |

**مهلت پیش‌فرض:** ۳۰ ثانیه (`APIIR_TIMEOUT`) — استعلام سبک.

**نمونه کد:**

```php
require_once plugin_dir_path(__FILE__) . 'apiir/services/iban-match-pro.php';

$result = apiir_iban_match_pro('0010007700', 'IR820540102680020817909002');

if ($result['success']) {
    $ok = ($result['data'] === true);
}
```

**نمونه خروجی `data`:**

```json
true
```

**نکته:** برخلاف `IbanMatch`، تاریخ تولد لازم نیست.

---

### Call — وب سرویس تماس تلفنی

برقراری تماس تلفنی و پخش فایل صوتی برای فهرستی از شماره‌های ثابت و همراه؛ بدون بلک‌لیست.

**پارامترها:**

| نام | نوع | اجباری | توضیح | نمونه مقدار |
|---|---|---|---|---|
| `voiceID` | string | بله | شناسه فایل صوتی | `397FB7F7-38A5-4748-A72B-352FF36B0D71` |
| `numbers` | array | بله | لیستی از شماره موبایل‌ها یا تلفن‌های ثابت | ["09120000000", "02112345678"] |

**مهلت پیش‌فرض:** ۱۲۰ ثانیه — ارسال گروهی به فهرست شماره‌ها و پردازش زمان‌بر.

**نمونه کد:**

```php
require_once plugin_dir_path(__FILE__) . 'apiir/services/call.php';

$result = apiir_call('397FB7F7-38A5-4748-A72B-352FF36B0D71', ['09120000000', '02112345678']);

if ($result['success']) {
    $ok = ($result['data'] === true);
}
```

**نمونه خروجی `data`:**

```json
true
```

**نکته:** `numbers` یک آرایه‌ی PHP از رشته‌ها است. امکان سفارشی‌سازی لهجه، گویش و موزیک پس‌زمینه وجود دارد.

---

### CallOTP — وب سرویس OTP تلفنی

اعلام کد یک‌بارمصرف از طریق تماس تلفنی؛ به‌عنوان پشتیبان ارسال پیامکی کد.

**پارامترها:**

| نام | نوع | اجباری | توضیح | نمونه مقدار |
|---|---|---|---|---|
| `code` | string | بله | کد یکبار مصرف یا OTP | `12345` |
| `number` | string | بله | شماره موبایل 09121112222 یا تلفن ثابت به فرمت 02122228888 | `09121112222` |

**مهلت پیش‌فرض:** ۳۰ ثانیه (`APIIR_TIMEOUT`) — استعلام سبک.

**نمونه کد:**

```php
require_once plugin_dir_path(__FILE__) . 'apiir/services/call-otp.php';

$result = apiir_call_otp('12345', '09121112222');

if ($result['success']) {
    $ok = ($result['data'] === true);
}
```

**نمونه خروجی `data`:**

```json
true
```

**نکته:** کد را سمت برنامه با `random_int` تولید و با `set_transient` ذخیره کنید (بخش سناریوها).

---

### CallOTPalt — وب سرویس OTP تلفنی alt

اعلام کد یک‌بارمصرف از طریق تماس روی شبکه‌ی مجزا؛ گزینه‌ی پشتیبان سرویس CallOTP.

**پارامترها:**

| نام | نوع | اجباری | توضیح | نمونه مقدار |
|---|---|---|---|---|
| `code` | string | بله | کد یکبار مصرف یا OTP | `1234` |
| `number` | string | بله | شماره موبایل 09121112222 یا تلفن ثابت به فرمت 02122228888 | `09121112222` |

**مهلت پیش‌فرض:** ۳۰ ثانیه (`APIIR_TIMEOUT`) — استعلام سبک.

**نمونه کد:**

```php
require_once plugin_dir_path(__FILE__) . 'apiir/services/call-otp-alt.php';

$result = apiir_call_otp_alt('1234', '09121112222');

if ($result['success']) {
    $ok = ($result['data'] === true);
}
```

**نمونه خروجی `data`:**

```json
true
```

---

### SmsOTP — وب سرویس OTP پیامکی

ارسال کد یا رمز پیامکی به همه‌ی شماره‌ها از خط ۸ رقمی، بدون نیاز به خط خدماتی یا پنل پیامکی.

**پارامترها:**

| نام | نوع | اجباری | توضیح | نمونه مقدار |
|---|---|---|---|---|
| `code` | string | بله | کد یا OTP | `123456` |
| `mobile` | string | بله | موبایل به فرمت 09121112222 | `09120000000` |
| `template` | integer | خیر | کد=0 کد ورود=1 کد تایید=2 رمز=3 رمز ورود=4 — پیش‌فرض در SDK: `1` | `1` |

**مهلت پیش‌فرض:** ۳۰ ثانیه (`APIIR_TIMEOUT`) — استعلام سبک.

**نمونه کد:**

```php
require_once plugin_dir_path(__FILE__) . 'apiir/services/sms-otp.php';

$result = apiir_sms_otp('123456', '09120000000');

if ($result['success']) {
    $ok = ($result['data'] === true);
}
```

**نمونه خروجی `data`:**

```json
true
```

**نکته:** برای افزودن نام به انتهای پیامک به پشتیبانی پیام دهید. کد را سمت برنامه تولید و با انقضا ذخیره کنید (بخش سناریوها).

---

### SendSms — ارسال پیامک خدماتی

ارسال پیامک خدماتی به فهرستی از شماره‌ها با خط اختصاصی.

**پارامترها:**

| نام | نوع | اجباری | توضیح | نمونه مقدار |
|---|---|---|---|---|
| `message` | string | بله | متن پیامک | `کاربر گرامی بسته شما با شماره 1828772 به پست ارسال شد` |
| `mobiles` | array | بله | موبایل‌ها به صورت لیست | ["09120001111", "09120002222"] |

**مهلت پیش‌فرض:** ۱۲۰ ثانیه — ارسال گروهی به فهرست شماره‌ها و پردازش زمان‌بر.

**نمونه کد:**

```php
require_once plugin_dir_path(__FILE__) . 'apiir/services/send-sms.php';

$result = apiir_send_sms('کاربر گرامی بسته شما با شماره 1828772 به پست ارسال شد', ['09120001111', '09120002222']);

if ($result['success']) {
    $value = (int) $result['data'];
}
```

**نمونه خروجی `data`:**

```json
1
```

**نکته:** `mobiles` یک آرایه‌ی PHP از رشته‌ها است. خروجی `data` یک عدد صحیح است.

---

### VideoVerifySpeechText — دریافت متن تصادفی ورودی احراز ویدئویی

تولید یک متن تصادفی که کاربر هنگام ضبط ویدئوی احراز هویت می‌خواند.

**پارامترها:** این سرویس ورودی ندارد؛ بدنه‌ی `{}` ارسال می‌شود.

**مهلت پیش‌فرض:** ۳۰ ثانیه (`APIIR_TIMEOUT`) — استعلام سبک.

**نمونه کد:**

```php
require_once plugin_dir_path(__FILE__) . 'apiir/services/video-verify-speech-text.php';

$result = apiir_video_verify_speech_text();

if ($result['success']) {
    $text = (string) $result['data'];
}
```

**نمونه خروجی `data`:**

```json
"بهار فصل شگوفه هاست"
```

**نکته:** متن دریافتی را در پارامتر `speechText` سرویس `VideoVerify` ارسال کنید.

---

### VideoVerify — احراز ویدئویی بایومتریک

احراز هویت بایومتریک +Live: تطبیق ویدئوی سلفی با اطلاعات هویتی و تصویر کارت ملی، زنده‌سنجی و تطبیق متن خوانده‌شده.

**پارامترها:**

| نام | نوع | اجباری | توضیح | نمونه مقدار |
|---|---|---|---|---|
| `nationalCode` | string | بله | کد ملی | `0010007700` |
| `birthDate` | string | بله | تاریخ تولد به فرمت 1370/1/1 | `1371/1/1` |
| `serialNumber` | string | بله | سریال پشت کارت ملی یا رهگیری رسید کارت ملی (حداقل ۵ کاراکتر) | `i1R8389398` |
| `videoBase64` | string | بله | ویدئوی سلفی کاربر به صورت Base64 و حداکثر ۵ مگابایت | `iVBORw0KGgoAAAANSUhEUgAA...` |
| `speechText` | string | بله | متن تصادفی که فرد هنگام ضبط می‌خواند (حداقل ۱۰ کاراکتر)؛ از سرویس VideoVerifySpeechText دریافت کنید | `بهار فصل شگوفه هاست` |
| `matchingThreshold` | integer | خیر | حد آستانه تطبیق چهره — پیش‌فرض در SDK: `80` | `80` |
| `livenessThreshold` | integer | خیر | حد آستانه زنده سنجی — پیش‌فرض در SDK: `80` | `80` |
| `speechThreshold` | integer | خیر | حد آستانه تطبیق گفتار — پیش‌فرض در SDK: `50` | `50` |

**مهلت پیش‌فرض:** ۱۲۰ ثانیه — ارسال ویدئوی Base64 تا ۵ مگابایت و پردازش زمان‌بر.

**نمونه کد:**

```php
require_once plugin_dir_path(__FILE__) . 'apiir/services/video-verify.php';

$result = apiir_video_verify('0010007700', '1371/1/1', 'i1R8389398', base64_encode(file_get_contents('/path/to/selfie.mp4')), 'بهار فصل شگوفه هاست');

if ($result['success']) {
    $info = $result['data']; // آرایه‌ی انجمنی — مثال: $info['matchingScore']
}
```

**نمونه خروجی `data`:**

```json
{
  "matchingScore": 92,
  "isMatch": true,
  "livenessScore": 95,
  "isLiveness": true,
  "speechScore": 70,
  "isSpeechMatched": true,
  "isPassed": true
}
```

**نکته:** حجم ویدئو حداکثر ۵ مگابایت. ویدئو را با `base64_encode(file_get_contents($path))` تبدیل کنید. نتیجه‌ی نهایی در `isPassed` است.

---

### Enamad — استعلام دارنده اینماد

استعلام وضعیت نماد اعتماد الکترونیکی (اینماد) یک وب‌سایت.

**پارامترها:**

| نام | نوع | اجباری | توضیح | نمونه مقدار |
|---|---|---|---|---|
| `domain` | string | بله | نام دامنه | `mci.ir` |

**مهلت پیش‌فرض:** ۳۰ ثانیه (`APIIR_TIMEOUT`) — استعلام سبک.

**نمونه کد:**

```php
require_once plugin_dir_path(__FILE__) . 'apiir/services/enamad.php';

$result = apiir_enamad('mci.ir');

if ($result['success']) {
    $info = $result['data']; // آرایه‌ی انجمنی — مثال: $info['domain']
}
```

**نمونه خروجی `data`:**

```json
{
  "domain": "mci.ir",
  "title": "همراه اول",
  "province": "تهران",
  "city": "تهران",
  "star": 2,
  "addDate": "1400/01/01",
  "expDate": "1404/01/01"
}
```

**نکته:** دامنه بدون `http://` و بدون `www` ارسال شود (مثال: `mci.ir`).

---

### IsHoliday — استعلام تعطیلی امروز

تعیین تعطیل بودن امروز؛ برای اجرا یا توقف برخی سرویس‌ها در روزهای تعطیل.

**پارامترها:**

| نام | نوع | اجباری | توضیح | نمونه مقدار |
|---|---|---|---|---|
| `weekend` | boolean | خیر | تعطیلات آخر هفته هم لحاظ شود؟ — پیش‌فرض در SDK: `true` | `true` |

**مهلت پیش‌فرض:** ۳۰ ثانیه (`APIIR_TIMEOUT`) — استعلام سبک.

**نمونه کد:**

```php
require_once plugin_dir_path(__FILE__) . 'apiir/services/is-holiday.php';

$result = apiir_is_holiday();

if ($result['success']) {
    $ok = ($result['data'] === true);
}
```

**نمونه خروجی `data`:**

```json
true
```

**نکته:** با `weekend = false` فقط تعطیلات رسمی بررسی می‌شود.

---

### Wallpaper — وب سرویس بگراند پویا برنامه

دریافت تصویر پس‌زمینه‌ی جدید روزانه از سراسر جهان برای جذاب‌تر کردن محیط نرم‌افزار یا سایت.

**پارامترها:** این سرویس ورودی ندارد؛ بدنه‌ی `{}` ارسال می‌شود.

**مهلت پیش‌فرض:** ۳۰ ثانیه (`APIIR_TIMEOUT`) — استعلام سبک.

**نمونه کد:**

```php
require_once plugin_dir_path(__FILE__) . 'apiir/services/wallpaper.php';

$result = apiir_wallpaper();

if ($result['success']) {
    $text = (string) $result['data'];
}
```

**نمونه خروجی `data`:**

```json
"https://.../wallpaper.jpg"
```

---

### IPLocation — وب سرویس تشخیص موقعیت IP

دریافت موقعیت جغرافیایی و مشخصات شبکه‌ی یک آدرس IP نسخه‌ی ۴.

**پارامترها:**

| نام | نوع | اجباری | توضیح | نمونه مقدار |
|---|---|---|---|---|
| `ip` | string | بله | آی پی ورژن 4 | `5.212.154.19` |

**مهلت پیش‌فرض:** ۳۰ ثانیه (`APIIR_TIMEOUT`) — استعلام سبک.

**نمونه کد:**

```php
require_once plugin_dir_path(__FILE__) . 'apiir/services/ip-location.php';

$result = apiir_ip_location('5.212.154.19');

if ($result['success']) {
    $info = $result['data']; // آرایه‌ی انجمنی — مثال: $info['query']
}
```

**نمونه خروجی `data`:**

```json
{
  "query": "5.212.154.19",
  "status": "success",
  "country": "Iran",
  "countryCode": "IR",
  "region": "23",
  "regionName": "Tehran",
  "city": "Tehran",
  "zip": "",
  "lat": 35.6892,
  "lon": 51.389,
  "timezone": "Asia/Tehran",
  "isp": "...",
  "org": "...",
  "as": "..."
}
```

**نکته:** فقط IPv4 پشتیبانی می‌شود.

---

### CheckEmail — اعتبار سنجی ایمیل

بررسی صحت آدرس و فعال بودن یک ایمیل.

**پارامترها:**

| نام | نوع | اجباری | توضیح | نمونه مقدار |
|---|---|---|---|---|
| `email` | string | بله | ایمیل | `info@api.ir` |

**مهلت پیش‌فرض:** ۳۰ ثانیه (`APIIR_TIMEOUT`) — استعلام سبک.

**نمونه کد:**

```php
require_once plugin_dir_path(__FILE__) . 'apiir/services/check-email.php';

$result = apiir_check_email('info@api.ir');

if ($result['success']) {
    $ok = ($result['data'] === true);
}
```

**نمونه خروجی `data`:**

```json
true
```

**نکته:** قبل از ارسال، ایمیل را با `sanitize_email` و `is_email` وردپرس بررسی کنید تا اعتبار حساب بابت ورودی نامعتبر مصرف نشود.

---

### IPIsIran — وب سرویس تشخیص IP ایرانی

تشخیص ایرانی بودن آدرس IP کاربر.

**پارامترها:**

| نام | نوع | اجباری | توضیح | نمونه مقدار |
|---|---|---|---|---|
| `ip` | string | بله | آی پی ورژن 4 | `192.168.1.1` |

**مهلت پیش‌فرض:** ۳۰ ثانیه (`APIIR_TIMEOUT`) — استعلام سبک.

**نمونه کد:**

```php
require_once plugin_dir_path(__FILE__) . 'apiir/services/ip-is-iran.php';

$result = apiir_ip_is_iran('192.168.1.1');

if ($result['success']) {
    $ok = ($result['data'] === true);
}
```

**نمونه خروجی `data`:**

```json
true
```

**نکته:** فقط IPv4 پشتیبانی می‌شود.

---

### MyIP — وب سرویس دریافت IP برنامه (کلاینت)

دریافت IP خروجی برنامه‌ی شما؛ برای بررسی اتصال و تنظیم محدودیت IP روی کلیدها.

**پارامترها:** این سرویس ورودی ندارد؛ بدنه‌ی `{}` ارسال می‌شود.

**مهلت پیش‌فرض:** ۳۰ ثانیه (`APIIR_TIMEOUT`) — استعلام سبک.

**نمونه کد:**

```php
require_once plugin_dir_path(__FILE__) . 'apiir/services/my-ip.php';

$result = apiir_my_ip();

if ($result['success']) {
    $text = (string) $result['data'];
}
```

**نمونه خروجی `data`:**

```json
"5.212.154.19"
```

**نکته:** IP برگشتی همان IP ای است که باید در «مدیریت IP» کلید در پنل `https://p.api.ir` مجاز شود.

---

### BankAccountInfo — استعلام شبا با شماره حساب

استعلام شماره حساب بانکی و دریافت شماره شبای متعلق به آن.

**پارامترها:**

| نام | نوع | اجباری | توضیح | نمونه مقدار |
|---|---|---|---|---|
| `accountNumber` | string | بله | شماره حساب بانکی | `3022.100.18878774.1` |
| `bankCode` | string | خیر | کد بانک: مرکزی=010 صنعت‌ومعدن=011 ملت=012 رفاه=013 مسکن=014 سپه=015 کشاورزی=016 ملی=017 تجارت=018 صادرات=019 توسعه‌صادرات=020 پست‌بانک=021 توسعه‌تعاون=022 کارآفرین=053 پارسیان=054 اقتصادنوین=055 سامان=056 پاسارگاد=057 سرمایه=058 سینا=059 مهرایران=060 شهر=061 آینده=062 گردشگری=064 دی=066 ایران‌زمین=069 رسالت=070 ملل=075 خاورمیانه=080 | `012` |

**مهلت پیش‌فرض:** ۳۰ ثانیه (`APIIR_TIMEOUT`) — استعلام سبک.

**نمونه کد:**

```php
require_once plugin_dir_path(__FILE__) . 'apiir/services/bank-account-info.php';

$result = apiir_bank_account_info('3022.100.18878774.1');

if ($result['success']) {
    $info = $result['data']; // آرایه‌ی انجمنی — مثال: $info['iban']
}
```

**نمونه خروجی `data`:**

```json
{
  "iban": "IR820540102680020817909002",
  "active": true,
  "owners": ["علی محمدی"]
}
```

**نکته:** `bankCode` اختیاری است و فقط در صورت مقداردهی ارسال می‌شود.

---

### BankCardInfo — استعلام مشخصات کارت بانکی

دریافت نام دارنده کارت، شماره شبا و شماره حساب از روی شماره کارت.

**پارامترها:**

| نام | نوع | اجباری | توضیح | نمونه مقدار |
|---|---|---|---|---|
| `cardNumber` | string | بله | شماره کارت | `6037990000000000` |

**مهلت پیش‌فرض:** ۳۰ ثانیه (`APIIR_TIMEOUT`) — استعلام سبک.

**نمونه کد:**

```php
require_once plugin_dir_path(__FILE__) . 'apiir/services/bank-card-info.php';

$result = apiir_bank_card_info('6037990000000000');

if ($result['success']) {
    $info = $result['data']; // آرایه‌ی انجمنی — مثال: $info['name']
}
```

**نمونه خروجی `data`:**

```json
{
  "name": "علی محمدی",
  "iban": "IR820540102680020817909002",
  "accountNumber": "0100000000000"
}
```

**نکته:** شماره کارت ۱۶ رقمی بدون فاصله ارسال شود.

---

### CardInfo — استعلام نام مالک کارت بانکی

دریافت نام صاحب یک کارت بانکی.

**پارامترها:**

| نام | نوع | اجباری | توضیح | نمونه مقدار |
|---|---|---|---|---|
| `cardNumber` | string | بله | شماره کارت بانکی | `6037990000000000` |

**مهلت پیش‌فرض:** ۳۰ ثانیه (`APIIR_TIMEOUT`) — استعلام سبک.

**نمونه کد:**

```php
require_once plugin_dir_path(__FILE__) . 'apiir/services/card-info.php';

$result = apiir_card_info('6037990000000000');

if ($result['success']) {
    $info = $result['data']; // آرایه‌ی انجمنی — مثال: $info['name']
}
```

**نمونه خروجی `data`:**

```json
{
  "name": "علی محمدی"
}
```

---

### CardToIban — سرویس تبدیل کارت به شبا

دریافت مشخصات شبای یک کارت بانکی.

**پارامترها:**

| نام | نوع | اجباری | توضیح | نمونه مقدار |
|---|---|---|---|---|
| `cardNumber` | string | بله | شماره کارت بانکی | `6037990000000000` |

**مهلت پیش‌فرض:** ۳۰ ثانیه (`APIIR_TIMEOUT`) — استعلام سبک.

**نمونه کد:**

```php
require_once plugin_dir_path(__FILE__) . 'apiir/services/card-to-iban.php';

$result = apiir_card_to_iban('6037990000000000');

if ($result['success']) {
    $info = $result['data']; // آرایه‌ی انجمنی — مثال: $info['name']
}
```

**نمونه خروجی `data`:**

```json
{
  "name": "علی محمدی",
  "iban": "IR820540102680020817909002",
  "bankName": "بانک ملت"
}
```

---

### IbanInfo — استعلام نام دارنده شبا

دریافت نام دارنده، نام بانک و وضعیت فعال بودن یک شماره شبا.

**پارامترها:**

| نام | نوع | اجباری | توضیح | نمونه مقدار |
|---|---|---|---|---|
| `iban` | string | بله | شماره شبا ۲۶ رقمی به فرمت IR000000000000000000000000 | `IR820540102680020817909002` |

**مهلت پیش‌فرض:** ۳۰ ثانیه (`APIIR_TIMEOUT`) — استعلام سبک.

**نمونه کد:**

```php
require_once plugin_dir_path(__FILE__) . 'apiir/services/iban-info.php';

$result = apiir_iban_info('IR820540102680020817909002');

if ($result['success']) {
    $info = $result['data']; // آرایه‌ی انجمنی — مثال: $info['name']
}
```

**نمونه خروجی `data`:**

```json
{
  "name": "علی محمدی",
  "bankName": "بانک ملت",
  "active": true
}
```

**نکته:** شبا با پیشوند `IR` و ۲۶ کاراکتر، بدون فاصله ارسال شود.

---

### CompanyInfo — استعلام شخص حقوقی

دریافت اطلاعات ثبتی شخص حقوقی (شرکت، موسسه یا سازمان) با شناسه ملی.

**پارامترها:**

| نام | نوع | اجباری | توضیح | نمونه مقدار |
|---|---|---|---|---|
| `nationalID` | string | بله | شناسه ملی شرکت | `14007650912` |

**مهلت پیش‌فرض:** ۳۰ ثانیه (`APIIR_TIMEOUT`) — استعلام سبک.

**نمونه کد:**

```php
require_once plugin_dir_path(__FILE__) . 'apiir/services/company-info.php';

$result = apiir_company_info('14007650912');

if ($result['success']) {
    $info = $result['data']; // آرایه‌ی انجمنی — مثال: $info['companyType']
}
```

**نمونه خروجی `data`:**

```json
{
  "companyType": "سهامی خاص",
  "name": "شرکت نمونه",
  "nationalID": 14007650912,
  "registerNumber": 123456,
  "registerDate": "1398/01/01",
  "active": true,
  "address": "تهران، ...",
  "postalCode": "1234567890",
  "province": "تهران",
  "city": "تهران",
  "endDate": null
}
```

**نکته:** شناسه ملی شرکت ۱۱ رقمی است.

---

### CompanyMembers — استعلام اعضای هیئت مدیره

دریافت فهرست اعضای هیئت مدیره و سهامداران یک شرکت همراه با سمت‌ها.

**پارامترها:**

| نام | نوع | اجباری | توضیح | نمونه مقدار |
|---|---|---|---|---|
| `nationalID` | string | بله | شناسه ملی شرکت | `14007650912` |

**مهلت پیش‌فرض:** ۳۰ ثانیه (`APIIR_TIMEOUT`) — استعلام سبک.

**نمونه کد:**

```php
require_once plugin_dir_path(__FILE__) . 'apiir/services/company-members.php';

$result = apiir_company_members('14007650912');

if ($result['success']) {
    $info = $result['data']; // آرایه‌ی انجمنی — مثال: $info['boardMembers']
}
```

**نمونه خروجی `data`:**

```json
{
  "boardMembers": [
    {
      "nationalID": "0010007700",
      "firstName": "علی",
      "lastName": "محمدی",
      "roleCode": 1,
      "roleName": "مدیرعامل"
    }
  ],
  "shareHolders": [
    {
      "nationalID": "0010007700",
      "firstName": "علی",
      "lastName": "محمدی",
      "percentage": 50
    }
  ]
}
```

**نکته:** برای اعضای حقوقی، `firstName` نام شرکت و `lastName` خالی است.

---

### CompanyNewspapers — استعلام اگهی های روزنامه رسمی

دریافت آگهی‌های منتشرشده‌ی یک شرکت در روزنامه‌های رسمی و محلی.

**پارامترها:**

| نام | نوع | اجباری | توضیح | نمونه مقدار |
|---|---|---|---|---|
| `nationalID` | string | بله | شناسه ملی شرکت | `14007650912` |

**مهلت پیش‌فرض:** ۳۰ ثانیه (`APIIR_TIMEOUT`) — استعلام سبک.

**نمونه کد:**

```php
require_once plugin_dir_path(__FILE__) . 'apiir/services/company-newspapers.php';

$result = apiir_company_newspapers('14007650912');

if ($result['success']) {
    $items = $result['data']; // آرایه‌ای از آبجکت‌ها — مثال: $items[0]['newsID']
}
```

**نمونه خروجی `data`:**

```json
[
  {
    "newsID": 123456,
    "title": "آگهی تغییرات",
    "nationalID": "14007650912",
    "description": "متن آگهی ...",
    "capital": 0,
    "publicationDate": "1400/01/01",
    "number": "12345",
    "city": "تهران",
    "page": 10,
    "letterDate": "1400/01/01",
    "letterNumber": "123"
  }
]
```

**نکته:** `data` یک آرایه (لیست) از آگهی‌ها است؛ ممکن است خالی باشد.

---

### CompanySignatories — استعلام صاحبین حق امضا شرکت‌ها

دریافت فهرست افرادی که طبق روزنامه رسمی در یک شرکت یا سازمان حق امضا دارند.

**پارامترها:**

| نام | نوع | اجباری | توضیح | نمونه مقدار |
|---|---|---|---|---|
| `nationalID` | string | بله | شناسه ملی شرکت | `14000567890` |

**مهلت پیش‌فرض:** ۳۰ ثانیه (`APIIR_TIMEOUT`) — استعلام سبک.

**نمونه کد:**

```php
require_once plugin_dir_path(__FILE__) . 'apiir/services/company-signatories.php';

$result = apiir_company_signatories('14000567890');

if ($result['success']) {
    $info = $result['data']; // آرایه‌ی انجمنی — مثال: $info['allowedTopics']
}
```

**نمونه خروجی `data`:**

```json
{
  "allowedTopics": "کلیه اسناد و اوراق بهادار ...",
  "signholders": {
    "obligatorySignature": [
      { "name": "علی محمدی", "title": "مدیرعامل", "obligatoryStatus": true, "personID": "0010007700" }
    ],
    "normalSignature": [
      { "name": "رضا احمدی", "title": "عضو هیئت مدیره", "normalStatus": true, "personID": "0010007701" }
    ],
    "obligatoryAndNormalSignature": [
      { "name": "علی محمدی", "title": "مدیرعامل", "personID": "0010007700" }
    ]
  },
  "signatureFullText": "متن کامل آگهی ...",
  "newspaperDate": "2024-01-01T00:00:00",
  "newsletterDate": "2024-01-01T00:00:00",
  "title": "شرکت نمونه",
  "boardMembers": [
    {
      "startDate": "2024-01-01T00:00:00",
      "endDate": null,
      "byNewsID": 123456,
      "person": { "title": "علی محمدی", "nationalCode": "0010007700" },
      "position": { "title": "مدیرعامل", "firstRole": "...", "secondRole": "..." }
    }
  ]
}
```

---

### TaxRecords — استعلام پرونده ها مالیاتی

استعلام پرونده‌های مالیاتی و وضعیت ثبت‌نام اشخاص حقیقی یا حقوقی.

**پارامترها:**

| نام | نوع | اجباری | توضیح | نمونه مقدار |
|---|---|---|---|---|
| `inquiryCode` | string | بله | شماره ملی حقیقی / شناسه ملی حقوقی / شماره فراگیر / شماره رهگیری / شماره اقتصادی | `14007650912` |

**مهلت پیش‌فرض:** ۳۰ ثانیه (`APIIR_TIMEOUT`) — استعلام سبک.

**نمونه کد:**

```php
require_once plugin_dir_path(__FILE__) . 'apiir/services/tax-records.php';

$result = apiir_tax_records('14007650912');

if ($result['success']) {
    $info = $result['data']; // آرایه‌ی انجمنی — مثال: $info['records']
}
```

**نمونه خروجی `data`:**

```json
{
  "records": [
    {
      "name": "پرونده نمونه",
      "economicCode": "411111111111",
      "registrationStatus": "ثبت‌نام شده",
      "registrationStep": "گام ۴"
    }
  ]
}
```

---

### GeoToAddress — تبدیل لوکیشن به آدرس

دریافت استان، شهر و آدرس از مختصات Latitude و Longitude.

**پارامترها:**

| نام | نوع | اجباری | توضیح | نمونه مقدار |
|---|---|---|---|---|
| `latitude` | number | بله | مختصات Latitude | `35.6892` |
| `longitude` | number | بله | مختصات Longitude | `51.389` |

**مهلت پیش‌فرض:** ۳۰ ثانیه (`APIIR_TIMEOUT`) — استعلام سبک.

**نمونه کد:**

```php
require_once plugin_dir_path(__FILE__) . 'apiir/services/geo-to-address.php';

$result = apiir_geo_to_address(35.6892, 51.389);

if ($result['success']) {
    $info = $result['data']; // آرایه‌ی انجمنی — مثال: $info['province']
}
```

**نمونه خروجی `data`:**

```json
{
  "province": "تهران",
  "city": "تهران",
  "address": "تهران، خیابان ..."
}
```

**نکته:** مختصات به‌صورت عدد اعشاری (float) ارسال می‌شود.

---

### PostalCodeInfo — سرویس استعلام کدپستی

دریافت آدرس دقیق یک کد پستی از شرکت پست.

**پارامترها:**

| نام | نوع | اجباری | توضیح | نمونه مقدار |
|---|---|---|---|---|
| `postalCode` | string | بله | کد پستی | `1234567890` |

**مهلت پیش‌فرض:** ۳۰ ثانیه (`APIIR_TIMEOUT`) — استعلام سبک.

**نمونه کد:**

```php
require_once plugin_dir_path(__FILE__) . 'apiir/services/postal-code-info.php';

$result = apiir_postal_code_info('1234567890');

if ($result['success']) {
    $info = $result['data']; // آرایه‌ی انجمنی — مثال: $info['province']
}
```

**نمونه خروجی `data`:**

```json
{
  "province": "تهران",
  "city": "تهران",
  "town": "مرکزی",
  "district": "۶",
  "street": "خیابان اصلی",
  "street2": "کوچه فرعی",
  "number": "۱۰",
  "floor": "۲",
  "sideFloor": "شرقی",
  "buildingName": "ساختمان نمونه",
  "description": "",
  "address": "تهران، خیابان اصلی، کوچه فرعی، پلاک ۱۰"
}
```

**نکته:** کد پستی ۱۰ رقمی بدون خط تیره ارسال شود.

---

### PostalCodePro — سرویس استعلام کدپستی نسخه Pro

دریافت آدرس دقیق یک کد پستی از پست به‌همراه مختصات و لینک نقشه.

**پارامترها:**

| نام | نوع | اجباری | توضیح | نمونه مقدار |
|---|---|---|---|---|
| `postalCode` | string | بله | کد پستی | `1234567890` |

**مهلت پیش‌فرض:** ۳۰ ثانیه (`APIIR_TIMEOUT`) — استعلام سبک.

**نمونه کد:**

```php
require_once plugin_dir_path(__FILE__) . 'apiir/services/postal-code-pro.php';

$result = apiir_postal_code_pro('1234567890');

if ($result['success']) {
    $info = $result['data']; // آرایه‌ی انجمنی — مثال: $info['province']
}
```

**نمونه خروجی `data`:**

```json
{
  "province": "تهران",
  "city": "تهران",
  "town": "مرکزی",
  "district": "۶",
  "street": "خیابان اصلی",
  "street2": "کوچه فرعی",
  "number": "۱۰",
  "floor": "۲",
  "sideFloor": "شرقی",
  "buildingName": "ساختمان نمونه",
  "description": "",
  "address": "تهران، خیابان اصلی، کوچه فرعی، پلاک ۱۰",
  "mapUrl": "https://...",
  "lat": 35.6892,
  "long": 51.389
}
```

**نکته:** کد پستی ۱۰ رقمی بدون خط تیره ارسال شود.

---

### PostalTracking — سرویس رهیگیری بسته پستی

دریافت وضعیت و همه‌ی رویدادهای یک مرسوله‌ی پستی از تولید بارکد تا تحویل با کد رهگیری.

**پارامترها:**

| نام | نوع | اجباری | توضیح | نمونه مقدار |
|---|---|---|---|---|
| `trackingCode` | string | بله | کد رهیگیری مرسوله | `1234567890` |

**مهلت پیش‌فرض:** ۳۰ ثانیه (`APIIR_TIMEOUT`) — استعلام سبک.

**نمونه کد:**

```php
require_once plugin_dir_path(__FILE__) . 'apiir/services/postal-tracking.php';

$result = apiir_postal_tracking('1234567890');

if ($result['success']) {
    $info = $result['data']; // آرایه‌ی انجمنی — مثال: $info['postType']
}
```

**نمونه خروجی `data`:**

```json
{
  "postType": "پیشتاز",
  "sourcePostOffice": "تهران",
  "source": "تهران",
  "destination": "اصفهان",
  "senderName": "علی محمدی",
  "receiverName": "رضا احمدی",
  "sourcePostalCode": "1234567890",
  "destinationPostalCode": "0987654321",
  "weight": "500",
  "totalAmount": "250000",
  "details": [
    { "date": "1403/01/01", "event": "تحویل به گیرنده", "id": "1", "postalNode": "اصفهان", "time": "10:30" }
  ]
}
```

---

### PostalCodeLocation — سرویس دریافت لوکیشن با کدپستی

دریافت مختصات جغرافیایی و لینک نقشه‌ی یک کد پستی؛ مناسب تحویل مرسوله و راهنمایی پیک.

**پارامترها:**

| نام | نوع | اجباری | توضیح | نمونه مقدار |
|---|---|---|---|---|
| `postalCode` | string | بله | کد پستی | `1234567890` |

**مهلت پیش‌فرض:** ۳۰ ثانیه (`APIIR_TIMEOUT`) — استعلام سبک.

**نمونه کد:**

```php
require_once plugin_dir_path(__FILE__) . 'apiir/services/postal-code-location.php';

$result = apiir_postal_code_location('1234567890');

if ($result['success']) {
    $info = $result['data']; // آرایه‌ی انجمنی — مثال: $info['mapUrl']
}
```

**نمونه خروجی `data`:**

```json
{
  "mapUrl": "https://...",
  "lat": 35.6892,
  "long": 51.389
}
```

---

### ChatGPT — وب سرویس Chat GPT

ارسال دستور و متن به GPT نسخه‌ی ۴ و دریافت پاسخ متنی.

**پارامترها:**

| نام | نوع | اجباری | توضیح | نمونه مقدار |
|---|---|---|---|---|
| `command` | string | بله | دستور پردازش (نمونه: GenerateSummary) | `GenerateSummary` |
| `data` | string | بله | متن ورودی برای پردازش | `متن نمونه برای پردازش` |
| `temperature` | number | خیر | میزان خلاقیت پاسخ (پیش‌فرض 1) — پیش‌فرض در SDK: `1.0` | `1` |

**مهلت پیش‌فرض:** ۶۰ ثانیه — پردازش هوش مصنوعی زمان‌بر است.

**نمونه کد:**

```php
require_once plugin_dir_path(__FILE__) . 'apiir/services/chat-gpt.php';

$result = apiir_chat_gpt('GenerateSummary', 'متن نمونه برای پردازش');

if ($result['success']) {
    $text = (string) $result['data'];
}
```

**نمونه خروجی `data`:**

```json
"خلاصه‌ی متن ..."
```

---

### TextToSpeech — تبدیل متن به صوت با هوش مصنوعی بومی

تبدیل متن‌های کوتاه به صوت با هوش مصنوعی بومی که در اینترنت ملی نیز کار می‌کند.

**پارامترها:**

| نام | نوع | اجباری | توضیح | نمونه مقدار |
|---|---|---|---|---|
| `text` | string | بله | متن پیام | `برای حضور در هر باشگاه یا تیم ملی شرایط را به طور کامل خواهد سنجید.` |
| `male` | boolean | بله | صدای گوینده آقا باشد یا خیر؟ — پیش‌فرض در SDK: `true` | `true` |
| `ttsEngine` | integer | بله | موتور هوشمند=1 موتور با هوش مصنوعی بومی=2 هوش مصنوعی خارجی=3 — پیش‌فرض در SDK: `1` | `1` |

**مهلت پیش‌فرض:** ۶۰ ثانیه — تولید صوت با هوش مصنوعی زمان‌بر است.

**نمونه کد:**

```php
require_once plugin_dir_path(__FILE__) . 'apiir/services/text-to-speech.php';

$result = apiir_text_to_speech('برای حضور در هر باشگاه یا تیم ملی شرایط را به طور کامل خواهد سنجید.');

if ($result['success']) {
    $text = (string) $result['data'];
}
```

**نمونه خروجی `data`:**

```json
"..."
```

**نکته:** این سرویس برای متن‌های کوتاه است.

---

### Sana — استعلام سامانه ثنا

بررسی داشتن یا نداشتن شماره ثنا برای شخص حقیقی یا حقوقی.

**پارامترها:**

| نام | نوع | اجباری | توضیح | نمونه مقدار |
|---|---|---|---|---|
| `nationalCode` | string | بله | کد ملی یا شناسه ملی | `0010007700` |
| `isCompany` | boolean | بله | حقوقی یا حقیقی — پیش‌فرض در SDK: `false` | `false` |

**مهلت پیش‌فرض:** ۳۰ ثانیه (`APIIR_TIMEOUT`) — استعلام سبک.

**نمونه کد:**

```php
require_once plugin_dir_path(__FILE__) . 'apiir/services/sana.php';

$result = apiir_sana('0010007700');

if ($result['success']) {
    $ok = ($result['data'] === true);
}
```

**نمونه خروجی `data`:**

```json
true
```

---

### UnpaidCheque — استعلام تعداد چک برگشتی

استعلام تعداد و مبلغ چک‌های برگشتی فرد برای ارزیابی ریسک اعتباری (ارائه به کسب‌وکارها در سطح ۲).

**پارامترها:**

| نام | نوع | اجباری | توضیح | نمونه مقدار |
|---|---|---|---|---|
| `nationalCode` | string | بله | کد ملی | `0010007700` |

**مهلت پیش‌فرض:** ۳۰ ثانیه (`APIIR_TIMEOUT`) — استعلام سبک.

**نمونه کد:**

```php
require_once plugin_dir_path(__FILE__) . 'apiir/services/unpaid-cheque.php';

$result = apiir_unpaid_cheque('0010007700');

if ($result['success']) {
    $info = $result['data']; // آرایه‌ی انجمنی — مثال: $info['count']
}
```

**نمونه خروجی `data`:**

```json
{
  "count": 2,
  "sumAmount": 150000000,
  "sumBouncedAmount": 120000000
}
```

---

### UnpaidChequeLite — استعلام تعداد چک برگشتی Lite

استعلام تعداد چک‌های برگشتی فرد؛ نسخه‌ی سبک برای ارزیابی ریسک اعتباری.

**پارامترها:**

| نام | نوع | اجباری | توضیح | نمونه مقدار |
|---|---|---|---|---|
| `nationalCode` | string | بله | کد ملی | `0010007700` |

**مهلت پیش‌فرض:** ۳۰ ثانیه (`APIIR_TIMEOUT`) — استعلام سبک.

**نمونه کد:**

```php
require_once plugin_dir_path(__FILE__) . 'apiir/services/unpaid-cheque-lite.php';

$result = apiir_unpaid_cheque_lite('0010007700');

if ($result['success']) {
    $info = $result['data']; // آرایه‌ی انجمنی — مثال: $info['count']
}
```

**نمونه خروجی `data`:**

```json
{
  "count": 2
}
```

---

### UnpaidChequePro — استعلام تعداد چک برگشتی پرو

استعلام تعداد، مبلغ و فهرست چک‌های برگشتی همراه با اطلاعات شعبه‌ی برگشت‌دهنده (فقط شرکت‌ها و سازمان‌ها).

**پارامترها:**

| نام | نوع | اجباری | توضیح | نمونه مقدار |
|---|---|---|---|---|
| `nationalCode` | string | بله | کد ملی | `0010007700` |

**مهلت پیش‌فرض:** ۳۰ ثانیه (`APIIR_TIMEOUT`) — استعلام سبک.

**نمونه کد:**

```php
require_once plugin_dir_path(__FILE__) . 'apiir/services/unpaid-cheque-pro.php';

$result = apiir_unpaid_cheque_pro('0010007700');

if ($result['success']) {
    $info = $result['data']; // آرایه‌ی انجمنی — مثال: $info['nationalCode']
}
```

**نمونه خروجی `data`:**

```json
{
  "nationalCode": "0010007700",
  "legalId": null,
  "name": "علی محمدی",
  "count": 1,
  "chequeList": [
    {
      "accountNumber": "0100000000000",
      "amount": "50000000",
      "bouncedAmount": "50000000",
      "bankCode": "012",
      "branchCode": "1234",
      "branchDescription": "بانک ملت شعبه مرکزی",
      "dishonoringBranchName": "شعبه مرکزی",
      "dishonorReason": "کسری موجودی",
      "branchCodeBounced": "1234",
      "chequeDate": "1402/06/01",
      "backDate": "1402/06/05",
      "chequeID": "111110010007700",
      "chequeNumber": "123456"
    }
  ]
}
```

---

### ChequeColor — استعلام رنگ چک صیادی

دریافت وضعیت اعتباری صادرکننده‌ی چک به‌صورت رنگ برای تعیین ریسک معامله.

**پارامترها:**

| نام | نوع | اجباری | توضیح | نمونه مقدار |
|---|---|---|---|---|
| `nationalCode` | string | بله | کد ملی یا شناسه ملی | `0010007700` |
| `isCompany` | boolean | بله | حقوقی یا حقیقی — پیش‌فرض در SDK: `false` | `false` |

**مهلت پیش‌فرض:** ۳۰ ثانیه (`APIIR_TIMEOUT`) — استعلام سبک.

**نمونه کد:**

```php
require_once plugin_dir_path(__FILE__) . 'apiir/services/cheque-color.php';

$result = apiir_cheque_color('0010007700');

if ($result['success']) {
    $info = $result['data']; // آرایه‌ی انجمنی — مثال: $info['chequeColor']
}
```

**نمونه خروجی `data`:**

```json
{
  "chequeColor": "سفید",
  "chequeColorCode": 1
}
```

**نکته:** `chequeColorCode`: سفید=1 زرد=2 نارنجی=3 قهوه‌ای=4 قرمز=5.

---

### ChequeInfo — استعلام مشخصات چک صیادی

دریافت اطلاعات کامل یک چک صیادی (دارنده، شبا، سریال، تاریخ صدور و نوع چک) با شناسه‌ی چک.

**پارامترها:**

| نام | نوع | اجباری | توضیح | نمونه مقدار |
|---|---|---|---|---|
| `chequeID` | string | بله | شناسه چک صیاد | `111110010007700` |

**مهلت پیش‌فرض:** ۳۰ ثانیه (`APIIR_TIMEOUT`) — استعلام سبک.

**نمونه کد:**

```php
require_once plugin_dir_path(__FILE__) . 'apiir/services/cheque-info.php';

$result = apiir_cheque_info('111110010007700');

if ($result['success']) {
    $info = $result['data']; // آرایه‌ی انجمنی — مثال: $info['iban']
}
```

**نمونه خروجی `data`:**

```json
{
  "iban": "IR820540102680020817909002",
  "issuedDate": "1402/01/01",
  "expirationDate": "1405/01/01",
  "serialNumber": "123456",
  "seriesNumber": "12",
  "chequeType": "BANS",
  "branchCode": "1234",
  "name": "علی محمدی"
}
```

**نکته:** `chequeType`: BANS = عادی، CHD = الکترونیک، CHS = موردی، CHT = بانکی.

---

### License — استعلام اعتبار مجوز شغلی

استعلام اعتبار مجوز شغلی (پروانه کسب) شخصی یا شرکتی با کد پیگیری مجوز.

**پارامترها:**

| نام | نوع | اجباری | توضیح | نمونه مقدار |
|---|---|---|---|---|
| `trackingCode` | string | بله | کد پیگیری مجوز | `BL123456` |

**مهلت پیش‌فرض:** ۳۰ ثانیه (`APIIR_TIMEOUT`) — استعلام سبک.

**نمونه کد:**

```php
require_once plugin_dir_path(__FILE__) . 'apiir/services/license.php';

$result = apiir_license('BL123456');

if ($result['success']) {
    $info = $result['data']; // آرایه‌ی انجمنی — مثال: $info['title']
}
```

**نمونه خروجی `data`:**

```json
{
  "title": "پروانه کسب",
  "trackingCode": "BL123456",
  "isuuer": "اتحادیه ...",
  "fullName": "علی محمدی",
  "fatherName": "حسن",
  "nationalCode": "0010007700",
  "phone": "02112345678",
  "issueDate": "1400/01/01",
  "expireDate": "1405/01/01",
  "province": "تهران",
  "city": "تهران",
  "address": "تهران، ...",
  "postalCode": "1234567890"
}
```

**نکته:** نام فیلد صادرکننده در OpenAPI عیناً `isuuer` است.

---

### MedicalLicense — استعلام اعتبار پروانه پزشکی

استعلام اعتبار پروانه پزشکی و فهرست مجوزهای یک پزشک.

**پارامترها:**

| نام | نوع | اجباری | توضیح | نمونه مقدار |
|---|---|---|---|---|
| `medicalCode` | string | بله | کد پیگیری مجوز (کد نظام پزشکی) | `BL123456` |

**مهلت پیش‌فرض:** ۳۰ ثانیه (`APIIR_TIMEOUT`) — استعلام سبک.

**نمونه کد:**

```php
require_once plugin_dir_path(__FILE__) . 'apiir/services/medical-license.php';

$result = apiir_medical_license('BL123456');

if ($result['success']) {
    $info = $result['data']; // آرایه‌ی انجمنی — مثال: $info['firstName']
}
```

**نمونه خروجی `data`:**

```json
{
  "firstName": "علی",
  "lastName": "محمدی",
  "medicalCode": "123456",
  "degree": "دکترای پزشکی",
  "city": "تهران",
  "membershipType": "دائم",
  "licenses": [
    {
      "licenseType": "مطب",
      "licenseCity": "تهران",
      "relatedDegree": "پزشک عمومی",
      "expireDate": "1405/01/01",
      "qrCodeBase64": "iVBORw0KGgo...",
      "isActive": true
    }
  ]
}
```

---

### ActiveLoans — استعلام تسهیلات فعال بانکی

مشاهده‌ی تسهیلات و وام‌های فعال مشتری همراه با مانده بدهی، سررسیدگذشته و معوق.

**پارامترها:**

| نام | نوع | اجباری | توضیح | نمونه مقدار |
|---|---|---|---|---|
| `nationalCode` | string | بله | کد ملی یا شناسه ملی | `0010007700` |

**مهلت پیش‌فرض:** ۳۰ ثانیه (`APIIR_TIMEOUT`) — استعلام سبک.

**نمونه کد:**

```php
require_once plugin_dir_path(__FILE__) . 'apiir/services/active-loans.php';

$result = apiir_active_loans('0010007700');

if ($result['success']) {
    $info = $result['data']; // آرایه‌ی انجمنی — مثال: $info['count']
}
```

**نمونه خروجی `data`:**

```json
{
  "count": 1,
  "info": {
    "nationalCode": "0010007700",
    "name": "علی محمدی",
    "totalAmount": 500000000,
    "debtTotalAmount": 300000000,
    "pastExpiredTotalAmount": 0,
    "deferredTotalAmount": 0,
    "suspiciousTotalAmount": 0,
    "dishonored": 0
  }
}
```

**نکته:** مبالغ به ریال و از نوع عدد صحیح ۶۴ بیتی هستند.

---

### PassportStatus — استعلام وضعیت پاسپورت

استعلام اعتبار و وضعیت گذرنامه‌ی فرد؛ مناسب فعالان حوزه‌ی گردشگری.

**پارامترها:**

| نام | نوع | اجباری | توضیح | نمونه مقدار |
|---|---|---|---|---|
| `nationalCode` | string | بله | کد ملی | `0010007700` |
| `mobile` | string | بله | موبایل با فرمت 09120001111 | `09120000000` |

**مهلت پیش‌فرض:** ۳۰ ثانیه (`APIIR_TIMEOUT`) — استعلام سبک.

**نمونه کد:**

```php
require_once plugin_dir_path(__FILE__) . 'apiir/services/passport-status.php';

$result = apiir_passport_status('0010007700', '09120000000');

if ($result['success']) {
    $info = $result['data']; // آرایه‌ی انجمنی — مثال: $info['hasRequest']
}
```

**نمونه خروجی `data`:**

```json
{
  "hasRequest": true,
  "requestStatus": "صادر شده",
  "requestDate": "1402/01/01",
  "postalTrackingCode": "1234567890",
  "hasPassport": true,
  "passportNumber": "A12345678",
  "issueDate": "1402/02/01",
  "expirationDate": "1407/02/01",
  "passportStatus": "معتبر",
  "personFound": true
}
```

---

### DrivingScore — استعلام نمره منفی گواهینامه

دریافت نمرات منفی و تعداد خلافی ثبت‌شده روی گواهینامه‌ی رانندگی.

**پارامترها:**

| نام | نوع | اجباری | توضیح | نمونه مقدار |
|---|---|---|---|---|
| `nationalCode` | string | بله | کد ملی | `0010007700` |
| `mobile` | string | بله | شماره موبایل | `09120000000` |
| `licenseNumber` | string | بله | شماره گواهینامه | `20983905093` |

**مهلت پیش‌فرض:** ۳۰ ثانیه (`APIIR_TIMEOUT`) — استعلام سبک.

**نمونه کد:**

```php
require_once plugin_dir_path(__FILE__) . 'apiir/services/driving-score.php';

$result = apiir_driving_score('0010007700', '09120000000', '20983905093');

if ($result['success']) {
    $info = $result['data']; // آرایه‌ی انجمنی — مثال: $info['licenseNumber']
}
```

**نمونه خروجی `data`:**

```json
{
  "licenseNumber": "20983905093",
  "negativeScore": 0,
  "offenseCount": 0,
  "rule": null
}
```

---

### DrivingLisense — استعلام گواهینامه رانندگی قدیم

بررسی اعتبار گواهینامه‌های رانندگی فرد (نسخه‌ی قدیم سرویس).

**پارامترها:**

| نام | نوع | اجباری | توضیح | نمونه مقدار |
|---|---|---|---|---|
| `nationalCode` | string | بله | کد ملی یا شناسه ملی | `0010007700` |
| `mobile` | string | بله | موبایل با فرمت 09120001111 | `09120000000` |

**مهلت پیش‌فرض:** ۳۰ ثانیه (`APIIR_TIMEOUT`) — استعلام سبک.

**نمونه کد:**

```php
require_once plugin_dir_path(__FILE__) . 'apiir/services/driving-lisense.php';

$result = apiir_driving_lisense('0010007700', '09120000000');

if ($result['success']) {
    $info = $result['data']; // آرایه‌ی انجمنی — مثال: $info['lisenses']
}
```

**نمونه خروجی `data`:**

```json
{
  "lisenses": [
    {
      "nationalCode": "0010007700",
      "firstName": "علی",
      "lastName": "محمدی",
      "title": "پایه سوم",
      "requestDate": "1395/01/01",
      "confirmDate": "1395/01/10",
      "printDate": "1395/01/15",
      "postalBarcode": "1234567890",
      "rahvarStatus": "صادر شده",
      "lisenseNumber": "20983905093",
      "validYears": "10"
    }
  ]
}
```

**نکته:** املای `DrivingLisense` و فیلدهای `lisenses` / `lisenseNumber` عیناً مطابق OpenAPI است.

---

### DrivingLicense — استعلام گواهینامه رانندگی جدید

بررسی اعتبار گواهینامه‌های رانندگی فرد (نسخه‌ی جدید سرویس).

**پارامترها:**

| نام | نوع | اجباری | توضیح | نمونه مقدار |
|---|---|---|---|---|
| `nationalCode` | string | بله | کد ملی یا شناسه ملی | `0010007700` |
| `mobile` | string | بله | موبایل با فرمت 09120001111 | `09120000000` |

**مهلت پیش‌فرض:** ۳۰ ثانیه (`APIIR_TIMEOUT`) — استعلام سبک.

**نمونه کد:**

```php
require_once plugin_dir_path(__FILE__) . 'apiir/services/driving-license.php';

$result = apiir_driving_license('0010007700', '09120000000');

if ($result['success']) {
    $info = $result['data']; // آرایه‌ی انجمنی — مثال: $info['licenses']
}
```

**نمونه خروجی `data`:**

```json
{
  "licenses": [
    {
      "nationalCode": "0010007700",
      "firstName": "علی",
      "lastName": "محمدی",
      "licenseNumber": "20983905093",
      "licenseStatus": "معتبر",
      "licenseType": "پایه سوم",
      "requestDate": "1395/01/01",
      "confirmDate": "1395/01/10",
      "issueDate": "1395/01/12",
      "printDate": "1395/01/15",
      "validityYears": "10",
      "postalBarcode": "1234567890"
    }
  ]
}
```

---

### MilitaryStatus — استعلام خدمت سربازی

استعلام وضعیت نظام وظیفه‌ی فرد با کد ملی و تاریخ تولد؛ مناسب فرآیندهای استخدامی و اداری.

**پارامترها:**

| نام | نوع | اجباری | توضیح | نمونه مقدار |
|---|---|---|---|---|
| `nationalCode` | string | بله | کد ملی شخص جهت استعلام وضعیت نظام وظیفه | `0012345678` |
| `birthDate` | string | بله | تاریخ تولد شخص به فرمت yyyy/mm/dd | `1370/05/20` |

**مهلت پیش‌فرض:** ۳۰ ثانیه (`APIIR_TIMEOUT`) — استعلام سبک.

**نمونه کد:**

```php
require_once plugin_dir_path(__FILE__) . 'apiir/services/military-status.php';

$result = apiir_military_status('0012345678', '1370/05/20');

if ($result['success']) {
    $info = $result['data']; // آرایه‌ی انجمنی — مثال: $info['isAllowed']
}
```

**نمونه خروجی `data`:**

```json
{
  "isAllowed": true
}
```

**نکته:** تاریخ تولد شمسی با فرمت `yyyy/mm/dd` (مثال: `1370/05/20`).

---

### ActivePlates — استعلام پلاک های فعال

دریافت فهرست کامل پلاک‌های فرد همراه با وضعیت فعال یا فک‌شده، تاریخ و توضیحات فک.

**پارامترها:**

| نام | نوع | اجباری | توضیح | نمونه مقدار |
|---|---|---|---|---|
| `nationalCode` | string | بله | کد ملی صاحب خودرو | `0057684356` |
| `mobile` | string | بله | شماره موبایل صاحب خودرو | `09123456789` |

**مهلت پیش‌فرض:** ۳۰ ثانیه (`APIIR_TIMEOUT`) — استعلام سبک.

**نمونه کد:**

```php
require_once plugin_dir_path(__FILE__) . 'apiir/services/active-plates.php';

$result = apiir_active_plates('0057684356', '09123456789');

if ($result['success']) {
    $items = $result['data']; // آرایه‌ای از آبجکت‌ها — مثال: $items[0]['nationalCode']
}
```

**نمونه خروجی `data`:**

```json
[
  {
    "nationalCode": "0057684356",
    "plateNumber": "ایران 11 – 1111 ب 11",
    "revoked": false,
    "revokedDate": null,
    "revokedDescription": null,
    "serialNumber": "123456"
  }
]
```

**نکته:** `data` یک آرایه (لیست) از پلاک‌ها است؛ ممکن است خالی باشد.

---

### PlateHistory — استعلام تاریخچه پلاک

دریافت تاریخچه‌ی کامل یک پلاک شامل مدل خودرو، سال ساخت و تاریخ نصب و جداسازی.

**پارامترها:**

| نام | نوع | اجباری | توضیح | نمونه مقدار |
|---|---|---|---|---|
| `nationalCode` | string | بله | کد ملی | `0010007700` |
| `plateNumber` | string | بله | پلاک به فرمت: ایران 11 – 1111 ب 11 | `ایران 11 – 1111 ب 11` |

**مهلت پیش‌فرض:** ۳۰ ثانیه (`APIIR_TIMEOUT`) — استعلام سبک.

**نمونه کد:**

```php
require_once plugin_dir_path(__FILE__) . 'apiir/services/plate-history.php';

$result = apiir_plate_history('0010007700', 'ایران 11 – 1111 ب 11');

if ($result['success']) {
    $info = $result['data']; // آرایه‌ی انجمنی — مثال: $info['plateHistory']
}
```

**نمونه خروجی `data`:**

```json
{
  "plateHistory": [
    {
      "vehicleSystem": "پژو",
      "vehicleType": "سواری",
      "installDate": "1398/01/01",
      "detachDate": null,
      "vehicleModel": "1398"
    }
  ],
  "description": "فعال",
  "serialNumber": "123456"
}
```

**نکته:** پلاک با فرمت `ایران 11 – 1111 ب 11` ارسال شود.

---

### VehicleCard — استعلام کارت و سند خودرو

دریافت اطلاعات کارت خودرو و سند مالکیت برای تأیید اصالت مدارک در معاملات.

**پارامترها:**

| نام | نوع | اجباری | توضیح | نمونه مقدار |
|---|---|---|---|---|
| `nationalCode` | string | بله | کد ملی | `0010007700` |
| `plateNumber` | string | بله | پلاک به فرمت: ایران 11 – 1111 ب 11 | `ایران 11 – 1111 ب 11` |

**مهلت پیش‌فرض:** ۳۰ ثانیه (`APIIR_TIMEOUT`) — استعلام سبک.

**نمونه کد:**

```php
require_once plugin_dir_path(__FILE__) . 'apiir/services/vehicle-card.php';

$result = apiir_vehicle_card('0010007700', 'ایران 11 – 1111 ب 11');

if ($result['success']) {
    $info = $result['data']; // آرایه‌ی انجمنی — مثال: $info['cardPostalBarcode']
}
```

**نمونه خروجی `data`:**

```json
{
  "cardPostalBarcode": "1234567890",
  "cardStatus": { "id": 1, "description": "صادر شده" },
  "cardIssuanceDate": "2020-01-01T00:00:00",
  "cardPrintDate": "2020-01-05T00:00:00",
  "isSmart": true,
  "cardType": { "id": 1, "description": "هوشمند" },
  "documentStatus": 1,
  "documentIssuanceDate": "2020-01-01T00:00:00",
  "documentPrintDate": "2020-01-05T00:00:00",
  "documentType": { "id": 1, "description": "سند مالکیت" }
}
```

**نکته:** طبق توضیح OpenAPI، فرمت صحیح درج پلاک به‌صورت `635ب11ایران20` است؛ مقدار نمونه‌ی پارامتر `ایران 11 – 1111 ب 11` است.

---

### VehicleInfo — استعلام مشخصات و مدل خودرو

دریافت شماره موتور، شماره شاسی، شماره VIN و مدل خودرو با کد ملی و شماره پلاک.

**پارامترها:**

| نام | نوع | اجباری | توضیح | نمونه مقدار |
|---|---|---|---|---|
| `nationalCode` | string | بله | کد ملی | `0010007700` |
| `plateNumber` | string | بله | پلاک به فرمت: ایران 11 – 1111 ب 11 | `ایران 11 – 1111 ب 11` |

**مهلت پیش‌فرض:** ۳۰ ثانیه (`APIIR_TIMEOUT`) — استعلام سبک.

**نمونه کد:**

```php
require_once plugin_dir_path(__FILE__) . 'apiir/services/vehicle-info.php';

$result = apiir_vehicle_info('0010007700', 'ایران 11 – 1111 ب 11');

if ($result['success']) {
    $info = $result['data']; // آرایه‌ی انجمنی — مثال: $info['name']
}
```

**نمونه خروجی `data`:**

```json
{
  "name": "پژو 206",
  "engineNumber": "12345678",
  "chassisNumber": "NAAP03EE1EJ123456",
  "vin": "NAAP03EE1EJ123456",
  "model": 1398
}
```

**نکته:** طبق توضیح OpenAPI، پلاک از چپ به راست وارد شود: ابتدا عدد، سپس حرف، سپس عدد سه‌رقمی و بعد عدد دورقمی بخش ایران (نمونه: `11188ب12`).

---

### VehicleViolation — وب سرویس استعلام خلافی خودرو

استعلام فهرست خلافی‌های خودرو همراه با مبلغ کل و تعداد.

**پارامترها:**

| نام | نوع | اجباری | توضیح | نمونه مقدار |
|---|---|---|---|---|
| `nationalCode` | string | بله | کد ملی | `0010007700` |
| `mobile` | string | بله | شماره موبایل | `09120001111` |
| `plateNumber` | string | بله | پلاک به فرمت: ایران 11 – 1111 ب 11 | `ایران 11 – 1111 ب 11` |

**مهلت پیش‌فرض:** ۳۰ ثانیه (`APIIR_TIMEOUT`) — استعلام سبک.

**نمونه کد:**

```php
require_once plugin_dir_path(__FILE__) . 'apiir/services/vehicle-violation.php';

$result = apiir_vehicle_violation('0010007700', '09120001111', 'ایران 11 – 1111 ب 11');

if ($result['success']) {
    $info = $result['data']; // آرایه‌ی انجمنی — مثال: $info['violations']
}
```

**نمونه خروجی `data`:**

```json
{
  "violations": [
    {
      "id": "1234567890",
      "type": "سرعت غیرمجاز",
      "description": "دوربین",
      "code": "2001",
      "price": 1000000,
      "city": "تهران",
      "location": "بزرگراه ...",
      "serial": "...",
      "dataValue": "",
      "barcode": "...",
      "license": "ایران 11 – 1111 ب 11",
      "billId": "1234567890",
      "paymentId": "1234567890",
      "date": "1402/06/01",
      "dateEn": "2023-08-23T00:00:00",
      "isPayable": true,
      "policemanCode": "",
      "hasImage": true
    }
  ],
  "totalAmount": 1000000,
  "count": 1
}
```

---

### NationalityStatus — استعلام وضعیت اتباع

استعلام اطلاعات و اعتبار کارت اتباع از مراجع انتظامی.

**پارامترها:**

| نام | نوع | اجباری | توضیح | نمونه مقدار |
|---|---|---|---|---|
| `code` | string | بله | کد | `121302310622` |
| `codeType` | integer | بله | کد شناسایی تبعه=1 فیدا=2 شناسه فراگیر ناجا=3 کد یکتا=4 — پیش‌فرض در SDK: `2` | `2` |

**مهلت پیش‌فرض:** ۳۰ ثانیه (`APIIR_TIMEOUT`) — استعلام سبک.

**نمونه کد:**

```php
require_once plugin_dir_path(__FILE__) . 'apiir/services/nationality-status.php';

$result = apiir_nationality_status('121302310622');

if ($result['success']) {
    $info = $result['data']; // آرایه‌ی انجمنی — مثال: $info['id']
}
```

**نمونه خروجی `data`:**

```json
{
  "id": 1,
  "uniqeCode": 1234567890,
  "fidaCode": 121302310622,
  "birthDate": "1990-01-01T00:00:00",
  "birthDatePersian": "1368/10/11",
  "firstName": "...",
  "lastName": "...",
  "fatherName": "...",
  "grandFatherName": "...",
  "gender": 1,
  "provinceID": 1,
  "province": "تهران",
  "nationalityID": 1,
  "nationalityName": "افغانستان",
  "status": 1,
  "familyID": 123456,
  "exit": false,
  "identityCode": 123456789,
  "relative": 1,
  "education": 1,
  "isActive": true,
  "deleteAt": ""
}
```

**نکته:** `codeType`: کد شناسایی تبعه=1، فیدا=2، شناسه فراگیر ناجا=3، کد یکتا=4.

---

### WatterBill — وب سرویس قبض آب

بررسی وضعیت پرداخت و بدهی قبض آب با شناسه قبض.

**پارامترها:**

| نام | نوع | اجباری | توضیح | نمونه مقدار |
|---|---|---|---|---|
| `billID` | string | بله | شناسه قبض | `1100151403410` |

**مهلت پیش‌فرض:** ۳۰ ثانیه (`APIIR_TIMEOUT`) — استعلام سبک.

**نمونه کد:**

```php
require_once plugin_dir_path(__FILE__) . 'apiir/services/watter-bill.php';

$result = apiir_watter_bill('1100151403410');

if ($result['success']) {
    $info = $result['data']; // آرایه‌ی انجمنی — مثال: $info['amount']
}
```

**نمونه خروجی `data`:**

```json
{
  "amount": 250000,
  "billID": "1100151403410",
  "payID": "12345678",
  "date": "1403/01/01"
}
```

**نکته:** املای `WatterBill` عیناً مطابق OpenAPI است.

---

### WatterBillInfo — وب سرویس قبض آب با جزئیات

بررسی وضعیت پرداخت قبض آب همراه با مشخصات مشترک، آدرس و اطلاعات کنتور.

**پارامترها:**

| نام | نوع | اجباری | توضیح | نمونه مقدار |
|---|---|---|---|---|
| `billID` | string | بله | شناسه قبض | `1100151403410` |

**مهلت پیش‌فرض:** ۳۰ ثانیه (`APIIR_TIMEOUT`) — استعلام سبک.

**نمونه کد:**

```php
require_once plugin_dir_path(__FILE__) . 'apiir/services/watter-bill-info.php';

$result = apiir_watter_bill_info('1100151403410');

if ($result['success']) {
    $info = $result['data']; // آرایه‌ی انجمنی — مثال: $info['info']
}
```

**نمونه خروجی `data`:**

```json
{
  "info": {
    "ownerName": "علی محمدی",
    "address": "تهران، ...",
    "postalCode": "1234567890",
    "usageType": "خانگی",
    "meterNumber": "123456",
    "fileNumber": "1234",
    "city": "تهران",
    "capacity": 10,
    "previousReadDate": "1402/11/01",
    "currentReadDate": "1403/01/01",
    "currentConsumption": 30,
    "previousNumber": 1000,
    "currentNumber": 1030
  },
  "print": "...",
  "amount": 250000,
  "billID": "1100151403410",
  "payID": "12345678",
  "date": "1403/01/01"
}
```

---

### GasBill — وب سرویس قبض گاز

بررسی وضعیت پرداخت و بدهی قبض گاز با شناسه قبض.

**پارامترها:**

| نام | نوع | اجباری | توضیح | نمونه مقدار |
|---|---|---|---|---|
| `billID` | string | بله | شناسه قبض | `1100151403410` |

**مهلت پیش‌فرض:** ۳۰ ثانیه (`APIIR_TIMEOUT`) — استعلام سبک.

**نمونه کد:**

```php
require_once plugin_dir_path(__FILE__) . 'apiir/services/gas-bill.php';

$result = apiir_gas_bill('1100151403410');

if ($result['success']) {
    $info = $result['data']; // آرایه‌ی انجمنی — مثال: $info['amount']
}
```

**نمونه خروجی `data`:**

```json
{
  "amount": 250000,
  "billID": "1100151403410",
  "payID": "12345678",
  "date": "1403/01/01"
}
```

---

### GasBillInfo — وب سرویس قبض گاز با جزئیات

بررسی وضعیت پرداخت و بدهی قبض گاز همراه با مشخصات اشتراک.

**پارامترها:**

| نام | نوع | اجباری | توضیح | نمونه مقدار |
|---|---|---|---|---|
| `billID` | string | بله | شناسه اشتراک | `1100151403410` |

**مهلت پیش‌فرض:** ۳۰ ثانیه (`APIIR_TIMEOUT`) — استعلام سبک.

**نمونه کد:**

```php
require_once plugin_dir_path(__FILE__) . 'apiir/services/gas-bill-info.php';

$result = apiir_gas_bill_info('1100151403410');

if ($result['success']) {
    $info = $result['data']; // آرایه‌ی انجمنی — مثال: $info['info']
}
```

**نمونه خروجی `data`:**

```json
{
  "info": {
    "ownerName": "علی محمدی",
    "address": "تهران، ...",
    "postalCode": "1234567890",
    "usageType": "خانگی",
    "meterNumber": "123456",
    "fileNumber": "1234",
    "city": "تهران",
    "capacity": 10,
    "previousReadDate": "1402/11/01",
    "currentReadDate": "1403/01/01",
    "currentConsumption": 30,
    "previousNumber": 1000,
    "currentNumber": 1030
  },
  "print": "...",
  "amount": 250000,
  "billID": "1100151403410",
  "payID": "12345678",
  "date": "1403/01/01"
}
```

---

### PowerBill — وب سرویس قبض برق

بررسی وضعیت پرداخت و بدهی قبض برق با شناسه قبض.

**پارامترها:**

| نام | نوع | اجباری | توضیح | نمونه مقدار |
|---|---|---|---|---|
| `billID` | string | بله | شناسه قبض | `1100151403410` |

**مهلت پیش‌فرض:** ۳۰ ثانیه (`APIIR_TIMEOUT`) — استعلام سبک.

**نمونه کد:**

```php
require_once plugin_dir_path(__FILE__) . 'apiir/services/power-bill.php';

$result = apiir_power_bill('1100151403410');

if ($result['success']) {
    $info = $result['data']; // آرایه‌ی انجمنی — مثال: $info['amount']
}
```

**نمونه خروجی `data`:**

```json
{
  "amount": 250000,
  "billID": "1100151403410",
  "payID": "12345678",
  "date": "1403/01/01"
}
```

---

### PowerBillInfo — وب سرویس قبض برق با جزئیات

بررسی وضعیت پرداخت قبض برق همراه با مشخصات مشترک و اطلاعات کنتور.

**پارامترها:**

| نام | نوع | اجباری | توضیح | نمونه مقدار |
|---|---|---|---|---|
| `billID` | string | بله | شناسه قبض | `1100151403410` |

**مهلت پیش‌فرض:** ۳۰ ثانیه (`APIIR_TIMEOUT`) — استعلام سبک.

**نمونه کد:**

```php
require_once plugin_dir_path(__FILE__) . 'apiir/services/power-bill-info.php';

$result = apiir_power_bill_info('1100151403410');

if ($result['success']) {
    $info = $result['data']; // آرایه‌ی انجمنی — مثال: $info['info']
}
```

**نمونه خروجی `data`:**

```json
{
  "info": {
    "ownerName": "علی محمدی",
    "address": "تهران، ...",
    "postalCode": "1234567890",
    "usageType": "خانگی",
    "meterNumber": "123456",
    "fileNumber": "1234",
    "city": "تهران",
    "capacity": 25,
    "previousReadDate": "1402/11/01",
    "currentReadDate": "1403/01/01",
    "currentConsumption": 300,
    "previousNumber": 10000,
    "currentNumber": 10300
  },
  "print": "...",
  "amount": 250000,
  "billID": "1100151403410",
  "payID": "12345678",
  "date": "1403/01/01"
}
```

---

## ۷. سناریوهای پرکاربرد

**الگوی پایه‌ی همه‌ی سناریوها:** اعتبارسنجی ورودی با توابع وردپرس (`sanitize_text_field`، `absint` و …) قبل از ارسال (تا اعتبار حساب بابت درخواست نامعتبر مصرف نشود) → **یک فراخوانی** → بررسی `success` → تفسیر `data` مطابق نوع آن در OpenAPI → پیام مناسب به کاربر با `esc_html`.

**شکست یعنی توقف:** در هر سناریو، پس از `success === false` برنامه پیام را نمایش می‌دهد و متوقف می‌شود. هیچ فراخوانی خودکار دوم، هیچ fallback خودکار به سرویس دیگر، هیچ تلاش مجدد و هیچ زمان‌بندی با `wp_cron` برای تکرار.

### سناریوی ۱ — کد یک‌بارمصرف پیامکی (`SmsOTP`، خروجی boolean) با انقضا

کد سمت برنامه با `random_int` تولید می‌شود، با `set_transient` و زمان انقضا ذخیره می‌شود و ارسال مجدد محدودیت زمانی دارد.

```php
require_once plugin_dir_path(__FILE__) . 'apiir/services/sms-otp.php';

add_action('admin_post_nopriv_my_send_otp', function () {
    check_admin_referer('my_send_otp');
    $mobile = sanitize_text_field($_POST['mobile'] ?? '');

    if (!preg_match('/^09\d{9}$/', $mobile)) {
        wp_die('شماره موبایل نامعتبر است.');
    }
    if (get_transient('my_otp_' . $mobile) !== false) {
        wp_die('کد قبلاً ارسال شده است؛ تا انقضای آن صبر کنید.'); // محدودیت ارسال مجدد
    }

    $code   = (string) random_int(100000, 999999);
    $result = apiir_sms_otp($code, $mobile);

    if (!$result['success']) {
        wp_die(esc_html($result['message'])); // شکست یعنی توقف؛ تلاش مجدد نکنید
    }

    set_transient('my_otp_' . $mobile, $code, 2 * MINUTE_IN_SECONDS);
    wp_safe_redirect(add_query_arg('otp', 'sent', wp_get_referer()));
    exit;
});
```

بررسی کد واردشده: مقایسه + `get_transient` + `delete_transient` پس از مصرف.

```php
add_action('admin_post_nopriv_my_verify_otp', function () {
    check_admin_referer('my_verify_otp');
    $mobile = sanitize_text_field($_POST['mobile'] ?? '');
    $input  = sanitize_text_field($_POST['code'] ?? '');
    $saved  = get_transient('my_otp_' . $mobile);

    if ($saved === false || !hash_equals($saved, $input)) {
        wp_die('کد نادرست یا منقضی شده است.');
    }

    delete_transient('my_otp_' . $mobile); // کد پس از مصرف حذف می‌شود
    // ادامه‌ی منطق برنامه (ورود، ثبت‌نام و ...)
});
```

> **هشدار:** کد را هرگز در پاسخ AJAX/REST یا لاگ برنگردانید؛ کد فقط از طریق پیامک به کاربر می‌رسد.

### سناریوی ۲ — ارسال پیامک خدماتی (`SendSms`، خروجی عددی) از یک REST endpoint

```php
require_once plugin_dir_path(__FILE__) . 'apiir/services/send-sms.php';

add_action('rest_api_init', function () {
    register_rest_route('my-plugin/v1', '/notify', [
        'methods'             => 'POST',
        'permission_callback' => function () { return current_user_can('manage_options'); },
        'callback'            => function (WP_REST_Request $request) {
            $message = sanitize_textarea_field((string) $request->get_param('message'));
            $mobiles = array_filter(array_map('sanitize_text_field', (array) $request->get_param('mobiles')));

            if ($message === '' || count($mobiles) === 0) {
                return new WP_Error('invalid', 'متن پیامک یا فهرست شماره‌ها خالی است.', ['status' => 400]);
            }

            $result = apiir_send_sms($message, array_values($mobiles));

            if (!$result['success']) {
                return new WP_Error('apiir', $result['message'], ['status' => 400]); // توقف؛ بدون تلاش مجدد
            }

            return ['sent' => true, 'value' => (int) $result['data']]; // data عددی است
        },
    ]);
});
```

### سناریوی ۳ — استعلام نام دارنده‌ی شبا (`IbanInfo`، خروجی آبجکت) از admin-ajax

```php
require_once plugin_dir_path(__FILE__) . 'apiir/services/iban-info.php';

add_action('wp_ajax_my_iban_info', function () {
    check_ajax_referer('my_iban_info');
    if (!current_user_can('edit_posts')) {
        wp_send_json_error('دسترسی غیرمجاز.', 403);
    }

    $iban = strtoupper(sanitize_text_field($_POST['iban'] ?? ''));
    if (!preg_match('/^IR\d{24}$/', $iban)) {
        wp_send_json_error('شماره شبا نامعتبر است.', 400);
    }

    $result = apiir_iban_info($iban);
    if (!$result['success']) {
        wp_send_json_error($result['message']); // شکست یعنی توقف
    }

    $info = $result['data']; // آرایه‌ی انجمنی: name / bankName / active
    wp_send_json_success([
        'name'   => esc_html($info['name'] ?? ''),
        'bank'   => esc_html($info['bankName'] ?? ''),
        'active' => !empty($info['active']),
    ]);
});
```

---

## ۸. تست بدون هزینه

سرویس `Echo` روی `https://s.api.ir/api/sandbox/echo` (در OpenAPI: `/api/Sandbox/Echo`) — **بدون هزینه، بدون نیاز به اعتبار، بدون استعلام**. برای بررسی صحت کلید و باز بودن مسیر خروجی هاست. این سرویس در OpenAPI وجود دارد و تابع `apiir_echo()` برای آن ساخته شده است.

نمونه‌ی تست اتصال هنگام فعال‌سازی افزونه، با نمایش نتیجه به‌صورت notice در پیشخوان:

```php
require_once plugin_dir_path(__FILE__) . 'apiir/services/echo.php';

register_activation_hook(__FILE__, function () {
    $result = apiir_echo('تست اتصال');

    $notice = $result['success']
        ? 'اتصال به api.ir برقرار است و کلید معتبر است.'
        : 'اتصال به api.ir ناموفق بود: ' . $result['message'];

    set_transient('my_plugin_apiir_notice', $notice, MINUTE_IN_SECONDS);
});

add_action('admin_notices', function () {
    $notice = get_transient('my_plugin_apiir_notice');

    if ($notice === false) {
        return;
    }

    delete_transient('my_plugin_apiir_notice');
    echo '<div class="notice notice-info is-dismissible"><p>' . esc_html($notice) . '</p></div>';
});
```

در پاسخ موفق، فیلد `data['tokenStatus']` وضعیت کلید شما را نشان می‌دهد.

---

## ۹. مدیریت خطا

**قاعده‌ی تفسیر خروجی:** فقط `success` را بررسی کنید.

- `success = true` یعنی پاسخ پردازش شده و قابل استفاده است و `data` نتیجه‌ی موردنظر را دارد.
- هر چیزی غیر از آن یعنی ناموفق؛ دلیل در `message` و معادل عددی همان دلیل در `code` است.
- مقدار `code` (از جمله `0`) رسیدن یا نرسیدن درخواست به سرور را تعیین نمی‌کند؛ از آن چنین تفسیری نکنید.
- `code = 401` یعنی مشکل کلید (تعریف‌نشده، نامعتبر یا خارج از IP مجاز).

**کد HTTP در این SDK وجود ندارد.** پاسخ سرور با هر کد HTTP (۲۰۰، ۴۰۱، ۵۰۰ و …) به همان قالب `success / code / message / data` تبدیل می‌شود و هیچ کلیدی برای کد HTTP در خروجی نیست. OpenAPI فعلی جدول کدهای خطا ندارد؛ به همین دلیل در این مستند جدولی از کدها نیامده است.

### خطاهای رایج و راه‌حل

| نشانه | علت احتمالی | راه‌حل |
|---|---|---|
| `code = 401` | `APIIR_TOKEN` در `wp-config.php` تعریف نشده یا کلید نامعتبر است | کلید را از `https://p.api.ir` کپی و با `define('APIIR_TOKEN', '...')` تعریف کنید |
| `code = 401` با کلید درست | IP سرور در «مدیریت IP» کلید مجاز نیست | IP خروجی را با `apiir_my_ip()` بگیرید و در پنل مجاز کنید |
| `message` حاوی `cURL error 7` / `28` / `could not resolve host` | مسیر خروجی هاست اشتراکی بسته است یا فایروال درخواست خروجی را مسدود می‌کند | از هاستینگ بخواهید دسترسی خروجی HTTPS به `s.api.ir` را باز کند |
| `message` حاوی `SSL certificate problem` | گواهی‌های هاست قدیمی است | گواهی‌های هاست (بسته‌ی CA) را به‌روزرسانی کنید؛ خاموش کردن `APIIR_SSL_VERIFY` راه‌حل نیست |
| `message` حاوی `Operation timed out` | مهلت پاسخ تمام شده | برای همان فراخوانی `$timeout` بزرگ‌تری بدهید (بخش ۳) |
| هیچ درخواستی به سرور نمی‌رسد | افزونه‌های امنیتی درخواست‌های خروجی را مسدود می‌کنند | در تنظیمات افزونه‌ی امنیتی، `s.api.ir` را مجاز کنید |
| `success = false` با پیام مربوط به اعتبار | اعتبار حساب کافی نیست | حساب خود را در `https://p.api.ir` شارژ کنید |

### پرهیز از حلقه‌ی بی‌نهایت

اگر پاسخ `success` نبود، **دوباره تلاش نکنید**. SDK هیچ retry ای ندارد و افزونه‌ی شما هم نباید داشته باشد: حلقه‌ی مدیریت‌نشده هم منابع سرور را مصرف می‌کند و هم برای شما هزینه دارد (پرداخت به‌ازای مصرف). پیام را به کاربر نشان دهید و متوقف شوید.

---

## ۱۰. نکات امنیتی و عملیاتی وردپرس

- **توکن فقط در `wp-config.php`** — هرگز در `wp_options` عمومی، فایل قالب یا مخزن گیت.
- **SDK فقط سمت سرور اجرا شود** — توکن هرگز به JavaScript یا پاسخ REST نرسد.
- **هر endpoint، admin-ajax یا `admin_post` که SDK را صدا می‌زند** باید `nonce` (`check_admin_referer` / `check_ajax_referer`) و `current_user_can` را بررسی کند.
- **پس از تحویل پروژه کلید را حذف کنید** و مالک سایت کلید خودش را بسازد؛ مسئولیت استعلام‌ها با مالک کلید است.
- **قفل ضد ارسال دوباره** روی فرم‌ها بگذارید (غیرفعال کردن دکمه پس از کلیک، یا `transient` مثل سناریوی ۱) تا یک درخواست چند بار ارسال نشود.
- **ورودی کاربر را قبل از ارسال اعتبارسنجی کنید** با توابع `sanitize_*` وردپرس و بررسی قالب (کد ملی ۱۰ رقمی، موبایل با `09`، شبا با `IR`) تا اعتبار حساب بابت درخواست نامعتبر مصرف نشود.
- **همه‌ی توابع داخل `function_exists` هستند** تا اگر افزونه‌ی دیگری هم همین SDK را داشت، خطای «تعریف مجدد تابع» رخ ندهد.
- **SDK هیچ چیزی ذخیره نمی‌کند و هیچ hook ای ثبت نمی‌کند** — فقط تابع است؛ ذخیره‌سازی (مثلاً transient کد یک‌بارمصرف) با افزونه‌ی شماست.

---

## ۱۱. پشتیبانی و منابع

| منبع | آدرس |
|---|---|
| پنل کاربری | `https://p.api.ir` |
| نمونه‌کد سایر زبان‌ها | `https://s.api.ir/code` |
| OpenAPI به‌روز | `https://s.api.ir/json` |
| مستندات Postman | `https://documenter.getpostman.com/view/40733477/2sAYJ7gJsi` |
| وضعیت و اپتایم سرویس‌ها | `https://status.api.ir/status/api-ir` |
| ایمیل | `info@api.ir` |
| تلفن | `90002244` |
| وب‌سایت | `https://api.ir` |
