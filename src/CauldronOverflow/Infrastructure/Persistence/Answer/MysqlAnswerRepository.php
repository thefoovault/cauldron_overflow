<?php

declare(strict_types=1);

namespace CauldronOverflow\Infrastructure\Persistence\Answer;

use CauldronOverflow\Domain\Answer\Answer;
use CauldronOverflow\Domain\Answer\AnswerId;
use CauldronOverflow\Domain\Answer\AnswerRepository;
use CauldronOverflow\Domain\Question\QuestionId;
use Shared\Infrastructure\Persistence\DoctrineRepository;

final class MysqlAnswerRepository extends DoctrineRepository implements AnswerRepository
{
    public function save(Answer $answer): void
    {
        $this->persist($answer);
    }

    public function findByQuestion(QuestionId $questionId): array
    {
        return $this->repository(Answer::class)->createQueryBuilder('a')
            ->andWhere('a.questionId = :id')
            ->setParameter('id', $questionId->value())
            ->getQuery()
            ->getResult();
    }

    public function findById(AnswerId $answerId): ?Answer
    {
        return $this->repository(Answer::class)->createQueryBuilder('a')
            ->andWhere('a.id = :id')
            ->setParameter('id', $answerId->value())
            ->getQuery()
            ->getSingleResult();
    }
}
