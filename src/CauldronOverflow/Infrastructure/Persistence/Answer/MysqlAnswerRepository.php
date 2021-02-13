<?php

declare(strict_types=1);

namespace CauldronOverflow\Infrastructure\Persistence\Answer;

use CauldronOverflow\Domain\Answer\Answer;
use CauldronOverflow\Domain\Answer\AnswerRepository;
use Shared\Infrastructure\Persistence\DoctrineRepository;

class MysqlAnswerRepository extends DoctrineRepository implements AnswerRepository
{
    public function save(Answer $answer): void
    {
        $this->persist($answer);
    }
}
