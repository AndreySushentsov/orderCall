<?php


return array(
    "sender" => array(
        "title" => /*_wp*/("Отправитель"),
        "value" => "info@bodysite.ru", // значение по умолчанию
    "control_type" => waHtmlControl::INPUT,
    ),
    "recipient" => array(
        "title" => /*_wp*/("Email для уведомления"),
        "value" => "", // значение по умолчанию
        "control_type" => waHtmlControl::INPUT,
    ),
    "is_enable" => array(
        "title" => /*_wp*/("Статус плагина"),
        "value" => "1", // значение по умолчанию
        "options" => array(
            array(
                "value" => 0,
                "title" => "Отключен",
            ),
            array(
                "value" => 1,
                "title" => "Включен",
            ),
        ),
        "control_type" => waHtmlControl::SELECT,
    ),
);
