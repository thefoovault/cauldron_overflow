<?php

declare(strict_types=1);

namespace CauldronOverflow\Infrastructure\Persistence\Answer;

use CauldronOverflow\Domain\Answer\Answer;
use CauldronOverflow\Domain\Answer\AnswerRepository;
use CauldronOverflow\Domain\Question\Question;
use Shared\Infrastructure\Persistence\DoctrineRepository;

final class MysqlAnswerRepository extends DoctrineRepository implements AnswerRepository
{
    public function save(Answer $answer): void
    {
        $this->persist($answer);
    }

    public function findBy(Question $question): array
    {
        return $this->repository(Answer::class)->findBy(
            [
                'question' => $question
            ]
        );
    }
}
