<?php

// معرف البوت الخاص بك
$botToken = '6808393632:AAFsR49x0vT3Cfe-vpKXGCKct20B2NJDmHk';

// رسالة الرد المخصصة
$responseMessage = "السلام عليكم ✌🏻\nرابط نسخة جديدة 1.5b من الجواهر 💎\nمميزات هذه النسخة 👇🏻💥 :\n●نسخة 0 حجرة (اللعب بدون أحجار) 💯\n●نسخة آخر إصدار 💯\n●نسخة سريعة ومكينش فيها مشاكل نهائيا 🔥\n●نسخة آمنة 💯\nرابط تحميل النسخة من ميديا فاير بدون الحاجة لتسجيل الدخول بحسابك في أي موقع 🌻🍁\n%s"; 

// قبول طلب الإرسال
$update = json_decode(file_get_contents("php://input"), true);

// التحقق من وجود رسالة ونوعها
if (isset($update['message']) && isset($update['message']['text'])) {
    $message_text = $update['message']['text'];
    $chat_id = $update['message']['chat']['id'];

    // التحقق من أن الرسالة تحتوي على رابط
    if (filter_var($message_text, FILTER_VALIDATE_URL)) {
        // إذا كانت الرسالة تحتوي على رابط
        // قم بإرسال الرد المخصص مع الرابط
        $response = sprintf($responseMessage, $message_text);
        file_get_contents("https://api.telegram.org/bot$botToken/sendMessage?chat_id=$chat_id&text=" . urlencode($response));
    }
}
