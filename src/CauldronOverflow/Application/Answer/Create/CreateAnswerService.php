<?php

declare(strict_types=1);

namespace CauldronOverflow\Application\Answer\Create;

use CauldronOverflow\Domain\Answer\Answer;
use CauldronOverflow\Domain\Answer\AnswerRepository;

final class CreateAnswerService
{
    private AnswerRepository $answerRepository;

    public function __construct(
        AnswerRepository $answerRepository
    ) {
        $this->answerRepository = $answerRepository;
    }

    public function __invoke(Answer $answer): void
    {
        $this->answerRepository->save($answer);
    }
}
