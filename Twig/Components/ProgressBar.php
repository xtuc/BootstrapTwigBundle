<?php

namespace Xtuc\BootstrapTwigBundle\Twig\Components;

use \Xtuc\BootstrapTwigBundle\Twig\Values\Now;
use \Xtuc\BootstrapTwigBundle\Twig\Values\Min;
use \Xtuc\BootstrapTwigBundle\Twig\Values\Max;

use \Xtuc\BootstrapTwigBundle\Services\DOMBuilder;
use \Xtuc\BootstrapTwigBundle\Services\AbstractBootstrapDOMNode;

class ProgressBar extends AbstractBootstrapDOMNode
{
    /**
     * [$type description]
     * @var String
     */
    private $type;

    /**
     * [$valueNow description]
     * @var \Xtuc\BootstrapTwigBundle\Twig\Values\Now
     */
    public $valueNow;

    /**
     * [$valueMin description]
     * @var \Xtuc\BootstrapTwigBundle\Twig\Values\Min
     */
    private $valueMin;

    /**
     * [$valueMax description]
     * @var \Xtuc\BootstrapTwigBundle\Twig\Values\Max
     */
    private $valueMax;

    public function factory($type, ...$args)
    {
        $this->type = $type;

        foreach ($args as $arg) {

            if ($arg instanceof Now) {
                $this->valueNow = clone $arg;
            }

            if ($arg instanceof Min) {
                $this->valueMin = clone $arg;
            }

            if ($arg instanceof Max) {
                $this->valueMax = clone $arg;
            }
        }

        return $this;
    }

    public function success()
    {
        return (new self)->factory(__FUNCTION__, ...func_get_args());
    }

    public function info()
    {
        return (new self)->factory(__FUNCTION__, ...func_get_args());
    }

    public function warning()
    {
        return (new self)->factory(__FUNCTION__, ...func_get_args());
    }

    public function danger()
    {
        return (new self)->factory(__FUNCTION__, ...func_get_args());
    }

    public static function renderContainer()
    {
        return (new DOMBuilder)
                            ->setTag(self::DIV)
                            ->setAttribute("class", "progress");
    }

    public function render($root = true)
    {
        $container = self::renderContainer();

        $element = (new DOMBuilder)
                            ->setTag(self::DIV)
                            ->setAttribute("class", "progress-bar progress-bar-" . $this->type)
                            ->setAttribute("role", "progressbar")
                            ->setAttribute("style", "width:". $this->valueNow ."%;")
                            ->setAttribute("aria-valuenow", $this->valueNow)
                            ->setContent("<span class=\"sr-only\">%s %% complete (%s)</span>");

        if ($this->valueMin) {
            $element->setAttribute("aria-valuemin", $this->valueMin);
        }

        if ($this->valueMax) {
            $element->setAttribute("aria-valuemax", $this->valueMax);
        }

        if ($root) {
            return $container
                            ->addChild($element)
                            ->compile();
        }

        return $element->compile();
    }

    public function __toString()
    {
        return $this->render()->__toString();
    }
}
