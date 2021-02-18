<?php

declare(strict_types=1);

namespace CauldronOverflow\Application\Answer\Vote;

use CauldronOverflow\Domain\Answer\Answer;
use CauldronOverflow\Domain\Answer\AnswerRepository;

class VoteAnswerService
{
    private AnswerRepository $answerRepository;

    public function __construct(
        AnswerRepository $answerRepository
    ) {
        $this->answerRepository = $answerRepository;
    }

    public function __invoke(Answer $answer, string $direction)
    {
        if ($direction === 'up') {
            $answer->upVote();
        } else {
            $answer->downVote();
        }

        $this->answerRepository->save($answer);
    }
}
