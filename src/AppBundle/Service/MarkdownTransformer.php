<?php

namespace AppBundle\Service;



use Knp\Bundle\MarkdownBundle\MarkdownParserInterface;
use Knp\Bundle\MarkdownBundle\Parser\MarkdownParser;

class MarkdownTransformer
{
    private $markDownParser;

    public function __construct(MarkdownParserInterface $markDownParser)
    {
        $this->markDownParser = new MarkdownParser();
    }

    public function parse($str)
    {
        return $this->markDownParser
            ->transformMarkdown($str);
    }
}