<?php

declare(strict_types=1);

namespace CauldronOverflow\Infrastructure\Persistence\Question;

use CauldronOverflow\Domain\Question\Question;
use CauldronOverflow\Domain\Question\QuestionRepository;
use CauldronOverflow\Domain\Question\QuestionSlug;
use Shared\Infrastructure\Persistence\DoctrineRepository;

final class MysqlQuestionRepository extends DoctrineRepository implements QuestionRepository
{
    public function save(Question $question): void
    {
        $this->persist($question);
    }

    public function findBySlug(QuestionSlug $slug): ?Question
    {
        return $this->repository(Question::class)->createQueryBuilder('q')
            ->andWhere('q.slug.value = :slug')
            ->setParameter('slug', $slug->value())
            ->getQuery()
            ->getSingleResult();
    }

    /**
     * @return Question[]
     */
    public function findAllOrderedByNewest(): array
    {
        return $this->repository(Question::class)->createQueryBuilder('q')
            ->andWhere('q.createdAt IS NOT NULL')
            ->orderBy('q.createdAt', 'DESC')
            ->getQuery()
            ->getResult();
    }
}
