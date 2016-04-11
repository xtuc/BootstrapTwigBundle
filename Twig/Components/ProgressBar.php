<?php

namespace Xtuc\BootstrapTwigBundle\Twig\Components;

use \Xtuc\BootstrapTwigBundle\Twig\Values\Now;
use \Xtuc\BootstrapTwigBundle\Twig\Values\Min;
use \Xtuc\BootstrapTwigBundle\Twig\Values\Max;

class ProgressBar
{
    const START = "<div class=\"progress\">";
    const END = "</div>";

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

    public function render($root = true)
    {
        return sprintf("%s<div class=\"progress-bar progress-bar-%s\" role=\"progressbar\" aria-valuenow=\"%s\" %s %s style=\"width: %s%%\"><span class=\"sr-only\">%s %% complete (%s)</span></div>%s",
            ($root) ? self::START : "",
            $this->type,
            $this->valueNow,
            ($this->valueMin) ? "aria-valuemin=\"" . $this->valueMin . "\"" : null,
            ($this->valueMax) ? "aria-valuemax=\"" . $this->valueMax . "\"" : null,
            $this->valueNow,
            $this->valueNow,
            $this->type,
            ($root) ? self::END : ""
        );
    }

    public function __toString()
    {
        return $this->render();
    }
}
