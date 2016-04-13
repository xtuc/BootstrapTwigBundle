<?php

namespace Xtuc\BootstrapTwigBundle\Twig\Components;

use \Xtuc\BootstrapTwigBundle\Services\AbstractBootstrapDOMNode;
use \Xtuc\BootstrapTwigBundle\Services\DOMBuilder;

use \Xtuc\BootstrapTwigBundle\Twig\Values\Type;
use \Xtuc\BootstrapTwigBundle\Twig\Values\LinkTo;

class Btn extends AbstractBootstrapDOMNode
{
    protected $type;

    protected $link;

    public function factory($content, ...$args)
    {
        foreach ($args as $arg) {
            
            if ($arg instanceof Type) {
                $this->type = clone $arg;
            }

            if ($arg instanceof LinkTo) {
                $this->link = clone $arg;
            }
        }

        if (!$this->type) {
            $this->type = "default";
        }

        return $this->render($content);
    }

    public function render($content)
    {
        $dom = (new DOMBuilder)
                            ->setTag(($this->link) ? self::A : self::BUTTON)
                            ->setContent($content)
                            ->setAttribute("class", "btn btn-" . $this->type);

        if ($this->link) {
            $dom->setAttribute("href", $this->link);
        }

        return $dom->compile();
    }
}
