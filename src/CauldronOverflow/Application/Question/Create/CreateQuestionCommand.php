<?php

declare(strict_types=1);

namespace CauldronOverflow\Application\Question\Create;

use Shared\Domain\Bus\Command\Command;

class CreateQuestionCommand implements Command
{
    private string $name;
    private string $question;
    private string $slug;

    public function __construct(
        string $name,
        string $question,
        string $slug
    ) {
        $this->name = $name;
        $this->question = $question;
        $this->slug = $slug;
    }

    public function name(): string
    {
        return $this->name;
    }

    public function question(): string
    {
        return $this->question;
    }

    public function slug(): string
    {
        return $this->slug;
    }
}
