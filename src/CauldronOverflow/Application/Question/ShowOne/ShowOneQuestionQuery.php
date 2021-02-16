<?php

declare(strict_types=1);

namespace CauldronOverflow\Application\Question\ShowOne;

use Shared\Domain\Bus\Query\Query;

final class ShowOneQuestionQuery implements Query
{
    private string $slug;

    public function __construct(
        string $slug
    ) {
        $this->slug = $slug;
    }

    public function slug(): string
    {
        return $this->slug;
    }
}
