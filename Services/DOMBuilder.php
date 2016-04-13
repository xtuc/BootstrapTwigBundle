<?php

namespace Xtuc\BootstrapTwigBundle\Services;

class DOMBuilder
{
    private $tag;

    private $content;

    private $attributes;

    private $childrens;

    public function setTag($tag)
    {
        $this->tag = $tag;
        return $this;
    }

    public function setContent($content)
    {
        $this->content = $content;
        return $this;
    }

    public function setAttribute($k, $v)
    {
        $this->attributes[$k] = $v;

        return $this;
    }

    public function addChild(DOMBuilder $builder)
    {
        $this->childrens[] = $builder;

        return $this;
    }

    public function compile()
    {
        $attributes = "";

        foreach ($this->attributes as $key => $value) {
            $attributes .= "$key=\"$value\" ";
        }

        if ($this->childrens) {
            $content = "";

            foreach ($this->childrens as $child) {
                $content .= $child->compile();
            }
        } else {
            $content = $this->content;
        }

        return new DOMNode(
            "<%s %s>%s</%s>",
            $this->tag,
            $attributes,
            $content,
            $this->tag
        );
    }
}
