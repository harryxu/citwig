<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 
class CI_Url_Node extends Twig_Node
{

    public function __construct($value, $lineno, $tag = null)
    {
        parent::__construct(array('value' => $value), array(), $lineno, $tag);
    }

    public function compile($compiler)
    {
        $compiler->addDebugInfo($this);
        $CI =& get_instance();
        $CI->load->helper('url');

        $compiler
            ->write("echo site_url(")
            ->subcompile($this->value)
            ->raw(");\n");
    }
}

class CI_Url_TokenParser extends Twig_TokenParser
{
    public function parse(Twig_Token $token)
    {
        $value = $this->parser->getExpressionParser()->parseExpression();
        $this->parser->getStream()->expect(Twig_Token::BLOCK_END_TYPE);

        return new CI_Url_Node($value, $token->getLine(), $this->getTag());
    }

    public function getTag()
    {
        return 'url';
    }
}



///////////////////////
class CI_Twig_Extension extends Twig_Extension
{
    public function getName()
    {
        return 'ci';
    }

    public function getTokenParsers()
    {
        return array(new CI_Url_TokenParser());
    }
}
