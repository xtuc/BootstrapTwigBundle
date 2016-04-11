<?php

namespace Xtuc\BootstrapTwigBundle\Twig\Components\Grid\Options;

abstract class BaseOption
{
    /**
     * [$value description]
     * @var Integer
     */
    private $value;

    /**
     * [$offset description]
     * @var Integer
     */
    private $offset;

    public function __tostring()
    {
        $str = sprintf("%s-%s", $this->grid, $this->value);

        if ($this->offset) {
            $str .= " " . sprintf("col-%s-offset-%s", $this->grid, $this->offset);
        }

        return $str;
    }

    public function tostringWithoutValue()
    {
        return $this->grid;
    }

    public function factory($value = null, $offset = null)
    {
        $this->value = $value;
        $this->offset = $offset;

        return $this;
    }
}
