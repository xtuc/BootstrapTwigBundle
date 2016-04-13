<?php

namespace Xtuc\BootstrapTwigBundle\Services;

use \Xtuc\BootstrapTwigBundle\Services\DOMBuilder;

abstract class AbstractBootstrapDOMNode
{
    const DIV = "div";
    const SPAN = "span";
    const BUTTON = "button";
    const A = "a";
    const LI = "li";

    public function _default()
    {
        $this->type = "default";
        return $this->render(...func_get_args());
    }

    public function info()
    {
        $this->type = __FUNCTION__;
        return $this->render(...func_get_args());
    }

    public function primary()
    {
        $this->type = __FUNCTION__;
        return $this->render(...func_get_args());
    }

    public function success()
    {
        $this->type = __FUNCTION__;
        return $this->render(...func_get_args());
    }

    public function warning()
    {
        $this->type = __FUNCTION__;
        return $this->render(...func_get_args());
    }

    public function danger()
    {
        $this->type = __FUNCTION__;
        return $this->render(...func_get_args());
    }

    public function link()
    {
        $this->type = __FUNCTION__;
        return $this->render(...func_get_args());
    }

    public function __toString()
    {
        return $this->render();
    }
}
