<?php

namespace Xtuc\BootstrapTwigBundle\Twig\Components\Grid\Options;

interface OptionInterface
{
    public function __tostring();
    public function tostringWithoutValue();
}
