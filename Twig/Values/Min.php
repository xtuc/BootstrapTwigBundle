<?php

namespace Xtuc\BootstrapTwigBundle\Twig\Values;

class Min
{
    private $value;

    public function factory($value = 0)
    {
        $this->value = $value;

        return $this;
    }

    public function getValue()
    {
        return $this->value;
    }

    public function __toString()
    {
        return (string) $this->getValue();
    }
}