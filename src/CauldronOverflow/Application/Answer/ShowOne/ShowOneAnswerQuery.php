<?php

declare(strict_types=1);

namespace CauldronOverflow\Application\Answer\ShowOne;

use Shared\Domain\Bus\Query\Query;

final class ShowOneAnswerQuery implements Query
{
    private string $id;

    public function __construct(string $id)
    {
        $this->id = $id;
    }

    public function id(): string
    {
        return $this->id;
    }
}
