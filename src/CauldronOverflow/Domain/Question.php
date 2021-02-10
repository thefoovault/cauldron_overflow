<?php

declare(strict_types=1);

namespace CauldronOverflow\Domain;

use DateTime;
use Shared\Domain\Entity;

class Question implements Entity
{
    private string $id;
    private string $name;
    private string $question;
    private string $slug;
    private DateTime $createdAt;
    private int $votes;

    public function __construct(
        string $id,
        string $name,
        string $question,
        string $slug,
        DateTime $createdAt,
        int $votes = 0
    ) {
        $this->id = $id;
        $this->name = $name;
        $this->question = $question;
        $this->slug = $slug;
        $this->createdAt = $createdAt;
        $this->votes = $votes;
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
