<?php

declare(strict_types=1);

namespace CauldronOverflow\Domain\Question;

interface QuestionRepository
{
    public function save(Question $question): void;

    public function findBySlug(QuestionSlug $slug): ?Question;

    public function findAllOrderedByNewest(): array;
}
