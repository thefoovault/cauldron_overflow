<?php

declare(strict_types=1);

namespace CauldronOverflow\Application\Question\Create;

use CauldronOverflow\Domain\Question\Question;
use CauldronOverflow\Domain\Question\QuestionRepository;

class CreateQuestionService
{
    private QuestionRepository $questionRepository;

    public function __construct(
        QuestionRepository $questionRepository
    ){
        $this->questionRepository = $questionRepository;
    }

    public function __invoke(Question $question): void
    {
        $this->questionRepository->save($question);
    }
}
