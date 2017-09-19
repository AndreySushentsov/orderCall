<?php

/**
 *
 */


class shopOrdercallViewHelper
{
    public static function display()
    {
        $plugin = wa("shop")->getPlugin("ordercall");
        $settings = $plugin->getSettings();
        $html = '';

        if (!isset($settings['is_enable'])){
            $is_enable = 0;
        }
        else {
            $is_enable = $settings['is_enable'];
        }

        if ($is_enable == '1'){
            $view = wa()->getView();
            $path = $plugin->getPath().'/templates/Ordercall.html';
            $url = $plugin->getPluginStaticUrl();
            $view->assign('url', $url);
            $html = $view->fetch($path);
        }

        $route = wa()->getRouting()->getUrl(
            'shop/frontend/sendForm',
            array('plugin' => 'ordercall')
        );

        return $html;
    }
}
