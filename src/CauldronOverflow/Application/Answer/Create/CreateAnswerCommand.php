<?php

declare(strict_types=1);

namespace CauldronOverflow\Application\Answer\Create;

use Shared\Domain\Bus\Command\Command;

final class CreateAnswerCommand implements Command
{
    private string $slug;
    private string $answer;

    public function __construct(
        string $slug,
        string $answer
    ) {
        $this->slug = $slug;
        $this->answer = $answer;
    }

    public function slug(): string
    {
        return $this->slug;
    }

    public function answer(): string
    {
        return $this->answer;
    }
}
