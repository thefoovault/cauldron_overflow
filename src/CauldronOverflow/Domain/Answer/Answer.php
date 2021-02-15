<?php

declare(strict_types=1);

namespace CauldronOverflow\Domain\Answer;

use CauldronOverflow\Domain\Question\Question;
use DateTime;
use Shared\Domain\Entity;

class Answer implements Entity
{
    private string $id;
    private string $answer;
    private Question $question;
    private int $votes;
    private DateTime $createdAt;

    public function __construct(string $id, string $answer, Question $question, DateTime $createdAt, int $votes = 0)
    {
        $this->id = $id;
        $this->answer = $answer;
        $this->question = $question;
        $this->createdAt = $createdAt;
        $this->votes = $votes;
    }

    public function id(): string
    {
        return $this->id;
    }

    public function answer(): string
    {
        return $this->answer;
    }

    public function question(): Question
    {
        return $this->question;
    }

    public function createdAt(): DateTime
    {
        return $this->createdAt;
    }

    public function votes(): int
    {
        return $this->votes;
    }

    public function formattedVotes(): string
    {
        $prefix = $this->votes() >=0 ? '+' : '-';
        return sprintf('%s %d', $prefix, abs($this->votes()));
    }

    public function upVote(): void
    {
        $this->votes++;
    }

    public function downVote(): void
    {
        $this->votes--;
    }
}
