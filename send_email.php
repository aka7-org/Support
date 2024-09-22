<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $message = htmlspecialchars($_POST['message']);

    $to = ''; // استبدل هذا بالإيميل الذي تريد استقبال الرسائل عليه
    $subject = 'طلب دعم فني من ' . $name;
    $headers = "From: $email\r\n";
    $headers .= "Reply-To: $email\r\n";
    $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";

    $body = "اسم المرسل: $name\n";
    $body .= "البريد الإلكتروني: $email\n\n";
    $body .= "الرسالة:\n$message";

    if (mail($to, $subject, $body, $headers)) {
        echo 'تم إرسال الرسالة بنجاح!';
    } else {
        echo 'حدث خطأ أثناء إرسال الرسالة.';
    }
}
?>
