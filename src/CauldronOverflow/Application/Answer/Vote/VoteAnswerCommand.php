<?php

declare(strict_types=1);

namespace CauldronOverflow\Application\Answer\Vote;

use Shared\Domain\Bus\Command\Command;

class VoteAnswerCommand implements Command
{
    private string $id;
    private string $direction;

    public function __construct(string $id, string $direction)
    {
        $this->id = $id;
        $this->direction = $direction;
    }

    public function id(): string
    {
        return $this->id;
    }

    public function direction(): string
    {
        return $this->direction;
    }
}
