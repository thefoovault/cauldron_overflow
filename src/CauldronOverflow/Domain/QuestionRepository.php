<?php

declare(strict_types=1);

namespace CauldronOverflow\Domain;

interface QuestionRepository
{
    public function save(Question $question): void;

    public function findBySlug(string $slug): ?Question;
}
