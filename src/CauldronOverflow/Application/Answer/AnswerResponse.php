<?php

declare(strict_types=1);

namespace CauldronOverflow\Application\Answer;

use CauldronOverflow\Domain\Answer\Answer;
use DateTimeImmutable;
use Shared\Domain\Bus\Query\Response;

final class AnswerResponse implements Response
{
    private string $id;
    private string $answer;
    private string $votes;
    private DateTimeImmutable  $createdAt;

    public function __construct(
        string $id,
        string $answer,
        string $votes,
        DateTimeImmutable $createdAt
    ) {
        $this->id = $id;
        $this->answer = $answer;
        $this->votes = $votes;
        $this->createdAt = $createdAt;
    }

    public static function fromAnswer(Answer $answer): self
    {
        return new self(
            $answer->id()->value(),
            $answer->answer()->value(),
            $answer->formattedVotes(),
            $answer->createdAt()
        );
    }

    public function id(): string
    {
        return $this->id;
    }

    public function answer(): string
    {
        return $this->answer;
    }

    public function votes(): string
    {
        return $this->votes;
    }

    public function createdAt(): DateTimeImmutable
    {
        return $this->createdAt;
    }
}
