<?php

namespace Xtuc\BootstrapTwigBundle\Services;

class DOMNode
{
    private $html;

    public function __construct($format, ...$options)
    {
        $this->html = sprintf($format, ...$options);
    }

    public function __toString()
    {
        return $this->html;
    }
}
