<?php

namespace Xtuc\BootstrapTwigBundle\Twig\Components\Grid;

class Col extends \Twig_TokenParser
{
    private function parseFunction(\Twig_TokenStream $stream)
    {
        $arguments = array();

        $stream->expect(\Twig_Token::PUNCTUATION_TYPE);

        while ($token = $stream->nextIf(\Twig_Token::NUMBER_TYPE)) {

            $arguments[] = $token->getValue();
            $stream->expect(\Twig_Token::PUNCTUATION_TYPE);
        }

        return $arguments;
    }

    /**
     * {@inheritdoc}
     */
    public function parse(\Twig_Token $token)
    {
        $lineno = $token->getLine();
        $stream = $this->parser->getStream();

        $stream->expect(\Twig_Token::PUNCTUATION_TYPE);

        $stack = [];

        while ($name = $stream->nextIf(\Twig_Token::NAME_TYPE)) {
            $function = "\\Xtuc\\BootstrapTwigBundle\\Twig\\Components\\Grid\\Options\\" . ucfirst($name->getValue());
            $args = $this->parseFunction($stream);

            $stack[] = (new $function())->factory(...$args);

            $stream->expect(\Twig_Token::PUNCTUATION_TYPE);
        }
        
        $classes = "";

        foreach ($stack as $element) {
            $classes .= "col-" . $element;

            if (end($stack) !== $element) {
                $classes .= " ";
            }
        }

        $stream->expect(\Twig_Token::BLOCK_END_TYPE);
        $body = $this->parser->subparse(array($this, 'decideEnd'), true);
        $stream->expect(\Twig_Token::BLOCK_END_TYPE);

        $col = new \Twig_Node_Text("<div class=\"$classes\">". $body->getAttribute("data") ."</div>", $lineno);

        return new \Twig_Node(array('body' => $col), array(), $lineno, $this->getTag());
    }

    public function decideEnd(\Twig_Token $token)
    {
        return $token->test('end' . $this->getTag());
    }

    /**
     * {@inheritdoc}
     */
    public function getTag()
    {
        return 'col';
    }
}
