<?php

namespace Xtuc\BootstrapTwigBundle\Twig\Components;

class Label
{
    public static function _default($content = "")
    {
        return sprintf("<span class=\"label label-%s\">%s</span>", "default", $content);
    }

    public function info($content = "")
    {
        return $this->render("info", $content);
    }

    public function primary($content = "")
    {
        return $this->render("primary", $content);
    }

    public function success($content = "")
    {
        return $this->render("success", $content);
    }

    public function warning($content = "")
    {
        return $this->render("warning", $content);
    }

    public function danger($content = "")
    {
        return $this->render("danger", $content);
    }

    public function link($content = "")
    {
        return $this->render("link", $content);
    }

    private function render($type, $content = "")
    {
        return sprintf("<span class=\"label label-%s\">%s</span>", $type, $content);
    }
}
