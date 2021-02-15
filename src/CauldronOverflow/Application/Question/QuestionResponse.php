<?php

declare(strict_types=1);

namespace CauldronOverflow\Application\Question;

use CauldronOverflow\Domain\Question\Question;
use DateTime;
use Shared\Domain\Bus\Query\Response;

final class QuestionResponse implements Response
{
    private string $id;
    private string $name;
    private string $question;
    private string $slug;
    private DateTime $createdAt;
    private string $votes;

    public function __construct(
        string $id,
        string $name,
        string $question,
        string $slug,
        DateTime $createdAt,
        string $votes
    ) {
        $this->id = $id;
        $this->name = $name;
        $this->question = $question;
        $this->slug = $slug;
        $this->createdAt = $createdAt;
        $this->votes = $votes;
    }

    public static function fromQuestion(Question $question): self
    {
        return new self(
            $question->id(),
            $question->name(),
            $question->question(),
            $question->slug(),
            $question->createdAt(),
            $question->formattedVotes()
        );
    }

    public function id(): string
    {
        return $this->id;
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

    public function createdAt(): DateTime
    {
        return $this->createdAt;
    }

    public function votes(): string
    {
        return $this->votes;
    }
}
