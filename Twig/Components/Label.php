<?php

namespace Xtuc\BootstrapTwigBundle\Twig\Components;

use \Xtuc\BootstrapTwigBundle\Services\AbstractBootstrapDOMNode;
use \Xtuc\BootstrapTwigBundle\Services\DOMBuilder;

class Label extends AbstractBootstrapDOMNode
{
    public function render($content)
    {
        return (new DOMBuilder)
                            ->setTag(self::SPAN)
                            ->setContent($content)
                            ->setAttribute("class", "label label-" . $this->type)
                            ->compile();
    }
}
