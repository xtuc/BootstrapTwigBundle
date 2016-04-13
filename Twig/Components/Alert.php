<?php

namespace Xtuc\BootstrapTwigBundle\Twig\Components;

use \Xtuc\BootstrapTwigBundle\Services\AbstractBootstrapDOMNode;
use \Xtuc\BootstrapTwigBundle\Services\DOMBuilder;

class Alert extends AbstractBootstrapDOMNode
{
    public function render($content)
    {
        return (new DOMBuilder)
                            ->setTag(self::DIV)
                            ->setContent($content)
                            ->setAttribute("class", "alert alert-" . $this->type)
                            ->setAttribute("role", "alert")
                            ->compile();
    }
}
