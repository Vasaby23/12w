<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $data = json_decode(file_get_contents("php://input"));

    $email = $data->email;
    $contact = $data->contact;

    // Підключення до серверу електронної пошти та відправлення повідомлення
    $to = "andreytop77@gmail.com";
    $subject = "Нова заявка";
    $message = "Електронна пошта: $email\nКонтактний номер: $contact";
    $headers = "From: yourwebsite@example.com" . "\r\n" .
               "Reply-To: yourwebsite@example.com" . "\r\n" .
               "X-Mailer: PHP/" . phpversion();

    if (mail($to, $subject, $message, $headers)) {
        http_response_code(200);
    } else {
        http_response_code(500);
    }
} else {
    http_response_code(405);
}
?>
