<?php

declare(strict_types=1);

namespace CauldronOverflow\Application\Question\Vote;

use CauldronOverflow\Domain\Question\Question;
use CauldronOverflow\Domain\Question\QuestionRepository;

final class VoteQuestionService
{
    private QuestionRepository $questionRepository;

    public function __construct(
        QuestionRepository $questionRepository
    ) {
        $this->questionRepository = $questionRepository;
    }

    public function __invoke(Question $question, string $direction): void
    {
        if ($direction === 'up') {
            $question->upVote();
        } else {
            $question->downVote();
        }

        $this->questionRepository->save($question);
    }
}
