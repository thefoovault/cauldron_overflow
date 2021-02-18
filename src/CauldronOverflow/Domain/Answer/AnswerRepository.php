<?php

declare(strict_types=1);

namespace CauldronOverflow\Domain\Answer;

use CauldronOverflow\Domain\Question\QuestionId;

interface AnswerRepository
{
    public function save(Answer $answer): void;

    public function findByQuestion(QuestionId $questionId): array;

    public function findById(AnswerId $answerId): ?Answer;
}
