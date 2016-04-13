<?php

namespace Xtuc\BootstrapTwigBundle\Twig\Components;

use \Xtuc\BootstrapTwigBundle\Services\AbstractBootstrapDOMNode;
use \Xtuc\BootstrapTwigBundle\Services\DOMBuilder;

class Btn extends AbstractBootstrapDOMNode
{
    public function render($content)
    {
        return (new DOMBuilder)
                            ->setTag(self::BUTTON)
                            ->setContent($content)
                            ->setAttribute("class", "btn btn-" . $this->type)
                            ->compile();
    }
}
