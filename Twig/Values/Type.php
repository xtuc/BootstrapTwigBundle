<?php

namespace Xtuc\BootstrapTwigBundle\Twig\Values;

class Type
{
    private $value;

    public function factory($value = "default")
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