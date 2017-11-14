<?php

namespace AppBundle\Service;



use Doctrine\Common\Cache\Cache;
use Knp\Bundle\MarkdownBundle\MarkdownParserInterface;
use Knp\Bundle\MarkdownBundle\Parser\MarkdownParser;

class MarkdownTransformer
{
    private $markDownParser;
    private $cache;

    public function __construct(MarkdownParserInterface $markDownParser, Cache $cache)
    {
        $this->markDownParser = $markDownParser;
        $this->cache = $cache;
    }

    public function parse($str)
    {
        $cache = $this->cache;
        $key = md5($str);
        if ($cache->contains($key)) {
            return $cache->fetch($key);
        }

        $str = $this->markDownParser
            ->transformMarkdown($str);
        $cache->save($key, $str);

        return $str;
    }
}