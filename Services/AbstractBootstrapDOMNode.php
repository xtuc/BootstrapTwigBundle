<?php

namespace Xtuc\BootstrapTwigBundle\Services;

use \Xtuc\BootstrapTwigBundle\Services\DOMBuilder;

/**
 * Class: AbstractBootstrapDOMNode
 *
 * Represent an abstract Bootstrap element.
 * Includes all Bootstrap types.
 *
 * Concret DOMNode must provide a render method.
 * Note: this method isn't abstract because it may have variable arguments
 *
 * @abstract
 */
abstract class AbstractBootstrapDOMNode
{

    const DIV = "div";
    const SPAN = "span";
    const BUTTON = "button";
    const A = "a";
    const LI = "li";

    /**
     * default type
     *
     * 'default' is a reserved PHP keyword
     *
     * @return DOMNode
     */
    public function _default()
    {
        $this->type = "default";
        return $this->render(...func_get_args());
    }

    /**
     * info type
     *
     * @return DOMNode
     */
    public function info()
    {
        $this->type = __FUNCTION__;
        return $this->render(...func_get_args());
    }

    /**
     * primary type
     *
     * @return DOMNode
     */
    public function primary()
    {
        $this->type = __FUNCTION__;
        return $this->render(...func_get_args());
    }

    /**
     * success type
     *
     * @return DOMNode
     */
    public function success()
    {
        $this->type = __FUNCTION__;
        return $this->render(...func_get_args());
    }

    /**
     * warning type
     *
     * @return DOMNode
     */
    public function warning()
    {
        $this->type = __FUNCTION__;
        return $this->render(...func_get_args());
    }

    /**
     * danger type
     *
     * @return DOMNode
     */
    public function danger()
    {
        $this->type = __FUNCTION__;
        return $this->render(...func_get_args());
    }

    /**
     * link type (only for some elements)
     *
     * @return DOMNode
     */
    public function link()
    {
        $this->type = __FUNCTION__;
        return $this->render(...func_get_args());
    }

    /**
     * Get DOMNode
     *
     * FIXME: this method should return a string
     *
     * DOMNode has a method __toString which will be
     * called by Twig when rendering the template
     *
     * @return DOMNode
     */
    public function __toString()
    {
        return $this->render();
    }
}
