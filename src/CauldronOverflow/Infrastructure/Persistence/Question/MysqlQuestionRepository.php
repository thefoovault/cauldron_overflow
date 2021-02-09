<?php

declare(strict_types=1);

namespace CauldronOverflow\Infrastructure\Persistence\Question;

use CauldronOverflow\Domain\Question;
use CauldronOverflow\Domain\QuestionRepository;
use Shared\Infrastructure\Persistence\DoctrineRepository;

class MysqlQuestionRepository extends DoctrineRepository implements QuestionRepository
{
    public function save(Question $question): void
    {
        $this->persist($question);
    }

    public function findBySlug(string $slug): ?Question
    {
        return $this->repository(Question::class)->findOneBy(
            [
                'slug' => $slug
            ]
        );
    }
}