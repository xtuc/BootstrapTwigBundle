<?php

namespace Xtuc\BootstrapTwigBundle\Twig\Values;

class LinkTo
{
    private $value;

    public function factory($value = "#")
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