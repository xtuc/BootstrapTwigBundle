<?php

namespace Xtuc\BootstrapTwigBundle\Services;

/**
 * Class: DOMNode
 *
 * Represents an HTML node
 */
class DOMNode
{
    /**
     * html
     *
     * @var string
     */
    private $html;

    /**
     * __construct
     *
     * @param mixed $format
     * @param ... $options
     */
    public function __construct($format, ...$options)
    {
        $this->html = sprintf($format, ...$options);
    }

    /**
     * __toString
     *
     * Called internally by Twig when rendering
     *
     * @return string
     */
    public function __toString()
    {
        return $this->html;
    }
}
