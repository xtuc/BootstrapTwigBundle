<?php

namespace Xtuc\BootstrapTwigBundle\Twig\Components;

class Alert
{
    public function info($label = "")
    {
        return $this->render("info", $label);
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

    private function render($type, $content = "")
    {
        return sprintf("<div class=\"alert alert-%s\" role=\"alert\">%s</div>", $type, $content);
    }
}
