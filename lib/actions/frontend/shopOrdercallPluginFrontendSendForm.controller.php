<?php


class shopOrdercallPluginFrontendSendFormController extends waJsonController
{
    public function execute()
    {
        if (waRequest::isXMLHttpRequest())
        {
            $name = waRequest::post('name');
            $phone =  waRequest::post('phone');

            if ($name != '' && $phone != '')
            {
                $subject = 'Заказ обратного звонка';

                $body = "Имя: {$name}, Номер телефона: {$phone}";

                $plugin = wa("shop")->getPlugin("ordercall");
                $settings = $plugin->getSettings();

                if (!isset($settings['sender']))
                {
                    $sender = '';
                }
                else
                {
                    $sender = $settings['sender'];
                }

                if (!isset($settings['recipient']))
                {
                    $recipient = '';
                }
                else
                {
                    $recipient = $settings['recipient'];
                }

                if ($sender != '' && $recipient != '')
                {
                    $mail_message = new waMailMessage($subject, $body);
                    $mail_message->setFrom($sender);
                    $mail_message->setTo($recipient);
                    $mail_message->send();

                    $this->response = 'Сообщение успешно отправлено!';
                }
            }
        }
    }
}
