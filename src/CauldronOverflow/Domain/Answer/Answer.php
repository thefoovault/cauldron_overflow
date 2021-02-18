<?php

declare(strict_types=1);

namespace CauldronOverflow\Domain\Answer;

use CauldronOverflow\Domain\Question\QuestionId;
use DateTimeImmutable;
use Shared\Domain\Entity;

final class Answer implements Entity
{
    private AnswerId $id;
    private AnswerBody $answer;
    private QuestionId $questionId;
    private AnswerVotes $votes;
    private DateTimeImmutable $createdAt;

    public function __construct(
        AnswerId $id,
        AnswerBody $answer,
        QuestionId $questionId,
        DateTimeImmutable $createdAt,
        AnswerVotes $votes
    ) {
        $this->id = $id;
        $this->answer = $answer;
        $this->questionId = $questionId;
        $this->createdAt = $createdAt;
        $this->votes = $votes;
    }

    public function id(): AnswerId
    {
        return $this->id;
    }

    public function answer(): AnswerBody
    {
        return $this->answer;
    }

    public function question(): QuestionId
    {
        return $this->questionId;
    }

    public function createdAt(): DateTimeImmutable
    {
        return $this->createdAt;
    }

    public function votes(): AnswerVotes
    {
        return $this->votes;
    }

    public function formattedVotes(): string
    {
        $prefix = $this->votes()->value() >=0 ? '+' : '-';
        return sprintf('%s %d', $prefix, abs($this->votes()->value()));
    }

    public function upVote(): void
    {
        $this->votes = $this->votes()->add(
            new AnswerVotes(1)
        );
    }

    public function downVote(): void
    {
        $this->votes = $this->votes()->subtract(
            new AnswerVotes(1)
        );
    }
}
