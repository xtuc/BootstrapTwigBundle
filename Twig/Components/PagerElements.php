<?php

namespace Xtuc\BootstrapTwigBundle\Twig\Components;

class PagerElements
{
    public function previous($content = "")
    {
    	return $this->render(__FUNCTION__, null, $content);
    }

    public function next($content = "")
    {
    	return $this->render(__FUNCTION__, null, $content);
    }

    private function render($class ="", $link = "#", $content = "")
    {
        return sprintf("<li class=\"%s\"><a href=\"%s\">%s</a></li>", $class, $link, $content);
    }
}
