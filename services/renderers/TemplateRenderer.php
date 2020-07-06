<?php


namespace app\services\renderers;


use app\base\App;

class TemplateRenderer implements IRender
{
    public function render($template, $params = []) {
        ob_start();
        $templatePath = App::getInstance()->getConfig('viewsDir') . $template . ".php";
        extract($params);
        include $templatePath;
        return ob_get_clean();
    }
}