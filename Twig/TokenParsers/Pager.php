<?php

namespace Xtuc\BootstrapTwigBundle\Twig\TokenParsers;

class Pager extends \Twig_TokenParser
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

        $headNode = new \Twig_Node_Text("<ul class=\"pager\">", $lineno);
        $footerNode = new \Twig_Node_Text("</ul>", $lineno);

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
        return 'pager';
    }
}
