<?php

namespace Xtuc\BootstrapTwigBundle\Twig\Components;

use \Xtuc\BootstrapTwigBundle\Services\AbstractBootstrapDOMNode;
use \Xtuc\BootstrapTwigBundle\Services\DOMBuilder;

class PagerElements extends AbstractBootstrapDOMNode
{
    public function render($type, $content)
    {
        $link = (new DOMBuilder)
                            ->setTag(self::A)
                            ->setContent($content)
                            ->setAttribute("href", "foo_tmp");

        return (new DOMBuilder)
                            ->setTag(self::LI)
                            ->setAttribute("class", $type)
                            ->addChild($link)
                            ->compile();
    }

    public function previous($content = "")
    {
        return $this->render(__FUNCTION__, $content);
    }

    public function next($content = "")
    {
        return $this->render(__FUNCTION__, $content);
    }
}
