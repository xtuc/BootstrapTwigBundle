<?php

namespace Xtuc\BootstrapTwigBundle\Twig;

use \Xtuc\BootstrapTwigBundle\Twig\TokenParsers\Pager;
use \Xtuc\BootstrapTwigBundle\Twig\TokenParsers\Grid\Row;
use \Xtuc\BootstrapTwigBundle\Twig\TokenParsers\Grid\Container;
use \Xtuc\BootstrapTwigBundle\Twig\TokenParsers\Grid\Col;

use \Xtuc\BootstrapTwigBundle\Twig\Components\Grid\Grid;
use \Xtuc\BootstrapTwigBundle\Twig\Components\Grid\Options\Md;
use \Xtuc\BootstrapTwigBundle\Twig\Components\Grid\Options\Sm;
use \Xtuc\BootstrapTwigBundle\Twig\Components\Grid\Options\Xs;
use \Xtuc\BootstrapTwigBundle\Twig\Components\Grid\Options\Lg;
use \Xtuc\BootstrapTwigBundle\Twig\Components\Grid\Options\OptionInterface;
use \Xtuc\BootstrapTwigBundle\Twig\Components\ProgressBar;
use \Xtuc\BootstrapTwigBundle\Twig\Values\Min;
use \Xtuc\BootstrapTwigBundle\Twig\Values\Max;
use \Xtuc\BootstrapTwigBundle\Twig\Values\Now;

use \Xtuc\BootstrapTwigBundle\Services\DOMBuilder;
use \Xtuc\BootstrapTwigBundle\Services\AbstractBootstrapDOMNode;

class BootstrapExtension extends \Twig_Extension
{
    public function __construct()
    {
        $this->components = [
            "Btn" => new \Xtuc\BootstrapTwigBundle\Twig\Components\Btn,
            "Label" => new \Xtuc\BootstrapTwigBundle\Twig\Components\Label,
            "Alert" => new \Xtuc\BootstrapTwigBundle\Twig\Components\Alert,
            "Pager" => new \Xtuc\BootstrapTwigBundle\Twig\Components\PagerElements,
            "ProgressBar" => new \Xtuc\BootstrapTwigBundle\Twig\Components\ProgressBar
        ];

        $this->tokenParsers = [ new Col, new Row, new Container, new Pager ];
    }

    public function getGlobals()
    {
        return $this->components;
    }

    public function getTokenParsers()
    {
        return $this->tokenParsers;
    }

    public function getFunctions()
    {
        return array(
            new \Twig_SimpleFunction("Btn", array($this, "btn"), [ "is_safe" => [ "html" ] ]),
            new \Twig_SimpleFunction("Label", array($this, "label"), [ "is_safe" => [ "html" ] ]),
            new \Twig_SimpleFunction("md", array(new Md, "factory"), [ "is_safe" => [ "html" ] ]),
            new \Twig_SimpleFunction("sm", array(new Sm, "factory"), [ "is_safe" => [ "html" ] ]),
            new \Twig_SimpleFunction("xs", array(new Xs, "factory"), [ "is_safe" => [ "html" ] ]),
            new \Twig_SimpleFunction("lg", array(new Lg, "factory"), [ "is_safe" => [ "html" ] ]),
            new \Twig_SimpleFunction("Well", array($this, "well"), [ "is_safe" => [ "html" ] ]),
            new \Twig_SimpleFunction("Badge", array($this, "badge"), [ "is_safe" => [ "html" ] ]),
            new \Twig_SimpleFunction("Strong", array($this, "strong"), [ "is_safe" => [ "html" ] ]),
            new \Twig_SimpleFunction("Small", array($this, "small"), [ "is_safe" => [ "html" ] ]),
            new \Twig_SimpleFunction("PageHeader", array($this, "pageHeader"), [ "is_safe" => [ "html" ] ]),
            new \Twig_SimpleFunction("ProgressBar", array($this, "progressBar"), [ "is_safe" => [ "html" ] ]),
            new \Twig_SimpleFunction("Min", array(new Min, "factory")),
            new \Twig_SimpleFunction("Max", array(new Max, "factory")),
            new \Twig_SimpleFunction("Now", array(new Now, "factory")),
        );
    }

    public function badge($value = "")
    {
        return sprintf("<span class=\"badge\">%s</span>", $value);
    }

    public function progressBar(...$args)
    {
        $str = "";
        $container = ProgressBar::renderContainer();

        foreach ($args as $progressBar) {
            $str .= $progressBar->render(false);
        }

        return $container->setContent($str)->compile();
    }

    public function strong($value = "")
    {
        return sprintf("<strong>%s</strong>", $value);
    }

    public function small($value = "")
    {
        return sprintf("<small>%s</small>", $value);
    }

    public function pageHeader($value = "")
    {
        return sprintf("<div class=\"page-header\"><h1>%s</h1></div>", $value);
    }

    public function well($content = "", OptionInterface $option = null)
    {
        $additionnalClass = "";

        if ($option) {
            $additionnalClass = "well-" . $option->tostringWithoutValue();
        }

        return sprintf("<div class=\"well %s\">%s</div>", $additionnalClass, $content);
    }

    public function label($content = "")
    {
        return $this->components["Label"]->_default($content);
    }

    public function btn($content = "")
    {
        return $this->components["Btn"]->_default($content);
    }

    public function getName()
    {
        return "bootstrap_extension";
    }
}
