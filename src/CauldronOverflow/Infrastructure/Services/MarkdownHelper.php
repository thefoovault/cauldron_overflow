<?php

declare(strict_types=1);

namespace CauldronOverflow\Infrastructure\Services;

use Knp\Bundle\MarkdownBundle\MarkdownParserInterface;
use Symfony\Contracts\Cache\CacheInterface;

class MarkdownHelper
{
    private CacheInterface $cache;
    private MarkdownParserInterface $markdownParser;
    private bool $isDebug;

    public function __construct(CacheInterface $cache, MarkdownParserInterface $markdownParser, bool $isDebug)
    {
        $this->cache = $cache;
        $this->markdownParser = $markdownParser;
        $this->isDebug = $isDebug;
    }

    public function parse(string $source): string
    {
        if ($this->isDebug) {
            return $this->markdownParser->transformMarkdown($source);
        }

        return $this->cache->get('markdown_'.md5($source), function() use ($source) {
            return $this->markdownParser->transformMarkdown($source);
        });
    }
}
