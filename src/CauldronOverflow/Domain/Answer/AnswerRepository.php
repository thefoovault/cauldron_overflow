<?php

declare(strict_types=1);

namespace CauldronOverflow\Domain\Answer;

use CauldronOverflow\Domain\Question\Question;

interface AnswerRepository
{
    public function save(Answer $answer): void;

    public function findBy(Question $question): array;
}
