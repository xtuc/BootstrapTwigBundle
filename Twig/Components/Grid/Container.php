<?php

namespace Xtuc\BootstrapTwigBundle\Twig\Components\Grid;

class Container extends \Twig_TokenParser
{
    /**
     * {@inheritdoc}
     */
    public function parse(\Twig_Token $token)
    {
        $lineno = $token->getLine();
        $stream = $this->parser->getStream();

        $stream->expect(\Twig_Token::BLOCK_END_TYPE);
        $nodes = $this->parser->subparse(array($this, 'decideEnd'), true);
        $stream->expect(\Twig_Token::BLOCK_END_TYPE);

        $headNode = new \Twig_Node_Text("<div class=\"container\">", $lineno);
        $footerNode = new \Twig_Node_Text("</div>", $lineno);

        return new \Twig_Node(array("head" => $headNode, 'body' => $nodes, "footer" => $footerNode), array(), $lineno, $this->getTag());
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
        return 'container';
    }
}
