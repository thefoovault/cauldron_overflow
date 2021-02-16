<?php

declare(strict_types=1);

namespace CauldronOverflow\Application\Answer\ShowAllByQuery;

use CauldronOverflow\Domain\Answer\AnswerRepository;
use CauldronOverflow\Domain\Question\Question;

final class ShowAnswersByQuestionService
{
    private AnswerRepository $answerRepository;

    public function __construct(AnswerRepository $answerRepository)
    {
        $this->answerRepository = $answerRepository;
    }

    public function __invoke(Question $question): array
    {
        return $this->answerRepository->findBy($question);
    }
}
