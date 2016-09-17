<?php

namespace Xtuc\BootstrapTwigBundle\Services;

/**
 * Class: DOMBuilder
 *
 * DOM builder
 */
class DOMBuilder
{
    /**
     * HTML tag
     *
     * @var string
     */
    private $tag;

    /**
     * HTML content
     *
     * @var mixed
     */
    private $content;

    /**
     * HTML tag attributes
     *
     * @var Array
     */
    private $attributes;

    /**
     * child DOMNode
     *
     * @var Array[DOMNode]
     */
    private $childrens;

    /**
     * setTag
     *
     * @param mixed $tag
     * @return DOMBuilder
     */
    public function setTag($tag)
    {
        $this->tag = $tag;
        return $this;
    }

    /**
     * setContent
     *
     * @param mixed $content
     * @return DOMBuilder
     */
    public function setContent($content)
    {
        $this->content = $content;
        return $this;
    }

    /**
     * setAttribute
     *
     * @param mixed $k key
     * @param mixed $v value
     * @return DOMBuilder
     */
    public function setAttribute($k, $v)
    {
        $this->attributes[$k] = $v;

        return $this;
    }

    /**
     * addChild
     *
     * @param DOMBuilder $builder
     * @return DOMBuilder
     */
    public function addChild(DOMBuilder $builder)
    {
        $this->childrens[] = $builder;

        return $this;
    }

    /**
     * compile
     *
     * @return DOMNode
     */
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
