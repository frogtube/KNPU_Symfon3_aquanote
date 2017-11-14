<?php

namespace AppBundle\Service;



use Knp\Bundle\MarkdownBundle\Parser\MarkdownParser;

class MarkdownTransformer
{
    private $markDownParser;

    public function __construct($markDownParser)
    {
        $this->markDownParser = new MarkdownParser();
    }

    public function parse($str)
    {
        return $this->markDownParser
            ->transform($str);
    }
}