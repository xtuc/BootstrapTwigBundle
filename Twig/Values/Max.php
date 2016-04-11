<?php

namespace Xtuc\BootstrapTwigBundle\Twig\Values;

class Max
{
    private $value;

    public function factory($value = 100)
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