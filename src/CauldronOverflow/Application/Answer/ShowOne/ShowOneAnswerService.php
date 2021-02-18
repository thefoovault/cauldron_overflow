<?php

declare(strict_types=1);

namespace CauldronOverflow\Application\Answer\ShowOne;

use CauldronOverflow\Domain\Answer\Answer;
use CauldronOverflow\Domain\Answer\AnswerId;
use CauldronOverflow\Domain\Answer\AnswerRepository;

class ShowOneAnswerService
{
    private AnswerRepository $answerRepository;

    public function __construct(
        AnswerRepository $answerRepository
    ) {
        $this->answerRepository = $answerRepository;
    }

    public function __invoke(AnswerId $answerId): ?Answer
    {
        return $this->answerRepository->findById($answerId);
    }
}
