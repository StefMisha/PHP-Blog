<?php


namespace app\Services;


class EmailService
{
    public static function send( //активация условная, сервис по отправки почты не работает локально
        $receiver,
        string $subject,
        string $templateName,
        array $templateVars = []
    ): void {
        extract($templateVars);

        ob_start();
        require __DIR__ . '/../../public/view/mail/' . $templateName;
        $body = ob_get_contents();
        ob_end_clean();
var_dump($body);//вместо рассылки почты, вывожу ссылку на подтверждение при регистрации
        mail($receiver->getEmail(), $subject, $body, 'Content_Type: text/html; charset=UTF-8');
    }
}