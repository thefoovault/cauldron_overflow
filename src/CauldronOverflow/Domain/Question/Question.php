<?php

declare(strict_types=1);

namespace CauldronOverflow\Domain\Question;

use DateTimeImmutable;
use Shared\Domain\Entity;

final class Question implements Entity
{
    private QuestionId $id;
    private QuestionName $name;
    private QuestionBody $question;
    private QuestionSlug $slug;
    private DateTimeImmutable $createdAt;
    private QuestionVotes $votes;

    public function __construct(
        QuestionId $id,
        QuestionName $name,
        QuestionBody $question,
        QuestionSlug $slug,
        DateTimeImmutable $createdAt,
        QuestionVotes $votes
    ) {
        $this->id = $id;
        $this->name = $name;
        $this->question = $question;
        $this->slug = $slug;
        $this->createdAt = $createdAt;
        $this->votes = $votes;
    }

    public function id(): QuestionId
    {
        return $this->id;
    }

    public function name(): QuestionName
    {
        return $this->name;
    }

    public function question(): QuestionBody
    {
        return $this->question;
    }

    public function slug(): QuestionSlug
    {
        return $this->slug;
    }

    public function createdAt(): DateTimeImmutable
    {
        return $this->createdAt;
    }

    public function votes(): QuestionVotes
    {
        return $this->votes;
    }

    public function formattedVotes(): string
    {
        $prefix = $this->votes->value() >=0 ? '+' : '-';
        return sprintf('%s %d', $prefix, abs($this->votes()->value()));
    }

    public function upVote(): void
    {
        $this->votes = $this->votes->add(
            new QuestionVotes(1)
        );
    }

    public function downVote(): void
    {
        $this->votes = $this->votes->subtract(
            new QuestionVotes(1)
        );
    }
}
