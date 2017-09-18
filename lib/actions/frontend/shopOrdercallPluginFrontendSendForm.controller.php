<?php
/**
 *
 */
class shopOrdercallPluginFrontendSendFormController extends waJsonController
{
  public function execute()
  {
    if( waRequest::isXMLHttpRequest() ) {

			$name = waRequest::post('name');
			$phone =  waRequest::post('phone');

			if( $name != '' && $phone != '' ) {

				$subject = 'Заказ обратного звонка';

				$body = "Имя: $name, Номер телефона: $phone";

        $plugin = wa("shop")->getPlugin("ordercall");
				$settings = $plugin->getSettings();
				$sender = $settings['sender'];
				$recipient = $settings['pecipient'];

        //wa_dump($settings);
				$mail_message = new waMailMessage( $subject, $body );
				$mail_message->setFrom( $sender );
				$mail_message->setTo( $recipient );
				$mail_message->send();

				$this->response = 'Сообщение успешно отправлено!';

			}

		}

    // $email = 'info@bodysite.ru';
    // $title = 'Заказ обратного звонка';
    // $name = waRequest::post('name');
    // $phone = waRequest::post('phone');
    //
    // $message = "{$title} Имя: {$name}, телефон: {$phone}";
    //
    // $mail = new waMailMessage();
    // $mail->setTo($email);
    // $mail->setFrom($email);
    // $mail->setBody($message);
    // //$mail->encodeEmail($message);
    // $mail->send();
    // $this->response = $message;
  }
}
