<?php

declare(strict_types=1);

namespace CauldronOverflow\Application\Question\Vote;

use Shared\Domain\Bus\Command\Command;

final class VoteQuestionCommand implements Command
{
    private string $slug;
    private string $direction;

    public function __construct(
        string $slug,
        string $direction
    ) {
        $this->slug = $slug;
        $this->direction = $direction;
    }

    public function slug(): string
    {
        return $this->slug;
    }

    public function direction(): string
    {
        return $this->direction;
    }
}
