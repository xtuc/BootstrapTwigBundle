<?php

namespace Xtuc\BootstrapTwigBundle\Twig\Components;

class Btn
{
    public static function _default($label = "")
    {
        return sprintf("<button type='button' class='btn btn-%s'>%s</button>", "default", $label);
    }

    public function info($label = "")
    {
        return $this->render("info", $label);
    }

    public function primary($label = "")
    {
        return $this->render("primary", $label);
    }

    public function success($label = "")
    {
        return $this->render("success", $label);
    }

    public function warning($label = "")
    {
        return $this->render("warning", $label);
    }

    public function danger($label = "")
    {
        return $this->render("danger", $label);
    }

    public function link($label = "")
    {
        return $this->render("link", $label);
    }

    private function render($type, $label = "")
    {
        return sprintf("<button type='button' class='btn btn-%s'>%s</button>", $type, $label);
    }
}
