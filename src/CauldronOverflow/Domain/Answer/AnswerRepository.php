<?php

declare(strict_types=1);

namespace CauldronOverflow\Domain\Answer;

interface AnswerRepository
{
    public function save(Answer $answer): void;
}
